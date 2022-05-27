<?php 
$host="localhost";
$user="root";
$password="";
$db="admin_login";

$skill = $_POST['skills'];
$rating = $_POST['ratings'];
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO skills (skill, rating)
VALUES ('$skill','$rating')";

if ($conn->query($sql) === TRUE) {
    echo "New Skill Added Successfully";
    // header("location:admin_dashboard.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>