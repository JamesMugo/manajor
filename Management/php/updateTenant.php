<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $tenid = $_POST['tenid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $identity = $_POST['identity'];
  $contacts = $_POST['contacts'];
  $propertyno = $_POST['propertyno'];
  $hseno = $_POST['hseno'];

      $query="UPDATE tenants SET firstname='$firstname',lastname='$lastname',nationalid='$identity',contacts='$contacts',propertyno='$propertyno', houseno='$hseno' WHERE id='$tenid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>