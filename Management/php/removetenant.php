<?php require('../Model/database.php');
require('functions.php');

//if form has been submitted process it
if(isset($_GET['id'])){

  $idToRemove = $_GET['id'];

      $query="DELETE FROM tenants WHERE id = '$idToRemove'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../tenants.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>