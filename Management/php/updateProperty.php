<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $propid = $_POST['propid'];
  $description = $_POST['description'];
  $ownersid = $_POST['ownersid'];
  $capacity = $_POST['capacity'];
  $location = $_POST['location'];

      $query="UPDATE property SET description='$description',ownerid='$ownersid',capacity='$capacity',location='$location' WHERE propertyno='$propid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>