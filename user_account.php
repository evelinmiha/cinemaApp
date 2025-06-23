<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
	  <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		 <!-- Custom Styles -->
     <link rel="stylesheet" href="style.php">
</head>
<body>

<?php
# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'id' ] ) ) 
{ require ( 'login_tools.php' ) ; load() ; }

# Open database connection.
	require ( 'connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM new_users WHERE id={$_SESSION['id']}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	 # Start HTML document.
	{
	
   # Include navigation (nav.php)
   include('navSimple.php'); // Include the navigation bar here

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
	$date= $row["created_at"];
	$day = substr($date, 8,2);
	$month = substr($date, 5,2);
	$year = substr($date, 0,4);
	
	echo '
	<div class="container mt-5">
		<h1 class="text-center">User Profile</h1>
		<div class="card">
			<div class="card-header">
				<h3>' . $row['username'] . ' </h3>
			</div>
			<div class="card-body">
				<p><strong>User ID:</strong> EC2024/' . $row['id'] . '</p>
				<p><strong>Email:</strong> ' . $row['email'] . '</p>
				<hr>
				<p><strong>Registration Date:</strong> ' . $day . '/' . $month . '/' . $year . '</p>
				<hr>
			</div>
			<div class="card-footer text-center">
				<a href="booking_history.php" class="btn btn-secondary btn-sm">Booking History</a>
				 <a href="recent_booking.php" class="btn btn-info btn-sm">Recent Booking</a> <!-- New button added here -->
				 <a href="payment_details.php" class="btn btn-warning btn-sm">Payment Details</a>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
		';
  }
	
  # Close database connection.
  #mysqli_close( $link ) ;
   # Include footer (footer.php)
   
   include('footer.php'); // Include the footer here -->
}
else { echo '<h3>No user details.</h3>

		' ; }
?>
		