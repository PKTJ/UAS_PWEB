<?php
    include "fungsi.php"; // masukan konekasi DB

    // ambil variable
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $email=$_POST["email"];

    // default sukses unggah foto 
    $uploadOk=1;
    // Siapkan terlebih dahulu komponen untuk penyimpan foto
    // 1. Setting lokasi dan nama file foto didalam folder/direktori foto
    $folderupload ="foto/";
    // 2. 
    //basename : mengambil bagian akhir dari direktori tersebut
     $fileupload = $folderupload.basename($_FILES['foto']['name']);      // foto/A12.2018.05555.jpg
     $filefoto = basename($_FILES['foto']['name']);                       // A12.2018.0555.jpg

    //ambil jenis file
    //strtolower() :  mengkonversi string ke huruf kecil
    //Fungsi pathinfo() : digunakan untuk mengembalikan informasi tentang jalur file.
    //PATHINFO_EXTENSION untuk mendapatkan path file name
    $jenisfilefoto = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION)); //jpg,png,gif

    // Check jika file foto sudah ada
    // file_exists(): digunakan untuk memeriksa apakah file atau direktori ada.
    if (file_exists($fileupload)) {
        echo "Maaf, file foto sudah ada<br>";
        $uploadOk = 0;
    }
    //Bahwa variabel $_FILES merupakan sebuah array asosiatif
    //array asosiatif : Ia adalah suatu array di mana key atau kuncinya bukan berupa indeks integer yang dimulai dari 0, akan tetapi yang menjadi key-nya adalah suatu teks bertipe data string
    //Setiap file yang dikirim dari HTML form akan menjadi item dari array $_FILES

    // Check ukuran file
    if ($_FILES["foto"]["size"] > 1000000) 
    {
        echo "Maaf, ukuran file foto harus kurang dari 1 MB<br>";
        $uploadOk = 0;
    }

    // seleksi extension file selain yang ditentukan yaitu jpg, png, jpeg danf gif ditolak
    if($jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg" && $jenisfilefoto != "gif" ) 
    {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
        $uploadOk = 0;
    }
    
  // Pemeriksaan apakah NIM sudah ada dalam database
$sql_check = "SELECT * FROM mhs WHERE nim='$nim'";
$query_check = mysqli_query($koneksi, $sql_check) or die(mysqli_error($koneksi));

if (mysqli_num_rows($query_check) > 0) {
    // NIM sudah ada, berikan pesan kesalahan
    echo "<script>
            alert('Maaf, NIM sudah ada dalam database.');
            window.location.href='addMhs.php'; // Kembali ke halaman addMhs.php
          </script>";
    exit(); // Berhenti di sini karena NIM sudah ada
} else {
    // Jika NIM belum ada, lanjutkan dengan menyimpan data dan foto
    $sql_insert = "INSERT INTO mhs(nim, nama, email, foto) VALUES ('$nim', '$nama', '$email', '$filefoto')";
    $query_insert = mysqli_query($koneksi, $sql_insert) or die(mysqli_error($koneksi));

    // Pindahkan file foto yang diunggah ke folder yang ditentukan
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fileupload)) {
        // Menampilkan pesan sukses menggunakan alert JavaScript
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href='ajaxUpdateMhs.php'; // Kembali ke halaman ajaxUpdateMhs.php
              </script>";
    } else {
        echo "Data gagal tersimpan";
    }
}

    // Check jika terjadi kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat terupload<br>";
        // jika semua berjalan lancar
        } else {
        //move_uploaded_file adalah fungsi bawaan PHP yang berguna untuk mengecek apakah 
        // $lokasi_file telah diupload ke $direktori
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fileupload)) {       
             //membuat query
            $sql="insert mhs values('','$nim','$nama','$email','$filefoto')";
            mysqli_query($koneksi,$sql);
            //header("location:addMhs.php");
           
            require "addMhs.php";
            //echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
        } else {
            echo "Data gagal tersimpan";
        }
    }
?>