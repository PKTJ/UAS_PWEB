<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap533/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap533/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap533/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script>
		/*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
	</script>		
</head>
<body>
<?php

require "fungsi.php";
require "head.html";

if(isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from matkul where idmatkul like'%$cari%' or	
						  namamatkul like '%$cari%' or
						  sks like '%$cari%' or
						  jns like '%$cari%' or
						  smt like '%$cari%'";
}else{
	$sql="select * from matkul";																		
}
$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$kosong=false;
if (!mysqli_num_rows($hasil)){
	$kosong=true;
}
?>
<div class="utama">
	<h2 class="text-center">Daftar Mata Kuliah</h2>  						
	<span class="float-left" style="margin: 1vh;">
		<a class="btn btn-success" href="sv_addMatkul.php">Tambah Data</a> 		
	</span>
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-success" type="text" style="margin: 1vh;">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data mata kuliah..." autofocus autocomplete="off" id="keyword">
		</form>
	</span>
	<br><br>	
	
	<table class="table table-hover">
	<thead class="thead-light">
	<tr> 																 	
		<th>No.</th>
		<th>Kode</th>
		<th>Nama mata kuliah</th>
		<th>SKS</th>
		<th>Jenis</th>
		<th>Semester</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	
	if ($kosong){
	?>																	   
		<tr><th colspan="6">
			<div class="alert alert-info alert-dismissible fade show text-center">
			Data tidak ada
			</div>
		</th></tr>
		<?php
	}else{
		if($awalData==0){
			$no=$awalData+1;
		}else{
			$no=$awalData;
		}
		while($row=mysqli_fetch_assoc($hasil)){
			?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["idmatkul"]?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["sks"]?></td>
				<td><?php echo $row["jns"]?></td>
				<td><?php echo $row["smt"]?></td>
				
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo $row['idmatkul']?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?kode=<?php echo $row["idmatkul"]?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
				</td>
			</tr>
			<?php 
			$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
																			//
</body>


</html>	
