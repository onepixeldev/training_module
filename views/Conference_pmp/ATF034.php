<?php echo $this->lib->title('Conference / Query Conference Application Details', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF034 - Query Conference Application Details</h2>				
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
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Conference RMIC Approval</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Conference Leave</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Allowances</a>
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
													<th class="text-center">Please select staff from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div> 

                                <div class="tab-pane fade" id="s4">
									<div id="conference_rmic_approval">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="conference_leave">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Staff List</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="allowances">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff from Staff List</th>
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

    // POPULATE CONFERENCE LIST
	var pMonth = 'CURR_M';
	var pYear = 'CURR_Y';
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
		$('#staff_list_conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List tab</th></tr></thead></table></p>').show();
		$('#conference_application').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#allowances').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		


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

	// SEARCH CONFERENCE
	$('.search_refid_title_btn').click(function(){
		$('#staff_list_conference').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List tab</th></tr></thead></table></p>').show();
		$('#conference_application').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#conference_leave').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();
		$('#allowances').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff from Staff List tab</th></tr></thead></table></p>').show();

		var thisBtn = $(this);
		var refidTitle = $('#refidTitle').val();
		// var sMonth = $('#sMonth').val();
		// var sYear = $('#sYear').val();
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
			},
			success: function(res) {
                $('#staff_list_conference').html(res);
                $('#add_nw_stf').addClass("hidden");
		
				ca_row = $('#tbl_list_sta_cr').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_list_sta_cr').each(function() {
                            var Cell = $(this).find('td:eq(4)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    //$(this).find('btn').hide();
                                    $('#tbl_list_sta_cr tbody .stacr_del_btn').addClass("hidden");
                                    $('#tbl_list_sta_cr tbody .stacr_edit_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs stacr_edit_btn"><i class="fa fa-chevron-right"></i> Select</button>');
                                }
                            });
                        });
                    }
                });
                $('#tbl_list_sta_cr thead #tbl_list_sta_cr_act').replaceWith('<th class="text-center col-md-1">Action</th>');
			}
		});
	});	

	/*-----------------------------
	TAB 2 - STAFF LIST
	-----------------------------*/

	// SELECT STAFF CONFERENCE
	$('#staff_list_conference').on('click','.stacr_edit_btn', function(){
		var thisBtn = $(this);
		var crRefID = $('#tbl_list_sta_cr thead tr').data("refid");
		var crName = $('#tbl_list_sta_cr thead tr').data("crname");
		var td = thisBtn.parent().siblings();
		var crStaffID = td.eq(0).html().trim();
		var crStaffName = td.eq(1).html().trim();
		// alert(crRefID+' '+crName+' '+crStaffID);

		$('#conference_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		show_loading();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conAppQuery')?>',
			data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
			success: function(res) {
				$('#conference_application').html(res);

				var budget = $('.research_info').data();
				// console.log(budget.budgetOrigin);
				if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
					// alert('show');
					$('#conference_application #rsh_btn').removeClass('hidden');
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

				// CONFERENCE RMIC APPROVAL
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('conRmicApproval')?>',
					data: {'staffID' : crStaffID, 'refid' : crRefID, 'crName' : crName},
					beforeSend: function() {
						$('#conference_rmic_approval').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						if(budget.budgetOrigin == 'RESEARCH' || budget.budgetOrigin == 'RESEARCH_CONFERENCE') {
							// alert('show');
							$('#conference_rmic_approval').html(res);
						} else {
							$('#conference_rmic_approval').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Record not available for selected staff</th></tr></thead></table></p>').show();
						}
					}
				});

				// STAFF CONFERENCE ALLOWANCE
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('staffConAllowanceQuery')?>',
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

	/*-----------------------------
	TAB 3 - CONFERENCE APPLICATION
	-----------------------------*/

	// VIEW FILE ATTACHMENT
	$('#conference_application').on('click','.download_file_q', function(){
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