<?php echo $this->lib->title('Training Parameter Setup') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Parameter Setup</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training Type <span class=""></span></a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false"> Training Category</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false"> Training Level</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false"> Sponsor Level</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false"> Organizer Level</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false"> Participant Role</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false"> Participant Status</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s8" data-toggle="tab" aria-expanded="false"> Sector Level</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s9" data-toggle="tab" aria-expanded="false"> Remark Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s10" data-toggle="tab" aria-expanded="false"> Attendance Status</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s11" data-toggle="tab" aria-expanded="false"> Assessment Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s12" data-toggle="tab" aria-expanded="false"> Training Needs - Type</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s13" data-toggle="tab" aria-expanded="false">Organizer Info</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
					                <div class="text-right">
					                    <button type="button" class="btn btn-primary btn-sm add_tt"><i class="fa fa-plus"></i> Add New Training Type</button>
					                </div>
									<div id="trainingTypeList">

									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Status</b></label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group text-left">
												<?php echo form_dropdown('sStatus', array(''=>' ALL ','Y'=>'Active','N'=>'Inactive'), $default_sts, 'class="form-control listFilter" id="trStatus"'); ?>
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
												<label><b>Structured Training</b></label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group text-left">
												<?php echo form_dropdown('sStatus', array(''=>' ALL ','Y'=>'YES','N'=>'NO'), $default_stt, 'class="form-control listFilter" id="stTraining"'); ?>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="text-left">   
												&nbsp;
											</div>
										</div>
									</div>
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tc"><i class="fa fa-plus"></i> Add New Training Category</button>
									</div>
									<div id="trainingCategoryList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tl"><i class="fa fa-plus"></i> Add New Training Level</button>
									</div>
									<div id="trainingLevelList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tsl"><i class="fa fa-plus"></i> Add New Sponsor Level</button>
									</div>
									<div id="trainingSponsorList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tol"><i class="fa fa-plus"></i> Add New Organizer Level</button>
									</div>
									<div id="trainingOrganizerLevelList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tpr"><i class="fa fa-plus"></i> Add New Participant Role</button>
									</div>
									<div id="trainingParticipantRoleList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s7">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tps"><i class="fa fa-plus"></i> Add New Participant Status</button>
									</div>
									<div id="trainingParticipantStatusList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s8">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_secl"><i class="fa fa-plus"></i> Add New Sector Level</button>
									</div>
									<div id="trainingSectorLevelList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s9">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_rs"><i class="fa fa-plus"></i> Add New Remark</button>
									</div>
									<div id="trainingRemarkSetupList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s10">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tas"><i class="fa fa-plus"></i> Add New Attendance Status</button>
									</div>
									<div id="trainingAttendanceStatusList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s11">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group text-right">
												<label><b>Assessment Setup Type</b></label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group text-left">
												<?php echo form_dropdown('sStatus', array(''=>' ALL ','FACILITATOR'=>'Facilitator','TRAINING'=>'Training'), $default_ast, 'class="form-control listFilterAst" id="aStsS"'); ?>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="text-left">   
												&nbsp;
											</div>
										</div>
									</div>
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tasv"><i class="fa fa-plus"></i> Add New Assessment Setup</button>
									</div>
									<div id="trainingAssessmentSetupList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s12">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_trt"><i class="fa fa-plus"></i> Add New Requirement Type</button>
									</div>
									<div id="trainingRequirementTypeList">

									</div>
                                </div>

								<div class="tab-pane fade" id="s13">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_toh"><i class="fa fa-plus"></i> Add New Organizer Info</button>
									</div>
									<div id="trainingOrganizerHeadList">

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
        <div class="modal-content">
		
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<script>
	var dt_appl_row = '';		// assign new object for DataTable
	//var applSetupRow = '';
	
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
			} elseif ($currtab == 's8'){
				echo "$('.nav-tabs li:eq(7) a').tab('show');";
			} elseif ($currtab == 's9'){
				echo "$('.nav-tabs li:eq(8) a').tab('show');";
			} elseif ($currtab == 's10'){
				echo "$('.nav-tabs li:eq(9) a').tab('show');";
			} elseif ($currtab == 's11'){
				echo "$('.nav-tabs li:eq(10) a').tab('show');";
			} elseif ($currtab == 's12'){
				echo "$('.nav-tabs li:eq(11) a').tab('show');";
			} elseif ($currtab == 's13'){
				echo "$('.nav-tabs li:eq(12) a').tab('show');";
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

	// populate training type list
	$('#trainingTypeList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingTypeList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingTypeList').html(res);
			dt_appl_row = $('#tbl_list_appl').DataTable({
				"ordering":false
			});
		}
	});	
	
	// populate training category list
	$('#trainingCategoryList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingCategoryList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingCategoryList').html(res);
			dt_appl_row = $('#tbl_list_tc').DataTable({
				"ordering":false
			});
		}
	});

	// filter list training category
	$('.listFilter').change(function() {
		var stt = $('#stTraining').val();
		var tSts = $('#trStatus').val();
		
		$('.nav-tabs li:eq(1) a').tab('show');
		$('#trainingCategoryList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('trainingCategoryList')?>',
			data: {'trStr' : stt, 'trSts' : tSts},
			success: function(res) {
				$('#trainingCategoryList').html(res);
				dt_appl_row = $('#tbl_list_tc').DataTable({
					"ordering":false
				});
			}
		});
	});	

	// populate training level list
	$('#trainingLevelList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingLevelList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingLevelList').html(res);
			dt_appl_row = $('#tbl_list_tl').DataTable({
				"ordering":false
			});
		}
	});

	// populate sponsor level list
	$('#trainingSponsorList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingSponsorList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingSponsorList').html(res);
			dt_appl_row = $('#tbl_list_tsl').DataTable({
				"ordering":false
			});
		}
	});

	// populate training organizer level list
	$('#trainingOrganizerLevelList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingOrganizerLevelList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingOrganizerLevelList').html(res);
			dt_appl_row = $('#tbl_list_tol').DataTable({
				"ordering":false
			});
		}
	});

	// populate training participant role list
	$('#trainingParticipantRoleList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingParticipantRoleList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingParticipantRoleList').html(res);
			dt_appl_row = $('#tbl_list_pr').DataTable({
				"ordering":false
			});
		}
	});

	// populate training participant status list
	$('#trainingParticipantStatusList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingParticipantStatusList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingParticipantStatusList').html(res);
			dt_appl_row = $('#tbl_list_ps').DataTable({
				"ordering":false
			});
		}
	});

	// populate training sector level list
	$('#trainingSectorLevelList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingSectorLevelList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingSectorLevelList').html(res);
			dt_appl_row = $('#tbl_list_secl').DataTable({
				"ordering":false
			});
		}
	});

	// populate training remark setup list
	$('#trainingRemarkSetupList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingRemarkSetupList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingRemarkSetupList').html(res);
			dt_appl_row = $('#tbl_list_rs').DataTable({
				"ordering":false
			});
		}
	});

	// populate training attendance status list
	$('#trainingAttendanceStatusList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingAttendanceStatusList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingAttendanceStatusList').html(res);
			dt_appl_row = $('#tbl_list_tas').DataTable({
				"ordering":false
			});
		}
	});

	// populate training assessment setup list
	$('#trainingAssessmentSetupList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingAssessmentSetupView')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingAssessmentSetupList').html(res);
			dt_appl_row = $('#tbl_list_tasv').DataTable({
				"ordering":false
			});
		}
	});

	// filter list training assessment setup
	$('.listFilterAst').change(function() {
		var aStsS = $('#aStsS').val();
		
		$('.nav-tabs li:eq(10) a').tab('show');
		$('#trainingAssessmentSetupList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('trainingAssessmentSetupView')?>',
			data: {'aSts' : aStsS},
			success: function(res) {
				$('#trainingAssessmentSetupList').html(res);
				dt_appl_row = $('#tbl_list_tasv').DataTable({
					"ordering":false
				});
			}
		});
	});	

	// populate training requirement type list
	$('#trainingRequirementTypeList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingRequirementTypeList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingRequirementTypeList').html(res);
			dt_appl_row = $('#tbl_list_trt').DataTable({
				"ordering":false
			});
		}
	});

	// populate training organizer info list
	$('#trainingOrganizerHeadList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingOrganizerHeadList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingOrganizerHeadList').html(res);
			dt_appl_row = $('#tbl_list_toh').DataTable({
				"ordering":false
			});
		}
	});
	

	// ADD - training type
	$('.add_tt').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingType')?>',
			//data: {'departmentCode' : dCode, 'territoryID' : tCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training category
	$('.add_tc').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingCategory')?>',
			//data: {'departmentCode' : dCode, 'territoryID' : tCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training level
	$('.add_tl').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingLevel')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training sponsor level
	$('.add_tsl').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addSponsorLevel')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training organizer level
	$('.add_tol').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addOrganizerLevel')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training participant role
	$('.add_tpr').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addParticipantRole')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// ADD - training participant status
	$('.add_tps').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addParticipantStatus')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	
	
	// ADD - training sector level
	$('.add_secl').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addSectorLevel')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training remark setup
	$('.add_rs').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addRemarkSetup')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training attendance status
	$('.add_tas').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addAttendanceStatus')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training assessment setup
	$('.add_tasv').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingAssessmentSetup')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training requirement type
	$('.add_trt').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingRequirementType')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// ADD - training organizer head
	$('.add_toh').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTrainingOrganizerHead')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	
	
</script>