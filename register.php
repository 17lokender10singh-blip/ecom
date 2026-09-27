<?php
$page_title = "Register";
include('includes/config.php');
include('includes/functions.php');  
include('includes/header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    $errors = [];
    
    // Validate username
    if(empty($username)) {
        $errors[] = "Username is required";
    } elseif(strlen($username) < 4) {
        $errors[] = "Username must be at least 4 characters";
    } elseif(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'"))) {
        $errors[] = "Username already taken";
    }
    
    // Validate email
    if(empty($email)) {
        $errors[] = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } elseif(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'"))) {
        $errors[] = "Email already registered";
    }
    
    // Validate password
    if(empty($password)) {
        $errors[] = "Password is required";
    } elseif(strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    } elseif($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    
    if(empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        
        if(mysqli_query($conn, $query)) {
            $_SESSION['message'] = "Registration successful! Please login.";
            redirect('login.php');
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if(!empty($errors)) {
                            foreach($errors as $error) {
                                echo display_error($error);
                            }
                        }
                        ?>
                        
                        <form action="register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        
                        <div class="mt-3">
                            Already have an account? <a href="login.php">Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>