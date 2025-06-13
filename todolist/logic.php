<?php
// Tambahkan tugas ke array session
function tambahTugas($teks) {
    $_SESSION['tasks'][] = [
        'teks' => htmlspecialchars($teks),
        'status' => 'belum'
    ];
}

// Tampilkan daftar tugas
function tampilkanDaftar() {
    if (empty($_SESSION['tasks'])) {
        echo "<p><em>Belum ada tugas.</em></p>";
        return;
    }

    echo "<ul>";
    foreach ($_SESSION['tasks'] as $task) {
        echo "<li>{$task['teks']} - <strong>Status:</strong> {$task['status']}</li>";
    }
    echo "</ul>";
}
