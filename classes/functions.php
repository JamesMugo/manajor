<?php 
session_start();
require('database.php');


if(isset($_POST['register'])){
	registerUsers();
}

function sessionCheck(){
	if (!isset($_SESSION["staffID"])) {
		header("location: login.php");
	}
}

function displayUser(){
	if (sessionCheck()==false) {
		echo $_SESSION["firstname"];
		echo " ";
		echo $_SESSION["lastname"];
	}
}

function displayPic(){
	if (sessionCheck()==false) {
		echo $_SESSION["profileImg"];
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

function registerUsers(){
	global $conn; 

	  $FirstName = $_POST['FirstName'];
	  $LastName = $_POST['LastName'];
	  $Username = $_POST['Username'];
	  $InputEmail = $_POST['InputEmail'];
	  $InputPassword = $_POST['InputPassword'];
	  $RepeatPassword = $_POST['RepeatPassword'];

	  $pass = md5($InputPassword);

	if($_POST['InputPassword'] == $_POST['RepeatPassword']){
	  $query="INSERT INTO staff(firstname, lastname, username, password, email, usertype) VALUES ('$FirstName','$LastName','$Username','$pass','$InputEmail','regular')";

	  if (mysqli_query($conn, $query)) {
	    //header('Location: login.php');
	     echo "New user added successfully";
	  } else {
	     echo "Error: " . $query . "" . mysqli_error($conn);
	  }
	  $conn->close();

}
}

function manageUsers(){
	global $conn;

	if(isset($_SESSION["staffID"])){
		$logged_in_user_id = $_SESSION["staffID"];
		$query = "SELECT * FROM staff LIMIT 10";
		$result = mysqli_query($conn,$query);

		echo "<div class='table-responsive'>
		  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		    <thead>
		        <tr>
		            <td>First Name</td>
		            <td>Last Name</td>
		            <td>Username</td>
		            <td>Email</td>
		            <td>Rights</td>
		            <td>Actions</td>
		        </tr>
		    </thead>
		    <tbody> ";
		
		       
		       //echo "<h3> Heeeeyyyyy".$logged_in_user_id."</h3>";
		        // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);
		    if($result){

		        while($row = mysqli_fetch_array($result)) {
		       
		            echo "<tr>
		                <td>".$row['firstname']."</td>
		                <td>". $row['lastname']."</td>
		                <td>".$row['username']."</td>
		                <td>".$row['email']."</td>
		                <td>".$row['usertype']."</td>
		                <td><button onclick=\"edit('".$row['staffID']."','".$row['firstname']."', '".$row['lastname']."', '".$row['username']."', '".$row['email']."', '".$row['usertype']."')\">Edit</button> <button onclick=\"window.location.href='php/removeuser.php?staffID=".$row['staffID']."';\">Delete</button></td>
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
		            <td>Number of Rooms</td>
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
		                <td>".$row['number_of_rooms']."</td>
		                <td><button onclick=\"edit(".$row['ownerID'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['propertyOwned']."', '".$row['number_of_rooms']."')\">Edit</button> <button onclick=\"window.location.href='php/removeowner.php?ownerID=".$row['ownerID']."';\">Delete</button></td>
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
	            <td>Property Number</td>
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
	                <td>".$row['nationalid']."</td>
	                <td>".$row['contacts']."</td>
	                <td>".$row['propertyno']."</td>
	                <td>".$row['houseno']."</td>
	                <td><button onclick=\"edit(".$row['id'].", '".$row['firstname']."', '".$row['lastname']."', '".$row['nationalid']."', '".$row['contacts']."','".$row['propertyno']."','".$row['houseno']."')\">Edit</button> <button onclick=\"window.location.href='php/removetenant.php?id=".$row['id']."';\">Delete</button></td>
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
	            <td>Property Owned</td>
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
	                <td>".$row['description']."</td>
	                <td>". $row['ownerid']."</td>
	                <td>".$row['capacity']."</td>
	                <td>".$row['location']."</td>
	                <td><button onclick=\"edit(".$row['propertyno'].", '".$row['description']."', '".$row['ownerid']."', '".$row['capacity']."', '".$row['location']."')\">Edit</button> <button onclick=\"window.location.href='php/removeproperty.php?propertyno=".$row['propertyno']."';\">Delete</button></td>
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
	            <td>Number of Rooms</td>
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
	                <td>".$row['number_of_rooms']."</td>
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
		                <td>".$row['nationalid']."</td>
		                <td>".$row['contacts']."</td>
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
	            <td>Property Owned</td>
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
	                <td>".$row['description']."</td>
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