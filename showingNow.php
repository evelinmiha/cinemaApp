<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# Access session.
session_start();

// Clear only the movie selection (cart) when user visits this page
unset($_SESSION['cart']);

# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php'); 
    load();  # Redirect to login page
    exit(); # Ensure no further code executes
}

# Include navigation.
include('nav.php');

# Open database connection.
require('connect_db.php');

# Test database connection.
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

# Retrieve items from 'movie_listings' database table.
$q = "SELECT * FROM movie_listings";
$r = mysqli_query($link, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Now Showing - Cinema</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
     <!-- Custom Styles -->
     <link rel="stylesheet" href="style.php">
    <!-- Additional custom styles -->
    <style>
        .alert .close {
            display: none;
        }
    </style>
</head>

<body>

<!-- Main content section -->
<div class="container">
    <h1 class="mt-4">Now Showing</h1>

    <?php
if (mysqli_num_rows($r) > 0) {
    echo '<div class="container">';
    echo '<div class="row mt-4">'; // Opening row

    # Loop through movies.
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-md-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="' . htmlspecialchars($row['img']) . '" alt="Movie" class="img-thumbnail bg-secondary">
            <h6 class="text-center">' . htmlspecialchars($row['movie_title']) . '</h6>
            <div class="card-footer">
              <a href="movie.php?movie_id=' . $row['movie_id'] . '" class="btn btn-secondary btn-block" role="button">
                Book Now
              </a>
            </div>
          </div>
        </div>';
    }

    echo '</div>'; // Closing row
  } else {
      echo '<p class="text-center">There are currently no movies available.</p>';
    }
    ?>
</div> <!-- Closing container -->
<!-- Include footer -->
<?php include('footer.php'); ?>

<!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-hL9t6LY0pqUvPp1xnFGMwl5bnZOYdp1GyZ8wx8ENZTnh1GyxDz9KK6yx1Vf7bVAp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-5ogFYyBgaCoZjO0KD5hm6wGw5b0U5TUUnmfsFwJJ4D8lnlNbzM+F9U6C0ubNB94E" crossorigin="anonymous"></script>


</body>
</html>
<?php
# Close database connection.
mysqli_close($link);
?>