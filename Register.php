<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "your_database_name");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if user exists
    $user_exist = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($user_exist);

    if ($result->num_rows > 0) {
        $error = "Email or Username already taken!";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php?success=registered");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!-- HTML + CSS form (below PHP logic) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <div class="crispine" id="container">
        <h2>Sign Up</h2>
        <p>Create an account to get started</p>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label for="email">Username</label>
            <input type="username" id="username" name="username" required>

            <label for="username">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>
        
        <p>Already have an account? <a href="index.php">Login</a></p>
        
    </div>
</body>
        </html>
        