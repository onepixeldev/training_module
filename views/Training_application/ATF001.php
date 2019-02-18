<?php echo $this->lib->title('Training Setup') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Setup Query</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training List</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Add/Edit Training Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Target Group & Module Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>
								<!--<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>-->
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
									<div id="trainingInfo">
									
									</div>
							
									<!--<div id="speakerInfo">
										<h4 class="panel-heading bg-color-blueDark txt-color-white">Speaker Info</h4>
										<table class="table table-bordered table-hover" id="tbl_list_si">
											<thead>
											<tr>
												<th class="text-center">Please select training from Training Info</th>
											</tr>
											</thead>
										</table>
									</div>

									<div id="facilitatorInfo">
										<h4 class="panel-heading bg-color-blueDark txt-color-white">Facilitator Info</h4>
										<table class="table table-bordered table-hover" id="tbl_list_fi">
											<thead>
											<tr>
												<th class="text-center">Please select training from Training Info</th>
											</tr>
											</thead>
										</table>
									</div>-->
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="add_edit_tr_info">
										<table class="table table-bordered table-hover">
											<thead>
											<tr>
												<th class="text-center">Please select training from Training Info</th>
											</tr>
											</thead>
										</table>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s3">
									<div id="group_module_setup">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training Info</th>
												</tr>
												</thead>
											</table>
										</p>
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="cpd_setup">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training Info</th>
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

    // populate training info
	$('#trainingInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('trainingInfo')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#trainingInfo').html(res);
			dt_row = $('#tbl_list_ti').DataTable({
				"ordering":false,
				//"lengthMenu": [[4, 8], [4, 8]]
			});
		}
    });

	// add new training tab form
	$('#add_edit_tr_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('addNewTraining')?>',
		data: '',
		success: function(res) {
			$('#add_edit_tr_info').html(res);
		}
    });
    
	// add new training tab form (click button)
	$('#trainingInfo').on('click','.add_nt', function(){
		$('#add_edit_tr_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addNewTraining')?>',
			success: function(res) {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#add_edit_tr_info').html(res);
			}
		});
	});

	// populate state add new training form
	$('#add_edit_tr_info').on('change','#country', function() {
            var countCode = $(this).val();
            $('#faspinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
            $('#state').html('');
            //alert($countCode);
            
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->lib->class_url('stateList')?>',
                data: {'countryCode' : countCode},
                dataType: 'json',
                success: function(res) {
                    $('#faspinner').html('');

                    var resList = '<option value="" selected > ---Please select--- </option>';
                    
                    if (res.sts == 1) {
                        for (var i in res.stateList) {
                            resList += '<option value="'+res.stateList[i]['SM_STATE_CODE']+'">'+res.stateList[i]['SM_STATE_DESC']+'</option>';
                        }
                    } 
                    
                    $("#state").html(resList);				
                }
            });
	});
		
	// populate organizer info in add new training form
	$('#add_edit_tr_info').on('change', '#orginfo', function() {
		var organizerCode = $(this).val();
		$('#faspinner2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#orgAddress').html('');
		$('#orgPostcode').html('');
		$('#orgCity').html('');
		$('#orgState').html('');
		$('#orgCountry').html('');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('organizerInfo')?>',
			data: {'orgCode' : organizerCode},
			dataType: 'json',
			success: function(res) {
				if (res.sts == 1) {
					$('#faspinner2').html('');
					$('#orgAddress').val(res.orgInfo.TOH_ADDRESS);
					$('#orgPostcode').val(res.orgInfo.TOH_POSTCODE);
					$('#orgCity').val(res.orgInfo.TOH_CITY);
					$('#orgState').val(res.orgInfo.SM_STATE_DESC);
					$('#orgCountry').val(res.orgInfo.CM_COUNTRY_DESC);
				}			
			}
		});
	});

	// populate organizer info in add new training modal
	$('#add_edit_tr_info').on('click', '#search_str_tr', function() {
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setupStructuredTraining')?>',
			data: '',
			//dataType: 'json',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				dt_row = $('#tbl_list_str_tr').DataTable({
					"ordering":false,
					"lengthMenu": [[5, 10], [5, 10]]
				});		
			}
		});
	});

	// populate structured training field with selected value
	$('.modal-content').on('click', '.select_str_tr', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var strCode = td.eq(0).html().trim();
		var trTitle = td.eq(1).html().trim().replace(/&amp;/g, '&');
		//alert(trTitle);
		if(strCode != null && trTitle != null){
			$('#strTraining').val(strCode);
			$('#trTitle').val(trTitle);
			$('#myModalis').modal('hide');
		}
	});

	/* select training btn
	$('#trainingInfo').on('click', '.select_training_btn', function(){
		var thisBtn = $(this);
		var tsRefID = thisBtn.val();

		$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('speakerInfo')?>',
			data: {'tsRefID' : tsRefID},
			success: function(res) {
				$('#speakerInfo').html(res);
			}
		});

		$('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
			data: {'tsRefID' : tsRefID},
			success: function(res) {
				$('#facilitatorInfo').html(res);
			}
		});
	});

	// select training - target group, module & CPD setup
	$('#trainingInfo').on('click', '.target_group_btn', function(){
		var thisBtn = $(this);
		var tsRefID = thisBtn.val();
		var td = thisBtn.parent().siblings();
		var trainingN = td.eq(1).html().trim();
		
		$('#target_group_spinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#target_group').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('targetGroup')?>',
			data: {'tsRefID' : tsRefID, 'tName' : trainingN},
			success: function(res) {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#target_group').html(res);
				$('#target_group_spinner').html('');

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('moduleSetup')?>',
					data: {'tsRefID' : tsRefID, 'tName' : trainingN},
					success: function(res) {
						$('#module_setup').html(res);
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : tsRefID, 'tName' : trainingN},
					success: function(res) {
						$('#cpd_setup').html(res);
					}
				});
			}
		});
	});*/
	
	// update - training
	$('#trainingInfo').on('click','.edit_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();

		$('#add_edit_tr_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			data: {'refID' : trRefID},
			success: function(res) {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#add_edit_tr_info').html(res);
			}
		});
	});

	// structured training setup - training
	$('#trainingInfo').on('click','.structured_tr_set_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		//alert(trRefID);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('verifyStructuredTrainingSetup')?>',
			data: {'refID' : trRefID},
			dataType: 'JSON',
			success: function(res) {
				if(res.sts==1){
					//dt_appl_row.row( thisBtn.parents('tr') ).remove().draw();
					$('#myModalis .modal-content').hide()
					$.alert({
						title: 'Alert!',
						content: res.msg,
						type: 'red',
					});
					return;
				} else {
					$('#myModalis .modal-content').empty();
					$('#myModalis').modal('show');
					$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('setupStructuredTraining')?>',
						data: {'refID' : trRefID},
						success: function(res) {
							$('#myModalis .modal-content').hide().html(res).slideDown();
						}
					});
				}
			}
		});
	});

	// populate structured training in structured training setup modal
	/*$('.modal-content').on('change', '#strCode', function() {
		var structuredTrainingCode = $(this).val();
		$('#faspinner2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#title').html('');
		$('#category').html('');
		$('#area').html('');
		$('#type').html('');
		$('#competency').html('');
		//$('#orgCountry').html('');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('structuredTrainingInfo')?>',
			data: {'strCode' : structuredTrainingCode},
			dataType: 'json',
			success: function(res) {
				if (res.sts == 1) {
					$('#faspinner2').html('');
					$('#title').val(res.strTrInfo.TTH_TRAINING_TITLE);
					$('#category').val(res.strTrInfo.TTH_CATEGORY);
					$('#area').val(res.strTrInfo.TTH_TF_FIELD_DESC);
					$('#type').val(res.strTrInfo.TTH_TT_TYPE_DESC);
					$('#competency').val(res.strTrInfo.TTH_COMPETENCY);
				}			
			}
		});
	});*/

</script>