<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
    $servername = "localhost"; // Change if your MySQL server is hosted elsewhere
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $database = "makesketch"; // Change to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($email) || empty($password)) {
        echo "Email and password are required";
    } else {
        // Sanitize user input
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        // Query database to fetch user with given email
        $sql = "SELECT * FROM user_information WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // User found, now check password
            $user = $result->fetch_assoc();
            echo $user['password'];
            if (password_verify($password, $user['password'])) {
                echo "Login successful"; // Redirect user to dashboard or another page
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>
<form method="post" action="">
    <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
      <p class="para"><a href="#">forget password?</a></p>
      <button class="google-login">Login with Google</button>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
