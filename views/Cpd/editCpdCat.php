<form id="editCpdCategory" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Update CPD Category</h4>
    </div>
    <div class="modal-body">
        <div id="editCpdCategoryAlert">
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code</label>
            <div class="col-md-4">
                <input name="form[code]" placeholder="Code" class="form-control" type="text" value="<?php echo $code?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Description</label>
            <div class="col-md-8">
                <input name="form[description]" placeholder="Description" class="form-control" type="text" value="<?php echo $cpd_cat_detl->CC_CATEGORY_DESC?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'--- Please Select ---', 'Y'=>'Active', 'N'=>'Inactive'), $cpd_cat_detl->CC_STATUS, 'class="form-control"')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_cpd_cat"><i class="fa fa-save"></i> Save</button>
    </div>
</form>