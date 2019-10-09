<?php echo $this->lib->title('CPD / CPD Report Submission', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF103 - CPD Report Submission</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Report Submission</a>
                                </li>
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
												<label><b>Reference ID / Title</b></label>
											</div>
										</div>
										<div class="col-md-6">
											<input name="" placeholder="Reference ID/Title" class="form-control" type="text" id="refidTitle">
										</div>
										<button type="button" class="btn btn-primary search_refid_title_btn"><i class="fa fa-search"></i> Search</button>
									</div>

									<div class="row">
										<div class="col-sm-3 text-right"></div>
										<div class="col-sm-3 text-right" id="loaderCRS">
										</div>
									</div>

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
									<div id="report_submission">
                                        <p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click Detail button from Staff List tab</th>
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
	TAB 1 - TRAINING LIST
    -----------------------------*/

    // Select all record	
	$('#training_list').on('click','.select_all_btn', function() {
		$(".chkRefid").prop('checked', true);
	});	

	// Unselect all record	
	$('#training_list').on('click','.unselect_all_btn', function() {
		$(".chkRefid").prop('checked', false);
	});
    
    var pMonth = 'CURR_M';
    var pYear = 'CURR_Y';

    // POPULATE TRAINING LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList')?>',
		data: {'sMonth' : pMonth, 'sYear' : pYear},
		beforeSend: function() {
			$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);

			ca_row = $('#tbl_tr_list').DataTable({
                "ordering":false,
			});
		}
    });

    // TRAINING LIST FILTER
	$('.listFilter').change(function() {
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		// alert(''+sMonth+',' +sYear);
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#staff_list').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Staff List button from Training List tab</th></tr></thead></table></p>').show();
        $('#report_submission').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Staff List tab</th></tr></thead></table></p>').show();
		
		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getTrainingList')?>',
            data: {'sMonth' : sMonth, 'sYear' : sYear},
            success: function(res) {
                $('#training_list').html(res);

                ca_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
                });
            }
        });
		$('#loaderCRS').hide();
	});

	// SEARCH TRAINING
	$('.search_refid_title_btn').click(function(){
		var thisBtn = $(this);
		var refidTitle = $('#refidTitle').val();
		// alert('TEST');

		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getTrainingList')?>',
            data: {'refid_title' : refidTitle},
            beforeSend: function() {
                $('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$('#staff_list').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Staff List button from Training List tab</th></tr></thead></table></p>').show();
                $('#report_submission').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Staff List tab</th></tr></thead></table></p>').show();
            },
            success: function(res) {
                $('#training_list').html(res);

                ca_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
                });
            },
        });
		$('#loaderCRS').hide();
    });

    // TRAINING DETAILS
    $('#training_list').on('click','.tr_detl_btn',function(){
        $('#tr_detl_in').removeClass('hidden');
		$('html, body').animate({scrollTop: $('#tr_detl_in').position().top}, 'slow');
        
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var trRefID = td.find(".refid").text();
        var trainingN = td.find(".title").text();
        // var trRefID = $('#refid').val();
        // var trainingN = $('#title').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('training/training_application/editTraining')?>',
            //data: {'refID' : trRefID, 'scCode' : scCode},
            data: {'refID' : trRefID},
            beforeSend: function() {
                $('#tr_detl #training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#tr_detl #training_list_detl').html(res);

                $('.modal-header').hide();
                $('#alert').hide();
                $('.field_inpt').prop("disabled", true);
                $('.save_upd_tr_info').hide();
                $('#search_str_tr_ver').hide();
        
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/speakerInfo')?>',
                    data: {'tsRefID' : trRefID},
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
                    data: {'tsRefID' : trRefID},
                    beforeSend: function() {
                        $('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#facilitatorInfo').html(res);
                        $('.add_tr_fi').hide();
                        $('#facilitatorInfo #fiAct').hide();
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/verExternalAgency')?>',
                    data: {'trRefID' : trRefID},
                    dataType: 'JSON',
                    success: function(res) {
                        if(res.sts == 1) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $this->lib->class_url('trainingCost')?>',
                                data: {'trRefID' : trRefID, 'tName' : trainingN},
                                beforeSend: function() {
                                    $('#tr_detl #training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                                },
                                success: function(res) {
                                    $('#tr_detl #training_list_detl2').html(res);
                                }
                            });
                        } else {
                            $('#tr_detl #training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
                        };
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/targetGroup')?>',
                    data: {'trRefID' : trRefID, 'tName' : trainingN},
                    beforeSend: function() {
                        $('#tr_detl #training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#tr_detl #training_list_detl3').html(res);
                        $('.add_tg').hide();
                        $('.del_tg_btn').hide();

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/moduleSetup')?>',
                            data: {'tsRefID' : trRefID},
                            beforeSend: function() {
                                $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#module_setup').html(res);
                                $('#msBTN').hide();
                                $('.edit_ms1_btn').hide();
                                $('.edit_ms2_btn').hide();
                                $('.edit_ms3_btn').hide();
                            }
                        });
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('training/training_application/cpdSetup')?>',
                    data: {'tsRefID' : trRefID, 'tName' : trainingN},
                    beforeSend: function() {
                        $('#tr_detl #training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                    },
                    success: function(res) {
                        $('#tr_detl #training_list_detl4').html(res);
                        $('#cpdBTN').hide();
                        $('.edit_cpd1_btn').hide();
                        $('.edit_cpd2_btn').hide();
                        $('.edit_cpd3_btn').hide();
                        $('.edit_cpd4_btn').hide();
                        $('.edit_cpd5_btn').hide();
                    }
                });
            }
        });
    });

    // LIST OF ELIGIBLE POSITION 
    $('#training_list').on('click', '.pos_tg_btn', function() {
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

    // STAFF LIST
    $('#training_list').on('click','.staff_list_btn',function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
        var trainingN = td.find(".title").text();

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getStaffTrainingList')?>',
            data: {'refid' : refid, 'trainingN' : trainingN},
            beforeSend: function() {
                $('.nav-tabs li:eq(1) a').tab('show');
                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#staff_list').html(res);

                ca_row = $('#tbl_stf_list').DataTable({
                    "ordering":false,
                });
            },
        });
    });

    // APPROVE BY TRAINING
	$('#training_list').on('click','.approve_by_training', function(e){
		e.preventDefault();

		var refidArr = [];
		
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Approve by training?',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
                    show_loading();

					$('.btn').attr('disabled', 'disabled');

					$('.chkRefid:checked').each(function() {
						// check the checked property 
						refid = $(this).val();
						++selectedID;

						refidArr.push(refid);
					});

					if (selectedID == 0) {
                        hide_loading();
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
						url: '<?php echo $this->lib->class_url('approveRepByTr')?>',
						data: {'refidArr' : refidArr},
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
                                
                                $('#staff_list').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Staff List button from Training List tab</th></tr></thead></table></p>').show();
                                $('#report_submission').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Staff List tab</th></tr></thead></table></p>').show();
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

	// ENTER BUTTON NOT ALLOWED
	$('#refidTitle').keyup(function (e) {
		if (e.keyCode === 13) {
            e.preventDefault();
			$('#loaderCRS').show();
			msg.show('Enter button are not allowed', 'warning', '#loaderCRS');
			return;
        }
	});

	/*-----------------------------
	TAB 2 - TRAINING STAFF LIST 
    -----------------------------*/

    // STAFF LIST STATUS FILTER
    $('#staff_list').on('change','#sStatus',function(){
		var refid = $("#refid").val();
        var trainingN = $("#title").val();
        var status = $("#sStatus").val();

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getStaffTrainingList')?>',
            data: {'refid' : refid, 'trainingN' : trainingN, 'status' : status},
            beforeSend: function() {
                $('.nav-tabs li:eq(1) a').tab('show');
                $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                $('#report_submission').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Staff List tab</th></tr></thead></table></p>').show();
            },
            success: function(res) {
                $('#staff_list').html(res);

                ca_row = $('#tbl_stf_list').DataTable({
                    "ordering":false,
                });
            },
        });
    });

    // PRINT
	$('#staff_list').on('click','.print_rep', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var refid = $("#refid").val();
		var repCode = 'ATR115';
        show_loading();

        // VALIDATE PRINT REPORT
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('validateReportSub')?>',
            data: {'refid' : refid, 'staff_id' : staff_id},
            dataType: 'JSON',
            success: function(res) {
                hide_loading();

                if(res.sts == 1) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $this->lib->class_url('setRepParam')?>',
                        data: {'staff_id':staff_id, 'refid':refid, 'repCode':repCode},
                        dataType: 'JSON',
                        success: function(res) {
                            window.open("report?r="+res.report,"mywin","width=800,height=600");
                        }
                    });
                } else {
                    $.alert({
                        title: 'Alert!',
                        content: res.msg,
                        type: 'red',
                    });
                }
            }
        })
	});

    // REPORT SUBMISSION DETL
    $('#staff_list').on('click','.rep_sub_detl',function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
        var staff_id = td.find(".staff_id").text();
        var staff_name = td.find(".staff_name").text();
		var refid = $("#refid").val();
        var trainingN = $("#title").val();

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getReportSubDetl')?>',
            data: {'staff_id' : staff_id, 'staff_name' : staff_name, 'refid' : refid, 'trainingN' : trainingN},
            beforeSend: function() {
                $('.nav-tabs li:eq(2) a').tab('show');
                $('#report_submission').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#report_submission').html(res);
            },
        });
    });

    // APPROVE BY STAFF
	$('#staff_list').on('click','.approve_by_staff', function(e){
		e.preventDefault();
        
        var refid = $('#refid').val();
        var trainingN = $("#title").val();
        var status = $("#sStatus").val();
		var sidArr = [];
		
		var selectedID = 0;
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Approve by staff?',
		    content: 'Press <b>YES</b> to continue',
			type: 'blue',
		    buttons: {
		        yes: function () {
                    show_loading();

					$('.btn').attr('disabled', 'disabled');

					$('.chkStaffId:checked').each(function() {
						// check the checked property 
						staff_id = $(this).closest('tr').find(".staff_id").text();
						++selectedID;

						sidArr.push(staff_id);
					});

					if (selectedID == 0) {
                        hide_loading();
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
						url: '<?php echo $this->lib->class_url('approveRepByStf')?>',
						data: {'refid' : refid, 'sidArr' : sidArr},
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

                                // REFRESH
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('getStaffTrainingList')?>',
                                    data: {'refid' : refid, 'trainingN' : trainingN, 'status' : status},
                                    beforeSend: function() {
                                        $('.nav-tabs li:eq(1) a').tab('show');
                                        $('#staff_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                                    },
                                    success: function(res) {
                                        $('#staff_list').html(res);

                                        ca_row = $('#tbl_stf_list').DataTable({
                                            "ordering":false,
                                        });
                                    },
                                });

                                $('#report_submission').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Staff List tab</th></tr></thead></table></p>').show();
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

    // Select all record	
	$('#staff_list').on('click','.select_all_btn', function() {
		$(".chkStaffId").prop('checked', true);
	});	

	// Unselect all record	
	$('#staff_list').on('click','.unselect_all_btn', function() {
		$(".chkStaffId").prop('checked', false);
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