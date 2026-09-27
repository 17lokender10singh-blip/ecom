<?php
session_start();

$page_title = "Your Shopping Cart";
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <h2 class="mb-4">Your Shopping Cart</h2>
        
        <?php if (empty($_SESSION['cart'])): ?>
            <div class="alert alert-info">
                Your cart is empty. <a href="index.php">Continue shopping</a>.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $item): 
                            $item_total = $item['price'] * $item['quantity'];
                            $cart_total += $item_total;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td>
                                <form method="post" action="update_cart.php" class="form-inline">
                                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control form-control-sm" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-outline-primary ml-2">Update</button>
                                </form>
                            </td>
                            <td>$<?php echo number_format($item_total, 2); ?></td>
                            <td>
                                <a href="remove_from_cart.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total:</strong></td>
                            <td colspan="2">$<?php echo number_format($cart_total, 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="text-right mt-4">
                <a href="index.php" class="btn btn-outline-secondary">Continue Shopping</a>
                <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>