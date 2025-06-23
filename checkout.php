<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Confirmation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.php">
    </head>
    <body>
<?php
# Start the session
session_start(); 

# Redirect if not logged in
if (!isset($_SESSION['id'])) { 
    require('login_tools.php'); 
    load(); 
}

# Open database connection
require('connect_db.php');
include('navSimple.php'); 
# Check if the user has bank details
$user_id = $_SESSION['id'];
$q = "SELECT * FROM bank_details WHERE user_id = '$user_id'";
$r = mysqli_query($link, $q);

# If no bank details found, redirect to payment_details.php
if (mysqli_num_rows($r) == 0) {
    # Close the database connection
    mysqli_close($link);

    # Redirect to payment details page
    header('Location: payment_details.php');
    exit();
}

# Check for passed total and cart
if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))) {
    # Recalculate the total from the session cart
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $item) {
        $total += $item['quantity'] * $item['price'];
    }

    # Format the total for display
    $formatted_total = number_format($total, 2);

    # Insert ticket reservation and total into 'movie_booking' database table
    $q = "INSERT INTO movie_booking (id, total, booking_date) VALUES ('$user_id', $total, NOW())";
    $r = mysqli_query($link, $q);

    # Retrieve the current booking number
    $booking_id = mysqli_insert_id($link);

    # Retrieve cart items from 'movie_listings' database table
    $q = "SELECT * FROM movie_listings WHERE movie_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { 
        $q .= $id . ','; 
    }
    $q = substr($q, 0, -1) . ') ORDER BY movie_id ASC';
    $r = mysqli_query($link, $q);

    # Store order contents in 'booking_contents' database table
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $query = "INSERT INTO booking_content
        (booking_id, movie_id, quantity, price)
        VALUES ($booking_id, ".$row['movie_id'].",".$_SESSION['cart'][$row['movie_id']]['quantity'].",".$_SESSION['cart'][$row['movie_id']]['price'].")";
        $result = mysqli_query($link, $query);
    }

    # Remove cart items
    $_SESSION['cart'] = NULL;
    
  # Display order confirmation message
    echo '
    <div class="container mt-5">
     <div class="alert alert-success text-dark"> <!-- Use text-dark for dark text on a light background -->
            <h4 class="alert-heading" style="color: #000;">Thank You for Your Purchase!</h4>
              <p style="color: #000;">Your booking has been confirmed successfully. Please find the details of your order below:</p>
        <hr>
             <p><strong style="color: #343a40;"><strong>Booking Reference:</strong> <span style="color: #007bff;">#EC1000' . $booking_id . '</span></p>
            <p><strong style="color: #343a40;"><strong>Total Paid:</strong> <span style="color: #28a745;">£' . $formatted_total . '</span></p>
            <p><strong style="color: #343a40;"><strong>Booking Date:</strong> <span style="color: #17a2b8;">' . date("d/m/Y") . '</span></p>
            <hr>
            <p style="color: #000;">Thank you for choosing us. You will receive an email with your booking details shortly.</p>
        </div>
    </div>';

    echo '<div class="text-center"><img width="256" class="img-fluid" alt="QR Code" src="qrcode.png"></div>';

    mysqli_close($link);

    echo '
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    </body>
    </html>';
} else { 

echo '
<div class="container mt-5">
    <div class="alert" style="background-color: #ffc107; color: #212529; border: 1px solid #ffca2c;">
        <h5 class="alert-heading">Oops! Something went wrong</h5>
        <p>Your cart is empty or the total is invalid.</p>
        <hr>
        <p>Please <a href="home.php" class="alert-link">go back</a> and complete your purchase.</p>
    </div>
</div>';
    }

    ?>
    </body>
    </html>
