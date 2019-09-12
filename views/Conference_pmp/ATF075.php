<?php echo $this->lib->title('Conference / Conference Application - Manual Entry', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF075 - Conference Application - Manual Entry</h2>				
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
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Conference Application</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Conference Leave</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Allowances</a>
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
									<div id="conference_application">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click Add New Staff or Edit from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
									<div id="conference_leave">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add record from Conference Application or click Edit from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="allowances">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please add record from Conference Application or click Edit from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<!--<div class="tab-pane fade" id="s6">
									<div id="hod_approval_verification">
									</div>
                                </div>

								<div class="tab-pane fade" id="s7">
									<div id="tncaa_approval_verification">
									</div>
                                </div>-->  

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
	
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
        if (!empty($currtab)) {
            if ($currtab == 's1'){
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
		},
		complete: function(){
			$('#loader').hide();
		},
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
			url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
			data: {'refid' : crRefID, 'crName' : crName},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#conference_application').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Add New Staff or Edit from Staff List</th></tr></thead></table></p>').show();
				$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
				$('#allowances').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
			},
			success: function(res) {
				$('#staff_list_conference').html(res);
				
				ca_row = $('#tbl_list_sta_cr').DataTable({
					"ordering":false,
				});
			}
		});
	});	

	/*-----------------------------
	TAB 2 - STAFF LIST
	-----------------------------*/

	// ADD STAFF TO CONFERENCE
	$('#staff_list_conference').on('click','.con_app_add_btn', function(){
		var thisBtn = $(this);
		var crRefID = thisBtn.val();
		var crName = thisBtn.data("crname");
		// alert(crRefID+crName);

		$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStaffConference')?>',
			data: {'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#conference_application').html(res);
				$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
				$('#allowances').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
				hide_loading();
			}
		});
	});

	// EDIT STAFF TO CONFERENCE
	$('#staff_list_conference').on('click','.stacr_edit_btn', function(){
		var thisBtn = $(this);
		var crRefID = thisBtn.val();
		var crName = thisBtn.data("crname");
		var td = thisBtn.parent().siblings();
		var crStaffID = td.eq(0).html().trim();
		var crStaffName = td.eq(1).html().trim();
		// alert(crRefID+' '+crName+' '+crStaffID);

		$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStaffConference')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#conference_application').html(res);
				$('.print_att_btn').addClass('hidden');
				
				// MODIFY INPUT FIELD RELATED TO SPONSOR
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('checkSponsor')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID},
					dataType: 'JSON',
					success: function(res) {
						var sponsor = res.sponsor;
						
						if(sponsor != "" && (sponsor == 'Y' || sponsor == 'H')) {
							$('#spName').html('Sponsor Name <b><font color="red">* </font></b>').show();
							$('#budSp').html('Budget Origin for Sponsor <b><font color="red">* </font></b>').show();
							$('#totalAmt').html('Total (RM) <b><font color="red">* </font></b>').show();

							$('#spNameInput').prop('readonly', false);

							$('.budSpInput').removeAttr('disabled');
							$('#spNameInputDummy').attr('disabled', 'disabled');

							$('#totalAmtInput').prop('readonly', false);
						} else {
							$('#spName').html('Sponsor Name').show();
							$('#budSp').html('Budget Origin for Sponsor').show();
							$('#totalAmt').html('Total (RM)').show();

							$('#spNameInput').prop('readonly', true);

							$('.budSpInput').attr('disabled', 'disabled');
							$('#spNameInputDummy').removeAttr('disabled');

							$('#totalAmtInput').prop('readonly', true);
						}
					}
				});

				// ADD / UPDATE CONFERENCE LEAVE RECORD
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#conference_leave').html(res);
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#allowances').html(res);
					}
				});

				$('.nav-tabs li:eq(2) a').tab('show');
				hide_loading();
			}
		});
	});

	// DELETE STAFF FROM CONFERENCE
	$('#staff_list_conference').on('click', '.stacr_del_btn', function() {
		var thisBtn = $(this);
		var crRefID = thisBtn.val();
		var crName = thisBtn.data("crname");
		var td = thisBtn.parent().siblings();
		var crStaffID = td.eq(0).html().trim();
		var crStaffName = td.eq(1).html().trim();
		// alert(staffId+' '+crRefID);

		$.confirm({
		    title: 'Delete Staff',
		    content: 'Are you sure to delete this record? <br> <b>'+crStaffID+' - '+crStaffName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delStfConference')?>',
						data: {'staffId' : crStaffID, 'crRefID' : crRefID},
						dataType: 'JSON',
						beforeSend: function() {
							show_loading();
						},
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								
								// refresh staff list tab
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
									data: {'refid' : crRefID, 'crName' : crName},
									beforeSend: function() {
										$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#staff_list_conference').html(res);
										
										ca_row = $('#tbl_list_sta_cr').DataTable({
											"ordering":false,
										});
										
										$('#conference_application').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Add New Staff or Edit from Staff List</th></tr></thead></table></p>').show();
										$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
										$('#allowances').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please add record from Conference Application or click Edit from Staff List</th></tr></thead></table></p>').show();
									}
								});
								
							} else {
								hide_loading();
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
	TAB 3 - CONFERENCE APPLICATION
	-----------------------------*/
	
	// MODIFY INPUT FIELD RELATED TO SPONSOR
	$('#conference_application').on('change', '#sponsor', function () {
		sponsor = $('#sponsor').val();
		// alert(sponsor);
		if(sponsor != "" && (sponsor == 'Y' || sponsor == 'H')) {
			$('#spName').html('Sponsor Name <b><font color="red">* </font></b>').show();
			$('#budSp').html('Budget Origin for Sponsor <b><font color="red">* </font></b>').show();
			$('#totalAmt').html('Total (RM) <b><font color="red">* </font></b>').show();

			$('#spNameInput').prop('readonly', false);

			$('.budSpInput').removeAttr('disabled');
			$('#spNameInputDummy').attr('disabled', 'disabled');

			$('#totalAmtInput').prop('readonly', false);
		} else {
			$('#spName').html('Sponsor Name').show();
			$('#budSp').html('Budget Origin for Sponsor').show();
			$('#totalAmt').html('Total (RM)').show();

			$('#spNameInput').prop('readonly', true);
			$('#spNameInput').val('');

			$('.budSpInput').attr('disabled', 'disabled');
			$('.budSpInput').val('');
			$('#spNameInputDummy').removeAttr('disabled');

			$('#totalAmtInput').prop('readonly', true);
			$('#totalAmtInput').val('');
		}
	});

	// STATUS FIELD ALERT ADD NEW STAFF
	$('#conference_application').on('change', '#status', function () {
		status = $('#status').val();
		approveByHod = $('#approveByHod').val();
		approveDateHod = $('#approveDateHod').val();
		tncaRemark = $('#tncaRemark').val();
		approveByTnca = $('#approveByTnca').val();
		approveDateTnca = $('#approveDateTnca').val();
		// alert(status);

		if(status != "" && status == 'VERIFY_TNCA') {
			$.alert({
				title: 'Alert',
				content: 'Please fill in <b>Head of Department Approval/Verification</b> section',
				type: 'red',
			});

			// if(approveByHod == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved By (HOD)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveDateHod == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved Date (HOD)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// }
		} else if(status != "" && status == 'VERIFY_VC') {
			$.alert({
				title: 'Alert',
				content: 'Please fill in <b>TNC (A&A) Approval/Verification</b> section',
				type: 'red',
			});
			// if(tncaRemark == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Remark (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveByTnca == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved By (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveDateTnca == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved Date (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// }
		} else if(status != "" && status == 'APPROVE') {
			$.alert({
				title: 'Alert',
				content: 'Please fill in <b>Head of Department Approval/Verification</b> and <b>TNC (A&A) Approval/Verification</b> section',
				type: 'red',
			});
			
			// if(approveByHod == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved By (HOD)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveDateHod == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved Date (HOD)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(tncaRemark == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Remark (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveByTnca == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved By (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// } else if(approveDateTnca == '') {
			// 	$.alert({
			// 		title: 'Alert',
			// 		content: 'Please fill in <b>Approved Date (TNCA)</b>',
			// 		type: 'red',
			// 	});
			// 	// $('#status').val('');
			// }
		}
	});

	// STATUS FIELD ALERT UPDATE STAFF
	$('#conference_application').on('change', '#statusUpd', function () {
		status = $('#statusUpd').val();
		approveByHod = $('#approveByHod').val();
		approveDateHod = $('#approveDateHod').val();
		tncaRemark = $('#tncaRemark').val();
		approveByTnca = $('#approveByTnca').val();
		approveDateTnca = $('#approveDateTnca').val();
		staff_id = $('#staffID').val();
		refid = $('#crRefid').val();
		currStatus = '';
		resSts = '';
		// alert(staff_id);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffConStatus')?>',
			data: {'staffID' : staff_id, 'refid' : refid},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					currStatus = res.status;
				}
			}
		}).done(function(currStatus) {
			resSts = currStatus.status;
			// alert(resSts);
			if(status != "" && status == 'VERIFY_TNCA') {
				$.alert({
					title: 'Alert',
					content: 'Please fill in <b>Head of Department Approval/Verification</b> section',
					type: 'red',
				});

				// if(approveByHod == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved By (HOD)</b> first',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveDateHod == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved Date (HOD)</b> first',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// }
			} else if(status != "" && status == 'VERIFY_VC') {
				$.alert({
					title: 'Alert',
					content: 'Please fill in <b>TNC (A&A) Approval/Verification</b> section',
					type: 'red',
				});
				// if(tncaRemark == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Remark (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveByTnca == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved By (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveDateTnca == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved Date (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// }
			} else if(status != "" && status == 'APPROVE') {
				$.alert({
					title: 'Alert',
					content: 'Please fill in <b>Head of Department Approval/Verification</b> and <b>TNC (A&A) Approval/Verification</b> section',
					type: 'red',
				});
				// if(approveByHod == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved By (HOD)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveDateHod == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved Date (HOD)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(tncaRemark == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Remark (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveByTnca == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved By (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// } else if(approveDateTnca == '') {
				// 	$.alert({
				// 		title: 'Alert',
				// 		content: 'Please fill in <b>Approved Date (TNCA)</b>',
				// 		type: 'red',
				// 	});
				// 	$('#statusUpd').val(resSts);
				// }
			}
		});
	});

	// SAVE INSERT STAFF TO CONFERENCE
	$('#conference_application').on('click', '.ins_stf_cr', function (e) {
		e.preventDefault();
		var data = $('#addStaffConference').serialize();
		msg.wait('#alertStaffConference');
        msg.wait('#alertStaffConferenceFooter');
		//alert(data);
		crStaffID = $('#staffID').val();
		crRefID = $('#crRefid').val();
		crName = $('#crName').val();
		crStaffName = '';
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveNewStfCr')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertStaffConference');
                msg.show(res.msg, res.alert, '#alertStaffConferenceFooter');

				if (res.sts == 1) {
					var sponsor = res.sponsor;
					setTimeout(function () {
						$('.btn').removeAttr('disabled');

						// refresh staff list tab
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
							data: {'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#staff_list_conference').html(res);
								
								ca_row = $('#tbl_list_sta_cr').DataTable({
									"ordering":false,
								});
							}
						});
						
						// redirect to edit staff
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editStaffConference')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#conference_application').html(res);
								
								// MODIFY INPUT FIELD RELATED TO SPONSOR
								if(sponsor != "" && (sponsor == 'Y' || sponsor == 'H')) {
									$('#spName').html('Sponsor Name <b><font color="red">* </font></b>').show();
									$('#budSp').html('Budget Origin for Sponsor <b><font color="red">* </font></b>').show();
									$('#totalAmt').html('Total (RM) <b><font color="red">* </font></b>').show();

									$('#spNameInput').prop('readonly', false);

									$('.budSpInput').removeAttr('disabled');
									$('#spNameInputDummy').attr('disabled', 'disabled');

									$('#totalAmtInput').prop('readonly', false);
								} else {
									$('#spName').html('Sponsor Name').show();
									$('#budSp').html('Budget Origin for Sponsor').show();
									$('#totalAmt').html('Total (RM)').show();

									$('#spNameInput').prop('readonly', true);

									$('.budSpInput').attr('disabled', 'disabled');
									$('#spNameInputDummy').removeAttr('disabled');

									$('#totalAmtInput').prop('readonly', true);
								}
							}
						});

						// ADD CONFERENCE LEAVE RECORD
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#conference_leave').html(res);
								$('.nav-tabs li:eq(3) a').tab('show');
							}
						});
						
						// ADD STAFF CONFERENCE ALLOWANCE RECORD
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#allowances').html(res);
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertStaffConference');
				msg.danger('Please contact administrator.', '#alertStaffConferenceFooter');
			}
		});	
	});

	// SAVE EDIT STAFF TO CONFERENCE
	$('#conference_application').on('click', '.edit_stf_cr', function (e) {
		e.preventDefault();
		var data = $('#editStaffConference').serialize();
		msg.wait('#alertEditStaffConference');
        msg.wait('#alertEditStaffConferenceFooter');
		//alert(data);
		crStaffID = $('#staffID').val();
		crRefID = $('#crRefid').val();
		crName = $('#crName').val();
		crStaffName = '';
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditStfCr')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertEditStaffConference');
                msg.show(res.msg, res.alert, '#alertEditStaffConferenceFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');

						// refresh staff list tab
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
							data: {'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#staff_list_conference').html(res);
								
								ca_row = $('#tbl_list_sta_cr').DataTable({
									"ordering":false,
								});
							}
						});
						
						// refresh to edit staff
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editStaffConference')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('.nav-tabs li:eq(2) a').tab('show');
								
								// MODIFY INPUT FIELD RELATED TO SPONSOR
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('checkSponsor')?>',
									data: {'staffID' : crStaffID, 'refid' : crRefID},
									dataType: 'JSON',
									success: function(res) {
										var sponsor = res.sponsor;
										
										if(sponsor != "" && (sponsor == 'Y' || sponsor == 'H')) {
											$('#spName').html('Sponsor Name <b><font color="red">* </font></b>').show();
											$('#budSp').html('Budget Origin for Sponsor <b><font color="red">* </font></b>').show();
											$('#totalAmt').html('Total (RM) <b><font color="red">* </font></b>').show();

											$('#spNameInput').prop('readonly', false);

											$('.budSpInput').removeAttr('disabled');
											$('#spNameInputDummy').attr('disabled', 'disabled');

											$('#totalAmtInput').prop('readonly', false);
										} else {
											$('#spName').html('Sponsor Name').show();
											$('#budSp').html('Budget Origin for Sponsor').show();
											$('#totalAmt').html('Total (RM)').show();

											$('#spNameInput').prop('readonly', true);

											$('.budSpInput').attr('disabled', 'disabled');
											$('#spNameInputDummy').removeAttr('disabled');

											$('#totalAmtInput').prop('readonly', true);
										}
									}
								});

								$('#conference_application').html(res);
							}
						});

						// refresh leave conference
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#conference_leave').html(res);
							}
						});

						// REFRESH STAFF CONFERENCE ALLOWANCE RECORD
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#allowances').html(res);
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditStaffConference');
				msg.danger('Please contact administrator.', '#alertEditStaffConferenceFooter');
			}
		});	
	});

	// FILE ATTACHMENT
	$('#conference_application').on('click','.file_att_btn', function(){
		var thisBtn = $(this);
		crStaffID = $('#staffID').val();
		crRefID = $('#crRefid').val();
		//alert(crStaffID+' '+crRefID);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('fileAttParam')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID},
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

	// PRINT PMP
	$('#conference_application').on('click','.print_pmp_btn', function () {
		var repCode = $(this).attr('repCode');
		crStaffID = $('#staffID').val();
		crRefID = $('#crRefid').val();
		// alert(repCode+' '+crStaffID+' '+crRefID);
		
		$.post('<?php echo $this->lib->class_url('setParamPmpAtt') ?>', {repCode: repCode, crStaffID: crStaffID, crRefID: crRefID}, function (res) {
			var repURL = '<?php echo $this->lib->class_url('genReportPmpAtt') ?>';
			var mywin = window.open( repURL , 'report');
		}).fail(function(){
			msg.danger('Please contact administrator.', '#alertEditStaffConference');        
		});
	});

	// PRINT ATTACHMENT A/B
	$('#conference_application').on('click','.print_att_btn', function () {
		var repCode = $(this).attr('repCode');
		crStaffID = $('#staffID').val();
		crRefID = $('#crRefid').val();
		// alert(repCode+' '+crStaffID+' '+crRefID);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setParamPmpAtt')?>',
			data: {'repCode': repCode, 'crStaffID': crStaffID, 'crRefID': crRefID},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 0) {
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				} else {
					var repURL = '<?php echo $this->lib->class_url('genReportPmpAtt') ?>';
					var mywin = window.open( repURL , 'report');
				}
			}
		});
	});

	/*-----------------------------
	TAB 4 - CONFERENCE LEAVE
	-----------------------------*/
	// TOTAL DAY APPLIED
	$('#conference_leave').on('dp.change', '#appliedDateFrom', function(){ 
		app_date_fr = $('#appliedDateFrom').val();
		app_date_to = $('#appliedDateTo').val();
        // console.log(app_date_to);

		$('#loaderTDayApp').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		if(app_date_fr != '' && app_date_to != '') {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('countTotalDayApplied')?>',
				data: {'app_date_fr' : app_date_fr, 'app_date_to' : app_date_to},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						$('#totalDayApplied').val(res.total_day_applied);
					}
					$('#loaderTDayApp').hide();
				}
			});
		} else {
			$('#totalDayApplied').val('0');
			$('#loaderTDayApp').hide();
			return;
		}
    });

	$('#conference_leave').on('dp.change', '#appliedDateTo', function(){ 
		app_date_fr = $('#appliedDateFrom').val();
		app_date_to = $('#appliedDateTo').val();
        // console.log(app_date_to);

		$('#loaderTDayApp').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		if(app_date_fr != '' && app_date_to != '') {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('countTotalDayApplied')?>',
				data: {'app_date_fr' : app_date_fr, 'app_date_to' : app_date_to},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						$('#totalDayApplied').val(res.total_day_applied);
					}
					$('#loaderTDayApp').hide();
				}
			});
		} else {
			$('#totalDayApplied').val('0');
			$('#loaderTDayApp').hide();
			return;
		}
    });

	// TOTAL DAY APPROVE
	$('#conference_leave').on('dp.change', '#approveDateFrom', function(e){ 
		app_date_fr = $('#approveDateFrom').val();
		app_date_to = $('#approveDateTo').val();
		staffID = $('#staff_id').val();
		crRefid = $('#crRefid').val();
		// alert(app_date_fr);
		$('#loaderTDayApp').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();

		if(app_date_fr != '' && app_date_to != '') {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('countTotalDayApplied')?>',
				data: {'app_date_fr' : app_date_fr, 'app_date_to' : app_date_to},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						total_day_applied = res.total_day_applied
						$('#totalDayApprove').val(total_day_applied);
						// balance_leave = balance_leave - res.total_day_applied;
						// alert(total_day_applied);
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getLeaveBalance')?>',
							data: {'staffID' : staffID, 'crRefid' : crRefid, 'total_day_applied' : total_day_applied, 'app_date_fr' : app_date_fr},
							dataType: 'JSON',
							success: function(res) {
								if(res.sts == 1) {
									// alert('1sts');
									leave_balance_db = res.leave_balance;
									leave_balance_ac = parseInt(leave_balance_db) - parseInt(total_day_applied);
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_ac);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 2) {
									// alert('2sts');
									leave_balance_db = parseInt(res.leave_balance);
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_db);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 3) {
									// alert('3sts');
									leave_balance_db = parseInt(res.leave_balance) + (parseInt(res.sld_total_day_db) - parseInt(total_day_applied));
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_db);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 4) {
									// alert('4sts');
									leave_balance_db = res.leave_balance;
									total_day_db = res.sld_total_day_db;
									leave_balance_ac = parseInt(leave_balance_db) - (parseInt(total_day_applied)-parseInt(total_day_db));
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_ac);
									$('#entitledYear').val(res.app_date_fr_year);
								}
							}
						});
					}
					$('#loaderTDayApp').hide();
				}
			});
		} else {
			$('#totalDayApprove').val('0');
			$('#entitledLeave').val('0');
			$('#entitledYear').val('0');
			$('#balanceLeave').val('0');
			$('#loaderTDayApp').hide();
			return;
		}
    });

	$('#conference_leave').on('dp.change', '#approveDateTo', function(e){ 
		app_date_fr = $('#approveDateFrom').val();
		app_date_to = $('#approveDateTo').val();
		staffID = $('#staff_id').val();
		crRefid = $('#crRefid').val();
		// alert(app_date_fr);
		$('#loaderTDayApp').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();

		if(app_date_fr != '' && app_date_to != '') {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('countTotalDayApplied')?>',
				data: {'app_date_fr' : app_date_fr, 'app_date_to' : app_date_to},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						total_day_applied = res.total_day_applied
						$('#totalDayApprove').val(total_day_applied);
						// balance_leave = balance_leave - res.total_day_applied;
						// alert(total_day_applied);
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getLeaveBalance')?>',
							data: {'staffID' : staffID, 'crRefid' : crRefid, 'total_day_applied' : total_day_applied, 'app_date_fr' : app_date_fr},
							dataType: 'JSON',
							success: function(res) {
								if(res.sts == 1) {
									// alert('1sts');
									leave_balance_db = res.leave_balance;
									leave_balance_ac = parseInt(leave_balance_db) - parseInt(total_day_applied);
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_ac);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 2) {
									// alert('2sts');
									leave_balance_db = parseInt(res.leave_balance);
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_db);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 3) {
									// alert('3sts');
									leave_balance_db = parseInt(res.leave_balance) + (parseInt(res.sld_total_day_db) - parseInt(total_day_applied));
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_db);
									$('#entitledYear').val(res.app_date_fr_year);
								} else if (res.sts == 4) {
									// alert('4sts');
									leave_balance_db = res.leave_balance;
									total_day_db = res.sld_total_day_db;
									leave_balance_ac = parseInt(leave_balance_db) - (parseInt(total_day_applied)-parseInt(total_day_db));
									$('#entitledLeave').val(res.entitled_leave);
									$('#balanceLeave').val(leave_balance_ac);
									$('#entitledYear').val(res.app_date_fr_year);
								}
							}
						});
					}
					$('#loaderTDayApp').hide();
				}
			});
		} else {
			$('#totalDayApprove').val('0');
			$('#entitledLeave').val('0');
			$('#entitledYear').val('0');
			$('#balanceLeave').val('0');
			$('#loaderTDayApp').hide();
			return;
		}
    });

	// SAVE ADD/EDIT CONFERENCE LEAVE
	$('#conference_leave').on('click', '.ins_con_leave', function (e) {
		e.preventDefault();
		balance = $('#balanceLeave').val();
		if(balance < 0) {
			$.alert({
				title: 'Alert!',
				content: 'The leave applied exceeds the conference leave balance. Please apply for annual leave.',
				type: 'red',
			});

			return;
		}

		var data = $('#addConferenceLeave').serialize();
		msg.wait('#alertConferenceLeave');
        msg.wait('#alertConferenceLeaveFooter');
		//alert(data);
		crStaffID = $('#staff_id').val();
		crRefID = $('#crRefid').val();
		crName = $('#crName').val();
		crStaffName = $('#staff_name').val();
		//alert(crStaffID);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveInsEditConLeave')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertConferenceLeave');
                msg.show(res.msg, res.alert, '#alertConferenceLeaveFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');

						// refresh staff list tab
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
							data: {'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#staff_list_conference').html(res);
								
								ca_row = $('#tbl_list_sta_cr').DataTable({
									"ordering":false,
								});
							}
						});
						
						// refresh edit conference application
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editStaffConference')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
							beforeSend: function() {
								$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								// MODIFY INPUT FIELD RELATED TO SPONSOR
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('checkSponsor')?>',
									data: {'staffID' : crStaffID, 'refid' : crRefID},
									dataType: 'JSON',
									success: function(res) {
										var sponsor = res.sponsor;
										
										if(sponsor != "" && (sponsor == 'Y' || sponsor == 'H')) {
											$('#spName').html('Sponsor Name <b><font color="red">* </font></b>').show();
											$('#budSp').html('Budget Origin for Sponsor <b><font color="red">* </font></b>').show();
											$('#totalAmt').html('Total (RM) <b><font color="red">* </font></b>').show();

											$('#spNameInput').prop('readonly', false);

											$('.budSpInput').removeAttr('disabled');
											$('#spNameInputDummy').attr('disabled', 'disabled');

											$('#totalAmtInput').prop('readonly', false);
										} else {
											$('#spName').html('Sponsor Name').show();
											$('#budSp').html('Budget Origin for Sponsor').show();
											$('#totalAmt').html('Total (RM)').show();

											$('#spNameInput').prop('readonly', true);

											$('.budSpInput').attr('disabled', 'disabled');
											$('#spNameInputDummy').removeAttr('disabled');

											$('#totalAmtInput').prop('readonly', true);
										}
									}
								});

								$('#conference_application').html(res);
							}
						});
						
						// refresh leave conference
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#conference_leave').html(res);
								// $('.nav-tabs li:eq(3) a').tab('show');
							}
						});

						// REDIRECT ADD STAFF CONFERENCE ALLOWANCE RECORD
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#allowances').html(res);
								$('.nav-tabs li:eq(4) a').tab('show');
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertEditStaffConference');
				msg.danger('Please contact administrator.', '#alertEditStaffConferenceFooter');
			}
		});	
	});

	/*-----------------------------
	TAB 5 - ALLOWANCES
	-----------------------------*/

	// ADD STAFF CONFERENCE ALLOWANCE
	$('#allowances').on('click','.add_allowance_con', function(){
		var staffId = $('#staff_id').val();
		var staffName = $('#staff_name').val();
		var crRefID = $('#crRefid').val();
		var crName = $('#crName').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStaffConferenceAllowance')?>',
			data: {'staffId' : staffId, 'staffName' : staffName, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});	

	// SAVE INSERT NEW STAFF CONFERENCE ALLOWANCE
	$('#myModalis').on('click', '.ins_stf_con_allw', function (e) {
		e.preventDefault();
		var staffId = $('#staff_id').val();
		var staffName = $('#staff_name').val();
		var crRefID = $('#crRefid').val();
		var crName = $('#crName').val();
		
		var data = $('#addStaffConAllw').serialize();
		msg.wait('#addStaffConAllwAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveNewStfConAllowance')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addStaffConAllwAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');

						// STAFF CONFERENCE ALLOWANCE
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
							data: {'staffID' : staffId, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : staffName},
							beforeSend: function() {
								$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#allowances').html(res);
							}
						});

						$('.nav-tabs li:eq(4) a').tab('show');
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addStaffConAllwAlert');
			}
		});	
	});

	// EDIT STAFF CONFERENCE ALLOWANCE
	$('#allowances').on('click', '.edit_stf_con_allw', function() {
		var staffId = $('#staff_id').val();
		var staffName = $('#staff_name').val();
		var crRefID = $('#crRefid').val();
		var crName = $('#crName').val();

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var sca_code = td.find(".sca_code").text();
		// alert(sca_code);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStaffConferenceAllowance')?>',
			data: {'staffId' : staffId, 'staffName' : staffName, 'refid' : crRefID, 'crName' : crName, 'sca_code' : sca_code},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE STAFF CONFERENCE ALLOWANCE
	$('#myModalis').on('click', '.upd_stf_con_allw', function (e) {
		e.preventDefault();
		var staffId = $('#staff_id').val();
		var staffName = $('#staff_name').val();
		var crRefID = $('#crRefid').val();
		var crName = $('#crName').val();
		
		var data = $('#updStaffConAllw').serialize();
		msg.wait('#updStaffConAllwAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdStfConAllowance')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updStaffConAllwAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');

						// STAFF CONFERENCE ALLOWANCE
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
							data: {'staffID' : staffId, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : staffName},
							beforeSend: function() {
								$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#allowances').html(res);
							}
						});

						$('.nav-tabs li:eq(4) a').tab('show');
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#updStaffConAllwAlert');
			}
		});	
	});

	// DELETE STAFF CONFERENCE ALLOWANCE
	$('#allowances').on('click', '.del_stf_con_allw', function() {
		var staffId = $('#staff_id').val();
		var staffName = $('#staff_name').val();
		var crRefID = $('#crRefid').val();
		var crName = $('#crName').val();

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var sca_code = td.find(".sca_code").text();
		var sca_desc = td.find(".sca_desc").text();
		// alert(staffId+' '+crRefID);

		$.confirm({
		    title: 'Delete Staff Conference Allowance',
		    content: 'Are you sure to delete this record? <br> <b>'+sca_code+' - '+sca_desc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delStfConAllowance')?>',
						data: {'staffId' : staffId, 'crRefID' : crRefID, 'sca_code' : sca_code},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								
								// STAFF CONFERENCE ALLOWANCE
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('staffConferenceAllowance')?>',
									data: {'staffID' : staffId, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : staffName},
									beforeSend: function() {
										$('#allowances').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#allowances').html(res);
									}
								});

								$('.nav-tabs li:eq(4) a').tab('show');
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
</script>