<?php


$host="localhost";
$user="root";
$password="";
$db="admin_login";

$con = new mysqli($host,$user,$password,$db);

$old_password=$_POST['old_pass'];
$new_password=$_POST['new_pass'];
$con_password=$_POST['new_pass_confirm'];

$sql = "select * from login where id='1'";

$chg_pwd=mysqli_query($con,$sql);
$chg_pwd1=mysqli_fetch_array($chg_pwd);
$data_pwd=$chg_pwd1['Pass'];

if($data_pwd==$old_password){
    if($new_password==$con_password){  

    $sql = "update login set Pass='$new_password' where id='1'";
    $update_pwd=mysqli_query($con, $sql);
    echo "Password Changed Sucessfully !!!";

   }
else{
    echo "New passwords did not match !!!";
    }
}
else
{
echo "Wrong Old Password!!";
}
?>
