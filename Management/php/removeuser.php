<?php require('../../classes/database.php');?>
<?php require('../../classes/functions.php');

//if form has been submitted process it
if(isset($_GET['staffID'])){

  $idToRemove = $_GET['staffID'];

      $query="DELETE FROM staff WHERE staffID = '$idToRemove'";

      if (mysqli_query($conn, $query)) {
         header('Location: ../admindashboard.php');
      } else {
         echo "Error: " . $query . "" . mysqli_error($conn);  
      }
      $conn->close();

}
?>