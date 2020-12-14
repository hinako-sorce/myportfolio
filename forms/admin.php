<?php
require_once "classes/asante.php";
require_once "adminheader.php";
$asante = new Asante();
$userResult = $asante->getUsersLimit();
$productResult = $asante->getProductsLimit();

?>
  <!-- ======= User ======= -->
  <div style="height:60px"></div>
  <div class="container my-3" id="">
      <h2 >Admin page</h2>
        <div class="card mt-3">
            <div class="card-header">
                <h3>User <a class="float-right btn btn-outline-danger" href="edituser.php">Edit Users</a></h3>
            </div>
            <div class="card-body">
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
                                        <a href='updateUser.php?id=$id' class='btn btn-info btn-sm'>Edit</a>
                                        <a href='action.php?actiontype=deleteuser&id=$id' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        

<!-- ======= product ======= -->
        <div class="card mt-4">
            <div class="card-header">
                <h3>Product <a class="float-right btn btn-outline-danger" href="editProduct.php">Edit Products</a></h3>
            </div>
            <div class="card-body">
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
                        foreach($productResult as $row){
                            $id = $row['product_id'];
                            echo "<tr>
                                    <td>".$row['product_id']."</td>
                                    <td>".$row['product_name']."</td>
                                    <td>".$row['product_price']."</td>
                                    <td><img src='../assets/img/products/".$row['product_pic']."' class='w-25'></td>
                                    <td>".$row['productCetegory_id']."</td>
                                    <td>
                                        <a href='updateProduct.php?id=$id' class='btn btn-info btn-sm'>Edit</a>
                                        <a href='action.php?actiontype=deleteProduct&id=$id' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


</div>

<?php
require_once "adminfooter.php";
?>