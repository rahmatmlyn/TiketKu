<?php
session_start();
//mengatasi jika user langsung masuk menggunakan link, tanpa login
if(empty($_SESSION['id_user']) or empty($_SESSION['username']))
{
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu ya ... :)');
      document.location='index.php';
      </script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Pergiloka</title>
  </head>
  <body>
  <!-- awal menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
<a class="navbar-brand" href="?">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="?">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?halaman=departemen">Maskapai Penerbangan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?halaman=pengirim_data">Data Pemesanan </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?halaman=arsip_surat">Booking Tiket</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
        </div>
        
        </nav>
        <!-- akhir menu -->
        <!-- awal container -->
        <div class="container">