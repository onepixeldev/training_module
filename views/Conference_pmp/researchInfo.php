<form id="researchInfo" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Research Info</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label class="col-md-3 control-label">Research Title / Research Project</label>
            <div class="col-md-3">
                <input name="form[research_refid]" class="form-control" type="text" value="<?php echo $research_refid?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <textarea name="form[research_title]" class="form-control" type="text" rows="3" cols="50" readonly><?php echo $research_desc?></textarea>
            </div>

            
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Project ID</label>
            <div class="col-md-3">
                <input name="form[project_id]" class="form-control" type="text" value="<?php echo $project_id ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Grant Amount (RM)</label>
            <div class="col-md-3">
                <input name="form[grant_amount]" class="form-control" type="text" value="<?php echo $grant_amt ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Date From</label>
            <div class="col-md-3">
                <input name="form[date_from]" placeholder="DD/MM/YYYY" value="<?php echo $rsh_date_from ?>" class="form-control" type="text" readonly>
            </div>


            <label class="col-md-2 control-label">Date To</label>
            <div class="col-md-3 text-left">
                <input name="form[date_to]" placeholder="DD/MM/YYYY" value="<?php echo $rsh_date_to ?>" class="form-control text-left" type="text" readonly>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
    </div>
</form>