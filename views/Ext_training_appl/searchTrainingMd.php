<form id="searchTraining" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Search Training</h4>
    </div>
    <div class="modal-body">
        <div id="tr_list">
            <p>
                <div class="well">
                    <div class="row table-condensed table-responsive">
                        <table class="table table-bordered table-hover" id="tbl_tr_res_list">
                        <thead>
                        <tr>
                            <th class="text-center">Refid</th>
                            <th class="text-left">Training Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (!empty($train_list)) {
                                foreach ($train_list as $tl) {
                                    echo '
                                    <tr>
                                        <td class="text-center staff_id col-md-2">' . $tl->TH_REF_ID . '</td>
                                        <td class="text-left staff_id">' . $tl->TH_TRAINING_TITLE . '</td>
                                        <td class="text-center col-md-1">
                                            <button type="button" class="btn btn-primary btn-xs select_refid"><i class="fa fa-chevron-down"></i> Select</button>
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