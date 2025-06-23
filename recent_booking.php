<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>No Recent Booking</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH10VtQn1Y4lPpcf7ss7rF1uH0k7l/cPcojZb56c5v6dZT1PTBbiO2HbRaZ5vFzq" crossorigin="anonymous">
        <link rel="stylesheet" href="style.php"> <!-- style.php file for custom styles -->
    </head>
    <body>

<?php
  # Include navigation
  include('navSimple.php');
# Start the session
session_start(); 

# Redirect if not logged in
if ( !isset( $_SESSION[ 'id' ] ) ) { 
    require ( 'login_tools.php' ); 
    load(); 
}

# Open database connection
require ('connect_db.php');

# Retrieve the latest booking for the logged-in user
$q = "SELECT * FROM movie_booking WHERE id = " . $_SESSION['id'] . " ORDER BY booking_date DESC LIMIT 1";
$r = mysqli_query($link, $q);

if (mysqli_num_rows($r) > 0) {
    $booking = mysqli_fetch_array($r, MYSQLI_ASSOC);

    # Retrieve the movies in this booking
    $booking_id = $booking['booking_id'];
    $q2 = "SELECT * FROM booking_content WHERE booking_id = $booking_id";
    $r2 = mysqli_query($link, $q2);

    echo '
    ';
    
    echo '
    <div class="container mt-5">
        <div class="alert alert-info">
         <h4 class="alert-heading" style="color: black;">Your Recent Booking</h4>
         <p style="color: black;">Below are the details of your most recent booking:</p>
            <p><strong>Booking Reference:</strong> #EC1000' . $booking['booking_id'] . '</p>
            <p><strong>Total Paid:</strong> £' . number_format($booking['total'], 2) . '</p>
            <p><strong>Booking Date:</strong> ' . date("d/m/Y", strtotime($booking['booking_date'])) . '</p>
            <hr>
        </div>
        
        <h5>Movies in Your Booking:</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Movie Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
    ';
    
    # Fetch and display each movie from the booking_content
    while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
        $movie_id = $row['movie_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];

        # Retrieve movie title
        $q3 = "SELECT movie_title FROM movie_listings WHERE movie_id = $movie_id";

        $r3 = mysqli_query($link, $q3);
        $movie = mysqli_fetch_array($r3, MYSQLI_ASSOC);

        $movie_title = $movie['movie_title'];// Fetch movie title
        $total_movie_price = $quantity * $price;

        echo '
        <tr>
            <td>' . htmlspecialchars($movie_title) . '</td>  <!-- Movie Title -->
            <td>' . $quantity . '</td>
            <td>£' . number_format($price, 2) . '</td>
            <td>£' . number_format($total_movie_price, 2) . '</td>
        </tr>
        ';
    }

    echo '
            </tbody>
        </table>
    </div>
    ';

    # Close database connection
    mysqli_close($link);

    echo '
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    ';
} else {
    # If no recent booking found
    echo '
    <div class="container mt-5">
    <div class="alert alert-warning">
        <p style="color: black;">You have not made any bookings yet.</p>
    </div>
</div>
';
 
}
?>
   </body>
   </html>