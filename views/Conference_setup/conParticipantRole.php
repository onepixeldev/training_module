<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_pr_btn"><i class="fa fa-plus"></i> Add New Conferance Participant Role</button>
</div>
<br>
<div class="well table-responsive">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_pr_list" style="width: 100%">
		<thead>
        <?php
			if ($mod == 'RMIC') {
                echo '
                <tr>
                    <th class="text-center">Order By</th>
                    <th class="text-center">Code</th>
                    <th class="text-left">Participant Role</th>
                    <th class="text-center">Ref Code</th>
                    <th class="text-left">Description</th>
                    <th class="text-center col-md-1">CPD Counted (ACADEMIC)</th>
                    <th class="text-center col-md-1">CPD Counted (NON-ACADEMIC)</th>
                    <th class="text-center col-md-1">Display RMIC?</th>
                    <th class="text-center col-md-1">Action</th>
                </tr>';
            } elseif($mod == 'CPD') {
                echo '
                <tr>
                    <th class="text-center">Order By</th>
                    <th class="text-center">Code</th>
                    <th class="text-left">Participant Role</th>
                    <th class="text-center col-md-1">CPD Counted (ACADEMIC)</th>
                    <th class="text-center col-md-1">CPD Counted (NON-ACADEMIC)</th>
                    <th class="text-center col-md-1">Display?</th>
                    <th class="text-center col-md-1">Action</th>
                </tr>';
            } else {
                echo '
                <tr>
                    <th class="text-center">Order By</th>
                    <th class="text-center">Code</th>
                    <th class="text-left">Participant Role</th>
                    <th class="text-center">Ref Code</th>
                    <th class="text-left">Description</th>
                    <th class="text-center col-md-1">CPD Counted (ACADEMIC)</th>
                    <th class="text-center col-md-1">CPD Counted (NON-ACADEMIC)</th>
                    <th class="text-center col-md-1">Display Conference?</th>
                    <th class="text-center col-md-1">Prosiding?</th>
                    <th class="text-center col-md-1">Action</th>
                </tr>';
            }
        ?>
		</thead>
		<tbody>
		<?php
			if (!empty($part_role)) {
                if ($mod == 'RMIC') {
                    foreach ($part_role as $pr) {
                        echo '
                        <tr>
                            <td class="text-center col-md-1">'.$pr->CPR_ORDER_BY.'</td>
                            <td class="text-center col-md-1 cpr_code">' . $pr->CPR_CODE . '</td>
                            <td class="text-left col-md-3 cpr_desc">' . $pr->CPR_DESC . '</td>
                            <td class="text-center col-md-1">'.$pr->CPR_ASSE_ROLE_CODE.'</td>
                            <td class="text-left col-md-1">'.$pr->CTR_ROLE.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_ACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_NACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_RMIC.'</td>
                            <td class="text-center col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                        <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                            <button type="button" class="btn btn-info text-left btn-block btn-xs detl_pr_btn"><i class="fa fa-info-circle"></i> Other details</button>
                                            <button type="button" class="btn btn-success text-left btn-block btn-xs edit_pr_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </td>   
                        </tr>
                        ';
                    }
                } elseif($mod == 'CPD') {
                    foreach ($part_role as $pr) {
                        echo '
                        <tr>
                            <td class="text-center col-md-1">'.$pr->CPR_ORDER_BY.'</td>
                            <td class="text-center col-md-1 cpr_code">' . $pr->CPR_CODE . '</td>
                            <td class="text-left col-md-3 cpr_desc">' . $pr->CPR_DESC . '</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_ACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_NACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_DISPLAY.'</td>
                            <td class="text-center col-md-1">
                                <button type="button" class="btn btn-success text-left btn-xs edit_pr_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
                            </td>   
                        </tr>
                        ';
                    }
                } else {
                    foreach ($part_role as $pr) {
                        echo '
                        <tr>
                            <td class="text-center col-md-1">'.$pr->CPR_ORDER_BY.'</td>
                            <td class="text-center col-md-1 cpr_code">' . $pr->CPR_CODE . '</td>
                            <td class="text-left col-md-3 cpr_desc">' . $pr->CPR_DESC . '</td>
                            <td class="text-center col-md-1">'.$pr->CPR_ASSE_ROLE_CODE.'</td>
                            <td class="text-left col-md-1">'.$pr->CTR_ROLE.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_ACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_CPD_COUNTED_NACAD.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_DISPLAY.'</td>
                            <td class="text-center col-md-1">'.$pr->CPR_PROCEEDING.'</td>
                            <td class="text-center col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                        <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                            <button type="button" class="btn btn-info text-left btn-block btn-xs detl_pr_btn"><i class="fa fa-info-circle"></i> Other details</button>
                                            <button type="button" class="btn btn-success text-left btn-block btn-xs edit_pr_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                            <button type="button" class="btn btn-danger text-left btn-block btn-xs del_pr_btn"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </td>   
                        </tr>
                        ';
                    }
                }
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>