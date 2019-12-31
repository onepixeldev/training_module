<?php echo $this->lib->title('Conference / Conference Report Application - Manual Entry', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF096 - Conference Report Application - Manual Entry</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Conference List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff List</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Part I</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Part II</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Part III</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Part IV</a>
                                </li>
								<!--<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">HOD Approval/Verification</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">TNC (A/A) / VC Approval/Verification</a>
                                </li>-->
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Month</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sMonth', $month_list, $cur_month, 'class="form-control listFilter" id="sMonth"'); ?>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Year</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sYear', $year_list, $cur_year, 'class="form-control listFilter" id="sYear"'); ?>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Reference ID/Title</b></label>
											</div>
										</div>
										<div class="col-md-6">
											<input name="name[ref_id_title]" placeholder="Reference ID/Title" class="form-control" type="text" id="refidTitle">
										</div>
										<button type="button" class="btn btn-primary search_refid_title_btn"><i class="fa fa-search"></i> Search</button>
									</div>

									<div id="conference_list">
                                        <div class="" id="loader">
										</div>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="staff_list_conference">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s3">
									<div id="part_i">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add report entry or click Edit from Staff List tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
									<div id="part_ii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="part_iii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="part_iv">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th>
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
	var ca_row = '';
	var sl_row = '';
	var stf_row = '';
	var crs_row = '';

	$(document).ready(function(){

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
	TAB 1 - CONFERENCE LIST
	-----------------------------*/
	var pMonth = 'CURR_M';
	var pYear = 'CURR_Y';

    // POPULATE CONFERENCE LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getConferenceInfoList')?>',
		data: {'sMonth' : pMonth, 'sYear' : pYear},
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#conference_list').html(res);
			ca_row = $('#tbl_ca_list').DataTable({
				"ordering":false,
			});
			$('#conference_list #add_rep_stf').html('<button type="button" class="btn btn-primary btn-sm add_rep_btn"><i class="fa fa-plus"></i> Add New Report Entry</button>').show();
		},
		complete: function(){
			$('#loader').hide();
		}
    });

    // CONFERENCE LIST  FILTER
	$('.listFilter').change(function() {
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		// alert(''+sMonth+',' +sYear);
		$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceInfoList')?>',
            data: {'sMonth' : sMonth, 'sYear' : sYear},
            success: function(res) {
                $('#conference_list').html(res);
                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                });
				$('#conference_list #add_rep_stf').html('<button type="button" class="btn btn-primary btn-sm add_rep_btn"><i class="fa fa-plus"></i> Add New Report Entry</button>').show();

				$('#staff_list_conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List</th></tr></thead></table></p>').show();
				$('#part_i').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
            }
        });
	});

	// SEARCH CONFERENCE STAFF LIST
	$('.search_refid_title_btn').click(function(){
		var thisBtn = $(this);
		var refidTitle = $('#refidTitle').val();
		// alert('TEST');

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceInfoList')?>',
            data: {'refid_title' : refidTitle},
            beforeSend: function() {
                $('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#conference_list').html(res);
                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                });
				$('#conference_list #add_rep_stf').html('<button type="button" class="btn btn-primary btn-sm add_rep_btn"><i class="fa fa-plus"></i> Add New Report Entry</button>').show();

				$('#staff_list_conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List</th></tr></thead></table></p>').show();
				$('#part_i').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
            },
        });
	});	

	// CONFERENCE STAFF LIST
	$('#conference_list').on('click','.con_app_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var crRefID = td.eq(0).html().trim();
		var crName = td.eq(1).html().trim();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffListConRep')?>',
			data: {'refid' : crRefID, 'crName' : crName},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#part_i').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
			},
			success: function(res) {
				$('#staff_list_conference').html(res);
				
				sl_row = $('#tbl_list_sta_cr').DataTable({
					"ordering":false,
				});
			}
		});
	});	

	// ADD NEW REPORT ENTRY
	$('#conference_list').on('click','.add_rep_btn', function(){
		$('#part_i').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();

		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addReportEntry')?>',
			// data: {'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#part_i').html(res);
				hide_loading();
				$('#staff_list_conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List</th></tr></thead></table></p>').show();
				$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
				$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add report entry on Part I tab or click Edit from Staff List tab</th></tr></thead></table></p>').show();
			}
		});
	});

	/*-----------------------------
	TAB 2 - STAFF LIST
	-----------------------------*/
	
	// EDIT REPORT STAFF
	$('#staff_list_conference').on('click','.rep_edit_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var refid = thisBtn.val();
		
		// REPORT PART I
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editRepPartI')?>',
			data: {'staff_id' : staff_id, 'refid' : refid},
			beforeSend: function() {
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#part_i').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_i').html(res);
			}
		});

		// REPORT PART II	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editRepPartII')?>',
			data: {'refid' : refid, 'staff_id' : staff_id},
			beforeSend: function() {
				$('#part_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_ii').html(res);
			}
		});

		// REPORT PART III	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editRepPartIII')?>',
			data: {'refid' : refid, 'staff_id' : staff_id},
			beforeSend: function() {
				$('#part_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_iii').html(res);
			}
		});

		// REPORT PART IV
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editRepPartIV')?>',
			data: {'refid' : refid, 'staff_id' : staff_id},
			beforeSend: function() {
				$('#part_iv').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_iv').html(res);
			}
		});
	});	

	/*-----------------------------
	TAB 3 - PART I
	-----------------------------*/

	///// SEARCH STAFF//////
	// AUTO SEARCH STAFF ID
	$('#part_i').on('keyup','#staff_id', function(){
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
						$('#staff_name').val(res.stf_name);

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getStaffDetlInfo')?>',
							data: {'staff_id' : staff_id},
							dataType: 'JSON',
							success: function(res) {
								if(res.sts == 1) {
									$('#postion').val(res.pos);
									$('#pos_lvl').val(res.pos_lvl);
									$('#dept_unit_id').val(res.dept_unit);
									$('#dept_unit_name').val(res.unit_desc);
									$('#ptj_fac_id').val(res.ptj_fac);
									$('#ptj_fac_name').val(res.dept_desc);

									// CLEAR PART II
									$('#con_id').val('');
									$('#con_name').val('');
									$('#paper_work_title_i').val('');
									$('#paper_work_title_ii').val('');
									$('#address').val('');
									$('#city').val('');
									$('#postcode').val('');
									$('#state').val('');
									$('#country').val('');
									$('#date_from').val('');
									$('#date_to').val('');
									$('#duration').val('');
									$('#organizer').val('');
									$('#fa_upsi').val('');
									$('#fa_ea').val('');
								} 
							}
						});
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID');
						$('#staff_name').val('');
						$('#postion').val('');
						$('#pos_lvl').val('');
						$('#dept_unit_id').val('');
						$('#dept_unit_name').val('');
						$('#ptj_fac_id').val('');
						$('#ptj_fac_name').val('');


						// CLEAR PART II
						$('#con_id').val('');
						$('#con_name').val('');
						$('#paper_work_title_i').val('');
						$('#paper_work_title_ii').val('');
						$('#address').val('');
						$('#city').val('');
						$('#postcode').val('');
						$('#state').val('');
						$('#country').val('');
						$('#date_from').val('');
						$('#date_to').val('');
						$('#duration').val('');
						$('#organizer').val('');
						$('#fa_upsi').val('');
						$('#fa_ea').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID');
			$('#staff_name').val('');
		}
	});

	// SEARCH STAFF
	$('#part_i').on('click','.search_staff', function(){
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
		// console.log(staff_id);

		if(staff_id != '' && staff_name != '') {
			$('#staff_id').val(staff_id);
			$('#staff_name').val(staff_name);

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getStaffDetlInfo')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						$('#postion').val(res.pos);
						$('#pos_lvl').val(res.pos_lvl);
						$('#dept_unit_id').val(res.dept_unit);
						$('#dept_unit_name').val(res.unit_desc);
						$('#ptj_fac_id').val(res.ptj_fac);
						$('#ptj_fac_name').val(res.dept_desc);

						// CLEAR PART II
						$('#con_id').val('');
						$('#con_name').val('');
						$('#paper_work_title_i').val('');
						$('#paper_work_title_ii').val('');
						$('#address').val('');
						$('#city').val('');
						$('#postcode').val('');
						$('#state').val('');
						$('#country').val('');
						$('#date_from').val('');
						$('#date_to').val('');
						$('#duration').val('');
						$('#organizer').val('');
						$('#fa_upsi').val('');
						$('#fa_ea').val('');
					} 
				}
			});
		}
	});
	///// SEARCH STAFF//////

	// SEARCH CONFERENCE
	$('#part_i').on('click','.search_cr', function(){
		var staff_id = $('#staff_id').val();
		var staff_name = $('#staff_name').val();
		// alert(staff_id);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchCrMd')?>',
			data: {'staff_id':staff_id,'staff_name':staff_name},
			success: function(res) {
				$('#myModalis .modal-content').html(res);

				crs_row = $('#myModalis #con_sr_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// SELECT CONFERENCE
	$('#myModalis').on('click', '.select_conference', function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var con_name = td.eq(1).html().trim();
		var staff_id = $('#staff_id_md').val();

		$('#myModalis').modal('hide');
		// console.log(staff_id);

		if(refid != '' && con_name != '' && staff_id != '') {
			$('#con_id').val(refid);
			$('#con_name').val(con_name);

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getConDetlInfo')?>',
				data: {'refid' : refid, 'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						// console.log(res.con_inf[0].CM_DATE_FROM);
						$('#paper_work_title_i').val(res.con_inf.SCM_PAPER_TITLE);
						$('#paper_work_title_ii').val(res.con_inf.SCM_PAPER_TITLE2);
						$('#address').val(res.con_inf.CM_ADDRESS);
						$('#city').val(res.con_inf.CM_CITY);
						$('#postcode').val(res.con_inf.CM_POSTCODE);
						$('#state').val(res.con_inf.SM_STATE_DESC);
						$('#country').val(res.con_inf.CM_COUNTRY_DESC);
						$('#date_from').val(res.con_inf.CM_DATE_FROM);
						$('#date_to').val(res.con_inf.CM_DATE_TO);
						$('#duration').val(res.con_inf.DURATION_CM);
						$('#organizer').val(res.con_inf.CM_ORGANIZER_NAME);
						$('#fa_upsi').val(res.con_inf.SCM_RM_TOTAL_AMT_APPROVE_TNCA);
						$('#fa_ea').val(res.con_inf.SCM_RM_SPONSOR_TOTAL_AMT);
					} 
				}
			});
		}
	});

	// SAVE REPORT ENTRY PART I
	$('#part_i').on('click', '.ins_rep_ent_pt_i', function (e) {
		e.preventDefault();
		var data = $('#addNewReportPartI').serialize();
		msg.wait('#alertAddNewReportPartI');
        msg.wait('#alertAddNewReportPartIFooter');
		//alert(data);
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRepPartI')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertAddNewReportPartI');
                msg.show(res.msg, res.alert, '#alertAddNewReportPartIFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
						var refid = res.refid;
						var staff_id = res.staff_id;
						$('.nav-tabs li:eq(3) a').tab('show');

						// REPORT PART I
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartI')?>',
							data: {'staff_id' : staff_id, 'refid' : refid},
							beforeSend: function() {
								$('#part_i').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_i').html(res);
							}
						});

						// REPORT PART II	
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_ii').html(res);
							}
						});

						// REPORT PART III	
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartIII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_iii').html(res);
							}
						});

						// REPORT PART IV
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartIV')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_iv').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_iv').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertAddNewReportPartI');
				msg.danger('Please contact administrator.', '#alertAddNewReportPartIFooter');
			}
		});	
	});
	
	// SAVE EDIT REPORT ENTRY PART I
	$('#part_i').on('click', '.edit_rep_ent_pt_i', function (e) {
		e.preventDefault();
		var data = $('#editReportPartI').serialize();
		msg.wait('#alertEditReportPartI');
        msg.wait('#alertEditReportPartIFooter');
		//alert(data);
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditRepPartI')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertEditReportPartI');
                msg.show(res.msg, res.alert, '#alertEditReportPartIFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
						var refid = res.refid;
						var staff_id = res.staff_id;

						// REPORT PART I
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartI')?>',
							data: {'staff_id' : staff_id, 'refid' : refid},
							beforeSend: function() {
								$('.nav-tabs li:eq(2) a').tab('show');
								$('#part_i').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_i').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditReportPartI');
				msg.danger('Please contact administrator.', '#alertEditReportPartIFooter');
			}
		});	
	});

	/*-----------------------------
	TAB 4 - PART II
	-----------------------------*/

	// SAVE EDIT REPORT ENTRY PART II
	$('#part_ii').on('click', '.edit_rep_part_ii', function (e) {
		e.preventDefault();
		var data = $('#editReportPartII').serialize();
		msg.wait('#alertEditReportPartII');
        // msg.wait('#alertEditReportPartIIFooter');
		//alert(data);
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRepPartII')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertEditReportPartII');
                // msg.show(res.msg, res.alert, '#alertEditReportPartIIFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
						var refid = res.refid;
						var staff_id = res.staff_id;

						$('#part_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							success: function(res) {
								$('.nav-tabs li:eq(3) a').tab('show');
								$('#part_ii').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditReportPartII');
				// msg.danger('Please contact administrator.', '#alertEditReportPartIIFooter');
			}
		});	
	});

	// ADD RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS MODAL
	$('#part_ii').on('click','.add_rec_net_relay', function(){
		var refid = $('#staff_id').val();
		var staff_id = $('#crRefid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addEstNetRelayMd')?>',
			data: {'refid':refid, 'staff_id':staff_id},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
	$('#myModalis2').on('click', '.ins_net_relay', function (e) {
		e.preventDefault();
		var data = $('#addEstNetRelayMd').serialize();
		msg.wait('#addEstNetRelayMdAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEstNetRelay')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addEstNetRelayMdAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						$('#myModalis2').modal('hide');
						
						var refid = res.refid;
						var staff_id = res.staff_id;

						$('#part_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							success: function(res) {
								$('.nav-tabs li:eq(3) a').tab('show');
								$('#part_ii').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addEstNetRelayMdAlert');
			}
		});
	});

	// DELETE RECORD ESTABLISHED NETWORKS AND RELATIONSHIPS
	$('#part_ii').on('click','.delete_scrpi', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var name = td.eq(0).html().trim();
		var field = td.eq(1).html().trim();
		var refid = $('#crRefid').val();
		var staff_id = $('#staff_id').val();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Record',
		    content: 'Are you sure to delete this record? <br> Established networks and relationships : <b>'+name+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delEstNetRelay')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'name' : name, 'field' : field},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
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

	/*-----------------------------
	TAB 5 - PART III
	-----------------------------*/

	// SAVE EDIT REPORT ENTRY PART III
	$('#part_iii').on('click', '.edit_rep_part_iii', function (e) {
		e.preventDefault();
		var data = $('#editReportPartIII').serialize();
		msg.wait('#alertEditReportPartIII');
        msg.wait('#alertEditReportPartIIIFooter');
		//alert(data);
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRepPartIII')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertEditReportPartIII');
                msg.show(res.msg, res.alert, '#alertEditReportPartIIIFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
						var refid = res.refid;
						var staff_id = res.staff_id;

						// REPORT PART III	
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartIII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_iii').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditReportPartII');
				msg.danger('Please contact administrator.', '#alertEditReportPartIIIFooter');
			}
		});	
	});

	// ADD RECORD SCR PART 2
	$('#part_iii').on('click','.add_scrpii', function(){
		var refid = $('#staff_id').val();
		var staff_id = $('#crRefid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addScrPartIIMd')?>',
			data: {'refid':refid, 'staff_id':staff_id},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE RECORD SCR PART 2
	$('#myModalis2').on('click', '.save_scrpii', function (e) {
		e.preventDefault();
		var data = $('#addScrPartIIMd').serialize();
		msg.wait('#addScrPartIIMdAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveScrpii')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addScrPartIIMdAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						$('#myModalis2').modal('hide');
						
						var refid = res.refid;
						var staff_id = res.staff_id;
						
						// REPORT PART III	
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartIII')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_iii').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addScrPartIIMdAlert');
			}
		});
	});

	// DELETE RECORD SCR PART 2
	$('#part_iii').on('click','.delete_scrpii', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var activity = td.eq(0).html().trim();
		var refid = $('#crRefid').val();
		var staff_id = $('#staff_id').val();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Record',
		    content: 'Are you sure to delete this record? <br> Plan / Activity / Follow-Up at PTj : <b>'+activity+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delScrpII')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'activity' : activity},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
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

	// FILE ATTACHMENT
	$('#part_iii').on('click','.file_attach_part_iii', function(){
		var thisBtn = $(this);
		staff_id = $('#staff_id').val();
		refid = $('#crRefid').val();
		// alert(staff_id+' '+refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('fileAttParam')?>',
			data: {'staff_id' : staff_id, 'refid' : refid},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					var ecommURL = '<?php echo $this->lib->class_url('fileAttachment') ?>';
					var newWin = window.open(ecommURL, '_blank', 'width=800, height=300');
				} else {
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
    });

	/*-----------------------------
	TAB 6 - PART IV
	-----------------------------*/

	///// SEARCH STAFF CERTIFIED BY//////
	// AUTO SEARCH STAFF ID
	$('#part_iv').on('keyup','#staff_id_hod', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfIDHod');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfIDHod');
						$('#staff_name_hod').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfIDHod');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfIDHod');
			$('#staff_name').val('');
		}
	});

	// SEARCH STAFF
	$('#part_iv').on('click','.search_staff_hod', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis .modal-content .search_staff_md').replaceWith('<div class="col-md-2" id="search_staff_div"><button type="button" class="btn btn-primary search_staff_md_hod"><i class="fa fa-search"></i> </button></div>');
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md_hod', function () {
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
					drawCallback: function(){
						$(function() {
							$('#tbl_stf_res_list').each(function() {
							var Cell = $(this).find('td:eq(2)');
							//debugger;
								if (Cell.text() !== 'error') {
									$('#tbl_stf_res_list tbody .select_staff_id').replaceWith('<button type="button" class="btn btn-primary btn-xs select_staff_id_hod"><i class="fa fa-chevron-down"></i> Select</button>');
								}
							});
						});
					}
                });
			}
		});
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id_hod', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		// console.log(staff_id);

		if(staff_id != '' && staff_name != '') {
			$('#staff_id_hod').val(staff_id);
			$('#staff_name_hod').val(staff_name);
		}
	});
	///// SEARCH STAFF CERTIFIED BY//////

	///// SEARCH STAFF APPROVED BY//////
	// AUTO SEARCH STAFF ID
	$('#part_iv').on('keyup','#staff_id_tnca', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfIDTnca');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfIDTnca');
						$('#staff_name_tnca').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfIDTnca');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfIDTnca');
			$('#staff_name_tnca').val('');
		}
	});

	// SEARCH STAFF
	$('#part_iv').on('click','.search_staff_tnca', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis .modal-content .search_staff_md').replaceWith('<div class="col-md-2" id="search_staff_div"><button type="button" class="btn btn-primary search_staff_md_tnca"><i class="fa fa-search"></i> </button></div>');
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md_tnca', function () {
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
					drawCallback: function(){
						$(function() {
							$('#tbl_stf_res_list').each(function() {
							var Cell = $(this).find('td:eq(2)');
							//debugger;
								if (Cell.text() !== 'error') {
									$('#tbl_stf_res_list tbody .select_staff_id').replaceWith('<button type="button" class="btn btn-primary btn-xs select_staff_id_tnca"><i class="fa fa-chevron-down"></i> Select</button>');
								}
							});
						});
					}
                });
			}
		});
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id_tnca', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		// console.log(staff_id);

		if(staff_id != '' && staff_name != '') {
			$('#staff_id_tnca').val(staff_id);
			$('#staff_name_tnca').val(staff_name);
		}
	});
	///// SEARCH STAFF APPROVED BY//////

	// SAVE EDIT REPORT ENTRY PART II
	$('#part_iv').on('click', '.edit_rep_part_iv', function (e) {
		e.preventDefault();
		var data = $('#editReportPartIV').serialize();
		msg.wait('#alertEditReportPartIV');
        msg.wait('#alertEditReportPartIVFooter');
		//alert(data);
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRepPartIV')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertEditReportPartIV');
                msg.show(res.msg, res.alert, '#alertEditReportPartIVFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
						var refid = res.refid;
						var staff_id = res.staff_id;

						// REPORT PART IV
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editRepPartIV')?>',
							data: {'refid' : refid, 'staff_id' : staff_id},
							beforeSend: function() {
								$('#part_iv').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#part_iv').html(res);
							}
						});
						
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditReportPartIV');
				msg.danger('Please contact administrator.', '#alertEditReportPartIVFooter');
			}
		});	
	});
</script>