<?php 
require('database.php');
function displayContent(){
	global $conn;
	$query = "SELECT * FROM owners LIMIT 10";
	$result = mysqli_query($conn,$query);

	echo "<div class='table-responsive'>
	  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
	    <thead>
	        <tr>
	            <td>Customer Id</td>
	            <td>First Name</td>
	            <td>Last Name</td>
	            <td>Property</td>
	            <td>Rent per unit</td>
	            <td>Actions</td>
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
	                <td>".$row['rent']."</td>
	                <td><button onclick=\"edit(".$row['ownerID'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['propertyOwned']."', '".$row['rent']."')\">Edit</button> <button onclick=\"window.location.href='removeowner.php?ownerID=".$row['ownerID']."';\">Delete</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";

}

function displayTenants(){
	global $conn;
	$query = "SELECT * FROM tenants LIMIT 10";
	$result = mysqli_query($conn,$query);

	echo "<div class='table-responsive'>
	  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
	    <thead>
	        <tr>
	            <td>Tenant Id</td>
	            <td>First Name</td>
	            <td>Last Name</td>
	            <td>National Id.</td>
	            <td>Phone Number</td>
	            <td>Plot Number</td>
	            <td>House Number</td>
	            <td>Actions</td>
	        </tr>
	    </thead>
	    <tbody> ";
	
	       
	        // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);

	        while($row = mysqli_fetch_array($result)) {
	       
	            echo "<tr>
	                <td>". $row['id'] ."</td>
	                <td>".$row['firstname']."</td>
	                <td>". $row['lastname']."</td>
	                <td>".$row['idno']."</td>
	                <td>".$row['contacts']."</td>
	                <td>".$row['plotno']."</td>
	                <td>".$row['houseno']."</td>
	                <td><button onclick=\"edit(".$row['id'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['idno']."', '".$row['contacts']."','".$row['plotno']."','".$row['houseno']."')\">Edit</button> <button onclick=\"window.location.href='removetenant.php?id=".$row['id']."';\">Delete</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";

}

function displayProperty(){
	global $conn;
	$query = "SELECT * FROM property LIMIT 10";
	$result = mysqli_query($conn,$query);

	echo "<div class='table-responsive'>
	  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
	    <thead>
	        <tr>
	            <td>Property Id</td>
	            <td>Plot Number</td>
	            <td>Owner Id</td>
	            <td>Capacity</td>
	            <td>Location</td>
	            <td>Actions</td>
	        </tr>
	    </thead>
	    <tbody> ";
	
	       
	        // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);

	        while($row = mysqli_fetch_array($result)) {
	       
	            echo "<tr>
	                <td>". $row['propertyno'] ."</td>
	                <td>".$row['plotno']."</td>
	                <td>". $row['ownerid']."</td>
	                <td>".$row['capacity']."</td>
	                <td>".$row['location']."</td>
	                <td><button onclick=\"edit(".$row['propertyno'].", '".$row['plotno']."', '".$row['ownerid']."', '".$row['capacity']."', '".$row['location']."')\">Edit</button> <button onclick=\"window.location.href='removeproperty.php?id=".$row['propertyno']."';\">Delete</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";

}

?>