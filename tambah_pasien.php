<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

include 'koneksi.php';
$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No data received."]);
    exit;
}

// Tangkap data
$nama = $data->nama;
$alamat = $data->alamat;
$ttl = $data->ttl;
$jenis_kelamin = $data->jenis_kelamin;
$no_hp = $data->no_hp;
$keluhan = $data->keluhan;
$tgl_daftar = $data->tgl_daftar;
$gol_darah = $data->gol_darah;

$sql = "INSERT INTO pasien (nama, alamat, ttl, jenis_kelamin, no_hp, keluhan, tgl_daftar, gol_darah)
        VALUES ('$nama', '$alamat', '$ttl', '$jenis_kelamin', '$no_hp', '$keluhan', '$tgl_daftar', '$gol_darah')";

if (mysqli_query($koneksi, $sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
}
?>
