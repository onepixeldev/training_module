<form id="updCpdInfo" class="form-horizontal" method="post">
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Year</label>
        <div class="col-md-2">
            <input name="form[year]" class="form-control" type="text" value="<?php echo $year?>" id="year" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $stf_info->SM_STAFF_NAME?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Scheme</label>
        <div class="col-md-2">
            <input name="form[scheme]" class="form-control" type="text" value="<?php echo $stf_info->SCH_SCHEME?>" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $stf_info->SC_CLASS_DESC?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Kump</label>
        <div class="col-md-2">
            <input name="form[kump]" class="form-control" type="text" value="<?php echo $stf_info->SCH_KUMP?>" id="kump" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $stf_info->SOG_GROUP_DESC?>"  readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Conference Setup CPD</b>
    </div>

    <div class="row">
        <div class="container col-md-12">
            <div class="panel panel-default text-left">

                <div id="updCpdInfoAlert">
                </div>

                <div class="panel-body" id="summary">
                    <!--<div id="" class="text-left">
                        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
                    </div>-->

                    <div class="form-group">
                        <label class="col-md-2 control-label">Prorate Service</label>
                        <div class="col-md-2">
                            <input name="form[prorate_service]" placeholder="Prorate Service" value="<?php echo $stf_info->SCH_PRORATE_SERVICE?>" class="form-control" type="text" id="prorate_service">
                        </div>
                        <div class="col-md-2">
                            <div id="loaderCalc"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Pemberat LNPT</label>
                        <div class="col-md-2">
                            <input name="form[pemberat_lnpt]" placeholder="Pemberat LNPT" value="<?php echo $stf_info->SCH_PEMBERAT_LPP?>" class="form-control" type="text" id="pemberat_lnpt" readonly>
                        </div>

                        <label class="col-md-2 control-label">Peratus LNPT</label>
                        <div class="col-md-2">
                            <input name="form[peratus_lnpt]" placeholder="Peratus LNPT" value="<?php echo $stf_info->SCH_PERATUS_LPP?>" class="form-control" type="text" id="peratus_lnpt" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2"></div>

                            <div class="container col-md-4">
                                <div class="panel panel-default text-left">

                                    <div class="panel-body" id="summary">

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-8 control-label"><b>JUMLAH MATA MINIMUM</b></label>
                                            <div class="col-md-2"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Khusus Min</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_khusus_min]" placeholder="Khusus" value="<?php echo $stf_info->SCH_JUM_KHUSUS_MIN?>" class="form-control" type="text" id="jum_khu_min" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Umum Min</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_umum_min]" placeholder="Umum" value="<?php echo $stf_info->SCH_JUM_UMUM_MIN?>" class="form-control" type="text" id="jum_um_min" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Teras Min</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_teras_min]" placeholder="Teras" value="<?php echo $stf_info->SCH_JUM_TERAS_MIN?>" class="form-control" type="text" id="jum_tr_min" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">CPD Layak</label>
                                            <div class="col-md-4">
                                                <input name="form[cpd_layak]" value="<?php echo $stf_info->SCH_CPD_LAYAK?>" class="form-control" type="text" id="cpd_layak" readonly>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="container col-md-4">
                                <div class="panel panel-default text-left">

                                    <div class="panel-body" id="summary">

                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <label class="col-md-8 control-label"><b>JUMLAH MATA TERKUMPUL</b></label>
                                            <div class="col-md-2"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Khusus</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_khusus]" placeholder="Khusus" value="<?php echo $stf_info->SCH_JUM_KHUSUS?>" class="form-control" type="text" id="jumlah_khusus" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Umum</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_umum]" placeholder="Umum" value="<?php echo $stf_info->SCH_JUM_UMUM?>" class="form-control" type="text" id="jumlah_umum" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah Teras</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_teras]" placeholder="Teras" value="<?php echo $stf_info->SCH_JUM_TERAS?>" class="form-control" type="text" id="jumlah_teras" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Jumlah CPD</label>
                                            <div class="col-md-4">
                                                <input name="form[jumlah_cpd]" value="<?php echo $stf_info->SCH_JUM_CPD?>" class="form-control" type="text" id="jumlah_cpd" readonly>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save_upd_stf_cpd"><i class="fa fa-save"></i> Save & Close</button>
                </div>
            </div>
        </div>
    </div>
</form>