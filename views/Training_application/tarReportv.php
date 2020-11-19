<!--START report_i-->
<p>
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
                        <!--div class="col-sm-8"-->
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><font color="red"><b>Year</b></font></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_av]', $year_list, $curYear, 'class="form-control" id="year_av"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        <!--/div-->
                    </div>

                    <div class="row">
                        <!--div class="col-sm-8"-->
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><font color="blue"><b>Month</b></font></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[month_from_av]', $month_list, NULL, 'class="form-control" id="month_from_av"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group text-right">
                                    <label><b>to</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[month_to_av]', $month_list, NULL, 'class="form-control" id="month_to_av"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        <!--/div-->
                    </div>

                    <div class="row">
                        <div class="form-group">
                        <!--div class="col-sm-8"-->
                                <label class="col-md-2 control-label"><font color="green"><b>Department </b></font></label>
                                <div class="col-md-2">
                                    <input type="text" id="department_v" name="form[department_v]" class="form-control upper_text_desc get_dept_name" value="" placeholder="Department">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="department_v_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_dept_tab5_btn">...</button>
                                </div>
                                <div class="col-md-1">
                                    <div class="text-left">   
                                        &nbsp;
                                    </div>
                                </div>
                        </div>
                        <!--div class="col-sm-8">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><font color="green"><b>Department</b></font></label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[department_v]', $dept_list, NULL, 'class="form-control" id="department_v"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div-->
                    </div>
                    <br>
                    <div class="row">
                        <!--div class="col-sm-8"-->
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><font color="brown"><b>Quarter (year)</b></font></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[quarter_year_v]', array(''=>'---Please select---', '1'=>'FIRST QUARTER', '2'=>'SECOND QUARTER', '3'=>'THIRD QUARTER', '4'=>'FOURTH QUARTER'), NULL, 'class="form-control" id="quarter_v"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        <!--/div-->
                    </div>

                    <div class="row">
                        <!--div class="col-sm-8"-->
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Quarter (month)</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[quarter_month_av]', array(''=>'---Please select---', '01'=>'JANUARY', '04'=>'APRIL', '07'=>'JULY', '10'=>'OCTOBER'), NULL, 'class="form-control" id="quarter_month_av"') ?>	
                                </div>
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[quarter_month_bv]', array(''=>'---Please select---', '02'=>'FEBRUARY', '05'=>'MAY', '08'=>'AUGUST', '11'=>'NOVEMBER'), NULL, 'class="form-control" id="quarter_month_bv"') ?>	
                                </div>
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[quarter_month_cv]', array(''=>'---Please select---', '03'=>'MAC', '06'=>'JUNE', '09'=>'SEPTEMBER', '12'=>'DECEMBER'), NULL, 'class="form-control" id="quarter_month_cv"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        <!--/div-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info fade in">
        <font color="red"><b>Year</b></font>
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
                                    <label><b>ATR220</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR220" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR220X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
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
        <font color="red"><b>Year</b></font><b> / </b><font color="blue"><b>Month</b></font>
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
                                    <label><b>ATR221</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Maklumat Keseluruhan)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR221" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR221X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR222</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut PTj)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR222" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR222X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR223</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut Gred Jawatan)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR223" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR223X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR224</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut Kump Perkhidmatan)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR224" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR224X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR225</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut Umur)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR225" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR225X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR226</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut Bangsa)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR226" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR226X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
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
        <font color="red"><b>Year</b></font><b> / </b><font color="green"><b>Department</b></font>
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
                                    <label><b>ATR227</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Mengikut Individu)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR227" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR227X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
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
        <font color="red"><b>Year</b></font><b> / </b><font color="brown"><b>Quarter (year)</b></font><b> / </b><font color="black"><b>Quarter (month)</b>
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
                                    <label><b>ATR228</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Kehadiran ke Perhimpunan Bulanan UPSI (Setiap PTj Mengikut Suku Tahun)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR228" class="btn btn-danger btn-sm genReportv"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR228X" class="btn btn-success btn-sm genReportv"><i class="fa fa-file-excel-o"></i> Excel</button>
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
					$('#department_v_name').val(res.deptName);
                                    }				
				}
                            });
                    } else {
                        $('#department_v_name').val("");
                    }
            });
	});
</script>