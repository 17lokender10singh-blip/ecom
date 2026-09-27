<?php
session_start();

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Remove item from cart
foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $product_id) {
        unset($_SESSION['cart'][$key]);
        break;
    }
}

// Reindex array
$_SESSION['cart'] = array_values($_SESSION['cart']);

header('Location: cart.php');
exit();
?>