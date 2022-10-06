<?php

@$halaman = $_GET['halaman'];

if ($halaman == "departemen")
{
    //tampilkan halaman data siswa
    //echo "Tampil halaman data siswa";
    include "modul/departemen/departemen.php";
}
elseif ($halaman == "pengirim_data")
{
    //Tampilkan halaman data pengirim
    include "modul/data_maskapai/data_siswa.php";
}
elseif($halaman == "arsip_surat")
{
    //Tampilkan halaman arsip surat
    if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus"){
        include "modul/arsip/form.php";
    }else{
        include "modul/pergiloka/data.php";
    }
}
else
{
    //echo "tampil halaman home";
    include "modul/home.php";
}
?>