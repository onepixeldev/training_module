<?php echo $this->lib->title('Conference / Approve / Verify Conference Application (TNC A&A)') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF035 - Approve / Verify Conference Application (TNC A&A)</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Approve/Verify Conference Application (TNC A&A)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">File Attachment</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Staff Conference Leave</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>
								<!-- <li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>-->
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group text-right">
												<label><b>Department</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('deptCode', $dept_list, '', 'class="form-control listFilter" id="deptCode"'); ?>
											</div>
										</div>

										<div class="col-md-6">
											<input name="form[dept_name]" class="form-control" type="text" value="" id="dept_name" readonly>
										</div>
									</div>

									<div id="conference_list">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select department</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="file_attachment">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s3">
									<div id="conference_leave">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
									<div id="details">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<!--<div class="tab-pane fade" id="s5">
									<div id="details">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>--> 

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
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - CONFERENCE LIST
	-----------------------------*/

    // CONFERENCE LIST  FILTER
	$('.listFilter').change(function() {
		var deptCode = $('#deptCode').val();
		var mod = 'TNCA';
		// var sYear = $('#sYear').val();
		// alert(deptCode);

		$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceApplicationTncaVc')?>',
            data: {'deptCode' : deptCode, 'mod' : mod},
            success: function(res) {
				if(deptCode != '') {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('getDepartmentDesc')?>',
						data: {'deptCode' : deptCode},
						dataType: 'JSON',
						success: function(res) {
							if(res.sts == 1) {
								$('#dept_name').val(res.dept_desc);
							} else {
								$('#dept_name').val('All records');
							}
						}
					});
				}

                $('#conference_list').html(res);
                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                });

				$('#file_attachment').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th></tr></thead></table></p>').show();
				$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th></tr></thead></table></p>').show();
				$('#details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve / Verify Conference Application (TNC A&A) List</th></tr></thead></table></p>').show();
            }
        });
	});	

	// DETAILS STAFF
	$('#conference_list').on('click','.select_stf_app_ver', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var refid = td.find(".refid").text();
		var mod = 'TNCA';
		crName = '';
		crStaffName = '';

		// VIEW FILE ATTACHMENT
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getFileAttachment')?>',
			data: {'staff_id' : staff_id, 'refid' : refid},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#file_attachment').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#file_attachment').html(res);
			}
		});

		// ADD / UPDATE CONFERENCE LEAVE RECORD
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
			data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName},
			beforeSend: function() {
				$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#conference_leave').html(res);
				$('div').remove('.appliedDateFromRmv');
				$('div').remove('.appliedDateToRmv');
				$('div').remove('.totalDayAppliedRmv');
				$('div').remove('#alertConferenceLeave');
				$('.ins_con_leave').remove('');
				$('#approveDateFrom').prop('readonly', true);
				$('#approveDateTo').prop('readonly', true);
				$('#appDateFromLabel').replaceWith('<label class="col-md-2 control-label" id="appDateFromLabel">Date From</label>');
				$('#appDateToLabel').replaceWith('<label class="col-md-2 control-label" id="appDateToLabel">Date To</label>');
				$('#totalDayApproveLabel').replaceWith('<label class="col-md-2 control-label" id="totalDayApproveLabel">Total Day</label>');
			}
		});

		// STAFF CONFERENCE DETAILS
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
			data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
			beforeSend: function() {
				$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#details').html(res);
				var budget = $('.research_info').data();
				// console.log(budget.budgetOrigin);
				if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
					// alert('show');
					$('#details #rsh_btn').removeClass('hidden');
					
					$('#details #allw_detl').removeClass('hidden');
					$('#details #allw_detl2').addClass('hidden');
				} else {
					$('#details #rsh_btn').addClass('hidden');
					
					$('#details #allw_detl2').removeClass('hidden');
					$('#details #allw_detl').addClass('hidden');
					// alert('hide');
				}
			}
		});
	});	

	// PRINT
	$('#conference_list').on('click','.print_stf_app_ver', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crStaffID = td.find(".staff_id").text();
		var crRefID = td.find(".refid").text();
		var repCode = thisBtn.attr('repCode');
		// alert(repCode+' '+crStaffID+' '+crRefID);
		
		$.post('<?php echo $this->lib->class_url('setParamPmpAtt') ?>', {repCode: repCode, crStaffID: crStaffID, crRefID: crRefID}, function (res) {
			var repURL = '<?php echo $this->lib->class_url('genReportPmpAtt') ?>';
			var mywin = window.open( repURL , 'report');
		}).fail(function(){
			msg.danger('Please contact administrator.', '#alertEditStaffConference');        
		});
	});
	
	/*-----------------------------
	TAB 2 - FILE ATTACHMENT
	-----------------------------*/

	// VIEW FILE ATTACHMENT
	$('#file_attachment').on('click','.download_file', function(){
		var thisBtn = $(this);
		staff_id = $('#staff_id').val();
		cr_refid = $('#cr_refid').val();
		var td = thisBtn.parent().siblings();
		var file_name = td.eq(1).html().trim();
		// alert(staff_id+' '+cr_refid+' '+file_name);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('dloadFileAttParam')?>',
			data: {'staff_id' : staff_id, 'cr_refid' : cr_refid, 'file_name' : file_name},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					var ecommURL = '<?php echo $this->lib->class_url('fileAttachmentDload') ?>';
					var newWin = window.open(ecommURL, 'title', 'width=800, height=300');
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
	TAB 3 - STAFF CONFERENCE LEAVE
	-----------------------------*/

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
	$('#conference_leave').on('click', '.ins_con_leave', function () {
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
		alert(data);
		
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
								$('.nav-tabs li:eq(2) a').tab('show');
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
	TAB 4 - DETAILS
	-----------------------------*/

	// AMEND
	$('#details').on('click','.amend_stf_app_ver', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		staff_id = $('#staff_id').val();
		refid = $('#crRefid').val();
		staff_name = $('#staff_name').val();
		remark = $('#remark').val();
		appr_rej_by = $('#approved_rjc_by_tnc').val();
		appr_rej_date = $('#approved_rjc_date_tnc').val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);

		$.confirm({
		    title: 'Please enter the reason (Remark) for amendment the application',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'orange',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();
					
					if (remark == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please fill in <b>Remark</b> field.',
							type: 'red'
						});
						return;
					}

					if (appr_rej_by == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please fill in <b>Approved / Rejected By</b> field.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('ammendConferenceTncaa')?>',
						data: {'staff_id' : staff_id, 'refid' : refid, 'remark' : remark, 'appr_rej_by' : appr_rej_by, 'appr_rej_date' : appr_rej_date},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
								
								setTimeout(function () {
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF035')?>';
								}, 1500);
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Amendment cancelled!');
		        }
		    }
		});
	});

	// APPROVE
	$('#details').on('click','.approve_stf_app_ver', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		staff_id = $('#staff_id').val();
		refid = $('#crRefid').val();
		staff_name = $('#staff_name').val();
		remark = $('#remark').val();
		bud_org = $('#budOrg').val();
		cat_code = $('#catCode').val();
		appr_rej_by = $('#approved_rjc_by_tnc').val();
		appr_rej_date = $('#approved_rjc_date_tnc').val();
		rec_date = $('#received_date_tnc').val();
		total_amt_app_tncaa = $('#approved_tnc_aa').val();
		hod_amount = $('#hod_amount').val();
		rmic_amount = $('#rmic_amount').val();
		tncpi_amount = $('#tncpi_amount').val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);
		// alert(bud_org);

		$.confirm({
		    title: 'Approve staff conference?',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();

					if (remark == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please fill in <b>Remark</b> field.',
							type: 'red'
						});
						return;
					}

					if (appr_rej_by == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please fill in <b>Approved / Rejected By</b> field.',
							type: 'red'
						});
						return;
					}

					if (total_amt_app_tncaa == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please click on button <b>Allowance Detail</b> to enter total amount approved by TNCA',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('approveConferenceTncaa')?>',
						data: {'staff_id' : staff_id, 'refid' : refid, 'remark' : remark, 'appr_rej_by' : appr_rej_by, 'appr_rej_date' : appr_rej_date, 'rec_date' : rec_date, 'total_amt_app_tncaa' : total_amt_app_tncaa, 'cat_code' : cat_code , 'bud_org' : bud_org, 'hod_amount' : hod_amount, 'rmic_amount' : rmic_amount, 'tncpi_amount' : tncpi_amount},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
								
								setTimeout(function () {
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF035')?>';
								}, 1500);
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Approval cancelled!');
		        }
		    }
		});
	});

	// REJECT
	$('#details').on('click','.reject_stf_app_ver', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		staff_id = $('#staff_id').val();
		refid = $('#crRefid').val();
		staff_name = $('#staff_name').val();
		remark = $('#remark').val();
		appr_rej_by = $('#approved_rjc_by_tnc').val();
		appr_rej_date = $('#approved_rjc_date_tnc').val();
		rec_date = $('#received_date_tnc').val();
		bud_org = $('#budOrg').val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);

		$.confirm({
		    title: 'Reject staff conference?',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();

					if (remark == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please enter the reason (Remark) for rejecting the application',
							type: 'red'
						});
						return;
					}

					if (appr_rej_by == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please fill in <b>Approved / Rejected By</b> field.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejectConferenceTncaa')?>',
						data: {'staff_id' : staff_id, 'refid' : refid, 'remark' : remark, 'appr_rej_by' : appr_rej_by, 'appr_rej_date' : appr_rej_date, 'rec_date' : rec_date, 'bud_org' : bud_org},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
								
								setTimeout(function () {
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF035')?>';
								}, 2000);
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Process cancelled!');
		        }
		    }
		});
	});

	// RESEARCH INFO
	$('#details').on('click','.research_info', function(){
		var research_refid = $('.research_info').val();
		// alert(research_refid);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('researchInfo')?>',
			data: {'research_refid' : research_refid},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});	

	// ALLOWANCE DETAIL RESEARCH / RESEARCH_CONFERENCE
	$('#details').on('click','.allowance_detl', function(){
		// alert('ALLOWANCE DETL RESEARCH / RESEARCH_CONFERENCE');
		var staff_id = $('.allowance_detl').data('staff-id');
		var refid = $('.allowance_detl').data('refid');
		// alert(refid+' '+staff_id);

		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('allowanceDetlResearch')?>',
			data: {'staff_id' : staff_id, 'refid' : refid},
			success: function(res) {
				$('#details #allowance_detl').html(res);
				$('html, body').animate(
					{
					scrollTop: $('#details #allowance_detl').offset().top,
					},
					500,
					'linear'
				)
			}
		});
	});

	// ALLOWANCE DETAIL OTHERS
	$('#details').on('click','.allowance_detl2', function(){
		// alert('ALLOWANCE DETL OTHERS');
		var staff_id = $('.allowance_detl2').data('staff-id');
		var refid = $('.allowance_detl2').data('refid');
		// alert(refid+' '+staff_id);

		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('allowanceDetlOthers')?>',
			data: {'staff_id' : staff_id, 'refid' : refid},
			success: function(res) {
				$('#details #allowance_detl').html(res);
				$('html, body').animate(
					{
					scrollTop: $('#details #allowance_detl').offset().top,
					},
					500,
					'linear'
				)
			}
		});
	});	

	// CALCULATE AMOUNT
	$('#details').on('click','.calculate_amt', function(){
		var staff_id = $('.calculate_amt').data('staff-id');
		var refid = $('.calculate_amt').data('refid');
		var mod = 'TNCA';

		var allwCodeArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Calculate selected allowance?',
		    content: 'Press <b>YES</b> to continue',
			type: 'orange',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var allwCode = $(this).val();
						appTnca = $(this).closest('tr').find('[name="sca_amt_rm_approve_tnca"]').val();
						appTncaFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_tnca"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
					});
					//alert(staffIDArr);
					// alert(appTncaForArr);

					if (selectedID == 0) {
						$('.btn').removeAttr('disabled');
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('calculateAllwTnca')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');

								// REFRESH 
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
									data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
									beforeSend: function() {
										$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#details').html(res);
										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl').removeClass('hidden');
											$('#details #allw_detl2').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2').removeClass('hidden');
											$('#details #allw_detl').addClass('hidden');
											// alert('hide');
										}

										// REFRESH ALOWANCE DETAIL
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlOthers')?>',
											data: {'staff_id' : staff_id, 'refid' : refid},
											success: function(res) {
												$('#details #allowance_detl').html(res);
											}
										});
										
										// SCROLL DOWN TO #details
										$('html, body').animate(
											{
											scrollTop: $('#details #allowance_detl').offset().top,
											},
											500,
											'linear'
										)
									}
								});
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Calculate cancelled!');
		        }
		    }
		});
	});

	// SAVE ALLOWANCE DETAIL OTHERS
	$('#details').on('click','.save_allw_detl', function(){
		var thisBtn = $(this);
		var refid = $('.save_allw_detl').data("refid");
		var staff_id = $('.save_allw_detl').data("staff-id");
		var mod = 'TNCA';

		var allwCodeArr = [];
		var amountArr = [];
		var amountForArr = [];
		var appHodArr = [];
		var appHodForArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Save changes?',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var allwCode = $(this).val();
						// staffID = $(this).closest("tr").find(".sid").text();
						amount = $(this).closest('tr').find('[name="sca_amount_rm"]').val();
						++selectedID;
						amountFor = $(this).closest('tr').find('[name="sca_amount_foreign"]').val();
						++selectedID;
						appHod = $(this).closest('tr').find('[name="sca_amt_rm_approve_hod"]').val();
						++selectedID;
						appHodFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_hod"]').val();
						++selectedID;
						appTnca = $(this).closest('tr').find('[name="sca_amt_rm_approve_tnca"]').val();
						++selectedID;
						appTncaFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_tnca"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						amountArr.push(amount);
						amountForArr.push(amountFor);
						appHodArr.push(appHod);
						appHodForArr.push(appHodFor);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
					});
					//alert(staffIDArr);
					//alert(amountArr);

					if (selectedID == 0) {
						$('.btn').removeAttr('disabled');
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('saveAllwDetlOthers')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'amountArr' : amountArr, 'amountForArr' : amountForArr, 'appHodArr' : appHodArr, 'appHodForArr' : appHodForArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');

								// REFRESH 
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
									data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
									beforeSend: function() {
										$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#details').html(res);
										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl').removeClass('hidden');
											$('#details #allw_detl2').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2').removeClass('hidden');
											$('#details #allw_detl').addClass('hidden');
											// alert('hide');
										}

										// REFRESH ALOWANCE DETAIL
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlOthers')?>',
											data: {'staff_id' : staff_id, 'refid' : refid},
											success: function(res) {
												$('#details #allowance_detl').html(res);
											}
										});
										
										// SCROLL DOWN TO #details
										$('html, body').animate(
											{
											scrollTop: $('#details #allowance_detl').offset().top,
											},
											500,
											'linear'
										)
									}
								});
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Saving changes cancelled!');
		        }
		    }
		});
	});

	// CLEAR VALUE APPROVED TNCA
	$('#details').on('click','.clear_val_tnca', function(){
		var refid = $('.save_allw_detl').data("refid");
		var staff_id = $('.save_allw_detl').data("staff-id");
		var mod = 'TNCA';
		crName = '';
		crStaffName = '';
		
		
		var allwCodeArr = [];
		var selectedID = 0;

		$.confirm({
		    title: 'Clear value for Approved TNCA?',
		    content: 'Press <b>YES</b> to continue',
			type: 'red',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var allwCode = $(this).val();
						++selectedID;

						allwCodeArr.push(allwCode);
					});

					if (selectedID == 0) {
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						$('.btn').removeAttr('disabled');
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('clearValAppTnca')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('.btn').removeAttr('disabled');

								// REFRESH STAFF CONFERENCE DETL
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
									data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
									beforeSend: function() {
										$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#details').html(res);
										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl').removeClass('hidden');
											$('#details #allw_detl2').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2').removeClass('hidden');
											$('#details #allw_detl').addClass('hidden');
											// alert('hide');
										}

										// REFRESH ALOWANCE DETAIL
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>'); 
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlOthers')?>',
											data: {'staff_id' : staff_id, 'refid' : refid},
											success: function(res) {
												$('#details #allowance_detl').html(res);
											}
										});
										
										// SCROLL DOWN TO #details
										$('html, body').animate(
											{
											scrollTop: $('#details #allowance_detl').offset().top,
											},
											500,
											'linear'
										)
									}
								});
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								$('.btn').removeAttr('disabled');
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Process cancelled!');
		        }
		    }
		});
	});
	
	// Select all record	
	$('#details').on('click','.select_all_btn', function() {
		$(".checkitem").prop('checked', true);
	});	

	// Unselect all record	
	$('#details').on('click','.unselect_all_btn', function() {
		$(".checkitem").prop('checked', false);
	});
</script>