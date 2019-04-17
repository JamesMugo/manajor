<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $ownerid = $_POST['ownerid'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $propertyOwned = $_POST['propertyOwned'];
  $number_of_rooms = $_POST['number_of_rooms'];

      $query="UPDATE owners SET firstname='$firstname',lastname='$lastname',propertyOwned='$propertyOwned',number_of_rooms='$number_of_rooms' WHERE ownerID='$ownerid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>