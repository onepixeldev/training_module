<form id="updStaffCpdPoint" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Update Staff CPD Point</h4>
    </div>
    <div class="modal-body">
        <div id="updStaffCpdPointAlert"></div>
        <!--<div id="updStaffCpdPointAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>-->

        <div class="form-group">
            <label class="col-md-3 control-label">Year</label>
            <div class="col-md-2">
                <input name="form[year]" placeholder="Year" class="form-control" type="text" value="<?php echo $year?>" readonly id="mYear">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id]" placeholder="ID" class="form-control" type="text" value="<?php echo $staff_id?>" readonly id="mStaffId">
            </div>

            <div class="col-md-6">
                <input name="form[sname]" placeholder="Name" class="form-control" type="text" value="<?php echo $s_cpd_detl->SM_STAFF_NAME?>" readonly id="sName">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Scheme</label>
            <div class="col-md-2">
                <input name="" placeholder="Scheme" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_SCHEME?>" readonly>
            </div>

            <div class="col-md-6">
                <input name="" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SC_CLASS_DESC?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Group</label>
            <div class="col-md-2">
                <input name="" placeholder="Group" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_KUMP?>" readonly id="mGroup">
            </div>

            <div class="col-md-6">
                <input name="" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SOG_GROUP_DESC?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Prorate Service Month</label>
            <div class="col-md-2">
                <input name="form[prorate_service_month]" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_PRORATE_SERVICE?>" id="psm">
            </div>

            <label class="col-md-3 control-label">CPD Layak</label>
            <div class="col-md-2">
                <input name="form[cpd_layak]" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_CPD_LAYAK?>" id="cl">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <div id="loaderCalc"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Jumlah Khusus Min</label>
            <div class="col-md-2">
                <input name="form[jumlah_khusus_min]" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_JUM_KHUSUS_MIN?>" id="jkm">
            </div>

            <label class="col-md-3 control-label">Jumlah Umum Min</label>
            <div class="col-md-2">
                <input name="form[jumlah_umum_min]" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_JUM_UMUM_MIN?>" id="jum">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Jumlah Teras Min</label>
            <div class="col-md-2">
                <input name="form[jumlah_teras_min]" placeholder="" class="form-control" type="text" value="<?php echo $s_cpd_detl->SCH_JUM_TERAS_MIN?>" id="jtm">
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_staff_cpd_pts"><i class="fa fa-save"></i> Save</button>
    </div>
</form>