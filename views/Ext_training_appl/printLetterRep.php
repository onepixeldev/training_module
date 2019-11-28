<!--START report_i-->

<div class="alert alert-info fade in">
    <b>ATR238 : Surat Pengesahan Kehadiran Latihan Agensi Luar</b>
</div>
<div id="addPayDetlAlert">
    <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">Leave blank to print all staff records</font></b><br>&nbsp; <span id="note"></span>
</div>

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

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group text-right">
                                    <label><b>Training Title</b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <input name="" class="form-control" type="text" value="<?php echo ''?>" id="refid" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <input name="" class="form-control" type="text" value="<?php echo ''?>" id="tr_title" readonly>
                                </div>
                            </div>

                            <div class="col-sm-2 text-left">
                                <button type="button" class="btn btn-primary search_train"><i class="fa fa-search"></i> Search</button>
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
                                    <label><b>Staff ID</b> <b><font color="red">*</font></b></label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group text-left">
                                    <input name="" class="form-control" type="text" value="<?php echo ''?>" id="staff_id" readonly>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group text-left">
                                    <input name="" class="form-control" type="text" value="<?php echo ''?>" id="staff_name" readonly>
                                </div>
                            </div>

                            <div class="col-sm-2 text-left">
                                <button type="button" class="btn btn-primary search_staff"><i class="fa fa-search"></i> Search</button>
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
                                    <label><b>No. Rujukan Kami</b></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group text-left">
                                    <input name="" class="form-control" type="text" value="<?php echo 'UPSI/PEND/SM4/UL/'?>" id="ref_no">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-right">   
                                    &nbsp;
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group text-left">
                                    <button type="button" repCode="ATR238" class="btn btn-danger btn-sm gen_print_letter"><i class="fa fa-file-pdf-o"></i> Print Letter</button>
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
