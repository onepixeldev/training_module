<?php echo $this->lib->title('Conference RMIC / Query Staff Conference (RMIC)', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF160 - Query Staff Conference (RMIC)</h2>				
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
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Conference</a>
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
									<div id="conference">
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
        var mod = 'RMIC';

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conHistoryListQ')?>',
			data: {'staff_id':staff_id, 'staff_name':staff_name, 'svc_code':svc_code, 'svc_desc':svc_desc, 'mod':mod},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#conference').html(res);
				b_row = $('#tbl_chl_list').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_chl_list').each(function() {
                            var Cell = $(this).find('td:eq(8)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    //$(this).find('btn').hide();
                                    $('#tbl_chl_list thead #boHead').addClass('hidden');
                                    $('#tbl_chl_list tbody #boBody').addClass('hidden');

                                    $('#tbl_chl_list thead #rsHead').addClass('hidden');
                                    $('#tbl_chl_list tbody #rsBody').addClass('hidden');

                                    $('#tbl_chl_list thead #srHead').addClass('hidden');
                                    $('#tbl_chl_list tbody #srBody').addClass('hidden');

                                    $('#tbl_chl_list tbody #menuBtn').replaceWith('<div class="btn-group dropup"><button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button><div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn"><button type="button" class="btn btn-primary text-left btn-block btn-xs detl_btn" value=""><i class="fa fa-info-circle"></i> Detail</button><button type="button" class="btn btn-danger text-left btn-block btn-xs report_btn"><i class="fa fa-file-pdf-o"></i> Report</button><button type="button" class="btn btn-danger text-left btn-block btn-xs memo_tncpi_btn"><i class="fa fa-print"></i> Memo TNCPI</button>   </div></div>');
                                }
                            });
                        });
                    }
                });
			}
		});
	});	

	/*-----------------------------
	TAB 2 - DETAILS
	-----------------------------*/

	// DETL BTN
	$('#conference').on('click','.detl_btn', function(){
		$('#conference #detl_history_query #dhq').removeClass('hidden');

		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crRefID = td.find(".refid").text();
		crName = td.find(".cr_name").text();
		var crStaffID = $("#staff_id").val();
		crStaffName = '';
		// alert(crRefID+' '+crName+' '+crStaffID);
		$('#conference #detl_history_query #conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conAppQuery')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#myTabQ li:eq(0) a').tab('show');
				$('#conference #detl_history_query #conference_application').html(res);
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
						$('#conference #detl_history_query #conference_leave_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
                        $('#conference #detl_history_query #conference_leave_detl').html(res);
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
						$('#conference #detl_history_query #conference_rmic_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
							// alert('show');
							$('#conference #detl_history_query #conference_rmic_approval').html(res);
						} else {
							$('#conference #detl_history_query #conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Record not available for selected staff</th></tr></thead></table></p>').show();
						}
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConAllowanceQuery')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName, 'crStaffName' : crStaffName},
					beforeSend: function() {
						$('#conference #detl_history_query allowances_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#conference #detl_history_query #allowances_detl').html(res);
					}
				});

				hide_loading();
			}
		});
	});

	// MEMO TNCA
	$('#conference').on('click','.memo_tncpi_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var scm_status = td.find(".scm_status").text();
		var staff_id = $("#staff_id").val();
		var repCode = '';
		var sts_set = ['ENTRY','APPLY','VERIFY_RMIC', 'VERIFY_TNCPI','REJECT','CANCEL', ''];
		// console.log(refid+' '+staff_id+' '+scm_status);

		if(jQuery.inArray(scm_status, sts_set) != -1) {
			$.alert({
				title: 'Alert!',
				content: 'This application has not yet been approved.',
				type: 'red',
			});

			return;
		} else {
			repCode = 'ATR273';
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

    // REPORT
	$('#conference').on('click','.report_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var scm_status = td.find(".scm_status").text();
		var staff_id = $("#staff_id").val();
		var repCode = 'ATR274';

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'refid' : refid, 'staff_id' : staff_id, 'repCode' : repCode, 'scm_status' : scm_status},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});


	/*-----------------------------
	DETL QUERY
	-----------------------------*/

	// RESEARCH INFO
	$('#conference').on('click','.research_info', function(){
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

	// VIEW FILE ATTACHMENT
	$('#conference').on('click','.download_file_q', function(){
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
</script>