<?php

use Carbon\Carbon;
use Carbon\CarbonInterval;

include('../config/config.php');
require('../../carbon/autoload.php');

$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->format('Y-m-d');
$now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

if (isset($_POST['thoigian'])) {
    $thoigian = $_POST['thoigian'];
} else {
    $thoigian = '';
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
}

if ($thoigian == '7') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
} elseif ($thoigian == '30') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
} elseif ($thoigian == '365') {
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
}
$sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
$sql_query = mysqli_query($mysqli, $sql);

if (!$sql_query) {
    die('SQL Error: ' . mysqli_error($mysqli));
}


$chart_data = array();

while ($val = mysqli_fetch_array($sql_query)) {
    $chart_data[] = array(
        'date' => $val['ngaydat'], // Include the 'date' field
        'order' => $val['donhang'],
        'sales' => $val['doanhthu'],
        'quantity' => $val['soluongban']
    );
}


// Output JSON data
echo $data = json_encode($chart_data);
?>