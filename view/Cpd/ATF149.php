<?php echo $this->lib->title('CPD / Staff CPD Manual Entry', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF149 - Staff CPD Manual Entry</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Unregistered Staff</a>
                                </li>

								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">CPD Info</a>
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


									<div id="unreg_staff_cpd">
									</div>
                                </div> 

								<div class="tab-pane fade" id="s2">
									<div id="cpd_info">
                                        <p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click Create button from Unregistered Staff tab</th>
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
	$('#unreg_staff_cpd').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getUnregStaff')?>',
		data: {'year':year, 'department':department},
		success: function(res) {
			$('#unreg_staff_cpd').html(res);

			cf_row = $('#tbl_unreg_stf_list').DataTable({
				"ordering":false,
			});
		}
	});

	// FILTER
	$('.listFilter1').change(function() {
		var year = $('#sYear').val();
		var department = $('#sDept').val();

		if(year == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please select <b>Year</b>',
				type: 'red',
			});

			return;
		}

		if(department == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please select <b>Department</b>',
				type: 'red',
			});

			return;
		}

		$('#unreg_staff_cpd').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#cpd_info').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Create button from Unregistered Staff tab</th></tr></thead></table></p>').show();
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getUnregStaff')?>',
			data: {'year':year, 'department':department},
			success: function(res) {
				$('#unreg_staff_cpd').html(res);

				cf_row = $('#tbl_unreg_stf_list').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// CREATE STAFF
	$('#unreg_staff_cpd').on('click','.create_staff', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		var dept = td.eq(3).html().trim();
		var job_code = td.eq(4).html().trim();
		var year = $("#sYear").val();
		
		$.confirm({
		    title: 'Staff CPD Entry',
		    content: 'Proceed to staff CPD entry? <br> <b>'+staff_id+' - '+staff_name+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					show_loading();

					if(year != '') {
						var curr_yyyy = '';
						// console.log(y_from);

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('validateCrDate')?>',
							// data: {'y_from' : y_from},
							dataType: 'JSON',
							success: function(res) {
								hide_loading();
								curr_yyyy = res.sys_yyyy;

								// CHECK IF YEAR_FROM == CURRENT YEAR
								if(year == curr_yyyy) {
									$.ajax({
										type: 'POST',
										url: '<?php echo $this->lib->class_url('regStaffCpd')?>',
										data: {'staff_id' : staff_id, 'year' : year, 'dept' : dept, 'job_code' : job_code},
										dataType: 'JSON',
										success: function(res) {
											if (res.sts==1) {
												
												$.alert({
													title: 'Success!',
													content: res.msg,
													type: 'green',
												});
												hide_loading();
												thisBtn.parents('tr').fadeOut().delay(1000).remove();

												$.ajax({
													type: 'POST',
													url: '<?php echo $this->lib->class_url('updCpdInfo')?>',
													data: {'staff_id' : staff_id, 'year' : year},
													beforeSend: function() {
														$('.nav-tabs li:eq(1) a').tab('show');
														$('#cpd_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
													},
													success: function(res) {
														$('#cpd_info').html(res);
													}
												});
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
								} else {
									$.alert({
										title: 'Alert!',
										content: 'Cannot update previous year record.',
										type: 'red',
									});
									hide_loading();

								}
							}
						})
					}




								
		        },
		        cancel: function () {
		            $.alert('Canceled register staff!');
		        }
		    }
		});
	});

	// CALCULATE CPD INFO KEYUP
	$('#cpd_info').on('keyup','#prorate_service', function(){
		var year = $('#year').val();
		var staff_id = $('#staff_id').val();
		var prorate_svc = $('#prorate_service').val();
		var kump = $('#kump').val(); 
		// console.log(prorate_svc);
		
		if(prorate_svc != '' && $.isNumeric(prorate_svc)) {
			$('#updCpdInfoAlert').addClass('hidden');
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
					$('#pemberat_lnpt').val(res.sch_pemberat_lpp);
					$('#peratus_lnpt').val(res.sch_peratus_lpp);

					$('#jum_khu_min').val(res.sch_jum_khusus_min);
					$('#jum_um_min').val(res.sch_jum_umum_min);
					$('#jum_tr_min').val(res.sch_jum_teras_min);
					$('#cpd_layak').val(res.sch_cpd_layak);

					$('#jumlah_khusus').val(res.sch_jum_khusus);
					$('#jumlah_umum').val(res.sch_jum_umum);
					$('#jumlah_teras').val(res.sch_jum_teras);
					$('#jumlah_cpd').val(res.sch_jum_cpd);

					$('#loaderCalc').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
				}
			});
		} 
		
		if(prorate_svc != ''  && !$.isNumeric(prorate_svc)) {
			$('#updCpdInfoAlert').removeClass('hidden');
			msg.show('The Prorate Service field must contain only numbers.', 'warning', '#updCpdInfoAlert');
			console.log('not number');
		 	return;
		}	
	});

	// SAVE UPDATE CPD INFO
	$('#cpd_info').on('click', '.save_upd_stf_cpd', function (e) {
		e.preventDefault();
		var year = $("#year").val();
		var staff_id = $("#staff_id").val();
		var data = $('#updCpdInfo').serialize();
		msg.wait('#updCpdInfoAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$('#updCpdInfoAlert').removeClass('hidden');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdCpdPointInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updCpdInfoAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');

						// $.ajax({
						// 	type: 'POST',
						// 	url: '<?php echo $this->lib->class_url('updCpdInfo')?>',
						// 	data: {'staff_id' : staff_id, 'year' : year},
						// 	beforeSend: function() {
						// 		$('.nav-tabs li:eq(1) a').tab('show');
						// 		$('#cpd_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						// 	},
						// 	success: function(res) {
						// 		$('#cpd_info').html(res);
						// 	}
						// });

						$('#cpd_info').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Create button from Unregistered Staff tab</th></tr></thead></table></p>').show();
						$('.nav-tabs li:eq(0) a').tab('show');

					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#updCpdInfoAlert');
			}
		});	
	});
</script>