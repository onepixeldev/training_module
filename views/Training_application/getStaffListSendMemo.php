<p>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group text-right">
			<label><b>REFERENCE ID : </b></label>
		</div>
	</div> 
	<div class="col-sm-8">
		<div class="form-group text-left"><?php echo $refid. " - " .$tname?></div>
	</div> 
</div>
<br>
<div class="well">
	<div id="loader"></div>
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_sta_eva">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Department</th>
            <th class="text-center">Evaluator ID</th>
            <th class="text-left">Evaluator Name</th>
			<th class="text-center">Submit Date</th>
            <th class="text-center">Send Memo</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($staff_list_sm)) {
				foreach ($staff_list_sm as $sls) {
                    if(!empty($sls->SND_MEM)) {
                        $send_memo = $sls->SND_MEM;
                    } else {
                        $send_memo = '0';
                    }
					echo '
					<tr>
						<td class="text-center col-md-1 sid">' . $sls->STF_ID . '</td>
						<td class="text-left col-md-3 sname">' . $sls->STF_N1 . '</td>
                        <td class="text-center col-md-1">' . $sls->STF_DEPT1 . '</td>
                        <td class="text-center col-md-1 evaID">' . $sls->EVA_ID . '</td>
						<td class="text-left col-md-3">' . $sls->STF_N2 . '</td>
						<td class="text-center col-md-1">' . $sls->STH_SB_DT . '</td>
                        <td class="text-center col-md-1 send_memo">' . $send_memo . '</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-primary text-left btn-xs sta_snd_memo_btn" value='.$refid.'><i class="fa fa-paper-plane"></i> Send Memo</button>
                           <!--<div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs sta_eva_edit_btn" value='.$refid.'><i class="fa fa-pencil-square-o"></i> Edit</button>
                                    
                                </div>
                            </div>-->
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