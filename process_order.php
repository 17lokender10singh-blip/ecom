<?php
session_start();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
    header('Location: checkout.php');
    exit();
}

$page_title = "Order Confirmation";
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');

// Process the order (in a real app, you would save to database and process payment)
$order_number = 'ORD-' . strtoupper(uniqid());
$order_total = 0;

foreach ($_SESSION['cart'] as $item) {
    $order_total += $item['price'] * $item['quantity'];
}

// Clear the cart
unset($_SESSION['cart']);
?>

<div class="py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="display-4 text-success">Order Confirmed!</h1>
                        <p class="lead">Thank you for your purchase!</p>
                        
                        <div class="alert alert-success mt-4">
                            <h5>Order #<?php echo $order_number; ?></h5>
                            <p>Your order has been received and is being processed.</p>
                            <p>A confirmation email has been sent to <strong><?php echo htmlspecialchars($_POST['email']); ?></strong></p>
                        </div>
                        
                        <div class="text-left mt-4">
                            <h5>Order Summary:</h5>
                            <p><strong>Total:</strong> $<?php echo number_format($order_total, 2); ?></p>
                            
                            <h5 class="mt-4">Shipping To:</h5>
                            <p>
                                <?php echo htmlspecialchars($_POST['firstName'] . ' ' . htmlspecialchars($_POST['lastName']); ?><br>
                                <?php echo htmlspecialchars($_POST['address']); ?><br>
                                <?php echo htmlspecialchars($_POST['city'] . ', ' . htmlspecialchars($_POST['state']) . ' ' . htmlspecialchars($_POST['zip']); ?>
                            </p>
                        </div>
                        
                        <div class="mt-5">
                            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>