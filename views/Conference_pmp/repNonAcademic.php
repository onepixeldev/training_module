<!--START report_i-->
<p>
    <div class="alert alert-info fade in">
        <b>Filter</b>
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
                            <div class="col-sm-3">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_naca]', $year_list, $cur_year, 'class="form-control" id="year_naca"'); ?>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Month</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[month_naca]', $month_list, '', 'class="form-control" id="month_naca"') ?>	
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group text-right">
                                    <label><b>PTJ / Faculty</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[ptj_faculty_naca]', $dept_list, NULL, 'class="select2-filter form-control" id="ptj_faculty_naca" style="width: 100%"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group text-center" id="loaderFN">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group text-right">
                                    <label><b>Unit / Department</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[dept_naca]', array('' => '---Please select PTJ / Faculty--'), NULL, 'class="form-control" id="dept_naca"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group text-right">
                                    <label><b>Status</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[status_naca]', $sts_list, NULL, 'class="form-control" id="status_naca"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group text-right">
                                    <label><b>Domestic / Overseas?</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[dom_osea_naca]', $dom_ovs, NULL, 'class="form-control" id="dom_osea_naca"'); ?>
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

    <!--Filter : Year, Month-->
    <br>
    <div class="alert alert-info fade in">
        <b>Filter : Year, Month</b>
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
                                    <label><b>ATR167</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Keseluruhan Statistik Permohonan Menghadiri Persidangan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR167" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Filter : Month, Year, Status, PTJ / Faculty, Domestic / Overseas?-->
    <br>
    <div class="alert alert-info fade in">
        <b>Filter : Month, Year, Status, PTJ / Faculty, Domestic / Overseas?</b>
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
                                    <label><b>ATR099</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Peranan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR099" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Filter :  Month, Year, PTJ / Faculty, Unit / Department-->
    <br>
    <div class="alert alert-info fade in">
        <b>Filter :  Month, Year, PTJ / Faculty, Unit / Department</b>
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
                                    <label><b>ATR169</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan Mengikut Negara Asean (mengikut unit/jabatan)</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR169" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Filter : Month, Year, PTJ / Faculty-->
    <br>
    <div class="alert alert-info fade in">
        <b>Filter : Month, Year, PTJ / Faculty</b>
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
                                    <label><b>ATR104</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Rekod Laporan Penerimaan Menghadiri Persidangan dan Laporan Menghadiri Persidangan bagi Kakitangan Bukan Akademik</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR104" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR102</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Status bagi Dalam & Luar Negara</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR102" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR105</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Laporan Kewangan / Perbelanjaan bagi Kakitangan Bukan Akademik</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR105" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Filter : Month, Year, PTj / Faculty-->
    <br>
    <div class="alert alert-info fade in">
        <b>Filter : Month, Year, Status, PTJ / Faculty</b>
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
                                    <label><b>ATR098</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut PTj / Program</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR098" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR103</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Jantina bagi Dalam & Luar Negara</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR103" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR100</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan bagi Dalam dan Luar Negara</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR100" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR101</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Peruntukan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR101" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR159</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Peruntukan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR159" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR161</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Negeri</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR161" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR163</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Negara</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR163" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR165</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Statistik Permohonan Menghadiri Persidangan mengikut Negara Asean</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR165" class="btn btn-danger btn-sm gen_rep_btn_naca"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
	});
</script>