<?php
  include('server.php');
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT *FROM informasi WHERE id = $id");
    $record = mysqli_fetch_array($rec);
    $nama = $record['nama'];
    $alamat = $record['alamat'];
    $nohp = $record['nohp'];
    $jurusan = $record['jurusan'];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    body{background-color: #ccffff;}
  </style>
  <body>
    <h1>Biodata Mahasiswa</h1>
    <table border="1">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No. HP</th>
          <th>Jurusan</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><?php echo $row['nama']?></td>
            <td><?php echo $row['alamat']?></td>
            <td><?php echo $row['nohp']?></td>
            <td><?php echo $row['jurusan']?></td>
            <td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</td>
            <td><a href="server.php?del=<?php echo $row['id']; ?>">Delete</td>

          <?php } ?>
          </tr>
      </tbody>
    </table>
    <form method="post" action="server.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="input-type">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama..."
        value="<?php echo $nama; ?>">
      </div>
      <div class="input-type">
        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Masukkan Alamat..."
        value="<?php echo $alamat; ?>">
      </div>
      <div class="input-type">
        <label>No. HP</label>
        <input type="text" name="nohp" placeholder="Masukkan Nomor HP"
        value="<?php echo $nohp; ?>">
      </div>
        <div class="input-type">
          <label>Jurusan</label>
          <input type="text" name="jurusan" placeholder="Masukkan Jurusan"
          value="<?php echo $jurusan; ?>">
        </div>
      <div class="input-type">
        <?php if ($edit_state == false): ?>
          <button type="submit" name="submit" class="button">Submit</button>
          <?php else: ?>
          <button type="submit" name="update" class="button">Update</button>
        <?php endif; ?>
      </div>
    </form>
  </body>
</html>
