<?php echo $this->lib->title('Conference / Approve Conference Report (TNC A&A)', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF087 - Approve Conference Report (TNC A&A)</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Staff Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Conference Report</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">TNC (AA) Approval</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">HOD Verification</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Part II</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Part III</a>
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

									<div id="staff_info_list">
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
									<div id="conference_report">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Staff Info tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s3">
									<div id="tncaa_approval">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference Report tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s4">
									<div id="part_iv">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference Report tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="part_ii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference Report tab</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="part_iii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference Report tab</th>
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
	var a_row = '';
	var b_row = '';

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
	TAB 1 - STAFF INFO
	-----------------------------*/

    // STAFF INFO FILTER
	$('.listFilter').change(function() {
        var deptCode = $('#deptCode').val();
        var mod = 'APP_REPORT';

		$('#staff_info_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#conference_report').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff Info tab</th></tr></thead></table></p>').show();
		$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();
		$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();
		$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('staffInfoListQ')?>',
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
								$('#dept_name').val('Please select department');
							}
						}
					});
				}

                $('#staff_info_list').html(res);
                a_row = $('#tbl_sinf_list').DataTable({
                    "ordering":false,
                });

				$('#conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff Info tab</th></tr></thead></table></p>').show();
            }
        });
	});	

	// SELECT STAFF
	$('#staff_info_list').on('click','.selc_staff', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		var svc_code = td.eq(2).html().trim();
        var svc_desc = td.eq(3).html().trim();
        var mod = 'APP_REPORT';
		
		// LIST CONFERENCE REPORT
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffConRep')?>',
			data: {'staff_id':staff_id, 'staff_name':staff_name, 'svc_code':svc_code, 'svc_desc':svc_desc, 'mod':mod},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#conference_report').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#conference_report').html(res);
				b_row = $('#tbl_stf_rep_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});	

	/*-----------------------------
	TAB 2 - DETAILS
	-----------------------------*/

	// SELECT CONFERENCE
	$('#conference_report').on('click','.selc_con', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var crName = td.find(".cr_name").text();
		var staff_id = $("#staff_id").val();
		var staff_name = $("#staff_name").val();
		// console.log(refid+' '+crName);

		$('.nav-tabs li:eq(2) a').tab('show');

		// PART II
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getConRepPart2')?>',
			data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
			beforeSend: function() {
				$('#part_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_ii').html(res);
			}
		});

		// PART III
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getConRepPart3')?>',
			data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
			beforeSend: function() {
				$('#part_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#part_iii').html(res);
			}
		});

		// PART IV
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getConRepPart4')?>',
			data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
			beforeSend: function() {
				$('#part_iv').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
                $('#part_iv').html(res);
                $('#part_iv #alertInfoHod').replaceWith('<div class="alert alert-info fade in"><b>HOD Verification</b></div>');
                $('#part_iv #cnrTncaa').addClass('hidden');
			}
        });
        
        // TNCAA APPROVAL
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('tncaaApproval')?>',
			data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
			beforeSend: function() {
				$('#tncaa_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
                $('#tncaa_approval').html(res);
			}
		});
	});	

	// DETL BTN
	$('#conference_report').on('click','.detl_btn', function(){
		$('#conference_report #detl_history_query #dhq').removeClass('hidden');

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crRefID = td.find(".refid").text();
		crName = td.find(".cr_name").text();
		var crStaffID = $("#staff_id").val();
		crStaffName = '';
		// alert(crRefID+' '+crName+' '+crStaffID);
		$('#conference_report #detl_history_query #conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conAppQuery')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#myTabQ li:eq(0) a').tab('show');
				$('#conference_report #detl_history_query #conference_application').html(res);
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
						$('#conference_report #detl_history_query #conference_leave_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
                        $('#conference_report #detl_history_query #conference_leave_detl').html(res);
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
						$('#conference_report #detl_history_query #conference_rmic_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
							// alert('show');
							$('#conference_report #detl_history_query #conference_rmic_approval').html(res);
						} else {
							$('#conference_report #detl_history_query #conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Record not available for selected staff</th></tr></thead></table></p>').show();
						}
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConAllowanceQuery')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference_report #detl_history_query allowances_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#conference_report #detl_history_query #allowances_detl').html(res);
					}
				});

				hide_loading();
			}
		});
	});

	// RESEARCH INFO
	$('#conference_application').on('click','.research_info', function(){
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

	// PRINT REPORT
	$('#conference_report').on('click','.print_rep_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var staff_id = $("#staff_id").val();
		var repCode = 'ATR073';
		// console.log(refid+' '+staff_id+' '+repCode);

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
    
    /*-----------------------------
	TAB 3 - TNC (AA) APPROVAL
    -----------------------------*/

    ///// SEARCH STAFF APPROVE TNCAA //////
	// AUTO SEARCH STAFF ID
	$('#tncaa_approval').on('keyup','#approved_rjc_by_tnc', function(){
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
	$('#tncaa_approval').on('click','.search_staff', function(){
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
    ///// SEARCH STAFF APPROVE TNCAA //////
    
    ///// SEARCH STAFF REJECT TNCAA //////
	// AUTO SEARCH STAFF ID
	$('#tncaa_approval').on('keyup','#rjc_by_tnc', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfID2');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfID2');
						$('#rjc_by_tnc_name').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID2');
						$('#rjc_by_tnc_name').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID2');
			$('#rjc_by_tnc_name').val('');
		}
	});

	// SEARCH STAFF
	$('#tncaa_approval').on('click','.search_staff2', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
                $('#myModalis .modal-content').html(res);
                $('#myModalis .modal-content .search_staff_md').replaceWith('<button type="button" class="btn btn-primary search_staff_md2"><i class="fa fa-search"></i> </button>');
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md2', function () {
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
									$('#tbl_stf_res_list tbody .select_staff_id').replaceWith('<button type="button" class="btn btn-primary btn-xs select_staff_id2"><i class="fa fa-chevron-down"></i> Select</button>');
								}
							});
						});
					}
                });
			}
		});
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id2', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#rjc_by_tnc').val(staff_id);
			$('#rjc_by_tnc_name').val(staff_name);
		}
	});
	///// SEARCH STAFF REJECT TNCAA //////

	// SAVE AMEND / APPROVAL
	$('#tncaa_approval').on('click','.tncaa_save_amd_app', function () {
		var refid = $("#refid").val();
		var staff_id = $("#staff_id").val();
		var app_amd_remark = $("#remark_tnca").val();
		var app_amd_by = $("#approved_rjc_by_tnc").val();
		var app_amd_date = $("#tncaa_amd_app_date").val();
		
		var crName = $("#cr_name").val();
		var staff_name = $("#staff_name").val();
		// console.log(refid+' '+staff_id+' '+app_amd_remark+' '+app_amd_by+' '+app_amd_date);
		if(app_amd_remark == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter remark',
				type: 'red',
			});
			return;
		}
		$('.btn').attr('disabled', 'disabled');
		show_loading();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveAmdAppTncaa')?>',
			data: {'refid' : refid, 'staff_id' : staff_id, 'app_amd_remark' : app_amd_remark, 'app_amd_by' : app_amd_by, 'app_amd_date' : app_amd_date},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						hide_loading();

						$.alert({
							title: 'Success!',
							content: res.msg,
							type: 'green',
						});

						// PART IV
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('tncaaApproval')?>',
							data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
							beforeSend: function() {
								$('#tncaa_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#tncaa_approval').html(res);
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
					hide_loading();

					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
	});
	
	// SAVE REJECT
	$('#tncaa_approval').on('click','.tncaa_save_reject', function () {
		var refid = $("#refid").val();
		var staff_id = $("#staff_id").val();
		var rjc_remark = $("#remark_tnca_reject").val();
		var rjc_by = $("#rjc_by_tnc").val();
		var rjc_date = $("#tncaa_rjc_date").val();
		
		var crName = $("#cr_name").val();
		var staff_name = $("#staff_name").val();
		// console.log(refid+' '+staff_id+' '+rjc_remark+' '+rjc_by+' '+rjc_date);
		if(rjc_remark == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter reject remark',
				type: 'red',
			});
			return;
		}
		$('.btn').attr('disabled', 'disabled');
		show_loading();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRejcTncaa')?>',
			data: {'refid' : refid, 'staff_id' : staff_id, 'rjc_remark' : rjc_remark, 'rjc_by' : rjc_by, 'rjc_date' : rjc_date},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						hide_loading();

						$.alert({
							title: 'Success!',
							content: res.msg,
							type: 'green',
						});

						// PART IV
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('tncaaApproval')?>',
							data: {'refid':refid, 'crName':crName, 'staff_id':staff_id, 'staff_name':staff_name},
							beforeSend: function() {
								$('#tncaa_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#tncaa_approval').html(res);
							}
						});
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
					hide_loading();

					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
				}
			}
		});
	});
	
	// REJECT REPORT
	$('#tncaa_approval').on('click','.tncaa_reject', function(){
		var refid = $("#refid").val();
		var staff_id = $("#staff_id").val();
		var rjc_remark = $("#remark_tnca_reject").val();
		var rjc_by = $("#rjc_by_tnc").val();
		var rjc_by_name = $("#rjc_by_tnc_name").val();
		var rjc_date = $("#tncaa_rjc_date").val();

		var crName = $("#cr_name").val();
		var staff_name = $("#staff_name").val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);

		if(rjc_remark == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter reject remark',
				type: 'red',
			});
			return;
		}

		if(rjc_by == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in reject by field',
				type: 'red',
			});
			return;
		}

		if(rjc_by_name == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in reject by field',
				type: 'red',
			});
			return;
		}

		$.confirm({
		    title: 'Reject conference report?',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejectConferenceReport')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'rjc_remark' : rjc_remark, 'rjc_by' : rjc_by, 'rjc_date' : rjc_date},
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
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF087')?>';
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

	// AMEND REPORT
	$('#tncaa_approval').on('click','.tncaa_amend', function(){
		var refid = $("#refid").val();
		var staff_id = $("#staff_id").val();
		var app_amd_remark = $("#remark_tnca").val();
		var app_amd_by = $("#approved_rjc_by_tnc").val();
		var app_amd_by_name = $("#approved_rjc_by_tnc_name").val();
		var app_amd_date = $("#tncaa_amd_app_date").val();

		var crName = $("#cr_name").val();
		var staff_name = $("#staff_name").val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);

		if(app_amd_remark == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter remark field',
				type: 'red',
			});
			return;
		}

		if(app_amd_by == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in approve by field',
				type: 'red',
			});
			return;
		}

		if(app_amd_by_name == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in approve by field',
				type: 'red',
			});
			return;
		}

		$.confirm({
		    title: 'Amend conference report?',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'orange',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('amendConferenceReport')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'app_amd_remark' : app_amd_remark, 'app_amd_by' : app_amd_by, 'app_amd_date' : app_amd_date},
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
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF087')?>';
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

	// APPROVE REPORT
	$('#tncaa_approval').on('click','.tncaa_approve', function(){
		var refid = $("#refid").val();
		var staff_id = $("#staff_id").val();
		var app_amd_remark = $("#remark_tnca").val();
		var app_amd_by = $("#approved_rjc_by_tnc").val();
		var app_amd_by_name = $("#approved_rjc_by_tnc_name").val();
		var app_amd_date = $("#tncaa_amd_app_date").val();

		var crName = $("#cr_name").val();
		var staff_name = $("#staff_name").val();
		// alert(remark+' '+appr_rej_by+' '+appr_rej_date);

		if(app_amd_remark == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter remark field',
				type: 'red',
			});
			return;
		}

		if(app_amd_by == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in approve by field',
				type: 'red',
			});
			return;
		}

		if(app_amd_by_name == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please enter valid staff ID in approve by field',
				type: 'red',
			});
			return;
		}

		$.confirm({
		    title: 'Approve conference report?',
		    content: 'Press <b>YES</b> to continue <br> Staff ID: <br><b>'+staff_id+' - '+staff_name+'</b>',
			type: 'green',
		    buttons: {
		        yes: function () {
					$('.btn').attr('disabled', 'disabled');
					show_loading();

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('approveConferenceReport')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'app_amd_remark' : app_amd_remark, 'app_amd_by' : app_amd_by, 'app_amd_date' : app_amd_date},
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
									location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF087')?>';
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

	/*-----------------------------
	TAB 6 - PART III
	-----------------------------*/

	// VIEW FILE ATTACHMENT
	$('#part_iii').on('click','.attach_file_btn', function(){
		var thisBtn = $(this);
		staff_id = $('#staff_id').val();
		cr_refid = $('#refid').val();
		var td = thisBtn.parent().siblings();
		var file_name = td.eq(0).html().trim();
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
</script>