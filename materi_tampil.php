<?php 
if (isset($_POST['kode']) && $_POST['kode']=='amikomoke'){
    include 'koneksi.php';
$materi = array();
$ambil = $db ->query("SELECT * FROM materi LEFT JOIN kelas ON materi.id_kelas=kelas.id_kelas");
while($tiap = $ambil ->fetch_assoc()){
    $materi[] = $tiap;
}

  $out['hasil'] = "sukses";
  $out['data'] = $materi;
}else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>