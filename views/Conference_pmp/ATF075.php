<?php echo $this->lib->title('Conference / Conference Application - Manual Entry') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF075 - Conference Application - Manual Entry</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Conference List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Staff List</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Conference Application</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Conference Leave</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Allowances</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">HOD Approval/Verification</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">TNC (A/A) / VC Approval/Verification</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Month</b></label>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group text-left">
												<?php echo form_dropdown('sMonth', $month_list, $cur_month, 'class="form-control listFilter" id="sMonth"'); ?>
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

									<div id="conference_list">
                                        <div class="" id="loader">
										</div>
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="staff_list_conference">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select conference from Conference List</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div> 

								<div class="tab-pane fade" id="s3">
									<div id="conference_application">
										<div class="alert alert-info fade in">
											<b>Staff Conference Details</b>
										</div>
										<div id="staff_conference_details">
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
	var ca_row = '';
	
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
        if (!empty($currtab)) {
            if ($currtab == 's1'){
                echo "$('.nav-tabs li:eq(0) a').tab('show');";
            }
		}
        ?>
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - CONFERENCE LIST
	-----------------------------*/

    // POPULATE CONFERENCE LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getConferenceInfoList')?>',
		//data: '',
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#conference_list').html(res);
			ca_row = $('#tbl_ca_list').DataTable({
				"ordering":false,
			});
		},
		complete: function(){
			$('#loader').hide();
		},
    });

    // CONFERENCE LIST  FILTER
	$('.listFilter').change(function() {
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		// alert(''+sMonth+',' +sYear);
		
		$.ajax({
            type: 'POST',
            url: '<?php echo $this->lib->class_url('getConferenceInfoList')?>',
            data: {'sMonth' : sMonth, 'sYear' : sYear},
            beforeSend: function() {
                $('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
            },
            success: function(res) {
                $('#conference_list').html(res);
                ca_row = $('#tbl_ca_list').DataTable({
                    "ordering":false,
                });
            },
            complete: function(){
                $('#loader').hide();
            },
        });
	});

	// CONFERENCE STAFF LIST
	$('#conference_list').on('click','.con_app_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var crRefID = td.eq(0).html().trim();
		var crName = td.eq(1).html().trim();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffConferenceApplication')?>',
			data: {'refid' : crRefID, 'crName' : crName},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_list_conference').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#staff_list_conference').html(res);
				
				ca_row = $('#tbl_list_sta_cr').DataTable({
					"ordering":false,
				});
			}
		});
	});	

	// ADD STAFF TO CONFERENCE
	$('#staff_list_conference').on('click','.con_app_add_btn', function(){
		$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addStaffConference')?>',
			success: function(res) {
				$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
				$('.nav-tabs li:eq(2) a').tab('show');
				$('#staff_conference_details').html(res);
			}
		});
	});

    // ADD CONFERENCE INFORMATION MODAL
	$('#conference_info_list').on('click','.con_inf_add_btn', function(){
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addConferenceInfo')?>',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});	

	// SAVE INSERT CONFERENCE INFORMATION
	$('#myModalis').on('click', '.ins_con_info', function () {
		var data = $('#addConInfo').serialize();
		msg.wait('#addConInfoAlert');
        msg.wait('#addConInfoAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveConInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addConInfoAlert');
                msg.show(res.msg, res.alert, '#addConInfoAlertFoot');

				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
                        location = '<?php echo $this->lib->class_url('viewTabFilterATF093','s1')?>';
					}, 1000);
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

	// DETL CONFERENCE INFORMATION
	$('#conference_info_list').on('click','.con_inf_detl_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(1).html().trim();
		//alert(cprCode+cprDesc);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('conInfoSetupDetl')?>',
			data: {'refid':refid, 'title':title},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// EDIT CONFERENCE INFORMATION MODAL
	$('#conference_info_list').on('click','.con_inf_edit_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(1).html().trim();
		//alert(ccCode);

		srow = $(this).closest("tr");
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editConferenceInfo')?>',
			data: {'refid':refid, 'title':title},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
			}
		});
	});

	// SAVE UPDATE CONFERENCE INFORMATION
	$('#myModalis').on('click', '.edit_con_info', function () {
		var data = $('#editConInfo').serialize();
		msg.wait('#editConInfoAlert');
		msg.wait('#editConInfoAlertFoot');
		//alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveEditConInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editConferenceCatAlert');
				msg.show(res.msg, res.alert, '#editConInfoAlertFoot');
				
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilterATF093','s1')?>';
					}, 1000);
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

	// DELETE CONFERENCE INFORMATION
	$('#conference_info_list').on('click','.con_inf_del_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(1).html().trim();
		// alert(email);
		
		$.confirm({
		    title: 'Delete Conference',
		    content: 'Are you sure to delete this record? <br> <b>'+refid+' - '+title+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteConInfo')?>',
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
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});
</script>