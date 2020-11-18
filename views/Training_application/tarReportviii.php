<!--START report_viii-->
<p>
    <div class="alert alert-info fade in">
        <b>LAPORAN STAF HADIR KURSUS TERAS</b>
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
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label"><font color="green"><b>Department </b></font></label>
                        <div class="col-md-2">
                            <input type="text" id="deptCode" name="form[department]" class="form-control upper_text_desc get_dept_name" value="" placeholder="Department">
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="dept_name" class="form-control" placeholder="Description" value="" readonly>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-warning search_dept_btn">...</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR287</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Staf Hadir Kursus Teras (Staf P&P)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR287" class="btn btn-danger btn-sm genReportviii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR287X" class="btn btn-success btn-sm genReportviii"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR288</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Staf Hadir Kursus Teras (Staf Pelaksana)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR288" class="btn btn-danger btn-sm genReportviii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR288X" class="btn btn-success btn-sm genReportviii"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
             
            </div>
            
        </div>
    </div>

    <br>
    
    <div class="alert alert-info fade in">
        <b>SENARAI HADIR KURSUS TERAS MENGIKUT PTJ</b>
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
                        <div class="form-group">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><font color="red"><b>Year</b></font></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_av]', $year_list, $curYear, 'class="form-control" id="year2"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                                <div class="col-sm-2">
                                    <div class="form-group text-right">
                                        <label><font color="blue"><b>Month</b></font></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group text-left">
                                        <?php echo form_dropdown('form[month_from_av]', $month_list, NULL, 'class="form-control" id="month_from"') ?>	
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><font color="green"><b>Department </b></font></b></label>
                            <div class="col-md-2">
                                <input type="text" id="deptCode2" name="form[department]" class="form-control upper_text_desc get_dept_name2" value="" placeholder="Department">
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="dept_name2" class="form-control" placeholder="Description" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-warning search_dept_btn2">...</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><font color="green"><b>Course Title (Teras) </b></font></b></label>
                            <div class="col-md-2">
                                <input type="text" id="trainingCode" name="form[training]" class="form-control upper_text_desc get_training_name" value="" placeholder="Course Title (Teras)">
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="training_name" class="form-control" placeholder="Description" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-warning search_training_btn">...</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR289</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Senarai Hadir Kursus Teras Mengikut PTj</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR289" class="btn btn-danger btn-sm genReportviii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR289X" class="btn btn-success btn-sm genReportviii"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    

                </div>
            </div>
        </div>
    </div>

    <br>
    
    <div class="alert alert-info fade in">
        <b>SENARAI BELUM HADIR KURSUS TERAS MENGIKUT PTJ</b>
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
                        <div class="form-group">
                            <label class="col-md-2 control-label"><font color="green"><b>Department </b></font></b></label>
                            <div class="col-md-2">
                                <input type="text" id="deptCode3" name="form[department]" class="form-control upper_text_desc get_dept_name3" value="" placeholder="Department">
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="dept_name3" class="form-control" placeholder="Description" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-warning search_dept_btn3">...</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><font color="green"><b>Course Title (Teras) </b></font></b></label>
                            <div class="col-md-2">
                                <input type="text" id="trainingCode2" name="form[training]" class="form-control upper_text_desc get_training_name2" value="" placeholder="Course Title (Teras)">
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="training_name2" class="form-control" placeholder="Description" value="" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-warning search_training_btn2">...</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR290</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Senarai Belum Hadir Kursus Teras Mengikut PTj</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR290" class="btn btn-danger btn-sm genReportviii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR290X" class="btn btn-success btn-sm genReportviii"><i class="fa fa-file-excel-o"></i> Excel</button>
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
					$('#dept_name').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#dept_name').val("");
                    }
            });
            
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
					$('#dept_name2').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#dept_name2').val("");
                    }
            });
            
            $('.get_dept_name3').keyup(function() {
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
					$('#dept_name3').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#dept_name3').val("");
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
					$('#training_name').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#training_name').val("");
                    }
            });
            
            $('.get_training_name2').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getTrainingName2')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#training_name2').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#training_name2').val("");
                    }
            });
            
        });
        
</script>