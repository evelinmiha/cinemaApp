<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $movie_id = (int) $_POST['id'];
    $quantity = (int) $_POST['quantity'];

    // Prevent negative quantities
    if ($quantity < 0) $quantity = 0;

    // Update the cart without removing the item
    if (isset($_SESSION['cart'][$movie_id])) {
        $_SESSION['cart'][$movie_id]['quantity'] = $quantity;
    }

    // Recalculate the total, only summing items with quantity > 0
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['quantity'] > 0 && isset($item['price'])) {
            $total += $item['quantity'] * $item['price'];
        }
    }

    // Return the total to the frontend
    echo number_format($total, 2);
}
?>