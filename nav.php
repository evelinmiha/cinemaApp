    <?php

    # Get the selected movie_id from the GET request if it's set
    $selected_movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : '';

    // Get the current page
   $current_page = basename($_SERVER['PHP_SELF']);
    ?>

<header>    
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Popper.js (Required for Bootstrap dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

        <style>
        .nav-item {
            color: yellow; /* Default color for non-active items */
        }
        .nav-item.active {
            color: white; /* Active page in white */
        }
    </style>

  <!-- JavaScript Functions and AJAX Request -->
            <script>

        //The code inside a JavaScript function will execute when "something" invokes it.
        function showUser(str) {
        //Condition if statement option is equal to comparison operator
            if (str == "") {
        //JavaScript HTML method ".getElementById" and changes the element content ".innerHTML"
                document.getElementById("txtHint").innerHTML = "";
        //The return statement stops the execution of a function and returns a value from that function.
                return;
            } else { 
        //The XMLHttpRequest object can be used to exchange data with a web server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
        //The readyState property holds the status of the XMLHttpRequest.
        //The onreadystatechange property defines a function to be executed when the readyState changes.

                xmlhttp.onreadystatechange = function() {
        //The status property and the status property holds the status of the XMLHttpRequest object.
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                
        //To send a request to a server, we use the open() and send() methods of the XMLHttpRequest object:
                xmlhttp.open("GET","getmovie.php?q="+str,true);
                xmlhttp.send();
            }
        }

        </script>

        <style>
            .alert .close {
                display: none;
            }
        </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Logo (Cinema Icon) instead of text -->
        <a class="navbar-brand" href="#">
        <img src="cinema.png" alt="Cinema Logo" class="cinema-logo">  <!-- Add class 'cinema-logo' -->
         </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Home -->
                <li class="nav-item <?php if($current_page == 'home.php') echo 'active'; ?>">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <!-- Now Showing -->
                <li class="nav-item <?php if($current_page == 'showingNow.php') echo 'active'; ?>">
                    <a class="nav-link" href="showingNow.php">Now showing</a>
                </li>
                <!-- Coming Soon -->
                <li class="nav-item <?php if($current_page == 'comingSoon.php') echo 'active'; ?>">
                    <a class="nav-link" href="comingSoon.php">Coming soon</a>
                </li>
                <!-- User Account -->
                <li class="nav-item <?php if($current_page == 'user_account.php') echo 'active'; ?>">
                    <a class="nav-link" href="user_account.php">User Account</a>
                </li>
            </ul>
           <!-- Centered Username Display -->
             <li class="nav-item">
                <span class="navbar-text text-white mx-5" style="font-size: 18px;">
                    Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>
                    <img src="avatar.png" alt="User Icon" style="width: 22px; height: 22px; margin-left: 10px;">
                    </span>
            </li>

            <!-- Right-aligned section for logout, username, and search -->
            <ul class="navbar-nav ml-auto">
                <!-- Movie Select Dropdown -->
                <!-- Search form -->
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0" action="getmovie.php" method="get">
                    <!--    <select class="form-control " id="exampleFormControlSelect2 name="users" onchange="showUser(this.value)"> -->
                    <select class="form-control mr-sm-2" name="movie_id" onchange="showUser(this.value)">
                                                                            <!-- this.form.submit() -->
                    <!--  <input class="form-control mr-sm-2" type="search" placeholder="Search Movies" aria-label="Search" name="search"> -->
                    <option value="">Select Movie:</option>
                    <!--    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  -->
                    <?php
                                # Open database connection.
                                require('connect_db.php');

                                # Retrieve movies from 'movie_listings' table.
                                $q = "SELECT * FROM movie_listings";
                                $r = mysqli_query($link, $q);

                                if (mysqli_num_rows($r) > 0) {
                                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                        # Check if this movie is the selected one
                                        $selected = ($row['movie_id'] == $selected_movie_id) ? 'selected' : '';
                                        echo '<option value="' . $row['movie_id'] . '">' . htmlspecialchars($row['movie_title']) . '</option>';
                                    }
                                }
                                mysqli_close($link);
                            ?>
                        </select>
                    </form>
                </li>
        <!-- Add the div container for displaying movie details  -->
         <!--<div id="txtHint" class="mt-3"></div>   This is where the movie details will be inserted -->

                <!-- Logout Button -->
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
                </li>
          
            </ul>
        </div>
    </nav>



    <!--
    <script>
    $(document).on('click', '.alert .close', function () {
        $(this).closest('.alert').alert('close');
    });
    </script>
    -->
    <!-- Place this script section right before the closing </body> tag -->
    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
                            
</header>
<div id="txtHint" class="mt-3"></div> <!--  This is where the movie details will be inserted -->