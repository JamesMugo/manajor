<?php require('../Model/database.php');
require('functions.php');


//if form has been submitted process it
if(isset($_GET['propertyno'])){

  $idToRemove = $_GET['propertyno'];

      $query="DELETE FROM property WHERE propertyno = '$idToRemove'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../property.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>