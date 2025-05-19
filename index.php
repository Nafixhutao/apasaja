
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><td>FORM</td></a>
            </div>
                <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>
                    <li>
                        <a href="table.php"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li>
                        <a href="dashboard.php"><i class="fa fa-bar-chart-o fa-3x"></i> Dashboard</a>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Form Pendftaran Mahasiswa</h2>
                
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>Form Pendaftaran Mahasiswa Baru</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="save.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group" >
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM Anda">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control"  name="nama"id="nama" placeholder="Masukkan Nama Lengkap">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="ttl">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="ttl">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="email">Email Aktif</label>
                                            <input type="email" class="form-control"  name="email"id="email" placeholder="contoh@email.com">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" class="form-control"  name="nomor_telepon" id="nohp" placeholder="08xxxxxxxxxx">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="prodi">Program Studi</label>
                                            <select class="form-control" id="prodi" name="jurusan">

                                                <option>Teknik Informatika</option>
                                                <option>Sistem Informasi</option>
                                                <option>Teknik Komputer</option>
                                                <option>Manajemen Informatika</option>
                                                <option>Bisnis Digital</option>
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="Laki-laki"> Laki-laki
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="Perempuan"> Perempuan
                                            </label>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="agama" >Agama</label>
                                            <select class="form-control" id="agama" name="agama">
                                          <?php
                                            include 'net.php';
                                            $query = mysqli_query($koneksi, "SELECT * FROM table_agama");
                                            while ($data = mysqli_fetch_array($query)) {
                                                echo "<option value='{$data['id_agama']}'>{$data['agama']}</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="alamat">Alamat Lengkap</label>
                                            <textarea class="form-control"  name="alamat"id="alamat" rows="3"></textarea>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Hobi</label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="hobi[]"  value="Membaca"> Membaca
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="hobi[]"  value="Menulis"> Menulis
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="hobi[]"  value="Olahraga"> Olahraga
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="hobi[]"  value="Musik"> Musik
                                            </label>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="status">Status Mahasiswa</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="Aktif"> Aktif
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="Cuti"> Cuti
                                            </label>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="foto">Upload Foto</label>
                                            <input type="file"  name="foto"class="form-control-file" id="foto">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="berkas">Upload Berkas Pendukung (PDF)</label>
                                            <input type="file" name="berkas" class="form-control-file" id="berkas" accept=".pdf">

                                        </div>
                        
                                        <div class="form-group">
                                            <label>Setuju dengan syarat dan ketentuan</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" required> Ya, saya setuju
                                                </label>
                                            </div>
                                        </div>
                        
                                        <button type="submit" name="kirim" class="btn btn-success">Kirim Formulir</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>

</html>