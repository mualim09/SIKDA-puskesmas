<script>
	$('#backlistinspekhotel').click(function(){
		$("#t812","#tabs").empty();
		$("#t812","#tabs").load('t_ds_ukgs'+'?_=' + (new Date()).getTime());
	})
</script>
<style>
input[type=text] {width: 55px!important;}
label{width:295px!important;}
</style>
<div class="mycontent">
<div class="formtitle">Detail Data Gigi</div>
<div class="backbutton"><span class="kembali" id="backlistinspekhotel">kembali ke list</span></div>
</br>

<span id='errormsg'></span>
<form name="frApps" method="post" enctype="multipart/form-data">
	<fieldset>
		<span>
		<label>Propinsi</label>
		<input type="text" readonly  style="width:195px!important" name="" id="textid" value="<?=$data->PROVINSI?>"  />
		<input type="hidden" name="ID" value="<?=$data->ID?>" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kabupaten</label>
		<input type="text" readonly  style="width:195px!important" name="" id="textid" value="<?=$data->KABUPATEN?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kelurahan</label>
		<input type="text" readonly  style="width:195px!important" name="TAHUN" id="tahun_ds_ukgs" value="<?=$data->KELURAHAN?>" required />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Puskesmas</label>
		<input type="text" readonly  style="width:195px!important" name="TAHUN" id="tahun_ds_ukgs" value="<?=$data->PUSKESMAS?>" required />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Bulan</label>
		<select name="BULAN" >
			<option value="">- pilih bulan -</option>
			<option value="01" <?=$data->BULAN=='01'?'selected':'';?> >Januari</option>
			<option value="02" <?=$data->BULAN=='02'?'selected':'';?> >Februari</option>
			<option value="03" <?=$data->BULAN=='03'?'selected':'';?> >Maret</option>
			<option value="04" <?=$data->BULAN=='04'?'selected':'';?> >April</option>
			<option value="05" <?=$data->BULAN=='05'?'selected':'';?> >Mei</option>
			<option value="06" <?=$data->BULAN=='06'?'selected':'';?> >Juni</option>
			<option value="07" <?=$data->BULAN=='07'?'selected':'';?> >Juli</option>
			<option value="08" <?=$data->BULAN=='08'?'selected':'';?> >Agustus</option>
			<option value="09" <?=$data->BULAN=='09'?'selected':'';?> >September</option>
			<option value="10" <?=$data->BULAN=='10'?'selected':'';?> >Oktober</option>
			<option value="11" <?=$data->BULAN=='11'?'selected':'';?> >November</option>
			<option value="12" <?=$data->BULAN=='12'?'selected':'';?> >Desember</option>
		</select>
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Tahun</label>
		<input type="text" readonly name="TAHUN" id="tahun_ds_promkes" value="<?=$data->TAHUN?>" required />
		</span>
	</fieldset>
	</br>
	<div class="subformtitle1">PELAYANAN MEDIK DASAR GIGI UKGS</div>
	<fieldset>
		<span>
		<label>SD UKGS TAHAP III</label>
		<input type="text" readonly name="JML_PMDGU_SD_UKGS_TAHAP_III" value="<?=$data->JML_PMDGU_SD_UKGS_TAHAP_III?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>SD UKGS INTEGRASI</label>
		<input type="text" readonly name="JML_PMDGU_SD_UKGS_INTEGRASI" value="<?=$data->JML_PMDGU_SD_UKGS_INTEGRASI?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH MURID LAKI-LAKI SD KLS V DAN VI UKGS SELEKTIF TAHAP III</label>
		<input type="text" readonly name="JML_PMDGU_L_SD_V_VI_UKGS_III" value="<?=$data->JML_PMDGU_L_SD_V_VI_UKGS_III?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH MURID LAKI-LAKI SD KLS V DAN VI UKGS SELEKTIF TAHAP III YG SELESAI PERAWATAN</label>
		<input type="text" readonly name="JML_PMDGU_L_SD_V_VI_UKGS_III_PERAWATAN" value="<?=$data->JML_PMDGU_L_SD_V_VI_UKGS_III_PERAWATAN?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH MURID PEREMPUAN SD KLS V DAN VI UKGS SELEKTIF TAHAP III</label>
		<input type="text" readonly name="JML_PMDGU_P_SD_V_VI_UKGS_III" value="<?=$data->JML_PMDGU_P_SD_V_VI_UKGS_III?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH MURID PEREMPUAN SD KLS V DAN VI UKGS SELEKTIF TAHAP III YG SELESAI PERAWATAN</label>
		<input type="text" readonly name="JML_PMDGU_P_SD_V_VI_UKGS_III_PERAWATAN" value="<?=$data->JML_PMDGU_P_SD_V_VI_UKGS_III_PERAWATAN?>"  />
		</span>
	</fieldset>
	</br>
	<div class="subformtitle2">LAKI-LAKI :</div>
	<div class="subformtitle3">PEMERIKSAAN :</div>
	<fieldset>
		<span>
		<label>JUMLAH PEMERIKSAAN BARU</label>
		<input type="text" readonly name="JML_PEMERIKSAAN_L_BARU" value="<?=$data->JML_PEMERIKSAAN_L_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PEMERIKSAAN LAMA</label>
		<input type="text" readonly name="JML_PEMERIKSAAN_L_LAMA" value="<?=$data->JML_PEMERIKSAAN_L_LAMA?>"  />
		</span>
	</fieldset>
	<div class="subformtitle3">DIAGNOSA : </div>
	<fieldset>
		<span>
		<label>JUMLAH CARIES DENTIS</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_C_DENTIS" value="<?=$data->JML_DIAGNOSA_L_C_DENTIS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH KELAINAN PULPA</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_K_PULPA" value="<?=$data->JML_DIAGNOSA_L_K_PULPA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH KELAINAN PERIODONTAL</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_K_PERIODONTAL" value="<?=$data->JML_DIAGNOSA_L_K_PERIODONTAL?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH ABSES</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_ABSES" value="<?=$data->JML_DIAGNOSA_L_ABSES?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PERSISTENSI</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_PERSISTENSI" value="<?=$data->JML_DIAGNOSA_L_PERSISTENSI?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>LAIN-LAIN</label>
		<input type="text" readonly name="JML_DIAGNOSA_L_LAINLAIN" value="<?=$data->JML_DIAGNOSA_L_LAINLAIN?>"  />
		</span>
	</fieldset>
	</br>
	<div class="subformtitle2">PEREMPUAN :</div>
	<div class="subformtitle3">PEMERIKSAAN :</div>
	<fieldset>
		<span>
		<label>JUMLAH PEMERIKSAAN BARU</label>
		<input type="text" readonly name="JML_PEMERIKSAAN_P_BARU" value="<?=$data->JML_PEMERIKSAAN_P_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PEMERIKSAAN LAMA</label>
		<input type="text" readonly name="JML_PEMERIKSAAN_P_LAMA" value="<?=$data->JML_PEMERIKSAAN_P_LAMA?>"  />
		</span>
	</fieldset>
	<div class="subformtitle3">DIAGNOSA :</div>
	<fieldset>
		<span>
		<label>JUMLAH CARIES DENTIS</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_C_DENTIS" value="<?=$data->JML_DIAGNOSA_P_C_DENTIS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH KELAINAN PULPA</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_K_PULPA" value="<?=$data->JML_DIAGNOSA_P_K_PULPA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH KELAINAN PERIODONTAL</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_K_PERIODONTAL" value="<?=$data->JML_DIAGNOSA_P_K_PERIODONTAL?>"  />
		</span>
	</fieldset><fieldset>
		<span>
		<label>JUMLAH ABSES</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_ABSES" value="<?=$data->JML_DIAGNOSA_P_ABSES?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PERSISTENSI</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_PERSISTENSI" value="<?=$data->JML_DIAGNOSA_P_PERSISTENSI?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>LAIN-LAIN</label>
		<input type="text" readonly name="JML_DIAGNOSA_P_LAINLAIN" value="<?=$data->JML_DIAGNOSA_P_LAINLAIN?>"  />
		</span>
	</fieldset>
	<div class="subformtitle3">PERAWATAN :</div>
	<fieldset>
		<span>
		<label>JUMLAH TUMPATAN TETAP PADA GIGI TETAP</label>
		<input type="text" readonly name="JML_PERAWATAN_P_TTP_GIGITETAP" value="<?=$data->JML_PERAWATAN_P_TTP_GIGITETAP?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH TUMPATAN TETAP PADA GIGI SULUNG</label>
		<input type="text" readonly name="JML_PERAWATAN_P_TTP_GIGISULUNG" value="<?=$data->JML_PERAWATAN_P_TTP_GIGISULUNG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH TUMPATAN SEMENTARA</label>
		<input type="text" readonly name="JML_PERAWATAN_P_T_SEMENTARA" value="<?=$data->JML_PERAWATAN_P_T_SEMENTARA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENGOBATAN PULPA</label>
		<input type="text" readonly name="JML_PERAWATAN_P_P_PULPA" value="<?=$data->JML_PERAWATAN_P_P_PULPA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENGOBATAN PERIODENTAL</label>
		<input type="text" readonly name="JML_PERAWATAN_P_P_PERIODENTAL" value="<?=$data->JML_PERAWATAN_P_P_PERIODENTAL?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENGOBATAN ABSES</label>
		<input type="text" readonly name="JML_PERAWATAN_P_P_ABSES" value="<?=$data->JML_PERAWATAN_P_P_ABSES?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH TINDAKAN SCALLING</label>
		<input type="text" readonly name="JML_PERAWATAN_P_T_SCALLING" value="<?=$data->JML_PERAWATAN_P_T_SCALLING?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENCABUTAN GIGI TETAP</label>
		<input type="text" readonly name="JML_PERAWATAN_P_P_GIGITETAP" value="<?=$data->JML_PERAWATAN_P_P_GIGITETAP?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENCABUTAN GIGI SULUNG</label>
		<input type="text" readonly name="JML_PERAWATAN_P_P_GIGISULUNG" value="<?=$data->JML_PERAWATAN_P_P_GIGISULUNG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>LAIN-LAIN</label>
		<input type="text" readonly name="JML_PERAWATAN_P_LAINLAIN" value="<?=$data->JML_PERAWATAN_P_LAINLAIN?>"  />
		</span>
	</fieldset>
	<div class="subformtitle3">PEMBINAAN :</div>
	<fieldset>
		<span>
		<label>JUMLAH PENYULUHAN KESEHATAN GIGI MELALUI KELAS</label>
		<input type="text" readonly name="JML_PEMBINAAN_P_PKGM_KELAS" value="<?=$data->JML_PEMBINAAN_P_PKGM_KELAS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PEMBINAAN KE SD UKGS</label>
		<input type="text" readonly name="JML_PEMBINAAN_P_PKSD_UKGS" value="<?=$data->JML_PEMBINAAN_P_PKSD_UKGS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PEMBINAAN KE DESA UKGMD</label>
		<input type="text" readonly name="JML_PEMBINAAN_P_PKD_UKGM" value="<?=$data->JML_PEMBINAAN_P_PKD_UKGM?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH PENDUDUK YG MENDAPAT PELAYANAN GIGI SEDERHANA OLEH KADER</label>
		<input type="text" readonly name="JML_PEMBINAAN_P_PYMPGSO_KADER" value="<?=$data->JML_PEMBINAAN_P_PYMPGSO_KADER?>"  />
		</span>
	</fieldset><fieldset>
		<span>
		<label>JUMLAH POSYANDU DENGAN KESEHATAN GIGI</label>
		<input type="text" readonly name="JML_PEMBINAAN_P_PDK_GIGI" value="<?=$data->JML_PEMBINAAN_P_PDK_GIGI?>"  />
		</span>
	</fieldset>
</form>
</div >