 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <td>Id</td>
                          <td>Username</td>
                          <td>First Name</td>
                          <td>Last Name</td>
                          <td>Email Address</td>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query = "SELECT * FROM staff LIMIT 10";
                      $result = mysqli_query($conn,$query);
                      // $row = mysqli_fetch_array($ ,MYSQLI_ASSOC);

                      while($row = mysqli_fetch_array($result)) {
                      ?>
                          <tr>
                              <td><?php echo $row['staffID']?></td>
                              <td><?php echo $row['username']?></td>
                              <td><?php echo $row['firstname']?></td>
                              <td><?php echo $row['lastname']?></td>
                              <td><?php echo $row['email']?></td>
                          </tr>

                      <?php
                      }
                      ?>
                  </tbody>
                </table>