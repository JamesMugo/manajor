<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $staffid = $_POST['staffid'];
  $profileImg = $_POST['profileImg'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];



  if (isset($_FILES['profileImg']) && !empty($_FILES["profileImg"]['tmp_name'])) {

      $prod_image = saveToSever("profileImg");
      if($prod_image != false){
        $prod_img = $prod_image;
          $ok = true; 
      } else{
        echo "couldnt upload to server";
      }
      //$prod_img = $_POST['prod_img'];
      
    }

    $query="UPDATE staff SET profileImg=$prod_img, firstname='$firstname',lastname='$lastname',username='$username',email='$email' WHERE staffID='$staffid'";

    if (mysqli_query($conn, $query)) {
       echo "Update successful";
    } else {
       echo "Error: " . $query . "" . mysqli_error($conn);  
    }
    $conn->close();

}
 ?>