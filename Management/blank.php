<?php require('../classes/database.php');?>
<?php require('../classes/functions.php');?>
<?php
sessionCheck();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Manajor - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!--Add user modal -->
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
    <div>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="blank.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Manajor <sup>2</sup></div>
      </a>
    </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
    <div>
      <li class="nav-item">
        <a class="nav-link" href="blank.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    </div>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Owner's link for approval -->
    <div>
      <li class="nav-item active">
        <a class="nav-link" href="javascript:void(0)" onclick="unhide()">
          <i class="fas fa-user-tie"></i>
          <span>Property owners</span></a>
      </li>
    </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Tenant's link for approval-->
    <div>
      <li class="nav-item active">
        <a class="nav-link" href="javascript:void(0)" onclick="unhide1()">
          <i class="fas fa-users"></i>
          <span>Tenants</span></a>
      </li>
    </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Property's link for approval-->
    <div>
      <li class="nav-item active">
        <a class="nav-link" href="javascript:void(0)" onclick="unhide2()">
          <i class="far fa-building"></i>
          <span>Property</span></a>
      </li>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

      <!-- Property's link for approval-->
    <div>
      <li class="nav-item active">
        <a class="nav-link" href="javascript:void(0)" onclick="unhide3()">
          <i class="fas fa-users-cog"></i>
          <span>Manage Users</span></a>
      </li>
    </div>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php displayUser(); ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>


        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Admin Page</h1>

        </div>

          <div class="card shadow mb-4" id="ownerPanel" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Approve Property Owners</h6>
            </div>

            <div class="table-responsive">
              <?php echo approveAddition(); ?>

            </div>
          </div>

          <div class="card shadow mb-4" id="tenantPanel" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Approve Tenants</h6>
            </div>

            <div class="table-responsive">
              <?php echo approveTenantsAddition(); ?>

            </div>
          </div>

          <div class="card shadow mb-4" id="propertyPanel" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Approve Property</h6>
            </div>

            <div class="table-responsive">
              <?php echo approvePropertyAddition(); ?>

            </div>
          </div>

          <div class="card shadow mb-4" id="usersPanel" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage System Users</h6>

              <!-- Logout Modal-->
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addUserModal">ADD USERS</button>

              <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Fill the form below then click ADD USER</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>

                    <div class="modal-body">

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
                          <input type="submit" name="register" value="Register Account" class="btn btn-primary btn-user btn-block" style="width: 210%">
                        </div>
                        <!--a href="login.php" class="btn btn-primary btn-user btn-block">
                          Register Account
                        </a-->
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="table-responsive">
              <?php echo manageUsers(); ?>

            </div>
          

            <form class="user" id="editUserform" style="display: none;">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="fname" placeholder="First Name" required="required" id="fname">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="lname" placeholder="Last Name" required="required" id="lname">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="required" id="username">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email" required="required" id="email">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="usertype" placeholder="User Type" required="required" id="usertype">
                  </div>
                </div>

                <input type="hidden" name="staffid" id="staffid">

                <div class="col-xs-6 col-md-6">
                  <input type="button" name="submit" id="updateUserform" value="Update User" class="btn btn-primary btn-user btn-block" style="width: 210%">
                </div>
              </form>
            </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!--Add user modal-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    function unhide(){
      document.getElementById('ownerPanel').style.display='block';
      document.getElementById('tenantPanel').style.display='none';
      document.getElementById('propertyPanel').style.display='none';
      document.getElementById('usersPanel').style.display='none';
    }
    function unhide1(){
      document.getElementById('tenantPanel').style.display='block';
      document.getElementById('ownerPanel').style.display='none';
      document.getElementById('propertyPanel').style.display='none';
      document.getElementById('usersPanel').style.display='none';
    }
    function unhide2(){
      document.getElementById('propertyPanel').style.display='block';
      document.getElementById('tenantPanel').style.display='none';
      document.getElementById('ownerPanel').style.display='none';
      document.getElementById('usersPanel').style.display='none';
    }
    function unhide3(){
      document.getElementById('usersPanel').style.display='block';
      document.getElementById('propertyPanel').style.display='none';
      document.getElementById('tenantPanel').style.display='none';
      document.getElementById('ownerPanel').style.display='none';
    }
  </script>
  <script>
    function edit(staffid, fname, lname, username, email, usertype){
      document.getElementById('editUserform').style.display = "block";
      document.getElementById('staffid').value = staffid;
      document.getElementById('fname').value = fname;
      document.getElementById('lname').value = lname;
      document.getElementById('username').value = username;
      document.getElementById('email').value = email;
      document.getElementById('usertype').value = usertype;
    }

    $("#updateUserform").click(function(){

      $.post("php/updateUsers.php",
      {
        firstname: $('#fname').val(),
        lastname: $('#lname').val(),
        username: $('#username').val(),
        email: $('#email').val(),
        usertype: $('#usertype').val(),
        staffid: $('#staffid').val(),
        submit: "yes"
      },
      function(data, status){
        alert(data);
        window.location.href = "blank.php";
      });
    });
  </script>

</body>

</html>
