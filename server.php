<?php
  session_start();
  $nama = "";
  $alamat = "";
  $jurusan = "";
  $nohp = "";
  $id = 0;
  $edit_state = false;
$db = mysqli_connect('localhost','root','','mahasiswa');
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $nohp = $_POST['nohp'];
  $jurusan = $_POST['jurusan'];
  $query = "INSERT INTO informasi(nama,alamat,nohp,jurusan) VALUES('$nama','$alamat',$nohp,'$jurusan')";
  mysqli_query($db, $query);
  header('location: index.php');
}

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $nohp = $_POST['nohp'];
  echo $jurusan = $_POST['jurusan'];
  $id = $_POST['id'];
  $query = "UPDATE informasi SET nama='$nama',alamat='$alamat',nohp=$nohp,jurusan='$jurusan' WHERE id=$id";
  $result = mysqli_query($db, $query);
  if(!$result){
    echo "Gagal Koneksi" . mysqli_error();
  }
  header('location: index.php');
}
if (isset($_GET['del'])) {
  $id =  $_GET['del'];
  mysqli_query($db, "DELETE FROM informasi WHERE id=$id");
  header('location: index.php');
}
$result = mysqli_query($db, "SELECT *FROM informasi");
?>
