<form id="crRepList" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Conference / Workshop / Seminar List</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label class="col-md-2 control-label">Staff ID</label>
            <div class="col-md-2">
                <input name="form[staff_id_md]" value="<?php echo $staff_id; ?>" placeholder="Staff ID" class="form-control" type="text" id="staff_id_md" readonly>
            </div>

            <div class="col-md-6">
                <input placeholder="Staff Name" value="<?php echo $staff_name; ?>" class="form-control" type="text" id="staff_name_md" readonly>
            </div>
        </div>
        <br>
        <div class="alert alert-info fade in">
            <b>List of Approved conference / workshop / seminar</b>
        </div>
        <p>
            <div class="well">
                <div class="row table-condensed table-responsive">
                    <table class="table table-bordered table-hover" id="con_sr_list">
                    <thead>
                    <tr>
                        <th class="text-center col-md-2">Ref ID</th>
                        <th class="text-left col-md-4">Description</th>
                        <th class="text-center col-md-1">Date From</th>
                        <th class="text-center col-md-1">Date To</th>
                        <th class="text-center col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!empty($cr_inf)) {
                            foreach ($cr_inf as $cri) {
                                echo '
                                <tr>
                                    <td class="text-center">' . $cri->CM_REFID . '</td>
                                    <td class="text-left">' . $cri->CM_NAME . '</td>
                                    <td class="text-center">' . $cri->CM_DATE_FROM . '</td>
                                    <td class="text-center">' . $cri->CM_DATE_TO . '</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-xs select_conference"><i class="fa fa-chevron-down"></i> Select</button>
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
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
    </div>
</form>