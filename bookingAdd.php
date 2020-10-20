<?php

session_start();

include "koneksi.php";

$jadwal             = $_REQUEST['jadwal'];
$user_id            = $_REQUEST['user_id'];
$no_plat            = $_REQUEST['no_plat'];
$jenis_kendaraan    = $_REQUEST['jenis_kendaraan'];
$jenis_cuci         = $_REQUEST['jenis_cuci'];
$created_at         = date('Y-m-d H:i:s');

if($jenis_kendaraan == "Mobil Kecil" && $jenis_cuci == "Cuci Biasa"){
    $harga = "30000";
} else if($jenis_kendaraan == "Mobil Kecil" && $jenis_cuci == "Cuci Hidrolik"){
    $harga = "35000";
} else if($jenis_kendaraan == "Mobil Sedang" && $jenis_cuci == "Cuci Biasa"){
    $harga = "30000";
} else if($jenis_kendaraan == "Mobil Sedang" && $jenis_cuci == "Cuci Hidrolik"){
    $harga = "40000";
} else if($jenis_kendaraan == "Mobil Besar" && $jenis_cuci == "Cuci Biasa"){
    $harga = "30000";
} else if($jenis_kendaraan == "Mobil Besar" && $jenis_cuci == "Cuci Hidrolik"){
    $harga = "45000";
} else {
    $harga = "0";
}

$sql = "INSERT INTO booking VALUES(null, '{$jadwal}', '{$jenis_kendaraan}', '{$jenis_cuci}', '{$no_plat}', '{$user_id}', '{$harga}', 'Antrian', '{$created_at}', null)";

$result = $conn->query($sql);

if($result){

    echo json_encode(array(
        'status'    => 200,
        'message'   => "Berhasil booking cuci kendaraan. Mohon datang sesuai jadwal.",
        'harga'     => $harga 
    ));

} else {
    echo json_encode(array(
        'status'    => 500,
        'message'   => "Gagal booking cuci kendaraan. Silahkan coba lagi pada kesempatan berikutnya.",
        'harga'     => $harga 
    ));
}

?>