<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Approve Training Application</h2>				
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
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Training List (History)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Training Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Training Cost</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Training Target Group & Module Detail</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">Training CPD Detail</a>
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
									<div id="training_list_staff">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select staff History from Staff Training Applications</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
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

								<div class="tab-pane fade" id="s5">
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

								<div class="tab-pane fade" id="s6">
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

								<div class="tab-pane fade" id="s7">
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
                                $('#tbl_tr_list tbody .approve_training_btn').hide();
                                $('#tbl_tr_list tbody .postpone_training_btn').hide();
                                $('#tbl_tr_list tbody .reject_training_btn').hide();
                                $('#tbl_tr_list tbody .amend_training_btn').hide();
                            }
                        });
                    });
                }
			});
			$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-1">Action</th>');
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
		//alert(''+sDept+',' +sMonth+',' +sYear+','+indf+'');
		
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
									$('#tbl_tr_list tbody .approve_training_btn').hide();
									$('#tbl_tr_list tbody .postpone_training_btn').hide();
									$('#tbl_tr_list tbody .reject_training_btn').hide();
									$('#tbl_tr_list tbody .amend_training_btn').hide();
								}
							});
						});
					}
				});
				$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-1">Action</th>');
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
			url: '<?php echo $this->lib->class_url('getStaffTrainingApplication')?>',
			data: {'refid' : trRefID, 'tName' : trainingN},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_training_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#staff_training_application').html(res);
				$('#training_list_staff').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select staff History from Staff Training Applications</th></tr></thead></table></p>');
				
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

	// APPLICANT DETAIl BTN
	$('#staff_training_application').on('click', '.sta_detl_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var td = thisBtn.parent().siblings();
		var staffID = td.eq(0).html().trim();
		
		//alert(staffID+' '+refid);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('detailSTA')?>',
			data: {'refid' : refid, 'staffID' : staffID},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
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
			}
		});
	});

	// APPROVE & SEND MEMO BTN
	$('#staff_training_application').on('click', '.sta_appsm_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var td = thisBtn.parent().siblings();
		var staffID = td.eq(0).html().trim();
		var staffN = td.eq(1).html().trim();
		var remark = thisBtn.parents('tr').find('[name="remark"]').val();
		
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Approve Applicant',
		    content: 'Press <b>YES</b> to continue <br> Applicant: <b>'+staffID+' - '+staffN+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('sendEmailApplicant')?>',
						data: {'refid' : refid, 'staffID' : staffID, 'remark' : remark},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
	
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('approveStf')?>',
									data: {'refid' : refid, 'staffID' : staffID, 'remark' : remark},
									dataType: 'JSON',
									success: function(res) {
										if (res.sts==1) {
											thisBtn.parents('tr').fadeOut().delay(1000).remove();
											$.alert({
												title: 'Success!',
												content: res.msg,
												type: 'green',
											});
										} else {
											$.alert({
												title: 'Alert!',
												content: res.msg,
												type: 'red',
											});
										}
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
					});			
		        },
		        cancel: function () {
		            $.alert('Training Application (approval & send memo) has been cancelled!');
		        }
		    }
		});
	});

	// REJECT TRAINING
	$('#staff_training_application').on('click', '.sta_reject_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var td = thisBtn.parent().siblings();
		var staffID = td.eq(0).html().trim();
		var staffN = td.eq(1).html().trim();
		var remark = thisBtn.parents('tr').find('[name="remark"]').val();
		
		//alert(remark+' '+refid);

		$.confirm({
		    title: 'Reject Applicant',
		    content: 'Press <b>YES</b> to continue <br> Applicant: <b>'+staffID+' - '+staffN+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejectStf')?>',
						data: {'refid' : refid, 'staffID' : staffID, 'remark' : remark},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
							} else {
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
		            $.alert('Training Application (reject) cancelled!');
		        }
		    }
		});
	});

	// TRAINING LIST - HISTORY
	$('#staff_training_application').on('click','.sta_history_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var stfID = td.eq(0).html().trim();
		var stfName = td.eq(1).html().trim();
		//var scCode = '1';
		//alert(''+stfID+' '+stfName+'');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('trainingListStaff')?>',
			data: {'stfID' : stfID, 'stfName' : stfName},
			beforeSend: function() {
				$('.nav-tabs li:eq(2) a').tab('show');
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

	// SELECT TRAINING BTN - STAFF
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
				$('.nav-tabs li:eq(3) a').tab('show');
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
</script>