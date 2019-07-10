<form id="updStaffConAllw" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Staff Conference Allowance</h4>
    </div>
    <div class="modal-body">
        <div id="updStaffConAllwAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
            </div>

            <div class="col-md-6">
                <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Conference Title</label>
            <div class="col-md-2">
                <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
            </div>

            <div class="col-md-6">
                <textarea name="form[conference_name]" class="form-control" id="crName" rows="2" cols="2" type="text" id="crName" readonly><?php echo $cr_name?></textarea>
                <!--<input    value="" id="crName" readonly>-->
            </div>
        </div>

        <div class="alert alert-info fade in">
            <b>Allowances</b>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Allowance Code <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('form[allowance_code_dummy]', $cr_allowance_dd, $allw_code, 'class="form-control width-50" disabled')
                ?>
            </div>
            <input name="form[allowance_code]" class="form-control" type="hidden" value="<?php echo $allw_code?>">
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Apply (RM) <b><font color="red">* </font></b></label>
            <div class="col-md-3">
                <input name="form[apply]" placeholder="Apply (RM)" class="form-control" type="text" value="<?php echo $apply?>">
            </div>

            <label class="col-md-3 control-label">Apply (Foreign)</label>
            <div class="col-md-3">
                <input name="form[apply_foreign]" placeholder="Apply (Foreign)" class="form-control" type="text" value="<?php echo $apply_foreign?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Approved HOD (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_hod]" placeholder="Approved HOD (RM)" class="form-control" type="text" value="<?php echo $apprv_hod?>">
            </div>

            <label class="col-md-3 control-label">Approved HOD (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_hod_foreign]" placeholder="Approved HOD (Foreign)" class="form-control" type="text" value="<?php echo $apprv_hod_foreign?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Approved TNCA (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_tnca]" placeholder="Approved TNCA (RM)" class="form-control" type="text" value="<?php echo $apprv_tnca?>">
            </div>

            <label class="col-md-3 control-label">Approved TNCA (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_tnca_foreign]" placeholder="Approved TNCA (Foreign)" class="form-control" type="text" value="<?php echo $apprv_tnca_foreign?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Approved VC (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_vc]" placeholder="Approved VC (RM)" class="form-control" type="text" value="<?php echo $apprv_vc?>">
            </div>

            <label class="col-md-3 control-label">Approved VC (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_vc_foreign]" placeholder="Approved VC (Foreign)" class="form-control" type="text" value="<?php echo $apprv_vc_foreign?>">
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_stf_con_allw"><i class="fa fa-save"></i> Save</button>
    </div>
</form>