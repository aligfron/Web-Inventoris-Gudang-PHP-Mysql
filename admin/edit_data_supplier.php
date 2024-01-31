<html>
<head><title>Home</title>
<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-light bg-primary ">
    <a class="navbar-brand" href="#"><strong>Inventaris Gudang BAROKAH</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="home.php?page=databarang"><strong>Home</a>
        <a class="nav-item nav-link" href="master_barang.php?page=peminjaman">Master Barang</a>
        <a class="nav-item nav-link" href="master_suplayer.php">Master Suplayer</a>
        <div class="nav-item dropdown bg-primary">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Transsaksi
        </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="barang_masuk.php">Barang Masuk</a>
            <a class="dropdown-item" href="barang_keluar.php">Barang Keluar</a>
          </div>
        </div>
        <div class="nav-item dropdown bg-primary">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Laporan
        </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="laporan_masuk.php">Laporan Barang Masuk</a>
            <a class="dropdown-item" href="laporan_keluar.php">Laporan Barang Keluar</a>
            <a class="dropdown-item" href="laporan_kartu_stok.php">Laporan Kartu Stok</a>
          </div>
        </div>
        <a class="nav-item nav-link" href="../logout.php">Logout</strong></a>
      </div>
          
    </div>

    </div>
  </nav>
<?php 
include "../config.php";
session_start();

    if(!isset($_SESSION['sts'])){
      echo"<script>alert('Anda Belum Login...!!!');</script>";
      echo"<meta http-equiv='refresh' content='0 url=../index.php'>";
    }else if($_SESSION['sts'] != "Admin"){
      echo"<script>alert('Anda Bukan Admin...!!!');</script>";
      echo"<meta http-equiv='refresh' content='0 url=../index.php'>";
    }
 ?>
<div class='container mt-3' 
style="background-color : rgba(167,167,167,0.3); 
     border-radius: 15px;
     padding: 15px;
     ">

<?php 
echo $_SESSION['sts']; echo " : ";
echo $_SESSION['nama'];

 ?>
<br>
<center><h2>EDIT DATA SUPPLIER</h2>
<form method="post" action="proses_edit_supplier.php">
  <?php
$id1 = $_GET['id'];
$qu = mysqli_query($koneksi, "select * from tb_supplier where id_supplier='$id1'");
$re = mysqli_fetch_array($qu);
?> 
<table>
  <tr>
  <td>Id</td>
  <td>:</td>
  <td> <input type="text" name="id" value="<?php echo $id1 ?>" autocomplete="off" readonly></td>
</tr>
<tr>
  <td>Nama Supplier</td>
  <td>:</td>
  <td> <input type="text" name="nama" value="<?php echo $re['nama_supplier']; ?>" autocomplete="off" required></td>
</tr>
<tr>
  <td>Alamat</td>
  <td>:</td>
  <td> <input type="text" name="alamat" value="<?php echo $re['alamat']; ?>" autocomplete="off" required></td>
</tr>
<tr>
  <td>No Tlp</td>
  <td>:</td>
  <td> <input type="text" name="no_tlp" value="<?php echo $re['no_tlp']; ?>" autocomplete="off" required></td>
</tr>
<tr>
  <td>Nama Seles</td>
  <td>:</td>
  <td> <input type="text" name="nama_seles" value="<?php echo $re['nama_seles']; ?>" autocomplete="off" required></td>
</tr>
<tr>
  <td> <input class='btn btn-primary' type='submit' name='submit' value='Edit'></td>
</tr>
</table>
</form></div>
</body>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
