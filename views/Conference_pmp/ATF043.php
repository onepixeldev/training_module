<?php echo $this->lib->title('Conference / Approve Conference Application (VC)', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF043 - Approve Conference Application (VC)</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Approve Conference Application (VC)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Staff Conference Leave</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">File Attachment</a>
                                </li>
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
									<div id="details">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve Conference Application (VC) tab</th>
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
													<th class="text-center">Please select staff from Approve Conference Application (VC) tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div> 

                                <div class="tab-pane fade" id="s4">
									<div id="file_attachment">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Approve Conference Application (VC) tab</th>
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

    // CONFERENCE LIST  FILTER
	$('.listFilter').change(function() {
		var deptCode = $('#deptCode').val();
        var mod = 'VC';
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

				$('#file_attachment').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
				$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
				$('#details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
            }
        });
	});

	// SELECT STAFF
	$('#conference_list').on('click','.select_stf_app_ver', function(){
		$('#conference_list #detl_history_query #dhq').addClass('hidden');

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var refid = td.find(".refid").text();
		var mod = 'VC';
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
				$('#mod_sc').val('VC');
				$('.appliedDateFromRmv').addClass('hidden');
				$('.appliedDateToRmv').addClass('hidden');
				$('.totalDayAppliedRmv').addClass('hidden');
				// $('div').remove('#alertConferenceLeave');
				// $('.ins_con_leave').remove('');
				// $('#approveDateFrom').prop('readonly', true);
				// $('#approveDateTo').prop('readonly', true);
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
                $('.amend_stf_app_ver').addClass('hidden');
				$('#modDetl').val('VC');

				var budget = $('.research_info').data();
				// console.log(budget.budgetOrigin);
				if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
					// alert('show');
					$('#details #rsh_btn').removeClass('hidden');
					
					$('#details #allw_detl_vc').removeClass('hidden');
					$('#details #allw_detl2_vc').addClass('hidden');
				} else {
					$('#details #rsh_btn').addClass('hidden');
					
					$('#details #allw_detl2_vc').removeClass('hidden');
					$('#details #allw_detl_vc').addClass('hidden');
					// alert('hide');
				}
				$('#details #app_vc').removeClass('hidden');
				$('#details #prev_bud_org').addClass('hidden');
				$('#budOrg').attr('disabled', 'disabled');
				$('#catCode').attr('disabled', 'disabled');
			}
		});
	});	

	// DETAIL STAFF CONFERENCE
	$('#conference_list').on('click','.detl_stf_app_ver', function(){
		$('#conference_list #detl_history_query #dhq').removeClass('hidden');
		$('#conference_list #detl_history_query #dhq2').addClass('hidden');
		$('#file_attachment').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crRefID = td.find(".refid").text();
		var crStaffID = td.find(".staff_id").text();
		// var crName = $('#tbl_list_sta_cr thead tr').data("crname");
		crName = td.find(".cr_name").text();;
		crStaffName = '';
		// alert(crRefID+' '+crName+' '+crStaffID);
		$('#myTabdhq li:eq(0) a').tab('show');
		$('#conference_list #detl_history_query #conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conAppQuery')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#conference_list #detl_history_query #conference_application').html(res);
				$('html, body').animate({scrollTop: $('#detl_history_query').position().top}, 'slow');

				var budget = $('.research_info').data();
				// console.log(budget.budgetOrigin);
				if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
					// alert('show');
					$('#conference_application #rsh_btn').removeClass('hidden');
					// $('#conference_application .research_info').replaceWith('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
				} else {
					$('#conference_application #rsh_btn').addClass('hidden');
					// alert('hide');
				}

				// CONFERENCE LEAVE RECORD
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_list #detl_history_query #conference_leave_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
                        $('#conference_list #detl_history_query #conference_leave_detl').html(res);
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

				// CONFERENCE RMIC APPROVAL
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('conRmicApproval')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
					beforeSend: function() {
						$('#conference_list #detl_history_query #conference_rmic_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
							// alert('show');
							$('#conference_list #detl_history_query #conference_rmic_approval').html(res);
						} else {
							$('#conference_list #detl_history_query #conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Record not available for selected staff</th></tr></thead></table></p>').show();
						}
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConAllowanceQuery')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_list #detl_history_query allowances_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#conference_list #detl_history_query #allowances_detl').html(res);
					}
				});

				hide_loading();
			}
		});
	});

	// RESEARCH INFO
	$(document).on('click', '.research_info', function() {
		// alert ('hello'); 
		var research_refid = $('.research_info').val();

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

	// CONFERENCE APPLICATION - VIEW FILE ATTACHMENT
	$(document).on('click', '.download_file_q', function() {
		// alert ('hello'); 
		var thisBtn = $(this);
		staff_id = $('#conference_application #tbl_ca_list thead tr').data("sid");
		cr_refid = $('#conference_application #tbl_ca_list thead tr').data("refid");
		var td = thisBtn.parent().siblings();
		var file_name = td.eq(1).html().trim();
		// alert(staff_id+' '+cr_refid);

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

	// CONFERENCE HISTORY
	$('#conference_list').on('click','.history_stf_app_ver', function(){
		$('#conference_list #detl_history_query #dhq').addClass('hidden');
		$('#conference_list #detl_history_query #dhq2').removeClass('hidden');
		$('#file_attachment').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conHistoryListQ')?>',
			data: {'staff_id':staff_id},
			beforeSend: function() {
				show_loading();
				$('#conference_list #detl_history_query #conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#conference_list #detl_history_query #conference').html(res);
				$('html, body').animate({scrollTop: $('#detl_history_query #dhq2').position().top}, 'slow');
				b_row = $('#tbl_chl_list').DataTable({
                    "ordering":false,
                });
				hide_loading();
			}
		});
	});

	// DETAIL STAFF CONFERENCE 2
	$('#conference_list').on('click','.detl_btn', function(){
		$('#conference_list #detl_history_query #dhq').removeClass('hidden');
		$('#conference_list #detl_history_query #dhq2').addClass('hidden');
		$('#file_attachment').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();
		$('#details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Approve Conference Application (VC) tab</th></tr></thead></table></p>').show();

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crRefID = td.find(".refid").text();
		crName = td.find(".cr_name").text();
		var crStaffID = $("#staff_id").val();
		crStaffName = '';
		// alert(crRefID+' '+crName+' '+crStaffID);
		$('#myTabdhq li:eq(0) a').tab('show');
		$('#conference_list #detl_history_query #conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conAppQuery')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#conference_list #detl_history_query #conference_application').html(res);
				$('html, body').animate({scrollTop: $('#detl_history_query').position().top}, 'slow');

				var budget = $('.research_info').data();
				// console.log(budget.budgetOrigin);
				if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
					// alert('show');
					$('#conference_application #rsh_btn').removeClass('hidden');
					// $('#conference_application .research_info').replaceWith('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
				} else {
					$('#conference_application #rsh_btn').addClass('hidden');
					// alert('hide');
				}

				// CONFERENCE LEAVE RECORD
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_list #detl_history_query #conference_leave_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
                        $('#conference_list #detl_history_query #conference_leave_detl').html(res);
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

				// CONFERENCE RMIC APPROVAL
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('conRmicApproval')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
					beforeSend: function() {
						$('#conference_list #detl_history_query #conference_rmic_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
							// alert('show');
							$('#conference_list #detl_history_query #conference_rmic_approval').html(res);
						} else {
							$('#conference_list #detl_history_query #conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Record not available for selected staff</th></tr></thead></table></p>').show();
						}
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConAllowanceQuery')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_list #detl_history_query allowances_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#conference_list #detl_history_query #allowances_detl').html(res);
					}
				});

				hide_loading();
			}
		});
	});

	// MEMO TNCA
	$('#conference_list').on('click','.memo_tnca_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var scm_status = td.find(".scm_status").text();
		var staff_id = $("#staff_id").val();
		var repCode = '';
		var sts_set = ['ENTRY','APPLY','VERIFY_TNCA','REJECT','CANCEL', ''];
		// console.log(refid+' '+staff_id+' '+scm_status);

		if(jQuery.inArray(scm_status, sts_set) != -1) {
			$.alert({
				title: 'Alert!',
				content: 'This application has not yet been approved.',
				type: 'red',
			});

			return;
		} else {
			repCode = 'ATR270';
			// console.log('APPROVE!');
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'refid' : refid, 'staff_id' : staff_id, 'repCode' : repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
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
	TAB 2 - DETAILS
	-----------------------------*/
	// DEFAULT VALUE BUDGET ORIGIN
	$('#details').on('click','#budOrg', function(){
		var total_rm2 = parseFloat($('#total_rm2').val().replace(/,/g, '')).toFixed(2);
		// console.log(total_rm2);

		if(total_rm2 < 500) {
			// console.log('Ayy');
			$('#budOrg').val('DEPARTMENT');
		} else {
			$('#budOrg').val('CONFERENCE');
		}
	});

	///// SEARCH STAFF//////
	// AUTO SEARCH STAFF ID
	$('#details').on('keyup','#approved_rjc_by_tnc', function(){
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
						$('#approved_rjc_by_tnc_name').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID');
						$('#approved_rjc_by_tnc_name').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID');
			$('#approved_rjc_by_tnc_name').val('');
		}
	});

	// SEARCH STAFF
	$('#details').on('click','.search_staff', function(){
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
			$('#approved_rjc_by_tnc').val(staff_id);
			$('#approved_rjc_by_tnc_name').val(staff_name);
		}
	});
	///// SEARCH STAFF//////

	// SAVE STAFF DETAIL
	$('#details').on('click', '.save_stf_detl', function (e) {
		e.preventDefault();
		var data = $('#staffConDetlAppVer').serialize();
		staff_id = $('#staff_id').val();
		refid = $('#crRefid').val();
		crStaffName = '';
		crName = $('#crName').val();
		mod = 'VC';
		msg.wait('#alertStaffConDetlAppVer');
		msg.wait('#alertStaffConDetlAppVerFooter');
		// alert(staff_id);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdStfConDetlAppVer')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertStaffConDetlAppVer');
				msg.show(res.msg, res.alert, '#alertStaffConDetlAppVerFooter');
				
				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						
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
								$('.amend_stf_app_ver').addClass('hidden');
								$('#modDetl').val('VC');

								var budget = $('.research_info').data();
								// console.log(budget.budgetOrigin);
								if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
									// alert('show');
									$('#details #rsh_btn').removeClass('hidden');
									
									$('#details #allw_detl_vc').removeClass('hidden');
									$('#details #allw_detl2_vc').addClass('hidden');
								} else {
									$('#details #rsh_btn').addClass('hidden');
									
									$('#details #allw_detl2_vc').removeClass('hidden');
									$('#details #allw_detl_vc').addClass('hidden');
									// alert('hide');
								}
								$('#details #app_vc').removeClass('hidden');
								$('#details #prev_bud_org').addClass('hidden');
								$('#budOrg').attr('disabled', 'disabled');
								$('#catCode').attr('disabled', 'disabled');
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertStaffConDetlAppVer');
			}
		});	
	});

	// APPROVE CONFERENCE VC
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
		total_amt_app_vc = $('#approved_vc').val();
		approved_tnc_aa = $('#approved_tnc_aa').val();
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

					if (total_amt_app_vc == '') {
						$('.btn').removeAttr('disabled');
						hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please click on button <b>Allowance Detail</b> to enter total amount approved by VC',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('approveConferenceVc')?>',
						data: {'staff_id' : staff_id, 'refid' : refid, 'remark' : remark, 'appr_rej_by' : appr_rej_by, 'appr_rej_date' : appr_rej_date, 'rec_date' : rec_date, 'total_amt_app_vc' : total_amt_app_vc, 'cat_code' : cat_code , 'bud_org' : bud_org, 'approved_tnc_aa' : approved_tnc_aa, 'rmic_amount' : rmic_amount, 'tncpi_amount' : tncpi_amount},
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
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF043')?>';
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
		mod = 'VC';
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
						data: {'staff_id' : staff_id, 'refid' : refid, 'remark' : remark, 'appr_rej_by' : appr_rej_by, 'appr_rej_date' : appr_rej_date, 'rec_date' : rec_date, 'bud_org' : bud_org, 'mod' : mod},
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
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF043')?>';
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

	// ALLOWANCE DETAIL RESEARCH / RESEARCH_CONFERENCE
	$('#details').on('click','.allowance_detl_vc', function(){
		// alert('ALLOWANCE DETL RESEARCH / RESEARCH_CONFERENCE');
		var staff_id = $('.allowance_detl').data('staff-id');
		var refid = $('.allowance_detl').data('refid');
		// alert(refid+' '+staff_id);

		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('allowanceDetlResearchVc')?>',
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

	// ALLOWANCE DETAIL OTHERS VC
	$('#details').on('click','.allowance_detl2_vc', function(){
		// alert('ALLOWANCE DETL OTHERS');
		var staff_id = $('.allowance_detl2').data('staff-id');
		var refid = $('.allowance_detl2').data('refid');
		// alert(refid+' '+staff_id);

		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('allowanceDetlOthersVc')?>',
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

	// SAVE ALLOWANCE DETAIL RESEARCH VC
	$('#details').on('click','.save_allw_detl_rc_vc', function(){
		var thisBtn = $(this);
		var refid = $('.save_allw_detl_rc_vc').data("refid");
		var staff_id = $('.save_allw_detl_rc_vc').data("staff-id");
		var mod = 'VC';

		var allwCodeArr = [];
		var amountArr = [];
		var amountForArr = [];
		var appRmicArr = [];
		var appRmicForArr = [];
		var appTncpiArr = [];
		var appTncpiForArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var appVcArr = [];
		var appVcForArr = [];
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Save changes?',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					// show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var allwCode = $(this).val();
						// staffID = $(this).closest("tr").find(".sid").text();
						amount = $(this).closest('tr').find('[name="sca_amount_rm"]').val();
						amountFor = $(this).closest('tr').find('[name="sca_amount_foreign"]').val();
						appRmic = $(this).closest('tr').find('[name="sca_amt_rm_approve_rmic"]').val();
						appRmicFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_rmic"]').val();
						appTncpi = $(this).closest('tr').find('[name="sca_amt_rm_approve_tncpi"]').val();
						appTncpiFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_tncpi"]').val();
						appTnca = $(this).closest('tr').find('[name="sca_amt_rm_approve_tnca"]').val();
						appTncaFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_tnca"]').val();
						appVc = $(this).closest('tr').find('[name="sca_amt_rm_approve_vc"]').val();
						appVcFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_vc"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						amountArr.push(amount);
						amountForArr.push(amountFor);
						appRmicArr.push(appRmic);
						appRmicForArr.push(appRmicFor);
						appTncpiArr.push(appTncpi);
						appTncpiForArr.push(appTncpiFor);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
						appVcArr.push(appVc);
						appVcForArr.push(appVcFor);
					});
					// alert(refid+staff_id);
					// alert(amountArr+' '+amountForArr+' '+appRmicArr+' '+appRmicForArr+' '+appTncpiArr+' '+appTncpiForArr+' '+appTncaArr+' '+appTncaForArr+' '+appVcArr+' '+appVcForArr);

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
						url: '<?php echo $this->lib->class_url('saveAllwDetlRcVc')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'amountArr' : amountArr, 'amountForArr' : amountForArr, 'appRmicArr' : appRmicArr, 'appRmicForArr' : appRmicForArr, 'appTncpiArr' : appTncpiArr, 'appTncpiForArr' : appTncpiForArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr, 'appVcArr' : appVcArr, 'appVcForArr' : appVcForArr},
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
										$('.amend_stf_app_ver').addClass('hidden');
										$('#modDetl').val('VC');

										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl_vc').removeClass('hidden');
											$('#details #allw_detl2_vc').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2_vc').removeClass('hidden');
											$('#details #allw_detl_vc').addClass('hidden');
											// alert('hide');
										}
										$('#details #app_vc').removeClass('hidden');
										$('#details #prev_bud_org').addClass('hidden');
										$('#budOrg').attr('disabled', 'disabled');
										$('#catCode').attr('disabled', 'disabled');

										// REFRESH ALOWANCE DETAIL RESEARCH VC
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlResearchVc')?>',
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

								// $.ajax({
								// 	type: 'POST',
								// 	url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
								// 	data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
								// 	beforeSend: function() {
								// 		$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								// 	},
								// 	success: function(res) {
								// 		$('#details').html(res);
								// 		$('.amend_stf_app_ver').addClass('hidden');
								// 		var budget = $('.research_info').data();
								// 		// console.log(budget.budgetOrigin);
								// 		if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
								// 			// alert('show');
								// 			$('#details #rsh_btn').removeClass('hidden');
											
								// 			$('#details #allw_detl_vc').removeClass('hidden');
								// 			$('#details #allw_detl2_vc').addClass('hidden');
								// 		} else {
								// 			$('#details #rsh_btn').addClass('hidden');
											
								// 			$('#details #allw_detl2_vc').removeClass('hidden');
								// 			$('#details #allw_detl_vc').addClass('hidden');
								// 			// alert('hide');
								// 		}
								// 		$('#details #app_vc').removeClass('hidden');
								// 		$('#details #prev_bud_org').addClass('hidden');

								// 		// REFRESH ALOWANCE DETAIL RESEARCH VC
								// 		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
								// 		$.ajax({
								// 			type: 'POST',
								// 			url: '<?php echo $this->lib->class_url('allowanceDetlResearchVc')?>',
								// 			data: {'staff_id' : staff_id, 'refid' : refid},
								// 			success: function(res) {
								// 				$('#details #allowance_detl').html(res);
								// 			}
								// 		});
										
								// 		// SCROLL DOWN TO #details
								// 		$('html, body').animate(
								// 			{
								// 			scrollTop: $('#details #allowance_detl').offset().top,
								// 			},
								// 			500,
								// 			'linear'
								// 		)
								// 	}
								// });
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

	// CALCULATE AMOUNT RESEARCH VC
	$('#details').on('click','.calculate_amt_rc_vc', function(){
		var staff_id = $('.calculate_amt_rc_vc').data('staff-id');
		var refid = $('.calculate_amt_rc_vc').data('refid');
		var mod = 'VC';

		var allwCodeArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var appVcArr = [];
		var appVcForArr = [];
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
						appVc = $(this).closest('tr').find('[name="sca_amt_rm_approve_vc"]').val();
						appVcFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_vc"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
						appVcArr.push(appVc);
						appVcForArr.push(appVcFor);
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
						url: '<?php echo $this->lib->class_url('calculateAllwRcVc')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'appVcArr' : appVcArr, 'appVcForArr' : appVcForArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr},
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
										$('.amend_stf_app_ver').addClass('hidden');
										$('#modDetl').val('VC');

										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl_vc').removeClass('hidden');
											$('#details #allw_detl2_vc').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2_vc').removeClass('hidden');
											$('#details #allw_detl_vc').addClass('hidden');
											// alert('hide');
										}
										$('#details #app_vc').removeClass('hidden');
										$('#details #prev_bud_org').addClass('hidden');
										$('#budOrg').attr('disabled', 'disabled');
										$('#catCode').attr('disabled', 'disabled');

										// REFRESH ALOWANCE DETAIL
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlResearchVc')?>',
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

								
								// $.ajax({
								// 	type: 'POST',
								// 	url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
								// 	data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
								// 	beforeSend: function() {
								// 		$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								// 	},
								// 	success: function(res) {
								// 		$('#details').html(res);
								// 		$('.amend_stf_app_ver').addClass('hidden');
								// 		var budget = $('.research_info').data();
								// 		// console.log(budget.budgetOrigin);
								// 		if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
								// 			// alert('show');
								// 			$('#details #rsh_btn').removeClass('hidden');
											
								// 			$('#details #allw_detl_vc').removeClass('hidden');
								// 			$('#details #allw_detl2_vc').addClass('hidden');
								// 		} else {
								// 			$('#details #rsh_btn').addClass('hidden');
											
								// 			$('#details #allw_detl2_vc').removeClass('hidden');
								// 			$('#details #allw_detl_vc').addClass('hidden');
								// 			// alert('hide');
								// 		}
								// 		$('#details #app_vc').removeClass('hidden');
								// 		$('#details #prev_bud_org').addClass('hidden');

								// 		// REFRESH ALOWANCE DETAIL
								// 		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
								// 		$.ajax({
								// 			type: 'POST',
								// 			url: '<?php echo $this->lib->class_url('allowanceDetlResearchVc')?>',
								// 			data: {'staff_id' : staff_id, 'refid' : refid},
								// 			success: function(res) {
								// 				$('#details #allowance_detl').html(res);
								// 			}
								// 		});
										
								// 		// SCROLL DOWN TO #details
								// 		$('html, body').animate(
								// 			{
								// 			scrollTop: $('#details #allowance_detl').offset().top,
								// 			},
								// 			500,
								// 			'linear'
								// 		)
								// 	}
								// });
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

	// CALCULATE AMOUNT OTHERS VC
	$('#details').on('click','.calculate_amt_oth_vc', function(){
		var staff_id = $('.calculate_amt_oth_vc').data('staff-id');
		var refid = $('.calculate_amt_oth_vc').data('refid');
		var mod = 'VC';

		var allwCodeArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var appVcArr = [];
		var appVcForArr = [];
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
						appVc = $(this).closest('tr').find('[name="sca_amt_rm_approve_vc"]').val();
						appVcFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_vc"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
						appVcArr.push(appVc);
						appVcForArr.push(appVcFor);
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
						url: '<?php echo $this->lib->class_url('calculateAllwRcVc')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'appVcArr' : appVcArr, 'appVcForArr' : appVcForArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr},
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
										$('.amend_stf_app_ver').addClass('hidden');
										$('#modDetl').val('VC');

										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl_vc').removeClass('hidden');
											$('#details #allw_detl2_vc').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2_vc').removeClass('hidden');
											$('#details #allw_detl_vc').addClass('hidden');
											// alert('hide');
										}
										$('#details #app_vc').removeClass('hidden');
										$('#details #prev_bud_org').addClass('hidden');
										$('#budOrg').attr('disabled', 'disabled');
										$('#catCode').attr('disabled', 'disabled');

										// REFRESH ALOWANCE DETAIL
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlOthersVc')?>',
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


								// $.ajax({
								// 	type: 'POST',
								// 	url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
								// 	data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
								// 	beforeSend: function() {
								// 		$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								// 	},
								// 	success: function(res) {
								// 		$('#details').html(res);
								// 		$('.amend_stf_app_ver').addClass('hidden');
								// 		var budget = $('.research_info').data();
								// 		// console.log(budget.budgetOrigin);
								// 		if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
								// 			// alert('show');
								// 			$('#details #rsh_btn').removeClass('hidden');
											
								// 			$('#details #allw_detl_vc').removeClass('hidden');
								// 			$('#details #allw_detl2_vc').addClass('hidden');
								// 		} else {
								// 			$('#details #rsh_btn').addClass('hidden');
											
								// 			$('#details #allw_detl2_vc').removeClass('hidden');
								// 			$('#details #allw_detl_vc').addClass('hidden');
								// 			// alert('hide');
								// 		}
								// 		$('#details #app_vc').removeClass('hidden');
								// 		$('#details #prev_bud_org').addClass('hidden');

								// 		// REFRESH ALOWANCE DETAIL
								// 		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
								// 		$.ajax({
								// 			type: 'POST',
								// 			url: '<?php echo $this->lib->class_url('allowanceDetlOthersVc')?>',
								// 			data: {'staff_id' : staff_id, 'refid' : refid},
								// 			success: function(res) {
								// 				$('#details #allowance_detl').html(res);
								// 			}
								// 		});
										
								// 		// SCROLL DOWN TO #details
								// 		$('html, body').animate(
								// 			{
								// 			scrollTop: $('#details #allowance_detl').offset().top,
								// 			},
								// 			500,
								// 			'linear'
								// 		)
								// 	}
								// });
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

	// SAVE ALLOWANCE DETAIL OTHERS VC
	$('#details').on('click','.save_allw_detl_oth_vc', function(){
		var thisBtn = $(this);
		var refid = $('.save_allw_detl_oth_vc').data("refid");
		var staff_id = $('.save_allw_detl_oth_vc').data("staff-id");
		var mod = 'VC';

		var allwCodeArr = [];
		var amountArr = [];
		var amountForArr = [];
		var appTncaArr = [];
		var appTncaForArr = [];
		var appVcArr = [];
		var appVcForArr = [];
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Save changes?',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					// show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var allwCode = $(this).val();
						// staffID = $(this).closest("tr").find(".sid").text();
						amount = $(this).closest('tr').find('[name="sca_amount_rm"]').val();
						amountFor = $(this).closest('tr').find('[name="sca_amount_foreign"]').val();
						appTnca = $(this).closest('tr').find('[name="sca_amt_rm_approve_tnca"]').val();
						appTncaFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_tnca"]').val();
						appVc = $(this).closest('tr').find('[name="sca_amt_rm_approve_vc"]').val();
						appVcFor = $(this).closest('tr').find('[name="sca_amt_foreign_approve_vc"]').val();
						++selectedID;
						
						// alert(currentID);
						allwCodeArr.push(allwCode);
						amountArr.push(amount);
						amountForArr.push(amountFor);
						appTncaArr.push(appTnca);
						appTncaForArr.push(appTncaFor);
						appVcArr.push(appVc);
						appVcForArr.push(appVcFor);
					});
					// alert(refid+staff_id);
					// alert(amountArr+' '+amountForArr+' '+appRmicArr+' '+appRmicForArr+' '+appTncpiArr+' '+appTncpiForArr+' '+appTncaArr+' '+appTncaForArr+' '+appVcArr+' '+appVcForArr);

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
						url: '<?php echo $this->lib->class_url('saveAllwDetlOthVc')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'allwCodeArr' : allwCodeArr, 'amountArr' : amountArr, 'amountForArr' : amountForArr, 'appTncaArr' : appTncaArr, 'appTncaForArr' : appTncaForArr, 'appVcArr' : appVcArr, 'appVcForArr' : appVcForArr},
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
										$('.amend_stf_app_ver').addClass('hidden');
										$('#modDetl').val('VC');

										var budget = $('.research_info').data();
										// console.log(budget.budgetOrigin);
										if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
											// alert('show');
											$('#details #rsh_btn').removeClass('hidden');
											
											$('#details #allw_detl_vc').removeClass('hidden');
											$('#details #allw_detl2_vc').addClass('hidden');
										} else {
											$('#details #rsh_btn').addClass('hidden');
											
											$('#details #allw_detl2_vc').removeClass('hidden');
											$('#details #allw_detl_vc').addClass('hidden');
											// alert('hide');
										}
										$('#details #app_vc').removeClass('hidden');
										$('#details #prev_bud_org').addClass('hidden');
										$('#budOrg').attr('disabled', 'disabled');
										$('#catCode').attr('disabled', 'disabled');

										// REFRESH ALOWANCE DETAIL OTHERS VC
										$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('allowanceDetlOthersVc')?>',
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


								// $.ajax({
								// 	type: 'POST',
								// 	url: '<?php echo $this->lib->class_url('staffConferenceDetlAppVer')?>',
								// 	data: {'staffID' : staff_id, 'refid' : refid, 'crName' : crName, 'crStaffName' : crStaffName, 'mod' : mod},
								// 	beforeSend: function() {
								// 		$('#details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								// 	},
								// 	success: function(res) {
								// 		$('#details').html(res);
								// 		$('.amend_stf_app_ver').addClass('hidden');
								// 		var budget = $('.research_info').data();
								// 		// console.log(budget.budgetOrigin);
								// 		if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
								// 			// alert('show');
								// 			$('#details #rsh_btn').removeClass('hidden');
											
								// 			$('#details #allw_detl_vc').removeClass('hidden');
								// 			$('#details #allw_detl2_vc').addClass('hidden');
								// 		} else {
								// 			$('#details #rsh_btn').addClass('hidden');
											
								// 			$('#details #allw_detl2_vc').removeClass('hidden');
								// 			$('#details #allw_detl_vc').addClass('hidden');
								// 			// alert('hide');
								// 		}
								// 		$('#details #app_vc').removeClass('hidden');
								// 		$('#details #prev_bud_org').addClass('hidden');

								// 		// REFRESH ALOWANCE DETAIL OTHERS VC
								// 		$('#details #allowance_detl').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
								// 		$.ajax({
								// 			type: 'POST',
								// 			url: '<?php echo $this->lib->class_url('allowanceDetlOthersVc')?>',
								// 			data: {'staff_id' : staff_id, 'refid' : refid},
								// 			success: function(res) {
								// 				$('#details #allowance_detl').html(res);
								// 			}
								// 		});
										
								// 		// SCROLL DOWN TO #details
								// 		$('html, body').animate(
								// 			{
								// 			scrollTop: $('#details #allowance_detl').offset().top,
								// 			},
								// 			500,
								// 			'linear'
								// 		)
								// 	}
								// });
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
	
	// Select all record	
	$('#details').on('click','.select_all_btn', function() {
		$(".checkitem").prop('checked', true);
	});	

	// Unselect all record	
	$('#details').on('click','.unselect_all_btn', function() {
		$(".checkitem").prop('checked', false);
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
		// alert(data);
		
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
						
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('addConferenceLeave')?>',
							data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
							beforeSend: function() {
								$('#conference_leave').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#conference_leave').html(res);
								$('#mod_sc').val('VC');
								$('.appliedDateFromRmv').addClass('hidden');
								$('.appliedDateToRmv').addClass('hidden');
								$('.totalDayAppliedRmv').addClass('hidden');
								// $('div').remove('#alertConferenceLeave');
								// $('.ins_con_leave').remove('');
								// $('#approveDateFrom').prop('readonly', true);
								// $('#approveDateTo').prop('readonly', true);
								$('#appDateFromLabel').replaceWith('<label class="col-md-2 control-label" id="appDateFromLabel">Date From <b><font color="red">*</font></b</label>');
								$('#appDateToLabel').replaceWith('<label class="col-md-2 control-label" id="appDateToLabel">Date To <b><font color="red">*</font></b</label>');
								$('#totalDayApproveLabel').replaceWith('<label class="col-md-2 control-label" id="totalDayApproveLabel">Total Day</label>');
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
	TAB 4 - FILE ATTACHMENT
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
</script>