jQuery().ready(function (){ 
	jQuery("#listmasterKeadaankesehatan").jqGrid({ 
		url:'c_master_keadaan_kesehatan/masterkeadaankesehatanxml', 
		emptyrecords: 'Nothing to display',
		datatype: "xml", 
		colNames:['KODE','id1','Keadaan Kesehatan','Action'],
		rownumbers:true,
		width: 1021,
		height: 'auto',
		mtype: 'POST',
		altRows     : true,		
		colModel:[ 
				{name:'id',index:'id', width:25,align:'center'}, 
				{name:'id1',index:'id1', width:25,align:'center',hidden:true}, 
				{name:'kedkes',index:'kedkes', width:150}, 
				{name:'myid',index:'myid', width:91,align:'center',formatter:formatterAction}
			],
			rowNum:10, 
			rowList:[10,20,30], 
			pager: jQuery('#pagermasterKeadaankesehatan'), 
			viewrecords: true, 
			sortorder: "desc",
			beforeRequest:function(){
				dari=$('#darimasterKeadaankesehatan').val()?$('#darimasterKeadaankesehatan').val():'';
				sampai=$('#sampaimasterKeadaankesehatan').val()?$('#sampaimasterKeadaankesehatan').val():'';
				carinama=$('#carinamamasterKeadaankesehatan').val()?$('#carinamamasterKeadaankesehatan').val():'';
				$('#listmasterKeadaankesehatan').setGridParam({postData:{'dari':dari,'sampai':sampai,'carinama':carinama}})
			}
	}).navGrid('#pagermasterKeadaankesehatan',{edit:false,add:false,del:false,search:false});
	
	function formatterAction(cellvalue, options, rowObject) {
		var content = '';
		content  += '<a rel="' + cellvalue + '" class="icon-detail"  title="View"></a> ';
		content  += '<a rel="' + cellvalue + '" class="icon-edit" title="Edit?"></a>';
		content  += '<a rel="' + cellvalue + '" class="icon-delete" title="Remove?"></a>';
		return content;
	}
	
	$("#listmasterKeadaankesehatan .icon-detail").live('click', function(f){
		if($(f.target).data('oneclicked')!='yes')
		{
			$("#t24","#tabs").empty();
			$("#t24","#tabs").load('c_master_keadaan_kesehatan/detail'+'?id='+this.rel);
		}
		$(f.target).data('oneclicked','yes');
	});
	
	$("#listmasterKeadaankesehatan .icon-edit").live('click', function(f){
		if($(f.target).data('oneclicked')!='yes')
		{
			$("#t24","#tabs").empty();
			$("#t24","#tabs").load('c_master_keadaan_kesehatan/edit'+'?id='+this.rel);
		}
		$(f.target).data('oneclicked','yes');		
	});
	
	function deldata(myid){
		achtungShowLoader();
		$.ajax({
			  url: 'c_master_keadaan_kesehatan/delete',
			  type: "post",
			  data: {id:myid},
			  dataType: "json",
			  success: function(msg){
				if(msg == 'OK'){
					$("#dialogmasterKeadaankesehatan").dialog("close");
					$.achtung({message: 'Proses Hapus Data Berhasil', timeout:5});
					$('#listmasterKeadaankesehatan').trigger("reloadGrid");							
				}
				else{						
					$("#dialogmasterKeadaankesehatan").dialog("close");
					$.achtung({message: 'Maaf Proses Hapus Data Gagal', timeout:5});
				}						
			  }
		  });
		achtungHideLoader();
	}
	
	$("#listmasterKeadaankesehatan .icon-delete").live('click', function(){
		var myid= this.rel;
		$("#dialogmasterKeadaankesehatan").dialog({
		  autoOpen: false,
          modal:true,
		  buttons : {
			"Confirm" : function() {
				deldata(myid);
			},
			"Cancel" : function() {
			  $(this).dialog("close");
			}
		  }
		});
		
		$("#dialogmasterKeadaankesehatan").dialog("open");
	});
	
	$('form').resize(function(e) {
		if($("#listmasterKeadaankesehatan").getGridParam("records")>0){
		jQuery('#listmasterKeadaankesehatan').setGridWidth(($(this).width()-28));
		}
	});
	
	function formattermou(cellvalue, options, rowObject) {
		var content = '';
		if(cellvalue){		
			content  += '<a href="tmp/c_master_keadaan_kesehatan/' + cellvalue + '" style="color:blue;cursor:pointer" title="">download</a>';
		}else{
			content  += ' - ';
		}
		return content;
	}
	
	$('#masterKeadaankesehatanadd').click(function(){
		$("#t24","#tabs").empty();
		$("#t24","#tabs").load('c_master_keadaan_kesehatan/add'+'?_=' + (new Date()).getTime());
	});
	
	$( "#sampaimasterKeadaankesehatan" )
		.keypress(function(event) {
			var keycode =(event.keyCode?event.keyCode:event.which);	
			if(keycode ==13){
				event.preventDefault();
				$('#listmasterKeadaankesehatan').trigger("reloadGrid");
			}
	});
	
	$('#darimasterKeadaankesehatan').datepicker({dateFormat: "dd-mm-yy",changeYear: true,onSelect: function(dateText, inst){$('#sampaimasterKeadaankesehatan').datepicker('option', 'minDate', dateText);$.datepicker._clearDate('#sampaimasterKeadaankesehatan');}});
	$('#sampaimasterKeadaankesehatan').datepicker({dateFormat: "dd-mm-yy",changeYear: true,onClose: function(dateText, inst){$('#listmasterKeadaankesehatan').trigger("reloadGrid");}});
	jQuery.fn.reset = function (){
	  $(this).each (function() { this.reset(); });
	}
	$("#resetmasterKeadaankesehatan").live('click', function(event){
		event.preventDefault();
		$('#formmasterKeadaankesehatan').reset();
		$('#listmasterKeadaankesehatan').trigger("reloadGrid");
	});
	$("#carimasterKeadaankesehatan").live('click', function(event){
		event.preventDefault();
		$('#listmasterKeadaankesehatan').trigger("reloadGrid");
	});
})