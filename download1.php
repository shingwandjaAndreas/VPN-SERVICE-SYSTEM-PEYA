<?php
$con = new PDO("mysql:host=localhost;dbname=db_sti;charset=utf8mb4", "root","");

if(isset($_GET['dow'])){
	$path = $_GET['dow'];
	
	$res = mysqli_query("select * FROM upload_pdf WHERE path='$path'");
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header('Content-Length: ' . filesize($path));
	readfile($path);

	
}
?>