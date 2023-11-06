<?php
date_default_timezone_set("Asia/Bangkok");
?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "registrasi");
$id = $_GET['id'];
$data = query("SELECT * FROM registrasi WHERE id = $id")[0];

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}

if ( isset($_POST["submit"]) ){
  if (ubah($_POST) > 0){
    echo "<script> alert('Data berhasil diubah'); </script>";
    header('Location: read.php');
  }
  else{
    echo "<script> alert('Data gagal diubah'); </script>";
    header('Location: read.php');
  }
}

function ubah($sambung){
  global $koneksi;

  $id = $sambung['id'];
  $nama = $sambung["nama"];
  $umur = $sambung["umur"];
  $email = $sambung["email"];
  $jeniskelamin = $sambung["jeniskelamin"];
  $ukuran = $sambung["ukuran"];
  $komentar = $sambung["komentar"];
  $submit = $sambung["submit"];

  $query = "UPDATE registrasi SET nama = '$nama', umur = '$umur', email = '$email', jeniskelamin = '$jeniskelamin', ukuran = '$ukuran', komentar = '$komentar', submit = '$submit' WHERE id = $id";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Stylize.css">
    <title></title>
  </head>
  <body>
    <h1>Ubah Data</h1>
    <form class="" action="" method="post">
      <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
      <label for="">Nama</label>
      <input type="text" name="nama" autocomplete = "off" value = "<?php echo $data['nama']; ?>"> <br>
      <label for="">Umur</label>
      <input type="text" name="umur" autocomplete = "off" value = "<?php echo $data['umur']; ?>"> <br>
      <label for="">Email</label>
      <input type="email" name="email" autocomplete="off" value = "<?php echo $data['email']; ?>"> <br>
      <label for="">Jenis kelamin</label>
      <input type="radio" name="jeniskelamin" value="Pria" <?php if($data["jeniskelamin"] == 'Pria') echo 'checked'; ?> >Pria
      <input type="radio" name="jeniskelamin" value="Wanita" <?php if($data["jeniskelamin"] == 'Wanita') echo 'checked'; ?>>Wanita <br>
      <label for="">Ukuran</label>
      <select class="" name="ukuran">
        <option value="single" <?php if($data["ukuran"] == 'single') echo 'selected'; ?> >Single</option>
        <option value="double" <?php if($data["ukuran"] == 'double') echo 'selected'; ?> >Double</option>
        <option value="single2warna" <?php if($data["ukuran"] == 'single2warna') echo 'selected'; ?> >Single Warna Cerah</option>
        <option value="double2warna" <?php if($data["ukuran"] == 'double2warna') echo 'selected'; ?> >Double Warna Cerah</option>
        
      </select> <br>
      <label for="">Komentar</label> <br>
      <textarea name="komentar" rows="8" cols="80"><?php echo $data['komentar']; ?></textarea> <br>
      <button type="submit" name="submit" value = <?php echo date("h:i:sa"); ?> >Submit</button>
    </form>

  </body>
</html>