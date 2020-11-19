<!--START report_i-->
<p>
    <div class="alert alert-info fade in">
        <b>Course applicant report</b>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="col-sm-2">
                <div class="form-group text-right">
                    <label><b>Year</b></label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group text-left">
                    <?php echo form_dropdown('form[year_aiii]', $year_list, $curYear, 'class="form-control" id="year_aiii"') ?>	
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-left">   
                    &nbsp;
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

                        <div class="row">
                            <br>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><b>Department </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="department_aiii" name="form[department_aiii]" class="form-control upper_text_desc get_dept_name" value="" placeholder="Department">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="department_aiii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_dept_tab3_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Department / Faculty</b></label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[department_aiii]', $dept_list, NULL, 'class="form-control" id="department_aiii"') ?>	
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
                            <div class="form-group">
                                <label class="col-md-2 control-label"><b>Course Title </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="course_titleiii" name="form[course_titleiii]" class="form-control upper_text_desc get_training_name" value="" placeholder="Course Title">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="course_titleiii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_training_tab3_btn">...</button>
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
                            <div class="col-sm-8">
                                <div id="crtloader"></div>
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[course_titleiii]', array('--- Please select year ---'), NULL, 'class="form-control" id="course_titleiii"') ?>	
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
                            <div class="form-group">
                                <label class="col-md-2 control-label"><b>Staff ID </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="staff_idiii" name="form[staff_idiii]" class="form-control upper_text_desc get_staff_name" value="" placeholder="Staff ID">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="staff_idiii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_staff_tab3_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                                </div>
                            </div>
                            <!--div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Staff ID</b></label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[staff_idiii]', $staff_list, NULL, 'class="form-control" id="staff_idiii"') ?>	
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
                                    <label><b>ATR110</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Permohonan Kursus Yang Ditolak Oleh Pegawai Yang Meluluskan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR110" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR111</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Permohonan Kursus Yang Dibatalkan Oleh Pemohon</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR111" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
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

        <div class="container col-md-10">
            <div class="panel panel-default text-right">
                <div class="panel-body" id="summary">
                    <div class="row">

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Date of course from</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <input name="form[date_course_fromiii]" placeholder="DD-MM-YYYY" class="form-control" value="" type="text" id="date_course_fromiii">		
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
                                    <label><b>ATR147</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Pertindihan Peserta Kursus</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR147" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

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
                        <label><b>ATR141</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kehadiran Kursus BITARA</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR141" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                        <label><b>ATR144</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kehadiran Kursus ORIENTASI</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR144" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info fade in">
        <b>Attendance statistics / Absence of BITARA courses / Orentation</b>
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
                            <div class="form-group">
                                <label class="col-md-2 control-label"><b>Department </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="department_biii" name="form[department_biii]" class="form-control upper_text_desc get_dept_name2" value="" placeholder="Department">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="department_biii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_dept_tab3b_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Department</b></label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[department_biii]', $dept_list, NULL, 'class="form-control" id="department_biii"') ?>	
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
                                    <label><b>ATR142</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran Kursus BITARA mengikut PTJ</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR142" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR143</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Ketidakhadiran Kursus BITARA mengikut PTJ</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR143" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR145</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran Kursus ORIENTASI mengikut PTJ</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR145" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR146</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Ketidakhadiran Kursus ORIENTASI mengikut PTJ</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR146" class="btn btn-danger btn-sm genReportiii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
        
        $('#date_course_fromiii').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY'
        });
        
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
					$('#department_aiii_name').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#department_aiii_name').val("");
                    }
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
					$('#course_titleiii_name').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#course_titleiii_name').val("");
                    }
            });
            
            // Get name
            $('.get_staff_name').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getStaffName')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#staff_idiii_name').val(res.staffName);
                                    }				
				}
                            });
                    } else {
                        $('#staff_idiii_name').val("");
                    }
            });
            
            // Get name
            $('.get_dept_name2').keyup(function() {
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
					$('#department_biii_name').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#department_biii_name').val("");
                    }
            });
            
            
	});
</script>