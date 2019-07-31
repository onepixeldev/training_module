<form class="form-horizontal" method="post" id="formAppDetl">
    <div class="alert alert-info fade in">
        <b>Conference Info</b>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Refid / Name</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>
        
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Description</label>
        <div class="col-md-10">
            <input name="" value="<?php echo $desc?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Address</label>
        <div class="col-md-10">
            <textarea rows="4" cols="50" class="form-control" type="text" readonly><?php echo $address?></textarea>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $city?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-2">
            <input name="" value="<?php echo $postcode?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $state?>" class="form-control" type="text" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $country?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $date_from?>" class="form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $date_to?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Enter By</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $enter_by?>" readonly>
        </div>
        
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_name?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Enter Date</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $enter_date?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>Staff Conference Details</b>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $staffID?>" readonly>
        </div>
        
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_name_con?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Category</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_CATEGORY_CODE?>" readonly>
        </div>
        
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->CC_DESC?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_BUDGET_ORIGIN ?>" class="form-control" type="text" readonly>
        </div>

        <div class="col-md-2" id="rsh_btn">
            <button type="button" class="btn btn-primary research_info" data-budget-origin="<?php echo $stf_detl->SCM_BUDGET_ORIGIN?>" value="<?php echo $stf_detl->SCM_RESEARCH_REFID?>" id="research_info_btn"><i class="fa fa-info-circle"></i> Research Info</button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Apply Date</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_APPLY_DATE?>" class="form-control" type="text" readonly>
        </div>
        
        <label class="col-md-2 control-label">Status</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_STATUS?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Leave Refid</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_LEAVE_REFID?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Role</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_PARTICIPANT_ROLE?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_SPONSOR_F?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Sponsor Name</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_SPONSOR_NAME?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin (Sponsor)</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_SPONSOR_BUDGET_ORIGIN?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Total (RM)</label>
        <div class="col-md-4">
            <input name="" value="<?php echo $stf_detl->SCM_RM_SPONSOR_TOTAL_AMT?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>File Attachment</b>
    </div>
    <p>
    <div class="well">
        <div class="row table-condensed table-responsive">
            <table class="table table-bordered table-hover" id="tbl_ca_list">
            <thead>
            <tr data-sid="<?php echo $staffID?>" data-refid="<?php echo $refid?>">
                <th class="text-center">Attachment ID</th>
                <th class="text-left">File Name</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (!empty($file_att)) {
                    foreach ($file_att as $fa) {
                        echo '
                        <tr>
                            <td class="text-center staff_id col-md-2">' . $fa->SAA_ATTACH_REFID . '</td>
                            <td class="text-left staff_id">' . $fa->SAA_FILENAME . '</td>
                            <td class="text-center col-md-1">
                                <button type="button" class="btn btn-primary btn-xs download_file_q"><i class="fa fa-download"></i> View File Attachment</button>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    echo '
                        <tr>
                            <td class="text-center" colspan="3">No record found</td>
                        </tr>
                        ';
                }
            ?>
            </tbody>
            </table>	
        </div>
    </div>
    </p>

    <br>
    <div class="alert alert-info fade in">
        <b>Head of Department Approval</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_APPROVER_REMARK4?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Recommender</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_rc_by?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Recommend Date</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RECOMMEND_DATE?>" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>TNCA Approval</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_TNCA_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve By</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_ap_tnca_by?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve Date</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_TNCA_APPROVE_DATE?>" readonly>
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>VC Approval</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="" class="form-control" type="text" rows="4" cols="50" readonly><?php echo $stf_detl->SCM_VC_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve By</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $stf_ap_vc_by?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approve Date</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $stf_detl->SCM_VC_APPROVE_DATE?>" readonly>
        </div>
    </div>
</form>