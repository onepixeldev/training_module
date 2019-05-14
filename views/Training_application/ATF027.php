<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF027 - Approve Training Setup</h2>				
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

                            <div class="row">
								<div class="col-sm-3">
									<div class="form-group text-right">
										<label><b>Status</b></label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group text-left">
										<?php echo form_dropdown('tSts', $tr_sts_list, $def_tr_sts, 'class="form-control listFilter" id="tSts"'); ?>
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
    var tSts = 'ENTRY';
	var disYear = '1';
	var disDept = '1';
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
		url: '<?php echo $this->lib->class_url('getTrainingList')?>',
		data: {'intExt' : intExt, 'tSts' : tSts, 'disYear' : disYear, 'disDept' : disDept},
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);
			tr_row = $('#tbl_tr_list').DataTable({
				"ordering":false,
			});
			$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-5">Action</th>');
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
		var tSts = $('#tSts').val();
		//alert(''+sDept+',' +sMonth+''+sYear+',' +tSts+'');
		
		$('.nav-tabs li:eq(0) a').tab('show');
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getTrainingList')?>',
			data: {'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear, 'tSts' : tSts},
			success: function(res) {
				$('#training_list').html(res);
				tr_row = $('#tbl_tr_list').DataTable({
					"ordering":false
				});

				$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-5">Action</th>');
			}
		});
	});

	// SELECT TRAINING BTN
	$('#training_list').on('click','.select_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(2).html().trim();
		//var scCode = '1';
		//alert(refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refID' : trRefID},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
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
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl2').html(res);
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
						$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl3').html(res);
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
	$('#training_list_detl2').on('click', '.pos_tg_btn', function() {
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

	// APPROVE TRAINING
	$('#training_list').on('click','.approve_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var trName = td.eq(2).html().trim();
		//alert(refid);
		
		$.confirm({
		    title: 'Approve Training',
		    content: 'Press <b>YES</b> to confirm approval <br> Training ID: <br><b>'+refid+' - '+trName+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('approveTrainingSetup')?>',
						data: {'refid' : refid},
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
		            $.alert('Canceled Approval!');
		        }
		    }
		});
	});

	// POSTPONE TRAINING
	$('#training_list').on('click','.postpone_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var trName = td.eq(2).html().trim();
		//alert(refid);
		
		$.confirm({
		    title: 'Postpone Training',
		    content: 'Press <b>YES</b> to proceed <br> Training ID: <br><b>'+refid+' - '+trName+'</b>',
			type: 'green',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('postponeTrainingSetup')?>',
						data: {'refid' : refid},
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
		            $.alert('Canceled Postponement!');
		        }
		    }
		});
	});

	// REJECT TRAINING
	$('#training_list').on('click','.reject_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var trName = td.eq(2).html().trim();
		//alert(refid);
		
		$.confirm({
		    title: 'Reject Training',
		    content: 'Press <b>YES</b> to confirm rejection <br> Training ID: <br><b>'+refid+' - '+trName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejectTrainingSetup')?>',
						data: {'refid' : refid, 'trName' : trName},
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
		            $.alert('Canceled Rejection!');
		        }
		    }
		});
	});

	// AMMEND TRAINING
	$('#training_list').on('click','.amend_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var trName = td.eq(2).html().trim();
		//alert(refid);
		
		$.confirm({
		    title: 'Amend Training',
		    content: 'Press <b>YES</b> to confirm amend <br> Training ID: <br><b>'+refid+' - '+trName+'</b>',
			type: 'orange',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('amendTrainingSetup')?>',
						data: {'refid' : refid, 'trName' : trName},
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
		            $.alert('Canceled Amendment!');
		        }
		    }
		});
	});
</script>