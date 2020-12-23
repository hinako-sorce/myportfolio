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

    public function getBlogLimit(){
        $sql = "SELECT * FROM posts 
                INNER JOIN users ON posts.user_id = users.user_id
                INNER JOIN category ON posts.category_id = category.category_id
                ORDER BY post_id DESC LIMIT 5";
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
        $sql = "SELECT * FROM products 
                INNER JOIN productCetegory ON products.productCetegory_id = productCetegory.productCetegory_id
                ORDER BY product_id DESC LIMIT 5";
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

    public function displayUser($user_id){
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateUser($fname,$lname,$pcode,$pnumber,$address,$email,$pass,$isAdmin,$loginid){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email', `pass`='$pass', `isAdmin`='$isAdmin'
                WHERE user_id = '$loginid'";

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

    public function InsertProduct($pname,$pprice,$pstock,$pdesc,$ppic,$pCateId){
        $sql = "INSERT INTO products(`product_name`, `product_price`,  `product_stock`,`product_description`, `product_pic`,`productCetegory_id`)
        VALUES('$pname','$pprice','$pstock','$pdesc','$ppic','$pCateId')";

        if($this->conn->query($sql)){
            return 1;
        }else{
            echo "Error in adding products". $this->conn->error; 
            return 0;
        }
    }

    public function getProduct(){
        $sql = "SELECT * FROM products INNER JOIN productCetegory ON products.productCetegory_id = productCetegory.productCetegory_id";
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
        $sql = "SELECT * FROM products 
            INNER JOIN productCetegory ON products.productCetegory_id = productCetegory.productCetegory_id
            WHERE product_id = '$product_id'";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateProduct($pname,$pprice,$pstock,$pdesc,$ppic,$pCateId,$productid){
        $sql = "UPDATE products SET 
                `product_name`= '$pname', `product_price`= '$pprice', product_stock = '$pstock',`product_description`= '$pdesc', `product_pic`='$ppic', `productCetegory_id`='$pCateId'
                WHERE product_id = $productid";


        if($this->conn->query($sql)){
            return 1;
        }else{
            echo "Error in adding products". $this->conn->error; 
            return 0;
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
        $sql = "SELECT * FROM posts 
                INNER JOIN users ON posts.user_id = users.user_id
                INNER JOIN category ON posts.category_id = category.category_id";
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
            return 1;
        }else{
            echo "Error in adding blog". $this->conn->error; 
            return 0;
        }
    }

    public function disPlayBlog($post_id){
        $sql = "SELECT * FROM posts WHERE post_id = '$post_id'";
        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateBlog($postid,$title,$message,$date,$writer,$bcate,$bpic){
        $sql = "UPDATE posts SET post_title ='$title', 
                                    post_message ='$message', 
                                    post_date='$date', 
                                    user_id='$writer', 
                                    category_id='$bcate', 
                                    post_pic='$bpic'
                WHERE post_id = '$postid'";
        
        if($this->conn->query($sql)){
            return 1;
            
        }else{
            echo "Error in adding blog". $this->conn->error; 
            return 0;
        }
    }

    public function InsetOrder($productid,$userid,$qty,$today){
        $sql = "INSERT INTO orders(order_date,order_quantity, user_id, product_id, order_status, pay_id) 
                VALUES ('$today','$qty','$userid','$productid',false, 0)";
        // echo $productid;
        // echo $userid;
        if($this->conn->query($sql)){
            header("Location: user_cart.php");
        }else{
            echo "Error in adding to cart:". $this->conn->error; 
        }
    }

    public function getOrder($user_id){
        $sql = "SELECT * FROM orders 
                INNER JOIN users ON orders.user_id = users.user_id
                INNER JOIN products ON orders.product_id = products.product_id
                INNER JOIN productCetegory ON orders.product_id = products.product_id AND products.productCetegory_id = productCetegory.productCetegory_id
                WHERE orders.user_id = '$user_id'";

        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function btnDeletefromcart($order_id){
        $sql = "DELETE FROM orders WHERE order_id = '$order_id'";

        if($this->conn->query($sql)){
            header("Location: user_cart.php");
        }else{
            echo "Error in deleting Blog". $this->conn->error; 
        }
    }

    public function UserupdateUser($fname,$lname,$pcode,$pnumber,$address,$email,$loginid){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email'
                WHERE user_id = '$loginid'";

        if($this->conn->query($sql)){
            header("Location: user_chechPay.php");
        }else{
            echo "Error in updating user". $this->conn->error; 
        }        
    }

    public function InsertPay($payment,$cardNum,$cardName,$cardMon,$cardYear,$cardCvv,$user_id){
        if($payment == 'Credit Card'){
            $sql = "INSERT INTO payment(`user_id`, `pay_method`, `card_number`, `card_name`, `card_mon`, `card_year`, `card_cvv`) 
                    VALUES ('$user_id','$payment','$cardNum','$cardName','$cardMon','$cardYear','$cardCvv')";       
            if($this->conn->query($sql)){
                $_SESSION['pay_id'] = mysqli_insert_id($this->conn);
                header("Location: user_checkConf.php");
            }else{
                echo "Error in adding to cart:". $this->conn->error; 
            }
        }elseif($payment == 'Bank Transaction'){
            $sql = "INSERT INTO payment(`user_id`, `pay_method`, `card_number`, `card_name`, `card_mon`, `card_year`, `card_cvv`) 
                    VALUES ('$user_id','$payment',0,0,0,0,0)";
            if($this->conn->query($sql)){
                $_SESSION['pay_id'] = mysqli_insert_id($this->conn);
                header("Location: user_checkConf.php");
            }else{
                echo "Error in adding to cart:". $this->conn->error; 
            }
        }
    }

    public function UserupdateUserBack($fname,$lname,$pcode,$pnumber,$address,$email,$loginid){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email'
                WHERE user_id = '$loginid'";

        if($this->conn->query($sql)){
            header("Location: user_checkConf.php");
        }else{
            echo "Error in updating user". $this->conn->error; 
        }        
    }

    public function displayPayment($pay_id){
        $sql = "SELECT * FROM payment WHERE pay_id = '$pay_id'";

        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();
        return $row;
    }

    public function PayUpdate($payment,$cardNum,$cardName,$cardMon,$cardYear,$cardCvv,$user_id,$pay_id){
        if($payment == 'Credit Card'){
            $sql = "UPDATE payment SET 
                    `user_id`='$user_id', `pay_method`='$payment', `card_number`='$cardNum', `card_name`='$cardName', `card_mon`='$cardMon', `card_year`='$cardYear', `card_cvv`='$cardCvv'
                    WHERE pay_id = '$pay_id'";

            if($this->conn->query($sql)){
                header("Location: user_checkConf.php");
            }else{
                echo "Error in updating user". $this->conn->error; 
            }        
        }
        if($payment == 'Bank Transaction'){
            $sql = "UPDATE payment SET 
                    `user_id`='$user_id', `pay_method`='$payment', `card_number`='0', `card_name`='0', `card_mon`='0', `card_year`='0', `card_cvv`='0'
                    WHERE pay_id = '$pay_id'";

            if($this->conn->query($sql)){
                header("Location: user_checkConf.php");
            }else{
                echo "Error in updating user". $this->conn->error; 
            }        
        }
    }

    public function orderStatusUpdate($today){  
        $order_id = $_SESSION['order_id'];
        $pay_id = $_SESSION['pay_id'];
        $flag = true;

        foreach($order_id as $oid){
            $sql = "UPDATE orders SET
                order_date = '$today',
                order_status = 'P'
                WHERE order_id = '$oid'";

            if($this->conn->query($sql)){
                $sql = "UPDATE orders SET
                pay_id = '$pay_id'
                WHERE order_id = '$oid'";

                if($this->conn->query($sql)){
                    $sql2 = "SELECT * FROM products 
                            INNER JOIN orders ON products.product_id = orders.product_id 
                            WHERE orders.order_id = '$oid'";
                    $ans = $this->conn->query($sql2);
                    $row = $ans->fetch_assoc();
                    $isStock = $row['product_stock'] - $row['order_quantity'];

                    $sql4 = "UPDATE products 
                            INNER JOIN orders ON products.product_id = orders.product_id 
                            SET products.product_stock = '$isStock'
                            WHERE orders.order_id = '$oid'";
                    
                    $result = $this->conn->query($sql4); 
                }  
            }
        }
        if($flag == $result){
            header("Location: user_placeOrder.php");
        }else {
            echo "Error in changing order_status/ pay_id / product_stock : ". $this->conn->error; 
        }
    }

    public function getOrderAdmin(){
        $sql = "SELECT * FROM orders
                INNER JOIN users ON orders.user_id = users.user_id
                INNER JOIN products ON orders.product_id = products.product_id";
        
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function dispalyOrderAdmin($order_id){
        $sql = "SELECT * FROM orders
                INNER JOIN users ON orders.user_id = users.user_id
                INNER JOIN products ON orders.product_id = products.product_id
                WHERE order_id = '$order_id'";
        
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function UserupdateUser_myaccount($fname,$lname,$pcode,$pnumber,$address,$email,$loginid){
        $sql = "UPDATE users SET 
                `first_name`= '$fname', `last_name`= '$lname', `postal_code`='$pcode', `phone_number`='$pnumber', `address`='$address', `email`='$email'
                WHERE user_id = '$loginid'";

        if($this->conn->query($sql)){
            header("Location: user_editUser.php");
        }else{
            echo "Error in updating user". $this->conn->error; 
        }        
    }


}

?>