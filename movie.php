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
$q = "SELECT * FROM movie_listings WHERE movie_id = $movie_id" ;
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
				<h4>Show Times</h4>
				<hr>
				
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['theatre'].'</h5>
				  <a href="show1.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show1'] . ' </button>
				  </a>
				  <a href="show2.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show2'] . ' </button>
				  </a>
				  <a href="show3.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show3'] . ' </button>
				  </a>
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
				<h4>Show Times</h4>
				<hr>
				
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['theatre'].'</h5>
				  <a href="show1.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show1'] . ' </button>
				  </a>
				  <a href="show2.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show2'] . ' </button>
				  </a>
				  <a href="show3.php"> 
				    <button type="button" class="cinematic-button" role="button"> Book >  ' . $row['show3'] . ' </button>
				  </a>
				</div>
				</div>
				<hr>
			</div>
		</div>
		';
  }
     // Fetch reviews for this movie
	 $q_reviews = "SELECT * FROM movie_reviews WHERE movie_id = $movie_id ORDER BY review_date DESC";
	 $r_reviews = mysqli_query($link, $q_reviews);

	 echo '<div class="container mt-4"><h3>Reviews</h3>';

	 if (mysqli_num_rows($r_reviews) > 0) {
		 while ($review = mysqli_fetch_assoc($r_reviews)) {
			 echo '
			  <div class="alert" style="background-color: #f8f9fa; color: #343a40; border: 1px solid #dee2e6;">
				  <h5 style="color: #212529;">' . htmlspecialchars($review['user_name']) . '</h5>
               <p style="font-size: 1.25rem; color: #000; margin-bottom: 10px;">Rating: ' . str_repeat('&#9734;', $review['rating']) . '</p>
               <p style="color: #000; font-size: 1rem;">' . htmlspecialchars($review['comment']) . '</p>
				 <footer class="blockquote-footer">' . $review['review_date'] . '</footer>
			 </div>';
		 }
	 } else {
		 echo '<p>No reviews yet. Be the first to review!</p>';
	 }

	 echo '
	 <button type="button" class="btn btn-secondary mt-3" data-toggle="modal" data-target="#reviewModal">Add Review</button>
	 </div>';

	 // Review Modal
	 echo '
	 <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog">
		 <div class="modal-dialog modal-dialog-centered" role="document">
			 <div class="modal-content">
				 <div class="modal-header">
					 <h5 class="modal-title">Submit Your Review</h5>
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">&times;</span>
					 </button>
				 </div>
				 <form action="post_review.php" method="post">
					 <div class="modal-body">
						 <input type="hidden" name="movie_id" value="' . $movie_id . '">
						 <div class="form-group">
							 <label for="user_name">Your Name:</label>
							 <input type="text" class="form-control" name="user_name" required>
						 </div>
						 <div class="form-group">
							 <label for="rating">Rating:</label>
							 <select class="form-control" name="rating" required>
								 <option value="5">5 &#9734;</option>
								 <option value="4">4 &#9734;</option>
								 <option value="3">3 &#9734;</option>
								 <option value="2">2 &#9734;</option>
								 <option value="1">1 &#9734;</option>
							 </select>
						 </div>
						 <div class="form-group">
							 <label for="comment">Comment:</label>
							 <textarea class="form-control" name="comment" rows="4" required></textarea>
						 </div>
					 </div>
					 <div class="modal-footer">
						 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						 <button type="submit" class="btn btn-dark">Submit Review</button>
					 </div>
				 </form>
			 </div>
		 </div>
	 </div>';
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
