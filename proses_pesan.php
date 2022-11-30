<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$nama_tamu = $_POST['nama_tamu'];
$tipe_kamar = $_POST['tipe_kamar'];


$return = mysqli_query($koneksi, "SELECT id_kamar FROM kamar WHERE tipe_kamar = '$tipe_kamar'");
$data = mysqli_fetch_array($return);

$id_kamar = $data[0];

$karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
$kode_reservasi = substr(str_shuffle($karakter), 0, 10);

//mengirim ke databases
$result3 = mysqli_query($koneksi, "insert into pesanan values('','$cek_in','$cek_out','$tipe_kamar','$jml_kamar','$nama_pemesan','$email_pemesan','$hp_pemesan','$nama_tamu','$id_kamar','1','$kode_reservasi')");
if($result3){
    //Sesudah Menginput Di alihkan Ke halaman index
    header("location:cetak.php?kode_reservasi=$kode_reservasi");
    }else{
    
        // alihkan ke halaman login kembali
        header("location:index2.php?pesan=gagal booking kamar");
    }	
    ?>