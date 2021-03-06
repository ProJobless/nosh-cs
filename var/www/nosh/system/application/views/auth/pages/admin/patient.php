<script type="text/javascript">
$(document).ready(function() {
	$("#heading2").load("<?php echo site_url("search/loadpage");?>");
	$(document).idleTimeout({
		inactivity: 3600000,
		noconfirm: 10000,
		alive_url: '<?php echo site_url("admin/chartmenu");?>',
		redirect_url: '<?php echo site_url("logout");?>',
		logout_url: '<?php echo site_url("logout");?>',
		sessionAlive: false
	});
	$("#admin_patient_chart_accordion").accordion({ heightStyle: "content" });
	$("#documents_view_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 500, 
		width: 800, 
		modal: true,
		close: function(event, ui) {
			var a = $("#document_filepath").val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/close_document');?>",
				data: "document_filepath=" + a,
				success: function(data){
					$("#embedURL").html('');
					$("#document_filepath").val('');
					$("#view_document_id").val('');
				}
			});	
		}
	});
	$("#save_document").button({
		icons: {
			primary: "ui-icon-disk"
		},
	});
	$("#save_document").click(function() {
		var id = $("#view_document_id").val();
		window.open("<?php echo site_url('admin/chartmenu/view_documents');?>/" + id);
	});
	$("#documents_list").click(function() {
		$("#documents_list_dialog").dialog('open');
	});
	jQuery("#labs").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/labs/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','Type','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:355},
			{name:'documents_type',index:'documents_type',width:1,hidden:true},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#pager8'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Labs",
	 	hiddengrid: true,
	 	height: "100%",
	 	onSelectRow: function(id){
	 		$("#view_document_id").val(id);
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#pager8',{search:false,edit:false,add:false,del:false});
	jQuery("#radiology").jqGrid({
		url:"<?php echo site_url ('admin/chartmenu/radiology/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','Type','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:355},
			{name:'documents_type',index:'documents_type',width:1,hidden:true},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#pager9'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Imaging",
	 	hiddengrid: true,
	 	height: "100%",
	 	onSelectRow: function(id){
	 		$("#view_document_id").val(id);
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#pager9',{search:false,edit:false,add:false,del:false});
	jQuery("#cardiopulm").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/cardiopulm/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','Type','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:355},
			{name:'documents_type',index:'documents_type',width:1,hidden:true},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#pager10'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Cardiopulmonary",
	 	hiddengrid: true,
	 	height: "100%",
	 	onSelectRow: function(id){
	 		$("#view_document_id").val(id);
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#pager10',{search:false,edit:false,add:false,del:false});
	jQuery("#endoscopy").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/endoscopy/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','Type','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:355},
			{name:'documents_type',index:'documents_type',width:1,hidden:true},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#pager11'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Endoscopy",
	 	hiddengrid: true,
	 	height: "100%",
	 	onSelectRow: function(id){
	 		$("#view_document_id").val(id);
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#pager11',{search:false,edit:false,add:false,del:false});
	jQuery("#letters").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/letters/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','Type','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:355},
			{name:'documents_type',index:'documents_type',width:1,hidden:true},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#pager15'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Letters",
	 	hiddengrid: true,
	 	height: "100%",
	 	onSelectRow: function(id){
	 		$("#view_document_id").val(id);
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#pager15',{search:false,edit:false,add:false,del:false});
	jQuery("#encounters").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/encounters/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','Chief Complaint'],
		colModel:[
			{name:'eid',index:'eid',width:1,hidden:true},
			{name:'encounter_DOS',index:'encounter_DOS',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'encounter_cc',index:'encounter_cc',width:660}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#encounters_pager'),
		sortname: 'encounter_DOS',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Encounters - Click on encounter to view your instructions for this visit.",
	 	height: "100%",
	 	onSelectRow: function(id) {
	 		$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/view_instructions');?>/" + id,
				dataType: "json",
				success: function(data){
					$("#embedURL").html(data.html);
					$("#document_filepath").val(data.filepath);
					$("#documents_view_dialog").dialog('open');
				}
			});
	 	},
	 	hiddengrid: true,
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#encounters_pager',{search:false,edit:false,add:false,del:false});
	jQuery("#medications").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/medications/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date Active','Due Date','Medication','Dosage','Unit','SIG','Route','Frequency','Special Instructions','Reason'],
		colModel:[
			{name:'rxl_id',index:'rxl_id',width:1,hidden:true},
			{name:'rxl_date_active',index:'rxl_date_active',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'rxl_due_date',index:'rxl_due_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'rxl_medication',index:'rxl_medication',width:280},
			{name:'rxl_dosage',index:'rxl_dosage',width:50},
			{name:'rxl_dosage_unit',index:'rxl_dosage_unit',width:50},
			{name:'rxl_sig',index:'rxl_sig',width:50},
			{name:'rxl_route',index:'rxl_route',width:1,hidden:true},
			{name:'rxl_frequency',index:'rxl_frequency',width:105},
			{name:'rxl_instructions',index:'rxl_instructions',width:1,hidden:true},
			{name:'rxl_reason',index:'rxl_reason',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#medications_pager'),
		sortname: 'rxl_date_active',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Medications",
	 	height: "100%",
	 	onSelectRow: function(id){
	 		var med = jQuery("#medications").getCell(id,'rxl_medication');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/past_medication');?>",
				data: "rxl_medication=" + med,
				dataType: "json",
				success: function(data){
					$.jGrowl(data.item, {sticky:true, header:data.header});
				}
			});
		},
		hiddengrid: true,
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#medications_pager',{search:false,edit:false,add:false,del:false});
	jQuery("#supplements").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/supplements/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date Active','Supplement','Dosage','Unit','SIG','Route','Frequency','Special Instructions','Reason','Supplement ID'],
		colModel:[
			{name:'sup_id',index:'sup_id',width:1,hidden:true},
			{name:'sup_date_active',index:'sup_date_active',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'sup_supplement',index:'sup_supplement',width:385},
			{name:'sup_dosage',index:'sup_dosage',width:50},
			{name:'sup_dosage_unit',index:'sup_dosage_unit',width:50},
			{name:'sup_sig',index:'sup_sig',width:50},
			{name:'sup_route',index:'sup_route',width:1,hidden:true},
			{name:'sup_frequency',index:'sup_frequency',width:105},
			{name:'sup_instructions',index:'sup_instructions',width:1,hidden:true},
			{name:'sup_reason',index:'sup_reason',width:1,hidden:true},
			{name:'supplement_id',index:'supplement_id',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#supplements_pager'),
		sortname: 'sup_date_active',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Supplements",
	 	height: "100%",
	 	hiddengrid: true,
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#supplements_pager',{search:false,edit:false,add:false,del:false});
	jQuery("#allergies").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/allergies/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date Active','Medication','Reason'],
		colModel:[
			{name:'allergies_id',index:'allergies_id',width:1,hidden:true},
			{name:'allergies_date_active',index:'allergies_date_active',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'allergies_med',index:'allergies_med',width:335},
			{name:'allergies_reaction',index:'allergies_reaction',width:320}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#allergies_pager'),
		sortname: 'allergies_date_active',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Allergies",
	 	height: "100%",
	 	hiddengrid: true,
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#allergies_pager',{search:false,edit:false,add:false,del:false});
	jQuery("#immunizations").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/immunizations/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date Given','Immunization','Sequence','Given Elsewhere','Body Site','Dosage','Unit','Route','Lot Number','Manufacturer','Expiration Date','VIS'],
		colModel:[
			{name:'imm_id',index:'imm_id',width:1,hidden:true},
			{name:'imm_date',index:'imm_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'imm_immunization',index:'imm_immunization',width:435},
			{name:'imm_sequence',index:'imm_sequence',width:65},
			{name:'imm_elsewhere',index:'imm_elsewhere',width:150},
			{name:'imm_body_site',index:'imm_body_site',width:1,hidden:true},
			{name:'imm_dosage',index:'imm_dosage',width:1,hidden:true},
			{name:'imm_dosage_unit',index:'imm_dosage_unit',width:1,hidden:true},
			{name:'imm_route',index:'imm_route',width:1,hidden:true},
			{name:'imm_lot',index:'imm_lot',width:1,hidden:true},
			{name:'imm_manufacturer',index:'imm_manufacturer',width:1,hidden:true},
			{name:'imm_expiration',index:'imm_expiration',width:1,hidden:true},
			{name:'imm_vis',index:'imm_vis',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#immunizations_pager'),
		sortname: 'imm_immunization',
	 	viewrecords: true,
	 	sortorder: "asc",
	 	caption:"Immunizations",
	 	height: "100%",
	 	hiddengrid: true,
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#immunizations_pager',{search:false,edit:false,add:false,del:false});
	
	//Print
	jQuery("#records_release").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/records_release/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','Reason','Released To','Role'],
		colModel:[
			{name:'hippa_id',index:'hippa_id',width:1,hidden:true},
			{name:'hippa_date_release',index:'hippa_date_release',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'hippa_reason',index:'hippa_reason',width:400},
			{name:'hippa_provider',index:'hippa_provider',width:200},
			{name:'hippa_role',index:'hippa_role',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#records_release_pager'),
		sortname: 'hippa_date_release',
		viewrecords: true,
		sortorder: "desc",
		caption:"View Past Records Releases",
		height: "100%",
		jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#records_release_pager',{search:false,edit:false,add:false,del:false});
	$("#print_list").click(function() {
		$("#print_list_dialog").dialog('open');
	});
	$("#print_chart").click(function() {
		var currentDate = getCurrentDate();
		$('#hippa_date_release1').val(currentDate);
		$("#print_chart_dialog").dialog('open');
		$('#hippa_reason1').focus();
	});
	$("#new_records_release").button({
		icons: {
			primary: "ui-icon-plus"
		}
	});
	$("#new_records_release").click(function() {
		var currentDate = getCurrentDate();
		$('#hippa_date_release1').val(currentDate);
		$("#print_chart_dialog").dialog('open');
		$('#hippa_reason1').focus();
	});
	$("#edit_records_release").button({
		icons: {
			primary: "ui-icon-plus"
		}
	});
	$("#edit_records_release").click(function() {
		var item = jQuery("#records_release").getGridParam('selrow');
		if(item){
			$("#print_hippa_id").val(item);
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/get_release_stats');?>",
				data: "hippa_id=" + item,
				success: function(data){
					$("#print_release_stats").html(data);
				}
			});
			jQuery("#print_items_queue").jqGrid('GridUnload');
			jQuery("#print_items_queue").jqGrid({
				url:"<?php echo site_url('admin/chartmenu/print_queue/');?>/" + $("#print_hippa_id").val(),
				datatype: "json",
				mtype: "POST",
				colNames:['ID','Date','Type','Description'],
				colModel:[
					{name:'hippa_id',index:'hippa_id',width:1,hidden:true},
					{name:'date',index:'date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
					{name:'type',index:'type',width:200},
					{name:'description',index:'description',width:400}
				],
				rowNum:10,
				rowList:[10,20,30],
				pager: jQuery('#print_items_queue_pager'),
				sortname: 'hippa_id',
			 	viewrecords: true,
			 	sortorder: "desc",
			 	caption:"Print Items Queue",
			 	height: "100%"
			}).navGrid('#print_items_queue_pager',{search:false,edit:false,add:false,del:false});
			$("#print_chart2_dialog").dialog('open');
		} else {
			$.jGrowl("Please select item!");
		}
		$("#print_chart2_dialog").dialog('open');
	});
	$("#print_chart_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 300, 
		width: 800, 
		draggable: false,
		resizable: false
	});
	$("#hippa_date_release1").mask("99/99/9999");
	$("#hippa_date_release1").datepicker({showOn: 'button', buttonImage: '<?php echo base_url()."images/calendar.gif";?>', buttonImageOnly: true});
	$("#hippa_reason1").autocomplete({
		source: function (req, add){
			$.ajax({
				url: "<?php echo site_url('search/hippa_reason');?>",
				dataType: "json",
				type: "POST",
				data: req,
				success: function(data){
					if(data.response =='true'){
						add(data.message);
					}
				}
			});
		},
		minLength: 3
	});
	$("#hippa_role1").addOption({"":"","Primary Care Provider":"Primary Care Provider","Consulting Provider":"Consulting Provider","Referring Provider":"Referring Provider"},false);
	$("#save_print_chart_form").button({
		icons: {
			primary: "ui-icon-disk"
		}
	});
	$("#save_print_chart_form").click(function(){
		var a = $("#hippa_date_release1");
		var b = $("#hippa_reason1");
		var c = $("#hippa_provider1");
		var bValid = true;
		bValid = bValid && checkEmpty(a,"Date of Release");
		bValid = bValid && checkEmpty(b,"Reason");
		bValid = bValid && checkEmpty(c,"Release To");
		if (bValid) {
			var str = $("#print_chart_form").serialize();
			if(str){
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/print_chart_save/');?>",
					data: str,
					success: function(data){
						if (data == 'Close Chart') {
							window.location = "<?php echo site_url();?>";
						} else {
							$("#print_hippa_id").val(data);
							$("#print_chart_form").clearForm();
							$("#print_chart_dialog").dialog('close');
							$.ajax({
								type: "POST",
								url: "<?php echo site_url('admin/chartmenu/get_release_stats');?>",
								data: "hippa_id=" + data,
								success: function(data){
									$("#print_release_stats").html(data);
								}
							});
							jQuery("#print_items_queue").jqGrid('GridUnload');
							jQuery("#print_items_queue").jqGrid({
								url:"<?php echo site_url('admin/chartmenu/print_queue/');?>/" + $("#print_hippa_id").val(),
								datatype: "json",
								mtype: "POST",
								colNames:['ID','Date','Type','Description'],
								colModel:[
									{name:'hippa_id',index:'hippa_id',width:1,hidden:true},
									{name:'date',index:'date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
									{name:'type',index:'type',width:200},
									{name:'description',index:'description',width:400}
								],
								rowNum:10,
								rowList:[10,20,30],
								pager: jQuery('#print_items_queue_pager'),
								sortname: 'hippa_id',
							 	viewrecords: true,
							 	sortorder: "desc",
							 	caption:"Print Items Queue",
							 	height: "100%"
							}).navGrid('#print_items_queue_pager',{search:false,edit:false,add:false,del:false});
							$("#print_chart2_dialog").dialog('open');
							jQuery("#records_release").trigger("reloadGrid"); 
						}
					}
				});
			} else {
				$.jGrowl("Please complete the form");
			}
		}
	});
	$("#cancel_print_chart_form").button({
		icons: {
			primary: "ui-icon-close"
		}
	});
	$('#cancel_print_chart_form').click(function(){
		$("#print_chart_form").clearForm();
		$("#print_chart_dialog").dialog('close');
	});
	$("#print_chart2_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 500, 
		width: 800, 
		draggable: false,
		resizable: false
	});
	$("#edit_hippa").button({
		icons: {
			primary: "ui-icon-pencil"
		}
	});
	$("#edit_hippa").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('admin/chartmenu/get_release');?>/" + hippa_id,
			dataType: "json",
			success: function(data){
				$("#hippa_date_release1").val(data.hippa_date_release);
				$("#hippa_reason1").val(data.hippa_reason);
				$("#hippa_provider1").val(data.hippa_provider);
				$("#print_hippa_id1").val(data.hippa_id);
				$("#hippa_role1").val(data.hippa.role);
				$("#print_chart_dialog").dialog('open');
				$('#hippa_reason1').focus();
			}
		});
	});
	$("#print_all").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#print_all").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('admin/chartmenu/print_chart');?>/" + hippa_id,
			async: false,
			success: function(data){
				if (data == 'OK') {
					success_doc = true;
				} else {
					$.jGrowl(data);
				}
			}
		});
		if (success_doc == true) {
			window.open("<?php echo site_url('admin/chartmenu/view_printchart');?>/" + hippa_id);
			success_doc = false;
		}
	});
	$("#ccda_all").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#ccda_all").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		window.open("<?php echo site_url('admin/chartmenu/ccda');?>/" + hippa_id + "/all");
	});
	$("#print_1year").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#print_1year").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('admin/chartmenu/print_chart2');?>/" + hippa_id,
			async: false,
			success: function(data){
				if (data == 'OK') {
					success_doc = true;
				} else {
					$.jGrowl(data);
				}
			}
		});
		if (success_doc == true) {
			window.open("<?php echo site_url('admin/chartmenu/view_printchart');?>/" + hippa_id);
			success_doc = false;
		}
	});
	$("#ccda_1year").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#ccda_1year").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		window.open("<?php echo site_url('admin/chartmenu/ccda');?>/" + hippa_id + "/1year");
	});
	$("#print_queue").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#print_queue").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('admin/chartmenu/print_chart1');?>/" + hippa_id,
			async: false,
			success: function(data){
				if (data == 'OK') {
					success_doc = true;
				} else {
					$.jGrowl(data);
				}
			}
		});
		if (success_doc == true) {
			window.open("<?php echo site_url('admin/chartmenu/view_printchart');?>/" + hippa_id);
			success_doc = false;
		}
	});
	$("#ccda_queue").button({
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#ccda_queue").click(function(){
		var hippa_id = $("#print_hippa_id").val();
		window.open("<?php echo site_url('admin/chartmenu/ccda');?>/" + hippa_id + "/queue");
	});
	$("#remove_item").button({
		icons: {
			primary: "ui-icon-close"
		}
	});
	$("#remove_item").click(function(){
		var item = jQuery("#print_items_queue").getGridParam('selrow');
		if(item){
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/delete_chart_item');?>",
				data: "hippa_id=" + item,
				success: function(data){
					$.jGrowl(data);
					jQuery("#print_items_queue").trigger("reloadGrid"); 
				}
			});
		} else {
			$.jGrowl("Please select item to remove from the queue!");
		}
	});
	$("#clear_queue").button({
		icons: {
			primary: "ui-icon-close"
		}
	});
	$("#clear_queue").click(function(){
		var item = $("#print_hippa_id").val();
		if(item){
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('admin/chartmenu/clear_queue');?>",
				data: "other_hippa_id=" + item,
				success: function(data){
					$.jGrowl(data);
					jQuery("#print_items_queue").trigger("reloadGrid"); 
				}
			});
		} else {
			$.jGrowl("Please select item to remove from the queue!");
		}
	});
	$("#print_encounter_view_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 500, 
		width: 800, 
		draggable: false,
		resizable: false
	});
	$("#print_message_view_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 500, 
		width: 800, 
		draggable: false,
		resizable: false
	});
	jQuery("#print_encounters").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/print_encounters/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','Chief Complaint','Provider'],
		colModel:[
			{name:'eid',index:'eid',width:1,hidden:true},
			{name:'encounter_DOS',index:'encounter_DOS',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'encounter_cc',index:'encounter_cc',width:500},
			{name:'encounter_provider',index:'encounter_provider', width:100}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_encounters_pager'),
		sortname: 'encounter_DOS',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Encounters",
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	hiddengrid: true,
	 	onCellSelect: function(id,iCol) {
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/modal_view/');?>/" + id,
					success: function(data){
						$("#print_encounter_view").html(data);
						$("#print_encounter_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_encounters_pager',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_encounters_pager',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_encounters").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue1');?>",
						data: "eid=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
							$.jGrowl(data);
						}
					});
				}
 				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_messages").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/print_messages/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date of Service','Subject','Message','Provider','To'],
		colModel:[
			{name:'t_messages_id',index:'t_messages_id',width:1,hidden:true},
			{name:'t_messages_dos',index:'t_messages_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'t_messages_subject',index:'t_messages_subject',width:500},
			{name:'t_messages_message',index:'t_messages_message',width:1,hidden:true},
			{name:'t_messages_provider',index:'t_messages_provider',width:100},
			{name:'t_messages_to',index:'t_messages_to',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_messages_pager'),
		sortname: 't_messages_dos',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Telephone Messages",
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	hiddengrid: true,
	 	onCellSelect: function(id,iCol) {
	 		if (iCol > 0) {
		 		var row = jQuery("#print_messages").getRowData(id);
				var text = '<br><strong>Date:</strong>  ' + row['t_messages_dos'] + '<br><br><strong>Subject:</strong>  ' + row['t_messages_subject'] + '<br><br><strong>Message:</strong> ' + row['t_messages_message']; 
				$("#print_message_view_dialog").html(text);
				$("#print_message_view_dialog").dialog('open');
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_messages_pager',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_messages_pager',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_messages").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue2');?>",
						data: "t_messages_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
							$.jGrowl(data);
						}
					});
				}
 				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_labs").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/labs/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager8'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Labs",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager8',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager8',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_labs").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_radiology").jqGrid({
		url:"<?php echo site_url ('admin/chartmenu/radiology/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager9'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Imaging",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager9',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager9',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_radiology").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_cardiopulm").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/cardiopulm/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager10'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Cardiopulmonary",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager10',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager10',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_cardiopulm").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_endoscopy").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/endoscopy/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager11'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Endoscopy",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager11',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager11',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_endoscopy").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_referrals").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/referrals/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager12'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Referrals",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager12',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager12',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_referrals").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_past_records").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/past_records/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager13'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Past Records",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager13',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager13',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_past_records").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_outside_forms").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/other_forms/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager14'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Other Forms",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager14',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager14',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_outside_forms").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
	jQuery("#print_letters").jqGrid({
		url:"<?php echo site_url('admin/chartmenu/letters/');?>",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Date','From','Description','URL'],
		colModel:[
			{name:'documents_id',index:'documents_id',width:1,hidden:true},
			{name:'documents_date',index:'documents_date',width:100,formatter:'date',formatoptions:{srcformat:"ISO8601Long", newformat: "ISO8601Short"}},
			{name:'documents_from',index:'documents_from',width:300},
			{name:'documents_desc',index:'documents_desc',width:300},
			{name:'documents_url',index:'documents_url',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#print_pager15'),
		sortname: 'documents_date',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Letters",
	 	hiddengrid: true,
	 	height: "100%",
	 	multiselect: true,
	 	multiboxonly: true,
	 	onSelectRow: function(id,iCol){
	 		if (iCol > 0) {
		 		$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/chartmenu/view_documents1');?>/" + id,
					dataType: "json",
					success: function(data){
						//$('#embedURL').PDFDoc( { source : data.html } );
						$("#embedURL").html(data.html);
						$("#document_filepath").val(data.filepath);
						$("#documents_view_dialog").dialog('open');
					}
				});
			}
	 	},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#print_pager15',{search:false,edit:false,add:false,del:false
	}).navButtonAdd('#print_pager15',{
		caption:"Add Selected to Print Queue", 
		buttonicon:"ui-icon-plus", 
		onClickButton: function(){ 
			var id = jQuery("#print_letters").getGridParam('selarrrow');
			var hippa_id = $("#print_hippa_id").val();
			if(id){
 				var count = id.length;
 				for (var i = 0; i < count; i++) {
 					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/chartmenu/add_print_queue');?>",
						data: "documents_id=" + id[i] + "&hippa_id=" + hippa_id,
						success: function(data){
						}
					});
				}
 				$.jGrowl('Added ' + i + ' documents to the queue!');
				jQuery("#print_items_queue").trigger("reloadGrid");
			} else {
				$.jGrowl('Choose document(s) to print!');
			}
		}, 
		position:"last"
	});
});
</script>
<div id="heading2"></div>
<div id ="mainborder_full" class="ui-corner-all ui-tabs ui-widget ui-widget-content">
	<div id="maincontent_full">
		<h4>NOSH ChartingSystem Patient Chart Export for <?php echo $ptname;?>.</h4>
		<div id="admin_patient_chart_accordion">
			<h3 class="admin_patient_print"><a href="#">Print</a></h3>
			<div class ="admin_patient_print">
				<table id="records_release" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="records_release_pager" class="scroll" style="text-align:center;"></div><br>
				<button type="button" id="new_records_release">New Records Release</button>
				<button type="button" id="edit_records_release">Records Re-Release</button>
			</div>
			<h3 class="admin_patient_summary"><a href="#">Chart Summary</a></h3>
			<div class="admin_patient_summary">
				<table id="encounters" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="encounters_pager" class="scroll" style="text-align:center;"></div>
				<br>
				<table id="medications" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="medications_pager" class="scroll" style="text-align:center;"></div>
				<br>
				<table id="supplements" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="supplements_pager" class="scroll" style="text-align:center;"></div>
				<br>
				<table id="allergies" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="allergies_pager" class="scroll" style="text-align:center;"></div>
				<br>
				<table id="immunizations" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="immunizations_pager" class="scroll" style="text-align:center;"></div>
				<br>
				<table id="labs" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="pager8" class="scroll" style="text-align:center;"></div> 
				<br>
				<table id="radiology" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="pager9" class="scroll" style="text-align:center;"></div> 
				<br>
				<table id="cardiopulm" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="pager10" class="scroll" style="text-align:center;"></div> 
				<br>
				<table id="endoscopy" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="pager11" class="scroll" style="text-align:center;"></div> 
				<br>
				<table id="letters" class="scroll" cellpadding="0" cellspacing="0"></table>
				<div id="pager15" class="scroll" style="text-align:center;"></div> 
				<br>
			</div>
		</div>
	</div>
</div>
<div id="documents_view_dialog" title="Documents Viewer">
	<input type="hidden" id="view_document_id"/>
	<input type="hidden" id="document_filepath"/>
	<button type="button" id="save_document">Save</button><br>
	<div id="embedURL"></div>
</div>
<div id="print_chart_dialog" title="Print/Send Records">
	<form id="print_chart_form">
		<input type="hidden" name="hippa_id" id="print_hippa_id1"/>
		<table>
			<tr>
				<td><label for="hippa_date_release">Date of Records Release</label></td>
				<td><input type="text" name="hippa_date_release" id="hippa_date_release1" style="width:200px" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr>
				<td><label for="hippa_reason">Reason</label></td>
				<td><input type="text" name="hippa_reason" id="hippa_reason1" style="width:200px" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr>
				<td><label for="hippa_provider">Records Release To:</label></td>
				<td><input type="text" name="hippa_provider" id="hippa_provider1" style="width:200px" class="text ui-widget-content ui-corner-all" /></td>
			</tr>
			<tr>
				<td><label for="hippa_role">Provider Role</label></td>
				<td colspan="2"><select name="hippa_role" id="hippa_role1" class="text ui-widget-content ui-corner-all"></select></td>
			</tr>
			
		</table><br>
		<button type="button" id="save_print_chart_form">Continue</button>
		<button type="button" id="cancel_print_chart_form">Cancel</button>
	</form>	
</div>
<div id="print_chart2_dialog" title="Print/Send Records">
	<input type="hidden" id="print_hippa_id"/>
	<div id="print_release_stats"></div>
	<button type="button" id="edit_hippa">Edit Records Release Info</button><br><br>
	<hr class="ui-state-default"/>
	<table>
		<tr>
			<td><strong>All records: </strong></td>
			<td><button type="button" id="print_all">Print</button> <button type="button" id="ccda_all">C-CDA</button></td>
		</tr>
		<tr>
			<td><strong>All records from the past year: </strong></td>
			<td><button type="button" id="print_1year">Print</button> <button type="button" id="ccda_1year">C-CDA</button></td>
		</tr>
		<tr>
			<td><strong>Selected records from queue: </strong></td>
			<td><button type="button" id="print_queue">Print</button> <button type="button" id="ccda_queue">C-CDA</button></td>
		</tr>
	</table>
	<br>Printing or faxing an empty queue will result in Continuity of Care Record only!
	<br>Generating a C-CDA will only pertain to signed encounters in all records or in the queue.
	<hr class="ui-state-default"/>
	<br>
	<table id="print_items_queue" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_items_queue_pager" class="scroll" style="text-align:center;"></div><br>
	<button type="button" id="remove_item">Remove Item from Queue</button>
	<button type="button" id="clear_queue">Clear Queue</button><br><br>
	<hr class="ui-state-default"/>
	<strong>Select from the following items:</strong><br>
	<table id="print_encounters" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_encounters_pager" class="scroll" style="text-align:center;"></div><br>
	<table id="print_messages" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_messages_pager" class="scroll" style="text-align:center;"></div><br>
	<table id="print_labs" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager8" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_radiology" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager9" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_cardiopulm" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager10" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_endoscopy" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager11" class="scroll" style="text-align:center;"></div> 
	<br>			
	<table id="print_referrals" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager12" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_past_records" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager13" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_outside_forms" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager14" class="scroll" style="text-align:center;"></div> 
	<br>
	<table id="print_letters" class="scroll" cellpadding="0" cellspacing="0"></table>
	<div id="print_pager15" class="scroll" style="text-align:center;"></div> 
	<br>
</div>
<div id="print_message_view_dialog" title="Telephone Message"></div>
<div id="print_encounter_view_dialog" title="Encounter">
	<div id="print_encounter_view"></div>
</div>
