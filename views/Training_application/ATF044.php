<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF044 - Edit Approve Training Setup</h2>				
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
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Training Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Target Group & Module Detail</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">CPD Detail</a>
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
									<div id="training_list_detl">
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
									<div id="training_list_detl2">
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
									<div id="training_list_detl3">
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
	var tr_row = '';

    var intExt = '1';
	var disDept = '1';
	var disYear = '1';
	var tSts = 'APPROVE';
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
			} /*elseif ($currtab == 's5'){
				echo "$('.nav-tabs li:eq(4) a').tab('show');";
			}*/
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
		data: {'intExt' : intExt, 'disDept' : disDept, 'disYear' : disYear, 'tSts' : tSts},
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
                                $('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs file_attach_btn"><i class="fa fa-upload"></i> File Attachment</button>');
                                $('#tbl_tr_list tbody .postpone_training_btn').hide();
                                $('#tbl_tr_list tbody .reject_training_btn').hide();
                                $('#tbl_tr_list tbody .amend_training_btn').hide();
                            }
                        });
                    });
                }
            });
			$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-3">Action</th>');
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// TRAINING LIST FILTER
	$('.listFilter').change(function() {
		//var intExt = $('#intExt').val();
		var sDept = $('#sDept').val();
		var sMonth = $('#sMonth').val();
        var sYear = $('#sYear').val();
		//alert(''+sDept+',' +sMonth+''+sYear+'');
		
		$('.nav-tabs li:eq(0) a').tab('show');
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getTrainingList')?>',
			data: {'intExt' : intExt, 'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear, 'tSts' : tSts},
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
                                    $('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs file_attach_btn"><i class="fa fa-upload"></i> File Attachment</button>');
                                    $('#tbl_tr_list tbody .postpone_training_btn').hide();
                                    $('#tbl_tr_list tbody .reject_training_btn').hide();
                                    $('#tbl_tr_list tbody .amend_training_btn').hide();
                                }
                            });
                        });
                    }
				});
                $('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-3">Action</th>');
			}
		});
	});

	// SELECT TRAINING BTN
	$('#training_list').on('click','.select_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(2).html().trim();
		var scCode = 'ATF044';
		//alert(refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refID' : trRefID, 'scCode' : scCode},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#training_list_detl').html(res);
		
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('speakerInfo')?>',
					data: {'tsRefID' : trRefID},
					beforeSend: function() {
						$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#speakerInfo').html(res);
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
					}
				});
			
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl2').html(res);

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('moduleSetup')?>',
							data: {'tsRefID' : trRefID},
							beforeSend: function() {
								$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#module_setup').html(res);
							}
						});
					}
                });

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl3').html(res);
					}
				});
			}
		});
    });	

    // FILE ATTACHMENT
	$('#training_list').on('click','.file_attach_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		//var tName = td.eq(2).html().trim();
		//alert(refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('fileAttParam')?>',
			data: {'refid' : refid},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts == 1) {
					var ecommURL = '<?php echo $this->lib->class_url('fileAttachment') ?>';
					var newWin = window.open(ecommURL, 'title', 'width=800, height=300');
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
    
    // structured training setup - verify structured training
	$('#training_list_detl').on('click','#search_str_tr_ver', function(){
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
					$('#myModalis').hide()
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
					return;
				} else {
					$('#myModalis .modal-content').empty();
					$('#myModalis').modal('show');
					$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
				
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('setupStructuredTraining')?>',
						data: '',
						//dataType: 'json',
						success: function(res) {
							$('#myModalis .modal-content').html(res);
							$('#strTraining').val('');
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

	// save update training info
	$('#training_list_detl').on('click', '.save_upd_tr_info', function (e) { 
		e.preventDefault();
        var data = $('#updTrainingInfo').serialize();
		msg.wait('#alert');
		msg.wait('#alertFooter');
		
		//$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateTraining')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alert');
				msg.show(res.msg, res.alert, '#alertFooter');

				//$('.btn').removeAttr('disabled');
				
				if (res.sts == 1) {
					setTimeout(function () {
						var trRefID = res.refid;
                        var trainingN = res.trName;
                        var scCode = 'ATF044';
						$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						$.ajax({
					        type: 'POST',
					        url: '<?php echo $this->lib->class_url('editTraining')?>',
					        data: {'refID' : trRefID, 'scCode' : scCode},
					        success: function(res) {
					            $('.nav-tabs li:eq(1) a').tab('show');
								$('#training_list_detl').html(res);

								// POPULATE TRAINING LIST
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('getTrainingList')?>',
									data: {'intExt' : intExt, 'disDept' : disDept, 'disYear' : disYear, 'tSts' : tSts},
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
															$('#tbl_tr_list tbody .approve_training_btn').replaceWith('<button type="button" class="btn btn-primary btn-xs file_attach_btn"><i class="fa fa-upload"></i> File Attachment</button>');
															$('#tbl_tr_list tbody .postpone_training_btn').hide();
															$('#tbl_tr_list tbody .reject_training_btn').hide();
															$('#tbl_tr_list tbody .amend_training_btn').hide();
														}
													});
												});
											}
										});
										$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-3">Action</th>');
									},
									complete: function(){
										$('#loader').hide();
									},
								});
								
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('speakerInfo')?>',
									data: {'tsRefID' : trRefID},
									beforeSend: function() {
										$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#speakerInfo').html(res);
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
									}
								});
								
								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('targetGroup')?>',
									data: {'trRefID' : trRefID, 'tName' : trainingN},
									beforeSend: function() {
										$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#training_list_detl2').html(res);

										$.ajax({
											type: 'POST',
											url: '<?php echo $this->lib->class_url('moduleSetup')?>',
											data: {'tsRefID' : trRefID, 'tName' : trainingN},
											beforeSend: function() {
												$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
											},
											success: function(res) {
												$('#module_setup').html(res);
											}
										});
									}
								});

								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('cpdSetup')?>',
									data: {'tsRefID' : trRefID, 'tName' : trainingN},
									beforeSend: function() {
										$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#training_list_detl3').html(res);
									}
								});
					        }
					    });
					}, 1500);
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

    // populate state add new training form
	$('#training_list_detl').on('change','#country', function() {
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
	$('#training_list_detl').on('change', '#orginfo', function() {
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
    
    // ADD TRAINING SPEAKER INFO MODAL
    $('#training_list_detl').on('click', '.add_tr_sp', function() {
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

    // TRAINING SPEAKER
	// SAVE TRAINING SPEAKER
	$('#myModalis2').on('click', '.ins_sp_info', function (e) {
		e.preventDefault();
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
						$('#tbl_list_si tbody #trNrecord').remove();
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
    
    // UPDATE TRAINING SPEAKER INFO MODAL
	$('#training_list_detl').on('click', '.edit_sp_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var spType = td.eq(1).html().trim();
		var spID = td.eq(2).html().trim();
		var spName = td.eq(3).html().trim();
		var spDept = td.eq(4).html().trim();
		//var spContact = td.eq(5).html().trim();

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
			data: {'refid' : refid, 'spType' : spType, 'spID' : spID, 'spName' : spName, 'spDept' : spDept},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE TRAINING SPEAKER
	$('#myModalis2').on('click', '.upd_sp_info', function (e) {
		e.preventDefault();
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

	// DELETE TRAINING SPEAKER //
	$('#training_list_detl').on('click','.del_sp_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var spID = td.eq(2).html().trim();
		var spName = td.eq(3).html().trim();
		//alert(refid+' ' +spID);
		
		$.confirm({
		    title: 'Delete Training Speaker',
		    content: 'Are you sure to delete this record? <br> <b>'+spID+' - '+spName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTrainingSpeaker')?>',
						data: {'refid' : refid, 'spID' : spID},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});
    
    // ADD TRAINING FACILITATOR //
	// ADD TRAINING SPEAKER INFO MODAL
	$('#training_list_detl').on('click', '.add_tr_fi', function() {
		var thisBtn = $(this);
		var trRefID = thisBtn.val();
		//alert(trRefID);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingFacilitator')?>',
			data: {'RefID' : trRefID},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// populate speaker list
	$('#myModalis2').on('change', '#typeFacilitator', function() {
		var typeFacilitator = $(this).val();
		//alert(typeFacilitator);

		$('#faspinner3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('facilitatorList')?>',
			data: {'tpFacilitator' : typeFacilitator},
			dataType: 'json',
			success: function(res) {
				$('#faspinner3').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.fiList) {
						resList += '<option value="'+res.fiList[i]['SM_STAFF_ID']+'">'+res.fiList[i]['STAFF_ID_NAME']+'</option>';
					}
				}

				if (res.sts == 2) {
					for (var i in res.fiList) {
						resList += '<option value="'+res.fiList[i]['EF_FACILITATOR_ID']+'">'+res.fiList[i]['ES_FACILITATOR_ID_NAME']+'</option>';
					}
				}  
				
				$("#trFacilitator").html(resList);
								
			}
		});
	});

	// SAVE TRAINING FACILITATOR
	$('#myModalis2').on('click', '.ins_fi_info', function (e) {
		e.preventDefault();
		var data = $('#formTrainingFacilitator').serialize();
		msg.wait('#alertInsTrFi');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveTrainingFacilitator')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsTrFi');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#tbl_list_fi tbody #trNrecord').remove();
						$('#tbl_list_fi tbody').append(res.fi_row);
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

	// DELETE TRAINING FACILITATOR //
	$('#training_list_detl').on('click','.del_fi_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var fiID = td.eq(2).html().trim();
		var fiName = td.eq(3).html().trim();
		//alert(refid+' ' +spID);
		
		$.confirm({
		    title: 'Delete Training Facilitator',
		    content: 'Are you sure to delete this record? <br> <b>'+fiID+' - '+fiName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTrainingFacilitator')?>',
						data: {'refid' : refid, 'fiID' : fiID},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
    });
    
    // ADD TARGET GROUP //
	// ADD TARGET GROUP MODAL
	$('#training_list_detl2').on('click', '.add_tg', function() {
		var thisBtn = $(this);
		var trRefID = thisBtn.val();
		//alert(trRefID);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTargetGroup')?>',
			data: {'RefID' : trRefID},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SAVE TARGET GROUP
	$('#myModalis').on('click', '.ins_tg_btn', function (e) {
		e.preventDefault();
		var data = $('#insFormTargetGroup').serialize();
		msg.wait('#alertInsTg');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveTrainingTG')?>',
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
			url: '<?php echo $this->lib->class_url('tgList')?>',
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

	// LIST OF ELIGIBLE POSITION //
	$('#training_list_detl2').on('click', '.pos_tg_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		//var refid = thisBtn.val();
		var gpCode = td.eq(0).html().trim();
		var schemeCode = td.eq(2).html().trim();
		var gradeTo = td.eq(4).html().trim();
		var svcGrp = td.eq(7).html().trim();
		var aca = td.eq(8).html().trim();
		//alert(gpCode);

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('listEgPosition')?>',
			data: {'gpCode' : gpCode, 'schemeCode' : schemeCode, 'gradeTo' : gradeTo, 'svcGrp' : svcGrp, 'aca' : aca},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// ADD ELIGIBLE POSITION 
	$('#myModalis').on('click','.add_eg_position_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		// var tgsSeq = td.eq(0).html().trim();
		// var svcCode = td.eq(1).html().trim();
		var gpCode = thisBtn.data("gc");
		var schemeCode = thisBtn.data("sc");
		var gradeTo = thisBtn.data("gt");
		var svcGrp = thisBtn.data("sg");
		var aca = thisBtn.data("aca");
		
		//var svcDesc = td.eq(2).html().trim();
		//alert(schemeCode+gradeTo+svcGrp+aca);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addEgPos')?>',
			data: {'gpCode' : gpCode, 'schemeCode' : schemeCode, 'gradeTo' : gradeTo, 'svcGrp' : svcGrp, 'aca' : aca},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE INSERT EG POSITION
	$('#myModalis2').on('click', '.add_eg_pos', function (e) {
		e.preventDefault();
		var data = $('#formAddEGPos').serialize();
		msg.wait('#alertAddEGPos');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveInsertEgPos')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertAddEGPos');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#tbl_list_eg_pos tbody #trNrecord').remove();
						$('#tbl_list_eg_pos tbody').append(res.ps_row);
						// $('#spObj').html(res.ms1_row.THD_TRAINING_OBJECTIVE2);
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
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTrainingGpService')?>',
						data: {'gpCode' : gpCode, 'tgsSeq' : tgsSeq},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});

	// DELETE TRAINING TARGET GROUP //
	$('#training_list_detl2').on('click','.del_tg_btn', function() {
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
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteTargetGroup')?>',
						data: {'refid' : refid, 'gpCode' : gpCode},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
    });
    
    // ADD HEAD DETL //
	// ADD MODULE SETUP MODAL
	$('#training_list_detl2').on('click', '.add_ms_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		//alert(refid);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addModuleSetup')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE MODULE SETUP
	$('#myModalis2').on('click', '.ins_ms', function (e) {
		e.preventDefault();
		var data = $('#insModuleSetup').serialize();
		msg.wait('#alertInsMs');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveModuleSetup')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsMs');
				//msg.show(res.msg, res.alert, '#alertFooter');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('#training_list_detl2 .add_ms_btn').hide();
						$('#training_list_detl2 #remMs').show();
						$('.btn').removeAttr('disabled');
						$('#tbl_list_ms tbody #trNrecord').remove();
						$('#tbl_list_ms tbody').append(res.msRow);
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
	$('#training_list_detl2').on('click','.delete_ms_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();

		//alert(refid);
		
		$.confirm({
		    title: 'Delete Module Setup Record',
		    content: 'Are you sure to delete this record? <br> Training Refference ID: <b>'+refid+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteModuleSetup')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('#module_setup tr').fadeOut().delay(1000).remove();
								//$('#tbl_list_ms tbody').fadeOut().delay(1000).detach();
								$('#training_list_detl2 #insMs').show();
								$('#training_list_detl2 .delete_ms_btn').hide();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// UPDATE HEAD DETL 1 //
	// UPDATE MODULE SETUP 1 MODAL
	$('#training_list_detl2').on('click', '.edit_ms1_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var spObj = $('#spObj').val();

		//alert(spObj);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editModuleSetup1')?>',
			data: {'refid' : refid, 'spObj' : spObj,},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 1
	$('#myModalis2').on('click', '.upd_ms1', function (e) {
		e.preventDefault();
		var data = $('#formUpdMs1').serialize();
		msg.wait('#alertUpdMs1');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateMS1')?>',
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
	$('#training_list_detl2').on('click', '.edit_ms2_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		var msCont = $('#msCont').val();

		//alert(msCont);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editModuleSetup2')?>',
			data: {'refid' : refid, 'msCont' : msCont,},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 2
	$('#myModalis2').on('click', '.upd_ms2', function (e) {
		e.preventDefault();
		var data = $('#formUpdMs2').serialize();
		msg.wait('#alertUpdMs2');
		//msg.wait('#alertFooter');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateMS2')?>',
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
	$('#training_list_detl2').on('click', '.edit_ms3_btn', function() {
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
			url: '<?php echo $this->lib->class_url('editModuleSetup3')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE MODULE SETUP 3
	$('#myModalis2').on('click', '.upd_ms3', function (e) {
		e.preventDefault();
		var data = $('#formUpdMs3').serialize();
		msg.wait('#alertUpdMs3');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateMS3')?>',
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
    
    // ADD CPD HEAD //
	// ADD CPD SETUP MODAL
	$('#training_list_detl3').on('click', '.add_cpd_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();
		//alert(refid);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCPDSetup')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE CPD SETUP
	$('#myModalis2').on('click', '.ins_cpd', function (e) {
		e.preventDefault();
		var data = $('#insCpdSetup').serialize();
		msg.wait('#alertInsCpd');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveCPDSetup')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#alertInsCpd');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('#training_list_detl3 .add_cpd_btn').hide();
						$('#training_list_detl3 #remCPD').show();
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
	$('#training_list_detl3').on('click','.delete_cpd_btn', function() {
		var thisBtn = $(this);
		var refid = thisBtn.val();

		//alert(refid);
		
		$.confirm({
		    title: 'Delete CPD Setup Record',
		    content: 'Are you sure to delete this record? <br> Training Refference ID: <b>'+refid+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteCpdSetup')?>',
						data: {'refid' : refid},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								$('#training_list_detl3 tr').fadeOut().delay(1000).remove();
								//$('#tbl_list_ms tbody').fadeOut().delay(1000).detach();
								$('#training_list_detl3 #insCPD').show();
								$('#training_list_detl3 .delete_cpd_btn').hide();
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
		
	});

	// UPDATE CPD HEAD 1 //
	// UPDATE CPD SETUP 1 MODAL
	$('#training_list_detl3').on('click', '.edit_cpd1_btn', function() {
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
			url: '<?php echo $this->lib->class_url('editCpdSetup1')?>',
			data: {'refid' : refid, 'cpdComp' : cpdComp},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 1
	$('#myModalis2').on('click', '.upd_cpd1', function (e) {
		e.preventDefault();
		var data = $('#formUpdCpd1').serialize();
		msg.wait('#alertUpdCpd1');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateCpd1')?>',
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
	$('#training_list_detl3').on('click', '.edit_cpd2_btn', function() {
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
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 2
	$('#myModalis2').on('click', '.upd_cpd2', function (e) {
		e.preventDefault();
		var data = $('#formUpdCpd2').serialize();
		msg.wait('#alertUpdCpd2');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateCpd2')?>',
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
	$('#training_list_detl3').on('click', '.edit_cpd3_btn', function() {
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
			url: '<?php echo $this->lib->class_url('editCpdSetup3')?>',
			data: {'refid' : refid, 'cpdMark' : cpdMark},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 3
	$('#myModalis2').on('click', '.upd_cpd3', function (e) {
		e.preventDefault();
		var data = $('#formUpdCpd3').serialize();
		msg.wait('#alertUpdCpd3');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateCpd3')?>',
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
	$('#training_list_detl3').on('click', '.edit_cpd4_btn', function() {
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
		//alert(rpSub);

		$('#myModalis2 #mContent2').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('#mContent2').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCpdSetup4')?>',
			data: {'refid' : refid, 'rpSub' : rpSub},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 4
	$('#myModalis2').on('click', '.upd_cpd4', function (e) {
		e.preventDefault();
		var data = $('#formUpdCpd4').serialize();
		msg.wait('#alertUpdCpd4');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateCpd4')?>',
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
	$('#training_list_detl3').on('click', '.edit_cpd5_btn', function() {
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
			url: '<?php echo $this->lib->class_url('editCpdSetup5')?>',
			data: {'refid' : refid, 'cpdCmpy' : cpdCmpy},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CPD SETUP 5
	$('#myModalis2').on('click', '.upd_cpd5', function (e) {
		e.preventDefault();
		var data = $('#formUpdCpd5').serialize();
		msg.wait('#alertUpdCpd5');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateCpd5')?>',
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