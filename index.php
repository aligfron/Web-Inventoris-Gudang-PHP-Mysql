 <?php
include "config.php";
session_start();

if(isset($_POST['login'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='$user' AND pass='$pass'");
	$row = mysqli_fetch_array($sql);
	$nama=$row['nama_petugas'];
	$status=$row['level'];

	if ($sql) {
	$_SESSION['nama']=$nama;
	$_SESSION['sts']=$status;
			echo "<script>alert('Welcome $nama :)');</script>";
			echo "<meta http-equiv='refresh' content='0 url=admin/home.php'>";
	}else{
			echo "<script>alert('Username Atau Password Salah..!!!');</script>";
}
}
	
?>
<html>
<head><title>Inventaris</title>

	 <link href="css/aaa.css" rel="stylesheet" type="text/css" /></head>
<body>
	<div class="container">
	
	 <div class="form" align="center">
<form name="login" method="POST" action="index.php"><br><h1>Form Login<h1><center>
		<input type="text" name="user" placeholder="Ketikkan Username" autocomplete="off" required /><br><br>
		<input type="password" name="pass" placeholder="Ketikkan password" autocomplete="off" required /><br><br>
		<input type="submit" name="login" value="Login">
</div>
	 
  </div>
</body>
</html>
?>

