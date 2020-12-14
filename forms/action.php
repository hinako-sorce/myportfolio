<?php
require_once "classes/asante.php";
$asante = new Asante();

//register
if(isset($_POST['btnRegister'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pcode = $_POST['pcode'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $asante->insertRegister($fname,$lname,$pcode,$pnumber,$address,$email,$pass);
}

//login
elseif(isset($_POST['btnLogin'])){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    
    $answer = $asante->login($email,$pass);

    if($answer != 3){
        if($answer == 1){
            header("Location: admin.php");
        }elseif($answer == 0){
            header("Location: user_index.php");
        }
    }else{
        echo "This Email and Password does not exist.";
    }
}

//add user (admin)
elseif(isset($_POST['btnAddUser'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pcode = $_POST['pcode'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $isAdmin = $_POST['isAdmin'];

    $asante->insertAdduser($fname,$lname,$pcode,$pnumber,$address,$email,$pass,$isAdmin);
}

//update user (admin)
elseif(isset($_POST['btnUpdateUser'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pcode = $_POST['pcode'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $isAdmin = $_POST['isAdmin'];
    $loginid = $_POST['loginid'];

    $asante->updateUser($fname,$lname,$pcode,$pnumber,$address,$email,$pass,$isAdmin,$loginid);
}

//delet user
elseif($_GET['actiontype'] == 'deleteuser'){
    $id = $_GET['id'];
    $asante->deleteUser($id);
}

//delete product-category
elseif($_GET['actiontype'] == 'deleteProCate'){
    $id = $_GET['id'];
    $asante->deleteProCate($id);
}

//delete product
elseif($_GET['actiontype'] == 'deleteProduct'){
    $product_id = $_GET['product_id'];
    $asante->deleteProduct($product_id);
}

//delete blog-category
elseif($_GET['actiontype'] == 'deleteBloCate'){
    $category_id = $_GET['category_id'];
    $asante->deleteBloCate($category_id);
}

//delete blog
elseif($_GET['actiontype'] == 'deleteBlog'){
    $post_id = $_GET['post_id'];
    $asante->deleteBlog($post_id);
}

//add product
elseif(isset($_POST['btnAddProduct'])){
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pCateId = $_POST['pCateId'];

    $ppic = $_FILES['ppic']['name'];
    $target_dir = "../assets/img/products/";
    $target_file = $target_dir.basename($ppic);

    $answer = $asante->InsertProduct($pname,$pprice,$ppic,$pCateId);

    if($answer == 1){
        move_uploaded_file($_FILES['itemPicture']['tmp_name'],$target_file); 
        header("Location: editProduct.php");
    }else{
        echo "Error";
    }
}
elseif(isset($_POST['btnAddProCate'])){
    $procateName = $_POST['procateName'];

    $asante->InsertProCate($procateName);
}
elseif(isset($_POST['btnUpdateProduct'])){
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pCateId = $_POST['pCateId'];

    $ppic = $_FILES['ppic']['name'];
    $target_dir = "../assets/img/products/";
    $target_file = $target_dir.basename($ppic);

    $answer = $asante->updateProduct($pname,$pprice,$ppic,$pCateId);

    if($answer == 1){
        move_uploaded_file($_FILES['itemPicture']['tmp_name'],$target_file); 
        header("Location: editProduct.php");
    }else{
        echo "Error";
    }
}

elseif(isset($_POST['btnAdminLogout'])){
    $asante->logout();
}

elseif(isset($_POST['btnAddblocateName'])){
    $blocateName = $_POST['blocateName'];

    $asante->InsertBloCate($blocateName);
}

elseif(isset($_POST['btnAddBlog'])){
    $title = $_POST['title'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    $writer = $_POST['writer'];
    $bcate = $_POST['bcate'];

    $bpic = $_FILES['bpic']['name'];
    $target_dir = "../assets/img/blog/";
    $target_file = $target_dir.basename($bpic);

    $answer = $asante->InsertBlog($title,$message,$date,$writer,$bcate,$bpic);

    if($answer == 1){
        move_uploaded_file($_FILES['itemPicture']['tmp_name'],$target_file); 
        header("Location: editBlog.php");
    }else{
        echo "Error";
    }
}


?>