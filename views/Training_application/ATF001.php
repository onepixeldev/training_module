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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training Info</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Target Group</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Module Setup</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">CPD Setup</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
									<div id="trainingInfo">
									</div>
							
									<div>
										<div id="speakerInfo">
											<h4 class="panel-heading bg-color-blueDark txt-color-white">Speaker Info</h4>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from Training Info</th>
												</tr>
												</thead>
											</table>
										</div>
									</div>
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
										<button type="button" class="btn btn-primary btn-sm add_egs"><i class="fa fa-plus"></i> Add New Effectiveness Grading Setup</button>
									</div>
									<div id="effGraSetup">

									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div class="text-right">
										<button type="button" class="btn btn-primary btn-sm add_tcl"><i class="fa fa-plus"></i> Add New Training Competency Level</button>
									</div>
									<div id="trainingCompetencyLevel">

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
	//var dt_row2 = '';
	
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
				"lengthMenu": [[4, 8], [4, 8]]
			});
		}
    });
    
	// ADD - New Training
	$('.add_nt').click(function () {
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addNewTraining')?>',
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});

	// populate state add new training
	$('.modal-content').on('change','#country', function() {
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
		
	// populate organizer info add new training
	$('.modal-content').on('change', '#orginfo', function() {
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

	//$('.select_training_btn').click(function() 
	$('#trainingInfo').on('click', '.select_training_btn', function(){
		var thisBtn = $(this);
		var tsRefID = thisBtn.val();
		//alert(tsRefID);

		//$('#assessment_list_spinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		//$('#ef_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('speakerInfo')?>',
			data: {'tsRefID' : tsRefID},
			success: function(res) {
				$('#speakerInfo').html(res);
				dt_row = $('#tbl_list_si').DataTable({
					"ordering":false,
					"lengthMenu": [[3, 6], [3, 6]]
				});

				/*$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('effSetup')?>',
					data: {'codeTAC' : codeTAC, 'descTAC' : descTAC},
					success: function(res2) {
						$('#ef_setup').html(res2);
					}
				});	*/
			}
		});
	});
</script>