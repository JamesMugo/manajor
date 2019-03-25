<?php 
session_start();
require('database.php');

function sessionCheck(){
	if (!isset($_SESSION["staffID"])) {
		header("location: login.php");
	}
}

function displayUser(){
	if (sessionCheck()==false) {
		echo $_SESSION["firstname"];
	}
}

function saveToSever($tag_name){
	    $image = addslashes($_FILES[$tag_name]['tmp_name']);
        $name  = addslashes($_FILES[$tag_name]['name']);
        $image = file_get_contents($image);
        $uploaddir = '../img/';
        $uploadfile = $uploaddir . basename($_FILES[$tag_name]['name']);

        if (move_uploaded_file($_FILES[$tag_name]['tmp_name'], $uploadfile)) {
            	return $uploadfile;
            }
            else { return false;}
} 


function displayContent(){
	global $conn;

	if(isset($_SESSION["staffID"])){
		$logged_in_user_id = $_SESSION["staffID"];
		$query = "SELECT * FROM owners WHERE approval_status='Yes' AND staffID = '$logged_in_user_id' LIMIT 10";
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
		
		       
		       //echo "<h3> Heeeeyyyyy".$logged_in_user_id."</h3>";
		        // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);
		    if($result){

		        while($row = mysqli_fetch_array($result)) {
		       
		            echo "<tr>
		                <td>". $row['ownerID'] ."</td>
		                <td>".$row['firstname']."</td>
		                <td>". $row['lastname']."</td>
		                <td>".$row['propertyOwned']."</td>
		                <td>".$row['rent']."</td>
		                <td><button onclick=\"edit(".$row['ownerID'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['propertyOwned']."', '".$row['rent']."')\">Edit</button> <button onclick=\"window.location.href='php/removeowner.php?ownerID=".$row['ownerID']."';\">Delete</button></td>
		            </tr>";
		        }
		    }
		    

		    echo "</tbody>
		  </table>
		</div>";
} else{
		if(headers_sent()){
			die("Hmmmmmm. It seems your session has timed out....<a href='login.php'> Click here to Login Again</a>");
		} else{
			exit(header("location: login.php"));
		}

	}

}
function displayStaff(){
	global $conn;

	if(isset($_SESSION["staffID"])){
		$logged_in_user_id = $_SESSION["staffID"];
		$query = "SELECT * FROM staff WHERE staffID = '$logged_in_user_id'";
		$result = mysqli_query($conn,$query);

		if($result){

	        while($row = mysqli_fetch_array($result)) {
	       
	            echo 
	                "<button onclick=\"edit(".$row['profileImg'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['username']."', '".$row['email']."')\">Edit</button>";
	            
	        }
	    }
	}
}

function displayTenants(){
	global $conn;

	if(isset($_SESSION["staffID"])){
	$logged_in_user_id = $_SESSION["staffID"];
	$query = "SELECT * FROM tenants WHERE approval_status='Yes' AND staffID = '$logged_in_user_id' LIMIT 10";
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
	                <td><button onclick=\"edit(".$row['id'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['idno']."', '".$row['contacts']."','".$row['plotno']."','".$row['houseno']."')\">Edit</button> <button onclick=\"window.location.href='php/removetenant.php?id=".$row['id']."';\">Delete</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";
} else{
		if(headers_sent()){
			die("Hmmmmmm. It seems your session has timed out....<a href='login.php'> Click here to Login Again</a>");
		} else{
			exit(header("location: login.php"));
		}

	}

}

function displayProperty(){
	global $conn;

	if(isset($_SESSION["staffID"])){
	$logged_in_user_id = $_SESSION["staffID"];
	$query = "SELECT * FROM property WHERE approval_status='Yes' AND staffID = '$logged_in_user_id' LIMIT 10";
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
	                <td><button onclick=\"edit(".$row['propertyno'].", '".$row['plotno']."', '".$row['ownerid']."', '".$row['capacity']."', '".$row['location']."')\">Edit</button> <button onclick=\"window.location.href='php/removeproperty.php?propertyno=".$row['propertyno']."';\">Delete</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";
} else{
		if(headers_sent()){
			die("Hmmmmmm. It seems your session has timed out....<a href='login.php'> Click here to Login Again</a>");
		} else{
			exit(header("location: login.php"));
		}

	}

}

// return user array from their id
function getUserById($id){
	global $conn;
	$query = "SELECT * FROM staff WHERE id=" . $staffID;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function approveAddition(){
	global $conn;
	$query = "SELECT * FROM owners WHERE approval_status='No' LIMIT 10";
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
	                <td><button onclick=\"window.location.href='php/adminUpdate.php?status=Yes&ownerID=".$row['ownerID']."';\">APPROVE</button> <button onclick=\"window.location.href='php/adminUpdate.php?status=Blocked&ownerID=".$row['ownerID']."';\">DECLINE</button></td>
	            </tr>";
	        }
	    

	    echo "</tbody>
	  </table>
	</div>";

}

function approveTenantsAddition(){
		global $conn;
		$query = "SELECT * FROM tenants WHERE approval_status='No' LIMIT 10";
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
		                <td><button onclick=\"window.location.href='php/approveTenants.php?status=Yes&id=".$row['id']."';\">APPROVE</button> <button onclick=\"window.location.href='php/approveTenants.php?status=Blocked&id=".$row['id']."';\">DECLINE</button></td>
		            </tr>";
		        }
		    

		    echo "</tbody>
		  </table>
		</div>";
	}

function approvePropertyAddition(){
	global $conn;
	$query = "SELECT * FROM property WHERE approval_status='No' LIMIT 10";
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
	                <td><button onclick=\"window.location.href='php/approveProperty.php?status=Yes&propertyno=".$row['propertyno']."';\">APPROVE</button> <button onclick=\"window.location.href='php/approveProperty.php?status=Blocked&propertyno=".$row['propertyno']."';\">DECLINE</button></td>
	            </tr>";
	        }
	    
	    echo "</tbody>
	  </table>
	</div>";
}
?>