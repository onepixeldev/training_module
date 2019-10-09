<?php echo $this->lib->title('CPD / CPD Setup', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF098 - CPD Setup</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body">
                <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
					</header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <div class="widget-body">

                            <ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">CPD Category</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">CPD Point</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Coordinator</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

								<div class="tab-pane fade active in" id="s1">
									<div id="cpd_category">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
                                    <div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Year</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sYear', $year_list, $cur_year, 'class="form-control listFilterCp" id="sYear"'); ?>
											</div>
										</div>
									</div>

									<div id="cpd_point">
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Format</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sFormat', array(''=>'--- Please Select ---', 'PDF'=>'PDF', 'EXCEL'=>'EXCEL'), '', 'class="form-control sFormat" id="sFormat"'); ?>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Role</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sRole', array(''=>'--- Please Select ---', 'COORDINATOR'=>'COORDINATOR', 'PANEL'=>'PANEL'), '', 'class="form-control listFilterCoor" id="sRole"'); ?>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-2" id="loaderRole">
										</div>
									</div>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Sector</b></label>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group text-left">
												<?php echo form_dropdown('sSector', array(''=>'--- Please Select Role ---'), '', 'class="form-control listFilterCoor" id="sSector"'); ?>
											</div>
										</div>
									</div>

									<div id="coordinator">
									</div>
                                </div>  

                            </div>
                            <!-- end myTabContent1 -->
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="mContent">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="mContent2">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<script>
	var cf_row = '';
	
	$(document).ready(function(){
		<?php
			$currtab = $this->session->tabID;
		
			if (!empty($currtab)) {
				if ($currtab == 's2'){
					echo "$('.nav-tabs li:eq(1) a').tab('show');";
				} elseif ($currtab == 's3'){
					echo "$('.nav-tabs li:eq(2) a').tab('show');";
				} 
				else {
					echo "$('.nav-tabs li:eq(0) a').tab('show');";
				}
			}
		?>

		// PREVENT SUBMIT RELOAD
		$('#myModalis').on('submit', function(e){
			e.preventDefault();
		});

		// ENTER BUTTON NOT ALLOWED
		$('#myModalis').on('keyup', '#staff_id', function (e) {
			if (e.keyCode === 13) {
				e.preventDefault();
				msg.show('Enter button are not allowed', 'warning', '#myModalis .modal-content #alertStfIDMD');
				return;
			}
		});
		
		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - CPD CATEGORY
	-----------------------------*/

	// CPD CATEGORY
	$('#cpd_category').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('cpdCategoryList')?>',
		data: '',
		success: function(res) {
			$('#cpd_category').html(res);
		}
	});	

	// ADD CPD CATEGORY
	$('#cpd_category').on('click','.add_cpcat_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCpdCat')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE CPD CATEGORY
	$('#myModalis2').on('click', '.ins_cpd_cat', function (e) {
		e.preventDefault();
		var data = $('#addCpdCategory').serialize();
		msg.wait('#addCpdCategoryAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveCpdCategory')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addCpdCategoryAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addCpdCategoryAlert');
			}
		});	
	});

	// EDIT CPD CATEGORY
	$('#cpd_category').on('click','.edit_cpcat_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var code = td.eq(0).html().trim();
		
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdCat')?>',
			data: {'code':code},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD CATEGORY
	$('#myModalis2').on('click', '.upd_cpd_cat', function (e) {
		e.preventDefault();
		var data = $('#editCpdCategory').serialize();
		msg.wait('#editCpdCategoryAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdCpdCategory')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editCpdCategoryAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editCpdCategoryAlert');
			}
		});	
	});

	/*-----------------------------
	TAB 2 - CPD POINT
	-----------------------------*/
	var sYear = $('#sYear').val();
	// CPD POINT
	$('#cpd_point').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('cpdPointList')?>',
		data: {'sYear':sYear},
		success: function(res) {
			$('#cpd_point').html(res);

			cf_row = $('#tbl_cpdpts_list').DataTable({
				"ordering":false,
			});
		}
	});

	// YEAR FILTER CPD POINT LIST
	$('.listFilterCp').change(function () {
		var sYearF = $('#sYear').val();

		$('#cpd_point').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('cpdPointList')?>',
			data: {'sYear':sYearF},
			success: function(res) {
				$('#cpd_point').html(res);

				cf_row = $('#tbl_cpdpts_list').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// ADD CPD POINT
	$('#cpd_point').on('click','.add_cpd_point_btn', function(){
		var sYear = $('#sYear').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCpdPoint')?>',
			data: {'sYear':sYear},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});	

	// SAVE CPD POINT
	$('#myModalis').on('click', '.ins_cpdp_btn', function (e) {
		e.preventDefault();
		var data = $('#addCpdPoint').serialize();
		msg.wait('#addCpdPointAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveCpdPoint')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addCpdPointAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addCpdPointAlert');
			}
		});	
	});

	// EDIT CPD POINT
	$('#cpd_point').on('click','.edit_cpdp_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cp_scheme = td.find(".cp_scheme").text();
		var cp_year = $('#sYear').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdPoint')?>',
			data: {'cp_scheme':cp_scheme, 'sYear':sYear},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});	

	// SAVE UPDATE CPD POINT
	$('#myModalis').on('click', '.upd_cpdp_btn', function (e) {
		e.preventDefault();
		var data = $('#updCpdPoint').serialize();
		msg.wait('#updCpdPointAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdCpdPoint')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updCpdPointAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#updCpdPointAlert');
			}
		});	
	});

	// DELETE STAFF CPD POINT
	$('#cpd_point').on('click','.del_cpdp_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cp_scheme = td.find(".cp_scheme").text();
		var cp_year = $('#sYear').val();
		var desc =  td.find(".desc").text();
		// alert(cp_year);
		
		$.confirm({
		    title: 'Delete CPD Point Scheme',
		    content: 'Are you sure to delete this record? <br> <b>'+cp_scheme+' - '+desc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteCpdPoint')?>',
						data: {'cp_scheme' : cp_scheme, 'cp_year' : cp_year},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
								hide_loading();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});

	// GENERATE STAFF CPD POINT
	$('#cpd_point').on('click','.generate_staff_btn', function() {
		var cp_year = $('#sYear').val();
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cp_scheme = td.find(".cp_scheme").text();
		var desc =  td.find(".desc").text();

		var cp_cpd_layak =  td.find(".cp_cpd_layak").text();
		var cp_cpd_khusus_min =  td.find(".cp_cpd_khusus_min").text();
		var cp_cpd_umum_min =  td.find(".cp_cpd_umum_min").text();
		// var cp_umum_mandatory =  td.find(".cp_umum_mandatory").text();
		var cp_cpd_teras_min =  td.find(".cp_cpd_teras_min").text();
		var cp_lnpt_weightage =  td.find(".cp_lnpt_weightage").text();
		// alert(cp_year);
		
		$.confirm({
		    title: 'Generate Staff',
		    content: 'Are you sure you want to generate Staff CPD? <br> <b>'+cp_scheme+' - '+desc+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('genStaffCpd')?>',
						data: {'cp_scheme' : cp_scheme, 'cp_year' : cp_year, 'cp_cpd_layak' : cp_cpd_layak, 'cp_cpd_khusus_min' : cp_cpd_khusus_min, 'cp_cpd_umum_min' : cp_cpd_umum_min, 'cp_cpd_teras_min' : cp_cpd_teras_min, 'cp_lnpt_weightage' : cp_lnpt_weightage},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								hide_loading();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Canceled generate staff!');
		        }
		    }
		});
	});

	/*-----------------------------
	TAB 3 - COORDINATOR
	-----------------------------*/

	// COORDINATOR RECORD
	$('#coordinator').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('coorList')?>',
		data: '',
		success: function(res) {
			$('#coordinator').html(res);

			cf_row = $('#tbl_coor_list').DataTable({
				"ordering":false,
			});
		}
	});

	// POPULATE PANEL DD & COORDINATOR RECORD ROLE FILTER
	$('#sRole').change(function() {
		var role = $(this).val();
		$('#loaderRole').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#sSector').html('');

		if(role == 'COORDINATOR') {
			// COORDINATOR RECORD
			$('#coordinator').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('coorList')?>',
				data: {'role':role},
				success: function(res) {
					$('#coordinator').html(res);
					cf_row = $('#tbl_coor_list').DataTable({
						"ordering":false,
					});
				}
			});
			
			$('#loaderRole').html('');
			$("#sSector").html('<option value="">No record</option>');
		} else if (role == 'PANEL') {
			// COORDINATOR RECORD
			$('#coordinator').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('coorList')?>',
				data: {'role':role},
				success: function(res) {
					$('#coordinator').html(res);
					cf_row = $('#tbl_coor_list').DataTable({
						"ordering":false,
					});
				}
			});

			// SECTOR lIST DROPDOWN
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('sectorList')?>',
				data: {'role' : role},
				dataType: 'json',
				success: function(res) {
					$('#loaderRole').html('');
					
					var resList = '<option value="" selected > ---Please select--- </option>';
					
					if (res.sts == 1) {
						for (var i in res.sectorList) {
							resList += '<option value="'+res.sectorList[i]['SC_CLASS_SECTOR']+'">'+res.sectorList[i]['SC_CLASS_SECTOR']+'</option>';
						}
					} 
					
					$("#sSector").html(resList);				
				}
			});
		} else {
			// COORDINATOR RECORD
			$('#coordinator').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('coorList')?>',
				data: '',
				success: function(res) {
					$('#coordinator').html(res);

					cf_row = $('#tbl_coor_list').DataTable({
						"ordering":false,
					});
				}
			});

			$('#loaderRole').html('');
			$("#sSector").html('<option value="">--- Please Select Role ---</option>');
		}
	});	

	// COORDINATOR RECORD SECTOR FILTER
	$('#sSector').change(function() {
		var role = $('#sRole').val();
		var sector = $(this).val();

		// COORDINATOR RECORD
		$('#coordinator').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('coorList')?>',
			data: {'role':role, 'sector':sector},
			success: function(res) {
				$('#coordinator').html(res);
				cf_row = $('#tbl_coor_list').DataTable({
					"ordering":false,
				});
			}
		});
	});	

	// PRINT REPORT 
	$('#coordinator').on('click','.rep_coor_btn', function () {
		var thisBtn = $(this);
		var format = $("#sFormat").val();
		var role = $("#sRole").val();
		var sector = $("#sSector").val();
		var repCode = 'COORREP';
		// console.log(year+' '+month+' '+repCode);

		if(format == '') {
			$.alert({
				title: 'Alert',
				content: 'Please select format',
				type: 'red',
			});

			return;
		}

		if(role == '') {
			$.alert({
				title: 'Alert',
				content: 'Please select role',
				type: 'red',
			});

			return;
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'format':format, 'role':role, 'sector':sector, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	///// SEARCH STAFF//////
	// AUTO SEARCH STAFF ID
	$('#coordinator').on('keyup','#staff_id_f', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfID');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfID');
						$('#staff_name_f').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'warning', '#alertStfID');
						$('#staff_name_f').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'warning', '#alertStfID');
			$('#staff_name_f').val('');
		}
	});

	// SEARCH STAFF
	$('#coordinator').on('click','.search_staff', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md', function () {
		var staff_id = $('#myModalis #staff_id').val();
		search_trigger = 1;
		// console.log(staff_id);

		if(staff_id == '') {
			msg.show('Please enter Staff ID / Name', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
		}

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: {'staff_id':staff_id, 'search_trigger':search_trigger,},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis #staff_list').removeClass('hidden');

				stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#staff_id_f').val(staff_id);
			$('#staff_name_f').val(staff_name);
		}
	});
	///// SEARCH STAFF//////

	// ADD CPD COORDINATOR
	$('#coordinator').on('click','.add_coor_btn', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCpdCoor')?>',
			success: function(res) {
				$('#coordinator #add_edit_cpd_coor').html(res);
				$('html, body').animate({scrollTop: $('#add_edit_cpd_coor').position().top}, 'slow');
			}
		});
	});	

	// SAVE CPD COORDINATOR
	$('#coordinator').on('click', '.ins_cpd_coor', function (e) {
		e.preventDefault();
		var data = $('#addCpdCoor').serialize();
		msg.wait('#addCpdCoorAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveCpdCoor')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addCpdCoorAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addCpdCoorAlert');
			}
		});	
	});

	// EDIT CPD COORDINATOR
	$('#coordinator').on('click','.edit_coor_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var rowid = td.find(".rowid").text();
		var staff_id = td.find(".sid").text();
		var staff_name =  td.find(".sname").text();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdCoor')?>',
			data: {'rowid':rowid, 'staff_id':staff_id, 'staff_name':staff_name},
			success: function(res) {
				$('#coordinator #add_edit_cpd_coor').html(res);
				$('html, body').animate({scrollTop: $('#add_edit_cpd_coor').position().top}, 'slow');
			}
		});
	});	

	// SAVE UPDATE CPD COORDINATOR
	$('#coordinator').on('click', '.upd_cpd_coor', function (e) {
		e.preventDefault();
		var data = $('#editCpdCoor').serialize();
		msg.wait('#editCpdCoorAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdCpdCoor')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editCpdCoorAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ATF098')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editCpdCoorAlert');
			}
		});	
	});

	// DELETE STAFF CONTACT INFO
	$('#coordinator').on('click','.del_coor_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var rowid = td.find(".rowid").text();
		var staff_id = td.find(".sid").text();
		var staff_name =  td.find(".sname").text();
		// alert(rowid);
		
		$.confirm({
		    title: 'Delete Coordinator',
		    content: 'Are you sure to delete this record? <br> <b>'+staff_id+' - '+staff_name+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteCpdCoor')?>',
						data: {'rowid' : rowid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
								hide_loading();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});
</script>