<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $updateSql = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username' , password='$hashed_password', role='$role', alamat='$alamat', email='$email' WHERE id = $user";

    if (mysqli_query($koneksi, $updateSql)) {
        echo "updated successfully!";
        header("Location: ../admin/pengguna.php");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($koneksi);
    }
} else {
    exit();
}
?>