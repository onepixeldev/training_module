<!--START report_i-->
<p>
    <div class="alert alert-info fade in">
        <b>Annual activity report</b>
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
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <input name="form[year_aii]" placeholder="YYYY" class="form-control" value="<?php echo $curYear?>" type="text" id="year_aii">	
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
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Organizer</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[organizer_ii]', array(''=>'ALL', 'INTERNAL'=>'INTERNAL UPSI', 'EXTERNAL'=>'EXTERNAL UPSI', 'EXTERNAL_AGENCY'=>'EXTERNAL AGENCY UPSI'), '', 'class="form-control" id="organizer_ii"') ?>	
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
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Report format</b></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[rep_for_ii]', array('PDF'=>'PDF'), '', 'class="form-control" id="rep_for_ii"') ?>	
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
                        <label><b>ATR047</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Tahunan Aktiviti Unit Latihan</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR047" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                        <button type="button" repCode="ATR047X" class="btn btn-success btn-sm genReportii"><i class="fa fa-file-excel-o"></i> Excel</button>
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
                        <label><b>ATR087</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Tahunan Aktiviti Unit Latihan (BITARA)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR087" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                        <label><b>ATR108</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( 42 jam atau lebih setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR108" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                        <label><b>ATR109</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Kakitangan Yang Menghadiri Latihan ( kurang daripada 42 jam setahun )</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR109" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                        <label><b>ATR113</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Statistik Bilangan Pegawai Yang Menghadiri Kursus (KPT - format 2)</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR113" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                                    <label><b>From</b></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[fr_month_aii]', $month_list, NULL, 'class="form-control" id="fr_month_aii"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[fr_year_aii]', $year_list, $curYear, 'class="form-control" id="fr_year_aii"') ?>	
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
                                    <?php echo form_dropdown('form[to_month_aii]', $month_list, NULL, 'class="form-control" id="to_month_aii"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[to_year_aii]', $year_list, $curYear, 'class="form-control" id="to_year_aii"') ?>	
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
                                <label class="col-md-2 control-label"><b>Organizer </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="org_codeii" name="form[org_codeii]" class="form-control upper_text_desc get_organizer_name" value="" placeholder="Organizer">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="org_codeii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_organizer_tab2_btn">...</button>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                            <!--div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Organizer</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[org_codeii]', $org_list_ii, NULL, 'class="form-control" id="org_codeii"'); ?>
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
                                    <label><b>Sector</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[sector_ii]', $sec_list_ii, NULL, 'class="form-control" id="sector_ii"'); ?>
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
                                <label class="col-md-2 control-label"><b>Coordinator </b></label>
                                <div class="col-md-2">
                                    <input type="text" id="coor_ii" name="form[coor_ii]" class="form-control upper_text_desc get_staff_name" value="" placeholder="Coordinator">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="coor_ii_name" class="form-control" placeholder="Description" value="" readonly>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-warning search_staff_tab2_btn">...</button>
                                </div>
                                <div class="col-sm-1">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                                </div>
                            </div>
                         
                            <!--div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Coordinator</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[coor_ii]', $corr_list_ii, NULL, 'class="form-control" id="coor_ii"'); ?>
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
                                    <label><b>ATR123</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Tahunan Aktiviti Unit Latihan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR123" class="btn btn-danger btn-sm genReportii"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                    <button type="button" repCode="ATR123X" class="btn btn-success btn-sm genReportii"><i class="fa fa-file-excel-o"></i> Excel</button>
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
        
        $('#year_aii').datetimepicker({
            format: 'L',
            format: 'YYYY'
        });
        
        // Uppercase username
            $('.upper_text_desc').keyup(function() {
		var upperCaseVal = $(this).val().toUpperCase();
			
		$(this).val($.trim(upperCaseVal));
            });
            
            // Get name
            $('.get_organizer_name').keyup(function() {
		var thisFld = $(this);
		var sid = thisFld.val();
			
                    if (sid.trim().length > 5) {
                            $.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('getOrganizerName')?>',
				data: {'sid' : sid},
				dataType: 'json',
				success: function(res) {
                                    if (res.sts == 1) {
					$('#org_codeii_name').val(res.orgName);
                                    }				
				}
                            });
                    } else {
                        $('#org_codeii_name').val("");
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
					$('#coor_ii_name').val(res.staffName);
                                    }				
				}
                            });
                    } else {
                        $('#coor_ii_name').val("");
                    }
            });
            
        
        
	});
</script>