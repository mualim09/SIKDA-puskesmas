<script type="text/javascript" src="<?=base_url()?>assets/customjs/master_pendidikan.js"></script>

<div class="mycontent">
<div id="dialogpendidikan_new" style="color:red;font-size:.75em;display:none" title="Confirmation Required">
  Hapus Data?
</div>
<div class="formtitle">Master Data Pendidikan</div>
	<form id="formmaster_pendidikan">
		<div class="gridtitle">Daftar Data Pendidikan<span class="tambahdata" id="master_pendidikan_add">Input Data Pendidikan</span></div>
		
		<fieldset style="margin:0 13px 0 13px ">
						<span>
						<label>Cari Pendidikan </label>
						<input type="text" name="kodependidikan" class="kodependidikan" id="kodependidikanmaster_pendidikan"/>
						<input type="submit" class="cari" value="&nbsp;Cari&nbsp;" id="carimaster_pendidikan"/>
						<input type="submit" class="reset" value="&nbsp;Reset&nbsp;" id="resetmaster_pendidikan"/>
						</span>	
					</fieldset>
		
		<div class="paddinggrid">
		<table id="listmaster_pendidikan"></table>
		<div id="pagermaster_pendidikan"></div>
		</div >
	</form>
</div>
