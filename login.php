<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["Email"];
    $password = $_POST["password"];

    // Prepare statement to check user in database
    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // echo password_hash("Admin1234", PASSWORD_DEFAULT);

    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            echo "Login successful! Welcome, " . $_SESSION["username"] . ". <a href='dashboard.php'>Go to Dashboard</a>";
        } else {
            echo "Invalid password. <a href='login.html'>Try Again</a>";
        }
    } else {
        echo "No account found with this email. <a href='register.html'>Register</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
