<?php
// Include the connection file
include 'net.php';

// Check if the 'nim' parameter is passed in the URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Fetch the student data based on 'nim'
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        // If no data found for the given 'nim', redirect to the table page
        echo "Data not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Handle form submission for updating the data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $foto = $_FILES['foto']['name'];

    // Handle photo upload if a new photo is uploaded
    if ($foto) {
        $target_dir = "uploads/foto_profil/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        $foto = basename($_FILES["foto"]["name"]);
    } else {
        $foto = $data['foto']; // Keep the old photo if none uploaded
    }

    // Update the student data in the database
    $update_query = "UPDATE mahasiswa SET 
        nama = '$nama', 
        tanggal_lahir = '$tanggal_lahir', 
        email = '$email', 
        no_hp = '$no_hp', 
        jenis_kelamin = '$jenis_kelamin', 
        jurusan = '$jurusan', 
        agama = '$agama', 
        alamat = '$alamat', 
        status = '$status', 
        foto = '$foto' 
        WHERE nim = '$nim'";

    if (mysqli_query($koneksi, $update_query)) {
        // Redirect to the form page after update
        header("Location: table.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Formulir Mahasiswa</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f5f5f5;
        }
        .wrapper {
            padding: 20px;
        }
        .form-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .form-header {
            border-bottom: 1px solid #eee;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }
        .form-header h2 {
            color: #2c3e50;
            font-weight: 700;
        }
        .form-group label {
            font-weight: 600;
            color: #555;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            height: auto;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
            padding: 10px 25px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2472a4;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border-color: #7f8c8d;
            padding: 10px 25px;
            font-weight: 600;
        }
        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #6c7a7d;
        }
        .photo-preview {
            margin-top: 15px;
        }
        .photo-preview img {
            border: 3px solid #eee;
            border-radius: 4px;
            max-width: 150px;
        }
        .section-title {
            color: #3498db;
            font-weight: 600;
            margin: 25px 0 15px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 8px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 22px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0; background-color: #2c3e50;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: #fff;">UMCI</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                Last access : 5 May 2025 &nbsp; 
                <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav>

        <div class="wrapper">
            <div class="form-container">
                <div class="form-header">
                    <h2><i class="fa fa-user-edit"></i> Edit Formulir Mahasiswa</h2>
                    <p class="text-muted">Silahkan perbarui data mahasiswa berikut</p>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <h4 class="section-title"><i class="fa fa-info-circle"></i> Informasi Pribadi</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']) ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama" required>
                                    <?php
                                 
                                    $query = mysqli_query($koneksi, "SELECT * FROM table_agama");
                                    while($row = mysqli_fetch_array($query)) {
                                        $selected = ($data['agama'] == $row['agama']) ? 'selected' : '';
                                        echo "<option value='{$row['agama']}' $selected>{$row['agama']}</option>";
                                    }
                                    
                                    ?>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
                    </div>

                    <h4 class="section-title"><i class="fa fa-id-card"></i> Informasi Akademik</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" value="<?= htmlspecialchars($data['nim']) ?>" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="<?= htmlspecialchars($data['status']) ?>" required />
                    </div>

                    <h4 class="section-title"><i class="fa fa-address-book"></i> Kontak</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($data['email']) ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= htmlspecialchars($data['no_hp']) ?>" required />
                            </div>
                        </div>
                    </div>

                    <h4 class="section-title"><i class="fa fa-camera"></i> Foto Profil</h4>
                    <div class="form-group">
                        <label for="foto">Unggah Foto Baru</label>
                        <input type="file" class="form-control" name="foto" id="foto" />
                        <div class="photo-preview">
                            <p class="text-muted">Foto Saat Ini:</p>
                            <?php if ($data['foto']) { ?>
                                <img src="uploads/foto_profil/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Profil" class="img-thumbnail">
                            <?php } else { ?>
                                <div class="alert alert-warning">Tidak ada foto</div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-footer text-right">
                        <a href="table.php" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            // Preview image before upload
            $('#foto').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.photo-preview img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
</body>
</html>