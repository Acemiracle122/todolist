<?php
include 'logic.php';
session_start();

// Inisialisasi array jika belum ada
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Tambah tugas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tugas'])) {
    tambahTugas($_POST['tugas']);
}

/// Ubah status tugas
if (isset($_GET['selesai'])) {
    ubahStatus($_GET['selesai']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Hapus tugas
if (isset($_GET['hapus'])) {
    hapusTugas($_GET['hapus']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(120deg,rgb(10, 21, 22),rgb(5, 7, 2));
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
    }

    .card {
        border: none;
        border-radius: 1.5rem;
        background-color: #ffffff;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.6s ease-in-out;
    }

    h2 {
        font-weight: 700;
        font-size: 2rem;
        text-align: center;
        background: linear-gradient(to right, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 2rem;
    }

    .form-control {
        border-radius: 0.75rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        border-color: #0d6efd;
    }

    .btn-primary {
        border-radius: 0.75rem;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: scale(1.03);
    }

    .todo-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.85rem 1.2rem;
        margin-bottom: 0.75rem;
        border-radius: 1rem;
        background-color:rgb(240, 18, 18);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        animation: fadeIn 0.5s ease;
    }

    .todo-item:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
    }

    .todo-text {
        margin: 0;
        font-size: 1rem;
        color: #333;
        transition: all 0.3s ease;
    }

    .todo-text.done {
        text-decoration: line-through;
        color: #999;
        font-style: italic;
    }

    .btn-action {
        margin-left: 0.4rem;
    }

    .btn-action i {
        font-size: 1rem;
        transition: color 0.2s ease;
    }

    .btn-action:hover i {
        color: #dc3545;
    }

    .input-group .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <h2 class="text-center mb-4 text-primary">📝 ToDo List</h2>

            <!-- Form Tambah -->
            <form method="POST" class="input-group mb-4">
                <input type="text" name="tugas" class="form-control shadow-sm" placeholder="Apa tugasmu hari ini?" required>
                <button type="submit" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah
                </button>
            </form>

            <!-- Daftar Tugas -->
            <?php tampilkanDaftar(); ?>
        </div>
    </div>
</body>
</html>


