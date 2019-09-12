<form id="staffResearchInfo" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $stf_name?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_title]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $cm_name?>" id="crName" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-2">
            <input name="form[date_from]" placeholder="DD/MM/YYYY" value="<?php echo $date_from?>" class="datepicker form-control" type="text" readonly>
        </div>


        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-2">
            <input name="form[date_to]" placeholder="DD/MM/YYYY" value="<?php echo $date_to?>" class="datepicker form-control" type="text" readonly>
        </div>
    </div>


    <div class="alert alert-info fade in">
        <b>Staff Research Info</b>
    </div>

    <div id="alertStaffResearchInfo">
        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
    </div>
    
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

    <!--<div id="alertStaffResearchInfoFooter"></div>-->
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary save_research_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>