<?php echo $this->lib->title('Conference / Conference Setup') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ASF032 - Conference Setup</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Conference Category</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Conference Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Admin Hierarchy</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Notification Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Conference Allowance</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Country Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">Participant Role</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="conference_category">
                                        <div class="" id="loader">
										</div>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="conference_setup">	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s3">
									<div id="admin_hierachy">
										<div class="alert alert-info fade in">
											<b>Staff Admin Hierarchy (MPE Only)</b>
										</div>
										<div id="staff_admin_hierarchy">
										</div>

                                  		<br>

										<div class="alert alert-info fade in">
											<b>Certified Officer for Head of PTj</b>
										</div>	
										<div id="certified_officer">
										</div>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s4">
									<div id="notification_setup">
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="conference_allowance">
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="country_setup">
									</div>
                                </div>

								<div class="tab-pane fade" id="s7">
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
	TAB 1 - CONFERENCE CATEGORY
	-----------------------------*/
    // POPULATE CONFERENCE CATEGORY
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getConferenceCat')?>',
		//data: '',
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#conference_category').html(res);
			cf_row = $('#tbl_cc_list').DataTable({
				"ordering":false,
			});
		},
		complete: function(){
			$('#loader').hide();
		},
    });

    // ADD CONFERENCE CATEGORY MODAL
	$('#conference_category').on('click','.add_cc_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConferenceCat')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE INSERT CONFERENCE CATEGORY
	$('#myModalis2').on('click', '.ins_cc', function (e) {
		e.preventDefault();
		var data = $('#addConferenceCat').serialize();
		msg.wait('#conferenceCatAlert');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConferenceCat')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#conferenceCatAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						$('#tbl_cc_list tbody').append(res.cc_row);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#conferenceCatAlert');
			}
		});	
	});

	// EDIT CONFERENCE CATEGORY MODAL
	$('#conference_category').on('click','.edit_cc_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var ccCode = td.find(".cc_code").text();
		var ccDesc =  td.find(".cc_desc").text();
		//alert(ccCode);

		srow = $(this).closest("tr");
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editConferenceCat')?>',
			data: {'ccCode':ccCode, 'ccDesc':ccDesc},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CONFERENCE CATEGORY
	$('#myModalis2').on('click', '.save_edit_cc_btn', function (e) {
		e.preventDefault();
		var data = $('#editConferenceCat').serialize();
		msg.wait('#editConferenceCatAlert');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditConferenceCat')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editConferenceCatAlert');
				
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						srow.find('.cc_desc').text(res.cc_col.CC_DESC);
						srow.find('.cc_from').text(res.cc_amt_from);
						srow.find('.cc_to').text(res.cc_amt_to);
						srow.find('.cc_head_rec').text(res.cc_col.CC_HEAD_RECOMMEND);
						srow.find('.cc_tnca_app').text(res.cc_col.CC_TNCA_APPROVE);
						srow.find('.cc_vc_app').text(res.cc_col.CC_VC_APPROVE);
						srow.find('.cc_sts').html(res.cc_col.CC_STATUS);
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editConferenceCatAlert');
			}
		});	
	});

	// DELETE CONFERENCE CATEGORY
	$('#conference_category').on('click','.del_cc_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var ccCode = td.find(".cc_code").text();
		var ccDesc =  td.find(".cc_desc").text();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Conference Category',
		    content: 'Are you sure to delete this record? <br> <b>'+ccCode+' - '+ccDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConferenceCategory')?>',
						data: {'ccCode' : ccCode},
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
	TAB 2 - CONFERENCE SETUP
	-----------------------------*/
	// POPULATE CONFERENCE SETUP
	$('#conference_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conferenceSetup')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#conference_setup').html(res);
		}
	});	

	// SAVE UPDATE CONFERENCE SETUP
	$('#conference_setup').on('click', '.save_con_setup', function (e) {
		e.preventDefault();
		var data = $('#saveConSet').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
		msg.wait('#conSetAlert');
		msg.wait('#conSetAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConferenceSet')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#conSetAlert');
				msg.show(res.msg, res.alert, '#conSetAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
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

	// SAVE UPDATE GUIDELINE URL
	$('#conference_setup').on('click', '.save_gui_url', function (e) {
		e.preventDefault();
		var data = $('#saveGuidelineURL').serialize();
		msg.wait('#conURLAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConURL')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#conURLAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#conURLAlert');
			}
		});	
	});

	// ADD CONFERENCE SETUP OVERSEA
	$('#conference_setup').on('click','.add_cso_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConSetOversea')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE INSERT CONFERENCE CATEGORY
	$('#myModalis2').on('click', '.save_con_set_ovsea', function (e) {
		e.preventDefault();
		var data = $('#addConSetOversea').serialize();
		msg.wait('#addConSetOverseaAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConSetOvsea')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addConSetOverseaAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addConSetOverseaAlert');
			}
		});	
	});

	// DELETE CONFERENCE SETUP (OVERSEA)
	$('#conference_setup').on('click','.del_cso_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var parmNo = td.eq(0).html().trim();
		var email = td.eq(1).html().trim();
		// alert(email);
		
		$.confirm({
		    title: 'Delete Conference Setup (Oversea)',
		    content: 'Are you sure to delete this record? <br> <b>'+parmNo+' - '+email+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConSetOvsea')?>',
						data: {'parmNo' : parmNo},
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
	$('#conference_setup').on('click','.add_sci_btn', function(){
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
		var data = $('#addStfConInfo').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
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
	$('#conference_setup').on('click','.edit_sci_btn', function(){
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
		var data = $('#editStfConInfo').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
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
	$('#conference_setup').on('click','.del_sci_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var parmNo = td.eq(0).html().trim();
		var ext = td.eq(1).html().trim();
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
						data: {'parmNo' : parmNo},
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

	// SAVE UPDATE REMINDER SETUP
	$('#conference_setup').on('click', '.save_reminder_setup', function (e) {
		e.preventDefault();
		var data = $('#saveRemSet').serialize();
		msg.wait('#remSetAlert');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveRemSet')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#remSetAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#remSetAlert');
			}
		});	
	});

	/*-----------------------------
	TAB 3 - ADMIN HIERARCHY
	-----------------------------*/
	// POPULATE STAFF ADMIN HIERARCHY (MPE ONLY)
	$('#staff_admin_hierarchy').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getStfAdminHier')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#staff_admin_hierarchy').html(res);
			cf_row = $('#tbl_sah_list').DataTable({
				"ordering":false,
			});
		}
	});	

	// POPULATE CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#certified_officer').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getCerOfficer')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#certified_officer').html(res);
			cf_row = $('#tbl_cohp_list').DataTable({
				"ordering":false,
			});
		}
	});	

	// ADD STAFF ADMIN HIER
	$('#staff_admin_hierarchy').on('click','.add_sah_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStfAdminHier')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE STAFF ADMIN HIER
	$('#myModalis2').on('click', '.ins_sah', function (e) {
		e.preventDefault();
		var data = $('#addStfAdminHier').serialize();
		msg.wait('#addStfAdminHierAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveStfAdminHier')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addStfAdminHierAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addStfAdminHierAlert');
			}
		});	
	});

	// DELETE STAFF ADMIN HIER
	$('#staff_admin_hierarchy').on('click','.del_sah_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var apmCode = td.eq(0).html().trim();
		var apmDesc = td.eq(1).html().trim();
		// alert(email);
		
		$.confirm({
		    title: 'Delete Staff Admin Hierarchy',
		    content: 'Are you sure to delete this record? <br> <b>'+apmCode+' - '+apmDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteStfAdminHier')?>',
						data: {'apmCode' : apmCode},
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

	// UPDATE STAFF ADMIN HIER
	$('#staff_admin_hierarchy').on('click','.edit_sah_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var apmCode = td.eq(0).html().trim();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStfAdminHier')?>',
			data: {'apmCode':apmCode},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE STAFF ADMIN HIER
	$('#myModalis2').on('click', '.upd_sah', function (e) {
		e.preventDefault();
		var data = $('#editStfAdminHier').serialize();
		msg.wait('#editStfAdminHierAlert');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updateStfAdminHier')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editStfAdminHierAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editStfAdminHierAlert');
			}
		});	
	});

	// ADD CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#certified_officer').on('click','.add_cohp_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCerOfficer')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#myModalis2').on('click', '.ins_cohp', function (e) {
		e.preventDefault();
		var data = $('#addCerOfficer').serialize();
		msg.wait('#addCerOfficerAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveCerOfficer')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addCerOfficerAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addCerOfficerAlert');
			}
		});	
	});

	// DELETE CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#certified_officer').on('click','.del_cohp_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cdhCode = td.eq(0).html().trim();
		var cdhDesc = td.eq(1).html().trim();
		// alert(email);
		
		$.confirm({
		    title: 'Delete Certified Officer',
		    content: 'Are you sure to delete this record? <br> <b>'+cdhCode+' - '+cdhDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteCerOfficer')?>',
						data: {'cdhCode' : cdhCode},
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

	// UPDATE CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#certified_officer').on('click','.edit_cohp_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cdhCode = td.eq(0).html().trim();
		var cdhDesc = td.eq(1).html().trim();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editCerOfficer')?>',
			data: {'cdhCode':cdhCode, 'cdhDesc':cdhDesc},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CERTIFIED OFFICER FOR HEAD OF PTJ
	$('#myModalis2').on('click', '.upd_cohp', function (e) {
		e.preventDefault();
		var data = $('#editCerOfficer').serialize();
		msg.wait('#editCerOfficerAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updateCerOfficer')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editCerOfficerAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s3','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editCerOfficerAlert');
			}
		});	
	});

	/*-----------------------------
	TAB 4 - NOTIFICATION SETUP
	-----------------------------*/

	// NOTIFICATION SETUP
	$('#notification_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('notificationSetup')?>',
		data: '',
		success: function(res) {
			$('#notification_setup').html(res);
		}
	});	

	// SAVE UPDATE NOTIFICATION SETUP
	$('#notification_setup').on('click', '.save_noti_setup', function (e) {
		e.preventDefault();
		var data = $('#saveNotiSet').serialize();
		msg.wait('#notiSetAlert');
		msg.wait('#notiSetAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveNotiSet')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#notiSetAlert');
				msg.show(res.msg, res.alert, '#notiSetAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s4','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#notiSetAlertFoot');
			}
		});	
	});

	// ADD STAFF REMINDER
	$('#notification_setup').on('click','.add_stf_rem_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStaffReminder')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE STAFF REMINDER
	$('#myModalis2').on('click', '.save_stf_rem_btn', function (e) {
		e.preventDefault();
		var data = $('#addStaffReminder').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s4','ASF032')?>';
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
						data: {'stfID' : stfID},
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
	TAB 5 - CONFERENCE ALLOWANCE
	-----------------------------*/

	// POPULATE CONFERENCE ALLOWANCE
	$('#conference_allowance').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conferenceAllowance')?>',
		data: '',
		success: function(res) {
			$('#conference_allowance').html(res);
			cf_row = $('#tbl_ca_list').DataTable({
				"ordering":false,
			});
		}
	});

	// ADD CONFERENCE ALLOWANCE
	$('#conference_allowance').on('click','.add_ca_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConAllow')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE CONFERENCE ALLOWANCE
	$('#myModalis2').on('click', '.ins_ca', function (e) {
		e.preventDefault();
		var data = $('#addConAllow').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
		msg.wait('#addConAllowAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConAllow')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addConAllowAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s5','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addConAllowAlert');
			}
		});	
	});

	// DELETE CONFERENCE ALLOWANCE
	$('#conference_allowance').on('click','.del_ca_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var caCode = td.eq(0).html().trim();
		var caDesc = td.eq(1).html().trim();
		// alert(caCode);
		
		$.confirm({
		    title: 'Delete Conference Allowance',
		    content: 'Are you sure to delete this record? <br> <b>'+caCode+' - '+caDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConAllow')?>',
						data: {'caCode' : caCode},
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

	// UPDATE CONFERENCE ALLOWANCE
	$('#conference_allowance').on('click','.edit_ca_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var caCode = td.eq(0).html().trim();

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editConAllow')?>',
			data: {'caCode':caCode},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CONFERENCE ALLOWANCE
	$('#myModalis2').on('click', '.upd_ca', function (e) {
		e.preventDefault();
		var data = $('#editConAllow').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s5','ASF032')?>';
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
	TAB 6 - COUNTRY SETUP
	-----------------------------*/

	// POPULATE COUNTRY SETUP
	$('#country_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conCountrySetup')?>',
		data: '',
		success: function(res) {
			$('#country_setup').html(res);
			cf_row = $('#tbl_ccs_list').DataTable({
				"ordering":false,
			});
		}
	});

	// ADD COUNTRY SETUP
	$('#country_setup').on('click','.add_ccs_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConCountry')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE COUNTRY SETUP
	$('#myModalis2').on('click', '.ins_ccs', function (e) {
		e.preventDefault();
		var data = $('#addConCountry').serialize();
		msg.wait('#addConCountryAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConCountry')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addConCountryAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s6','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addConAllowAlert');
			}
		});	
	});

	// DELETE COUNTRY SETUP
	$('#country_setup').on('click','.del_ccs_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var cCode = td.eq(0).html().trim();
		var cDesc = td.eq(1).html().trim();
		// alert(caCode);
		
		$.confirm({
		    title: 'Delete Country',
		    content: 'Are you sure to delete this record? <br> <b>'+cCode+' - '+cDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConCountry')?>',
						data: {'cCode' : cCode},
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
	TAB 7 - PARTICIPANT ROLE
	-----------------------------*/

	// POPULATE PARTICIPANT ROLE
	$('#participant_role').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('conParticipantRole')?>',
		data: '',
		success: function(res) {
			$('#participant_role').html(res);
			cf_row = $('#tbl_pr_list').DataTable({
				"ordering":false,
			});
		}
	});

	// ADD PARTICIPANT ROLE
	$('#participant_role').on('click','.add_pr_btn', function(){
		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConPartRole')?>',
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});	

	// SAVE PARTICIPANT ROLE
	$('#myModalis2').on('click', '.ins_pr', function (e) {
		e.preventDefault();
		var data = $('#addConPartRole').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
		msg.wait('#addConPartRoleAlert');
		msg.wait('#addConPartRoleAlertFoot');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConPartRole')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addConPartRoleAlert');
				msg.show(res.msg, res.alert, '#addConPartRoleAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s7','ASF032')?>';
					}, 1000);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addConAllowAlert');
			}
		});	
	});

	// DETL PARTICIPANT ROLE
	$('#participant_role').on('click','.detl_pr_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cprCode = td.find(".cpr_code").text();
		var cprDesc =  td.find(".cpr_desc").text();
		//alert(cprCode+cprDesc);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conDetlPartRole')?>',
			data: {'cprCode':cprCode, 'cprDesc':cprDesc},
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

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('updateConPartRole')?>',
			data: {'cprCode':cprCode},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE PARTICIPANT ROLE
	$('#myModalis2').on('click', '.upd_pr', function (e) {
		e.preventDefault();
		var data = $('#updConPartRole').append('<input name="form[mod]" value="CON" class="hidden">').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s7','ASF032')?>';
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

	// DELETE CONFERENCE CATEGORY
	$('#participant_role').on('click','.del_pr_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var cprCode = td.find(".cpr_code").text();
		var cprDesc =  td.find(".cpr_desc").text();
		//alert(refid);
		
		$.confirm({
		    title: 'Delete Conference Participant Role',
		    content: 'Are you sure to delete this record? <br> <b>'+cprCode+' - '+cprDesc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConPartRole')?>',
						data: {'cprCode' : cprCode},
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
</script>