<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Sistem</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap533/css/bootstrap.css">
	<script src="bootstrap533/js/bootstrap.js"></script>
	<script src="bootstrap533/jquery/3.3.1/jquery-3.3.1.js"></script>
</head>
<body>
	<div class="container">
		<div class="w-25 mx-auto text-center mt-5">
			<div class="card bg-dark text-light">
				<div class="card-body">
				<h2 class="card-title">LOGIN</h2>	
				<form method="post" action="">
					<div class="form-group">
						<label for="username">Nama user</label>
						<input class="form-control" type="text" name="username" id="username" autofocus>
					</div>			
					<div class="form-group">
						<label for="passw">Password</label>
						<input class="form-control" type="password" name="passw" id="passw">
					</div>			
					<div>		
						<button class="btn btn-info" type="submit" style="margin: 2vh">Login</button>
					</div>
					<div class="form-group">
						<label style="font-size: 0.87em">made by Arbinand RI with love</label>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>
	<?php
	if (isset($_POST['username'])){
		require "fungsi.php";
		$username=$_POST['username'];
		$passw=md5($_POST['passw']);
		$sql="select * from user where username='$username' and password='$passw'";
		$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
		   if (mysqli_num_rows($hasil) > 0){
            $_SESSION['username'] = $username;
            header("location:ajaxUpdateMhs.php");
        } else {
            echo "<div class='alert alert-danger w-75 mx-auto text-center mt-2'>
            Maaf, login gagal. Ulangi login.
            </div>";
        }
	}
	?>	
</body>
</html>