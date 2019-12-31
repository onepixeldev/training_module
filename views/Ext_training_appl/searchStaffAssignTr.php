<form id="" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Search Staff</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label class="col-md-4 control-label">Staff ID / Name</label>
            <div class="col-md-3">
                <input name="form[staff_id]" placeholder="Staff ID / Name" class="form-control" type="text" value="" id="staff_id">
            </div>
            

            <div class="col-md-2">
                <button type="button" class="btn btn-primary search_staff_md"><i class="fa fa-search"></i> </button>
            </div>
        </div>

        <div class="form-group">
            <div id="alertStfIDMD"></div>
        </div>
        <br>

        <div class="hidden" id="staff_list">
            <p>
                <div class="well">
                    <div class="row table-condensed table-responsive">
                        <table class="table table-bordered table-hover" id="tbl_stf_res_list">
                        <thead>
                        <tr>
                            <th class="text-center">Staff ID</th>
                            <th class="text-left">Staff Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (!empty($stf_inf)) {
                                foreach ($stf_inf as $si) {
                                    echo '
                                    <tr>
                                        <td class="text-center staff_id col-md-2">' . $si->SM_STAFF_ID . '</td>
                                        <td class="text-left staff_id">' . $si->SM_STAFF_NAME . '</td>
                                        <td class="text-center col-md-1">
                                            <button type="button" class="btn btn-primary btn-xs select_staff_id"><i class="fa fa-chevron-down"></i> Select</button>
                                        </td>
                                    </tr>
                                    ';
                                }
                            } 
                        ?>
                        </tbody>
                        </table>	
                    </div>
                </div>
            </p>    
        </div>
        
        <br>
</form>

<div class="hidden" id="staff_form">
    <form id="assignStaffForm" class="form-horizontal" method="post">
        <div class="alert alert-info fade in">
            <b>Details</b>
        </div>

        <div id="loaderAlert">
        </div>

        <div class="modal-body">
            <div id="assignStaffAlert">
                <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Refid</label>
                <div class="col-md-4">
                    <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Staff ID</label>
                <div class="col-md-2">
                    <input name="form[staff_id_form]" class="form-control" type="text" id="stfID" readonly>
                </div>

                <div class="col-md-6">
                    <input name="form[staff_name]" class="form-control" type="text" readonly style="font-size: 11px;" id="stfName">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Department</label>
                <div class="col-md-4">
                    <input name="" class="form-control" type="text" id="staff_dept" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Role <b><font color="red">*</font></b></label>
                <div class="col-md-4">
                    <?php
                        echo form_dropdown('form[role]', $role_list, '', 'class="form-control" style="width: 100%"')
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Status</label>
                <div class="col-md-4">
                    <?php
                        echo form_dropdown('form[status]', array(''=>'--- Please Select ---', 'VERIFY'=>'VERIFY', 'RECOMMEND'=>'RECOMMEND', 'APPROVE'=>'APPROVE', 'REJECT'=>'REJECT', 'CANCEL'=>'CANCEL', 'RECOMMEND_BSM'=>'RECOMMEND_BSM'), '', 'class="form-control" style="width: 100%"')
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Fee Category <b><font color="red">*</font></b></label>
                <div class="col-md-8">
                    <?php
                        echo form_dropdown('form[fee_category]', $fee_list, '', 'class="form-control" style="width: 100%"')
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Fee (RM)</label>
                <div class="col-md-4">
                    <input name="" class="form-control" type="text" id="staff_fee" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Training Benefit (Staff)</label>
                <div class="col-md-8">
                    <input name="form[tr_benefit_stf]" placeholder="Training Benefit (Staff)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Training Benefit (Department)</label>
                <div class="col-md-8">
                    <input name="form[tr_benefit_dept]" placeholder="Training Benefit (Department)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Remark (HR)</label>
                <div class="col-md-8">
                    <input name="form[remark]" placeholder="Remark (HR)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Remark (KTP/Pendaftar/MPE)</label>
                <div class="col-md-8">
                    <input name="form[remark_other]" placeholder="Remark (KTP/pendaftar/MPE)" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Evaluation Status</label>
                <div class="col-md-4">
                    <?php
                        echo form_dropdown('form[eva_status]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), '', 'class="form-control" style="width: 100%"')
                    ?>
                </div>
            </div>
            
            <div id="assignStaffAlertFooter">
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary save_assign_stf"><i class="fa fa-save"></i> Assign Staff</button>
        </div>
    </form>                            
</div>
            
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
</div>
