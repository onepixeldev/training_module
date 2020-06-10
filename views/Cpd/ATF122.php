<?php echo $this->lib->title('CPD / Staff CPD Setup', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF122 - Staff CPD Setup</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Staff CPD Setup</a>
                                </li>

								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">CPD Point Details</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Year</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sYear', $year_list, $cur_year, 'class="form-control listFilter1" id="sYear"'); ?>
											</div>
										</div>
									</div>

                                    <div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Department</b></label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group text-left">
												<?php echo form_dropdown('sDept', $dept_list, $curr_dept, 'class="select2-filter form-control listFilter1" id="sDept" style="width: 100%"'); ?>
											</div>
										</div>
									</div>

									<div id="staff_cpd_setup">
									</div>
                                </div> 

								<div class="tab-pane fade" id="s2">
									<div id="cpd_point_detl">
                                        <p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click View Detail button from Staff CPD Setup tab</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </p>
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
    var ca_row = '';
	
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
		
		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});

        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - STAFF CPD SETUP
	-----------------------------*/

	var year = $('#sYear').val();
	var department = $('#sDept').val();
	// console.log(year+' '+department);

	// POPULATE STAFF
	$('#staff_cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getStaffCpdSetupList')?>',
		data: {'year':year, 'department':department},
		success: function(res) {
			$('#staff_cpd_setup').html(res);

			cf_row = $('#tbl_scpd_list').DataTable({
				"ordering":false,
			});
		}
	});

	$('.listFilter1').change(function() {
		var year = $('#sYear').val();
		var department = $('#sDept').val();

		// if(year == '') {
		// 	$.alert({
		// 		title: 'Alert!',
		// 		content: 'Please select <b>Year</b>',
		// 		type: 'red',
		// 	});

		// 	return;
		// }

		// if(department == '') {
		// 	$.alert({
		// 		title: 'Alert!',
		// 		content: 'Please select <b>Department</b>',
		// 		type: 'red',
		// 	});

		// 	return;
		// }

		$('#staff_cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#cpd_point_detl').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click View Detail button from Staff CPD Setup tab</th></tr></thead></table></p>').show();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffCpdSetupList')?>',
			data: {'year':year, 'department':department},
			success: function(res) {
				$('#staff_cpd_setup').html(res);

				cf_row = $('#tbl_scpd_list').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// SEARCH STAFF
	// $('.search_staff_id_name').click(function(){
	// 	var idName = $('#stfIdName').val();
	// 	// alert(idName);

	// 	if(idName == '') {
	// 		$.alert({
	// 			title: 'Alert!',
	// 			content: 'Please fill in <b>Staff ID / Name</b> field',
	// 			type: 'red',
	// 		});

	// 		return;
	// 	}

	// 	$('#staff_cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('getStaffCpdSetupList')?>',
	// 		data: {'idName':idName},
	// 		success: function(res) {
	// 			$('#staff_cpd_setup').html(res);

	// 			cf_row = $('#tbl_scpd_list').DataTable({
	// 				"ordering":false,
	// 			});
	// 		}
	// 	});
    // });

	// UPDATE STAFF CPD POINT
	$('#staff_cpd_setup').on('click','.upd_stf_cpd', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var selc_date = $('#sYear').val();

		srow = $(this).closest("tr");

		// VALIDATE YEAR
		if(selc_date != '') {
			show_loading();

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('validateCrDate')?>',
				dataType: 'JSON',
				success: function(res) {
					hide_loading();
					curr_yyyy = res.sys_yyyy;

					// CHECK IF SELECTED YEAR < CURRENT YEAR
					if(selc_date < curr_yyyy) {
						$.alert({
							title: 'Alert!',
							content: 'Cannot update previous year record.',
							type: 'red',
						});
						
					} else {
						$('#myModalis .modal-content').empty();
						$('#myModalis').modal('show');
						$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
					
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('updateStfCpdPoint')?>',
							data: {'staff_id':staff_id, 'selc_date':selc_date},
							success: function(res) {
								$('#myModalis .modal-content').html(res);
							}
						});
					}
				}
			})
		}
	});

	// SAVE UPDATE STAFF CPD POINT
	$('#myModalis').on('click', '.upd_staff_cpd_pts', function (e) {
		e.preventDefault();
		var data = $('#updStaffCpdPoint').serialize();
		msg.wait('#updStaffCpdPointAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdStfCpdPoint')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updStaffCpdPointAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(2)').text(res.stf_row.SCH_JUM_KHUSUS_MIN);
						srow.find('td:eq(3)').text(res.stf_row.SCH_JUM_UMUM_MIN);
						srow.find('td:eq(4)').text(res.stf_row.SCH_JUM_TERAS_MIN);
						srow.find('td:eq(5)').text(res.stf_row.SCH_CPD_LAYAK);

						srow.find('td:eq(6)').text(res.stf_row.SCH_JUM_KHUSUS);
						srow.find('td:eq(7)').text(res.stf_row.SCH_JUM_UMUM);
						srow.find('td:eq(8)').text(res.stf_row.SCH_JUM_TERAS);
						srow.find('td:eq(9)').text(res.stf_row.SCH_JUM_CPD);

						srow.find('td:eq(10)').text(res.stf_row.SCH_PEMBERAT_LPP);
						srow.find('td:eq(11)').text(res.stf_row.SCH_PERATUS_LPP);

						// console.log(res.sid);
						// console.log(res.year);
						// console.log(res.sname);

						// refresh details tab
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getStaffCpdPointDetlList')?>',
							data: {'staff_id':res.sid, 'selc_date':res.year, 'staff_name':res.sname},
							success: function(res) {
								$('#cpd_point_detl').html(res);

								cf_row = $('#tbl_vdetl_list').DataTable({
									"ordering":false,
								});
							}
						});

					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#updStaffCpdPointAlert');
			}
		});	
	});

	// VIEW DETAIL
	$('#staff_cpd_setup').on('click','.detl_stf_acpd', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var staff_name = td.find(".staff_name").text();
		var selc_date = $('#sYear').val();

		$('#cpd_point_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffCpdPointDetlList')?>',
			data: {'staff_id':staff_id, 'selc_date':selc_date, 'staff_name':staff_name},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
			},
			success: function(res) {
				$('#cpd_point_detl').html(res);

				cf_row = $('#tbl_vdetl_list').DataTable({
					"ordering":false,
				});
			}
		});
	});


	// CALCULATE CPD INFO KEYUP
	$('#myModalis').on('keyup','#psm', function(){
		var year = $('#mYear').val();
		var staff_id = $('#mStaffId').val();
		var prorate_svc = $('#psm').val();
		var kump = $('#mGroup').val(); 
		// console.log(prorate_svc);
		
		if(prorate_svc != '' && $.isNumeric(prorate_svc)) {
			msg.show('The Prorate Service field is valid.', 'success', '#updStaffCpdPointAlert');
			// $('#updStaffCpdPointAlert').hide();
			// console.log();

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('calculateUpdStaffCpd')?>',
				data: {'staff_id':staff_id, 'year':year, 'prorate_svc':prorate_svc, 'kump':kump},
				dataType: 'JSON',
				beforeSend: function() {
					$('#loaderCalc').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
				},
				success: function(res) {
					// $('#pemberat_lnpt').val(res.sch_pemberat_lpp);
					// $('#peratus_lnpt').val(res.sch_peratus_lpp);

					$('#jkm').val(res.sch_jum_khusus_min);
					$('#jum').val(res.sch_jum_umum_min);
					$('#jtm').val(res.sch_jum_teras_min);
					$('#cl').val(res.sch_cpd_layak);

					// $('#jumlah_khusus').val(res.sch_jum_khusus);
					// $('#jumlah_umum').val(res.sch_jum_umum);
					// $('#jumlah_teras').val(res.sch_jum_teras);
					// $('#jumlah_cpd').val(res.sch_jum_cpd);

					$('#loaderCalc').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
				}
			});
		} 
		
		if(prorate_svc != ''  && !$.isNumeric(prorate_svc)) {
			$('#updStaffCpdPointAlert').removeClass('hidden');
			msg.show('Invalid value! The Prorate Service field must contain only numbers.', 'warning', '#updStaffCpdPointAlert');
			// console.log('not number');
		 	return;
		}	
	});
    
    
</script>