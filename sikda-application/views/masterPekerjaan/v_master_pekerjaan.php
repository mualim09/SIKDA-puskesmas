<script type="text/javascript" src="<?=base_url()?>assets/customjs/master_pekerjaan.js"></script>

<div class="mycontent">
<div id="dialogpekerjaan" style="color:red;font-size:.75em;display:none" title="Confirmation Required">
  Hapus Data?
</div>
<div class="formtitle">Master Pekerjaan</div>
	<form id="formmasterpekerjaan">
		<div class="gridtitle">Daftar Pekerjaan<span class="tambahdata" id="masterpekerjaanadd">Input Pekerjaan</span></div>
		
		<fieldset style="margin:0 13px 0 13px ">
						<span>
						<label>Cari Pekerjaan </label>
						<input type="text" name="caripekerjaan" class="caripekerjaan" id="namapekerjaan"/>
						<input type="submit" class="cari" value="&nbsp;Cari&nbsp;" id="carimasterpekerjaan"/>
						<input type="submit" class="reset" value="&nbsp;Reset&nbsp;" id="resetmasterpekerjaan"/>
						</span>	
					</fieldset>
		
		<div class="paddinggrid">
		<table id="listmasterpekerjaan"></table>
		<div id="pagermasterpekerjaan"></div>
		</div >
	</form>
</div>