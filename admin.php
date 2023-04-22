<?php
$email = $_POST['email'];
$pass = $_POST['pass'];

$conn=mysqli_connect("localhost","root","","blood");



//// Perform authentication here
//
//if ($authenticated) {
//  header('Location: admin.php');
//  exit();
//}

if ($conn) {
	echo "Connected! ";
}
else{
    echo mysqli_connect_error();
}

$query = "SELECT * FROM register WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$hashed_password = $row['password'];

if (password_verify($password, $hashed_password)) {
    // Login successful
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_email'] = $row['email'];
} else {
    // Login failed
}

if($exec)
{
   echo "Data inserted successfully" ;
}
else
{
    echo mysqli_error($conn);
}



?>