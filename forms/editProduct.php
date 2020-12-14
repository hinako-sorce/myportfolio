<?php
require_once "classes/asante.php";
require_once "adminheader.php";

$asante = new Asante();
$result = $asante->getProduct();
$resultProCate = $asante->getProCate();

?>

<!-- ======= Add product ======= -->
<div style="height:60px"></div>
<div class="container my-4" id="">
  <h2 class="mb-4">Edit Product</h2>
  <table class="table table-bordered small">
      <thead class="bg-dark text-white">
          <tr>
              <td>Product ID</td>
              <td>Product Name</td>
              <td>Product Price</td>
              <td>Product Picture</td>
              <td>Product-Category Name</td>
              <td></td>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($result as $row){
              $product_id = $row['product_id'];
              echo "<tr>
                      <td>".$row['product_id']."</td>
                      <td>".$row['product_name']."</td>
                      <td>".$row['product_price']."</td>
                      <td><img src='../assets/img/products/".$row['product_pic']."' class='w-25'></td>
                      <td>".$row['productCetegory_id']."</td>
                      <td>
                          <a href='updateProduct.php?product_id=$product_id' class='btn btn-info btn-sm'>Update</a>
                          <a href='action.php?actiontype=deleteProduct&product_id=$product_id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
      </tbody>
  </table>
</div>

<!-- ======= Add Product ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Add Product</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post' enctype="multipart/form-data">
          
            <div class="form-group">
              <label for="pname">Product Name:</label>
              <input type="text" class="form-control" name="pname" id="pname">
            </div>

            <div class="form-group">
              <label for="pprice">Product Price / doller:</label>
              <input type="number" class="form-control" name="pprice" id="pprice">
            </div>
        
            <div class="form-group">
              <label for="ppic">Product Picture:</label>
              <input type="file" class="form-control" name="ppic" id="ppic">
            </div>

            <div class="form-group">
              <label for="pCateId">Product Category:</label>
                <select name="pCateId" id="pCateId" class="form-control">
                    <?php
                    foreach($resultProCate as $row){
                        $id = $row['productCetegory_id'];
                        echo "<option value='".$row['productCetegory_id']."'>".$row['productCetegory_name']."</option>";
                    }
                    ?>
                </select>
            </div>
          
          <input type="submit" name="btnAddProduct" class="btnpink" value="Add Product">
      </form>
  </div>
   
  </div>

<?php
require_once "adminfooter.php";
?>