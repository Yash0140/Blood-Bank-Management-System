<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$conn=mysqli_connect("localhost","root","","blood");
if ($conn) {
	echo "Connected! ";
}
else{
    echo mysqli_connect_error();
}

$sql="INSERT INTO `register` VALUES ('$name', '$email', '$pass') ";
$exec=mysqli_query($conn,$sql);
if($exec)
{
   echo "Data inserted successfully" ;
}
else
{
    echo mysqli_error($conn);
}


?>