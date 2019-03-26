<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $staffid = $_POST['staffid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $usertype = $_POST['usertype'];

      $query="UPDATE staff SET firstname='$firstname',lastname='$lastname',username='$username',email='$email',usertype='$usertype' WHERE staffID='$staffid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>