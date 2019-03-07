<?php 

function editContent(){
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $dbname='manajor';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

      if(! $conn ){
         die('Could not connect: ' . mysqli_error());
      }


  $query = "SELECT * FROM owners LIMIT 10";
  $result = mysqli_query($conn,$query);

  echo "<div class='table-responsive'>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0' border='1' onclick='handleClick(event)'>
      <thead>
          <tr>
              <td>Customer Id</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Property</td>
              <td>Rent per unit</td>
          </tr>
      </thead>
      <tbody> ";

          while($row = mysqli_fetch_array($result)) {
         
              echo "<tr>
                  <td>
                  <form name='f1' action="#" >
                  ". $row['ownerID'] ." echo "<input id='edit1' type='submit' name='edit' value='Edit'>
                  </form>
                  </td>
                  <td>".$row['firstname']."</td>
                  <td>". $row['lastname']."</td>
                  <td>".$row['propertyOwned']."</td>
                  <td>".$row['rent']."</td>
              </tr>";
          }
      

      echo "</tbody>
    </table>
  </div>";


}

?>