<?php echo $this->lib->title('CPD / Conference Setup (CPD)', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF097 - Conference Setup (CPD)</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Participant Role</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Conference</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Assign CPD</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="participant_role">
									</div>
                                </div> 

                                <div class="tab-pane fade" id="s2">
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

									<div class="row">
										<div class="col-sm-3 text-right"></div>
										<div class="col-sm-3 text-right" id="loaderCS">
										</div>
									</div>

									<div id="conference_list">
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="cpd_setup">
                                        <p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click CPD Setup button from Conference tab</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </p>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s4">
									<div id="assign_cpd">
                                        <p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click CPD Info button from Conference tab</th>
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
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - PARTICIPANT ROLE
	-----------------------------*/

	// POPULATE PARTICIPANT ROLE
	var mod = 'CPD';
	$('#participant_role').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo site_url('training/conference_setup/conParticipantRole')?>',
		data: {'mod':mod},
		success: function(res) {
			$('#participant_role').html(res);
			$('#participant_role .add_pr_btn').addClass('hidden');

			cf_row = $('#tbl_pr_list').DataTable({
				"ordering":false,
				drawCallback: function(){
					$(function() {
						$('#tbl_pr_list').each(function() {
						var Cell = $(this).find('td:eq(8)');
						//debugger;
							if (Cell.text() !== 'error') {
								//$(this).find('btn').hide();
								$('#tbl_ca_list tbody .del_ca_btn').addClass('hidden');
							}
						});
					});
				}
			});
		}
	});

	// UPDATE PARTICIPANT ROLE
	$('#participant_role').on('click','.edit_pr_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cprCode = td.find(".cpr_code").text();
		var mod = '';

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/conference_setup/updateConPartRole')?>',
			data: {'cprCode':cprCode, 'mod':mod},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
				$('#myModalis2 .modal-content #oth_detl').addClass('hidden');
                $('#myModalis2 .modal-content #display_conference_f').attr('disabled', 'disabled');
                $('#myModalis2 .modal-content #display_rmic').addClass('hidden');
                $('#myModalis2 .modal-content #prosiding').addClass('hidden');
                $('#myModalis2 .modal-content #ref_code').addClass('hidden');
				$('#myModalis2 .modal-content #pRole').prop('readonly', true);
				$('#myModalis2 .modal-content #pRoleLabel').replaceWith('<label class="col-md-3 control-label">Participant Role</label>');
				$('#myModalis2 .modal-content #refCode').attr('disabled', 'disabled');
				$('#myModalis2 .modal-content #orderBy').prop('readonly', true);

			}
		});
	});

	// SAVE UPDATE PARTICIPANT ROLE
	$('#myModalis2').on('click', '.upd_pr', function (e) {
		e.preventDefault();
		var data = $('#updConPartRole').append('<input name="form[mod]" value="CPD" class="hidden">').serialize();
		msg.wait('#updConPartRoleAlert');
		msg.wait('#updConPartRoleAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/conference_setup/saveUpdConPartRole')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updConPartRoleAlert');
				msg.show(res.msg, res.alert, '#updConPartRoleAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ATF097')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editConAllowAlert');
			}
		});	
    });
    
    /*-----------------------------
	TAB 2 - CONFERENCE
    -----------------------------*/
    
    var pMonth = 'CURR_M';
    var pYear = 'CURR_Y';
    var mod = 'CPD'

    // POPULATE CONFERENCE LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo site_url('training/conference_pmp/getConferenceInfoList')?>',
		data: {'sMonth' : pMonth, 'sYear' : pYear, 'mod' : mod},
		beforeSend: function() {
			$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#conference_list').html(res);
            $('#conference_list .table-responsive').removeClass('table-responsive');

			ca_row = $('#tbl_ca_list').DataTable({
                "ordering":false,
                drawCallback: function(){
                    $(function() {
                        $('#tbl_ca_list').each(function() {
                        var Cell = $(this).find('td:eq(4)');
                        //debugger;
                            if (Cell.text() !== 'error') {
                                $('#tbl_ca_list tbody .con_app_detl_btn').replaceWith('<div class="btn-group"><button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button><div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn"><button type="button" class="btn btn-danger text-left btn-block btn-xs applicant_list_btn"><i class="fa fa-file-pdf-o"></i> Applicant List</button> <button type="button" class="btn btn-primary text-left btn-block btn-xs cpd_setup_btn"><i class="fa fa-cog"></i> CPD Setup</button> <button type="button" class="btn btn-info text-left btn-block btn-xs cpd_info_btn"><i class="fa fa-info-circle"></i> CPD Info</button> <button type="button" class="btn btn-success text-left btn-block btn-xs cr_oth_detl_btn"><i class="fa fa-edit"></i> Details</button></div></div></div>');
                            }
                        });
                    });
                }
			});
		}
    });

    // CONFERENCE LIST  FILTER
	$('.listFilter').change(function() {
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		// alert(''+sMonth+',' +sYear);
		$('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#cpd_setup').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Setup button from Conference tab</th></tr></thead></table></p>').show();
		$('#assign_cpd').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Info button from Conference tab</th></tr></thead></table></p>').show();
		
		$.ajax({
            type: 'POST',
            url: '<?php echo site_url('training/conference_pmp/getConferenceInfoList')?>',
            data: {'sMonth' : sMonth, 'sYear' : sYear, 'mod' : mod},
            success: function(res) {
                $('#conference_list').html(res);
                $('#conference_list .table-responsive').removeClass('table-responsive');

                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_ca_list').each(function() {
                            var Cell = $(this).find('td:eq(4)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    $('#tbl_ca_list tbody .con_app_detl_btn').replaceWith('<div class="btn-group"><button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button><div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn"><button type="button" class="btn btn-danger text-left btn-block btn-xs applicant_list_btn"><i class="fa fa-file-pdf-o"></i> Applicant List</button> <button type="button" class="btn btn-primary text-left btn-block btn-xs cpd_setup_btn"><i class="fa fa-cog"></i> CPD Setup</button> <button type="button" class="btn btn-info text-left btn-block btn-xs cpd_info_btn"><i class="fa fa-info-circle"></i> CPD Info</button> <button type="button" class="btn btn-success text-left btn-block btn-xs cr_oth_detl_btn"><i class="fa fa-edit"></i> Details</button></div></div></div>');
                                }
                            });
                        });
                    }
                });
            }
        });
		$('#loaderCS').hide();
	});

	// SEARCH CONFERENCE
	$('.search_refid_title_btn').click(function(){
		var thisBtn = $(this);
		var refidTitle = $('#refidTitle').val();
		// alert('TEST');

		$.ajax({
            type: 'POST',
            url: '<?php echo site_url('training/conference_pmp/getConferenceInfoList')?>',
            data: {'refid_title' : refidTitle, 'mod' : mod},
            beforeSend: function() {
                $('#conference_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#cpd_setup').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Setup button from Conference tab</th></tr></thead></table></p>').show();
				$('#assign_cpd').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Info button from Conference tab</th></tr></thead></table></p>').show();
            },
            success: function(res) {
                $('#conference_list').html(res);
                $('#conference_list .table-responsive').removeClass('table-responsive');

                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_ca_list').each(function() {
                            var Cell = $(this).find('td:eq(4)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    $('#tbl_ca_list tbody .con_app_detl_btn').replaceWith('<div class="btn-group"><button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button><div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn"><button type="button" class="btn btn-danger text-left btn-block btn-xs applicant_list_btn"><i class="fa fa-file-pdf-o"></i> Applicant List</button> <button type="button" class="btn btn-primary text-left btn-block btn-xs cpd_setup_btn"><i class="fa fa-cog"></i> CPD Setup</button> <button type="button" class="btn btn-info text-left btn-block btn-xs cpd_info_btn"><i class="fa fa-info-circle"></i> CPD Info</button> <button type="button" class="btn btn-success text-left btn-block btn-xs cr_oth_detl_btn"><i class="fa fa-edit"></i> Details</button></div></div></div>');
                                }
                            });
                        });
                    }
                });
            },
        });
		$('#loaderCS').hide();
    });
    
    // APPLICANT LIST REPORT
	$('#conference_list').on('click','.applicant_list_btn', function () {
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
        var month = $("#sMonth").val();
        var year = $("#sYear").val();
		var repCode = 'ATR112';
        // console.log(refid+month+year);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'refid':refid, 'month':month, 'year':year, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
    // CONFERENCE DETAIL CPD
	$('#conference_list').on('click','.cr_oth_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('crDetailCpd')?>',
			data: {'refid':refid, 'title':title},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SAVE CONFERENCE DETL CPD
	$('#myModalis').on('click', '.upd_crdetl_cpd_btn', function (e) {
		e.preventDefault();
		var data = $('#conDetails').serialize();
		msg.wait('#conDetailsAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConDetlCpd')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#conDetailsAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#conDetailsAlert');
			}
		});	
	});

	// CONFERENCE CPD SETUP BTN
	$('#conference_list').on('click','.cpd_setup_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('crCpdSetup')?>',
			data: {'refid' : refid, 'title' : title},
			beforeSend: function() {
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#assign_cpd').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Info button from Conference tab</th></tr></thead></table></p>').show();
			},
			success: function(res) {
				$('#cpd_setup').html(res);
				
				// CHECK CONFERENCE CPD
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('checkConCpd')?>',
					data: {'refid' : refid},
					dataType: 'JSON',
					success: function(res) {
						// console.log(res.sts);
						if (res.sts==1) {
							// hide delete button
							$('#cpd_setup .del_con_cpd').removeClass('hidden');
						} else {
							// show delete button
							$('#cpd_setup .del_con_cpd').addClass('hidden');
						}
						
					}
				});	
			}
		});
	});	

	// CONFERENCE ASSIGN CPD
	$('#conference_list').on('click','.cpd_info_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('cpdInfo')?>',
			data: {'refid' : refid, 'title' : title},
			beforeSend: function() {
				$('.nav-tabs li:eq(3) a').tab('show');
				$('#assign_cpd').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#cpd_setup').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click CPD Setup button from Conference tab</th></tr></thead></table></p>').show();
			},
			success: function(res) {
				$('#assign_cpd').html(res);

				ca_row = $('#tbl_assign_cpd_list').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// ENTER BUTTON NOT ALLOWED
	$('#refidTitle').keyup(function (e) {
		if (e.keyCode === 13) {
            e.preventDefault();
			$('#loaderCS').show();
			msg.show('Enter button are not allowed', 'warning', '#loaderCS');
			return;
        }
	});

	/*-----------------------------
	TAB 3 - CPD SETUP
    -----------------------------*/

	// SAVE CONFERENCE CPD SETUP
	$('#cpd_setup').on('click', '.save_upd_con_cpd', function (e) {
		e.preventDefault();
		var refid = $('#refid').val(); 
		var title = $('#title').val(); 

		var data = $('#crCpdSetup').serialize();
		msg.wait('#crCpdSetupAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConCpdSetup')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#crCpdSetupAlert');
				if (res.sts == 1) {
					setTimeout(function () {
						// REFRESH
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('crCpdSetup')?>',
							data: {'refid' : refid, 'title' : title},
							beforeSend: function() {
								$('.nav-tabs li:eq(2) a').tab('show');
								$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#cpd_setup').html(res);
								
								// CHECK CONFERENCE CPD
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('checkConCpd')?>',
									data: {'refid' : refid},
									dataType: 'JSON',
									success: function(res) {
										// console.log(res.sts);
										if (res.sts==1) {
											// hide delete button
											$('#cpd_setup .del_con_cpd').removeClass('hidden');
										} else {
											// show delete button
											$('#cpd_setup .del_con_cpd').addClass('hidden');
										}
									}
								});	
							}
						});
						
						$('.btn').removeAttr('disabled');
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#crCpdSetupAlert');
			}
		});	
	});

	// DELETE CONFERENCE CPD SETUP
	$('#cpd_setup').on('click','.del_con_cpd', function() {
		var refid = $("#refid").val();
		var title = $("#title").val();
		// alert(refid+title);
		
		$.confirm({
		    title: 'Delete Conference CPD',
		    content: 'Are you sure to delete this record? <br> <b>'+refid+' - '+title+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delConCpdSetup')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								// REFRESH
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('crCpdSetup')?>',
									data: {'refid' : refid, 'title' : title},
									beforeSend: function() {
										$('.nav-tabs li:eq(2) a').tab('show');
										$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#cpd_setup').html(res);
										
										// CHECK CONFERENCE CPD
										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('checkConCpd')?>',
											data: {'refid' : refid},
											dataType: 'JSON',
											success: function(res) {
												// console.log(res.sts);
												if (res.sts==1) {
													// hide delete button
													$('#cpd_setup .del_con_cpd').removeClass('hidden');
												} else {
													// show delete button
													$('#cpd_setup .del_con_cpd').addClass('hidden');
												}
											}
										});	
									}
								});

								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								hide_loading();
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
		        },
		        cancel: function () {
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});


	/*-----------------------------
	TAB 4 - ASSIGN CPD
    -----------------------------*/

	// ASSIGN CPD MARK
	$('#assign_cpd').on('click','.generate_mark_btn', function() {
		var refid = $("#refid").val();
		var title = $("#title").val();
		var competency = $("#competency").val();
		var mark = $("#mark").val();
		// alert(competency+mark);
		
		$.confirm({
		    title: 'Process CPD',
		    content: 'Are you sure you want to continue this process? <br> <b>'+refid+' - '+title+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('generateCpd')?>',
						data: {'refid' : refid, 'competency' : competency, 'mark' : mark},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								// REFRESH
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('cpdInfo')?>',
									data: {'refid' : refid, 'title' : title},
									beforeSend: function() {
										$('.nav-tabs li:eq(3) a').tab('show');
										$('#assign_cpd').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#assign_cpd').html(res);

										ca_row = $('#tbl_assign_cpd_list').DataTable({
											"ordering":false,
										});
									}
								});

								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								hide_loading();
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
		        },
		        cancel: function () {
		            $.alert('Canceled Process CPD!');
		        }
		    }
		});
	});

	// UPDATE STAFF CPD
	$('#assign_cpd').on('click','.upd_cpd_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		var refid = $('#refid').val();
		var title = $('#title').val();
		var date_from = $('#dtFrom').val();

		// VALIDATE DATE
		if(date_from != '') {
			show_loading();
			arr_date = date_from.split('/');
			y_from = arr_date[2];
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
					if(y_from == curr_yyyy) {
						$('#myModalis .modal-content').empty();
						$('#myModalis').modal('show');
						$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
					
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('updateCpd')?>',
							data: {'staff_id':staff_id, 'staff_name':staff_name,'refid':refid, 'title':title},
							success: function(res) {
								$('#myModalis .modal-content').html(res);
							}
						});
					} else {
						$.alert({
							title: 'Alert!',
							content: 'Cannot update previous year record.',
							type: 'red',
						});
					}
				}
			})
		}
	});

	// SAVE UPDATE STAFF CPD
	$('#myModalis').on('click', '.upd_staff_cpd', function (e) {
		e.preventDefault();
		var refid = $('#refid').val(); 
		var title = $('#title').val(); 

		var data = $('#updCpdStaff').serialize();
		msg.wait('#updCpdStaffAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveStaffUpdateCpd')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updCpdStaffAlert');
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');

						// REFRESH
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('cpdInfo')?>',
							data: {'refid' : refid, 'title' : title},
							beforeSend: function() {
								$('.nav-tabs li:eq(3) a').tab('show');
								$('#assign_cpd').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#assign_cpd').html(res);

								ca_row = $('#tbl_assign_cpd_list').DataTable({
									"ordering":false,
								});
							}
						});
						
						$('.btn').removeAttr('disabled');
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#updCpdStaffAlert');
			}
		});	
	});	
</script>