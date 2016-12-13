<script>
$(document).ready(function(){
		$('#form1masterusersedit').ajaxForm({
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
					$.achtung({message: 'Proses Ubah Data Berhasil', timeout:5});
					$("#t75","#tabs").empty();
					$("#t75","#tabs").load('c_master_users'+'?_=' + (new Date()).getTime());
				}
			}
		});
		
		$('#nama_puskesmas_hidden').focus(function(){
			$("#dialog_cari_namapuskesmas").dialog({
				autoOpen: false,
				modal:true,
				width: 500,
				height: 475,
				buttons : {
					"Cancel" : function() {
					  $(this).dialog("close");
					}
				}
			});
			$('#dialog_cari_namapuskesmas').load('c_master_puskesmas/puskesmaspopup?id_caller=form1masterusersedit', function() {
				$("#dialog_cari_namapuskesmas").dialog("open");
			});
		});
		
		$('#master_user_group_hidden').focus(function(){
			$("#dialogcari_master_user_group_id").dialog({
				autoOpen: false,
				modal:true,
				width: 500,
				height: 475,
				buttons : {
					"Cancel" : function() {
					  $(this).dialog("close");
					}
				}
			});
			$('#dialogcari_master_user_group_id').load('c_master_user_group/masterusergrouppopup?id_caller=form1masterusersedit', function() {
				$("#dialogcari_master_user_group_id").dialog("open");
			});
		});
})
</script>
<script>
	$('#backlistmasterusers').click(function(){
		$("#t75","#tabs").empty();
		$("#t75","#tabs").load('c_master_users'+'?_=' + (new Date()).getTime());
	})
</script>
<div class="mycontent">
<div id="	" title="Kecamatan"></div>
<div id="dialogcari_master_user_group_id" title="Group Pengguna"></div>
<div id="dialog_cari_namapuskesmas" title="Puskesmas"></div>
<div class="formtitle">Edit Pengguna</div>
<div class="backbutton"><span class="kembali" id="backlistmasterusers">kembali ke list</span></div>
</br>

<span id='errormsg'></span>
<form name="frApps" id="form1masterusersedit" method="post" action="<?=site_url('c_master_users/editprocess')?>" enctype="multipart/form-data">
	<fieldset>
		<span>
		<label>KD USER</label>
		<input type="text" name="kduser" id="text1" value="<?=$data->KD_USER?>" />
		<input type="hidden" name="id" id="textid" value="<?=$data->KD_USER?>" />
		<input type="hidden" name="kd_kabupaten" id="kd_kabupaten_hidden" value="<?=$data->KD_KABUPATEN?>" readonly  />
		</span>
	</fieldset>
	<fieldset <?=$data->LEVEL=='KABUPATEN'?"style='display:none'":''?>>
		<span>
		<label>KD PUSKESMAS</label>
		<input type="text" name="kdpuskesmas" id="nama_puskesmas_hidden" value="<?=$data->KD_PUSKESMAS?>" readonly  />
		<input type="text" name="nama_puskesmas" id="nama_puskesmas" value="<?=$data->nama_puskesmas?>" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>USER NAME</label>
		<input type="text" name="username" id="text2" value="<?=$data->USER_NAME?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>FULL NAME</label>
		<input type="text" name="fullname" id="text2" value="<?=$data->FULL_NAME?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PASSWORD</label>
		<input type="text" name="userpassword" id="text2" value="<?=$data->USER_PASSWORD?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>EMAIL</label>
		<input type="text" name="email" id="text2" value="<?=$data->EMAIL?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>GROUP ID</label>
		<input type="text" name="idgroup" id="master_user_group_hidden" value="<?=$data->GROUP_ID?>" readonly  />
		<input type="text" name="master_user_group" id="master_user_group" value="<?=$data->nama_group?>" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<input type="submit" name="bt1" value="Proses Data"/>
		</span>
	</fieldset>
</form>
</div >
