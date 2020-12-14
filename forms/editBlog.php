<?php
require_once "classes/asante.php";
require_once "adminheader.php";

$asante = new Asante();
$resultBlog = $asante->getBlog();
$userResult = $asante->getUsers();
$resultBlogCate = $asante->getBloCate();

?>

<!-- ======= Edit blog ======= -->
<div style="height:60px"></div>
<div class="container my-4" id="">
  <h2 class="mb-4">Edit Blog</h2>
  <table class="table table-bordered small">
      <thead class="bg-dark text-white">
          <tr>
              <td>Post ID</td>
              <td>Post Title</td>
              <td>Post Message</td>
              <td>Post Date</td>
              <td>Writer</td>
              <td>Blog Category</td>
              <td>Picture</td>
              <td></td>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($resultBlog as $row){
              $post_id = $row['post_id'];
              echo "<tr>
                      <td>".$row['post_id']."</td>
                      <td>".$row['post_title']."</td>
                      <td>".$row['post_message']."</td>
                      <td>".$row['post_date']."</td>
                      <td>".$row['user_id']."</td>
                      <td>".$row['category_id']."</td>
                      <td>".$row['post_pic']."</td>
                      <td>
                          <a href='updateBlog.php?post_id=$post_id' class='btn btn-info btn-sm'>Update</a>
                          <a href='action.php?actiontype=deleteBlog&post_id=$post_id' class='btn btn-danger btn-sm'>Delete</a>
                      </td>
                  </tr>";
          }
          ?>
      </tbody>
  </table>
</div>

<!-- ======= Add blog ======= -->
<div class="container mt-5" id="register">
  <h2 class="mb-4">Add Blog</h2>
  <div class="border rounded p-3">
      <form action="action.php" method='post' enctype="multipart/form-data">
          
            <div class="form-group">
              <label for="title">Post Title:</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
              <label for="message">Post Message:</label>
              <textarea name="message" id="message" rows="4" class="form-control"></textarea>
            </div>
        
            <div class="form-group">
              <label for="date">Post Date:</label>
              <input type="date" class="form-control" name="date" id="date">
            </div>

            <div class="form-group">
              <label for="writer">Writer:</label>
                <select name="writer" id="writer" class="form-control">
                    <?php
                    foreach($userResult as $row){
                        $id = $row['user_id'];
                        echo "<option value='".$row['user_id']."'>".$row['first_name']; $row['last_name']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
              <label for="bcate">Blog Category:</label>
                <?php
                foreach($resultBlogCate as $row){
                    $id = $row['category_id'];
                    echo "<br><input type='checkbox' value='".$row['category_id']."' name='bcate'> ".$row['category_name'];
                }
                ?>
            </div>

            <div class="form-group">
              <label for="bpic">Blog Picture:</label>
              <input type="file" class="form-control" name="bpic" id="bpic">
            </div>
          
          <input type="submit" name="btnAddBlog" class="btnpink" value="Add Post">
      </form>
  </div>
   
  </div>

<?php
require_once "adminfooter.php";
?>