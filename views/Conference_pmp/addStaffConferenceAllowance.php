<form id="addStaffConAllw" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">New Staff Conference Allowance</h4>
    </div>
    <div class="modal-body">
        <div id="addStaffConAllwAlert">
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
                    echo form_dropdown('form[allowance_code]', $cr_allowance_dd, '', 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Apply (RM) <b><font color="red">* </font></b></label>
            <div class="col-md-3">
                <input name="form[apply]" placeholder="Apply (RM)" class="form-control" type="text">
            </div>

            <label class="col-md-3 control-label">Apply (Foreign)</label>
            <div class="col-md-3">
                <input name="form[apply_foreign]" placeholder="Apply (Foreign)" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Approved HOD (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_hod]" placeholder="Approved HOD (RM)" class="form-control" type="text">
            </div>

            <label class="col-md-3 control-label">Approved HOD (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_hod_foreign]" placeholder="Approved HOD (Foreign)" class="form-control" type="text">
            </div>
        </div>

        <div id="allwRmic" class="hidden">
            <div class="form-group">
                <label class="col-md-3 control-label">Approved RMIC (RM)</label>
                <div class="col-md-3">
                    <input name="form[approved_rmic]" placeholder="Approved RMIC (RM)" class="form-control" type="text">
                </div>

                <label class="col-md-3 control-label">Approved RMIC (Foreign)</label>
                <div class="col-md-3">
                    <input name="form[approved_rmic_foreign]" placeholder="Approved RMIC (Foreign)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Approved TNCPI (RM)</label>
                <div class="col-md-3">
                    <input name="form[approved_tncpi]" placeholder="Approved TNCPI (RM)" class="form-control" type="text">
                </div>

                <label class="col-md-3 control-label">Approved TNCPI (Foreign)</label>
                <div class="col-md-3">
                    <input name="form[approved_tncpi_foreign]" placeholder="Approved TNCPI (Foreign)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group hidden">
                <label class="col-md-3 control-label">MOD</label>
                <div class="col-md-3">
                    <input name="form[mod]" value="<?php echo $mod?>" class="form-control" type="text" readonly>
                </div>
            </div>
        </div>
        

        <div class="form-group">
            <label class="col-md-3 control-label">Approved TNCA (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_tnca]" placeholder="Approved TNCA (RM)" class="form-control" type="text">
            </div>

            <label class="col-md-3 control-label">Approved TNCA (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_tnca_foreign]" placeholder="Approved TNCA (Foreign)" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Approved VC (RM)</label>
            <div class="col-md-3">
                <input name="form[approved_vc]" placeholder="Approved VC (RM)" class="form-control" type="text">
            </div>

            <label class="col-md-3 control-label">Approved VC (Foreign)</label>
            <div class="col-md-3">
                <input name="form[approved_vc_foreign]" placeholder="Approved VC (Foreign)" class="form-control" type="text">
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_stf_con_allw"><i class="fa fa-save"></i> Save</button>
    </div>
</form>