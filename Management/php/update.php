<?php require('../Model/database.php');?>
<?php require('functions.php');?>
<?php

if(isset($_POST['submit'])){

  $ownerid = $_POST['ownerid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $propertyOwned = $_POST['propertyOwned'];
  $rent = $_POST['rent'];

      $query="UPDATE owners SET firstname='$firstname',lastname='$lastname',propertyOwned='$propertyOwned',rent='$rent' WHERE ownerID='$ownerid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>