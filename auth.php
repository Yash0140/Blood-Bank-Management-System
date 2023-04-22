<?php
session_start();

// Capture username and password from login form
$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['pass'];
<?php
// Connect to the database
$host = 'localhost';
$user = 'your_username';
$pass = 'your_password';
$db = 'your_database';
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Validate user input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (strlen($password) < 8) {
  die("Password must be at least 8 characters long.");
}

// Check if email address is already in use
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  die("Email address is already in use.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
if (mysqli_query($conn, $query)) {
  // Registration successful, redirect to confirmation page or log in automatically
  header('Location: confirmation.php');
  exit;
} else {
  // Registration failed, display error message
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>




<!--

// Verify username and password against a database
// (This is just an example and should be replaced with your actual authentication mechanism)
if ($username === 'myusername' && $password === 'mypassword') {
    // Authentication succeeded, set session variable and redirect to target page
    $_SESSION['authenticated'] = true;
    header('Location: /target-page.php');
    exit;
} else {
    // Authentication failed, redirect back to login page with error message
    header('Location: /login.php?error=invalid_credentials');
    exit;
}
-->
