<?php echo $this->lib->title('Conference / Conference Reports (PTj)', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF092 - Conference Reports (PTj)</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Report</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="report_ptj">
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
	var a_row = '';
	var b_row = '';

    $(document).ready(function(){

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

    // REPORT PTJ
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('reportPtj')?>',
		data: '',
		beforeSend: function() {
			$('#report_ptj').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_ptj').html(res);
		},
    });

	/*-----------------------------
	TAB 1 - REPORT
	-----------------------------*/

	// PRINT REPORT
	$('#report_ptj').on('click','.gen_rep_btn', function () {
		var thisBtn = $(this);
		var year = $("#year_a").val();
		var month = $("#month_a").val();
		var dept = $("#ptj_faculty_a").val();
		var category = $("#category_a").val();
		var allocation = $("#allocation_a").val();
		var status = $("#status_a").val();
		var repCode = thisBtn.attr('repCode');
		// console.log(year+' '+month+' '+dept+' '+category+' '+allocation+' '+status+' '+repCode);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'year':year, 'month':month, 'dept':dept, 'category':category, 'allocation':allocation, 'status':status, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});
</script>