<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF147 - Training Secretariat Report - Manual Entry</h2>				
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
								<div class="col-sm-3">
									<div class="form-group text-right">
										<label><b>Department</b></label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group text-left">
										<?php echo form_dropdown('sDept', $dept_list, $curUsrDept, 'class="form-control listFilter" id="sDept"'); ?>
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
										<label><b>Month</b></label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group text-left">
										<?php echo form_dropdown('sMonth', $month_list, $defMonth, 'class="form-control listFilter" id="sMonth"'); ?>
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
										<?php echo form_dropdown('sYear', $year_list, $curYear, 'class="form-control listFilter" id="sYear"'); ?>
									</div>
								</div>
							</div>
                            

                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Course Info</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="training_list">
                                        <div class="text-center" id="loader">
										</div>
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
	var tr_row = '';
    
	var intExt = '1';
	var disDept = '1';
	var disYear = '1';
    var screRpt = '1';
	
	$(document).ready(function(){
        $('.genReport').click(function () {
			var repCode = $(this).attr('repCode');
			var year_i = $("#year_i").val(); 
			var department = $("#department").val(); 
			var staffID = $("#staffID").val(); 
            var corTitle2 = $("#corTitle2").val(); 
			var courseDate = $("#courseDate").val(); 
			var sMonth = $("#sMonth").val(); 
			var sYear = $("#sYear").val();
            var corTitle = $("#corTitle").val();

            //alert(corTitle);
			
			$.post('<?php echo $this->lib->class_url('setParam') ?>', {repCode: repCode, year_i: year_i, department: department, staffID: staffID, corTitle2: corTitle2, courseDate: courseDate, sMonth: sMonth, sYear: sYear, corTitle: corTitle}, function (res) {
				var repURL = '<?php echo $this->lib->class_url('genReport') ?>';
				//alert(repURL);
				var mywin = window.open( repURL , 'report');
			}).fail(function(){
				msg.danger('Please contact administrator.', '#alert');        
			});
			
		});
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // POPULATE TRAINING LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingListRptManEnt')?>',
		data: {'disDept' : disDept, 'disYear' : disYear, 'intExt' : intExt, 'screRpt' : screRpt},
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);
			tr_row = $('#tbl_tr_list').DataTable({
                "ordering":false,
            });
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// TRAINING LIST FILTER
	$('.listFilter').change(function() {
		var sDept = $('#sDept').val();
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		//alert(''+sDept+',' +sMonth+''+sYear+'');
		
		$('.nav-tabs li:eq(0) a').tab('show');
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getTrainingListRptManEnt')?>',
			data: {'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear, 'intExt' : intExt, 'screRpt' : screRpt},
			success: function(res) {
				$('#training_list').html(res);
				tr_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
				});
			}
		});
    });
    
    // SELECT DETAIL TRAINING BTN
	$('#training_list').on('click','.select_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).text();
		var trainingN = td.eq(1).text();
		//alert(trainingN);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('reportManualEntryForm')?>',
			data: {'refid' : trRefID, 'tname' : trainingN},
			beforeSend: function() {
				$('#scre_report_form').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#scre_report_form').html(res);
				$('html, body').animate({
					scrollTop: $("#scre_report_form").offset().top
				}, 1000)
			}
		});
    });

    // SAVE SECRET REPORT FORM
	$('#training_list').on('click', '.save_scre_report_form', function (e) { 
		e.preventDefault();
		var refid = $('#refidTr').val();
		var trName = $('.save_scre_report_form').data("tr-name");

		var sDept = $('#sDept').val();
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();

        var data = $('#secretReportForm').serialize();
		msg.wait('#alertSecretRptForm');
		msg.wait('#alertFooterSecretRptForm');
		//alert(refid+trName);
		$('.btn').attr('disabled', 'disabled');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveSecretReport')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#alertSecretRptForm');
				msg.show(res.msg, res.alert, '#alertFooterSecretRptForm');
				if (res.sts == 1) {
					setTimeout(function () {
						// REFRESH SUMMARY & FORM
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('getTrainingListRptManEnt')?>',
							data: {'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear, 'intExt' : intExt, 'screRpt' : screRpt},
							success: function(res) {
								$('#training_list').html(res);
								tr_row = $('#tbl_tr_list').DataTable({
									"ordering":false,
								});
							}
						});

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('reportManualEntryForm')?>',
							data: {'refid' : refid, 'tname' : trName},
							beforeSend: function() {
								$('#scre_report_form').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#scre_report_form').html(res);
							}
						});

						$('.btn').removeAttr('disabled');
					}, 1500);
				} else if(res.sts == 2) {
					setTimeout(function () {
						// REFRESH FORM ONLY
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('reportManualEntryForm')?>',
							data: {'refid' : refid, 'tname' : trName},
							beforeSend: function() {
								$('#scre_report_form').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#scre_report_form').html(res);
							}
						});

						$('.btn').removeAttr('disabled');
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertSecretRptForm');
				msg.danger('Please contact administrator.', '#alertFooterSecretRptForm');
			}
		});	
    });

	// GENERATE REPORT FORM
	$('#training_list').on('click','.scre_gen_rpt_btn', function () {
			var refid = $(this).val();
			var repCode =  $(this).data("form-code");
            //alert(formCode);
			
			// var formURL = '<?php //echo $this->lib->class_url('genEvaReport') ?>' + '/' + formCode + '/' + refid;
        	// var mywin = window.open( formURL , 'report');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
				data: {'repCode': repCode, 'refid': refid},
				dataType: 'JSON',
				success: function(res) {
					window.open("report?r="+res.report,"mywin","width=800,height=600");
				}
			});
	});

	// ADD SECRET DUTY MODAL
	$('#training_list').on('click', '.add_scr_btn', function() {
		var refid =  $(this).val();
		// alert(refid);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addSecretDuty')?>',
			data: {'refid' : refid},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

	// SAVE SECRET DUTY
	$('#myModalis2').on('click', '.save_secret_duty', function (e) { 
		e.preventDefault();
		var refid = $('#refidTr').val();
		var trName = $('.save_scre_report_form').data("tr-name");
        var data = $('#addSecretForm').serialize();
		msg.wait('#addSercetDutyAlert');
		//alert(refid+trName);
		$('.btn').attr('disabled', 'disabled');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveSecretDuty')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#addSercetDutyAlert');
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('reportManualEntryForm')?>',
							data: {'refid' : refid, 'tname' : trName},
							beforeSend: function() {
								$('#scre_report_form').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#scre_report_form').html(res);
							}
						});
						$('.btn').removeAttr('disabled');
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addSercetDutyAlert');
			}
		});	
    });

	// POPULATE DEPARTMENT
	$('#myModalis2').on('change','#secretariat_id', function() {
		var staff_id = $('#secretariat_id').val();
		// alert(staff_id);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffDept')?>',
			data: {'staff_id' : staff_id},
			dataType: 'JSON',
			beforeSend: function() {
				$('#loaderDept').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#loaderDept').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
				if(res.sts == 1) {
					$('#secretDept').val(res.dept);
				} else {
					$('#secretDept').val('Department');
				}
			}
		});
    });

	// SECRETARIAT ON DUTY
	$('#training_list').on('click','.del_scr_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = thisBtn.val();
		var seq = td.eq(0).html().trim();
		var scrId = td.eq(1).html().trim();
		var scrName = td.eq(2).html().trim();
		// alert(refid+' '+seq+' '+scrId+' '+spName);
		
		$.confirm({
		    title: 'Delete Secretariat Incharge',
		    content: 'Are you sure to delete this record? <br> <b>'+scrId+' - '+scrName+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('deleteScrIncharge')?>',
						data: {'refid' : refid, 'seq' : seq, 'scrId' : scrId},
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