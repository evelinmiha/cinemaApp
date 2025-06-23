<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>Movies</title>
  </head>
  <body>

    <!-- Include Navigation Menu -->
    <?php include('navSimple.php'); ?>
    <div class="container">
      <h1>Booking</h1>

      <?php
      if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

      // Redirect if not logged in
      if (!isset($_SESSION['id'])) {
          require('login_tools.php');
          load();
      }

      if (isset($_GET['id'])) $id = $_GET['id'];

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          foreach ($_POST['qty'] as $id => $mov_qty) {
              $id = (int) $id;
              $qty = (int) $mov_qty;
              // Set quantity to 0 or update quantity if > 0
              $_SESSION['cart'][$id]['quantity'] = max(0, $qty);
          }
      }

      $total = 0;

      if (!empty($_SESSION['cart'])) {
          require('connect_db.php');

          // Sanitize IDs and build query
          $ids = array_map('intval', array_keys($_SESSION['cart']));
          $q = "SELECT * FROM movie_listings WHERE movie_id IN (" . implode(',', $ids) . ") ORDER BY movie_id ASC";
          $r = mysqli_query($link, $q);

          echo '<div class="row">
                  <div class="col-sm">
                      <div class="card bg-light mb-3">
                          <div class="card-header">
                              <h5 class="card-title">Booking Summary</h5>
                          </div>
                          <div class="card-body">
                              <form action="show1.php" method="post">';

          while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
              $qty = $_SESSION['cart'][$row['movie_id']]['quantity'];
              $price = $_SESSION['cart'][$row['movie_id']]['price'];
              $subtotal = $qty * $price;
              $total += $subtotal;

              echo "<ul class='list-group list-group-flush'>
                      <li class='list-group-item'>
                          <div class='form-group row'>
                              <h4>{$row['theatre']}</h4>
                              <label for='movie_title' class='col-sm-12 col-form-label'>Movie Title: {$row['movie_title']}</label>
                          </div>
                      </li>
                      <li class='list-group-item'>
                          <div class='form-group row'>
                              <label for='show_time' class='col-sm-12 col-form-label'>Starting @ {$row['show1']}</label>
                          </div>
                      </li>
                    </ul>
                    <br>
                    <div class='input-group mb-3'>
                      <button class='btn btn-dark' type='button' onclick='updateQuantity({$row['movie_id']}, -1)'>-</button>
                      <input type='text' class='form-control text-center' id='quantity_{$row['movie_id']}' name='qty[{$row['movie_id']}]' value='{$qty}' readonly>
                      <button class='btn btn-dark' type='button' onclick='updateQuantity({$row['movie_id']}, 1)'>+</button>
                    </div>
                    <input type='hidden' id='price_{$row['movie_id']}' value='{$price}'>";
          }

          echo "<ul class='list-group list-group-flush'>
                  <li class='list-group-item'>
                      <div class='form-group row'>
                          <label for='Total' class='col-sm-12 col-form-label' id='total'>To Pay: £" . number_format($total, 2) . "</label>
                      </div>
                  </li>
                  <li class='list-group-item'>
                      <a href='checkout.php?total=$total'>
                          <button type='button' class='btn btn-secondary btn-block' role='button'" . ($total <= 0 ? ' disabled' : '') . ">Book Now</button>
                      </a>
                  </li>
                </ul>
                </form>
              </div>
            </div>
          </div>
        </div>";
      } else {
          echo '<div class="container">
                  <div class="alert alert-secondary" role="alert">
                      <h2>No reservations have been made.</h2>
                      <a href="home.php" class="alert-link">View What\'s On Now</a>
                  </div>
                </div>';
      }
      ?>

      <script>
      function updateQuantity(movieId, change) {
          let quantityInput = document.getElementById('quantity_' + movieId);
          let quantity = parseInt(quantityInput.value) || 0;

          quantity += change;

          // Allow quantity to be zero or more
          if (quantity < 0) return;

          quantityInput.value = quantity;

          updateTotal(movieId, quantity);
      }

      function updateTotal(movieId, quantity) {
          let price = parseFloat(document.getElementById('price_' + movieId).value);

          let xhr = new XMLHttpRequest();
          xhr.open("POST", "update_cart.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  let total = parseFloat(xhr.responseText);
                  if (isNaN(total)) total = 0.00;
                  document.getElementById('total').innerText = 'To Pay: £' + total.toFixed(2);

                  let checkoutLink = document.querySelector("a[href^='checkout.php']");
                  checkoutLink.href = 'checkout.php?total=' + total.toFixed(2);

                  // Disable Book Now button if total is 0 or less
                  let bookBtn = checkoutLink.querySelector('button');
                  if (bookBtn) {
                    bookBtn.disabled = (total <= 0);
                  }
              }
          };
          xhr.send("id=" + movieId + "&quantity=" + quantity);
      }
      </script>
    </div>
  </body>
</html>