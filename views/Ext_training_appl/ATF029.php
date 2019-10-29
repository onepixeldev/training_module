<?php echo $this->lib->title('Training / Assign Training Cost to Staff', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF029 - Assign Training Cost to Staff</h2>				
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
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Payment Details</a>
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
									<div id="payment_details">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please click Payment Details button from Staff List tab</th>
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
        $('#payment_details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Payment Details button from Staff List tab</th></tr></thead></table></p>').show();

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
            url: '<?php echo $this->lib->class_url('trStaffList2')?>',
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

    // PAYMENT DETAILS
	$('#staff_list').on('click','.payment_detl', function() {
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
        var refid = $('#refid').val();

        $('.nav-tabs li:eq(3) a').tab('show');

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getPaymentDetl')?>',
            data: {'staff_id' : staff_id, 'refid' : refid},
            beforeSend: function() {
                $('#payment_details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#payment_details').html(res);
            }
        });

    });	
    
    // EDIT STAFF TRAINING COST
	$('#staff_list').on('click','.upd_stf_cost', function(){
        var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
		var refid = $('#refid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStaffCost')?>',
			data: {'refid':refid, 'staff_id':staff_id},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
    });
    
    // SAVE UPDATE TRAINING COST
	$('#myModalis2').on('click', '.upd_stf_cost', function (e) { 
		e.preventDefault();
		var data = $('#editAssignStfCost').serialize();
		msg.wait('#editAssignStfCostAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdAssignStaffCost')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editAssignStfCostAlert');
				
				if (res.sts == 1) {
					
					setTimeout(function () {
						var refid = res.refid;

						$('#myModalis2').modal('hide');
						$('.nav-tabs li:eq(1) a').tab('show');

						// REFRESH STAFF LIST
						$.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('trStaffList2')?>',
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
						
					}, 1000);
					$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editAssignStfCostAlert');
			}
		});	
    });

    // DELETE STCM
	$('#staff_list').on('click','.del_tr_cost', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var staff_id = td.find(".staff_id").text();
        var name = td.find(".name").text();
        var refid = $("#refid").val();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Training Cost',
		    content: 'Are you sure to delete this record? <br> <b>'+staff_id+' - '+name+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delStfTrCost')?>',
						data: {'refid' : refid, 'staff_id' : staff_id},
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
                                $('#payment_details').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Payment Details button from Staff List tab</th></tr></thead></table></p>').show();
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
       TAB 4 - PAYMENT DETAILS
    =============================================================*/

    // ADD PAYMENT DETL
	$('#payment_details').on('click','.add_p_detl', function(){
        var staff_id = $('#staff_id').val();
		var refid = $('#refid').val();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addPaydetl')?>',
			data: {'refid':refid, 'staff_id':staff_id},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
    });	
    
    // GET COST CODE DETL
	$('#myModalis2').on('change', '#costCode', function (e) { 
        e.preventDefault();
        var data = $('#addPayDetl').serialize();
		
        // $('.btn').attr('disabled', 'disabled');
        $('#loader').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getCostCodeDetl')?>',
            data: data,
            dataType: 'JSON',
			success: function(res) {
				if (res.sts == 1) {
                    $('#loader').addClass('hidden');
                    $('#myModalis2 #cost_amount').val(res.amount);
				} 
			}
		});	
    });

	// SAVE PAYMENT DETL
	$('#myModalis2').on('click', '.save_pay_detl', function (e) { 
		e.preventDefault();
		var data = $('#addPayDetl').serialize();
		msg.wait('#addPayDetlAlert');
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('savePayDetl')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addPayDetlAlert');
				
				if (res.sts == 1) {
					
					setTimeout(function () {
                        var refid = res.refid;
                        var staff_id = res.staff_id;

						$('#myModalis2').modal('hide');
						$('.nav-tabs li:eq(3) a').tab('show');

						// REFRESH STAFF LIST
						$.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('trStaffList2')?>',
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
                        
                        // PAYMENT DETL
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $this->lib->class_url('getPaymentDetl')?>',
                            data: {'staff_id' : staff_id, 'refid' : refid},
                            beforeSend: function() {
                                $('#payment_details').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#payment_details').html(res);
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
				msg.danger('Please contact administrator.', '#addPayDetlAlert');
			}
		});	
    });

    // DELETE STCM
	$('#payment_details').on('click','.del_pay_detl', function() {
        var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var code_code = td.eq(0).html().trim();
        var code_desc = td.eq(1).html().trim();
        var refid = $("#refid").val();
        var staff_id = $("#staff_id").val();
		
		$.confirm({
		    title: 'Delete Payment Details',
		    content: 'Are you sure to delete this record? <br> <b>'+code_code+' - '+code_desc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delPayDetl')?>',
						data: {'refid' : refid, 'staff_id' : staff_id, 'code_code' : code_code},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
                                var refid = res.refid;

								hide_loading();
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
                                thisBtn.parents('tr').fadeOut().delay(1000).remove();
                                
                                // REFRESH STAFF LIST
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo $this->lib->class_url('trStaffList2')?>',
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});
    
</script>