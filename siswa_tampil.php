<?php 
if (isset($_POST['kode']) && $_POST['kode']=='amikomoke'){
    include 'koneksi.php';
    $nis = $_POST['nis'];

    $ambil = $db ->query("SELECT * FROM siswa where nis='$nis' ");
    $siswa = $ambil ->fetch_assoc();
    if (empty($siswa)){
        $out['hasil'] = "gagal";
        $out['data'] = array();
    }else{
        $out['hasil'] = "sukses";
        $out['data'] = $siswa;

    }
}else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>