<?php
session_start();
require('connect_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movie_id = $_POST['movie_id'];
    $user_name = mysqli_real_escape_string($link, trim($_POST['user_name']));
    $rating = intval($_POST['rating']);
    $comment = mysqli_real_escape_string($link, trim($_POST['comment']));
    $review_date = date('Y-m-d H:i:s');

    $q = "INSERT INTO movie_reviews (movie_id, user_name, rating, comment, review_date) VALUES ('$movie_id', '$user_name', '$rating', '$comment', '$review_date')";
    $r = mysqli_query($link, $q);

    if ($r) {
        header("Location: movie.php?movie_id=$movie_id");
    } else {
        echo '<p>Error adding review. Please try again.</p>';
    }
}

mysqli_close($link);
?>