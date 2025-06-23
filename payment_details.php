<?php
# Start the session
session_start();

# Redirect if not logged in
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
    load();
}

# Open database connection
require('connect_db.php');

# If form is submitted, process the input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Get input data
    $user_id = $_SESSION['id'];
    $card_number = mysqli_real_escape_string($link, $_POST['card_number']);
    $exp_month = (int) $_POST['exp_month'];
    $exp_year = (int) $_POST['exp_year'];
    $cvv = (int) $_POST['cvv'];

    # Validate and sanitize input
    if (strlen($card_number) === 16 && $exp_month > 0 && $exp_month <= 12 && strlen($exp_year) === 2 && strlen($cvv) === 3) {
        # Insert or update bank details
        $q = "INSERT INTO bank_details (user_id, card_number, exp_month, exp_year, cvv)
              VALUES ('$user_id', '$card_number', '$exp_month', '$exp_year', '$cvv')
              ON DUPLICATE KEY UPDATE card_number='$card_number', exp_month='$exp_month', exp_year='$exp_year', cvv='$cvv'";
        $r = mysqli_query($link, $q);

        # Success message
        if ($r) {
            echo '<div class="alert alert-success text-center">Payment details saved successfully!</div>';
        } else {
            echo '<div class="alert alert-danger text-center">Error saving payment details. Please try again.</div>';
        }
    } else {
        echo '<div class="alert alert-warning text-center">Invalid payment details. Please check your input.</div>';
    }
}

# Close database connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navSimple.php'); ?>

    <div class="container my-5">
        <h1 class="text-center">Add or Update Payment Details</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="payment_details.php" method="post" class="needs-validation" novalidate>
                            <!-- Card Number -->
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" name="card_number" id="cardNumber" class="form-control" placeholder="Enter your card number" maxlength="16" pattern="\d{16}" required>
                                <div class="invalid-feedback">Please enter a valid 16-digit card number.</div>
                            </div>

                            <!-- Expiry Date -->
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <div class="d-flex">
                                    <input type="text" name="exp_month" class="form-control mr-2" placeholder="MM" maxlength="2" pattern="\d{2}" required>
                                    <input type="text" name="exp_year" class="form-control" placeholder="YY" maxlength="2" pattern="\d{2}" required>
                                </div>
                                <div class="invalid-feedback">Enter the expiry date in MM/YY format.</div>
                            </div>

                            <!-- CVV -->
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" name="cvv" id="cvv" class="form-control" placeholder="3-digit CVV" maxlength="3" pattern="\d{3}" required>
                                <div class="invalid-feedback">Please enter a valid 3-digit CVV.</div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-secondary btn-block">Save Payment Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Bootstrap validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>