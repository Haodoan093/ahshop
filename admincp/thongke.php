<?php
require ('../Carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;



Carbon::setLocale('vi'); // Đặt ngôn ngữ cho Carbon

// In thời gian hiện tại ở múi giờ Asia/Ho-Chi-Minh
printf("Now: %s", Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s'));

?>