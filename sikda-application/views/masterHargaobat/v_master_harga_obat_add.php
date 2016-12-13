<script>
$(document).ready(function(){
		$('#form1masterhargaobatadd').ajaxForm({
			beforeSend: function() {
				achtungShowLoader();	
			},
			uploadProgress: function(event, position, total, percentComplete) {
			},
			complete: function(xhr) {
				achtungHideLoader();
				if(xhr.responseText!=='OK'){
					$.achtung({message: xhr.responseText, timeout:5});
				}else{
					$.achtung({message: 'Proses Tambah Data Berhasil', timeout:5});
					$("#t23","#tabs").empty();
					$("#t23","#tabs").load('c_master_harga_obat'+'?_=' + (new Date()).getTime());
				}
			}
		});
		
		$('#nama_obat_hidden').focus(function(){
			$("#dialogtransaksi_cari_namaobat").dialog({
				autoOpen: false,
				modal:true,
				width: 500,
				height: 405,
				buttons : {
					"Cancel" : function() {
					  $(this).dialog("close");
					}
				}
			});
			$('#dialogtransaksi_cari_namaobat').load('c_master_obat/masterobatpopup?id_caller=form1masterhargaobatadd', function() {
				$("#dialogtransaksi_cari_namaobat").dialog("open");
			});
		});
})
</script>
<script>
	$('#backlistmasterhargaobat').click(function(){
		$("#t23","#tabs").empty();
		$("#t23","#tabs").load('c_master_harga_obat'+'?_=' + (new Date()).getTime());
	})
</script>
<div id="dialogtransaksi_cari_namaobat" title="Obat"></div>
<div class="mycontent">
<div class="formtitle">Tambah Harga Obat</div>
<div class="backbutton"><span class="kembali" id="backlistmasterhargaobat">kembali ke list</span></div>
</br>

<span id='errormsg'></span>
<form name="frApps" id="form1masterhargaobatadd" method="post" action="<?=site_url('c_master_harga_obat/addprocess')?>" enctype="multipart/form-data">
	<fieldset>
		<span>
		<label>Kode Tarif</label>
		<select name="kd_tarif" id="text1">
		<option value="BS">BS</option>
		<option value="AK">AK</option>
		<option value="AM">AM</option>
		</select></span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kode Obat</label>
		<input type="text" readonly autocomplete="off" name="kd_obat" id="nama_obat_hidden" value="" />
		<input type="text" placeholder="Nama Obat" readonly autocomplete="off" name="namaobat" id="nama_obat" value="" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Harga Beli</label>
		<input type="text" autocomplete="off" name="harga_beli" id="text3" value="" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Harga Jual</label>
		<input type="text" autocomplete="off" name="harga_jual" id="text4" value="" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kode Milik Obat</label>
		<select name="kd_milik_obat" id="text5">

		<?php foreach($data as $d): ?>
			<option value="<?php echo $d->KD_MILIK_OBAT; ?>">
				<?php echo "$d->KD_MILIK_OBAT - $d->KEPEMILIKAN"; ?>
			</option>
			<?php echo $d->KEPEMILIKAN; ?>
		<?php endforeach; ?>
		</select>
		</span>
	</fieldset>
	<fieldset>
		<span>
		<input type="submit" name="bt1" value="Proses Data"/>
		</span>
	</fieldset>
</form>
</div >