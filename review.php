<?php
session_start();
require('connect_db.php');

// Get the movie ID
if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];
} else {
    echo '<p class="text-center">This page requires a movie ID.</p>';
    exit();
}

// Fetch movie details
$q_movie = "SELECT movie_title FROM movie_listings WHERE movie_id = $movie_id";
$r_movie = mysqli_query($link, $q_movie);
$movie = mysqli_fetch_assoc($r_movie);

// Fetch reviews for this movie
$q_reviews = "SELECT * FROM movie_reviews WHERE movie_id = $movie_id ORDER BY review_date DESC";
$r_reviews = mysqli_query($link, $q_reviews);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews for <?php echo $movie['movie_title']; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">Reviews for <?php echo $movie['movie_title']; ?></h1>
    
    <!-- Display reviews -->
    <?php
    if (mysqli_num_rows($r_reviews) > 0) {
        while ($review = mysqli_fetch_assoc($r_reviews)) {
            echo '
            <div class="alert alert-dark" role="alert">
                <h4 class="alert-heading">' . htmlspecialchars($review['user_name']) . '</h4>
                <p>Rating: ' . str_repeat('&#9734;', $review['rating']) . '</p>
                <p>' . htmlspecialchars($review['comment']) . '</p>
                <hr>
                <footer class="blockquote-footer">
                    <cite>' . $review['review_date'] . '</cite>
                </footer>
            </div>';
        }
    } else {
        echo '<p class="text-center">No reviews yet for this movie. Be the first to review!</p>';
    }
    ?>
    
    <!-- Add Review Button -->
    <button type="button" class="btn btn-secondary mt-4" data-toggle="modal" data-target="#revModal">Add Review</button>

    <!-- Add Review Modal -->
    <div class="modal fade" id="revModal" tabindex="-1" role="dialog" aria-labelledby="revModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="revModalLabel">Submit Your Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="post_review.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
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
                            <textarea class="form-control" rows="5" name="comment" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>