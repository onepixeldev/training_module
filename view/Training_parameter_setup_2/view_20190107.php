<?php echo $this->lib->title('Training Parameter Setup 2') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Parameter Setup 2 Query</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training Effectiveness Evaluation <span class=""></span></a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false"> Effectiveness Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false"> Competency Level</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false"> Training Memo</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false"> Training Component</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false"> External Agency Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false"> Cost / Fee Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s8" data-toggle="tab" aria-expanded="false"> Effectiveness Grading</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
									<br>
									<div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
										<table class="table table-bordered table-hover">
										<tbody> 
											<tr data-parm-id="<?php //echo $hod_memo->HP_PARM_CODE?>">
												<td class="text-left col-md-3"><b>First Reminder (1)</b></td>
												<td class="text-center col-md-1"><?php echo $hod_memo->HP_PARM_DESC?> day(s)<b><font color="red">*</font></b></td>
												<td class="text-left">
													<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i></button>
												</td>
											</tr>
											<tr data-parm-id="<?php //echo $hod_memo2->HP_PARM_CODE?>">
												<td class="text-left col-md-3"><b>Second Reminder (2)</b></td>
												<td class="text-center col-md-1"><?php echo $hod_memo2->HP_PARM_DESC?> day(s)<b><font color="red">*</font></b></td>
												<td class="text-left">
													<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo2->HP_PARM_NO?>" title="Edit Record"><i class="fa fa-edit"></i></button>
												</td>
											</tr>
											<tr data-parm-id="<?php //echo $hod_memo3->HP_PARM_CODE?>">
												<td class="text-left col-md-3"><b>Third Reminder (3)</b></td>
												<td class="text-center col-md-1"><?php echo $hod_memo3->HP_PARM_DESC?> day(s)<b><font color="red">*</font></b></td>
												<td class="text-left">
													<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo3->HP_PARM_NO?>" title="Edit Record"><i class="fa fa-edit"></i></button>
												</td>
											</tr>
										</tbody>
										</table>
									</div>

									<div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
										<table class="table table-bordered table-hover">
										<tbody> 
											<tr>
												<td class="text-left col-md-3"><b>Reminder for sending memo to course evaluator</b></td>
												<td class="text-center col-md-1"><?php echo $tr_eva_memo->HP_PARM_DESC?> time(s)<b><font color="red">*</font></b></td>
												<td class="text-left">
													<button type="button" class="btn btn-success btn-xs edit_hod_mem" data-parm-id="<?php echo $tr_eva_memo->HP_PARM_CODE?>" value="<?php echo $tr_eva_memo->HP_PARM_NO?>" title="Edit Record"><i class="fa fa-edit"></i></button>
												</td>
											</tr>
										</tbody>
										</table>
									</div>

									<div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
										<table class="table table-bordered table-hover">
										<tbody> 
											<tr>
												<td class="text-left col-md-3"><b>Function for portal</b></td>
												<td class="text-center col-md-1"><?php
												$por = ""; 
												if ($tr_eva_por->HP_PARM_DESC == "Y") {
													$por = "ENABLED";
												} else {
													$por = "DISABLED";
												}
												
												echo $por?></td>
												<td class="text-left">
													<button type="button" class="btn btn-success btn-xs edit_hod_mem" data-parm-id="<?php echo $tr_eva_por->HP_PARM_CODE?>" value="<?php echo $tr_eva_memo->HP_PARM_NO?>" title="Edit Record"><i class="fa fa-edit"></i></button>
												</td>
											</tr>
										</tbody>
										</table>
									</div>

									<h6><b><font color="red">*</font></b> To disable this function, put 0 as value</h6>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tac"><i class="fa fa-plus"></i> Add New Effectiveness Category</button>
									</div>
									<div id="trEffectivenessSetup">

									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tcl"><i class="fa fa-plus"></i> Add New Training Competency Level</button>
									</div>
									<div id="trainingCompetencyLevel">

									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tmp"><i class="fa fa-plus"></i> Add New Training Memo (Participant)</button>
									</div>
									<div id="trainingMemoPar">
												
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tmc"><i class="fa fa-plus"></i> Add New Training Module Component</button>
									</div>
									<br>
									<div>
										<p>
											<div class="well">
												<div class="row">
													<table class="table table-bordered table-hover" id="tbl_list_tmc">
													<thead>
													<tr>
														<th class="text-center">Code</th>
														<th class="text-center">Description</th>
														<th class="text-center">Action</th>
													</tr>
													</thead>
													<tbody>
													<?php
														$no = 0;
														if (!empty($tr_mod_comp)) {
															foreach ($tr_mod_comp as $tmc) {
																
																echo '
																<tr>
																	<td class="text-center col-md-1">' . $tmc->TMC_COMPONENT_CODE . '</td>
																	<td class="text-left">' . $tmc->TMC_COMPONENT_DESC . '</td>
																	<td class="text-center col-md-1">
																		<button type="button" class="btn btn-success btn-xs edit_tmc" title="Edit Record"><i class="fa fa-edit"></i></button>
																		<button type="button" class="btn btn-danger btn-xs delete_tmc" title="Delete Record"><i class="fa fa-trash"></i></button>
																	</td>
																</tr>
																';
															}
														} else {
															echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
														}
													?>
													</tbody>
													</table>	
												</div>
											</div>
										</p>				
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="externalAgencySetup">
										<div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
											<table class="table table-bordered table-hover">
												<tbody> 
													<tr>
														<td class="text-left col-md-3"><b>Maximum interval for staff to apply for external agency training</b></td>
														<td class="text-center col-md-1"><?php echo $max_interval->HP_PARM_DESC?></td>
														<td class="text-left">
															<button type="button" class="btn btn-success btn-xs edit_eas" data-parm-id="<?php echo $max_interval->HP_PARM_CODE?>" value="<?php echo $max_interval->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i></button>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="table table-bordered table-hover">
												<tbody>
													<tr>
														<td class="text-left col-md-3"><b>Guideline URL</b></td>
														<td class="text-left col-md-6"><?php echo $guideline_url->HP_PARM_DESC?></td>
														<td class="text-left">
															<button type="button" class="btn btn-success btn-xs edit_eas" data-parm-id="<?php echo $guideline_url->HP_PARM_CODE?>" value="<?php echo $guideline_url->HP_PARM_NO?>" title="Edit Record"><i class="fa fa-edit"></i></button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>							
									</div>
                                </div>

								<div class="tab-pane fade" id="s7">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tcs"><i class="fa fa-plus"></i> Add New Cost Type</button>
									</div>
									<div id="trainingCostSetup">

									</div>
                                </div>

								<div class="tab-pane fade" id="s8">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_egs"><i class="fa fa-plus"></i> Add New Effectiveness Grading Setup</button>
									</div>
									<div id="effGraSetup">

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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
		
        </div><!-- /.modal-content -->
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
			} elseif ($currtab == 's5'){
				echo "$('.nav-tabs li:eq(4) a').tab('show');";
			} elseif ($currtab == 's6'){
				echo "$('.nav-tabs li:eq(5) a').tab('show');";
			} elseif ($currtab == 's7'){
				echo "$('.nav-tabs li:eq(6) a').tab('show');";
			}  elseif ($currtab == 's8'){
				echo "$('.nav-tabs li:eq(7) a').tab('show');";
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

	$.ajax({
		success: function() {
			dt_row = $('#tbl_list_tmc').DataTable({
				"ordering":false
			});
		}
	});

	// populate training effectiveness setup
	$('#trEffectivenessSetup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');	
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trEffSetup')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trEffectivenessSetup').html(res);
			dt_row2 = $('#tbl_list_es').DataTable({
				"ordering":false
			});
		}
	});

	// populate training competency level
	$('#trainingCompetencyLevel').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingCompetencyLevel')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingCompetencyLevel').html(res);
			dt_row = $('#tbl_list_tcl').DataTable({
				"ordering":false
			});
		}
	});	

	// populate training cost setup 
	$('#trainingCostSetup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('costTypeSetup')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingCostSetup').html(res);
			dt_row2 = $('#tbl_list_tcs').DataTable({
				"ordering":false
			});
			dt_row2 = $('#tbl_list_tfs').DataTable({
				"ordering":false
			});
		}
	});

	// populate training effectiveness grading setup 
	$('#effGraSetup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('effGraSetup')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#effGraSetup').html(res);
			dt_row2 = $('#tbl_list_egs').DataTable({
				"ordering":false
			});
		}
	});

	// populate training memo for participants 
	$('#trainingMemoPar').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingMemoPar')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingMemoPar').html(res);
			dt_row2 = $('#tbl_list_tmp').DataTable({
				"ordering":false
			});
		}
	});



	// EDIT page TRAINING_HOD_MEMO
	$('.edit_hod_mem').click(function () {
		var thisBtn = $(this);
		var recCode = thisBtn.val();
		var typeHra = thisBtn.data("parm-id");
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editHodMem')?>',
				data: {'hpp_no' : recCode, 'parm_code' : typeHra},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// ADD - Effectiveness Category Setup
	$('.add_tac').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTAC')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// ADD - Training Module Component
	$('.add_tmc').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTMC')?>',
			//data: {'departmentCode' : dCode, 'territoryID' : tCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// DELETE - Training Module Component
	$('.delete_tmc').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTMC')?>',
				data: {'codeTMC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT - Training Module Component
	$('.edit_tmc').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTMC')?>',
				data: {'codeTMC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page EXTERNAL AGENCY SETUP
	$('.edit_eas').click(function () {
		var thisBtn = $(this);
		var recCode = thisBtn.val();
		var typeHra = thisBtn.data("parm-id");
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editEAS')?>',
				data: {'eas_no' : recCode, 'parm_code' : typeHra},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// ADD - Training Competency Level
	$('.add_tcl').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTCL')?>',
			//data: {'departmentCode' : dCode, 'territoryID' : tCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// ADD - Training cost type
	$('.add_tcs').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addCTS')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// ADD - Training training effectiveness grading setup 
	$('.add_egs').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addEGS')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// ADD - training memo for participants 
	$('.add_tmp').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addTMP')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});
</script>