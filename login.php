
<?php 

$host="localhost";
$user="root";
$password="";
$db="admin_login";

$con = new mysqli($host,$user,$password,$db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from login where user='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
        include 'admin_dashboard.html';
        
        exit();
    }
    else{
        echo " Incorrect username or password";
        exit();
    }
        
}
?>

