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
                            <div class="col-sm-2">
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
                            </div>
                        </div>

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
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[yearavii]', $year_list, $curYear, 'class="form-control" id="year_avii"') ?>	
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
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
                                    <?php echo form_dropdown('form[status_bvii]', array(''=>'--- Please Select ---', 'APPLY'=>'APPLY', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL'), '', 'class="form-control" id="status_bvii"') ?>	
                                </div>
                            </div>
                        </div>
                    </div>

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
});
</script>