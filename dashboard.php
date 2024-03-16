<?php
include "koneksi.php";

$pelanggan = "SELECT * FROM pelanggan";
$jum_pelanggan = mysqli_query($koneksi, $pelanggan);
$jumlah_pelanggan  = mysqli_num_rows($jum_pelanggan);


$produk = "SELECT SUM(Stok) as total FROM produk";
$jum_produk= mysqli_query($koneksi, $produk );
$barang = mysqli_fetch_assoc ($jum_produk);
$totalStok = $barang['total'];


$admin = "SELECT * FROM admin";
$jumlah_admin = mysqli_query($koneksi, $admin);
$jumlah_admin = mysqli_num_rows($jumlah_admin);


$penjualan = "SELECT * FROM penjualan";
$jumlah_penjualan = mysqli_query($koneksi, $penjualan);
$jumlah_penjualan = mysqli_num_rows($jumlah_penjualan);



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
    font-family:'Boogaloo';
    background-image: url(gambar/11.jpg);
}
h2{
    font-family:cursive;
}
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(36, 145, 94);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 80px;
  text-decoration: none;
  display: block;
  text-align: right;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.sidebar {
  height: 100%;
  width: 210px;
  position: fixed;
  z-index: 1;
  top: 1; 
  left: 1;
  background-color: #13130f;
  overflow-x: hidden;
  padding-top: 8px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 210px; /* Same as the width of the sidenav */
  padding: 0px 10px;
  color: rgb(0, 0, 0);
  padding: 20px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

.container {
  padding: 2px 16px;
}
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
}
.icon{
    font-size: 25px;
}
.jaehyun{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
background-color:khaki;
}
.jaemin{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
background-color:lightpink;
}
.jeonghan{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
background-color:peachpuff;
}
.taehyung{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
background-color:paleturquoise;
}
.btn {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 16px 79px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
  cursor: pointer;
}

.btn:hover {
  background-color: #3e8e41;
  color: white;
}




</style>
</head>
<body style="background-color:white;">
<div class="navbar">
  <a href="#home">kasir bakery cake shop</a>
  <div class="dropdown" style="float: right; margin-right: 60px;">
    <button class="dropbtn">Selamat Datang Admin
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <button type="submit" class="btn" onclick="myFunction()">Logout</button>
    <p id="demo"></p>

<script>
function myFunction() {
  var txt;
  if (confirm("Apakah Anda Yakin Logout!!!!")) {
    window.location = "landingpage.html";
  } else {
    window.location = "dashboard.php";
  }
}
</script>
    </div>
  </div> 
</div>

<div class="sidebar">
    <a href="dashboard.php"><i class="fa fa-user-circle"></i>  dashboard</a>
    <br>
    <a href="tampilanpelanggan.php"><i class="fa fa-users"></i>   Pelanggan</a>
    <a href="tampilanproduk.php"><i class="fa fa-fw fa-shopping-cart"></i> Stok Barang</a>
    <a href="tampilanpenjualan.php"><i class="fa fa-fw fa-tags"></i> Penjualan</a>
    <a href="tampilandetailpenjualan.php"><i class="fa fa-bar-chart-o"></i> Detail Penjualan</a>
    <a href="#contact"><i class="fa fa-sign-out"></i>  Logout</a>
  </div>
  
  <div class="main">

<div class="row">
  <div class="column">
    <div class="jeonghan">
      <h3>Jumlah Pelanggan</h3>
      <p class="icon"> <i class="fa fa-user"></i></p>
      <p class="icon"><?php echo "".$jumlah_pelanggan . ""; ?></p>
    </div>
  </div>

  <div class="column">
    <div class="taehyung">
      <h3>Jumlah Stok Barang</h3>
      <p class="icon"> <i class="fa fa-fw fa-shopping-cart"></i></p>
      <p class="icon"><?php echo "". $barang['total']. ""; ?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="jaemin">
      <h3>Jumlah Petugas</h3>
      <p class="icon"><i class="fa fa-address-card"></i></p>
      <p class="icon"><?php echo "".$jumlah_admin . ""; ?></p>
      
    </div>
  </div>
  
  <div class="column">
    <div class="jaehyun">
      <h3>Detail Penjualan</h3>
      <p class="icon"> <i class="fa fa-fw fa-tags"></i></p>
      <p class="icon"><?php echo "".$jumlah_penjualan . ""; ?></p>

      
    </div>
  </div>
</div>
  </div>

</body>
</html>
