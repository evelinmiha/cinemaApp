<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	 <!-- Custom Styles -->
     <link rel="stylesheet" href="style.php">
</head>
<body>

<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Get passed movie id and assign it to a variable.
# Include the navigation bar (navSimple).
include('navSimple.php');
if ( isset( $_GET['movie_id'] ) ) $movie_id = $_GET['movie_id'] ;
# Open database connection.
require ( 'connect_db.php' ) ;
# Retrieve selective movie data from 'movie_listings' database table. 
$q = "SELECT * FROM comingFilms WHERE movie_id = $movie_id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

    # Sanitize and format the trailer URL (same as in home.php)
    $embed_url2 = htmlspecialchars($row['preview']);
	if (strpos($embed_url2, 'https://www.youtube.com/watch?v=') !== false) {
        $embed_url2 = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $embed_url2);
    }

  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$movie_id] ) )
  { 
# Add one more booking if needed.
    $_SESSION['cart'][$movie_id]['quantity']++; 
    echo '
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
				 <iframe class="embed-responsive-item" src="' . $embed_url2 . '" 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			 </div>
		<div class="col-md-8">
          <h1 class="display-4">'.$row['movie_title'].'</h1>
		  <p class="lead">Release Date:  '.$row['release'].'</p>
		  <p>Genre: '.$row['genre'].'</p>
		</div>
			<div class="col-sm-12 col-md-4">	
				<p>'.$row['further_info'].'</p>
			</div>
			 <div class="col-md-4 text-center">
              <p class="badge badge-secondary" style="font-size: 1.5rem;">' . ($row['age_rating']) . '</p>
             </div>
			<div class="col-sm-12 col-md-6">
				<hr>
				
                <div class="card">
				</div>
				</div>
				<hr>
			</div>
		</div>
		';
  }
else
  {
    # Or add one of movie booking to the cart.
    $_SESSION['cart'][$movie_id]= array ( 'quantity' => 1, 'price' => $row['mov_price'] ) ;
 
 echo '
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
				<iframe class="embed-responsive-item" src="' . $embed_url2 . '" 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			 </div>
		<div class="col-md-8">
          <h1 class="display-4">'.$row['movie_title'].'</h1>
		  <p class="lead">Release Date:  '.$row['release'].'</p>
		  <p>Genre: '.$row['genre'].'</p>
		</div>
			<div class="col-sm-12 col-md-4">
			<img src='. $row['age_rating'].' alt="Movie" width="50px">
				
				<p>'.$row['further_info'].'</p>
			</div>
			<div class="col-sm-12 col-md-6">
				<hr>
				
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['theatre'].'</h5>
				</div>
				</div>
				<hr>
			</div>
		</div>
		';
  }
   
}

# Close database connection.
mysqli_close($link);
?>
 <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
    window.onload = function() {
        var iframe = document.getElementById('movieTrailer');
        if (iframe) {
            iframe.src = iframe.src;  // Reload iframe to ensure it's properly loaded
        }
    }
</script>
</body>
</html>
