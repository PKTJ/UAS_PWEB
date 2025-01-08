<?php
include "fungsi.php";                           

//ambil variabel dari form
$idmatkul=$_POST["idmatkul1"].".".$_POST["idmatkul2"];
$namamatkul=$_POST["nama"];                                    //
$sks=$_POST["sks"];                                            //
$jns=$_POST["jns"];                                            //
$smt=$_POST["smt"];

// Pemeriksaan apakah id matkul sudah ada dalam database
$sql_check = "SELECT * FROM matkul WHERE idmatkul = '$idmatkul'";
$query_check = mysqli_query($koneksi, $sql_check) or die(mysqli_error($koneksi));

if (mysqli_num_rows($query_check) > 0) {
    // Jika idmatkul sudah ada, tampilkan pesan kesalahan
    echo "<script>
            alert('Maaf, Mata kuliah sudah ada dalam database.');
            window.location.href='addMatkul.php';
          </script>";
    exit();
} else {
    // Jika matakuliah belum ada, lakukan query insert
    $sql_insert = "INSERT INTO matkul (idmatkul, namamatkul, sks, jns, smt) 
                   VALUES ('$idmatkul', '$namamatkul', '$sks', '$jns', '$smt')";
    $query_insert = mysqli_query($koneksi, $sql_insert) or die(mysqli_error($koneksi));

    if ($query_insert) {
        // Menampilkan pesan sukses menggunakan alert JavaScript
        echo "<script>
                alert('Data telah tersimpan!');
                window.location.href='ajaxUpdateMatkul.php'; // Redirect ke halaman update
              </script>";
    } else {
        echo "Gagal menyimpan data mata kuliah!";
    }
}
?>