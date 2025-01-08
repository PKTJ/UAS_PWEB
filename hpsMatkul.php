<?php
    require "fungsi.php";                                                         

    //memindahkan data ke var biasa
    $idmatkul=$_GET["kode"];

    $sql=$koneksi->query("select * from matkul where idmatkul='$idmatkul'");
    $data=$sql->fetch_assoc();

    $sql=$koneksi->query("select * from matkul where idmatkul='$idmatkul'");

    //membuat query hapus data
    $sql="delete from matkul where idmatkul ='$matkul'";
    mysqli_query($koneksi,$sql);
    header("location:ajaxUpdateMatkul.php");
?>