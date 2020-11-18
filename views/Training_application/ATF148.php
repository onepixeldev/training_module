<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF148 - Confirmation Attend Training</h2>				
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
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff Training Applications</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Service Book</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Training List (History)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Training Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Training Cost</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">Target Group & Module Detail</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s8" data-toggle="tab" aria-expanded="false">CPD Detail</a>
                                </li>
								<!--<li class="">
                                    <a style="color:#000 !important" href="#s9" data-toggle="tab" aria-expanded="false">Update CPD Info</a>
                                </li>--> 
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list">
                                        <div class="text-center" id="loader">
										</div>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
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
                                </div>

                                <div class="tab-pane fade" id="s5">
									<div id="training_list_detl">
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

								<div class="tab-pane fade" id="s6">
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
                                </div>

								<div class="tab-pane fade" id="s8">
									<div id="training_list_detl4">
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

								<!--<div class="tab-pane fade" id="s9">
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
	var tr_row = '';
    
	var intExt = '1';
	var disDept = '1';
	var disYear = '1';
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
			} elseif ($currtab == 's5'){
				echo "$('.nav-tabs li:eq(4) a').tab('show');";
			} elseif ($currtab == 's6'){
				echo "$('.nav-tabs li:eq(5) a').tab('show');";
			} elseif ($currtab == 's7'){
				echo "$('.nav-tabs li:eq(6) a').tab('show');";
			} elseif ($currtab == 's8'){
				echo "$('.nav-tabs li:eq(7) a').tab('show');";
			} elseif ($currtab == 's9'){
				echo "$('.nav-tabs li:eq(8) a').tab('show');";
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
		url: '<?php echo $this->lib->class_url('getTrainingList')?>',
		data: {'intExt' : intExt, 'disDept' : disDept, 'disYear' : disYear},
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
                                //$('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs cpd_pts_btn"><i class="fa fa-calculator"></i> CPD Point</button>');
								$('#tbl_tr_list tbody .postpone_training_btn').replaceWith('<button type="button" class="btn btn-warning btn-xs svc_book_btn"><i class="fa fa-upload"></i> Service Book</button>');
								$('#tbl_tr_list tbody .approve_training_btn').hide();
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
			url: '<?php echo $this->lib->class_url('getTrainingList')?>',
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
                                    //$('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs cpd_pts_btn"><i class="fa fa-calculator"></i> CPD Point</button>');
                                    $('#tbl_tr_list tbody .postpone_training_btn').replaceWith('<button type="button" class="btn btn-warning btn-xs svc_book_btn"><i class="fa fa-upload"></i> Service Book</button>');
									$('#tbl_tr_list tbody .approve_training_btn').hide();
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
	$('#training_list').on('click','.select_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(2).html().trim();
		//var scCode = 'ATF002';
		//alert(refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffTrainingApplicationConf')?>',
			data: {'refid' : trRefID, 'tName' : trainingN},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_training_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#staff_training_application').html(res);
				$('#training_list_staff').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff History from Staff Training Applications</th></tr></thead></table></p>');
				$('#staff_training_svc_book').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select Service Book from Training List</th></tr></thead></table></p>');
				
				tr_row = $('#tbl_list_sta').DataTable({
					"ordering":false,
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('editTraining')?>',
					data: {'refID' : trRefID},
					beforeSend: function() {
						$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl').html(res);

						$('.modal-header').hide();
						$('#alert').hide();
						$('.field_inpt').prop("disabled", true);
						$('.save_upd_tr_info').hide();
						$('#search_str_tr_ver').hide();
						$('#toggleClear').prop("disabled", true);
						$('#toggleClear2').prop("disabled", true);
				
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('speakerInfo')?>',
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
							url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
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
							url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
							data: {'trRefID' : trRefID},
							dataType: 'JSON',
							success: function(res) {
								if(res.sts == 1) {
									$.ajax({
										type: 'POST',
										url: '<?php echo $this->lib->class_url('trainingCost')?>',
										data: {'trRefID' : trRefID, 'tName' : trainingN},
										beforeSend: function() {
											$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
										},
										success: function(res) {
											$('#training_list_detl2').html(res);
										}
									});
								} else {
									$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
								};
							}
						});
					
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('targetGroup')?>',
							data: {'trRefID' : trRefID, 'tName' : trainingN},
							beforeSend: function() {
								$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list_detl3').html(res);
								$('.add_tg').hide();
								$('.del_tg_btn').hide();

								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('moduleSetup')?>',
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
							url: '<?php echo $this->lib->class_url('cpdSetup')?>',
							data: {'tsRefID' : trRefID, 'tName' : trainingN},
							beforeSend: function() {
								$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list_detl4').html(res);
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
			}
		});
    });	
    
    // LIST OF ELIGIBLE POSITION //
	$('#training_list_detl3').on('click', '.pos_tg_btn', function() {
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
			url: '<?php echo $this->lib->class_url('listEgPosition')?>',
			data: {'gpCode' : gpCode},
			success: function(res) {
				$('#myModalis .modal-content').html(res);	
				$('#postAction').hide();
				$('#tbl_list_eg_pos tbody #postAction').hide();
				$('.add_eg_position_btn').hide();
			}
		});
	});
    
	// TRAINING LIST - HISTORY
	$('#staff_training_application').on('click','.sta_history_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		// alert(stfID);
		// alert(stfName);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('trainingListStaff')?>',
			data: {'stfID' : stfID, 'stfName' : stfName},
			beforeSend: function() {
				$('.nav-tabs li:eq(3) a').tab('show');
				$('#training_list_staff').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#training_list_staff').html(res);
				tr_row = $('#tr_list_stf').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// APPLICATION DETAILS 
	$('#training_list_staff').on('click', '.stf_tr_btn', function() {
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
			url: '<?php echo $this->lib->class_url('applicationDetail')?>',
			data: {'refid' : refid, 'stfID' : stfID},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// TRAINING DETAIL TRAINING_LIST_STAFF
	$('#training_list_staff').on('click','.tr_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(1).html().trim();
		//var scCode = '1';
		//alert(trRefID);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			//data: {'refID' : trRefID, 'scCode' : scCode},
			data: {'refID' : trRefID},
			beforeSend: function() {
				$('.nav-tabs li:eq(4) a').tab('show');
				$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#training_list_detl').html(res);

				$('.modal-header').hide();
				$('#alert').hide();
				$('.field_inpt').prop("disabled", true);
				$('.save_upd_tr_info').hide();
				$('#search_str_tr_ver').hide();
		
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('speakerInfo')?>',
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
					url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
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
					url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
					data: {'trRefID' : trRefID},
					dataType: 'JSON',
					success: function(res) {
						if(res.sts == 1) {
							$.ajax({
								type: 'POST',
								url: '<?php echo $this->lib->class_url('trainingCost')?>',
								data: {'trRefID' : trRefID, 'tName' : trainingN},
								beforeSend: function() {
									$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								},
								success: function(res) {
									$('#training_list_detl2').html(res);
								}
							});
						} else {
							$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
						};
					}
				});
			
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl3').html(res);
						$('.add_tg').hide();
						$('.del_tg_btn').hide();

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('moduleSetup')?>',
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
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl4').html(res);
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

	// AUTO CONFIRMATION
	$('#staff_training_application').on('click','.auto_conf_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid =  $('.auto_conf_btn').val();
		var trainingN =  thisBtn.data("tr-name");
		var staffIDArr = []; 
		var selectedID = 0;
		var EmptyText = 0;

		$.confirm({
		    title: 'Auto Confirm Attendance',
		    content: 'This process is used if applicant did not take action regarding on course attendance.<br><br>Press YES to confirm',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						stfID = $(this).closest("tr").find(".sid").text();
						attConf = $(this).closest("tr").find(".attend").text();
						++selectedID;
						
						if (attConf != '') {
							EmptyText = 3;
						} 
						//alert(stfID);
						staffIDArr.push(stfID);
					});
					//alert(staffIDArr);

					if (selectedID == 0) {
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					if (EmptyText == 3) {
						$.alert({
							title: 'Alert!',
							content: 'Please select record with <font color="blue">BLUE</font> color only',
							type: 'red'
						});
						return;
					}

					$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('autoAttendConfirmation')?>',
							data: {'stfID' : staffIDArr, 'refid' : refid},
							dataType: 'JSON',
							beforeSend: function() {
								$('.nav-tabs li:eq(1) a').tab('show');
								$('.btn').attr('disabled', 'disabled');
								$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								if (res.sts==1) {
									$.alert({
										title: 'Success!',
										content: res.msg,
										type: res.alert,
									});

									$.ajax({
										type: 'POST',
										url: '<?php echo $this->lib->class_url('getStaffTrainingApplicationConf')?>',
										data: {'refid' : refid, 'tName' : trainingN},
										beforeSend: function() {
											$('#staff_training_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
										},
										success: function(res) {
											$('#staff_training_application').html(res);
											
											tr_row = $('#tbl_list_sta').DataTable({
												"ordering":false,
											});
										}
									});
								} else {
									$.alert({
										title: 'Alert!',
										content: res.msg,
										type: 'red',
									});
								}
							},
							complete: function(){
								$('.btn').removeAttr('disabled');
								$('#loader').hide();
							}
					});		
		        },
		        cancel: function () {
		            $.alert('Auto Confirm Attendance has been cancelled!');
		        }
		    }
		});
	});

	// APPLICANT OTHER DETAILS 
	$('#staff_training_application').on('click', '.detl_conf_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		var refid =  thisBtn.val();
		//alert(stfID+stfName+refid);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('applicantOtherDetl')?>',
			data: {'refid' : refid, 'stfID' : stfID, 'stfName' : stfName},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// EDIT APPLICANT DETAILS 
	$('#staff_training_application').on('click', '.edit_app_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		var refid =  thisBtn.val();
		//alert(stfID+stfName+refid);

		srow = $(this).closest("tr");

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editApplicantDetails')?>',
			data: {'refid' : refid, 'stfID' : stfID, 'stfName' : stfName},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE APPLICANT DETAILS
	$('#myModalis2').on('click', '.upd_app_oth_detl', function (e) { 
		e.preventDefault();
        var data = $('#formUpdAppOthDetl').serialize();
		msg.wait('#alertAppOthDetl');
		// alert(data);
		$('.btn').attr('disabled', 'disabled');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateApplicantDetails')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertAppOthDetl');
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						srow.find(".attend").html(res.attend_field);
						srow.find(".sid").html(res.staff_id);
						$("#summary").html(res.summary);
						$('.btn').removeAttr('disabled');
					}, 1500);
					//$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertAppOthDetl');
			}
		});	
    });

	// RESEND EMAIL MODAL 
	$('#staff_training_application').on('click', '.resend_email_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid =  $('.auto_conf_btn').val();
		var trainingN =  thisBtn.data("tr-name");
		var staffIDArr = []; 
		var selectedID = 0;
		var EmptyText = 0;
		//alert(trainingN);

		$.confirm({
		    title: 'Resend Email',
		    content: 'Resend Email is used if there are any amendments to the course date, time or venue.<br><br>Press YES to confirm',
			type: 'red',
		    buttons: {
		        yes: function () {
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						stfID = $(this).closest("tr").find(".sid").text();
						attConf = $(this).closest("tr").find(".attend").text();
						++selectedID;
						
						//alert(stfID);
						staffIDArr.push(stfID);
					});
					
					//alert(staffIDArr);

					if (selectedID == 0) {
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('resendEmailApplicantDetl')?>',
						data: {'stfID' : staffIDArr, 'refid' : refid},
						dataType: 'JSON',
						beforeSend: function() {
							//$('.nav-tabs li:eq(1) a').tab('show');
							$('.btn').attr('disabled', 'disabled');
							$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						},
						success: function(res) {
							var from = res.from;
							var staffNameArr = res.staffNameArr;
							var staffEmailArr = res.staffEmailArr;

							var staffIDCCArr = res.staffIDCCArr;
							var staffNameCCArr = res.staffNameCCArr;
							var staffEmailCCArr = res.staffEmailCCArr;

							var msg_title = res.msg_title;
							var msg_content = res.msg_content;


							$('#myModalis .modal-content').empty();
							$('#myModalis').modal('show');
							$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
						
							$.ajax({
								type: 'POST',
								url: '<?php echo $this->lib->class_url('emailForm')?>',
								data: {'refid' : refid},
								success: function(res) {
									$('#myModalis .modal-content').html(res);
									
									$('#myModalis #from').val(from);
									$('#myModalis #sit').val(staffIDArr);
									$('#myModalis #nameTo').val(staffNameArr);
									$('#myModalis #emailTo').val(staffEmailArr);
									$('#myModalis #staffIDcc').val(staffIDCCArr);
									$('#myModalis #staffNamecc').val(staffNameCCArr);
									$('#myModalis #emailCC').val(staffEmailCCArr);
									$('#myModalis #emailTitle').val(msg_title);
									$('#myModalis #emailContent').val(msg_content);
								}
							});

							$('.btn').removeAttr('disabled');
							$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Resend email has been cancelled!');
		        }
		    }
		});
	});

	// RESEND EMAIL
	$('#myModalis').on('click', '.resend_email_btn_mdl', function (e) { 
		e.preventDefault();
        var data = $('#resendEmailForm').serialize();
		var emailTo = $('#emailTo').val();
		var emailTitle = $('#emailTitle').val();
		var emailContent = $('#emailContent').val();
		msg.wait('#resendEmailAlert');
		msg.wait('#resendEmailAlertFooter');
		//alert(emailTo);
		
		
		if(emailTo == '') {
			msg.danger('Email To field is empty', '#resendEmailAlert');
			msg.danger('Email To field is empty', '#resendEmailAlertFooter');
			return;
		}

		if(emailTitle == '') {
			msg.warning('Please fill in <b>Title</b>', '#resendEmailAlert');
			msg.warning('Please fill in <b>Title</b>', '#resendEmailAlertFooter');
			return;
		}

		if(emailContent == '') {
			msg.warning('Please fill in <b>Content</b>', '#resendEmailAlert');
			msg.warning('Please fill in <b>Content</b>', '#resendEmailAlertFooter');
			return;
		}
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('resendEmail2')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				if (res.sts == 1) {
					$.alert({
						title: 'Success!',
						content: res.msg,
						type: res.alert,
					});
					msg.success('Email has been sent', '#resendEmailAlert');
					msg.success('Email has been sent', '#resendEmailAlertFooter');
					$('.btn').removeAttr('disabled');
				} else {
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: res.alert,
					});
					msg.success('Fail to send email', '#resendEmailAlert');
					msg.success('Fail to send email', '#resendEmailAlertFooter');
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertAppOthDetl');
			}
		});	
    });

	// PRINT OFFER MEMO MODAL
	$('#staff_training_application').on('click', '.print_offer_mem_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		var refid =  thisBtn.val();
		//alert(stfID+stfName+refid);

		srow = $(this).closest("tr");

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('printOfferMemo')?>',
			data: {'refid' : refid, 'stfID' : stfID, 'stfName' : stfName},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// CHANGE MONTH OR YEAR
	$('#myModalis').on('change', '.monYerFilter', function () { 
		var month =  $('#monthFil').val();
		var year =  $('#yearFil').val();
		//alert(month+year);

		$('#loaderMdl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#courseTitle').html('');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('ddTrainingList')?>',
			data: {'month' : month, 'year' : year},
			dataType: 'JSON',
			success: function(res) {
				$('#loaderMdl').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.ddTrList) {
						resList += '<option value="'+res.ddTrList[i]['TH_REF_ID']+'">'+res.ddTrList[i]['TH_TRAINING_TITLE']+'</option>';
                    }
                } 
				
				$("#courseTitle").html(resList);				
			}
		});
    });

	// CHANGE TRAINING
	$('#myModalis').on('change', '#courseTitle', function () { 
		var refid =  $('#courseTitle').val();
		//alert(refid);
		
		$('#courseRefID').val(refid);
		$('#loaderMdl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		$('#sendDate').html('');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getSendDate')?>',
			data: {'refid' : refid},
			dataType: 'JSON',
			success: function(res) {
				$('#loaderMdl2').html('');
				
				var resList = '<option value="" selected > ---Please select--- </option>';
				
                if (res.sts == 1) {
                    for (var i in res.sendDateList) {
						resList += '<option value="'+res.sendDateList[i]['SEND_DATE']+'">'+res.sendDateList[i]['SEND_DATE']+'</option>';
                    }
                } 
				
				$("#sendDate").html(resList);				
			}
		});
    });

	// PRINT OFFER MEMO
	$('#myModalis').on('click', '.print_mem_btn', function () { 
		//alert('test');
		var refid =  $('#courseTitle').val();
		var sendDate =  $('#sendDate').val();
		var refNo =  $('#refNo').val();
		var repCode = 'ATR250';

		if(refid == '') {
			msg.warning('Please select Course Title', '#printOfferMemoAlert');
			return;
		}

		if(refNo == '') {
			msg.warning('Please fill in Referrence No.', '#printOfferMemoAlert');
			return;
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'refid' : refid, 'sendDate' : sendDate, 'refNo' : refNo,'repCode':repCode},
			dataType: 'JSON',
			beforeSend: function() {
				msg.wait('#printOfferMemoAlert');
				$('.btn').attr('disabled', 'disabled');
			},
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
				msg.success('Memo has been generated.', '#printOfferMemoAlert');
				$('.btn').removeAttr('disabled');			
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#printOfferMemoAlert');
			}
		});
    });

	// SERVICE BOOK - ATF118
	$('#training_list').on('click','.svc_book_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(2).html().trim();
		//var scCode = 'ATF002';
		//alert(refid);
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('verifySvcBook')?>',
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
					// $.alert({
					// 	title: 'Success!',
					// 	content: res.msg,
					// 	type: res.alert,
					// });
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('ATF118')?>',
						data: {'refid' : trRefID, 'tName' : trainingN},
						beforeSend: function() {
							$('.nav-tabs li:eq(2) a').tab('show');
							$('#staff_training_svc_book').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						},
						success: function(res) {
							$('#staff_training_svc_book').html(res);
							tr_row = $('#tbl_list_sta_svc_book').DataTable({
								"ordering":false,
							});
							$('#training_list_detl').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List or Training List (History)</th></tr></thead></table></p>');
							$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List or Training List (History)</th></tr></thead></table></p>');
							$('#training_list_detl3').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List or Training List (History)</th></tr></thead></table></p>');
							$('#training_list_detl4').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List or Training List (History)</th></tr></thead></table></p>');
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

	// TRAINING DETL
	$('#staff_training_svc_book').on('click','.tr_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(1).html().trim();
		//var scCode = '1';
		//alert(trRefID);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refID' : trRefID},
			beforeSend: function() {
				$('.nav-tabs li:eq(4) a').tab('show');
				$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#training_list_detl').html(res);

				$('.modal-header').hide();
				$('#alert').hide();
				$('.field_inpt').prop("disabled", true);
				$('.save_upd_tr_info').hide();
				$('#search_str_tr_ver').hide();
		
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('speakerInfo')?>',
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
					url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
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
					url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
					data: {'trRefID' : trRefID},
					dataType: 'JSON',
					success: function(res) {
						if(res.sts == 1) {
							$.ajax({
								type: 'POST',
								url: '<?php echo $this->lib->class_url('trainingCost')?>',
								data: {'trRefID' : trRefID, 'tName' : trainingN},
								beforeSend: function() {
									$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								},
								success: function(res) {
									$('#training_list_detl2').html(res);
								}
							});
						} else {
							$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
						};
					}
				});
			
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl3').html(res);
						$('.add_tg').hide();
						$('.del_tg_btn').hide();

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('moduleSetup')?>',
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
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl4').html(res);
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

	// SERVICE BOOK - ATF118

	// Select all record	
	$('#staff_training_application').on('click','.select_all_btn', function() {
		$(".checkitem").prop('checked', true);
	});	

	// Unselect all record	
	$('#staff_training_application').on('click','.unselect_all_btn', function() {
		$(".checkitem").prop('checked', false);
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
				$('.nav-tabs li:eq(8) a').tab('show');
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
								$('.nav-tabs li:eq(8) a').tab('show');
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