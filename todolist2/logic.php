<?php

// Tambahkan tugas ke array
function tambahTugas($teks) {
    $_SESSION['tasks'][] = [
        'teks' => htmlspecialchars($teks),
        'status' => 'belum'
    ];
}

// Toggle status selesai ↔ belum
function ubahStatus($index) {
    if (isset($_SESSION['tasks'][$index])) {
        $status = $_SESSION['tasks'][$index]['status'];
        $_SESSION['tasks'][$index]['status'] = $status === 'belum' ? 'selesai' : 'belum';
    }
}

// Hapus tugas berdasarkan index
function hapusTugas($index) {
    if (isset($_SESSION['tasks'][$index])) {
        array_splice($_SESSION['tasks'], $index, 1);
    }
}

// Tampilkan daftar tugas
function tampilkanDaftar() {
    if (empty($_SESSION['tasks'])) {
        echo "<p class='text-muted'><em>Belum ada ToDo List.</em></p>";
        return;
    }

    echo "<ul class='list-group'>";
    foreach ($_SESSION['tasks'] as $i => $task) {
        $checked = $task['status'] === 'selesai' ? 'checked' : '';
        $textStyle = $task['status'] === 'selesai' ? 'text-decoration-line-through text-muted' : '';
        $badgeColor = $task['status'] === 'selesai' ? 'success' : 'secondary';

        echo "
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <div class='form-check'>
                <input class='form-check-input me-2' type='checkbox' onclick=\"location.href='?selesai=$i'\" $checked>
                <label class='form-check-label $textStyle'>{$task['teks']}</label>
                <span class='badge bg-$badgeColor ms-2'>{$task['status']}</span>
            </div>
            <a href='?hapus=$i' class='btn btn-sm btn-outline-danger'>Hapus</a>
        </li>";
    }
    echo "</ul>";
}
