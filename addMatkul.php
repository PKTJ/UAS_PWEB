<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap533/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "head.html";
	?>
	<div class="utama">		
		<br><br><br>
		<h3>TAMBAH DATA MATA KULIAH</h3>	
		<form method="post" action="sv_addMatkul.php" enctype="multipart/form-data">            <!--     -->
			<div class="form-group">
				<label for="idmatkul1">Kode:</label>
				<select class="form-control-ku" name="idmatkul1" id="idmatkul1">
					<option value=''>--- pilih ---
					<?php
					$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>
				</select>
				<input class="form-control-ku" type="text" name="idmatkul2" id="idmatkul2">
			</div>
			<div class="form-group">
				<label for="nama">Nama mata kuliah:</label>
				<input class="form-control" type="text" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="sks">SKS:</label>
				<select class="form-control" name="sks" id="sks">
				<option value=''>--- pilih ---
				<?php
				for($i=1;$i<=6;$i++){
					echo "<option value=$i>$i";
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="jns">Jenis</label> 
				<select class="form-control" name="jns" id="jns">
				<option value=''>--- pilih ---
				<?php
				$arrjns=array('T','P','T/P');
				foreach($arrjns as $jns){
					echo "<option value=$jns>$jns";
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="smt">Semester</label> 
				<select class="form-control" name="smt" id="smt">
				<option value=''>--- pilih ---
				<?php
				for($i=1;$i<=8;$i++){
					echo "<option value=$i>$i";
				}
				?>
				</select>
			</div>
			<div>		
				<button class="btn btn-primary" type="text" name="submit" id="submit" value="simpan">Simpan</button>  <!--    -->
			</div>
		</form>
	</div>	
</body>
</html>