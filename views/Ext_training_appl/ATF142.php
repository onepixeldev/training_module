<?php echo $this->lib->title('Training / Assign Training for External Agency', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF142 - Assign Training for External Agency</h2>				
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
                            
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group text-right">
										<label><b>Department</b></label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group text-left">
										<?php echo form_dropdown('sDept', $dept_list, $curr_dept, 'class="form-control listFilter" id="sDept"'); ?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="text-left">   
										&nbsp;
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group text-right">
										<label><b>Month</b></label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group text-left">
										<?php echo form_dropdown('sMonth', $month_list, '', 'class="form-control listFilter" id="sMonth"'); ?>
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
                            
                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false" class="hidden">CPD Point</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Service Book</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">History</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="staff_list">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click Staff List button from Training List tab</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

                                <div class="hidden tab-pane fade" id="s3">
									<div id="update_cpd_info">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click CPD Point button from Training List tab</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

                                <div class="tab-pane fade" id="s4">
									<div id="staff_training_svc_book">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click Service Book button from Training List tab</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

                                <div class="tab-pane fade" id="s5">
									<div id="detail">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click Detail button from Training List tab</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

                                <div class="tab-pane fade" id="s6">
									<div id="history">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click History button from Staff List tab</th>
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
	var tr_row = '';

    $(document).ready(function(){
		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});

		// PREVENT SUBMIT RELOAD
		$('#myModalis').on('submit', function(e){
			e.preventDefault();
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // POPULATE TRAINING LIST
    var dept = $('#sDept').val();
    var month = $('#sMonth').val();
    var year = $('#sYear').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList6')?>',
		data: {'dept' : dept, 'month' : month, 'year' : year},
		beforeSend: function() {
			$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);
			tr_row = $('#tbl_tr_list').DataTable({
				"ordering":false,
			});
		}
    });

	// TRAINING LIST FILTER
	$('.listFilter').change(function() {
		var dept = $('#sDept').val();
        var month = $('#sMonth').val();
        var year = $('#sYear').val();

        $('.nav-tabs li:eq(0) a').tab('show');

        $('#staff_list').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Staff List button from Training List tab</th></tr></thead></table></p>').show();
        $('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();
        $('#history').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click History button from Staff List tab</th></tr></thead></table></p>').show();

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getTrainingList6')?>',
            data: {'dept' : dept, 'month' : month, 'year' : year},
            beforeSend: function() {
                $('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#training_list').html(res);
                tr_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
                });
            }
        });
	});
    
    // TRAINING DETAILS
    $('#training_list').on('click','.select_training_btn', function() {
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

        $('.nav-tabs li:eq(4) a').tab('show');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('trDetl')?>',
            // data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
            beforeSend: function() {
                $('#detail').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#detail').html(res);

                // TRAINING DETAILS
                $('#detl1').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/editTraining')?>',
                    data: {'refID':refid},
                    success: function(res) {
                        $('#detl1').html(res);

                        $("#detl1 :input").prop("disabled", true);
                        $("#detl1 .file_att").removeAttr("disabled");
                        $("#detl1 :button").addClass('hidden');
                        $("#detl1 .file_att").removeClass('hidden');
                        $("#detl1 #alert").addClass('hidden');
                        $("#detl1 .modal-header").addClass('hidden');


                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/speakerInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#speakerInfo').html(res);
                                $('.add_tr_sp').hide();
                                $('#speakerInfo #spAct').hide();
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/facilitatorInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#facilitatorInfo').html(res);
                                $('.add_tr_fi').hide();
                                $('#facilitatorInfo #fiAct').hide();
                            }
                        });
                    }
                });

                // TRAINING COST
                $('#detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/trainingCost')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    success: function(res) {
                        $('#detl2').html(res);

                        $("#detl2 :button").addClass('hidden');
                    }
                });

                // TARGET GROUP & MODULE SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/targetGroup')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl3').html(res);

                        $("#detl3 .add_tg").addClass('hidden');
                        $("#detl3 .del_tg_btn").addClass('hidden');
                        
                        // MODULE SETUP
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/moduleSetup')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#module_setup').html(res);

                                $("#module_setup :button").addClass('hidden');
                            }
                        });
                    }
                });

                // CPD SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/cpdSetup')?>',
                    data: {'tsRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl4').html(res);

                        $("#detl4 :button").addClass('hidden');
                    }
                });

            }
        });

	});

    // STAFF LIST
	$('#training_list').on('click','.staff_list_btn', function() {
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

        $('.nav-tabs li:eq(1) a').tab('show');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('trStaffList4')?>',
            data: {'refid' : refid},
            beforeSend: function() {
                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#staff_list').html(res);
                tr_row = $('#tbl_tr_stf_list').DataTable({
                    "ordering":false,
                });
            }
        });

    });

    // --- ATF123 --- //
    // CPD POINT
    $('#training_list').on('click','.cpd_pts_btn', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/cpd/ATF123')?>',
			data: {'refid' : refid},
			beforeSend: function() {
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#update_cpd_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#update_cpd_info').html(res);
				tr_row = $('#tbl_stf_cpd_list').DataTable({
					"ordering":false,
				});
			}
		}); 
	});

    // SAVE UPDATE STAFF CPD MARK
	$('#myModalis').on('click', '.upd_staff_cpd_mark', function (e) {
		e.preventDefault();
		var refid = $('#refid').val(); 

		var data = $('#updCpdMarkStaff').serialize();
		msg.wait('#updCpdMarkStaffAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/cpd/saveStaffUpdateCpdMark')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updCpdMarkStaffAlert');
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');

						// REFRESH
						$.ajax({
							type: 'POST',
							url: '<?php echo site_url('training/cpd/ATF123')?>',
							data: {'refid' : refid},
							beforeSend: function() {
								$('#update_cpd_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#update_cpd_info').html(res);
								tr_row = $('#tbl_stf_cpd_list').DataTable({
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
				msg.danger('Please contact administrator.', '#updCpdMarkStaffAlert');
			}
		});	
	});
    // --- ATF123 --- //
    
    // --- ATF118 --- //
    // SERVICE BOOK - ATF118
	$('#training_list').on('click','.svc_book_btn', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var trRefID = td.find(".refid").text();
        var trainingN = td.find(".title").text();

		$.ajax({
			type: 'POST',
            url: '<?php echo site_url('training/training_application/verifySvcBook')?>',
			data: {'refid' : trRefID},
			dataType: 'JSON',
			beforeSend: function() {
				show_loading();
				$('.btn').attr('disabled', 'disabled');
			},
			success: function(res) {
				if(res.sts == 1) {
					$('.btn').removeAttr('disabled');
					hide_loading();

					$.ajax({
						type: 'POST',
                        url: '<?php echo site_url('training/training_application/ATF118')?>',
						data: {'refid' : trRefID, 'tName' : trainingN},
						beforeSend: function() {
							$('.nav-tabs li:eq(3) a').tab('show');
							$('#staff_training_svc_book').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						},
						success: function(res) {
							$('#staff_training_svc_book').html(res);
							tr_row = $('#tbl_list_sta_svc_book').DataTable({
								"ordering":false,
							});
						}
					}); 
				} else{
					$('.btn').removeAttr('disabled');
					hide_loading();
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: res.alert,
					});
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
			}
		});
    });
    // --- ATF118 --- //

    /*===========================================================
       TAB 2 - STAFF LIST
    =============================================================*/
    
    // STAFF TRAINING HISTORY
    $('#staff_list').on('click','.tr_history', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".staff_id").text();
        var stfName = td.find(".name").text();

		$.ajax({
			type: 'POST',
            url: '<?php echo site_url('training/training_application/trainingListStaff')?>',
			data: {'stfID' : stfID, 'stfName' : stfName},
			beforeSend: function() {
				$('.nav-tabs li:eq(5) a').tab('show');
				$('#history').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#history').html(res);
				tr_row = $('#tr_list_stf').DataTable({
					"ordering":false,
				});
			}
		});
    });	

    // SEARCH STAFF
	$('#staff_list').on('click','.assign_staff', function(){
        var refid = $('#refid').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffAssignTr')?>',
			data: {'refid':refid},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

    // ASSIGN STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md', function () {
        var refid = $('#myModalis #refid').val();
		var staff_id = $('#myModalis #staff_id').val();
		search_trigger = 1;
		
		if(staff_id == '') {
			msg.show('Please enter Staff ID / Name', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
		}

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffAssignTr')?>',
			data: {'staff_id':staff_id, 'search_trigger':search_trigger, 'refid':refid},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#myModalis #staff_list').removeClass('hidden');

				stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// ENTER BUTTON NOT ALLOWED
	$('#myModalis').on('keyup', '#staff_id', function (e) {
		if (e.keyCode === 13) {
            e.preventDefault();
			msg.show('Enter button are not allowed', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
        }
	});

    // SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id', function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
        var refid = $('#myModalis #refid').val();

        $('#myModalis #loaderAlert').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

        if(staff_id != '' && staff_name != '') {
			$('#stfID').val(staff_id);
			$('#stfName').val(staff_name);
		}

        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('staffFormDetl')?>',
			data: {'refid' : refid, 'staff_id' : staff_id},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
                    $('#staff_dept').val(res.dept);
                    $('#staff_fee').val(res.fee);
				} 
			}
		});
        
        $('#myModalis #staff_form').removeClass('hidden');
        $('#myModalis').animate({scrollTop: $('#staff_form').position().top}, 'slow');
        $('#myModalis #loaderAlert').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>').hide();
    });
    
    // SAVE ASSIGN STAFF
	$('#myModalis').on('click', '.save_assign_stf', function (e) { 
		e.preventDefault();
        var data = $('#assignStaffForm').serialize();
        msg.wait('#assignStaffAlert');
        msg.wait('#assignStaffAlertFooter');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveAssignStaff')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#assignStaffAlert');
                msg.show(res.msg, res.alert, '#assignStaffAlertFooter');
				
				if (res.sts == 1) {
					
					setTimeout(function () {
                        var refid = res.refid;
                        var staff_id = res.staff_id;

						$('#myModalis').modal('hide');

						// REFRESH STAFF LIST
						$.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('trStaffList4')?>',
                            data: {'refid' : refid},
                            beforeSend: function() {
                                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#staff_list').html(res);
                                tr_row = $('#tbl_tr_stf_list').DataTable({
                                    "ordering":false,
                                });
                            }
                        });
						
					}, 1000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
                msg.danger('Please contact administrator.', '#assignStaffAlert');
                msg.danger('Please contact administrator.', '#assignStaffAlertFooter');
			}
		});	
    });

    // EDIT ASSIGN STAFF 
	$('#staff_list').on('click','.upd_staff', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
        var refid = $('#refid').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editAssignStfTr')?>',
			data: {'refid':refid, 'staff_id':staff_id},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

    // SAVE UPDATE ASSIGN STAFF
	$('#myModalis').on('click', '.upd_assign_stf', function (e) { 
		e.preventDefault();
        var data = $('#editAssignStaffForm').serialize();
        msg.wait('#editAssignStaffAlert');
        msg.wait('#editAssignStaffAlertFooter');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditAssignStaff')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#editAssignStaffAlert');
                msg.show(res.msg, res.alert, '#editAssignStaffAlertFooter');
				
				if (res.sts == 1) {
					
					setTimeout(function () {
                        var refid = res.refid;
                        var staff_id = res.staff_id;

						$('#myModalis').modal('hide');

						// REFRESH STAFF LIST
						$.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('trStaffList4')?>',
                            data: {'refid' : refid},
                            beforeSend: function() {
                                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#staff_list').html(res);
                                tr_row = $('#tbl_tr_stf_list').DataTable({
                                    "ordering":false,
                                });
                            }
                        });
						
					}, 1000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
                msg.danger('Please contact administrator.', '#editAssignStaffAlert');
                msg.danger('Please contact administrator.', '#editAssignStaffAlertFooter');
			}
		});	
    });

    // EDIT ASSIGN STAFF 
	$('#staff_list').on('click','.tr_detl_btn', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
        var staff_id = td.find(".staff_id").text();
        var sth_status = td.find(".sth_status").text();
        var refid = $('#refid').val();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updTrainingDetl')?>',
			data: {'refid':refid, 'staff_id':staff_id, 'sth_status':sth_status},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
    });
    
    // SAVE UPDATE ASSIGN STAFF
	$('#myModalis').on('click', '.upd_train_detl', function (e) { 
		e.preventDefault();
        var data = $('#editTrainDetl').serialize();
        msg.wait('#editTrainDetlAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditTrDetl')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#editTrainDetlAlert');
				
				if (res.sts == 1) {
					
					setTimeout(function () {
                        var refid = res.refid;
                        var staff_id = res.staff_id;

						$('#myModalis').modal('hide');

						// REFRESH STAFF LIST
						$.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('trStaffList4')?>',
                            data: {'refid' : refid},
                            beforeSend: function() {
                                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#staff_list').html(res);
                                tr_row = $('#tbl_tr_stf_list').DataTable({
                                    "ordering":false,
                                });
                            }
                        });
						
					}, 1000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
                msg.danger('Please contact administrator.', '#editTrainDetlAlert');
			}
		});	
    });

    // PRINT
	$('#staff_list').on('click','.print_btn', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
        var staff_id = td.find(".staff_id").text();
        var refid = $('#refid').val();
		var repCode = 'ATR281';

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'staff_id':staff_id, 'refid':refid, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});


    /*===========================================================
       TAB 3 - CPD POINT
    =============================================================*/

    

    /*===========================================================
       TAB 4 - SERVICE BOOK
    =============================================================*/

    // TRAINING DETAILS
    $('#staff_training_svc_book').on('click','.tr_detl_btn', function() {
        var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(1).html().trim();

        $('.nav-tabs li:eq(4) a').tab('show');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('trDetl')?>',
            // data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
            beforeSend: function() {
                $('#detail').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#detail').html(res);

                // TRAINING DETAILS
                $('#detl1').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/editTraining')?>',
                    data: {'refID':refid},
                    success: function(res) {
                        $('#detl1').html(res);

                        $("#detl1 :input").prop("disabled", true);
                        $("#detl1 .file_att").removeAttr("disabled");
                        $("#detl1 :button").addClass('hidden');
                        $("#detl1 .file_att").removeClass('hidden');
                        $("#detl1 #alert").addClass('hidden');
                        $("#detl1 .modal-header").addClass('hidden');


                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/speakerInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#speakerInfo').html(res);
                                $('.add_tr_sp').hide();
                                $('#speakerInfo #spAct').hide();
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/facilitatorInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#facilitatorInfo').html(res);
                                $('.add_tr_fi').hide();
                                $('#facilitatorInfo #fiAct').hide();
                            }
                        });
                    }
                });

                // TRAINING COST
                $('#detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/trainingCost')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    success: function(res) {
                        $('#detl2').html(res);

                        $("#detl2 :button").addClass('hidden');
                    }
                });

                // TARGET GROUP & MODULE SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/targetGroup')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl3').html(res);

                        $("#detl3 .add_tg").addClass('hidden');
                        $("#detl3 .del_tg_btn").addClass('hidden');
                        
                        // MODULE SETUP
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/moduleSetup')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#module_setup').html(res);

                                $("#module_setup :button").addClass('hidden');
                            }
                        });
                    }
                });

                // CPD SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/cpdSetup')?>',
                    data: {'tsRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl4').html(res);

                        $("#detl4 :button").addClass('hidden');
                    }
                });

            }
        });

	});
    
    /*===========================================================
       TAB 5 - DETAILS
    =============================================================*/

    // FILE ATTACHMENT
	$('#detail').on('click','.file_att', function(){
		refid = $('#refid').val();
		mod = 'TR_SETUP';

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('fileAttParam')?>',
			data: {'refid' : refid, 'mod' : mod},
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

    // LIST OF ELIGIBLE POSITION
    $('#detail').on('click', '.pos_tg_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		//var refid = thisBtn.val();
		var gpCode = td.eq(0).html().trim();
		//alert(gpCode);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
            url: '<?php echo site_url('training/training_application/listEgPosition')?>',
			data: {'gpCode' : gpCode},
			success: function(res) {
				$('#myModalis .modal-content').html(res);	
				$('#postAction').hide();
				$('#tbl_list_eg_pos tbody #postAction').hide();
				$('.add_eg_position_btn').hide();
			}
		});
	});

    /*===========================================================
       TAB 6 - HISTORY
    =============================================================*/

    // TRAINING DETAILS
	$('#history').on('click','.tr_detl_btn', function() {
        var thisBtn = $(this);
        var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
        var title = td.eq(1).html().trim();

        $('.nav-tabs li:eq(4) a').tab('show');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('trDetl')?>',
            // data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
            beforeSend: function() {
                $('#detail').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#detail').html(res);

                // TRAINING DETAILS
                $('#detl1').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/editTraining')?>',
                    data: {'refID':refid},
                    success: function(res) {
                        $('#detl1').html(res);

                        $("#detl1 :input").prop("disabled", true);
                        $("#detl1 .file_att").removeAttr("disabled");
                        $("#detl1 :button").addClass('hidden');
                        $("#detl1 .file_att").removeClass('hidden');
                        $("#detl1 #alert").addClass('hidden');
                        $("#detl1 .modal-header").addClass('hidden');


                        $.ajax({
                            type: 'POST',
                            // url: '<?php echo $this->lib->class_url('speakerInfo')?>',
                            url: '<?php echo site_url('training/training_application/speakerInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#speakerInfo').html(res);
                                $('.add_tr_sp').hide();
                                $('#speakerInfo #spAct').hide();
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            // url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
                            url: '<?php echo site_url('training/training_application/facilitatorInfo')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#facilitatorInfo').html(res);
                                $('.add_tr_fi').hide();
                                $('#facilitatorInfo #fiAct').hide();
                            }
                        });
                    }
                });

                // TRAINING COST
                $('#detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/trainingCost')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    success: function(res) {
                        $('#detl2').html(res);

                        $("#detl2 :button").addClass('hidden');
                    }
                });

                // TARGET GROUP & MODULE SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/targetGroup')?>',
                    data: {'trRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl3').html(res);

                        $("#detl3 .add_tg").addClass('hidden');
                        $("#detl3 .del_tg_btn").addClass('hidden');
                        
                        // MODULE SETUP
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/moduleSetup')?>',
                            data: {'tsRefID' : refid},
                            beforeSend: function() {
                                $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#module_setup').html(res);

                                $("#module_setup :button").addClass('hidden');
                            }
                        });
                    }
                });

                // CPD SETUP
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/cpdSetup')?>',
                    data: {'tsRefID' : refid, 'tName' : title},
                    beforeSend: function() {
                        $('#detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#detl4').html(res);

                        $("#detl4 :button").addClass('hidden');
                    }
                });

            }
        });

    });

    // APPLICATION DETAILS 
	$('#history').on('click', '.stf_tr_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var stfID = thisBtn.val();
		//var tName = td.eq(1).html().trim();
		//alert(refid+' '+stfID);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
            url: '<?php echo site_url('training/training_application/applicationDetail')?>',
			data: {'refid' : refid, 'stfID' : stfID},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});
	
</script>