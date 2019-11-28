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

                    <div class="alert alert-warning fade in text-left">
                        <b>Filter</b>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Month</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('fMonth', $month_list, '', 'class="form-control" id="fmonth"'); ?>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('fYear', $year_list, $cur_year, 'class="form-control" id="fYear"'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Department</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('fDept', $dept_list, NULL, 'class="select2-filter form-control" id="fDept" style="width: 100%"'); ?>
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
                                    <label><b>Status</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('fStatus', $sts_list, '', 'class="form-control" id="fStatus"'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Fee Category</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('fCode', $fee_list, '', 'class="form-control" id="fCode"'); ?>
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

            <div class="alert alert-info fade in">
                <b>Filter:</b> <b class="text-success">Month / Year / Department / Status</b>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR231</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Semakan Status Permohonan Kursus Anjuran Agensi Luar</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR231" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR232</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Yuran Penyertaan Kursus Anjuran Agensi Luar</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR232" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>

            <br>

            <div class="alert alert-info fade in">
                <b>Filter:</b> <b class="text-success">Month / Year / Department</b>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR233</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Permohonan Mengikuti Kursus Anjuran Agensi Luar Yang Ditolak oleh HOD</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR233" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR234</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Permohonan Mengikuti Kursus Anjuran Agensi Luar Yang Ditolak oleh BSM</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR234" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>

            <br>

            <div class="alert alert-info fade in">
                <b>Filter:</b> <b class="text-success">Month / Year / Department / Fee Category</b>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group text-right">
                        <label><b>ATR235</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Laporan Permohonan Mengikuti Kursus Anjuran Agensi Luar Yang Ditolak oleh KTP/Pendaftar/MPE</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR235" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</p>
<!-- END -->
<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
	});
</script>
