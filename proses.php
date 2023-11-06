<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "registrasi");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Pastikan untuk menggunakan parameterized query untuk menghindari SQL Injection
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$jeniskelamin = mysqli_real_escape_string($koneksi, $_POST['jeniskelamin']);
$agama = mysqli_real_escape_string($koneksi, $_POST['ukuran']);
$komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);
$submit = mysqli_real_escape_string($koneksi, $_POST['submit']);

// Query SQL untuk melakukan INSERT data
$query = "INSERT INTO registrasi (nama, umur, email, jeniskelamin, ukuran, komentar, submit) VALUES ('$nama', '$umur', '$email', '$jeniskelamin', '$ukuran', '$komentar', '$submit')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    // Data berhasil dimasukkan, alihkan ke halaman "read.php"
    header('Location: read.php');
    exit;
} else {
    // Jika terjadi kesalahan saat menjalankan query
    echo "Error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
