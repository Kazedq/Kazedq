<?php 
//menambahkan koneksi
include '../koneksi.php';

//menangkap data yang di kirim dari url
$id_pesanan = $_POST["id_pesanan"];

// menghapus data dari tabel databases
$result4 = mysqli_query($koneksi, "delete from pesanan where id_pesanan='$id_pesanan'");
if($result4){
    //Sesudah Menginput Di alihkan Ke halaman index
    header("location:pesanan.php");
    }else{
    
        // alihkan ke halaman login kembali
        header("location:pesanan.php?pesan=gagal check out");
    }	
  ?>