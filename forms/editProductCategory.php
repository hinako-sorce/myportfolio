<?php
require_once "classes/asante.php";
require_once "adminheader.php";

$asante = new Asante();
$result = $asante->getProCate();

?>

<!-- ======= Add product ======= -->
<div style="height:60px"></div>
<div class="container my-4" id="">
  <h2 class="mb-4">Edit Product-Category</h2>
  <table class="table table-bordered small">
      <thead class="bg-dark text-white">
          <tr>
              <td>Product-Category ID</td>
              <td>Product-Category Name</td>
              <td></td>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($result as $row){
              $id = $row['productCetegory_id'];
              echo "<tr>
                      <td>".$row['productCetegory_id']."</td>
                      <td>".$row['productCetegory_name']."</td>
                      <td>
                          <a href='action.php?actiontype=deleteProCate&id=$id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
      </tbody>
  </table>
</div>

<!-- ======= Add Product ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Add Product-Category</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post'>
          
            <div class="form-group">
              <label for="procateName">Product-Category Name:</label>
              <input type="text" class="form-control" name="procateName" id="procateName">
            </div>

          <input type="submit" name="btnAddProCate" class="btnpink" value="Add Product">
      </form>
  </div>
</div>

<?php
require_once "adminfooter.php";
?>