<?php
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Stylize.css">
    <title>Form PreOrder</title>
  </head>
  <body>
    <h1>Form Order Perusahaan Zahra Florist</h1>
    <hr>
    <form class="" action="proses.php" method="post">
      <label for=""><B>Nama</B></label>
      <input type="text" name="nama" autocomplete = "off" style = "margin-left : 60px"> <br>
      <label for=""><B>Umur</b></label>
      <input type="text" name="umur" autocomplete = "off" style = "margin-left : 62px"> <br>
      <label for=""><B>Email</B></label>
      <input type="email" name="email" autocomplete="off" style = "margin-left : 64px"> <br><br>
      <label for=""><b>Jenis kelamin</b></label> <br>
      <input type="radio" name="jeniskelamin" value="Pria"><i>Pria</i>
      <input type="radio" name="jeniskelamin" value="Wanita"><i>Wanita</i> <br><br>
      <label for=""><b>Jenis Papan Bunga</b></label>
      <select class="" name="ukuran" style = "margin-left : 50px">
        <option value="single">Single</option>
        <option value="double">Dobel</option>
        <option value="single2warna">Single Warna Cerah</option>
        <option value="double2warna">Dobel Warna Cerah</option>
        
      </select> <br><br>
      <label for=""><b>Komentar</b></label> <br>
      <textarea name="komentar" rows="8" cols="80"></textarea> <br>
      <button type="submit" name="submit" value = <?php echo date("h:i:sa"); ?> >Submit</button>
    </form>
    <br>
    <a href="read.php" style = "font-family : Times new roman">Lihat Hasil data </a>
    
  </body>
</html>
