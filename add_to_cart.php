<?php
session_start();

$page_title = "Add to Cart";
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');

// Static product data (same as in index.php)
$static_products = array(
    array('id' => 1, 'name' => 'Wireless Headphones', 'price' => 99.99),
    array('id' => 2, 'name' => 'Smart Watch', 'price' => 199.99),
    array('id' => 3, 'name' => 'Bluetooth Speaker', 'price' => 59.99),
    array('id' => 4, 'name' => 'Portable Charger', 'price' => 29.99),
    array('id' => 5, 'name' => 'Gaming Keyboard', 'price' => 89.99),
    array('id' => 6, 'name' => 'Wireless Mouse', 'price' => 39.99),
    array('id' => 7, 'name' => '4K Monitor', 'price' => 299.99),
    array('id' => 8, 'name' => 'Fitness Tracker', 'price' => 79.99),
    array('id' => 9, 'name' => 'DSLR Camera', 'price' => 599.99),
    array('id' => 10, 'name' => 'Noise Cancelling Headphones', 'price' => 249.99),
    array('id' => 11, 'name' => 'External SSD 1TB', 'price' => 129.99),
    array('id' => 12, 'name' => 'Ergonomic Chair', 'price' => 199.99)
);

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Find the product in our static array
$product = null;
foreach ($static_products as $item) {
    if ($item['id'] == $product_id) {
        $product = $item;
        break;
    }
}

// Process adding to cart
if ($product) {
    // Check if product already exists in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }
    
    // If not found, add new item to cart
    if (!$found) {
        $product['quantity'] = 1;
        $_SESSION['cart'][] = $product;
    }
    
    $message = "{$product['name']} has been added to your cart!";
} else {
    $message = "Product not found!";
}
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2><?php echo $message; ?></h2>
                
                <div class="mt-4">
                    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                    <a href="cart.php" class="btn btn-success">View Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>