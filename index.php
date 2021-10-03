<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        setcookie('username',$username,time()+60*60*24*3,"/");
        setcookie('password',$password,time()+60*60*24*3,"/");
        
        $sql = "SELECT * FROM users WHERE username='$username' && password = '$password' ";
        require_once('connect.php');
        $query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($query);
        if($count==1){
            $_SESSION['users'] = $username;
            header("location:Tugas4.php");
        }
}
    if(isset($_POST['register'])){
        header("location:register.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login Page
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" name="login">
            <h2>Login</h2>
            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="login">LOG IN</button><br><br>
            <button type="submit" name="register">REGISTER</button>
        </form>  
    </body>
</html>