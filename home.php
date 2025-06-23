<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Trailers & Special Offers</title>
    <!-- Include any external CSS or JavaScript files here -->
    <link rel="stylesheet" type="text/css" href="style.php">
    
</head>

<body>
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

# Include navigation
 include('nav.php');

#  <!-- Add the div container for displaying movie details 
 #  <div id="txtHint" class="mt-3"></div>  This is where the movie details will be inserted -->


# Add the div container for displaying movie details right below the nav.
 #echo '<div id="txtHint" class="mt-3"></div>';  <!-- This is where the movie details will be inserted -->


# Open database connection.
require('connect_db.php');

# Test database connection
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}
$movie_id = 0;
$movie_id = (int) $movie_id;
# Retrieve items from 'movie_listings' database table.
$q = "SELECT * FROM movie_listings WHERE movie_id = $movie_id";
$r = mysqli_query($link, $q);

# Check if the query was successful
if (!$r) {
    die("Query failed: " . mysqli_error($link));
}

echo '<div class="container">';

# Display a message if no rows are returned
if (mysqli_num_rows($r) == 0) {
    echo '<p>No trailers found.</p>';
} else {
    # Loop through each movie and display the trailer
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        # Sanitize the preview URL to ensure it's safe
        $embed_url = htmlspecialchars($row['preview']);
        
        # Ensure the URL is properly formatted (YouTube embed URL format)
        if (strpos($embed_url, 'https://www.youtube.com/watch?v=') !== false) {
            $embed_url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $embed_url);
        }

        

        echo '
        <div class="row mt-4">  <!-- Trailer Row -->
          <div class="col-12">
            <iframe class="embed-responsive-item" src="' . $embed_url . '" 
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen style="width:100%; height:400px;">
            </iframe>
          </div>
        </div>';
        
    }
}

echo '</div>';  # Closing container

// Array of specific movie IDs to display (customize this array as needed)
//$selected_movie_ids = [1, 2, 3]; // Example: Display movies with IDs 1, 2, and 3


$movie_id2 = 1;
$movie_id2 = (int) $movie_id2;

$movie_id3 = 2;
$movie_id3 = (int) $movie_id3;

$movie_id4 = 3;
$movie_id4 = (int) $movie_id4;
// Use the properly formatted string in the query
$qmovies = "SELECT * FROM movie_listings WHERE movie_id IN ($movie_id2, $movie_id3, $movie_id4);";
$rmovies = mysqli_query($link, $qmovies);

echo '<div class="movies-section mt-4">';  # Container for the grey background section
echo '<div class="row justify-content-center">';  # Movie rows
while ($movie_row = mysqli_fetch_array($rmovies, MYSQLI_ASSOC)) {
    echo '
        <div class="col-md-3 d-flex justify-content-center align-items-stretch"> <!-- Center card content -->
            <div class="card movie-card">
                <div class="card text-center">
                    <img src="' . htmlspecialchars($movie_row['img']) . '" alt="Movie" class="movie-image">
                    <h6>' . htmlspecialchars($movie_row['movie_title']) . '</h6>
                    <div class="card-footer">
                        <a href="movie.php?movie_id=' . $movie_row['movie_id'] . '" class="cinematic-button" role="button">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>';
}
echo '</div>';  // Closing row div
echo '</div>';  // Closing movies-section div

        // Promotional banners section
echo '
<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Exclusive Offers Just for You!</h3>
            <p>Enjoy high-quality snacks and beverages at the best prices in the cinema:</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="popcorn.jpg" class="card-img-top" alt="Popcorn Promotion">
                        <div class="card-body">
                            <h5 class="card-title">Premium Popcorn</h5>
                            <p class="card-text">Taste the best popcorn in town at unbeatable prices! Freshly made just for you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Refresh with Drinks</h5>
                            <p class="card-text">Get your favorite drinks at special prices. The perfect match for your movie experience!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="hotdog.jpg" class="card-img-top" alt="Hotdog Offer">
                        <div class="card-body">
                            <h5 class="card-title">Delicious Hotdogs</h5>
                            <p class="card-text">Savor a delicious hotdog with your movie. It is the perfect combo!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h4>All prices already include a 10% discount when you purchase online!</h4>
            </div>
        </div>
    </div>
</div>';

    echo '</div>';  // Closing container
/*} else {
    echo '<p>There are currently no items in the table to display.</p>';
}
*/

# Include footer.
include('footer.php');

# Close database connection.
mysqli_close($link);
?>

  <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-hL9t6LY0pqUvPp1xnFGMwl5bnZOYdp1GyZ8wx8ENZTnh1GyxDz9KK6yx1Vf7bVAp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-5ogFYyBgaCoZjO0KD5hm6wGw5b0U5TUUnmfsFwJJ4D8lnlNbzM+F9U6C0ubNB94E" crossorigin="anonymous"></script>

</body>
</html>