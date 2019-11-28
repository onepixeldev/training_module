<div class="modal-header btn-success">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Staff</h4>
</div>
<br>
<div class="text-right">
	<button type="button" class="btn btn-warning btn-sm file_att_btn"><i class="fa fa-upload"></i> File Attachment</button>

    <button type="button" repCode="ATR020" class="btn btn-danger btn-sm print_pmp_btn"><i class="fa fa-print"></i> Print PMP</button>

    <button type="button" repCode="ATRATT" class="btn btn-danger btn-sm print_att_btn"><i class="fa fa-print"></i> Print Appendix A/B</button>
</div>
<br>
<div class="alert alert-info fade in">
    <b>Staff Conference Details</b>
</div>
<form id="editStaffConference" class="form-horizontal" method="post">
    <div id="alertEditStaffConference">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID <b><font color="red">*</font></b></label>
        <div class="col-md-10">
            <?php
                echo form_dropdown('form[staff_id_dummy]', $staff_list, $staffID, 'class="form-control" style = "width: 100%" id="staffID" disabled')
            ?>
        </div>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="hidden" value="<?php echo $staffID?>" id="staff_id" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" placeholder="Conference Title" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" placeholder="Conference Title" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Venue</label>
        <div class="col-md-10">
            <input name="" placeholder="Venue" value="<?php echo $venue?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <input name="" placeholder="City" value="<?php echo $city?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-2">
            <input name="" placeholder="Postcode" value="<?php echo $postcode?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <input name="" placeholder="State" value="<?php echo $state?>" class="form-control" type="text" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <input name="" placeholder="Country" value="<?php echo $country?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-4">
            <input name="form[form_date_from]" placeholder="DD/MM/YYYY" value="<?php echo $date_from?>" class="datepicker form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-4">
            <input name="form[form_date_to]" placeholder="DD/MM/YYYY" value="<?php echo $date_to?>" class="datepicker form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer</label>
        <div class="col-md-10">
            <input name="" placeholder="Organizer" value="<?php echo $organizer?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div id="editRmicResearch" class="hidden">
        <br>

        <div class="form-group">
            <label class="col-md-2 control-label">Research Project <b><font color="red">* </font></b></label>
            <div class="col-md-2">
                <input name="form[research_project]" placeholder="Research project" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RESEARCH_REFID?>" id="research_project" readonly>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-primary search_research"><i class="fa fa-search"></i> Search</button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Research Title</label>
            <div class="col-md-10">
                <textarea name="" placeholder="Research title" class="form-control" type="text" rows="3" cols="50" id="research_title" readonly><?php echo $rsh_title?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Project ID</label>
            <div class="col-md-4">
                <input name="" placeholder="Project ID" class="form-control" type="text" value="<?php echo $rsh_id?>" id="project_id" readonly>
            </div>

            <label class="col-md-2 control-label">Grant Amount (RM)</label>
            <div class="col-md-4">
                <input name="" placeholder="RM" class="form-control" value="<?php echo $rsh_grant?>" type="text" id="grant_amount" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Research Date From</label>
            <div class="col-md-4">
                <input name="" placeholder="DD/MM/YYYY" value="<?php echo $rsh_df?>" class="form-control" type="text" id="research_date_from" readonly>
            </div>


            <label class="col-md-2 control-label">Research Date To</label>
            <div class="col-md-4">
                <input name="" placeholder="DD/MM/YYYY" value="<?php echo $rsh_dt?>" class="form-control" type="text" id="research_date_to" readonly>
            </div>
        </div>

        <br>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Role <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[role]', $cr_role_list, $stf_detl->SCM_PARTICIPANT_ROLE, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Paper Title (1)</label>
        <div class="col-md-10">
            <input name="form[paper_title1]" placeholder="Paper Title 1" class="form-control" type="text" value="<?php echo $stf_detl->SCM_PAPER_TITLE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Paper Title (2)</label>
        <div class="col-md-10">
            <input name="form[paper_title2]" placeholder="Paper Title 2" class="form-control" type="text" value="<?php echo $stf_detl->SCM_PAPER_TITLE2?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
        <div class="col-md-6">
            <?php
                echo form_dropdown('form[category]', $cr_cat_list, $stf_detl->SCM_CATEGORY_CODE, 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor ? <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[sponsor]', $cr_spon_list, $stf_detl->SCM_SPONSOR, 'class="form-control width-50" id="sponsor"')
            ?>
        </div>


        <label class="col-md-2 control-label" id="spName">Sponsor Name</label>
        <div class="col-md-4">
            <input name="form[sponsor_name]" placeholder="Sponsor Name" class="form-control" type="text" value="<?php echo $stf_detl->SCM_SPONSOR_NAME?>" id="spNameInput">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" id="budSp">Budget Origin for Sponsor</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[budget_origin_for_sponsor]', $cr_budget_spon_list, $stf_detl->SCM_SPONSOR_BUDGET_ORIGIN, 'class="form-control width-50 budSpInput"')
            ?>
            <input name="form[budget_origin_for_sponsor]" class="form-control" type="hidden" id="spNameInputDummy" readonly>
        </div>

        <label class="col-md-2 control-label" id="totalAmt">Total (RM)</label>
        <div class="col-md-4">
            <input name="form[total]" placeholder="Total (RM)" class="form-control" type="text" value="<?php echo $stf_detl->SCM_RM_SPONSOR_TOTAL_AMT?>" id="totalAmtInput">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[budget_origin]', $cr_budget_origin_list, $stf_detl->SCM_BUDGET_ORIGIN, 'class="form-control width-50"')
            ?>
        </div>


        <label class="col-md-2 control-label">Apply Date</label>
        <div class="col-md-4">
            <input name="form[apply_date]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $stf_detl->SCM_APPLY_DATE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Status <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[status]', $cr_status_list, $stf_detl->SCM_STATUS, 'class="form-control width-50" id="statusUpd"')
            ?>
            <input name="form[status]" value="<?php echo $stf_detl->SCM_STATUS?>" class="form-control" type="hidden" id="statusUpdDummy" readonly disabled>
        </div>
    </div>

     <br>
    <div class="alert alert-info fade in">
        <b>Head of Department Approval/Verification</b>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-left">
                    <label><b>1. Relevance of application with applicant's specialization / task field :</b></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-right">
                    <textarea name="form[remark1]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $stf_detl->SCM_APPROVER_REMARK1?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-left">
                    <label><b>2. Stability and suitability reviews of paper work content for presentation :</b></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-right">
                    <textarea name="form[remark2]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $stf_detl->SCM_APPROVER_REMARK2?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-left">
                    <label><b>3. How are the P&P tasks / tasks in the department (if the applicant is an administration staff) can be replaced when the applicant attends the conference / seminar / workshop?</b></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-right">
                    <textarea name="form[remark3]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $stf_detl->SCM_APPROVER_REMARK3?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-left">
                    <label><b>4. Application is supported / not supported. Please provide a review.</b></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                <div class="form-group text-right">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group text-right">
                    <textarea name="form[remark4]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $stf_detl->SCM_APPROVER_REMARK4?></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved By (HOD)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_hod]', $staff_list, $stf_detl->SCM_RECOMMEND_BY, 'class="select2-filter form-control" style = "width: 100%" id="approveByHod"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved Date (HOD)</label>
        <div class="col-md-2">
            <input name="form[approved_date_hod]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approveDateHod" value="<?php echo $stf_detl->SCM_RECOMMEND_DATE?>">
        </div>
    </div>

    <div id="editRmic" class="hidden">
        <br>
        <div class="alert alert-info fade in">
            <b>Head of Department RMIC Approval/Verification</b>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Remark (RMIC)</label>
            <div class="col-md-8">
                <textarea name="form[remark_rmic]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50" id="remark_rmic"><?php echo $stf_detl->SCM_RMIC_REMARK?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved By (RMIC)</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[approved_by_rmic]', $staff_list, $stf_detl->SCM_RMIC_APPROVE_BY, 'class="select2-filter form-control" style = "width: 100%" id="approved_by_rmic"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved Date (RMIC)</label>
            <div class="col-md-2">
                <input name="form[approved_date_rmic]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approved_date_rmic" value="<?php echo $stf_detl->SCM_RMIC_APPROVE_DATE?>">
            </div>
        </div>

        <br>
        <div class="alert alert-info fade in">
            <b>TNC (PI) Approval/Verification</b>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Remark (TNCPI)</label>
            <div class="col-md-8">
                <textarea name="form[remark_tncpi]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50" id="remark_tncpi"><?php echo $stf_detl->SCM_TNCPI_REMARK?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved By (TNCPI)</label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[approved_by_tncpi]', $staff_list, $stf_detl->SCM_TNCPI_APPROVE_BY, 'class="select2-filter form-control" style = "width: 100%" id="approved_by_tncpi"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Approved Date (TNCPI)</label>
            <div class="col-md-2">
                <input name="form[approved_date_tncpi]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approved_date_tncpi" value="<?php echo $stf_detl->SCM_TNCPI_APPROVE_DATE?>">
            </div>
        </div>
    
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>TNC (A&A) Approval/Verification</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark (TNCA)</label>
        <div class="col-md-8">
            <textarea name="form[remark_tnc]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50" id="tncaRemark"><?php echo $stf_detl->SCM_TNCA_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved By (TNCA)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_tnc]', $staff_list, $stf_detl->SCM_TNCA_APPROVE_BY, 'class="select2-filter form-control" style = "width: 100%" id="approveByTnca"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date (TNCA)</label>
        <div class="col-md-2">
            <input name="form[approved_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approveDateTnca" value="<?php echo $stf_detl->SCM_TNCA_APPROVE_DATE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Received Date (TNCA)</label>
        <div class="col-md-2">
            <input name="form[received_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $stf_detl->SCM_TNCA_RECEIVE_DATE?>">
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>VC Approval</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark (VC)</label>
        <div class="col-md-8">
            <textarea name="form[remark_vc]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $stf_detl->SCM_VC_REMARK?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved By (VC)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_vc]', $staff_list, $stf_detl->SCM_VC_APPROVE_BY, 'class="select2-filter form-control" style = "width: 100%" id="approveByVc"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date (VC)</label>
        <div class="col-md-2">
            <input name="form[approved_date_vc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $stf_detl->SCM_VC_APPROVE_DATE?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Received Date (TNCA)</label>
        <div class="col-md-2">
            <input name="form[received_date_vc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" value="<?php echo $stf_detl->SCM_VC_RECEIVE_DATE?>">
        </div>
    </div>

    <div class="form-group hidden">
        <label class="col-md-2 control-label">MOD</label>
        <div class="col-md-2">
            <input name="form[mod]" class="form-control" type="text" value="<?php echo $mod?>" readonly>
        </div>
    </div>

    <div id="alertEditStaffConferenceFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary edit_stf_cr"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
	$(document).ready(function(){
        $('.select2-filter').select2({
            // placeholder: 'Select an option',
            width: 'resolve'
        });
        
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY'
        });
	});
</script>