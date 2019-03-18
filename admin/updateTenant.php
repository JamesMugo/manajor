<?php require('../classes/database.php');?>
<?php require('../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $tenid = $_POST['tenid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $idno = $_POST['idno'];
  $contacts = $_POST['contacts'];
  $plotno = $_POST['plotno'];
  $houseno = $_POST['houseno'];

      $query="UPDATE tenants SET firstname='$firstname',lastname='$lastname',idno='$idno',contacts='$contacts',plotno='$plotno',houseno='$houseno' WHERE id='$id'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>