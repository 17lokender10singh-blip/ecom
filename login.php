<?php
$page_title = "Login";

session_start();
include('includes/config.php');
include('includes/functions.php');  
include('includes/header.php');

if(is_logged_in()) {
    redirect('profile.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Get cart count
            $cart_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '{$user['id']}'"));
            $_SESSION['cart_count'] = $cart_count;
            
            if(isset($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']);
                redirect($redirect_url);
            } else {
                redirect('index.php');
            }
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if(isset($error)) {
                            echo display_error($error);
                        }
                        
                        if(isset($_SESSION['message'])) {
                            echo display_success($_SESSION['message']);
                            unset($_SESSION['message']);
                        }
                        ?>
                        
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        
                        <div class="mt-3">
                            Don't have an account? <a href="register.php">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>