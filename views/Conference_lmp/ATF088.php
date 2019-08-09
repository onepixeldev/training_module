<?php echo $this->lib->title('Conference / Query Conference Report Application', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF088 - Query Conference Report Application</h2>				
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
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Part II</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Part III</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Part IV</a>
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

								<div class="tab-pane fade" id="s4">
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

								<div class="tab-pane fade" id="s5">
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

		$('#staff_info_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#conference_report').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff Info tab</th></tr></thead></table></p>').show();
		$('#part_ii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();
		$('#part_iii').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();
		$('#part_iv').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference Report tab</th></tr></thead></table></p>').show();

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('staffInfoListQ')?>',
            data: {'deptCode' : deptCode},
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
		
		// LIST CONFERENCE REPORT
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffConRep')?>',
			data: {'staff_id':staff_id, 'staff_name':staff_name, 'svc_code':svc_code, 'svc_desc':svc_desc},
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
	TAB 4 - PART III
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