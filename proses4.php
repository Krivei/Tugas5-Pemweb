<?php



$mysqli = new mysqli('localhost','root','','tugas4') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$nama = '';
$email = '';
$hp = '';

if(isset($_POST['save'])){
    $nama = $_POST['Nama'];
    $email = $_POST['Email'];
    $hp = $_POST['hp'];


    $mysqli->query("INSERT INTO data (nama,email,hp) VALUES('$nama','$email','$hp') ") or 
    die($mysqli->error());

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: tugas4.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: tugas4.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    
        $row = $result->fetch_array();
        $nama = $row['nama'];
        $email = $row['email'];
        $hp = $row['hp'];
    
}
