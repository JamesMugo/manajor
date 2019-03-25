<?php require('../../classes/database.php');
require('../../classes/functions.php');


//if form has been submitted process it
if(isset($_GET['ownerID'])){

  $idToUpdate = $_GET['ownerID'];
  $status = $_GET["status"];

      $query="UPDATE owners SET approval_status='$status' WHERE ownerID = '$idToUpdate'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../admindashboard.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>