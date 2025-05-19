<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Mahasiswa</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        /* CSS untuk tabel responsif */
        .table-responsive-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* Scroll halus untuk iOS */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .student-table {
            width: 100%;
            min-width: 800px; /* Lebar minimum tabel */
            margin-bottom: 0;
        }
        
        .student-table th {
            background-color: #f5f5f5;
            font-weight: bold;
            white-space: nowrap;
            padding: 12px 15px;
        }
        
        .student-table td {
            padding: 10px 15px;
            vertical-align: middle;
            white-space: nowrap;
        }
        
        .student-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .student-table tr:hover {
            background-color: #f1f1f1;
        }
        
        .student-photo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .action-buttons {
            white-space: nowrap;
        }
        
        .btn-edit {
            margin-right: 5px;
        }
        
        /* Untuk desktop - tampilan normal */
        @media (min-width: 992px) {
            .table-responsive-container {
                overflow-x: visible;
            }
            
            .student-table {
                min-width: 100%;
            }
        }
        
        /* Untuk tablet */
        @media (max-width: 991px) {
            .student-table th, 
            .student-table td {
                padding: 8px 10px;
                font-size: 14px;
            }
            
            .student-photo {
                width: 50px;
                height: 50px;
            }
        }
        
        /* Untuk mobile */
        @media (max-width: 767px) {
            .student-table th, 
            .student-table td {
                padding: 6px 8px;
                font-size: 13px;
            }
            
            .btn {
                padding: 3px 6px;
                font-size: 12px;
            }
            
            .student-photo {
                width: 40px;
                height: 40px;
            }
        }
    </style>
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
                        <a class="active-menu" href="table.php"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>
                    <li>
                        <a href="dashboard.php"><i class="fa fa-bar-chart-o fa-3x"></i> Dashboard</a>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Table Formulir Mahasiswa</h2>
                        <div class="alert alert-info">
                            <strong>Info:</strong> Geser tabel ke kanan/kiri untuk melihat semua kolom pada perangkat mobile.
                        </div>
                    </div>
                </div>
                <hr />
                
                <!-- Container untuk tabel responsif -->
                <div class="table-responsive-container">
                    <table class="table student-table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'net.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($data['nim']) ?></td>
                                <td><?= htmlspecialchars($data['nama']) ?></td>
                                <td><?= htmlspecialchars($data['tanggal_lahir']) ?></td>
                                <td><?= htmlspecialchars($data['email']) ?></td>
                                <td><?= htmlspecialchars($data['no_hp']) ?></td>
                                <td><?= htmlspecialchars($data['jenis_kelamin']) ?></td>
                                <td><?= htmlspecialchars($data['jurusan']) ?></td>
                                <?php
                                $agama_query = mysqli_query($koneksi, "SELECT * FROM table_agama WHERE agama = '{$data['agama']}'");
                                $agama_data = mysqli_fetch_array($agama_query);
                                echo '<td>' . ($data['agama']) . '</td>';
                                ?>
                                <td><?= htmlspecialchars($data['alamat']) ?></td>
                                <td><?= htmlspecialchars($data['status']) ?></td>
                                <td>
                                    <?php if ($data['foto']) { ?>
                                        <img src="uploads/foto_profil/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Profil" class="student-photo">
                                    <?php } else { ?>
                                        <span class="text-muted">No Photo</span>
                                    <?php } ?>

                                    
                                </td>
                                <td class="action-buttons">
                                    <a href="edit.php?nim=<?= $data['nim'] ?>" class="btn btn-warning btn-sm btn-edit">Edit</a>
                                    <a href="hapus.php?nim=<?= $data['nim']; ?>" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables dengan konfigurasi responsif
            $('.student-table').DataTable({
                responsive: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                },
                dom: '<"top"lf>rt<"bottom"ip><"clear">'
            });
            
            // Deteksi perangkat mobile dan tambahkan class jika perlu
            function isMobileDevice() {
                return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
            }
            
            if (isMobileDevice()) {
                $('.table-responsive-container').addClass('mobile-view');
            }
        });
    </script>
</body>
</html>