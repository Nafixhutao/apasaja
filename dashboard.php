<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Mahasiswa - UMCI</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/css/next.css" rel="stylesheet" />
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">UMCI</a> 
            </div>
            <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"> Last access : 5 May 2025 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav>   
        <!-- /. NAV TOP -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a href="dashboard.php" class="active-menu"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="table.php"><i class="fa fa-table fa-fw"></i> Data Mahasiswa</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-edit fa-fw"></i> Form Pendaftaran</a>
                    </li>
                    
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Dashboard Mahasiswa</h2>
                        <h5>Selamat datang di Sistem Informasi Mahasiswa UMCI</h5>
                    </div>
                </div>
                <hr />
                
                <!-- Statistik Utama -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <?php
                            include ("net.php");
                            $query = mysqli_query($koneksi,"SELECT COUNT(nim) as jumlah FROM  mahasiswa");
                            $x1 = mysqli_fetch_array($query);
                            ?>
                            <div class="value"><?=($x1['jumlah'])?></div>
                            <div class="label">Total Mahasiswa</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card">
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <?php
                           $query=mysqli_query($koneksi,"SELECT  COUNT(*) AS  jml FROM mahasiswa WHERE jurusan  = 'bisnis digital' ");
                            $x = mysqli_fetch_array($query);

                            ?>
                            <div class="value"><?=($x['jml'])?></div>
                            <div class="label">Mahasiswa Akuntansi</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card">
                            <?php
                            $query=mysqli_query($koneksi,"SELECT  COUNT(*) AS  jml FROM mahasiswa WHERE jurusan  = 'teknik informatika' ");
                            $x2 = mysqli_fetch_array($query);
                            ?>
                          
                            <div class="value"><?=($x2['jml'])?></div>
                            <div class="label">Mahasiswa IT</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card">
                            <div class="icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="value">47</div>
                            <div class="label">Wisuda Bulan Ini</div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <!-- Grafik Pendaftaran -->
                        <div class="chart-container">
                            <h4>Grafik Pendaftaran Mahasiswa</h4>
                            <div style="height: 250px; background: url('assets/img/chart-placeholder.png') center no-repeat; background-size: contain;">
                                <!-- Tempat untuk grafik -->
                            </div>
                        </div>
                        
                        <!-- Tabel Mahasiswa Terbaru -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Mahasiswa Terdaftar Terbaru</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3/32/3422-3444-4</td>
                                                <td>WIRDA MASUTION</td>
                                                <td>Teknik Informatika</td>
                                                <td>2025-05-01</td>
                                                <td><span class="label label-success">Aktif</span></td>
                                            </tr>
                                            <tr>
                                                <td>43535</td>
                                                <td>WIRDA MASUTION</td>
                                                <td>Sistem Informasi</td>
                                                <td>2025-05-01</td>
                                                <td><span class="label label-success">Aktif</span></td>
                                            </tr>
                                            <tr>
                                                <td>3/31/3131231</td>
                                                <td>nuil</td>
                                                <td>Teknik Komputer</td>
                                                <td>2025-04-30</td>
                                                <td><span class="label label-success">Aktif</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="table.php" class="btn btn-primary">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <!-- Aktivitas Terkini -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Aktivitas Terkini</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="recent-activity">
                                    <li>
                                        <div class="activity-desc">Mahasiswa baru terdaftar - WIRDA MASUTION</div>
                                        <div class="activity-time">10 menit yang lalu</div>
                                    </li>
                                    <li>
                                        <div class="activity-desc">Data mahasiswa diperbarui - nuil</div>
                                        <div class="activity-time">1 jam yang lalu</div>
                                    </li>
                                    <li>
                                        <div class="activity-desc">Berkas baru diunggah - 43535</div>
                                        <div class="activity-time">3 jam yang lalu</div>
                                    </li>
                                    <li>
                                        <div class="activity-desc">Sistem diperbarui ke versi 2.1</div>
                                        <div class="activity-time">Kemarin</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Aksi Cepat</h4>
                            </div>
                            <div class="panel-body quick-actions">
                                <a href="index.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
                                <a href="#" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Notifikasi</a>
                                <a href="#" class="btn btn-info"><i class="fa fa-print"></i> Cetak Laporan</a>
                                <a href="#" class="btn btn-warning"><i class="fa fa-cog"></i> Pengaturan Sistem</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER -->
        </div>
        <!-- /. PAGE WRAPPER -->
    </div>
    <!-- /. WRAPPER -->

    <!-- SCRIPTS - AT THE BOTTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>
</html>