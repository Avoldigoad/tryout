<?php 
include '../../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}
$id = $_GET["id"];

$sql = "SELECT * FROM buku WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php while ($rew = mysqli_fetch_assoc($result)) : ?>
    <embed src="../../asset/<?= $rew['pdf'] ?>#toolbar=0" type="application/pdf" style="width:100%; height:663px" />
  <?php endwhile ?>
</body>
</html>