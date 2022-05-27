<?php

$host="localhost";
$user="root";
$password="";
$db="admin_login";


$conn = new mysqli($host, $user, $password, $db);
  
// Checking for connections
if ($conn->connect_error) {
    die('Connect Error (' . 
    $conn->connect_errno . ') '. 
    $conn->connect_error);
}// Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from services where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:show_tables.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>