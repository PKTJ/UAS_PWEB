<?php
require "fungsi.php"			

//ambil variabel dari form
$idmatkul=$_POST["idmatkul"];
$nama=$_POST["nama"];                                          //
$sks=$_POST["sks"];                                            //
$jns=$_POST["jns"];                                            //
$smt=$_POST["smt"];                                            //

$sql="uotade matkul set namamatkul='$nama',					
					    sks='$sks',
						jns='$jns',
						smt='$smt'
						where idmatkul='$idmatkul'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateMatkul.php");
?>