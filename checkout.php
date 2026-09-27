<?php
session_start();

// Redirect if cart is empty
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

$page_title = "Checkout";
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');

// Calculate cart total
$cart_total = 0;
foreach ($_SESSION['cart'] as $item) {
    $cart_total += $item['price'] * $item['quantity'];
}
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Checkout</h2>
                
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5>Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="checkoutForm" method="post" action="process_order.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="state">State</label>
                                    <select id="state" class="form-control" name="state" required>
                                        <option value="">Choose...</option>
                                        <option value="AL">Alabama</option>
                                        <!-- Add all other states -->
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip" required>
                                </div>
                            </div>
                            
                            <hr class="mb-4">
                            
                            <h5 class="mb-3">Payment</h5>
                            
                            <div class="form-group">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" name="cc-name" required>
                                <small class="text-muted">Full name as displayed on card</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" name="cc-number" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" required>
                                </div>
                            </div>
                            
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Complete Order</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5>Your Order</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo $item['name']; ?>
                                <span class="badge badge-primary badge-pill"><?php echo $item['quantity']; ?></span>
                                <span>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                            </li>
                            <?php endforeach; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong>$<?php echo number_format($cart_total, 2); ?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="cart.php" class="btn btn-outline-secondary">Edit Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Basic form validation
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    const ccNumber = document.getElementById('cc-number');
    const ccExp = document.getElementById('cc-expiration');
    const ccCvv = document.getElementById('cc-cvv');
    
    // Simple credit card validation (just checks length)
    if (ccNumber.value.length < 13 || ccNumber.value.length > 19) {
        alert('Please enter a valid credit card number');
        e.preventDefault();
        return false;
    }
    
    // Simple expiration date validation
    if (!/^\d{2}\/\d{2}$/.test(ccExp.value)) {
        alert('Please enter expiration date in MM/YY format');
        e.preventDefault();
        return false;
    }
    
    // Simple CVV validation
    if (ccCvv.value.length < 3 || ccCvv.value.length > 4) {
        alert('Please enter a valid CVV (3-4 digits)');
        e.preventDefault();
        return false;
    }
    
    return true;
});
</script>

<?php include('includes/footer.php'); ?>