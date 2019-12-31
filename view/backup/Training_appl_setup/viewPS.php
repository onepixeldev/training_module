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
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false"><i class=""></i> Training Category</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false"><i class=""></i> Training Level</a>
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
			} else {
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
	var stt = $('#stTraining').val();
	var tSts = $('#trStatus').val();
	$('#trainingCategoryList').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingCategoryList')?>',
		data: {'trStr' : stt, 'trSts' : tSts},
		success: function(res) {
			//alert(res);
			$('#trainingCategoryList').html(res);
			dt_appl_row = $('#tbl_list_tc').DataTable({
				"ordering":false
			});
		}
	});

	// populate training level list
	// var stt = $('#stTraining').val();
	// var tSts = $('#trStatus').val();
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

	
</script>