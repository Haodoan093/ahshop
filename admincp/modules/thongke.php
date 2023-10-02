<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;

include ('../config/config.php');
require ('../../carbon/autoload.php');


    // if (isset($_POST['thoigian'])) {
    //     $thoigian = $_POST['thoigian'];
    // } else {
    //     $thoigian = '';
    //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    // }

    // if ($thoigian == '7ngay') {
    //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    // } elseif ($thoigian == '28ngay') {
    //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    // } elseif ($thoigian == '90ngay') {
    //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
    // } elseif ($thoigian == '365ngay') {
    //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    // }
 $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
    $sql_query = mysqli_query($mysqli, $sql);
  echo $sql_query;
  
        
       
    while ($val = mysqli_fetch_array($sql_query)) {
        $chart_data[] = array(
            'date' => $val['ngaydat'], // Include the 'date' field
            'order' => $val['donhang'],
            'sales' => $val['doanhthu'],
            'quantity' => $val['soluongban']
        );
    }
    

        // Echo the JSON-encoded data directly
        $data=  json_encode($chart_data);
       echo $data;
?>