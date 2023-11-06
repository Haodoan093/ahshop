<?php
require('../../../tfpdf.php');
require("../../config/config.php");
$sql_donhang= "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham
AND tbl_cart_details.code_cart='$_GET[code]' ORDER BY tbl_cart_details.id_cart_details DESC";
$query_donhang = mysqli_query($mysqli,$sql_donhang);

$pdf = new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);

$pdf->SetFillColor(193,229,252);
$pdf->Write(10,'Thông tin đơn hàng:');
	$pdf->Ln(10);

	$width_cell=array(5,35,80,20,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row = mysqli_fetch_array($query_donhang)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['giasp']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['soluongmua']*$row['giasp']),1,1,'C',$fill);
	$fill = !$fill;

	}
	//$pdf->Write(10,'Cam on ban da dat hang tai website cua chung toi.');
	$pdf->Ln(10);
$pdf->Output();
?>