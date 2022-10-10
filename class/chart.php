<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webnc';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
//Khởi tạo dữ liệu rỗng
$data1 = '';
$data2 = '';
$thang = '';
$brand = '';
//query to get data from the table
$sql = "SELECT concat('Tháng ',MONTH(date_order)) as 'thang', sum(price) as 'data2' FROM tbl_order GROUP BY date_order";
$sql_1 = "SELECT brand , sum(sp_daban) as 'data1' FROM tbl_product GROUP BY brand ";

$result = mysqli_query($mysqli, $sql);
$result_1 = mysqli_query($mysqli, $sql_1);

//Vòng lặp để lấy dữ liệu đầu ra cho biểu đồ
while ($row_1 = mysqli_fetch_array($result_1)) {
    $brand = $brand . '"'. $row_1['brand'].'",';
    $data1 = $data1 . '"'. $row_1['data1'] .'",';
}
$brand = trim($brand,",");
$data1 = trim($data1,",");

//Vòng lặp để lấy dữ liệu đầu ra cho biểu đồ
while ($row = mysqli_fetch_array($result)) {
    $thang = $thang . '"'. $row['thang'].'",';
    $data2 = $data2 . '"'. $row['data2'] .'",';
}
$thang = trim($thang,",");
$data2 = trim($data2,",");
?>