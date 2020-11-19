<!--START report_i-->
<p>
    <div class="row">
        <div class="col-sm-8">
            <div class="col-sm-2">
                <div class="form-group text-right">
                    <label><b>Year</b></label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group text-left">
                    <?php echo form_dropdown('form[year_ai]', $year_list, $curYear, 'class="form-control" id="year_ai"') ?>	
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-left">   
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR057</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Senarai Kakitangan Yang Menghadiri Latihan Mengikut PTJ/Fakulti dan Tahun Semasa</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR057" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>Department </b></label>
                            <div class="col-md-2">
                                <input type="text" id="department_ai" name="form[department_ai]" class="form-control upper_text_desc get_dept_name" value="" placeholder="Department">
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="department_ai_name" class="form-control" placeholder="Description" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-warning search_dept_tab1_btn">...</button>
                            </div>
                        </div>
                        <!--div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>Department</b></label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[department_ai]', $dept_list, NULL, 'class="form-control" id="department_ai"') ?>	
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-left">   
                                &nbsp;
                            </div>
                        </div-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR058</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Statistik Kakitangan Yang Menghadiri Latihan ( Keseluruhan )</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR058LIST" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>Option</b></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[choice_ai]', array(''=>'--- Please Select ---', 'A'=>'All', 'Y'=>'CONDUCTED', 'N'=>'NOT CONDUCTED'), NULL, 'class="form-control" id="choice_ai"') ?>	
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-left">   
                                &nbsp;
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR059</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( 2 kali atau lebih setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR059" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR060</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( kurang daripada 2 kali setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR060" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR085</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( 7 hari atau lebih setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR085" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR086</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( kurang daripada 7 hari setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR086" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR065</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Statistik Kakitangan Yang Menghadiri Latihan</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR065" class="btn btn-danger btn-sm genReportMMi"><i class="fa fa-file-pdf-o"></i> PDF</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>From</b></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[fr_month_ai]', $month_list, NULL, 'class="form-control listFilter" id="fr_month_ai"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[fr_year_ai]', $year_list, $curYear, 'class="form-control" id="fr_year_ai"') ?>	
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
                                <label><b>To</b></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[to_month_ai]', $month_list, NULL, 'class="form-control listFilter" id="to_month_ai"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group text-left">
                                <?php echo form_dropdown('form[to_year_ai]', $year_list, $curYear, 'class="form-control" id="to_year_ai"') ?>	
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-left">   
                                &nbsp;
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR072</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Bilangan Pegawai Yang Menghadiri Kursus (format KPT)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR072" class="btn btn-danger btn-sm genReporti"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info fade in">
        <b>Program / Speaker Evaluation</b>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <div class="text-left">   
                &nbsp;
            </div>
        </div>

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_bi]', $year_list, $curYear, 'class="form-control" id="year_bi"') ?>	
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
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <input name="form[refid]" class="form-control upper_text_desc get_training_name" value="" type="text" id="courseRefid">	
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group text-left">
                                    <input name="form[course_title]" class="form-control" value="" type="text" id="courseTitle" readonly>	
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-left">
                                    <button type="button" class="btn btn-primary btn-sm select_course_btn"><i class="fa fa-search"></i></button>
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
                                    <label><b>Report Format</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[eval_rep_format]', array('PDF'=>'PDF', 'EXCEL'=>'EXCEL'), '', 'class="form-control" id="rep_format_bi"') ?>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR061</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Penilaian Program (A)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR061" class="btn btn-danger btn-sm genReportBi"><i class="fa fa-file-text-o"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR062</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Penilaian Program (A)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR062" class="btn btn-danger btn-sm genReportBi"><i class="fa fa-file-text-o"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR063</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Penilaian Penceramah (A)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR063" class="btn btn-danger btn-sm genReportBi"><i class="fa fa-file-text-o"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR064</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Penilaian Penceramah (A)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR064" class="btn btn-danger btn-sm genReportBi"><i class="fa fa-file-text-o"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</p>
<!-- END -->

<script>
  
	$(document).ready(function(){
            
            
        // Uppercase username
            $('.upper_text_desc').keyup(function() {
		var upperCaseVal = $(this).val().toUpperCase();
			
		$(this).val($.trim(upperCaseVal));
            });
            
            // Get name
            $('.get_dept_name').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getDeptName')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#department_ai_name').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#department_ai_name').val("");
                    }
            });
            
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
					$('#courseTitle').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#courseTitle').val("");
                    }
            });
            
            
        });
        
</script>