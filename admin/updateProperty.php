<?php require('../classes/database.php');?>
<?php require('../classes/functions.php');?>
<?php

if(isset($_POST['submit'])){

  $propid = $_POST['propid'];
  $plotno = $_POST['plotno'];
  $ownerid = $_POST['ownerid'];
  $capacity = $_POST['capacity'];
  $location = $_POST['location'];

      $query="UPDATE property SET plotno='$plotno',ownerid='$ownerid',capacity='$capacity',location='$location' WHERE propertyno='$propid'";

      if (mysqli_query($conn, $query)) {
         echo "Update successful";
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
 ?>