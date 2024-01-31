<html>
<head><title>Input Data Baru</title>
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
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');

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
$jam=date('H:i:s');
echo $_SESSION['sts']; echo " : ";
echo $_SESSION['nama'];

 ?>
<form method="post" action="proses_input_baru.php">
<table align="center">
<tr>  <td>
    <label >Tanggal Masuk :</label></td>
    <td><input type="date"  name="tanggal" value="<?= $tgl ?>"></td></tr>
<tr>  <td>
    <label >Waktu Masuk :</label></td>
    <td><input type="text" name="waktu" value="<?= $jam ?>"></td></tr>
<tr><td> <label >Nama Supplier :</label></td>
      <td><select name="nama_supplier">
    <?php 
      $sql=mysqli_query($koneksi, "SELECT * FROM tb_supplier");
      while ($row=mysqli_fetch_array($sql)) {
      $r = $row['nama_supplier']
     ?>
     <option  value="<?=$row['nama_supplier']?>"> <?= $row['nama_supplier'] ?></option>
     <?php } ?> 
     </select></td></tr>
<tr><td> <label >Nama Barang :</label></td>
    <td><input type="text" name="namab"></td></tr>
<tr>  <td>
    <label >Jenis :</label></td>
    <td><input type="text" name="jenis" value=""></td></tr>
<tr>  <td>
    <label >Kode Barang :</label></td>
    <td><input type="text" name="kode" value=""></td></tr>
<tr>  <td>
    <label >Satuan :</label></td>
    <td><select name="satuan">
       <option value="#">---------Pilih---------</option>
      <option value="Buah">Buah</option>
  <option value="Rim">Rim</option>
  <option value="Kotak">Kotak</option>
  <option value="Pack">Pack</option>
  <option value="Unit">Unit</option>
  <option value="Meter">Meter</option>
     </select></td></tr>
<tr><td> <label >Stok Masuk :</label></td>
    <td><input type="text" name="stokm"></td></tr>
<tr>  <td>
    <label >Petugas :</label></td>
    <td><input type="text" name="petugas" value="<?= $_SESSION['nama']; ?>" readonly></td></tr>
  <tr>  <td colspan="2">
      <input type="submit" class="btn btn-primary" name="submit" value="Input" style="width: 80px; height: 40px; align-content: center;"></td></tr>
      </table>
      </form>
  </div>



</div>
</body>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
