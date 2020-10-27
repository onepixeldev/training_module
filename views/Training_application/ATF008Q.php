<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Query Training</h2>				
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
								<div class="col-sm-12">
									<div id="alertTrainingQuery"></div>
								</div>
							</div>
                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Training Info <span class=""></span></a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false"><i class=""></i> Training Cost</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false"><i class=""></i> Target Group & Module Setup</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false"><i class=""></i> CPD Setup</a>
                                </li>
                                <!--li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false"><i class=""></i> Parent/Contact</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false"><i class=""></i> System</a>
                                </li-->
                            </ul>
							<!-- begin myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list_detl">
									<p>
										<?php $this->load->view('ATF008QTrainingInfo'); ?>
                                                                                <?php $this->load->view('ATF008QSpeaker'); ?>
										<?php $this->load->view('ATF008QFasilitator'); ?>
										
									</p>
									</div>
                                </div>
                                <div class="tab-pane fade" id="s2">
									<div id="training_list_detl2">
									<p>
										<?php $this->load->view('ATF008QTrainCost'); ?>
									</p>
									</div>
                                </div>
                                <div class="tab-pane fade" id="s3">
									<div id="training_list_target">
									<p>
										<?php $this->load->view('ATF008QTargetGrp'); ?>
                                                                                <?php $this->load->view('ATF008QModuleStp'); ?>
                                                                            
									</p>
									</div>
                                </div>
                                <div class="tab-pane fade" id="s4">
                                    <div id="training_list_detl4">
                                                                        <p>
										<?php $this->load->view('ATF008QSetupCPD'); ?>
									</p>
                                    </div>
									
                                </div>
                            </div>
                            <!-- end myTabContent1 -->
							<div class="modal-footer">
								<button type="button" class="btn btn-default back_btn">Back</button>
							</div>
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

<!-- ADD / EDIT / DELETE SALARY INCREMENT STATUS page will be displayed here -->
<div class="modal fade" id="myModalisSrv" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE SALARY INCREMENT STATUS -->

<script>
	//var dt_role_row = '';		// assign new object for DataTable
	//var dt_appl_row = '';		// assign new object for DataTable
	
	$(document).ready(function(){
	    $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	    });

	});

	// Back to main page
	$('.back_btn').click(function(event) {
		event.preventDefault();
		history.back(1);
	});	
   
	
        // LIST OF ELIGIBLE POSITION //
	$('#training_list_target').on('click', '.pos_tg_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var gpCode = td.eq(0).html().trim();

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('ATF008QListposition')?>',
			data: {'gpCode' : gpCode},
			success: function(res) {
				$('#myModalis .modal-content').html(res);	
				//$('#postAction').hide();
				//$('#tbl_list_eg_pos tbody #postAction').hide();
			}
		});
	});
	
</script>