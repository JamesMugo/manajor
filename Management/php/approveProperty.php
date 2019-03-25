<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');


//if form has been submitted process it
if(isset($_GET['propertyno'])){

  $idToUpdate = $_GET['propertyno'];
  $status = $_GET["status"];

      $query="UPDATE property SET approval_status='$status' WHERE propertyno = '$idToUpdate'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../admindashboard.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>