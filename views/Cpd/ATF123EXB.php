<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF123 - Update CPD Info</h2>				
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
										<?php echo form_dropdown('sDept', $dept_list, $curUsrDept, 'class="form-control listFilter" id="sDept"'); ?>
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
										<?php echo form_dropdown('sMonth', $month_list, $defMonth, 'class="form-control listFilter" id="sMonth"'); ?>
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
										<?php echo form_dropdown('sYear', $year_list, $curYear, 'class="form-control listFilter" id="sYear"'); ?>
									</div>
								</div>
							</div>
                            

                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
                                <!--<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff Training Applications</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Service Book</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Training List (History)</a>
                                </li>-->
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Training Info</a>
                                </li>
								<!--<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Training Cost</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">Target Group & Module Detail</a>
                                </li>-->
								<li class="hidden">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">CPD Detail</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Update CPD Info</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list">
                                        <div class="text-center" id="loader">
										</div>
									</div>
                                </div>

                                <!--<div class="tab-pane fade" id="s2">
									<div id="staff_training_application">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="staff_training_svc_book">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select Service Book from Training List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="training_list_staff">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff History from Staff Tranining Application</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>-->

                                <div class="tab-pane fade" id="s2">
									<div id="detail">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<!--<div class="tab-pane fade" id="s6">
									<div id="training_list_detl2">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training List or Training List (History)</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s7">
									<div id="training_list_detl3">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training List or Training List (History)</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>-->

								<div class="hidden tab-pane fade" id="s3">
									<div id="training_list_detl4">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
									<div id="update_cpd_info">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select CPD Point from Training List</th>
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
    
	var sYear = $('#sYear').val();
	var sDept = $('#sDept').val();
	var sMonth = $('#sMonth').val();
	//var dt_row2 = '';
	
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
        if (!empty($currtab)) {
            if ($currtab == 's2'){
                echo "$('.nav-tabs li:eq(1) a').tab('show');";
            } elseif ($currtab == 's3'){
				echo "$('.nav-tabs li:eq(2) a').tab('show');";
			} elseif ($currtab == 's4'){
				echo "$('.nav-tabs li:eq(3) a').tab('show');";
			} 
            else {
                echo "$('.nav-tabs li:eq(0) a').tab('show');";
            }
		}
        ?>
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // POPULATE TRAINING LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList6')?>',
		data: {'sYear' : sYear, 'sDept' : sDept, 'sMonth' : sMonth},
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);
			tr_row = $('#tbl_tr_list').DataTable({
                "ordering":false,
                drawCallback: function(){
                    $(function() {
                        $('#tbl_tr_list').each(function() {
                        var Cell = $(this).find('td:eq(5)');
                        //debugger;
                            if (Cell.text() !== 'error') {
                                //$(this).find('btn').hide();
                                $('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs cpd_pts_btn"><i class="fa fa-calculator"></i> CPD Point</button>');
								//$('#tbl_tr_list tbody .postpone_training_btn').replaceWith('<button type="button" class="btn btn-warning btn-xs svc_book_btn"><i class="fa fa-upload"></i> Service Book</button>');
								$('#tbl_tr_list tbody .postpone_training_btn').hide();
                                $('#tbl_tr_list tbody .reject_training_btn').hide();
                                $('#tbl_tr_list tbody .amend_training_btn').hide();
                            }
                        });
                    });
                }
            });
			$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-4">Action</th>');
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// TRAINING LIST FILTER
	$('.listFilter').change(function() {
		var intExt = '1';
		var sDept = $('#sDept').val();
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		//alert(''+sDept+',' +sMonth+''+sYear+'');
		
		$('.nav-tabs li:eq(0) a').tab('show');
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getTrainingList6')?>',
			data: {'intExt' : intExt, 'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear},
			success: function(res) {
				$('#training_list').html(res);
				tr_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_tr_list').each(function() {
                            var Cell = $(this).find('td:eq(5)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    //$(this).find('btn').hide();
                                    $('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs cpd_pts_btn"><i class="fa fa-calculator"></i> CPD Point</button>');
									//$('#tbl_tr_list tbody .postpone_training_btn').replaceWith('<button type="button" class="btn btn-warning btn-xs svc_book_btn"><i class="fa fa-upload"></i> Service Book</button>');
									$('#tbl_tr_list tbody .postpone_training_btn').hide();
                                    $('#tbl_tr_list tbody .reject_training_btn').hide();
                                    $('#tbl_tr_list tbody .amend_training_btn').hide();
                                }
                            });
                        });
                    }
				});
                $('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-4">Action</th>');
			}
		});
    });
    
    // SELECT TRAINING BTN
	// $('#training_list').on('click','.select_training_btn', function(){
	// 	var thisBtn = $(this);
	// 	var td = thisBtn.parent().siblings();
	// 	var trRefID = td.eq(0).html().trim();
	// 	var trainingN = td.eq(2).html().trim();
	// 	//var scCode = 'ATF002';
		
	// 	$('.nav-tabs li:eq(1) a').tab('show');

	// 	$('#update_cpd_info').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select CPD Point from Training List</th></tr></thead></table></p>');

	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('../training_application/editTraining')?>',
	// 		data: {'refID' : trRefID},
	// 		beforeSend: function() {
	// 			$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 		},
	// 		success: function(res) {
	// 			$('#training_list_detl').html(res);

	// 			$('.modal-header').hide();
	// 			$('#alert').hide();
	// 			$('.field_inpt').prop("disabled", true);
	// 			$('.save_upd_tr_info').hide();
	// 			$('#search_str_tr_ver').hide();
	// 			$('#toggleClear').prop("disabled", true);
	// 			$('#toggleClear2').prop("disabled", true);
		
	// 			$.ajax({
	// 				type: 'POST',
	// 				url: '<?php echo $this->lib->class_url('../training_application/speakerInfo')?>',
	// 				data: {'tsRefID' : trRefID},
	// 				beforeSend: function() {
	// 					$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 				},
	// 				success: function(res) {
	// 					$('#speakerInfo').html(res);
	// 					$('.add_tr_sp').hide();
	// 					$('#speakerInfo #spAct').hide();
	// 				}
	// 			});

	// 			$.ajax({
	// 				type: 'POST',
	// 				url: '<?php echo $this->lib->class_url('../training_application/facilitatorInfo')?>',
	// 				data: {'tsRefID' : trRefID},
	// 				beforeSend: function() {
	// 					$('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 				},
	// 				success: function(res) {
	// 					$('#facilitatorInfo').html(res);
	// 					$('.add_tr_fi').hide();
	// 					$('#facilitatorInfo #fiAct').hide();
	// 				}
	// 			});

	// 			/*$.ajax({
	// 				type: 'POST',
	// 				url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
	// 				data: {'trRefID' : trRefID},
	// 				dataType: 'JSON',
	// 				success: function(res) {
	// 					if(res.sts == 1) {
	// 						$.ajax({
	// 							type: 'POST',
	// 							url: '<?php echo $this->lib->class_url('trainingCost')?>',
	// 							data: {'trRefID' : trRefID, 'tName' : trainingN},
	// 							beforeSend: function() {
	// 								$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 							},
	// 							success: function(res) {
	// 								$('#training_list_detl2').html(res);
	// 							}
	// 						});
	// 					} else {
	// 						$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
	// 					};
	// 				}
	// 			});
			
	// 			$.ajax({
	// 				type: 'POST',
	// 				url: '<?php echo $this->lib->class_url('targetGroup')?>',
	// 				data: {'trRefID' : trRefID, 'tName' : trainingN},
	// 				beforeSend: function() {
	// 					$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 				},
	// 				success: function(res) {
	// 					$('#training_list_detl3').html(res);
	// 					$('.add_tg').hide();
	// 					$('.del_tg_btn').hide();

	// 					$.ajax({
	// 						type: 'POST',
	// 						url: '<?php echo $this->lib->class_url('moduleSetup')?>',
	// 						data: {'tsRefID' : trRefID},
	// 						beforeSend: function() {
	// 							$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 						},
	// 						success: function(res) {
	// 							$('#module_setup').html(res);
	// 							$('#msBTN').hide();
	// 							$('.edit_ms1_btn').hide();
	// 							$('.edit_ms2_btn').hide();
	// 							$('.edit_ms3_btn').hide();
	// 						}
	// 					});
	// 				}
	// 			});*/

	// 			$.ajax({
	// 				type: 'POST',
	// 				url: '<?php echo $this->lib->class_url('../training_application/cpdSetup')?>',
	// 				data: {'tsRefID' : trRefID, 'tName' : trainingN},
	// 				beforeSend: function() {
	// 					$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
	// 				},
	// 				success: function(res) {
	// 					$('#training_list_detl4').html(res);
	// 					$('#cpdBTN').hide();
	// 					$('.edit_cpd1_btn').hide();
	// 					$('.edit_cpd2_btn').hide();
	// 					$('.edit_cpd3_btn').hide();
	// 					$('.edit_cpd4_btn').hide();
	// 					$('.edit_cpd5_btn').hide();
	// 				}
	// 			});
	// 		}
	// 	});
    // });

	// TRAINING DETAILS
    $('#training_list').on('click','.select_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(2).html().trim();
		//var scCode = 'ATF002';
		
		$('.nav-tabs li:eq(1) a').tab('show');

		$('#update_cpd_info').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select CPD Point from Training List</th></tr></thead></table></p>');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('../ext_training_appl/trDetl')?>',
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

	/*-----------------------------
	TAB UPDATE CPD INFO - ATF123
	-----------------------------*/

	// CPD POINT ATF123
	$('#training_list').on('click','.cpd_pts_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();

		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/cpd/ATF123')?>',
			data: {'refid' : refid},
			beforeSend: function() {
				$('.nav-tabs li:eq(3) a').tab('show');
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
								$('.nav-tabs li:eq(3) a').tab('show');
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
</script>