<?php require('../classes/database.php');

//if form has been submitted process it
if(isset($_POST['submit']) && $_POST['InputPassword'] == $_POST['RepeatPassword']){

  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Username = $_POST['Username'];
  $InputEmail = $_POST['InputEmail'];
  $InputPassword = $_POST['InputPassword'];
  $RepeatPassword = $_POST['RepeatPassword'];

  $pass = md5($InputPassword);

  $query="INSERT INTO staff(firstname, lastname, username, password, email, usertype) VALUES ('$FirstName','$LastName','$Username','$pass','$InputEmail','admin')";

  if (mysqli_query($conn, $query)) {
    header('Location: login.php');
     echo "New record created successfully";
  } else {
     echo "Error: " . $query . "" . mysqli_error($conn);
  }
  $conn->close();

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

  <title>Manajor - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="fas fa-user-plus" style="font-size: 2300%"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="FirstName" placeholder="First Name" required="required">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="LastName" placeholder="Last Name" required="required">
                  </div>
                </div>
                <hr>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="Username" placeholder="Username" required="required">
                  </div>
                <hr>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="InputEmail" placeholder="Email Address" required="required">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="InputPassword" placeholder="Password" required="required">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="RepeatPassword" placeholder="Repeat Password" required="required">
                  </div>
                </div>
                <div class="col-xs-6 col-md-6">
                  <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block" style="width: 210%">
                </div>
                <!--a href="login.php" class="btn btn-primary btn-user btn-block">
                  Register Account
                </a-->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
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
