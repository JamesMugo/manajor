<?php require('../Model/database.php');
require('functions.php');


//if form has been submitted process it
if(isset($_GET['id'])){

  $idToUpdate = $_GET['id'];
  $status = $_GET["status"];

      $query="UPDATE tenants SET approval_status='$status' WHERE id = '$idToUpdate'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../admindashboard.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>