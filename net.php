<?php
$h="localhost";
$u="root";
$p="";
$data= "db_form";
$koneksi = mysqli_connect($h, $u, $p, $data);
if (mysqli_connect_errno()) {
    echo "error bang". mysqli_connect_error();
}

?>

