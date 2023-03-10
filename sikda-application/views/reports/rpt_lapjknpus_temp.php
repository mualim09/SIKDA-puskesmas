<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=base_url()?>assets/report_ppjk/css/style_report.css" />
<body>
<div class="content">
	<div class="title">
	<h1>JUMLAH KUNJUNGAN RAWAT JALAN, RAWAT INAP DAN PERSALINAN PADA FASKES FKTP JKN</h1>
	</div>

	<table width="100%" border="1px">
	
	<tr>
	<td>NAMA PUSKESMAS</td>
	<td>:</td>
	<td colspan='4'><?=$PUSKESMAS?></td>
	</tr>
	
	<tr>
	<td>KODE PUSKESMAS</td>
	<td>:</td>
	<td colspan='4'><?=$KD_PUSKESMAS?></td>
	</tr>
	
	

	<tr>
	<td>BULAN PELAYANAN</td>
	<td>:</td>
	<td><?=$FROM?> - <?=$TO?></td>
	</tr>
	</table>
	<br/>
	
	<table width="100%" border="1px">
	<thead>
	<tr>
		<th rowspan="3">No</th>
		<th rowspan="3">NAMA PUSKESMAS</th>
		<th colspan="15">JUMLAH KUNJUNGAN FKTP</th>
	</tr>	
	<tr>
		<th colspan="2">RAJAL</th>
		<th colspan="2">RANAP</th>
		<th colspan="3">PELAYANAN PERSALINAN</th>
		<th rowspan="2">KB</th>
		<th rowspan="2">DI RUJUK</th>
		<th rowspan="2">RUJUK BALIK</th>
	</tr>
	<tr>
		<th>L</th>
		<th>P</th>
		<th>L</th>
		<th>P</th>
		<th>ANC</th>
		<th>PNC</th>
		<th>NORMAL</th>
	</tr>
	</thead>
	<tbody>
	<?
		$no=1;
		
		$rjl = 0;
		$rjp = 0;
		$ril = 0;
		$rip = 0;
		
		$bANC = 0;
		$bPNC = 0;
		$bNORMAL = 0;
		
		$KB = 0;
		$DIRUJUK = 0;
		$DIRUJUKBALIK = 0;
		foreach($result as $key=>$value){
		
			$rjl += $value['RJ']['L'];
			$rjp += $value['RJ']['P'];
			$ril += $value['RI']['L'];
			$rip += $value['RI']['P'];
			
			$bANC += $value['B']['ANC'];
			$bPNC += $value['B']['PNC'];
			$bNORMAL += $value['B']['NORMAL'];
			
			$KB += $value['KB'];
			$DIRUJUK += $value['DIRUJUK'];
			$DIRUJUKBALIK += $value['DIRUJUKBALIK'];
	?>
	<tr>
		<td><?=$no;?></td>
		<td align="left"><?=$key?></td>
		<td align="center"><?=$value['RJ']['L']?></td>
		<td align="center"><?=$value['RJ']['P']?></td>
		<td align="center"><?=$value['RI']['L']?></td>
		<td align="center"><?=$value['RI']['P']?></td>
		<td align="center"><?=$value['B']['ANC']?></td>
		<td align="center"><?=$value['B']['PNC']?></td>
		<td align="center"><?=$value['B']['NORMAL']?></td>
		<td align="center"><?=$value['KB']?></td>
		<td align="center"><?=$value['DIRUJUK']?></td>
		<td align="center"><?=$value['DIRUJUKBALIK']?></td>
	</tr>
	<?$no++;}?>
	<tr>
		<td colspan="2" align="center">PUSKESMAS</td>
		<td align="center"><?=$rjl?></td>
		<td align="center"><?=$rjp?></td>
		<td align="center"><?=$ril?></td>
		<td align="center"><?=$rip?></td>
		<td align="center"><?=$bANC?></td>
		<td align="center"><?=$bPNC?></td>
		<td align="center"><?=$bNORMAL?></td>
		<td align="center"><?=$KB?></td>
		<td align="center"><?=$DIRUJUK?></td>
		<td align="center"><?=$DIRUJUKBALIK?></td>
	</tr>
	</tbody>
	</table>
	<br/>
	<br/>
</div>
</body>
</html>