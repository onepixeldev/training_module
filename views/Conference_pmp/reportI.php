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

                    <!--<div id="" class="text-left">
                        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
                    </div>-->

                    <div class="row">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Year</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[year_a]',$year_list, $cur_year, 'class="form-control" id="year_a"'); ?>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Month</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[month_a]', $month_list, '', 'class="form-control" id="month_a"') ?>	
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
                                    <label><b>PTJ / Faculty</b></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[ptj_faculty_a]', $dept_list, NULL, 'class="select2-filter form-control" id="ptj_faculty_a" style="width: 100%"'); ?>
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
                                    <label><b>Category</b></label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[category_a]', $cat_list, NULL, 'class="form-control" id="category_a"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Allocation</b></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[allocation_a]', $alloc_list, NULL, 'class="form-control" id="allocation_a"'); ?>
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
                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <?php echo form_dropdown('form[status_a]', $sts_list, NULL, 'class="form-control" id="status_a"'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-left">   
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR035</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Senarai Nama Kakitangan Bukan Akademik Yang Menghadiri Persidangan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR035" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>ATR036</b></label>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="form-group text-left">
                                    <label>Senarai Nama Kakitangan Akademik Yang Menghadiri Persidangan</label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR036" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
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
                        <label><b>ATR239</b></label>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="form-group text-left">
                        <label>Senarai Kakitangan Yang Melampirkan Fail Prosiding</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group text-left">
                        <button type="button" repCode="ATR239" class="btn btn-danger btn-sm gen_rep_btn"><i class="fa fa-file-pdf-o"></i> PDF</button>
                        <button type="button" repCode="ATR239X" class="btn btn-success btn-sm gen_rep_btn"><i class="fa fa-file-excel-o"></i> Excel</button>
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
