<form id="searchStaff" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Staff List</h4>
    </div>
    <div class="modal-body">

        <div id="staff_list">
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
                                        <td class="text-center staff_id col-md-2">' . $si->STH_STAFF_ID . '</td>
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
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
    </div>
</form>