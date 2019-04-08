<?php echo $this->lib->title('Training Application <i class="fa fa-caret-right"></i> Report for Training Evaluation ') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Reminders / Shipping Memos</h2>				
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
                            <?php echo form_dropdown('form[year_i]', $year_list, NULL, 'class="form-control" id="year_i"') ?>	
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
							<?php echo form_dropdown('form[staff_id]', $staff_list, NULL, 'class="form-control" id="staffID"') ?>	
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
                    </div>
                </div>

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
                    <div class="col-sm-2">
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
                    </div>
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
							<button type="button" repCode="ATR133" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
							<button type="button" repCode="ATRPDF" class="btn btn-danger btn-sm genReport" id="genRpt"><i class="fa fa-file-pdf-o"></i> PDF</button>
                            <button type="button" repCode="ATRXLS" class="btn btn-success btn-sm genReport" id="genRpt"><i class="fa fa-file-excel-o "></i> Excel</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	$(document).ready(function(){
        $('#courseDate').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
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
</script>