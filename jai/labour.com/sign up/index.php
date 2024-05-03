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
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: You should hash the password before storing it in the database for security reasons

    // Insert data into database
    $sql = "INSERT INTO user_information (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="signup-container">
    <h2>Sign Up</h2>
    <form method="post" action="">
      <div class="input-group">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
      </div>
      <div class="input-group">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
      </div>
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
      </div>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>
