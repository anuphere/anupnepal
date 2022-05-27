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
   }
     
   // SQL query to select data from database
  //  $sql = "SELECT * FROM services ORDER BY score DESC ";
  //  $result_service = $mysqli->query($sql);
  //  $mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }

        img{
          width:100px;
          height:100px;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tables</title>
</head>
<body>

  <h2>SERVICES</h2>
  <table>
      <tr>
        <th>Service</th>
        
        <th>Setting</th>
      </tr>
      <tr>
         <!-- PHP CODE TO FETCH DATA FROM ROWS-->
         <?php   // LOOP TILL END OF DATA 
          $records = mysqli_query($conn,"select * from services"); // fetch data from database

          while($data = mysqli_fetch_array($records))
          {
          ?>
            <tr>
              <td><?php echo $data['Service']; ?></td>
              <td><button type="submit">Edit</button>
              <a href="delete_service.php?id=<?php echo $data['id']; ?>">Delete</a>
      
        </td>
          <?php
          }
          ?>
       
       
      </tr>
    </table>
    
    <br>

    <hr>
    <h2>SKILLS</h2>
    <table>
        <tr>
          <th>Skill</th>
          <th>Rating(%)</th>
          <th>Setting</th>
        </tr>
        <tr>
         <!-- PHP CODE TO FETCH DATA FROM ROWS-->
         <?php   // LOOP TILL END OF DATA 
          $records = mysqli_query($conn,"select * from skills"); // fetch data from database

          while($data = mysqli_fetch_array($records))
          {
          ?>
            <tr>
              <td><?php echo $data['skill']; ?></td>
              <td><?php echo $data['rating']; ?></td>
              <td><button type="submit">Edit</button>
              <a href="delete_skill.php?id=<?php echo $data['id']; ?>">Delete</a>
      
        </td>
          <?php
          }
          ?>
       
       
      </tr>
      </table>
   
      <br>
      <hr>


      <h2>PROJECTS</h2>
      <table>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Setting</th>
          </tr>
          <tr>

          <?php
               $records = mysqli_query($conn,"select * from images"); // fetch data from database
               while($data = mysqli_fetch_array($records))
               {
          ?>
          <tr>
            <td><?php echo $data['title_project']; ?></td>
            <td><?php echo $data['descp_project']; ?></td>
            <td><img src="<?php echo 'uploads/'.$data['files_name'];?> "/></td>
            <td><button type="submit">Edit</button>
            <a href="delete_project.php?id=<?php echo $data['id']; ?>">Delete</a>
          
            </td>
            <?php
               }
               ?>
          </tr>
          
        </table>
      
        <br>
        <hr>


        <h2>AWARDS</h2>
        <table>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Setting</th>
            </tr>
            <tr>

            <?php
               $records = mysqli_query($conn,"select * from awards"); // fetch data from database
               while($data = mysqli_fetch_array($records))
               {
          ?>
          <tr>
              <td><?php echo $data['title'];?></td>
              <td><?php echo $data['descriptionAw'];?></td>
              <td><img src="<?php echo 'uploads/'.$data['photo'];?>"/></td>
              <td><button type="submit">Edit</button>
              <a href="delete_award.php?id=<?php echo $data['id']; ?>">Delete</a>
            
              </td>

              <?php
               }
               ?>
            </tr>
          </table>
          <?php mysqli_close($conn); // Close connection ?>
</body>
</html>