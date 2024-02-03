<?php
require_once 'config/data.php';
$id = $_GET['id'];

// Kiểm tra giá trị id
if (!is_numeric($id)) {
    die('Invalid ID');
}

// Lấy DatXeID từ bảng hopdong
$fetchDatXeIDQuery = mysqli_query($connect, "SELECT DatXeID FROM hopdong WHERE HopDongID = $id");

if (!$fetchDatXeIDQuery) {
    die('Error fetching DatXeID: ' . mysqli_error($connect));
}

$fetchDatXeIDRow = mysqli_fetch_assoc($fetchDatXeIDQuery);

if (!$fetchDatXeIDRow) {
    die('No record found for HopDongID = ' . $id);
}

$datXeID = $fetchDatXeIDRow['DatXeID'];

// Cập nhật bảng hopdong và xe
$sql_hopdong = "UPDATE hopdong SET trangthaihopdong = 'Hoàn Thành', TienConLai = 0 WHERE HopDongID = $id";
$query_hopdong = mysqli_query($connect, $sql_hopdong);

if (!$query_hopdong) {
    die('Error updating hopdong: ' . mysqli_error($connect));
}

// Lấy XeID từ bảng datxe dựa trên DatXeID
$fetchXeIDQuery = mysqli_query($connect, "SELECT XeID, NgayNhanXe, NgayTraXe FROM datxe WHERE DatXeID = $datXeID");

if (!$fetchXeIDQuery) {
    die('Error fetching XeID and dates: ' . mysqli_error($connect));
}

$fetchXeIDRow = mysqli_fetch_assoc($fetchXeIDQuery);

if (!$fetchXeIDRow) {
    die('No record found for DatXeID = ' . $datXeID);
}

$xeID = $fetchXeIDRow['XeID'];
$ngayNhanXe = $fetchXeIDRow['NgayNhanXe'];
$ngayTraXe = $fetchXeIDRow['NgayTraXe'];

// Cập nhật bảng xe
$sql_xe = "UPDATE xe SET TinhTrangXe = 'Có sẵn' WHERE XeID = $xeID";
$query_xe = mysqli_query($connect, $sql_xe);

if (!$query_xe) {
    die('Error updating xe: ' . mysqli_error($connect));
}

// Thêm dữ liệu vào bảng soxe
$sql_soXe = "INSERT INTO soxe (XeID, NgayThue, NgayTra, HopDongID) VALUES ($xeID, '$ngayNhanXe', '$ngayTraXe', $id)";
$query_soXe = mysqli_query($connect, $sql_soXe);

if (!$query_soXe) {
    die('Error inserting data into soxe: ' . mysqli_error($connect));
}

// Cập nhật bảng hoadon
$sql_update_hoadon = "UPDATE hoadon SET DaThanhToan = TongTien WHERE HopDongID = $id";
$query_update_hoadon = mysqli_query($connect, $sql_update_hoadon);

if (!$query_update_hoadon) {
    die('Error updating hoadon: ' . mysqli_error($connect));
}

header('location: ac_hopdong.php?page_layout=view_ht');
?>
