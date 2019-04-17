<?php
require('../classes/database.php');
require('../classes/functions.php');

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $inputPassword = $_POST['inputPassword'];
  $errorMsg='';

  $pass = md5($inputPassword);

  /*$query = mysqli_query($conn, "SELECT username, password, usertype from staff");
  while ($row=mysqli_fetch_array($query)) {
    $db_username = $row['username'];
    $db_pass = $row['password'];
    $usertype = $row['usertype'];

    if ($username==$db_username && $pass==$db_pass) {
      session_start();
      $_SESSION["username"]=$db_username;
      $_SESSION["usertype"]=$usertype;

      if ($_SESSION[$usertype]=='regular') {
        header("location: admindashboard.php");
      }else
        header("location: dashboard.php");
        echo "Successful login";
        echo $usertype;
    }
    else
      echo "fail";
  }*/

  $query="SELECT staffID, firstname, lastname, username, usertype, email, profileImg  FROM staff WHERE username = '$username' and password = '$pass' LIMIT 1";

  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  $count = mysqli_num_rows($result);
  if($count == 1){

      //session_start(); 
      $_SESSION["staffID"]=$row["staffID"];     
      $_SESSION["firstname"]=$row["firstname"];
      $_SESSION["lastname"]=$row["lastname"];
      $_SESSION["username"]=$row["username"];
      $_SESSION["email"]=$row["email"];
      $_SESSION["usertype"]=$row["usertype"];
      $_SESSION["profileImg"]=$row["profileImg"];

      if ($row["usertype"]=="regular") {
        echo "<center><h3 style='color:white'>Login Successful.</h3><p style='color:black'>You will be redirected to the dashboard</p></center>";
        //header("refresh:1;url=dashboard.php");
        header("location: dashboard.php");
      }else {
        echo "<center><h3 style='color:white'>Login Successful.</h3><p style='color:black'>You will be redirected to the dashboard</p></center>";
        //header("refresh:1;url=admindashboard.php");
        header("location: admindashboard.php");
    }
  }
  //var_dump($row);

  // If result matched $myusername and $mypassword, table row must be 1 row
    
  // if($count == 1) {
  //   header("location: dashboard.php");
  //  }else {
  //        $errorMsg = "Wrong username/password combination";
  //        // echo $error;
  // }

  mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Manajor - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="fas fa-sign-in-alt" style="font-size: 2500%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Manajor Login!</h1>
                    <span style="color: red"><?php if(isset($errorMsg))echo $errorMsg; ?></span>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username"  placeholder="Enter username" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="inputPassword" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-xs-6 col-md-6">
                      <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="width: 215%">
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="../index.php">Back to Manajor Site</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>