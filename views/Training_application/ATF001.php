<?php echo $this->lib->title('Training Setup') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Setup Query</h2>				
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
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Target Group & Module Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>
								<!--<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>-->
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
									<div id="trainingInfo">
										<div class="text-center" id="loader">
										</div>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="add_edit_tr_info">	
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="group_module_setup">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training Info</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="cpd_setup">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training Info</th>
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
    <!--<div class="modal-dialog modal-lg">
        <div class="modal-content" id="mContent">
		
        </div>
    </div>--><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis2" data-backdrop="static" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="mContent2">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<script>
	var dt_row = '';		// assign new object for DataTable
	var dt_row2 = '';
	
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

    // populate training info
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingInfo')?>',
		data: '',
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
			//alert(res);
			$('#trainingInfo').html(res);
			dt_row = $('#tbl_list_ti').DataTable({
				"ordering":false,
				//"lengthMenu": [[4, 8], [4, 8]]
			});
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// add new training tab form
	$('#add_edit_tr_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('addNewTraining')?>',
		data: '',
		success: function(res) {
			$('#add_edit_tr_info').html(res);
		}
    });
    
	// add new training tab form (click button)
	$('#trainingInfo').on('click','.add_nt', function(){
		$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addNewTraining')?>',
			success: function(res) {
				$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide()
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#add_edit_tr_info').html(res);
			}
		});
	});

	// populate state add new training form
	$('#add_edit_tr_info').on('change','#country', function() {
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
		
	// populate organizer info in add new training form
	$('#add_edit_tr_info').on('change', '#orginfo', function() {
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

	// table modal list of structured training
	$('#add_edit_tr_info').on('click', '#search_str_tr', function() {
		$('#myModalis').empty();
		$('#myModalis').modal('show');
		$('#myModalis').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setupStructuredTraining')?>',
			data: '',
			//dataType: 'json',
			success: function(res) {
				$('#myModalis').html(res);
				dt_row = $('#tbl_list_str_tr').DataTable({
					"ordering":false,
					"lengthMenu": [[5, 10], [5, 10]]
				});		
			}
		});
	});

	// populate structured training field with selected value
	$('#myModalis').on('click', '.select_str_tr', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var strCode = td.eq(0).html().trim();
		var trTitle = td.eq(1).html().trim().replace(/&amp;/g, '&');
		//alert(trTitle);
		if(strCode != null && trTitle != null){
			$('#strTraining').val(strCode);
			$('#trTitle').val(trTitle);
			$('#myModalis').modal('hide');
		}
	});

	// INSERT training info - submit
	$('#add_edit_tr_info').on('click', '.ins_tr_info', function (e) { 
		e.preventDefault();
		var data = $('form').serialize();
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
				//msg.show(res.listSuccessMsg, res.alert, '#alertFooter');
				
				if (res.sts == 1) {

					setTimeout(function () {
					    var trRefID = res.refid;
					    alert(trRefID);
					    $('#add_edit_tr_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

					    $.ajax({
					        type: 'POST',
					        url: '<?php echo $this->lib->class_url('editTraining')?>',
					        data: {'refID' : trRefID},
					        success: function(res) {
					            //$('.nav-tabs li:eq(1) a').tab('show');
					            $('#add_edit_tr_info').html(res);
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

	// update - training info
	$('#trainingInfo').on('click','.edit_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(1).html().trim();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refID' : trRefID},
			beforeSend: function() {
				$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#add_edit_tr_info').html(res);
				
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('speakerInfo')?>',
					data: {'tsRefID' : trRefID},
					success: function(res) {
						$('#speakerInfo').html(res);
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
					data: {'tsRefID' : trRefID},
					success: function(res) {
						$('#facilitatorInfo').html(res);
					}
				});
			
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					success: function(res) {
						$('#group_module_setup').html(res);

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('moduleSetup')?>',
							data: {'tsRefID' : trRefID, 'tName' : trainingN},
							success: function(res) {
								$('#module_setup').html(res);
							}
						});

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('cpdSetup')?>',
							data: {'tsRefID' : trRefID, 'tName' : trainingN},
							success: function(res) {
								$('#cpd_setup').html(res);
							}
						});
					}
				});

				$('.nav-tabs li:eq(1) a').tab('show');
			},
			complete: function(){
				$('#loader').hide();
			},
		});
	});

	// structured training setup - verify structured training
	$('#add_edit_tr_info').on('click','#search_str_tr_ver', function(){
		var thisBtn = $(this);
		var trRefID = thisBtn.val();
		//alert(trRefID);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('verifyStructuredTrainingSetup')?>',
			data: {'refID' : trRefID},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts==1){
					//dt_appl_row.row( thisBtn.parents('tr') ).remove().draw();
					$('#myModalis').hide()
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
					return;
				} else {
					$('#myModalis').empty();
					$('#myModalis').modal('show');
					$('#myModalis').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
				
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('setupStructuredTraining')?>',
						data: '',
						//dataType: 'json',
						success: function(res) {
							$('#myModalis').html(res);
							dt_row = $('#tbl_list_str_tr').DataTable({
								"ordering":false,
								"lengthMenu": [[5, 10], [5, 10]]
							});		
						}
					});
				}
			}
		});
	});

	// ADD TRAINING SPEAKER //
	// ADD TRAINING SPEAKER INFO MODAL
	$('#add_edit_tr_info').on('click', '.add_tr_sp', function() {
		var thisBtn = $(this);
		var trRefID = thisBtn.val();
		//alert(trRefID);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingSpeaker')?>',
			data: {'RefID' : trRefID},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// populate speaker list
	$('#myModalis2').on('change', '#typeSpeaker', function() {
		var typeSpeaker = $(this).val();
		//alert(typeSpeaker);
		$('#faspinner3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#spDept').val('');
		$('#spCtc').val('');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('speakerList')?>',
			data: {'tpSpeaker' : typeSpeaker},
			dataType: 'json',
			success: function(res) {
				$('#faspinner3').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.spList) {
						resList += '<option value="'+res.spList[i]['SM_STAFF_ID']+'">'+res.spList[i]['STAFF_ID_NAME']+'</option>';
					}
				}

				if (res.sts == 2) {
					for (var i in res.spList) {
						resList += '<option value="'+res.spList[i]['ES_SPEAKER_ID']+'">'+res.spList[i]['ES_SPEAKER_ID_NAME']+'</option>';
					}
				}  
				
				$("#trSpeaker").html(resList);
								
			}
		});
	});

	// populate speaker info
	$('#myModalis2').on('change', '#trSpeaker', function() {
		var thisBtn = $(this);
		var trSpeaker = thisBtn.val();
		var typeSpeaker = $('#typeSpeaker').val();
		$('#loaderxxx').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		//$('#loader').html('');
		
		//alert(typeSpeaker);
		//alert(trSpeaker);

		if(typeSpeaker != '' && trSpeaker != '') {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('speakerList')?>',
				data: {'trSpeakerCode' : trSpeaker, 'tpSpeaker' : typeSpeaker},
				dataType: 'json',
				success: function(res) {
					if(res.sts == 1){
						$('#spDept').val(res.spList.SM_DEPT_CODE);
						$('#spCtc').val(res.spList.SM_TELNO_WORK);
					} 
					else if(res.sts == 2) {
						$('#spDept').val(res.spList.ES_DEPT);
						$('#spCtc').val(res.spList.ES_TELNO_WORK);
					}
										
				}
			});
		}
	});

	// SAVE TRAINING SPEAKER
	$('#myModalis2').on('click', '.ins_sp_info', function () {
		var data = $('#formTrainingSpeaker').serialize();
		msg.wait('#alertInsTrSp');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveTrainingSpeaker')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsTrSp');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#tbl_list_si tbody').append(res.sp_row);
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

	// UPDATE TRAINING SPEAKER //
	// UPDATE TRAINING SPEAKER INFO MODAL
	$('#add_edit_tr_info').on('click', '.edit_sp_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var spType = td.eq(1).html().trim();
		var spID = td.eq(2).html().trim();

		srow = $(this).parents('tr');
		// alert(refid);
		// alert(spType);
		// alert(spID);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTrainingSpeaker')?>',
			data: {'refid' : refid, 'spType' : spType, 'spID' : spID},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE TRAINING SPEAKER
	$('#myModalis2').on('click', '.upd_sp_info', function () {
		var data = $('#formUpdateTrainingSpeaker').serialize();
		msg.wait('#alertUpdTrSp');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateTrainingSpeaker')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertUpdTrSp');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('td:eq(5)').html(res.sp_row.TS_CONTACT);
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

	/* select training btn
	$('#trainingInfo').on('click', '.select_training_btn', function(){
		var thisBtn = $(this);
		var tsRefID = thisBtn.val();

		$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('speakerInfo')?>',
			data: {'tsRefID' : tsRefID},
			success: function(res) {
				$('#speakerInfo').html(res);
			}
		});

		$('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
			data: {'tsRefID' : tsRefID},
			success: function(res) {
				$('#facilitatorInfo').html(res);
			}
		});
	});

	// select training - target group, module & CPD setup
	$('#trainingInfo').on('click', '.target_group_btn', function(){
		var thisBtn = $(this);
		var tsRefID = thisBtn.val();
		var td = thisBtn.parent().siblings();
		var trainingN = td.eq(1).html().trim();
		
		$('#target_group_spinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#target_group').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('targetGroup')?>',
			data: {'tsRefID' : tsRefID, 'tName' : trainingN},
			success: function(res) {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#target_group').html(res);
				$('#target_group_spinner').html('');

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('moduleSetup')?>',
					data: {'tsRefID' : tsRefID, 'tName' : trainingN},
					success: function(res) {
						$('#module_setup').html(res);
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : tsRefID, 'tName' : trainingN},
					success: function(res) {
						$('#cpd_setup').html(res);
					}
				});
			}
		});
	});*/

	// populate structured training in structured training setup modal
	/*$('.modal-content').on('change', '#strCode', function() {
		var structuredTrainingCode = $(this).val();
		$('#faspinner2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#title').html('');
		$('#category').html('');
		$('#area').html('');
		$('#type').html('');
		$('#competency').html('');
		//$('#orgCountry').html('');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('structuredTrainingInfo')?>',
			data: {'strCode' : structuredTrainingCode},
			dataType: 'json',
			success: function(res) {
				if (res.sts == 1) {
					$('#faspinner2').html('');
					$('#title').val(res.strTrInfo.TTH_TRAINING_TITLE);
					$('#category').val(res.strTrInfo.TTH_CATEGORY);
					$('#area').val(res.strTrInfo.TTH_TF_FIELD_DESC);
					$('#type').val(res.strTrInfo.TTH_TT_TYPE_DESC);
					$('#competency').val(res.strTrInfo.TTH_COMPETENCY);
				}			
			}
		});
	});*/

</script>