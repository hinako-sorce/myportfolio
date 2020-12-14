<?php
require_once "classes/asante.php";
require_once "adminheader.php";
$asante = new Asante();
$userResult = $asante->getUsers();

?>

<!-- ======= User table ======= -->
<div style="height:60px"></div>
<div class="container my-4" id="">
  <h2 class="mb-4">Edit User</h2>
  <table class="table table-bordered small">
      <thead class="bg-dark text-white">
          <tr>
              <td>User ID</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Postal Code</td>
              <td>Phone Number</td>
              <td>Address</td>
              <td>Email</td>
              <td>Status</td>
              <td></td>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($userResult as $row){
              $id = $row['user_id'];
              echo "<tr>
                      <td>".$row['user_id']."</td>
                      <td>".$row['first_name']."</td>
                      <td>".$row['last_name']."</td>
                      <td>".$row['postal_code']."</td>
                      <td>".$row['phone_number']."</td>
                      <td>".$row['address']."</td>
                      <td>".$row['email']."</td>
                      <td>".$row['isAdmin']."</td>
                      <td>
                          <a href='updateUser.php?id=$id' class='btn btn-info btn-sm'>Update</a>
                          <a href='action.php?actiontype=deleteuser&id=$id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
      </tbody>
  </table>
</div>

<!-- ======= Add User ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Add User</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post'>
          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="firstName">First Name:</label>
              <input type="text" class="form-control" name="fname" id="firstName">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="lastName">Last Name:</label>
              <input type="text" class="form-control" name="lname" id="lastName">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="postalCode">Postal code:</label>
              <input type="number" class="form-control" name="pcode" id="postalCode">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="phoneNumber">Phone Number:</label>
              <input type="number" class="form-control" name="pnumber" id="phoneNumber">
            </div>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address">
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="pass">Password:</label>
              <input type="password" class="form-control" name="pass" id="pass">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="Admin">Status:</label>
              <select name="isAdmin" id="Admin" class="form-control">
                <option value="1">Admin</option>
                <option value="0">User</option>
              </select>
            </div>
            <div class="form-group col-12 col-md-6">
              
            </div>
          </div>
        
          <input type="submit" name="btnAddUser" class="btnpink" value="Add User">
      </form>
  </div>
   
  </div>

<?php
require_once "adminfooter.php";
?>