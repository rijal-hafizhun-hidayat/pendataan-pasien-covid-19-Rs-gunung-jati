<?php
	session_start();
	require_once __DIR__ . '/vendor/autoload.php';

	require 'konek.php';
	if ($_SESSION['pilih']) {
		$select = $_SESSION['cari'];
		$tampil = "SELECT * FROM bayar WHERE nama_pembayar LIKE'%$select%'";
		$sql = mysqli_query($konek, $tampil);
	}
	else{
		$tampil = "SELECT * FROM bayar";
		$sql = mysqli_query($konek, $tampil);
	}

	$mpdf = new \Mpdf\Mpdf();
	$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Pasien</title>
</head>
<body>
	<h1 style="text-align: center;">Data Seluruh Pasien</h1>
	<table style="margin-left:auto;margin-right:auto" border="1" cellpadding="10" cellspacing="0">
		<thead style="font-size: 100px;">
			<tr>
				<td>Nomor Ruang Pasien</td>
				<td>Nama Pasien</td>
				<td>Gender Pasien</td>
				<td>Jenis Ruang</td>
			</tr>
		</thead>';
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['level_ruang'] >= 500000 && $row['level_ruang'] < 1000000) {
			$kamar = "Reguler";
		}
		else{
			$kamar = "Premium";
		}

		$html .= '<tbody>
			<tr>
				<td>'.$row['id_bayar'].'</td>
				<td>'.$row['nama_pembayar'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$kamar.'</td>
			</tr>
		</tbody>';}
		$html .= '</table>

		</body>
		</html>';
	$mpdf->WriteHTML($html);
	$mpdf->Output();
	unset($_SESSION['pilih']);
	unset($_SESSION['cari']);
?>