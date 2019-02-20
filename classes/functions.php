<?php 
//require('database.php');

function displayContent(){
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
	  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
	    <thead>
	        <tr>
	            <td>Id</td>
	            <td>First Name</td>
	            <td>Last Name</td>
	            <td>Property</td>
	        </tr>
	    </thead>
	    <tbody> ";
	
	       
	        // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);

	        while($row = mysqli_fetch_array($result)) {
	       
	            echo "<tr>
	                <td>". $row['ownerID'] ."</td>
	                <td>".$row['firstname']."</td>
	                <td>". $row['lastname']."</td>
	                <td>".$row['propertyOwned']."</td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";

}

function addOwners(){
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname='manajor';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }

    	  $firstname = $_POST['firstname'];
		  $lastName = $_POST['lastName'];
		  $id = $_POST['id'];
		  $propertyOwned = $_POST['propertyOwned'];
		  $location = $_POST['location'];
		  $rent = $_POST['rent'];
		  $agreement = $_POST['agreement'];


		  $query="INSERT INTO owners(firstname, lastname, ownerID, propertyOwned, location, rent, agreement) VALUES ('$firstName','$lastName','$id','$propertyOwned','$location','$rent',$agreement)";

		  if (mysqli_query($conn, $query)) {
		     echo "New record created successfully";
		  } else {
		     echo "Error: " . $query . "" . mysqli_error($conn);
		  }
		  $conn->close();

}





























?>
