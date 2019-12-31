<?php echo $this->lib->title('Conference RMIC / Conference Setup for RMIC') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ASF151 - Conference Setup for RMIC</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Notification Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Conference Allowance</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Participant Role</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

								<div class="tab-pane fade active in" id="s1">
									<div id="notification_setup">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
									<div id="conference_allowance">
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="participant_role">
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
	TAB 1 - NOTIFICATION SETUP
	-----------------------------*/

	// NOTIFICATION SETUP
	$('#notification_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('notificationSetupRmic')?>',
		data: '',
		success: function(res) {
			$('#notification_setup').html(res);
		}
	});	

	// SAVE UPDATE CONFERENCE SETUP
	$('#notification_setup').on('click', '.save_con_setup', function (e) {
		e.preventDefault();
		var data = $('#saveConSet').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		// msg.wait('#conSetAlert');
		msg.wait('#conSetAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConferenceSet')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				// msg.show(res.msg, res.alert, '#conSetAlert');
				msg.show(res.msg, res.alert, '#conSetAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#conSetAlertFoot');
			}
		});	
	});

	// ADD STAFF REMINDER
	$('#notification_setup').on('click','.add_stf_rem_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		var mod = 'RMIC';
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStaffReminder')?>',
			data: {'mod':mod},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE STAFF REMINDER
	$('#myModalis2').on('click', '.save_stf_rem_btn', function (e) {
		e.preventDefault();
		var data = $('#addStaffReminder').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		msg.wait('#addStaffReminderAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveStaffReminder')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addStaffReminderAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addStaffReminderAlert');
			}
		});	
	});

	// DELETE STAFF REMINDER
	$('#notification_setup').on('click','.del_sr_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var stfID = td.eq(0).html().trim();
		var stfName = td.eq(1).html().trim();
		var mod = 'RMIC';
		// alert(email);
		
		$.confirm({
		    title: 'Delete Staff Reminder',
		    content: 'Are you sure to delete this record? <br> <b>'+stfID+' - '+stfName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteStaffReminder')?>',
						data: {'stfID' : stfID, 'mod' : mod},
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

	// ADD STAFF CONTACT INFO
	$('#notification_setup').on('click','.add_sci_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStfConInfo')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE STAFF CONTACT INFO
	$('#myModalis2').on('click', '.save_staff_contact_info', function (e) {
		e.preventDefault();
		var data = $('#addStfConInfo').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		msg.wait('#addStfConInfoAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveStfConInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addStfConInfoAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addStfConInfoAlert');
			}
		});	
	});

	// EDIT STAFF CONTACT INFO
	$('#notification_setup').on('click','.edit_sci_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var parmNo = td.eq(0).html().trim();
		var ext = td.eq(1).html().trim();
		
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStfConInfo')?>',
			data: {'parmNo' : parmNo, 'ext' : ext},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE UPDATE STAFF CONTACT INFO
	$('#myModalis2').on('click', '.save_upd_staff_contact_info', function (e) {
		e.preventDefault();
		var data = $('#editStfConInfo').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		msg.wait('#editStfConInfoAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdStfConInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editStfConInfoAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editStfConInfoAlert');
			}
		});	
	});

	// DELETE STAFF CONTACT INFO
	$('#notification_setup').on('click','.del_sci_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var parmNo = td.eq(0).html().trim();
		var ext = td.eq(1).html().trim();
		var mod = 'RMIC';
		// alert(email);
		
		$.confirm({
		    title: 'Delete Staff Contact Info',
		    content: 'Are you sure to delete this record? <br> <b>'+parmNo+' - '+ext+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteStfConInfo')?>',
						data: {'parmNo' : parmNo, 'mod' : mod},
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

	/*-----------------------------
	TAB 2 - CONFERENCE ALLOWANCE
	-----------------------------*/
	var mod = 'RMIC';
	// POPULATE CONFERENCE ALLOWANCE
	$('#conference_allowance').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conferenceAllowance')?>',
		data: {'mod':mod},
		success: function(res) {
			$('#conference_allowance').html(res);
			$('#conference_allowance .add_ca_btn').addClass('hidden');

			cf_row = $('#tbl_ca_list').DataTable({
				"ordering":false,
			});
		}
	});

	// ADD CONFERENCE ALLOWANCE
	// $('#conference_allowance').on('click','.add_ca_btn', function(){
	// 	var mod = 'RMIC';

	// 	$('#myModalis2 .modal-content').empty();
	// 	$('#myModalis2').modal('show');
	// 	$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('addConAllow')?>',
	// 		data: {'mod':mod},
	// 		success: function(res) {
	// 			$('#myModalis2 .modal-content').html(res);
	// 			$('#myModalis2 .modal-content #dRmic').removeClass('hidden');
	// 		}
	// 	});
	// });	

	// // SAVE CONFERENCE ALLOWANCE
	// $('#myModalis2').on('click', '.ins_ca', function (e) {
	// 	e.preventDefault();
	// 	var data = $('#addConAllow').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
	// 	// var data = $('#addConAllow').serialize();
	// 	msg.wait('#addConAllowAlert');
	// 	// console.log(gg);
		
	// 	$('.btn').attr('disabled', 'disabled');
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('saveConAllow')?>',
	// 		data: data,
	// 		dataType: 'JSON',
	// 		success: function(res) {
	// 			msg.show(res.msg, res.alert, '#addConAllowAlert');

	// 			if (res.sts == 1) {
	// 				setTimeout(function () {
	// 					$('#myModalis2').modal('hide');
	// 					$('.btn').removeAttr('disabled');
	// 					location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF151')?>';
	// 				}, 1000);
	// 			} else {
	// 				$('.btn').removeAttr('disabled');
	// 			}
	// 		},
	// 		error: function() {
	// 			$('.btn').removeAttr('disabled');
	// 			msg.danger('Please contact administrator.', '#addConAllowAlert');
	// 		}
	// 	});	
	// });

	// // DELETE CONFERENCE ALLOWANCE
	// $('#conference_allowance').on('click','.del_ca_btn', function() {
	// 	var thisBtn = $(this);
	// 	var td = thisBtn.parent().siblings();
	// 	var caCode = td.eq(0).html().trim();
	// 	var caDesc = td.eq(1).html().trim();
	// 	// alert(caCode);
		
	// 	$.confirm({
	// 	    title: 'Delete Conference Allowance',
	// 	    content: 'Are you sure to delete this record? <br> <b>'+caCode+' - '+caDesc+'</b>',
	// 		type: 'red',
	// 	    buttons: {
	// 	        yes: function () {
	// 				$.ajax({
	// 					type: 'POST',
	// 					url: '<?php echo $this->lib->class_url('deleteConAllow')?>',
	// 					data: {'caCode' : caCode},
	// 					dataType: 'JSON',
	// 					success: function(res) {
	// 						if (res.sts==1) {
	// 							$.alert({
	// 								title: 'Success!',
	// 								content: res.msg,
	// 								type: 'green',
	// 							});
	// 							thisBtn.parents('tr').fadeOut().delay(1000).remove();
	// 						} else {
	// 							$.alert({
	// 								title: 'Alert!',
	// 								content: res.msg,
	// 								type: 'red',
	// 							});
	// 						}
	// 					}
	// 				});			
	// 	        },
	// 	        cancel: function () {
	// 	            $.alert('Canceled Delete Record!');
	// 	        }
	// 	    }
	// 	});
	// });

	// UPDATE CONFERENCE ALLOWANCE
	$('#conference_allowance').on('click','.edit_ca_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var caCode = td.eq(0).html().trim();
		var mod = 'RMIC';

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editConAllow')?>',
			data: {'caCode':caCode, 'mod':mod},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
				$('#myModalis2 .modal-content #dRmic').removeClass('hidden');
				$('#myModalis2 .modal-content #description').prop('readonly', true);
				$('#myModalis2 .modal-content #descriptionLabel').replaceWith('<label class="col-md-3 control-label">Description</label>');
				$('#myModalis2 .modal-content #maxAmount').prop('readonly', true);
				// $('#myModalis2 .modal-content #sts').prop('readonly', true);
				$('#myModalis2 .modal-content #sts').attr('disabled', 'disabled');
			}
		});
	});

	// SAVE UPDATE CONFERENCE ALLOWANCE
	$('#myModalis2').on('click', '.upd_ca', function (e) {
		e.preventDefault();
		// var data = $('#editConAllow').serialize();
		var data = $('#editConAllow').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		msg.wait('#editConAllowAlert');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updateConAllow')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editConAllowAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editConAllowAlert');
			}
		});	
	});


	/*-----------------------------
	TAB 3 - PARTICIPANT ROLE
	-----------------------------*/

	// POPULATE PARTICIPANT ROLE
	var mod = 'RMIC';
	$('#participant_role').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conParticipantRole')?>',
		data: {'mod':mod},
		success: function(res) {
			$('#participant_role').html(res);
			$('#participant_role .add_pr_btn').addClass('hidden');

			cf_row = $('#tbl_pr_list').DataTable({
				"ordering":false,
				drawCallback: function(){
					$(function() {
						$('#tbl_pr_list').each(function() {
						var Cell = $(this).find('td:eq(8)');
						//debugger;
							if (Cell.text() !== 'error') {
								//$(this).find('btn').hide();
								$('#tbl_ca_list tbody .del_ca_btn').addClass('hidden');
							}
						});
					});
				}
			});
		}
	});

	// // ADD PARTICIPANT ROLE
	// $('#participant_role').on('click','.add_pr_btn', function(){
	// 	$('#myModalis2 .modal-content').empty();
	// 	$('#myModalis2').modal('show');
	// 	$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('addConPartRole')?>',
	// 		success: function(res) {
	// 			$('#myModalis2 .modal-content').html(res);
	// 			$('#myModalis2 .modal-content #display_rmic').removeClass('hidden');
	// 			$('#myModalis2 .modal-content #display_conference').addClass('hidden');
	// 			$('#myModalis2 .modal-content #prosiding').addClass('hidden');
	// 		}
	// 	});
	// });	

	// // SAVE PARTICIPANT ROLE
	// $('#myModalis2').on('click', '.ins_pr', function (e) {
	// 	e.preventDefault();
	// 	var data = $('#addConPartRole').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
	// 	msg.wait('#addConPartRoleAlert');
	// 	msg.wait('#addConPartRoleAlertFoot');
	// 	// alert(data);
		
	// 	$('.btn').attr('disabled', 'disabled');
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '<?php echo $this->lib->class_url('saveConPartRole')?>',
	// 		data: data,
	// 		dataType: 'JSON',
	// 		success: function(res) {
	// 			msg.show(res.msg, res.alert, '#addConPartRoleAlert');
	// 			msg.show(res.msg, res.alert, '#addConPartRoleAlertFoot');

	// 			if (res.sts == 1) {
	// 				setTimeout(function () {
	// 					$('#myModalis2').modal('hide');
	// 					$('.btn').removeAttr('disabled');
	// 					location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF151')?>';
	// 				}, 1000);
	// 			} else {
	// 				$('.btn').removeAttr('disabled');
	// 			}
	// 		},
	// 		error: function() {
	// 			$('.btn').removeAttr('disabled');
	// 			msg.danger('Please contact administrator.', '#addConAllowAlert');
	// 		}
	// 	});	
	// });

	// DETL PARTICIPANT ROLE
	$('#participant_role').on('click','.detl_pr_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cprCode = td.find(".cpr_code").text();
		var cprDesc =  td.find(".cpr_desc").text();
		var mod = 'RMIC';
		//alert(cprCode+cprDesc);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conDetlPartRole')?>',
			data: {'cprCode':cprCode, 'cprDesc':cprDesc, 'mod':mod},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// UPDATE PARTICIPANT ROLE
	$('#participant_role').on('click','.edit_pr_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cprCode = td.find(".cpr_code").text();
		var mod = 'RMIC';

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updateConPartRole')?>',
			data: {'cprCode':cprCode, 'mod':mod},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
				$('#myModalis2 .modal-content #display_rmic').removeClass('hidden');
				$('#myModalis2 .modal-content #display_conference').addClass('hidden');
				$('#myModalis2 .modal-content #prosiding').addClass('hidden');
				$('#myModalis2 .modal-content #pRole').prop('readonly', true);
				$('#myModalis2 .modal-content #pRoleLabel').replaceWith('<label class="col-md-3 control-label">Participant Role</label>');
				$('#myModalis2 .modal-content #refCode').attr('disabled', 'disabled');
				$('#myModalis2 .modal-content #orderBy').prop('readonly', true);
				$('#myModalis2 .modal-content #cpdAcad').attr('disabled', 'disabled');
				$('#myModalis2 .modal-content #cpdNacad').attr('disabled', 'disabled');

				$('#myModalis2 .modal-content .display_rmic_lbl').replaceWith('<label class="col-md-3 control-label">Display RMIC? <b><font color="red">*</font></b></label>');
				$('#myModalis2 .modal-content .oth_detl1').replaceWith('<label class="col-md-3 control-label">Number of attachment <b><font color="red">*</font></b></label>');
				$('#myModalis2 .modal-content .oth_detl2').replaceWith('<label class="col-md-3 control-label oth_detl2">Checklist (BM) <b><font color="red">*</font></b></label>');
				$('#myModalis2 .modal-content .oth_detl3').replaceWith('<label class="col-md-3 control-label oth_detl3">Checklist (BI) <b><font color="red">*</font></b></label>');

			}
		});
	});

	// SAVE UPDATE PARTICIPANT ROLE
	$('#myModalis2').on('click', '.upd_pr', function (e) {
		e.preventDefault();
		var data = $('#updConPartRole').append('<input name="form[mod]" value="RMIC" class="hidden">').serialize();
		msg.wait('#updConPartRoleAlert');
		msg.wait('#updConPartRoleAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdConPartRole')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#updConPartRoleAlert');
				msg.show(res.msg, res.alert, '#updConPartRoleAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF151')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editConAllowAlert');
			}
		});	
	});

	// // DELETE CONFERENCE CATEGORY
	// $('#participant_role').on('click','.del_pr_btn', function() {
	// 	var thisBtn = $(this);
	// 	var td = thisBtn.closest("tr");
	// 	var cprCode = td.find(".cpr_code").text();
	// 	var cprDesc =  td.find(".cpr_desc").text();
	// 	//alert(refid);
		
	// 	$.confirm({
	// 	    title: 'Delete Conference Participant Role',
	// 	    content: 'Are you sure to delete this record? <br> <b>'+cprCode+' - '+cprDesc+'</b>',
	// 		type: 'red',
	// 	    buttons: {
	// 	        yes: function () {
	// 				$.ajax({
	// 					type: 'POST',
	// 					url: '<?php echo $this->lib->class_url('deleteConPartRole')?>',
	// 					data: {'cprCode' : cprCode},
	// 					dataType: 'JSON',
	// 					success: function(res) {
	// 						if (res.sts==1) {
	// 							$.alert({
	// 								title: 'Success!',
	// 								content: res.msg,
	// 								type: 'green',
	// 							});
	// 							thisBtn.parents('tr').fadeOut().delay(1000).remove();
	// 						} else {
	// 							$.alert({
	// 								title: 'Alert!',
	// 								content: res.msg,
	// 								type: 'red',
	// 							});
	// 						}
	// 					}
	// 				});			
	// 	        },
	// 	        cancel: function () {
	// 	            $.alert('Canceled Delete Record!');
	// 	        }
	// 	    }
	// 	});
		
	// });
</script>