<?php
  include_once("session.php");
?>
<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Tugas 4</title>
  </head>
  <body>
      <?php require_once 'proses4.php'; ?>

      <?php
        if(isset($_SESSION['message'])):
?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
        </div>
        <?php endif ?>

      <div class="container"></div>
      <?php
        $mysqli = new mysqli('localhost','root','','tugas4') or die($mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
       //pre_r($result);
      ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat Email</th>
                        <th>No. HP</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                   while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['hp'];?></td>
                    <td>
                        <a href="Tugas4.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                        <a href="proses4.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                </td>
                </tr>
                <?php endwhile; ?>
            </table>

        </div>

      <?php 
      function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '</pre';
      }
      ?>
      <div class="row justify-content-center">
    <form action="proses4.php" method="POST">
        <input type = "hidden" name = "id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Nama</label>
        <input type="text" name="Nama" class="form-control" value="<?php echo $nama; ?>" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="Email" class="form-control" value="<?php echo $email; ?>"placeholder="Masukkan Email">
        </div>
        <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" name="hp" class="form-control" value="<?php echo $hp; ?>"placeholder="Masukkan No. HP">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
        </div>
    </form>
    <form action="logout.php">
      <button type="submit"> Log Out </button>
    </form>
    </div>
  </body>
</html>