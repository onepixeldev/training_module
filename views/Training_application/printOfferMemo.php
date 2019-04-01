<form id="printOfferMemo" class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Print Offer Memo</h4>
    </div>
    <div class="modal-body">
        <div id="printOfferMemo">
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Month</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[month]', $month_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Year</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[month]', $year_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Course Title</label>
            <div class="col-md-8">
                <input name="form[staff_name]" class="form-control" type="text" value="" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Date of Submitted Email</label>
            <div class="col-md-8">
                <input name="form[staff_name]" class="form-control" type="text" value="" readonly>
            </div>
        </div>


    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-danger print_mem_btn"><i class="fa fa-print"></i> Print Memo</button>
    </div>
</form>