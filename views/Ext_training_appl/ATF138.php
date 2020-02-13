<?php echo $this->lib->title('Training / Training Setup for External Agency') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF138 - Training Setup for External Agency</h2>				
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
                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Add/Edit Training Info</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Training Cost</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Target Group & Module Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">CPD Setup</a>
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
									<div id="add_edit_training">	
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="training_cost">
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
									<div id="group_module_setup">
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

								<div class="tab-pane fade" id="s5">
									<div id="cpd_setup">
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
	var dt_row = '';
	
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
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingList')?>',
		data: '',
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
			$('#training_list').html(res);
			dt_row = $('#tbl_list_tl').DataTable({
				"ordering":false,
			});
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// ADD NEW TRAINING TAB
	$('#add_edit_training').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('addTraining')?>',
		data: '',
		success: function(res) {
			$('#add_edit_training').html(res);
		}
    });
    
	// ADD NEW TRAINING 
	$('#training_list').on('click','.add_tr', function(){

		$('#add_edit_training').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('.nav-tabs li:eq(1) a').tab('show');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTraining')?>',
			data: '',
			success: function(res) {
				$('#add_edit_training').html(res);
			}
		});
	});

	// populate state add new training form
	$('#add_edit_training').on('change','#country', function() {
		var countCode = $(this).val();
		$('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#state').html('');
		//alert($countCode);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('stateList')?>',
			data: {'countryCode' : countCode},
			dataType: 'json',
			success: function(res) {
				$('#faspinner').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.stateList) {
						resList += '<option value="'+res.stateList[i]['SM_STATE_CODE']+'">'+res.stateList[i]['SM_STATE_DESC']+'</option>';
					}
				} 
				
				$("#state").html(resList);
			}
		});
	});

	// EVALUATION NOT/REQUIRED
	// $('#add_edit_training').on('change','#evaluation', function() {
	// 	var evaluation = $(this).val();
	// 	$('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

	// 	if(evaluation == 'Y') {
	// 		$('#eva_period').removeClass('hidden');

	// 		$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

	// 		$('#evaPFrom').html('From <b><font color="red">* </font></b>');

	// 		$('#evaPTo').html('To <b><font color="red">* </font></b>');
	// 	} else {
	// 		$('#eva_period').addClass('hidden');

	// 		$('#evaMsg').html('');

	// 		$('#evaPFrom').html('From');

	// 		$('#evaPTo').html('To');
	// 	}
	// 	$('#evaLoader').html('');
	// });
		
	// POPULATE ORGANIZER INFO IN ADD NEW TRAINING FORM
	$('#add_edit_training').on('change', '#orginfo', function() {
		var organizerCode = $(this).val();
		$('#faspinner2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#orgAddress').html('');
		$('#orgPostcode').html('');
		$('#orgCity').html('');
		$('#orgState').html('');
		$('#orgCountry').html('');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('organizerInfo')?>',
			data: {'orgCode' : organizerCode},
			dataType: 'json',
			success: function(res) {
				if (res.sts == 1) {
					$('#faspinner2').html('');
					$('#orgAddress').val(res.orgInfo.TOH_ADDRESS);
					$('#orgPostcode').val(res.orgInfo.TOH_POSTCODE);
					$('#orgCity').val(res.orgInfo.TOH_CITY);
					$('#orgState').val(res.orgInfo.SM_STATE_DESC);
					$('#orgCountry').val(res.orgInfo.CM_COUNTRY_DESC);
				}			
			}
		});
	});

	// SAVE INSERT TRAINING
	$('#add_edit_training').on('click', '.add_tr', function (e) { 
		e.preventDefault();
		var data = $('#addTraining').serialize();
		msg.wait('#alert');
		msg.wait('#alertFooter');
		//alert('TR INFO');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveNewTraining')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alert');
				msg.show(res.msg, res.alert, '#alertFooter');
				
				if (res.sts == 1) {

					setTimeout(function () {
						var refid = res.refid;
						var title = res.title;
						
					    // EDIT TRAINING
						$('#add_edit_training').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						$('.nav-tabs li:eq(1) a').tab('show');

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editTraining')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#add_edit_training').html(res);

								// var evaluation = $("#evaluation").val();
								// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

								// if(evaluation == 'Y') {
								// 	$('#eva_period').removeClass('hidden');

								// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

								// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

								// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
								// } else {
								// 	$('#eva_period').addClass('hidden');
									
								// 	$('#evaMsg').html('');

								// 	$('#evaPFrom').html('From');

								// 	$('#evaPTo').html('To');
								// }
								// $('#evaLoader').html('');
							}
						});

						// TRAINING COST
						$('#training_cost').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingCost')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#training_cost').html(res);
							}
						});

						// TARGET GROUP & MODULE SETUP
						$.ajax({
							type: 'POST',
							url: '<?php echo site_url('training/training_application/targetGroup')?>',
							data: {'trRefID' : refid, 'tName' : title},
							beforeSend: function() {
								$('#group_module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#group_module_setup').html(res);

								$.ajax({
									type: 'POST',
									url: '<?php echo site_url('training/training_application/moduleSetup')?>',
									data: {'tsRefID' : refid},
									beforeSend: function() {
										$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#module_setup').html(res);
										$('.pos_tg_btn').addClass('hidden');
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
								$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#cpd_setup').html(res);
							}
						});


						// POPULATE TRAINING LIST
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingList')?>',
							data: '',
							beforeSend: function() {
								$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list').html(res);
								dt_row = $('#tbl_list_tl').DataTable({
									"ordering":false,
								});
							},
							complete: function(){
								$('#loader').hide();
							},
						});
						
					}, 2000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
				msg.danger('Please contact administrator.', '#alertFooter');
			}
		});	
	});
	
	// EDIT TRAINING
	$('#training_list').on('click','.upd_tr', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();
		
		// EDIT TRAINING
		$('#add_edit_training').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('.nav-tabs li:eq(1) a').tab('show');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refid':refid},
			success: function(res) {
				$('#add_edit_training').html(res);

				// var evaluation = $("#evaluation").val();
				// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

				// if(evaluation == 'Y') {
				// 	$('#eva_period').removeClass('hidden');

				// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

				// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

				// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
				// } else {
				// 	$('#eva_period').addClass('hidden');

				// 	$('#evaMsg').html('');

				// 	$('#evaPFrom').html('From');

				// 	$('#evaPTo').html('To');
				// }
				// $('#evaLoader').html('');
			}
		});

		// TRAINING COST
		$('#training_cost').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('trainingCost')?>',
			data: {'refid':refid},
			success: function(res) {
				$('#training_cost').html(res);
			}
		});

		// TARGET GROUP & MODULE SETUP
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/targetGroup')?>',
			data: {'trRefID' : refid, 'tName' : title},
			beforeSend: function() {
				$('#group_module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#group_module_setup').html(res);

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('training/training_application/moduleSetup')?>',
					data: {'tsRefID' : refid},
					beforeSend: function() {
						$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#module_setup').html(res);
						$('.pos_tg_btn').addClass('hidden');
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
				$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#cpd_setup').html(res);
			}
		});

	});

	// FILE ATTACHMENT
	$('#add_edit_training').on('click','.file_att', function(){
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

	// SAVE EDIT TRAINING
	$('#add_edit_training').on('click', '.save_upd_tr', function (e) { 
		e.preventDefault();
		var data = $('#editTraining').serialize();
		msg.wait('#alert');
		msg.wait('#alertFooter');
		//alert('TR INFO');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditTraining')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alert');
				msg.show(res.msg, res.alert, '#alertFooter');
				
				if (res.sts == 1) {

					setTimeout(function () {
						var refid = res.refid;
						var title = res.title;

						$('.nav-tabs li:eq(1) a').tab('show');

						// POPULATE TRAINING LIST
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingList')?>',
							data: '',
							beforeSend: function() {
								$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list').html(res);
								dt_row = $('#tbl_list_tl').DataTable({
									"ordering":false,
								});
							},
							complete: function(){
								$('#loader').hide();
							},
						});
						
						// EDIT TRAINING
						$('#add_edit_training').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editTraining')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#add_edit_training').html(res);

								// var evaluation = $("#evaluation").val();
								// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

								// if(evaluation == 'Y') {
								// 	$('#eva_period').removeClass('hidden');

								// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

								// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

								// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
								// } else {
								// 	$('#eva_period').addClass('hidden');
									
								// 	$('#evaMsg').html('');

								// 	$('#evaPFrom').html('From');

								// 	$('#evaPTo').html('To');
								// }
								// $('#evaLoader').html('');
							}
						});

						// TRAINING COST
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingCost')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#training_cost').html(res);
							}
						});

						// TARGET GROUP & MODULE SETUP
						$.ajax({
							type: 'POST',
							url: '<?php echo site_url('training/training_application/targetGroup')?>',
							data: {'trRefID' : refid, 'tName' : title},
							beforeSend: function() {
								$('#group_module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#group_module_setup').html(res);

								$.ajax({
									type: 'POST',
									url: '<?php echo site_url('training/training_application/moduleSetup')?>',
									data: {'tsRefID' : refid},
									beforeSend: function() {
										$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#module_setup').html(res);
										$('.pos_tg_btn').addClass('hidden');
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
								$('#cpd_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#cpd_setup').html(res);
							}
						});
						
					}, 2000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
				msg.danger('Please contact administrator.', '#alertFooter');
			}
		});	
	});

    ///// SEARCH STAFF//////
	// AUTO SEARCH STAFF ID
	$('#add_edit_training').on('keyup','#coordinator_id', function(){
		// console.log(this.value);
		var val_length = this.value.length;
		var staff_id = this.value;
		msg.wait('#alertStfID');

		if(val_length >= 5) {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('staffKeyUp')?>',
				data: {'staff_id' : staff_id},
				dataType: 'JSON',
				success: function(res) {
					if(res.sts == 1) {
						msg.show('Staff ID is valid', 'success', '#alertStfID');
						$('#coordinator_name').val(res.stf_name);
					} else {
						msg.show('Invalid Staff ID', 'danger', '#alertStfID');
						$('#coordinator_name').val('');
					}
				}
			});
		} else {
			msg.show('Invalid Staff ID', 'danger', '#alertStfID');
			$('#coordinator_name').val('');
		}
	});

	// SEARCH STAFF
	$('#add_edit_training').on('click','.search_staff', function(){

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SEARCH STAFF MODAL
	$('#myModalis').on('click', '.search_staff_md', function () {
		var staff_id = $('#myModalis #staff_id').val();
		search_trigger = 1;
		// console.log(staff_id);
		
		if(staff_id == '') {
			msg.show('Please enter Staff ID / Name', 'warning', '#myModalis .modal-content #alertStfIDMD');
			return;
		}

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchStaffMd')?>',
			data: {'staff_id':staff_id, 'search_trigger':search_trigger,},
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
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#coordinator_id').val(staff_id);
			$('#coordinator_name').val(staff_name);
		}
	});
	///// SEARCH STAFF//////

	// DELETE TRAINING
	$('#training_list').on('click','.del_tr', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var tName = td.find(".title").text();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Training Info',
		    content: 'Are you sure to delete this record? <br> <b>'+refid+' - '+tName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTraining')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();

								$('#add_edit_training').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List</th></tr></thead></table></p>');

								$('#training_cost').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List</th></tr></thead></table></p>');

								$('#group_module_setup').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List</th></tr></thead></table></p>');

								$('#cpd_setup').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please select training from Training List</th></tr></thead></table></p>');
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});


	/*===========================================================
       TAB 3 - TRAINING COST
    =============================================================*/

	// ADD TRAINING COST
	$('#training_cost').on('click','.add_tr_cost', function(){
		var refid = $('#refid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingCost')?>',
			data: {'refid':refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE ADD TRAINING COST
	$('#myModalis2').on('click', '.add_tr_cost', function (e) { 
		e.preventDefault();
		var data = $('#addTrCost').serialize();
		msg.wait('#addTrCostAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveNewTrCost')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addTrCostAlert');
				
				if (res.sts == 1) {
					

					setTimeout(function () {
						var refid = res.refid;

						$('#myModalis2').modal('hide');
						$('.nav-tabs li:eq(2) a').tab('show');

						// TRAINING COST
						$('#training_cost').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingCost')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#training_cost').html(res);
							}
						});
						
						// REFRESH TRAININg FORM
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editTraining')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#add_edit_training').html(res);

								// var evaluation = $("#evaluation").val();
								// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

								// if(evaluation == 'Y') {
								// 	$('#eva_period').removeClass('hidden');

								// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

								// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

								// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
								// } else {
								// 	$('#eva_period').addClass('hidden');

								// 	$('#evaMsg').html('');

								// 	$('#evaPFrom').html('From');

								// 	$('#evaPTo').html('To');
								// }
								// $('#evaLoader').html('');
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
				msg.danger('Please contact administrator.', '#addTrCostAlert');
			}
		});	
	});

	// EDIT TRAINING COST
	$('#training_cost').on('click','.upd_tr_cost', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var code = td.find(".code").text();
		var refid = $('#refid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTrainingCost')?>',
			data: {'refid':refid, 'code':code},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE EDIT TRAINING COST
	$('#myModalis2').on('click', '.upd_tr_cost', function (e) { 
		e.preventDefault();
		var data = $('#editTrCost').serialize();
		msg.wait('#editTrCostAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdTrCost')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editTrCostAlert');
				
				if (res.sts == 1) {
					

					setTimeout(function () {
						var refid = res.refid;

						$('#myModalis2').modal('hide');
						$('.nav-tabs li:eq(2) a').tab('show');

						// TRAINING COST
						$('#training_cost').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('trainingCost')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#training_cost').html(res);
							}
						});

						// REFRESH TRAININg FORM
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editTraining')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#add_edit_training').html(res);

								// var evaluation = $("#evaluation").val();
								// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

								// if(evaluation == 'Y') {
								// 	$('#eva_period').removeClass('hidden');

								// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

								// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

								// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
								// } else {
								// 	$('#eva_period').addClass('hidden');

								// 	$('#evaMsg').html('');

								// 	$('#evaPFrom').html('From');

								// 	$('#evaPTo').html('To');
								// }
								// $('#evaLoader').html('');
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
				msg.danger('Please contact administrator.', '#editTrCostAlert');
			}
		});	
	});

	// DELETE TRAINING COST
	$('#training_cost').on('click','.del_tr_cost', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var code = td.find(".code").text();
		var cost_desc = td.find(".cost_desc").text();
		var refid = $('#refid').val();
		
		$.confirm({
		    title: 'Delete Training Cost',
		    content: 'Are you sure to delete this record? <br> <b>'+code+' - '+cost_desc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTrainingCost')?>',
						data: {'refid' : refid, 'code' : code},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();

								// REFRESH TRAININg FORM
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('editTraining')?>',
									data: {'refid':refid},
									success: function(res) {
										$('#add_edit_training').html(res);

										// var evaluation = $("#evaluation").val();
										// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

										// if(evaluation == 'Y') {
										// 	$('#eva_period').removeClass('hidden');

										// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

										// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

										// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
										// } else {
										// 	$('#eva_period').addClass('hidden');

										// 	$('#evaMsg').html('');

										// 	$('#evaPFrom').html('From');

										// 	$('#evaPTo').html('To');
										// }
										// $('#evaLoader').html('');
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});


	/*===========================================================
       TAB 4 - TARGET GROUP & MODULE SETUP
	=============================================================*/
	
	// LIST OF ELIGIBLE POSITION //
	$('#group_module_setup').on('click', '.pos_tg_btn', function() {
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
				$('.add_eg_position_btn').hide();
			}
		});
	});

	// ADD TARGET GROUP MODAL
	$('#group_module_setup').on('click', '.add_tg', function() {
		var thisBtn = $(this);
		var trRefID = thisBtn.val();
		//alert(trRefID);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/addTargetGroup')?>',
			data: {'RefID' : trRefID},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SAVE TARGET GROUP
	$('#myModalis').on('click', '.ins_tg_btn', function () {
		var data = $('#insFormTargetGroup').serialize();
		msg.wait('#alertInsTg');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveTrainingTG')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsTg');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#tbl_list_tg tbody #trNrecord').remove();
						$('#tbl_list_tg tbody').append(res.tg_row);
						$('.pos_tg_btn').addClass('hidden');
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				//$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// populate target group info (add target group)
	$('#myModalis').on('change', '#groupCode', function() {
		var grpCode = $(this).val();
		//alert(grpCode);

		$('#faspinner3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/tgList')?>',
			data: {'grpCode' : grpCode},
			dataType: 'json',
			success: function(res) {
				$('#faspinner3').html('');
				if(res.sts == 1) {
					$('#tgDesc').val(res.tgList.TG_GROUP_DESC);
					$('#schemeCode').val(res.tgList.TG_SCHEME);
					$('#gradeFrom').val(res.tgList.TG_GRADE_FROM);
					$('#gradeTo').val(res.tgList.TG_GRADE_TO);
					$('#svcYearFrom').val(res.tgList.TG_SERVICE_YEAR_FROM);
					$('#svcYearTo').val(res.tgList.TG_SERVICE_YEAR_TO);
					$('#grpSvc').val(res.tgList.TG_SERVICE_GROUP);
					$('#academician').val(res.tgList.TGACADEMIC);
					$('#nStaff').val(res.tgList.TGNEWSTAFF);
					$('#compulsory').val(res.tgList.TGCOMPULSORY);
				}
			}
		});
	});

	// DELETE ELIGIBLE POSITION //
	$('#myModalis').on('click','.del_eg_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var gpCode = $('#dataGp').data("gpcode");
		var tgsSeq = td.eq(0).html().trim();
		var svcCode = td.eq(1).html().trim();
		var svcDesc = td.eq(2).html().trim();
		//alert(gpCode);
		
		$.confirm({
		    title: 'Delete Group Service',
		    content: 'Are you sure to delete this record? <br> <b>'+svcCode+' - '+svcDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url('training/training_application/deleteTrainingGpService')?>',
						data: {'gpCode' : gpCode, 'tgsSeq' : tgsSeq},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// DELETE TRAINING TARGET GROUP //
	$('#group_module_setup').on('click','.del_tg_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = thisBtn.val();
		var gpCode = td.eq(0).html().trim();
		var tgName = td.eq(1).html().trim();
		//alert(gpCode+' ' +tgName);
		
		$.confirm({
		    title: 'Delete Target Group',
		    content: 'Are you sure to delete this record? <br> <b>'+gpCode+' - '+tgName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url('training/training_application/deleteTargetGroup')?>',
						data: {'refid' : refid, 'gpCode' : gpCode},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// ADD MODULE SETUP MODAL
	$('#group_module_setup').on('click', '.add_ms_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		//alert(refid);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/addModuleSetup')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE MODULE SETUP
	$('#myModalis2').on('click', '.ins_ms', function () {
		var data = $('#insModuleSetup').serialize();
		msg.wait('#alertInsMs');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveModuleSetup')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsMs');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('#group_module_setup .add_ms_btn').hide();
						$('#group_module_setup #remMs').show();
						$('.btn').removeAttr('disabled');
						$('#tbl_list_ms tbody #trNrecord').remove();
						$('#tbl_list_ms tbody').append(res.msRow);
						
						// REFRESH EDIT TRAINING
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('editTraining')?>',
							data: {'refid':refid},
							success: function(res) {
								$('#add_edit_training').html(res);

								// var evaluation = $("#evaluation").val();
								// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

								// if(evaluation == 'Y') {
								// 	$('#eva_period').removeClass('hidden');

								// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

								// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

								// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
								// } else {
								// 	$('#eva_period').addClass('hidden');
									
								// 	$('#evaMsg').html('');

								// 	$('#evaPFrom').html('From');

								// 	$('#evaPTo').html('To');
								// }
								// $('#evaLoader').html('');
							}
						});
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				//$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// DELETE MODULE SETUP //
	$('#group_module_setup').on('click','.delete_ms_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();

		//alert(refid);
		
		$.confirm({
		    title: 'Delete Module Setup Record',
		    content: 'Are you sure to delete this record? <br> Training Refference ID: <b>'+refid+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url('training/training_application/deleteModuleSetup')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('#module_setup tr').fadeOut().delay(1000).remove();
								//$('#tbl_list_ms tbody').fadeOut().delay(1000).detach();
								$('#group_module_setup #insMs').show();
								$('#group_module_setup .delete_ms_btn').hide();
								
								// REFRESH EDIT TRAINING
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('editTraining')?>',
									data: {'refid':refid},
									success: function(res) {
										$('#add_edit_training').html(res);

										// var evaluation = $("#evaluation").val();
										// $('#evaLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

										// if(evaluation == 'Y') {
										// 	$('#eva_period').removeClass('hidden');

										// 	$('#evaMsg').html('<b><font color="red">Evaluation Period is required</font></b>');

										// 	$('#evaPFrom').html('From <b><font color="red">* </font></b>');

										// 	$('#evaPTo').html('To <b><font color="red">* </font></b>');
										// } else {
										// 	$('#eva_period').addClass('hidden');
											
										// 	$('#evaMsg').html('');

										// 	$('#evaPFrom').html('From');

										// 	$('#evaPTo').html('To');
										// }
										// $('#evaLoader').html('');
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// UPDATE HEAD DETL 1 //
	// UPDATE MODULE SETUP 1 MODAL
	$('#group_module_setup').on('click', '.edit_ms1_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var spObj = $('#spObj').val();

		//alert(spObj);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editModuleSetup1')?>',
			data: {'refid' : refid, 'spObj' : spObj,},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 1
	$('#myModalis2').on('click', '.upd_ms1', function () {
		var data = $('#formUpdMs1').serialize();
		msg.wait('#alertUpdMs1');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateMS1')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdMs1');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#spObj').html(res.ms1_row.THD_TRAINING_OBJECTIVE2);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE HEAD DETL 2 //
	// UPDATE MODULE SETUP 2 MODAL
	$('#group_module_setup').on('click', '.edit_ms2_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var msCont = $('#msCont').val();

		//alert(msCont);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editModuleSetup2')?>',
			data: {'refid' : refid, 'msCont' : msCont,},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 2
	$('#myModalis2').on('click', '.upd_ms2', function () {
		var data = $('#formUpdMs2').serialize();
		msg.wait('#alertUpdMs2');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateMS2')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdMs2');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#msCont').html(res.ms2_row.THD_TRAINING_CONTENT);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE HEAD DETL 3 //
	// UPDATE MODULE SETUP 3 MODAL
	$('#group_module_setup').on('click', '.edit_ms3_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		//var msComp = $('#msComp').val();

		srow = $(this).parents('tr');
		//alert(msComp);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editModuleSetup3')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 3
	$('#myModalis2').on('click', '.upd_ms3', function () {
		var data = $('#formUpdMs3').serialize();
		msg.wait('#alertUpdMs3');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateMS3')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdMs3');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.ms3_row.TMCDESC);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	/*===========================================================
       TAB 5 - CPD SETUP
	=============================================================*/

	// ADD CPD SETUP MODAL
	$('#cpd_setup').on('click', '.add_cpd_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		//alert(refid);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/addCPDSetup')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE CPD SETUP
	$('#myModalis2').on('click', '.ins_cpd', function () {
		var data = $('#insCpdSetup').serialize();
		msg.wait('#alertInsCpd');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveCPDSetup')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsCpd');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('#cpd_setup .add_cpd_btn').hide();
						$('#cpd_setup #remCPD').show();
						$('.btn').removeAttr('disabled');
						$('#tbl_list_cs tbody #trNrecord').remove();
						$('#tbl_list_cs tbody').append(res.cpdRow);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// DELETE CPD SETUP //
	$('#cpd_setup').on('click','.delete_cpd_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();

		//alert(refid);
		
		$.confirm({
		    title: 'Delete CPD Setup Record',
		    content: 'Are you sure to delete this record? <br> Training Refference ID: <b>'+refid+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url('training/training_application/deleteCpdSetup')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('#cpd_setup tr').fadeOut().delay(1000).remove();
								//$('#tbl_list_ms tbody').fadeOut().delay(1000).detach();
								$('#cpd_setup #insCPD').show();
								$('#cpd_setup .delete_cpd_btn').hide();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// UPDATE CPD HEAD 1 //
	// UPDATE CPD SETUP 1 MODAL
	$('#cpd_setup').on('click', '.edit_cpd1_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cpdComp = td.eq(1).html().trim();
		var refid = thisBtn.val();

		srow = $(this).parents('tr');
		//alert(msComp);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editCpdSetup1')?>',
			data: {'refid' : refid, 'cpdComp' : cpdComp},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 1
	$('#myModalis2').on('click', '.upd_cpd1', function () {
		var data = $('#formUpdCpd1').serialize();
		msg.wait('#alertUpdCpd1');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateCpd1')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdCpd1');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.cpd1_row.CH_COMPETENCY);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE CPD HEAD 2 //
	// UPDATE CPD SETUP 2 MODAL
	$('#cpd_setup').on('click', '.edit_cpd2_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();

		srow = $(this).parents('tr');
		//alert(msComp);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdSetup2')?>',
			url: '<?php echo site_url('training/training_application/editCpdSetup2')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 2
	$('#myModalis2').on('click', '.upd_cpd2', function () {
		var data = $('#formUpdCpd2').serialize();
		msg.wait('#alertUpdCpd2');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateCpd2')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdCpd2');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.cpd2_row);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE CPD HEAD 3 //
	// UPDATE CPD SETUP 3 MODAL
	$('#cpd_setup').on('click', '.edit_cpd3_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cpdMark = td.eq(1).html().trim();
		var refid = thisBtn.val();

		srow = $(this).parents('tr');
		//alert(cpdMark);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editCpdSetup3')?>',
			data: {'refid' : refid, 'cpdMark' : cpdMark},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 3
	$('#myModalis2').on('click', '.upd_cpd3', function () {
		var data = $('#formUpdCpd3').serialize();
		msg.wait('#alertUpdCpd3');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateCpd3')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdCpd3');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.cpd3_row.CH_MARK);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE CPD HEAD 4 //
	// UPDATE CPD SETUP 4 MODAL
	$('#cpd_setup').on('click', '.edit_cpd4_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var rpSub = td.eq(1).html().trim();
		var refid = thisBtn.val();

		srow = $(this).parents('tr');

		if(rpSub == 'YES') {
			rpSub = 'Y';
		} 
		else if(rpSub == 'NO') {
			rpSub = 'N';
		}
		// alert(rpSub);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdSetup4')?>',
			url: '<?php echo site_url('training/training_application/editCpdSetup4')?>',
			data: {'refid' : refid, 'rpSub' : rpSub},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 4
	$('#myModalis2').on('click', '.upd_cpd4', function () {
		var data = $('#formUpdCpd4').serialize();
		msg.wait('#alertUpdCpd4');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateCpd4')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdCpd4');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.cpd4_row.REP_SUB);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});

	// UPDATE CPD HEAD 5 //
	// UPDATE CPD SETUP 5 MODAL
	$('#cpd_setup').on('click', '.edit_cpd5_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cpdCmpy = td.eq(1).html().trim();
		var refid = thisBtn.val();

		srow = $(this).parents('tr');

		if(cpdCmpy == 'YES') {
			cpdCmpy = 'Y';
		} 
		else if(cpdCmpy == 'NO') {
			cpdCmpy = 'N';
		}
		//alert(cpdCmpy);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/editCpdSetup5')?>',
			data: {'refid' : refid, 'cpdCmpy' : cpdCmpy},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 5
	$('#myModalis2').on('click', '.upd_cpd5', function () {
		var data = $('#formUpdCpd5').serialize();
		msg.wait('#alertUpdCpd5');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('training/training_application/saveUpdateCpd5')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdCpd5');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(1)').html(res.cpd5_row.CHCOMPULSORY);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alert');
			}
		});	
	});
</script>