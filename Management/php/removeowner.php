<?php require('../Model/database.php');
require('functions.php');


//if form has been submitted process it
if(isset($_GET['ownerID'])){

  $idToRemove = $_GET['ownerID'];

      $query="DELETE FROM owners WHERE ownerID = '$idToRemove'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../owners.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>
