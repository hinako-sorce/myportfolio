<?php
require_once "classes/asante.php";
require_once "adminheader.php";
$id = $_GET['id'];
$asante = new Asante();
$row = $asante->displayUser($id);
function isAdminresult($row){
    echo ($row['isAdmin'] ? 'Admin' : 'User');
}
?>

<!-- ======= Update User ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Update User</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post'>
          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="firstName">First Name:</label>
              <input type="text" class="form-control" name="fname" id="firstName" value="<?=$row['first_name']?>">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="lastName">Last Name:</label>
              <input type="text" class="form-control" name="lname" id="lastName" value="<?=$row['last_name']?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="postalCode">Postal code:</label>
              <input type="number" class="form-control" name="pcode" id="postalCode" value="<?=$row['postal_code']?>">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="phoneNumber">Phone Number:</label>
              <input type="number" class="form-control" name="pnumber" id="phoneNumber" value="<?=$row['phone_number']?>">
            </div>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address" value="<?=$row['address']?>">
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" value="<?=$row['email']?>">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="pass">Password:</label>
              <input type="password" class="form-control" name="pass" id="pass">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12 col-md-6">
              <label for="Admin">Status:</label>
              <select name="isAdmin" id="Admin" class="form-control" value="<?=$row['idAdmin']?>">
                <option hidden><?= isAdminresult($row) ?></option>
                <option value="1">Admin</option>
                <option value="0">User</option>
              </select>
            </div>
            <div class="form-group col-12 col-md-6">
              
            </div>
          </div>
          <input type="hidden" name="loginid" value="<?php echo $id;?>">
          <input type="submit" name="btnUpdateUser" class="btnpink" value="Update User">
      </form>
  </div>
   
  </div>

<?php
require_once "adminfooter.php";
?>