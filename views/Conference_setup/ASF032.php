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
	$('#myModalis2').on('click', '.ins_cc', function () {
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
				msg.danger('Please contact administrator.', '#alert');
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
	$('#myModalis2').on('click', '.save_edit_cc_btn', function () {
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
				msg.danger('Please contact administrator.', '#alert');
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
	$('#conference_setup').on('click', '.save_con_setup', function () {
		var data = $('#saveConSet').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
					}, 1000);
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

	// SAVE UPDATE GUIDELINE URL
	$('#conference_setup').on('click', '.save_gui_url', function () {
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
					}, 1000);
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

	// SAVE UPDATE GUIDELINE URL
	$('#conference_setup').on('click', '.save_gui_url', function () {
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
					}, 1000);
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
	$('#myModalis2').on('click', '.save_con_set_ovsea', function () {
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
					}, 1000);
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
	$('#myModalis2').on('click', '.save_staff_contact_info', function () {
		var data = $('#addStfConInfo').serialize();
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
						location = '<?php echo $this->lib->class_url('viewTabFilter','s2')?>';
					}, 1000);
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

	/*-----------------------------
	TAB 3 - CONFERENCE SETUP
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

	// ADD STAFF CONTACT INFO
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
</script>