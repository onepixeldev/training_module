<form id="updConPartRole" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="updConPartRoleAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code</label>
            <div class="col-md-4">
                <input name="form[code]" placeholder="Code" class="form-control" type="text" value="<?php echo $cpr_code?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" id="pRoleLabel">Participant Role <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[participant_role]" placeholder="Participant Role" class="form-control" type="text" value="<?php echo $part_role_detl->CPR_DESC?>" id="pRole">
            </div>
        </div>

        <div class="form-group" id="ref_code">
            <label class="col-md-3 control-label">Ref Code</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[ref_code]', $ref_role, $part_role_detl->CPR_ASSE_ROLE_CODE, 'class="form-control width-50" id="refCode"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Order By</label>
            <div class="col-md-4">
                <input name="form[order_by]" placeholder="Order By" class="form-control" type="text" value="<?php echo $part_role_detl->CPR_ORDER_BY?>" id="orderBy">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">CPD Counted (Academic)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[cpd_counted_academic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $part_role_detl->CPR_CPD_COUNTED_ACAD, 'class="form-control width-50" id="cpdAcad"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">CPD Counted (Non-Academic)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[cpd_counted_non_academic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $part_role_detl->CPR_CPD_COUNTED_NACAD, 'class="form-control width-50" id="cpdNacad"')
                ?>
            </div>
        </div>

        <div class="form-group" id="display_conference">
            <label class="col-md-3 control-label">Display Conference?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[display_conference]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $part_role_detl->CPR_DISPLAY, 'class="form-control width-50" id="display_conference_f"')
                ?>
            </div>
        </div>

        <div class="form-group" id="prosiding">
            <label class="col-md-3 control-label">Prosiding?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[prosiding]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $part_role_detl->CPR_PROCEEDING, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group hidden" id="display_rmic">
            <label class="col-md-3 control-label display_rmic_lbl">Display RMIC?</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[display_rmic]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $part_role_detl->CPR_RMIC, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div id="oth_detl">
            <div class="form-group">
                <label class="col-md-3 control-label oth_detl1">Number of attachment</label>
                <div class="col-md-4">
                    <input name="form[number_of_attachment]" placeholder="No. of attachment" class="form-control" type="text" value="<?php
                    if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_TOTAL_ATTACH_RMIC;
                    } else {
                        echo $part_role_detl->CPR_TOTAL_ATTACHMENTS;
                    }?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label oth_detl2">Checklist (BM)</label>
                <div class="col-md-8">
                    <textarea name="form[checklist_bm]" placeholder="Checklist (BM)" class="form-control" type="text" rows="4" cols="50"><?php
                    if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_CHECKLIST_RMIC;
                    } else {
                        echo $part_role_detl->CPR_CHECKLIST;
                    }?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label oth_detl3">Checklist (BI)</label>
                <div class="col-md-8">
                    <textarea name="form[checklist_bi]" placeholder="Checklist (BI)" class="form-control" type="text" rows="4" cols="50"><?php
                    if($mod == 'RMIC') {
                        echo $part_role_detl->CPR_CHECKLIST_ENG_RMIC;
                    } else {
                        echo $part_role_detl->CPR_CHECKLIST_ENG;
                    }?></textarea>
                </div>
            </div>
        </div>
            

        <div id="updConPartRoleAlertFoot"></div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_pr"><i class="fa fa-save"></i> Save</button>
    </div>
</form>