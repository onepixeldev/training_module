<div class="modal-header btn-primary">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Research Project</h4>
</div>
<div class="modal-body">
    <p>
        <div class="well">
            <div class="row table-condensed table-responsive">
                <table class="table table-bordered table-hover" id="tbl_rsh_list">
                <thead>
                <tr>
                    <th class="text-center col-md-1">Research ID</th>
                    <th class="text-left col-md-4">Title</th>
                    <th class="text-center col-md-1">Date From</th>
                    <th class="text-center col-md-1">Date To</th>
                    <th class="text-center col-md-1">Grant (RM)</th>
                    <th class="text-center col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if (!empty($rsh_detl)) {
                        foreach ($rsh_detl as $rd) {
                            echo '
                            <tr>
                                <td class="text-center">' . $rd->SR_PROJECT_ID . '</td>
                                <td class="text-left">' . $rd->SR_RESEARCH_TITLE . '</td>
                                <td class="text-center">' . $rd->SR_DATE_FROM . '</td>
                                <td class="text-center">' . $rd->SR_DATE_TO . '</td>
                                <td class="text-center">' . number_format($rd->SR_GRANT_AMT,2) . '</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-xs select_research" value="'.$rd->SR_RESEARCH_REFID.'"><i class="fa fa-chevron-down"></i> Select</button>
                                </td>
                            </tr>
                            ';
                        }
                    } else {
                        echo '
                            <tr>
                                <td class="text-center" colspan="6">No record found</td>
                            </tr>
                            ';
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
