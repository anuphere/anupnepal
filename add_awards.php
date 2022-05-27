<?php 
$host="localhost";
$user="root";
$password="";
$db="admin_login";
$conn = new mysqli($host, $user, $password, $db);

if (isset($_POST['submit'])) {
  $uploadFolder = 'uploads/';
  foreach ($_FILES['filess']['tmp_name'] as $key => $image) {
      $imageTmpName = $_FILES['filess']['tmp_name'][$key];
      $imageName = $_FILES['filess']['name'][$key];
      $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

      $titlel = $_POST['title_award'];
      $descpp = $_POST['descp_award'];
      $linkk = $_POST['award_link'];

      // save to database
      $query = "INSERT INTO awards(title, descriptionAw, photo,link) values('$titlel','$descpp','$imageName','$linkk') " ;
      $run = $conn->query($query);
      
      if($run){

        echo '<script>alert("Entry added Successfully")</script>';

      }

      else{

        echo "Could not add the entry!! Try Again";
      }
      
     
  }
  
}

 