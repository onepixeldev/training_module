<?php echo $this->lib->title('Setup / Training External Facilitator') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training External Facilitator Query</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Application List <span class=""></span></a>
                                </li>
                                <!--<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false"><i class=""></i> Details</a>
                                </li>-->
                            </ul>
							<!-- begin myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">
                                <div class="tab-pane fade active in" id="s1">
					                <div class="text-right">
					                    <button type="button" class="btn btn-primary btn-sm add_ef_btn"><i class="fa fa-plus"></i> Add New</button>
										<button type="button" repID="ATR021" class="btn btn-primary btn-sm genReportOthPDF"><i class="fa fa-bar-chart"></i> Run Report</button>
					                </div>
									<div id="application_list">
										<p>
										<table class="table table-bordered table-hover">
											<thead>
											<tr>
												<th class="text-center">No record found.</th>
											</tr>
											</thead>
										</table>
										</p>
									</div>
                                </div>
                                <div class="tab-pane fade" id="s2">
									<div id="detail_application">
									<table class="table table-bordered table-hover">
										<thead>
										<tr>
	                						<th class="text-center">Please select staff from Applicantion List Tab</th>
										</tr>
										</thead>
									</table>
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

<!-- Run Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <object id="web_viewer" data="" width="100%" height="500">
			Error: Embedded data could not be displayed.
		</object>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	var dt_appl_row = '';		// assign new object for DataTable
	//var applSetupRow = '';
	
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
            if (!empty($currtab)) {
                if ($currtab == 's2') {
                    echo "$('.nav-tabs li:eq(1) a').tab('show');";
                } else {
                    echo "$('.nav-tabs li:eq(0) a').tab('show');";
                }
            }
        ?>	
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
	});

	// populate list of application
	$('#application_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('applicationList')?>',
		data: '',
		success: function(res) {
			//alert(res);
			$('#application_list').html(res);
			dt_appl_row = $('#tbl_list_appl').DataTable({
				"ordering":false
			});
		}
	});		
	// --------------------------

	// ADD page
	$('.add_ef_btn').click(function () {
		//var dCode = $('#lsDept').val();
		//var tCode = $('#lsTerritory').val();
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addEF')?>',
			//data: {'departmentCode' : dCode, 'territoryID' : tCode},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});	

	// generate report oracle
	$('.genReportOthPDF').click(function(){
		
		var repCode = $(this).attr('repID');
			
		var formURL = '<?php echo $this->lib->class_url('genReportOther') ?>' + '/' + repCode;
		var mywin = window.open( formURL , 'report');
	});
	
	// generate report jasper
	/*$('.report_ef_btn').click(function(){
		$('#reportModal').modal('show');
		$('#web_viewer').attr('data','<?php echo $this->lib->class_url('report')?>');
	});*/

	
</script>