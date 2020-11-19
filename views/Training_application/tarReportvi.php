<!--START report_i-->
<p>
    <div class="alert alert-info fade in">
        <b>AKEPT Report</b>
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
                                    <label><b>Month / Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[month_vi]', $month_list, NULL, 'class="form-control" id="month_vi"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_vi]', $year_list, NULL, 'class="form-control" id="year_vi"') ?>	
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
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Academic / Non-academic</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[aca_nonaca]', array('AKA'=>'ACADEMIC STAFF', 'NAKA'=>'NON-ACADEMIC STAFF', ''=>'ALL'), '', 'class="form-control" id="aca_nonaca"') ?>	
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
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Organizer</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[orga_vi]', array('ULAT'=>'ULAT', ''=>'ALL'), '', 'class="form-control" id="orga_vi"') ?>	
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
                        <div class="col-sm-8">
                            <div class="col-sm-4">
                                <div class="form-group text-right">
                                    <label><b>Report Format</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[re_formatvi]', array('PDF'=>'PDF', 'EXCEL'=>'EXCEL'), '', 'class="form-control" id="re_formatvi"') ?>	
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
                        <label><b>ATR242</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut PTj)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR242" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR243</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut Kumpulan Perkhidmatan)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR243" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR244</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut Gred Jawatan)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR244" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR245</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut Jantina)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR245" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR246</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut Umur)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR246" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR247</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Mengikut Bangsa)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR247" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR248</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Mengikut Program AKEPT (Maklumat Keseluruhan)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR248" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                        <label><b>ATR267</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Senarai kakitangan Yang Mengikuti Program AKEPT</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR267" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
                            <div class="form-group">
                                <label class="col-md-2 control-label"><b>Staff ID </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="staff_id_vi" name="form[staff_id_vi]" class="form-control upper_text_desc get_staff_name" value="" placeholder="Staff ID">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="staff_id_vi_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_staff_tab6_btn">...</button>
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
                                    <?php echo form_dropdown('form[staff_id_vi]', $staff_list, NULL, 'class="form-control" id="staff_id_vi"') ?>	
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
                                    <label><b>ATR268</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Senarai Kakitangan Yang Mengikuti Program AKEPT (Individu)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR268" class="btn btn-danger btn-sm genReportvi"><i class="fa fa-print"></i> Print</button>
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
					$('#staff_id_vi_name').val(res.staffName);
                                    }				
				}
                            });
                    } else {
                        $('#staff_id_vi_name').val("");
                    }
            });
            
	});
</script>