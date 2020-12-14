<?php
require_once "classes/database.php";
session_start();

class Asante extends Database{
    
    public function insertRegister($fname,$lname,$pcode,$pnumber,$address,$email,$pass){
        $sql = "INSERT INTO users(`first_name`, `last_name`, `postal_code`, `phone_number`, `address`, `email`, `pass`, `isAdmin`)
            VALUES('$fname','$lname','$pcode','$pnumber','$address','$email','$pass',false)";

        if($this->conn->query($sql)){
            header("Location: login.php");
        }else{
            echo "Error in register". $this->conn->error; 
        }
    }

    public function login($email,$pass){
        $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
        $result = $this->conn->query($sql);
        // echo $email;
        // echo $pass;
        // print_r($result);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION["isLoggedIn"] = true;
            $_SESSION['user_id'] = $row['user_id'];
            return $row['isAdmin'];
        }else{
            return 3;
        }
    }

    public function getUsersLimit(){
        $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT 5";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getProductsLimit(){
        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 5";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function insertAdduser($fname,$lname,$pcode,$pnumber,$address,$email,$pass,$isAdmin){
        $sql = "INSERT INTO users(`first_name`, `last_name`, `postal_code`, `phone_number`, `address`, `email`, `pass`, `isAdmin`)
        VALUES('$fname','$lname','$pcode','$pnumber','$address','$email','$pass',$isAdmin)";

    if($this->conn->query($sql)){
        header("Location: edituser.php");
    }else{
        echo "Error in adding user". $this->conn->error; 
    }
    }

    public function displayUser($id){
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateUser($fname,$lname,$pcode,$pnumber,$address,$email,$pass,$isAdmin,$loginid){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email', `pass`='$pass', `isAdmin`='$isAdmin'
                WHERE user_id = $loginid";

        if($this->conn->query($sql)){
            header("Location: edituser.php");
        }else{
            echo "Error in updating user". $this->conn->error; 
        }        
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE user_id = $id";

        if($this->conn->query($sql)){
            header("Location: edituser.php");
        }else{
            echo "Error in deleting user". $this->conn->error; 
        }
    }

    public function deleteProCate($id){
        $sql = "DELETE FROM productCetegory WHERE productCetegory_id = $id";

        if($this->conn->query($sql)){
            header("Location: editProductCategory.php");
        }else{
            echo "Error in deleting productCetegory". $this->conn->error; 
        }
    }

    public function deleteProduct($product_id){
        $sql = "DELETE FROM products WHERE product_id = '$product_id'";


        if($this->conn->query($sql)){
            header("Location: editProduct.php");
        }else{
            echo "Error in deleting product". $this->conn->error; 
        }
    }

    public function deleteBloCate($category_id){
        $sql = "DELETE FROM category WHERE category_id = '$category_id'";

        if($this->conn->query($sql)){
            header("Location: editBlogCategory.php");
        }else{
            echo "Error in deleting BlogCategory". $this->conn->error; 
        }
    }

    public function deleteBlog($post_id){
        $sql = "DELETE FROM posts WHERE post_id = '$post_id'";

        if($this->conn->query($sql)){
            header("Location: editBlog.php");
        }else{
            echo "Error in deleting Blog". $this->conn->error; 
        }
    }

    public function InsertProduct($pname,$pprice,$ppic,$pCateId){
        $sql = "INSERT INTO products(`product_name`, `product_price`, `product_pic`,`productCetegory_id`)
        VALUES('$pname','$pprice','$ppic','$pCateId')";

        if($this->conn->query($sql)){
            return 1;
        }else{
            echo "Error in adding products". $this->conn->error; 
            return 0;
        }
    }

    public function getProduct(){
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function InsertProCate($procateName){
        $sql = "INSERT INTO productCetegory(productCetegory_name)
                VALUES('$procateName')";
        
        if($this->conn->query($sql)){
            header("Location: editProductCategory.php");
        }else{
            echo "Error in adding Product-Cetegory". $this->conn->error; 
        }
    }

    public function getProCate(){
        $sql = "SELECT * FROM productCetegory";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function disPlayProduct($product_id){
        $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateProduct($pname,$pprice,$ppic,$pCateId){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email', `pass`='$pass', `isAdmin`='$isAdmin'
                WHERE user_id = $loginid";

        if($this->conn->query($sql)){
            header("Location: edituser.php");
        }else{
            echo "Error in updating user". $this->conn->error; 
        }        
    }

    public function logout(){
        $_SESSION['isLoggedIn'] = false;
        header("Location: login.php");
    }

    public function InsertBloCate($blocateName){
        $sql = "INSERT INTO category(category_name)
                VALUES('$blocateName')";
        
        if($this->conn->query($sql)){
            header("Location: editBlogCategory.php");
        }else{
            echo "Error in adding Blog-Cetegory". $this->conn->error; 
        }
    }

    public function getBloCate(){
        $sql = "SELECT * FROM category";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getBlog(){
        $sql = "SELECT * FROM posts";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function InsertBlog($title,$message,$date,$writer,$bcate,$bpic){
        $sql = "INSERT INTO posts(`post_title`, `post_message`, `post_date`, `user_id`, `category_id`, `post_pic`)
                VALUES('$title','$message','$date','$writer','$bcate','$bpic')";
        
        if($this->conn->query($sql)){
            header("Location: editBlog.php");
        }else{
            echo "Error in adding Blog". $this->conn->error; 
        }
    }


}

?>