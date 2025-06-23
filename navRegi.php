<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.php"> <!-- style.php file for custom styles -->

    <style>
        /* Style for the 'Hello User' text in the navbar */
        .navbar-text {
            font-size: 24px; /* Adjust font size */
            font-weight: bold; /* Make the text bold */
            color: #FFD700; /* Use a warm gold color */
            margin-left: auto; /* Align the text to the right */
            margin-right: 20px; /* Add some padding to the right */
            text-transform: capitalize; /* Capitalize the first letter of each word */
        }

        /* Optional: Add some hover effect for the text */
        .navbar-text:hover {
            color: #FF6347; /* Change to a red color when hovering */
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <!-- Logo (Cinema Icon) instead of text -->
     <a class="navbar-brand" href="#">
        <img src="cinema.png" alt="Cinema Logo" class="cinema-logo">  <!-- Add class 'cinema-logo' -->
         </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                      <!-- Image Icon for Home -->
                      <img src="home-icon.png" alt="Home" width="40" height="40">
                </a>
            </li>
        </ul>
        <!-- Username Display -->
        <li class="nav-item">
            <h1 class="navbar-text">Hello <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        </li>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>