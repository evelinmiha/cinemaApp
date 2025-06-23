<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking History</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH10VtQn1Y4lPpcf7ss7rF1uH0k7l/cPcojZb56c5v6dZT1PTBbiO2HbRaZ5vFzq" crossorigin="anonymous">
      <!-- Include any external CSS or JavaScript files here -->
    <link rel="stylesheet" type="text/css" href="style.php">
        </head>
        <body>
<?php
# Start the session
session_start(); 

# Redirect if not logged in
if ( !isset( $_SESSION[ 'id' ] ) ) { 
    require ( 'login_tools.php' ); 
    load(); 
}

# Open database connection
require ('connect_db.php');

# Retrieve all bookings for the logged-in user
$q = "SELECT * FROM movie_booking WHERE id = " . $_SESSION['id'] . " ORDER BY booking_date DESC";
$r = mysqli_query($link, $q);
   # Include Navigation Bar
   include('navSimple.php'); 

if (mysqli_num_rows($r) > 0) {
 

    echo '<div class="container mt-5">
            <h2>Your Booking History</h2>
    ';
    
    # Loop through each booking
    while ($booking = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $booking_id = $booking['booking_id'];

        echo '
      <div class="alert alert-info mt-4">
            <h4 class="alert-heading">Booking Reference: #EC1000' . $booking['booking_id'] . '</h4>
            <p><strong>Total Paid:</strong> £' . number_format($booking['total'], 2) . '</p>
            <p><strong>Booking Date:</strong> ' . date("d/m/Y", strtotime($booking['booking_date'])) . '</p>
            <hr>
            <h5>Movies in this Booking:</h5>
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

        # Retrieve movies in this booking
        $q2 = "SELECT * FROM booking_content WHERE booking_id = $booking_id";
        $r2 = mysqli_query($link, $q2);

        while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
            $movie_id = $row['movie_id'];
            $quantity = $row['quantity'];
            $price = $row['price'];

            # Retrieve movie title
            $q3 = "SELECT movie_title FROM movie_listings WHERE movie_id = $movie_id";
            $r3 = mysqli_query($link, $q3);
            $movie = mysqli_fetch_array($r3, MYSQLI_ASSOC);

            $movie_title = $movie['movie_title']; // Updated to correct column
            $total_movie_price = $quantity * $price;

            echo '
            <tr>
                <td>' . htmlspecialchars($movie_title) . '</td>
                <td>' . $quantity . '</td>
                <td>£' . number_format($price, 2) . '</td>
                <td>£' . number_format($total_movie_price, 2) . '</td>
            </tr>
            ';
        }

        echo '
                </tbody>
            </table>
        </div>';
    }

    echo '</div>'; # Close container

    # Close database connection
    mysqli_close($link);

    echo '
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
    ';
} else {
    # If no bookings found
    echo '
    <div class="container mt-5">
    <div class="alert alert-warning">
        <p style="color: black;">You have not made any bookings yet.</p>
    </div>
</div>';
}
?>
</body>
</html>'