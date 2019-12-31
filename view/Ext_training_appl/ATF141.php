<?php echo $this->lib->title('Training / Approve Training Applications for External Agency', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF141 - Approve Training Applications for External Agency</h2>				
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
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">History</a>
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

                                <div class="tab-pane fade" id="s3">
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

                                <div class="tab-pane fade" id="s4">
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

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // POPULATE TRAINING LIST
    var dept = $('#sDept').val();
    var month = $('#sMonth').val();
    var year = $('#sYear').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList4')?>',
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
            url: '<?php echo $this->lib->class_url('getTrainingList4')?>',
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
	// $('#training_list').on('click','.select_training_btn', function() {
    //     var thisBtn = $(this);
	// 	var td = thisBtn.closest("tr");
	// 	var refid = td.find(".refid").text();
	// 	var title = td.find(".title").text();

    //     $('.nav-tabs li:eq(2) a').tab('show');

    //     $.ajax({
    //         type: 'POST',
    //         url: '<?php echo $this->lib->class_url('trDetl')?>',
    //         // data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
    //         beforeSend: function() {
    //             $('#detail').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
    //         },
    //         success: function(res) {
    //             $('#detail').html(res);

    //             // TRAINING DETAILS
    //             $('#detl1').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo $this->lib->class_url('editTraining')?>',
    //                 data: {'refid':refid},
    //                 success: function(res) {
    //                     $('#detl1').html(res);

    //                     $("#detl1 :input").prop("disabled", true);
    //                     $("#detl1 .file_att").removeAttr("disabled");
    //                     $("#detl1 :button").addClass('hidden');
    //                     $("#detl1 .file_att").removeClass('hidden');
    //                     $("#detl1 #alert").addClass('hidden');
    //                     $("#detl1 .modal-header").addClass('hidden');
    //                 }
    //             });

    //             // TRAINING COST
    //             $('#detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo $this->lib->class_url('trainingCost')?>',
    //                 data: {'refid':refid},
    //                 success: function(res) {
    //                     $('#detl2').html(res);

    //                     $("#detl2 :button").addClass('hidden');
    //                 }
    //             });

    //             // TARGET GROUP & MODULE SETUP
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo site_url('training/training_application/targetGroup')?>',
    //                 data: {'trRefID' : refid, 'tName' : title},
    //                 beforeSend: function() {
    //                     $('#detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
    //                 },
    //                 success: function(res) {
    //                     $('#detl3').html(res);

    //                     $("#detl3 :button").addClass('hidden');
                        
    //                     // MODULE SETUP
    //                     $.ajax({
    //                         type: 'POST',
    //                         url: '<?php echo site_url('training/training_application/moduleSetup')?>',
    //                         data: {'tsRefID' : refid},
    //                         beforeSend: function() {
    //                             $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
    //                         },
    //                         success: function(res) {
    //                             $('#module_setup').html(res);

    //                             $("#module_setup :button").addClass('hidden');
    //                         }
    //                     });
    //                 }
    //             });

    //             // CPD SETUP
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '<?php echo site_url('training/training_application/cpdSetup')?>',
    //                 data: {'tsRefID' : refid, 'tName' : title},
    //                 beforeSend: function() {
    //                     $('#detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
    //                 },
    //                 success: function(res) {
    //                     $('#detl4').html(res);

    //                     $("#detl4 :button").addClass('hidden');
    //                 }
    //             });

    //         }
    //     });

    // });
    
    // TRAINING DETAILS
    $('#training_list').on('click','.select_training_btn', function() {
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();

        $('.nav-tabs li:eq(2) a').tab('show');

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
            url: '<?php echo $this->lib->class_url('trStaffList')?>',
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

    /*===========================================================
       TAB 2 - STAFF LIST
    =============================================================*/

    // Select all record	
	$('#staff_list').on('click','.select_all_btn', function() {
		$(".checkitem").prop('checked', true);
	});	

	// Unselect all record	
	$('#staff_list').on('click','.unselect_all_btn', function() {
		$(".checkitem").prop('checked', false);
    });
    
    // STAFF TRAINING HISTORY
    $('#staff_list').on('click','.tr_history', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var stfID = td.eq(0).html().trim();
		var stfName = td.eq(1).html().trim();

		$.ajax({
			type: 'POST',
            url: '<?php echo site_url('training/training_application/trainingListStaff')?>',
			data: {'stfID' : stfID, 'stfName' : stfName},
			beforeSend: function() {
				$('.nav-tabs li:eq(3) a').tab('show');
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

    // APPROVE STAFF
	$('#staff_list').on('click', '.app_stf', function() {
		var thisBtn = $(this);
		var refid = $('#refid').val();

		var staffIDArr = [];
		var remarkArr = [];
		var selectedID = 0;
        var checkKTP = 0;
        var checkREG = 0;
        var checkRemark = 0;

		$.confirm({
		    title: 'Approve Applicant',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
                    show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						staffID = $(this).closest("tr").find(".staff_id").text();
						remark = $(this).closest('tr').find('[name="remark"]').val();
						selectedID++;

                        ktp = $(this).closest("tr").find(".ktp").text();
                        reg = $(this).closest("tr").find(".reg").text();

                        if(ktp == 'YES') {
                            checkKTP++;
                        }

                        if(reg == 'YES') {
                            checkREG++;
                        }

                        if(remark == '') {
                            checkRemark++;
                        }

						staffIDArr.push(staffID);
						remarkArr.push(remark);
					});

					if (selectedID == 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

                    if (checkKTP > 0 || checkREG > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: '- Please unselect <b>KTP</b> and <b>REGISTRAR</b>  applicant to approve.<br><br>- To approve <b>KTP</b> and <b>REGISTRAR</b> applicant  please use the <b>Approve (KTP / REGISTRAR)</b> button.',
							type: 'red'
						});
						return;
					}

                    if (checkRemark > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please enter a remark on each selected applicant.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('appTrApplicant')?>',
						data: {'refid' : refid, 'staffID' : staffIDArr, 'remark' : remarkArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
                                hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
                                });
                                
                                $('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();
                                $('#history').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click History button from Staff List tab</th></tr></thead></table></p>').show();
                                
                                // REFRESH STAFF LIST
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('trStaffList')?>',
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
		            $.alert('Approval cancelled!');
		        }
		    }
		});
    });
    
    // APPROVE KTP / REG STAFF
	$('#staff_list').on('click', '.app_ktp_reg', function() {
		var thisBtn = $(this);
		var refid = $('#refid').val();

		var staffIDArr = [];
		var remarkArr = [];
		var selectedID = 0;
        var checkKTPREG = 0;
        var checkRemark = 0;

		$.confirm({
		    title: 'Approve (KTP / REGISTRAR)',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
                    show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						staffID = $(this).closest("tr").find(".staff_id").text();
						remark = $(this).closest('tr').find('[name="remark"]').val();
						selectedID++;

                        ktp = $(this).closest("tr").find(".ktp").text();
                        reg = $(this).closest("tr").find(".reg").text();

                        if(ktp == 'NO' && reg == 'NO') {
                            checkKTPREG++;
                        }

                        if(remark == '') {
                            checkRemark++;
                        }

						staffIDArr.push(staffID);
						remarkArr.push(remark);
					});

					if (selectedID == 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

                    if (checkKTPREG > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: '- Please unselect applicant that are not <b>KTP</b> or <b>REGISTRAR</b>.<br><br>- To approve applicant that are not <b>KTP</b> or <b>REGISTRAR</b>  please use the <b>Approve</b> button.',
							type: 'red'
						});
						return;
					}

                    if (checkRemark > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please enter a remark on each selected applicant.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('appKtpRegApplicant')?>',
						data: {'refid' : refid, 'staffID' : staffIDArr, 'remark' : remarkArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
                                hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
                                });
                                
                                $('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();
                                $('#history').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click History button from Staff List tab</th></tr></thead></table></p>').show();
                                
                                // REFRESH STAFF LIST
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('trStaffList')?>',
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
		            $.alert('Approval (KTP / REGISTRAR) cancelled!');
		        }
		    }
		});
    });
    
    // REJECT STAFF
	$('#staff_list').on('click', '.rej_stf', function() {
		var thisBtn = $(this);
		var refid = $('#refid').val();

		var staffIDArr = [];
		var remarkArr = [];
		var selectedID = 0;
        var checkKTP = 0;
        var checkREG = 0;
        var checkRemark = 0;

		$.confirm({
		    title: 'Reject Applicant',
		    content: 'Press <b>YES</b> to continue',
			type: 'red',
		    buttons: {
		        yes: function () {
                    show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						staffID = $(this).closest("tr").find(".staff_id").text();
						remark = $(this).closest('tr').find('[name="remark"]').val();
						selectedID++;

                        ktp = $(this).closest("tr").find(".ktp").text();
                        reg = $(this).closest("tr").find(".reg").text();

                        if(ktp == 'YES') {
                            checkKTP++;
                        }

                        if(reg == 'YES') {
                            checkREG++;
                        }

                        if(remark == '') {
                            checkRemark++;
                        }

						staffIDArr.push(staffID);
						remarkArr.push(remark);
					});

					if (selectedID == 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

                    if (checkKTP > 0 || checkREG > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: '- Please unselect <b>KTP</b> and <b>REGISTRAR</b>  applicant to reject.<br><br>- To reject <b>KTP</b> and <b>REGISTRAR</b> applicant  please use the <b>Reject (KTP / REGISTRAR)</b> button.',
							type: 'red'
						});
						return;
					}

                    if (checkRemark > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please enter a remark on each selected applicant.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejTrApplicant')?>',
						data: {'refid' : refid, 'staffID' : staffIDArr, 'remark' : remarkArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
                                hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
                                });
                                
                                $('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();
                                $('#history').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click History button from Staff List tab</th></tr></thead></table></p>').show();
                                
                                // REFRESH STAFF LIST
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('trStaffList')?>',
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
		            $.alert('Training Application (Reject) cancelled!');
		        }
		    }
		});
    });

    // REJECT KTP / REG STAFF
	$('#staff_list').on('click', '.rej_ktp_reg', function() {
		var thisBtn = $(this);
		var refid = $('#refid').val();

		var staffIDArr = [];
		var remarkArr = [];
		var selectedID = 0;
        var checkKTPREG = 0;
        var checkRemark = 0;

		$.confirm({
		    title: 'Reject (KTP / REGISTRAR)',
		    content: 'Press <b>YES</b> to continue',
			type: 'red',
		    buttons: {
		        yes: function () {
                    show_loading();
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						staffID = $(this).closest("tr").find(".staff_id").text();
						remark = $(this).closest('tr').find('[name="remark"]').val();
						selectedID++;

                        ktp = $(this).closest("tr").find(".ktp").text();
                        reg = $(this).closest("tr").find(".reg").text();

                        if(ktp == 'NO' && reg == 'NO') {
                            checkKTPREG++;
                        }

                        if(remark == '') {
                            checkRemark++;
                        }

						staffIDArr.push(staffID);
						remarkArr.push(remark);
					});

					if (selectedID == 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

                    if (checkKTPREG > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: '- Please unselect applicant that are not <b>KTP</b> or <b>REGISTRAR</b>.<br><br>- To reject applicant that are not <b>KTP</b> or <b>REGISTRAR</b>  please use the <b>Reject</b> button.',
							type: 'red'
						});
						return;
					}

                    if (checkRemark > 0) {
                        hide_loading();
						$.alert({
							title: 'Alert!',
							content: 'Please enter a remark on each selected applicant.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejKtpRegApplicant')?>',
						data: {'refid' : refid, 'staffID' : staffIDArr, 'remark' : remarkArr},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
                                hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
                                });
                                
                                $('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();
                                $('#history').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click History button from Staff List tab</th></tr></thead></table></p>').show();
                                
                                // REFRESH STAFF LIST
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('trStaffList')?>',
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
		            $.alert('Training Application (Reject - KTP / REGISTRAR) cancelled!');
		        }
		    }
		});
    });
    

    /*===========================================================
       TAB 3 - DETAILS
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
       TAB 4 - HISTORY
    =============================================================*/

    // TRAINING DETAILS
	$('#history').on('click','.tr_detl_btn', function() {
        var thisBtn = $(this);
        var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
        var title = td.eq(1).html().trim();

        $('.nav-tabs li:eq(2) a').tab('show');

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