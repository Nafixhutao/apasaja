<?php
include("net.php");

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    
    $result = $koneksi->query("SELECT foto FROM mahasiswa WHERE nim = '$nim'");
    $row = $result->fetch_assoc();

    if (!empty($row['foto'])) {
        $foto_path = "uploads/foto_profil/" . $row['foto'];
        if (file_exists($foto_path)) {
            unlink($foto_path); 
        }
    }

    
    $delete = $koneksi->query("DELETE FROM mahasiswa WHERE nim = '$nim'");

    if ($delete) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'table.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data!');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('NIM tidak ditemukan!');
        window.history.back();
    </script>";
}
?>
