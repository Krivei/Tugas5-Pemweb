<?php
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if($username!='' && $password!=''){
            $sql = "INSERT INTO users(username,password) VALUES ('$username','$password')";
            include_once('connect.php');
            $query = mysqli_query($conn,$sql);
            if($query){
                echo "The username is registered successfully!";
            } else {
                echo "registration failed";
            }
        }
    }
    if(isset($_POST['back'])){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Register Page
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" name="login">
            <h2>Registration Form</h2>
            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name"><br>
            
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            
            <button type="submit" name="register">REGISTER</button>
            <button type="submit" name="back">Back to the Login Page</button>
        </form>
        
        
    </body>
</html>