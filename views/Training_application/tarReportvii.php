<!--START report_i-->
<p>
    <div class="alert alert-info fade in">
        <b>CETAKAN SENARAI LATIHAN (TRAINING) JANGKA PENDEK</b>
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
                                <label class="col-md-2 control-label"><b>Staff ID </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="staff_id_vii" name="form[staff_id_vii]" class="form-control upper_text_desc get_staff_name" value="" placeholder="Staff ID">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="staff_id_vii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_staff_tab7_btn">...</button>
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
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[staff_id_vii]', $staff_list, NULL, 'class="select2-filter form-control" style="width: 100%" id="staff_id_vii"') ?>	
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
                                    <label><b>ATR044</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>CETAKAN SENARAI LATIHAN (TRAINING) JANGKA PENDEK</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR044" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
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
        <b>SENARAI LATIHAN (TRAINING) YG DIHADIRI OLEH KAKITANGAN</b>
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
                        <!--div class="form-group">
                        <!--div class="col-sm-8"-->
                                <!--label class="col-md-2 control-label"><b>Department </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="departmentvii" name="form[departmentvii]" class="form-control upper_text_desc get_dept_name" value="" placeholder="Department">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="departmentvii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_dept_tab7_btn">...</button>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div-->
                        <!--/div-->
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Department</b></label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[departmentvii]', $dept_list, '', 'class="form-control" id="departmentvii"') ?>	
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Unit</b></label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div id="unitLoader"></div>
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[unitvii]', '', '', 'class="form-control" id="unitvii"') ?>	
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Status</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[status_avii]', array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL'), '', 'class="form-control" id="status_avii"') ?>	
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR045</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>SENARAI LATIHAN (TRAINING) YG DIHADIRI OLEH KAKITANGAN</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR045" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>

                    <!--<div class="row">
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Report Format</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php //echo form_dropdown('form[re_formatvi]', array('PDF'=>'PDF', 'EXCEL'=>'EXCEL'), '', 'class="form-control" id="re_formatvi"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>-->

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info fade in">
        <b>SENARAI PESERTA KURSUS</b>
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
                            <label class="col-md-2 control-label"><b>Year </b></label>
                            <div class="col-md-4">
                                    <?php echo form_dropdown('form[yearavii]', $year_list, '', 'class="form-control" id="year_avii"') ?>
                            </div>
                            <div class="col-sm-6">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                            </div>
                        </div>
                        
                        <!--div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[yearavii]', $year_list, '', 'class="form-control" id="year_avii"') ?>	
                                </div>
                            </div>
                        </div-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                                <label class="col-md-2 control-label"><b>Course Title </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="course_titleavii" name="form[course_titleavii]" class="form-control upper_text_desc get_training_name" value="" placeholder="Course Title">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="course_titleavii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_training_tab7_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                        </div>
                        <!--div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Course Title</b></label>
                                </div>
                            </div>
                            <div id="crtaviiLoader"></div>
                            <div class="col-sm-8">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[course_titleavii]', array(''=>'--- Please select year ---'), '', 'class="form-control" id="course_titleavii"') ?>	
                                </div>
                            </div>
                        </div-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>Date From </b></label>
                            <div class="col-md-4">
                                    <input name="form[date_course_fromvii]" placeholder="DD-MM-YYYY" class="form-control" value="" type="text" id="date_course_fromvii">
                            </div>
                            <div class="col-sm-6">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                            </div>
                        </div>
                        <!--div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Date From</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <input name="form[date_course_fromvii]" placeholder="DD-MM-YYYY" class="form-control" value="" type="text" id="date_course_fromvii">	
                                </div>
                            </div>
                        </div-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>Status </b></label>
                            <div class="col-md-4">
                                    <?php echo form_dropdown('form[status_bvii]', array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL'), '', 'class="form-control" id="status_bvii"') ?>
                            </div>
                            <div class="col-sm-6">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                            </div>
                        </div>
                        <!--div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Status</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[status_bvii]', array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL'), '', 'class="form-control" id="status_bvii"') ?>	
                                </div>
                            </div>
                        </div-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>Format </b></label>
                            <div class="col-md-4">
                                    <?php echo form_dropdown('form[format_vii]', array('PDF'=>'PDF', 'EXCEL'=>'EXCEL'), '', 'class="form-control" id="format_vii"') ?>
                            </div>
                            <div class="col-sm-6">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR037</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Report Format 1</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR037" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR038</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Report Format 2</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR038" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR080</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Report Format 3</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR080" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group text-right">
                                <label><b>ATR249</b></label>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group text-left">
                                <label>Report Format 4</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group text-left">
                                <button type="button" repCode="ATR249" class="btn btn-danger btn-sm genReportvii"><i class="fa fa-print"></i> Print</button>
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
$('.select2-filter').select2({
	width: 'resolve'
});

$(document).ready(function(){	
    
    $('#date_course_fromvii').datetimepicker({
        format: 'L',
        format: 'DD-MM-YYYY'
    });
    
    // Uppercase username
            $('.upper_text_desc').keyup(function() {
		var upperCaseVal = $(this).val().toUpperCase();
			
		$(this).val($.trim(upperCaseVal));
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
					$('#staff_id_vii_name').val(res.staffName);
                                    }				
				}
                            });
                    } else {
                        $('#staff_id_vii_name').val("");
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
					$('#course_titleavii_name').val(res.trainingName);
                                    }				
				}
                            });
                    } else {
                        $('#course_titleavii_name').val("");
                    }
            });
            
});
</script>