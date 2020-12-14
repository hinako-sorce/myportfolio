<?php
require_once "classes/asante.php";
require_once "adminheader.php";

$product_id = $_GET['product_id'];
$asante = new Asante();
$row = $asante->disPlayProduct($product_id);
// function proCateResult($row){
//     echo ($row['productCategory_id'] ? 'Woman' : 'Man');
// }
?>

<!-- ======= Update Product ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Update Product</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post' enctype="multipart/form-data">
          
            <div class="form-group">
              <label for="pname">Product Name:</label>
              <input type="text" class="form-control" name="pname" id="pname" value="<?=$row['product_name']?>">
            </div>

            <div class="form-group">
              <label for="pprice">Product Price / doller:</label>
              <input type="number" class="form-control" name="pprice" id="pprice" value="<?=$row['product_price']?>">
            </div>
        
            <div class="form-group">
              <label for="ppic">Product Picture:</label>
              <input type="file" class="form-control" name="ppic" id="ppic">
            </div>

            <div class="form-group">
              <label for="pCateId">Product Category:</label>
                <select name="pCateId" id="pCateId" class="form-control">
                    <!-- <option hidden></option> -->
                    <?php
                    foreach($resultProCate as $row){
                        $id = $row['productCetegory_id'];
                        echo "<option value='".$row['productCetegory_id']."'>".$row['productCetegory_name']."</option>";
                    }
                    ?>
                </select>
            </div>
          
          <input type="submit" name="btnUpdateProduct" class="btnpink" value="Update Product">
      </form>
  </div>
   
  </div>

<?php
require_once "adminfooter.php";
?>