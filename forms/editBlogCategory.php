<?php
require_once "classes/asante.php";
require_once "adminheader.php";

$asante = new Asante();
$resultBlogCate = $asante->getBloCate();

?>

<!-- ======= edit Blog-category ======= -->
<div style="height:60px"></div>
<div class="container my-4" id="">
  <h2 class="mb-4">Edit Blog-Category</h2>
  <table class="table table-bordered">
      <thead class="bg-dark text-white">
          <tr>
              <td>Blog-Category ID</td>
              <td>Blog-Category Name</td>
              <td></td>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($resultBlogCate as $row){
              $category_id = $row['category_id'];
              echo "<tr>
                      <td>".$row['category_id']."</td>
                      <td>".$row['category_name']."</td>
                      <td>
                          <a href='action.php?actiontype=deleteBloCate&category_id=$category_id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
      </tbody>
  </table>
</div>

<!-- ======= Add Blog-category ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Add Blog-Category</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post'>
          
            <div class="form-group">
              <label for="blocateName">Blog-Category Name:</label>
              <input type="text" class="form-control" name="blocateName" id="blocateName">
            </div>

          <input type="submit" name="btnAddblocateName" class="btnpink" value="Add Blog-Category">
      </form>
  </div>
</div>

<?php
require_once "adminfooter.php";
?>