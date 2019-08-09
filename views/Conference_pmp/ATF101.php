<?php echo $this->lib->title('Conference / Conference Query', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF101 - Conference Query</h2>				
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
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff Conference Application</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div class="alert alert-info fade in">
										<b>Searching Criteria</b>
									</div>

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
									
									<br>
									<div class="alert alert-info fade in">
										<b>Report Status (Print)</b>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Status</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('cmStatus', $cr_status_list, '', 'class="form-control" id="cmStatus"'); ?>
											</div>
										</div>
									</div>

									<div id="conference_list">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="staff_con_app">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference List tab</th>
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

<script>
	var ca_row = '';
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
	TAB 1 - CONFERENCE LIST
	-----------------------------*/

    // POPULATE CONFERENCE LIST
	var pMonth = 'CURR_M';
	var pYear = 'CURR_Y';

	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getConferenceListQ')?>',
		data: {'sMonth' : pMonth, 'sYear' : pYear},
		beforeSend: function() {
			$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
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
		$('#staff_con_app').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List tab</th></tr></thead></table></p>').show();

		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		var refidTitle = $('#refidTitle').val();
		// alert(''+sMonth+',' +sYear);
		$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceListQ')?>',
            data: {'sMonth' : sMonth, 'sYear' : sYear, 'refid_title' : refidTitle},
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
		$('#staff_con_app').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select conference from Conference List tab</th></tr></thead></table></p>').show();
		
		var thisBtn = $(this);
		var refidTitle = $('#refidTitle').val();
		// var sMonth = $('#sMonth').val();
		// var sYear = $('#sYear').val();
		// alert('TEST');

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceListQ')?>',
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
	$('#conference_list').on('click','.detl_btn_cr', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var crName = td.find(".crname").text();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('staffConAppQ')?>',
			data: {'refid' : refid, 'crname' : crName},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_con_app').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
                $('#staff_con_app').html(res);
		
				b_row = $('#tbl_sca_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});	

	// PRINT
	$('#conference_list').on('click','.print_rep_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var cm_status = $("#cmStatus").val();
		var repCode = 'ATR107';
		// console.log(refid+' '+cm_status+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'refid' : refid, 'cm_status' : cm_status, 'repCode' : repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});

	/*-----------------------------
	TAB 2 - STAFF LIST
	-----------------------------*/

	// PRINT PMP
	$('#staff_con_app').on('click','.print_pmp', function () {
		var thisBtn = $(this);
		var refid = $("#crRefid").val();
		var staff_id = thisBtn.val();
		var repCode = 'REPPMPQ';
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

	// PRINT LMP
	$('#staff_con_app').on('click','.print_lmp', function () {
		var thisBtn = $(this);
		var refid = $("#crRefid").val();
		var staff_id = thisBtn.val();
		var repCode = 'REPLMPQ';
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
</script>