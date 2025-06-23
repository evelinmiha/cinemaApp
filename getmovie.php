<?php
session_start();  // Start session to access session variables
$movie_id = intval($_GET['q']); // Ensure the 'q' parameter is set and is sanitized as an integer




# Open database connection.
	require ( 'connect_db.php' ) ;
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
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
# Check if movie is already in the cart
if (isset($_SESSION['cart'][$movie_id])) {
    // Movie is already in the cart, just update the quantity
    $_SESSION['cart'][$movie_id]['quantity']++;
} else {
    // Movie not in cart, add it with a quantity of 1
    $_SESSION['cart'][$movie_id] = array('quantity' => 1, 'price' => $row['mov_price']);
}
  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$movie_id] ) )
  { 

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
}
mysqli_close($link);
?>
 <!-- Bootstrap JS and dependencies -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>