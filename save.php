<?php
include("net.php");

if (isset($_POST["kirim"])) {
    $nim     = $_POST["nim"];
    $nama    = $_POST["nama"];
    $tanggal = $_POST["tanggal_lahir"];
    $email   = $_POST["email"];
    $nomor   = $_POST["nomor_telepon"];
    $jurusan = $_POST["jurusan"];
    $gender  = $_POST["gender"];
    $agama   = $_POST["agama"];
    $alamat  = $_POST["alamat"];
    $status  = $_POST["status"];

    $hobi = isset($_POST["hobi"]) ? implode(", ", $_POST["hobi"]) : "";


    $foto_profil = NULL;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/foto_profil/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $file_extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $file_name = 'profile_' . uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $file_name;

        $allowed_types = ['jpg', 'jpeg', 'png'];
        $max_size = 2 * 1024 * 1024;

        if (!in_array($file_extension, $allowed_types)) {
            die("Error: Format file tidak didukung.");
        }

        if ($_FILES['foto']['size'] > $max_size) {
            die("Error: Ukuran file terlalu besar.");
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $foto_profil = $file_name;

        } else {
            die("Error: Gagal mengupload file.");
        }
    }

    $stmt = $koneksi->prepare("INSERT INTO mahasiswa 
    (nim, nama, tanggal_lahir, email, no_hp, jurusan, jenis_kelamin, agama, alamat, hobi, status, foto) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


    $stmt->bind_param("ssssssssssss", 
        $nim, $nama, $tanggal, $email, $nomor, $jurusan, 
        $gender, $agama, $alamat, $hobi, $status, $foto_profil);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data: {$stmt->error}');
            window.history.back();
        </script>";
    }

    $stmt->close();
    $koneksi->close();
}
?>