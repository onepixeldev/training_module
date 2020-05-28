<?php echo $this->lib->title('Training Application <i class="fa fa-caret-right"></i> Report for Training Evaluation ') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF166 - Reminders / Shipping Memos</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
			<div id="alert"></div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Year</b></label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group text-left">
                            <?php echo form_dropdown('form[year_i]', $year_list, $curYear, 'class="form-control" id="year_i"') ?>	
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-left">   
                            &nbsp;
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Department</b></label>
                        </div>
                    </div>
					<div class="col-sm-5">
					   	<div class="form-group text-left">
							<?php echo form_dropdown('form[department]', $dept_list, NULL, 'class="form-control" id="department"') ?>	
						</div>
					</div>
                    <div class="col-sm-4">
					 	<div class="text-left">   
							&nbsp;
						</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Staff ID</b></label>
                        </div>
                    </div>
					<div class="col-sm-5">
					   	<div class="form-group text-left">
							<?php echo form_dropdown('form[staff_id]', $staff_list, NULL, 'class="select2-filter form-control" style="width: 100%" id="staffID"') ?>	
						</div>
					</div>
                    <div class="col-sm-4">
					 	<div class="text-left">   
							&nbsp;
						</div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                                <label  class="col-md-2 control-label form-group text-right"><b>Course Title </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="corTitle2" name="form[course_title]" class="form-control upper_text_desc get_training_name" value="" placeholder="Course Title">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="corTitle2_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_training_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                    </div>
                    <!--div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Course Title</b></label>
                        </div>
                    </div>
                    
                    <div class="col-sm-5">
			<div class="form-group text-left">
                           <div id="loaderCT"></div>
                            <?php echo form_dropdown('form[course_title]', array(''=>'--- Please select year ---'), NULL, 'class="form-control deptFilter" id="corTitle2"') ?>	
			</div>
                    </div>
                    <div class="col-sm-4">
                    <div class="text-left">   
			&nbsp;
                    </div>
                    </div-->
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Course Date</b></label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<input type="text" name="form[course_date]" id="courseDate" class="form-control" placeholder="DD/MM/YYYY">
							&nbsp;<b>[Date Format: DD/MM/YYYY]</b>
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
					   	<div class="form-group text-right">
							&nbsp;<b><font color="red">Leave field blank to print all</font></b>
						</div>
					</div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>ATR079</b></label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group text-left">
                            <label>Laporan Penghantaran Memo Penilaian Keberkesanan Latihan</label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<button type="button" repCode="ATR079" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
						</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>ATR084</b></label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group text-left">
                            <label>Laporan Penghantaran Memo Tawaran Menghadiri Kursus / Latihan</label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<button type="button" repCode="ATR084" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
						</div>
                    </div>
                </div>

                <br><br><br><br><br>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Month</b></label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group text-left">
                            <?php echo form_dropdown('sMonth', $month_list, NULL, 'class="form-control listFilter" id="sMonth"'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
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

				<div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>ATR132</b></label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group text-left">
                            <label>Statistik Penghantaran Laporan Keberkesanan Latihan</label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<button type="button" repCode="ATR132" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
						</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    

    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Effectiveness Evaluation Report</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
			<div id="alert"></div>
            <div class="widget-body">
                <div class="row">
                    <div class="form-group">
                                <label  class="col-md-2 control-label form-group text-right"><b>Course Title </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="corTitle" name="form[course_title]" class="form-control upper_text_desc get_training_name2" value="" placeholder="Course Title">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="corTitle_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_training2_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                    </div>
                    <!--div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>Course Title</b></label>
                        </div>
                    </div>
					<div class="col-sm-5">
					   	<div class="form-group text-left">
							<?php echo form_dropdown('form[course_title]', $course_list_btm, NULL, 'class="form-control deptFilter" id="corTitle"') ?>	
						</div>
					</div>
                    <div class="col-sm-4">
					 	<div class="text-left">   
							&nbsp;
						</div>
                    </div-->
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>ATR133</b></label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group text-left">
                            <label>Senarai Penilai Yang Menghantar Borang Penilaian Keberkesanan Latihan</label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<button type="button" repCode="ATR133" class="btn btn-danger btn-sm genReportCor"><i class="fa fa-file-pdf-o"></i> PDF</button>
						</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group text-right">
                            <label><b>ATR185 / ATR277</b></label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group text-left">
                            <label>Penilaian Keberkesanan Latihan Mengikut Kursus</label>
                        </div>
                    </div>
					<div class="col-sm-3">
					   	<div class="form-group text-left">
							<button type="button" repCode="ATRPDF" class="btn btn-danger btn-sm genReportCor" id="genRpt"><i class="fa fa-file-pdf-o"></i> PDF</button>
                            <button type="button" repCode="ATRXLS" class="btn btn-success btn-sm genReportCor" id="genRpt"><i class="fa fa-file-excel-o "></i> Excel</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEARCH TRAINING page will be displayed here -->
<div class="modal fade" id="mySearchTrainingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header btn-primary">
				<h4 class="modal-title" id="myModalLabel">Training Title
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<div class="modal-body">
				<div id="search_training_list"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			</div>		  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end SEARCH TRAINING -->

<script>
    
        var dt_traininglist_row = '';
        var dt_traininglist2_row = '';
        
	$(document).ready(function(){
        $('#courseDate').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });	

        $('.select2-filter').select2({
            // dropdownParent: $('#myModalis2'),
            // tags: 'true',
            // placeholder: 'Select an option',
            width: 'resolve'
        });
	
		$('.genReport').click(function () {
			var repCode = $(this).attr('repCode');
			var year_i = $("#year_i").val(); 
			var department = $("#department").val(); 
			var staffID = $("#staffID").val(); 
            var corTitle2 = $("#corTitle2").val(); 
			var courseDate = $("#courseDate").val(); 
			var sMonth = $("#sMonth").val(); 
			var sYear = $("#sYear").val();
            //var corTitle = $("#corTitle").val();

            //alert(corTitle);
			
			// $.post('<?php echo $this->lib->class_url('setParam') ?>', {repCode: repCode, year_i: year_i,
            //  department: department, staffID: staffID, corTitle2: corTitle2, courseDate: courseDate, 
            //  sMonth: sMonth, sYear: sYear}, function (res) {
			// 	var repURL = '<?php echo $this->lib->class_url('genReport') ?>';
			// 	//alert(repURL);
			// 	var mywin = window.open( repURL , 'report');
			// }).fail(function(){
			// 	msg.danger('Please contact administrator.', '#alert');        
			// });

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->lib->class_url('setRepParam')?>',
                data: {'repCode':repCode, 'year_i':year_i, 'department': department, 'staffID':staffID, 'corTitle2':corTitle2, 'courseDate': courseDate, 'sMonth':sMonth, 'sYear': sYear},
                dataType: 'JSON',
                success: function(res) {
                    window.open("report?r="+res.report,"mywin","width=800,height=600");
                }
            });
		});

        $('.genReportCor').click(function () {
			// var repCode = $(this).attr('repCode');
            // var corTitle = $("#corTitle").val();

            // if(corTitle == '') {
            //     $.alert({
            //         title: 'Alert!',
            //         content: 'Please select course title.',
            //         type: 'red',
            //     });
            //     return;
            // }

            // //alert(corTitle);
			
			// $.post('<?php //echo $this->lib->class_url('setParam') ?>', {repCode: repCode, corTitle: corTitle}, function (res) {
			// 	var repURL = '<?php //echo $this->lib->class_url('genReport') ?>';
			// 	//alert(repURL);
			// 	var mywin = window.open( repURL , 'report');
			// }).fail(function(){
			// 	msg.danger('Please contact administrator.', '#alert');        
			// });

            // var repCode = $(this).attr('repCode');
            // var corTitle = $("#corTitle").val();

            var corTitle = $("#corTitle").val();
            var repCode = $(this).attr('repCode');

            if(corTitle == '') {
                $.alert({
                    title: 'Alert!',
                    content: 'Please select course title.',
                    type: 'red',
                });
                return;
            }

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->lib->class_url('setRepParam')?>',
                data: {'corTitle':corTitle, 'repCode':repCode},
                dataType: 'JSON',
                success: function(res) {
                    window.open("report?r="+res.report,"mywin","width=800,height=600");
                }
            });
		});
                
            // Get name
            $('.get_training_name').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getTrainingName')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#corTitle2_name').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#corTitle2_name').val("");
                    }
            });
            
            // Get name
            $('.get_training_name2').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getTrainingName')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#corTitle_name').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#corTitle_name').val("");
                    }
            });
            
    });

    $('#year_i').change(function () {
        var year_i = $("#year_i").val();
        //alert(year_i);

        $('#loaderCT').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#corTitle2').val('');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('courseListRptTe')?>',
			data: {'year_i' : year_i},
			dataType: 'JSON',
			success: function(res) {
				$('#loaderCT').html('');

				var resList = '<option value="" selected > ---Please select --- </option>';
				
				if (res.sts == 1) {
					for (var i in res.courseList) {
						resList += '<option value="'+res.courseList[i]['TH_REF_ID']+'">'+res.courseList[i]['TH_ID_NAME']+'</option>';
					}
				} else {
                    resList = '<option value="" selected > ---Please select year --- </option>';
                }
				
				$("#corTitle2").html(resList);
								
			}
		});
    });  
    
    //start @17/02/2020 -----------------------------------------------------------
    
    //... TRAINING TITLE
    $('.search_training_btn').click(function () {
    //$('#report_vii').on('click','.search_training_btn', function() {
	
        var year = $("#year_i").val();
        
		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF166TrainingSearchResult')?>', 
			//data: '',
                        data: {'year' : year},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_traininglist_row = $('#tbl_training_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#corTitle2').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#corTitle2_name').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    //---------------------------------
    
    //... TRAINING TITLE
    $('.search_training2_btn').click(function () {
    //$('#report_vii').on('click','.search_training_btn', function() {
	
        //var year = $("#year_i").val();
        
		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF166Training2SearchResult')?>', 
			data: '',
                        //data: {'year' : year},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_traininglist2_row = $('#tbl_training_list2').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_btn2', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#corTitle').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#corTitle_name').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    //---------------------------------
    
    //end @17/02/2020 -----------------------------------------------------------
    
</script>