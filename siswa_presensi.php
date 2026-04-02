<?php 
if (isset($_POST['kode']) && $_POST['kode']=='amikomoke'){
    include 'koneksi.php';


    $nis = $_POST['nis'];
    $kode_sesi = $_POST['kode_sesi'];
    $ambil = $db ->query("SELECT * FROM siswa where nis='$nis'  ");
    $siswa = $ambil ->fetch_assoc();
    if (empty($siswa)){
        $out['hasil'] = "gagal";
        $out['data'] = array();
    }else{
        $ambilsesi = $db ->query("SELECT * FROM sesi where kode_sesi='$kode_sesi'  ");
        $sesi = $ambilsesi ->fetch_assoc();
        if (empty($sesi)){
            $out['hasil'] = "gagal";
            $out['data'] = array();
        }else{
            $id_sesi = $sesi['id_sesi'];
            $ambilpresensi = $db->query("SELECT * FROM presensi WHERE id_sesi='$id_sesi' AND nis='$nis'");

            $presensi = $ambilpresensi ->fetch_assoc();
            if (empty($presensi)){
                $db->query("INSERT INTO presensi (id_sesi,nis) VALUES ('$id_sesi','$nis')");


                $out['hasil'] = "sukses";
                $out['data'] = array();
            }else{
                $out['hasil'] = "sudah";
                $out['data'] = array();
            }
        }
    }
}else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>