<?php echo $this->lib->title('Training / Reports for External Agency', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF144 - Reports for External Agency</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Print Letter</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Reports</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="print_letter">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
									<div id="reports">
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
	var stf_row = '';

	$(document).ready(function(){

		$("#myModalis").draggable({
			handle: ".modal-content"
		});

		$("#myModalis2").draggable({
			handle: ".modal-content"
		});

        // PREVENT SUBMIT RELOAD
		$('#myModalis').on('submit', function(e){
			e.preventDefault();
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // PRINT LETTER REPORT
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('printLetterRep')?>',
		data: '',
		beforeSend: function() {
			$('#print_letter').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#print_letter').html(res);
		},
    });

    // PRINT EXTERNAL TRAINING REPORT
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('extReport')?>',
		data: '',
		beforeSend: function() {
			$('#reports').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#reports').html(res);
		},
    });


	/*-----------------------------
	TAB 1 - PRINT LETTER
	-----------------------------*/

	// PRINT REPORT LETTER
	$('#print_letter').on('click','.gen_print_letter', function () {
		var thisBtn = $(this);
        var refid = $("#refid").val().toUpperCase();
		var staff_id = $("#staff_id").val().toUpperCase();
		var ref_no = $("#ref_no").val().toUpperCase();
		var repCode = thisBtn.attr('repCode');


		if(refid == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please select training title.',
				type: 'red',
			});
		} else {
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('setRepParam')?>',
				data: {'refid':refid, 'staff_id':staff_id, 'ref_no':ref_no, 'repCode':repCode},
				dataType: 'JSON',
				success: function(res) {
					window.open("report?r="+res.report,"mywin","width=800,height=600");
				}
			});
		}
	});

    ///// SEARCH STAFF//////
	// SEARCH STAFF
	$('#print_letter').on('click','.search_staff', function(){
		var refid = $("#refid").val().toUpperCase();

		if(refid == '') {
			$.alert({
				title: 'Alert!',
				content: 'Please select training title.',
				type: 'red',
			});
		} else {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('searchStaffMdExt')?>',
				data: {'refid':refid},
				success: function(res) {
					$('#myModalis .modal-content').html(res);

					stf_row = $('#myModalis #tbl_stf_res_list').DataTable({
								"ordering":false,
							});
				}
			});
		}
		
	});

	// SELECT STAFF ID
	$('#myModalis').on('click', '.select_staff_id', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staff_id = td.eq(0).html().trim();
		var staff_name = td.eq(1).html().trim();
		
		if(staff_id != '' && staff_name != '') {
			$('#staff_id').val(staff_id);
			$('#staff_name').val(staff_name);
		}
	});
	///// SEARCH STAFF//////


	// SEARCH TRAINING
	$('#print_letter').on('click','.search_train', function(){

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('searchTrainingMd')?>',
			data: '',
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				tr_row = $('#myModalis #tbl_tr_res_list').DataTable({
                    "ordering":false,
                });
			}
		});
	});

	// SELECT REFID
	$('#myModalis').on('click', '.select_refid', function () {
		$('#myModalis').modal('hide');

		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var title = td.eq(1).html().trim();
		
		if(refid != '' && title != '') {
			$('#refid').val(refid);
			$('#tr_title').val(title);
			$('#staff_id').val('');
			$('#staff_name').val('');
		}
	});

	/*-----------------------------
	TAB 2 - REPORTS
	-----------------------------*/

	// PRINT REPORT EXT
	$('#reports').on('click','.gen_rep_btn', function () {
		var thisBtn = $(this);
        var month = $("#fmonth").val();
		var year = $("#fYear").val();
		var dept = $("#fDept").val();
		var sts = $("#fStatus").val();
		var fee_code = $("#fCode").val();
		var repCode = thisBtn.attr('repCode');

        $.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
			data: {'month':month, 'year':year, 'dept':dept, 'sts':sts, 'fee_code':fee_code, 'repCode':repCode},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
	});
    
	
</script>