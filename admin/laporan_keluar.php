<html>
<head><title>Laporan</title>
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
<form method="get" action="cetak_pdf_keluar.php">
    <table align="center">
      <tr>
        <td colspan="9"><center> <h2> HALAMAN LAPORAN</h2></center></td>
      </tr>
      <tr>
        <td colspan="9"><center> <strong>BARANG KELUAR</strong></center></td>
      </tr>
      <tr>
        <td colspan="9"><center> <h1>  </h1></center></td>
      </tr>
      <tr>
        <td> BULAN </td>
        <td> &nbsp;&nbsp; </td>
        <td>
      <select name="Bulan" class="form-control">
        <option value="1"> Januari </option>
        <option value="2"> Februari </option>
        <option value="3"> Maret </option>
        <option value="4"> April </option>
        <option value="5"> Mei </option>
        <option value="6"> Juni </option>
        <option value="7"> Juli </option>
        <option value="8"> Agustus </option>
        <option value="9"> September </option>
        <option value="10"> Oktober </option>
        <option value="11"> Nopember </option>
        <option value="12"> Desember </option>
      </select>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>TAHUN</td>
      <td>&nbsp;&nbsp;</td>
      <td>
        <select name="Tahun" class="form-control">
        <?php 
          for($i=2019; $i<=2030; $i++){
            ?>
            <option><?= $i; ?></option>
          <?php } ?>
        </select>
      </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" align="center"><input type="submit" value="Export PDF" class="btn btn-primary"></td>
      </tr>
  </thead>
</table>

</body>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
