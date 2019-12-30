<?php echo $this->lib->title('Training / Approve Training Setup for External Agency', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF139 - Approve Training Setup for External Agency</h2>				
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

                            <div class="row">
								<div class="col-sm-3">
									<div class="form-group text-right">
										<label><b>Status</b></label>
									</div>
								</div>
								<div class="col-sm-2">
									<!--<div class="form-group text-left">
										<?php //echo form_dropdown('sStatus', array(''=>'---Please select---', 'ENTRY'=>'ENTRY', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE', 'AMEND'=>'AMEND'), 'ENTRY', 'class="form-control listFilter" id="sStatus"'); ?>
									</div>-->
									<div class="form-group text-left">
										<?php echo form_dropdown('sStatus', array(''=>'---Please select---', 'ENTRY'=>'AMEND', 'APPROVE'=>'APPROVE', 'POSTPONE'=>'POSTPONE'), 'ENTRY', 'class="form-control listFilter" id="sStatus"'); ?>
									</div>
								</div>
							</div>
                            

                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Details</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
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
    var status = $('#sStatus').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList')?>',
		data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
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
        var status = $('#sStatus').val();

        if(status == '') {
            $.alert({
                title: 'Alert!',
                content: 'Please select <b>Status</b> filter',
                type: 'red',
            });

            return;
        }

        $('.nav-tabs li:eq(0) a').tab('show');

		$('#detail').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Detail button from Training List tab</th></tr></thead></table></p>').show();

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getTrainingList')?>',
            data: {'dept' : dept, 'month' : month, 'year' : year, 'status' : status},
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

        $('.nav-tabs li:eq(1) a').tab('show');

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
                    url: '<?php echo $this->lib->class_url('editTraining')?>',
                    data: {'refid':refid},
                    success: function(res) {
                        $('#detl1').html(res);

                        $("#detl1 :input").prop("disabled", true);
                        $("#detl1 .file_att").removeAttr("disabled");
                        $("#detl1 :button").addClass('hidden');
                        $("#detl1 .file_att").removeClass('hidden');
                        $("#detl1 #alert").addClass('hidden');
                        $("#detl1 .modal-header").addClass('hidden');
                    }
                });

                // TRAINING COST
                $('#detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->lib->class_url('trainingCost')?>',
                    data: {'refid':refid},
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

                        $("#detl3 :button").addClass('hidden');
                        
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

    // APPROVE TRAINING
	$('#training_list').on('click','.approve_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();
		//alert(refid);
		
		$.confirm({
		    title: 'Approve Training',
		    content: 'Press <b>YES</b> to continue. <br> Training ID: <br><b>'+refid+' - '+title+'</b>',
			type: 'blue',
		    buttons: {
		        yes: function () {
                    show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('approveExtTrainingSetup')?>',
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
		            $.alert('Canceled Approval!');
		        }
		    }
		});
	});

    // AMMEND TRAINING
	$('#training_list').on('click','.amend_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();
		
		$.confirm({
		    title: 'Amend Training',
		    content: 'Press <b>YES</b> to continue. <br> Training ID: <br><b>'+refid+' - '+title+'</b>',
			type: 'orange',
		    buttons: {
		        yes: function () {
                    show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('amendExtTrainingSetup')?>',
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
		            $.alert('Canceled Amendment!');
		        }
		    }
		});
    });
    
    // POSTPONE TRAINING
	$('#training_list').on('click','.postpone_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();
		
		$.confirm({
		    title: 'Postpone Training',
		    content: 'Press <b>YES</b> to continue. <br> Training ID: <br><b>'+refid+' - '+title+'</b>',
			type: 'green',
		    buttons: {
		        yes: function () {
                    show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('postponeExtTrainingSetup')?>',
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
		            $.alert('Canceled Postponement!');
		        }
		    }
		});
    });
    
    // REJECT TRAINING
	$('#training_list').on('click','.reject_training_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid = td.find(".refid").text();
		var title = td.find(".title").text();
		
		$.confirm({
		    title: 'Reject Training',
		    content: 'Press <b>YES</b> to continue. <br> Training ID: <br><b>'+refid+' - '+title+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
                    show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('rejectExtTrainingSetup')?>',
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
		            $.alert('Canceled Rejection!');
		        }
		    }
		});
	});
	
</script>