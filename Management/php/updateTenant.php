<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $tenid = $_POST['tenid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $identity = $_POST['identity'];
  $contacts = $_POST['contacts'];
  $plotno = $_POST['plotno'];
  $hseno = $_POST['hseno'];

      $query="UPDATE tenants SET firstname='$firstname',lastname='$lastname',idno='$identity',contacts='$contacts',plotno='$plotno',houseno='$hseno' WHERE id='$tenid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>