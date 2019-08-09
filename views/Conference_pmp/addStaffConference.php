<div class="modal-header btn-primary">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Staff</h4>
</div>
<br>
<div class="alert alert-info fade in">
    <b>Staff Conference Details</b>
</div>
<form id="addStaffConference" class="form-horizontal" method="post">
    <div id="alertStaffConference">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID <b><font color="red">*</font></b></label>
        <div class="col-md-10">
            <?php
                echo form_dropdown('form[staff_id]', $staff_list, '', 'class="select2-filter form-control" style = "width: 100%" id="staffID"')
            ?>
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
            <input name="form[venue]" placeholder="Venue" value="<?php echo $venue?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">    
        <label class="col-md-2 control-label">City</label>
        <div class="col-md-4">
            <input name="form[city]" placeholder="City" value="<?php echo $city?>" class="form-control" type="text" readonly>
        </div>

        <label class="col-md-2 control-label">Postcode</label>
        <div class="col-md-2">
            <input name="form[postcode]" placeholder="Postcode" value="<?php echo $postcode?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">State</label>
        <div class="col-md-4">
            <input name="form[state]" placeholder="State" value="<?php echo $state?>" class="form-control" type="text" readonly>
        </div>
        
        <label class="col-md-2 control-label">Country</label>
        <div class="col-md-4">
            <input name="form[country]" placeholder="Country" value="<?php echo $country?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-4">
            <input name="form[date_from]" placeholder="DD/MM/YYYY" value="<?php echo $date_from?>" class="datepicker form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-4">
            <input name="form[date_to]" placeholder="DD/MM/YYYY" value="<?php echo $date_to?>" class="datepicker form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Organizer</label>
        <div class="col-md-10">
            <input name="form[organizer]" placeholder="Organizer" value="<?php echo $organizer?>" class="form-control" type="text" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Role <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[role]', $cr_role_list, '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Paper Title (1)</label>
        <div class="col-md-10">
            <input name="form[paper_title1]" placeholder="Paper Title 1" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Paper Title (2)</label>
        <div class="col-md-10">
            <input name="form[paper_title2]" placeholder="Paper Title 2" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Category <b><font color="red">* </font></b></label>
        <div class="col-md-6">
            <?php
                echo form_dropdown('form[category]', $cr_cat_list, '', 'class="form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Sponsor ? <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[sponsor]', $cr_spon_list, 'N', 'class="form-control width-50" id="sponsor"')
            ?>
        </div>


        <label class="col-md-2 control-label" id="spName">Sponsor Name</label>
        <div class="col-md-4">
            <input name="form[sponsor_name]" placeholder="Sponsor Name" class="form-control" type="text" id="spNameInput" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" id="budSp">Budget Origin for Sponsor</label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[budget_origin_for_sponsor]', $cr_budget_spon_list, '', 'class="form-control width-50 budSpInput" disabled')
            ?>
            <input name="form[budget_origin_for_sponsor]" class="form-control" type="hidden" id="spNameInputDummy" readonly>
        </div>

        <label class="col-md-2 control-label" id="totalAmt">Total (RM)</label>
        <div class="col-md-4">
            <input name="form[total]" placeholder="Total (RM)" class="form-control" type="text" id="totalAmtInput" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Budget Origin <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[budget_origin]', $cr_budget_origin_list, '', 'class="form-control width-50"')
            ?>
        </div>


        <label class="col-md-2 control-label">Apply Date</label>
        <div class="col-md-4">
            <input name="form[apply_date]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Status <b><font color="red">* </font></b></label>
        <div class="col-md-4">
            <?php
                echo form_dropdown('form[status]', $cr_status_list, '', 'class="form-control width-50" id="status"')
            ?>
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
                    <textarea name="form[remark1]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"></textarea>
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
                    <textarea name="form[remark2]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"></textarea>
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
                    <textarea name="form[remark3]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"></textarea>
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
                    <textarea name="form[remark4]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved By (HOD)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_hod]', $staff_list, '', 'class="select2-filter form-control" style = "width: 100%" id="approveByHod"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Approved Date (HOD)</label>
        <div class="col-md-2">
            <input name="form[approved_date_hod]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approveDateHod">
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>TNC (A&A) Approval/Verification</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark (TNCA)</label>
        <div class="col-md-8">
            <textarea name="form[remark_tnc]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50" id="tncaRemark"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved By (TNCA)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_tnc]', $staff_list, '', 'class="select2-filter form-control" style = "width: 100%" id="approveByTnca"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date (TNCA)</label>
        <div class="col-md-2">
            <input name="form[approved_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text" id="approveDateTnca">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Received Date (TNCA)</label>
        <div class="col-md-2">
            <input name="form[received_date_tnc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text">
        </div>
    </div>

    <br>
    <div class="alert alert-info fade in">
        <b>VC Approval</b>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark (VC)</label>
        <div class="col-md-8">
            <textarea name="form[remark_vc]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved By (VC)</label>
        <div class="col-md-8">
            <?php
                echo form_dropdown('form[approved_by_vc]', $staff_list, '', 'class="select2-filter form-control" style = "width: 100%" id="approveByVc"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Approved Date (VC)</label>
        <div class="col-md-2">
            <input name="form[approved_date_vc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Received Date (VC)</label>
        <div class="col-md-2">
            <input name="form[received_date_vc]" placeholder="DD/MM/YYYY" class="datepicker form-control" type="text">
        </div>
    </div>

    <div id="alertStaffConferenceFooter"></div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary ins_stf_cr"><i class="fa fa-save"></i> Save</button>
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

        $('#timepicker').datetimepicker({
            format: 'LT',
            format: 'hh:mm A'
        });
	});
</script>