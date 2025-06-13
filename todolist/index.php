<?php
include 'logic.php'; // Memanggil logika terpisah

// Inisialisasi session & array
session_start();
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Proses tambah tugas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tugas'])) {
    tambahTugas($_POST['tugas']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ToDo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> Daftar ToDo List</h1>

    <!-- Form Tambah Tugas -->
    <form method="POST">
        <input type="text" name="tugas" placeholder="Masukkan ToDo List..." required>
        <button type="submit">Tambah</button>
    </form>

    <hr>

    <!-- Tampilkan Daftar -->
    <?php tampilkanDaftar(); ?>
</body>
</html>
