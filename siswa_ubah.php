<?php 
if (isset($_POST['kode']) && $_POST['kode']=='amikomoke'){
    include 'koneksi.php';
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];

    $ambil = $db ->query("SELECT * FROM siswa where nis='$nis' ");
    $siswa = $ambil ->fetch_assoc();
    if (empty($siswa)){
        $out['hasil'] = "gagal";
        $out['data'] = array();
    }else{
        if(isset($_POST['password_siswa'])&& !empty($_POST['password_siswa'])) {
            $password_siswa = $_POST['password_siswa'];
            $password_siswa = sha1($password_siswa);
            $db ->query("UPDATE siswa SET nama_siswa='$nama_siswa',password_siswa='$password_siswa' WHERE nis='$nis'");
        }else{
            $db->query("UPDATE siswa SET nama_siswa='$nama_siswa' WHERE nis='$nis'");

        }
        $out['hasil'] = "sukses";
        $out['data'] = $siswa;
    }
}else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>