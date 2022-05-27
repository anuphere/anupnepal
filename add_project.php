<?php 
$host="localhost";
$user="root";
$password="";
$db="admin_login";
$conn = new mysqli($host, $user, $password, $db);

if (isset($_POST['submit'])) {
  $uploadFolder = 'uploads/';
  foreach ($_FILES['files']['tmp_name'] as $key => $image) {
      $imageTmpName = $_FILES['files']['tmp_name'][$key];
      $imageName = $_FILES['files']['name'][$key];
      $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

      $title = $_POST['project_title'];
      $descp = $_POST['project_des'];
      $link = $_POST['project_link'];

      // save to database
      $query = "INSERT INTO images(title_project, descp_project, files_name,link) values('$title','$descp','$imageName','$link') " ;
      $run = $conn->query($query);
      
      if($run){

        echo '<script>alert("Entry added Successfully")</script>';

      }

      else{

        echo "Could not add the entry!! Try Again";
      }
      
     
  }
  
}

 
 
?>