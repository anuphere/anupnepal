<?php 
$host="localhost";
$user="root";
$password="";
$db="admin_login";

$service = $_POST['service'];

$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO services (Service)
VALUES ('$service')";

if ($conn->query($sql) === TRUE) {
    echo "New Service Added Successfully";
    // header("location:admin_dashboard.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>