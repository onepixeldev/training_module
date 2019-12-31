<p>
<form id="crCpdSetup" class="form-horizontal" method="post">

    <div class="form-group">
        <label class="col-md-2 control-label">Year</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $year?>" id="year" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $staff_id?>" id="staffID" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $staff_name?>" id="staffName" readonly>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>

        <div class="container col-md-4">
            <div class="panel panel-default text-left">

                <div class="panel-body" id="summary">

                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <label class="col-md-6 control-label"><b>Accumulated CPD Point</b></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">TERAS</label>
                        <div class="col-md-4">
                            <input name="" placeholder="TERAS" value="<?php echo $req_accu_cpd->COMP_TR?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">KHUSUS</label>
                        <div class="col-md-4">
                            <input name="" placeholder="KHUSUS" value="<?php echo $req_accu_cpd->COMP_KHU?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">UMUM</label>
                        <div class="col-md-4">
                            <input name="" placeholder="UMUM" value="<?php echo $req_accu_cpd->COMP_UM?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="container col-md-4">
            <div class="panel panel-default text-left">

                <div class="panel-body" id="summary">

                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <label class="col-md-5 control-label"><b>Required CPD Point</b></label>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">TERAS</label>
                        <div class="col-md-4">
                            <input name="" placeholder="TERAS" value="<?php echo $req_accu_cpd->TR_MIN?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">KHUSUS</label>
                        <div class="col-md-4">
                            <input name="" placeholder="KHUSUS" value="<?php echo $req_accu_cpd->KHU_MIN?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">UMUM</label>
                        <div class="col-md-4">
                            <input name="" placeholder="UMUM" value="<?php echo $req_accu_cpd->UM_MIN?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_vdetl_list" style="width: 100%">
		<thead>
		<tr>
            <th class="text-center">Refid</th>
            <th class="text-center">Title</th>
            <th class="text-center">Mark</th>
            <th class="text-center">Competency</th>
            <th class="text-center">Type</th>
            <th class="text-center">Attend Confirmation?</th>
            <th class="text-center">Compulsary Status?</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($s_cpd_pt_detl)) {
				foreach ($s_cpd_pt_detl as $scpdpd) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $scpdpd->VCP_REFID . '</td>
                        <td class="text-left col-md-4">' . $scpdpd->VCP_TITLE . '</td>
                        <td class="text-center col-md-1">' . $scpdpd->VCP_MARK . '</td>
                        <td class="text-center col-md-1">' . $scpdpd->VCP_COMPETENCY . '</td>
                        <td class="text-center col-md-1">' . $scpdpd->VCP_TYPE . '</td>
                        <td class="text-center col-md-1">' . $scpdpd->STD_ATTEND_DESC . '</td>
                        <td class="text-center col-md-1">' . $scpdpd->CH_STATUS . '</td>
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