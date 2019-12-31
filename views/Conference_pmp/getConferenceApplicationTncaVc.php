<p>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_ca_list">
		<thead>
		<tr>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
            <th class="text-center">Position</th>
            <th class="text-center">Conference ID</th>
            <th class="text-center">Conference Name</th>
            <th class="text-center">Academician?</th>
            <th class="text-center">Apply Date</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($con_app_tncaa)) {
				foreach ($con_app_tncaa as $cat) {
					echo '
                    <tr>
						<td class="text-center col-md-1 staff_id">' . $cat->SCM_STAFF_ID . '</td>
                        <td class="text-left col-md-2">' . $cat->TITLE_NAME . '</td>
                        <td class="text-center col-md-2">' . $cat->SS_DESC_SHORT . '</td>
                        <td class="text-center col-md-2 refid">' . $cat->SCM_REFID . '</td>
                        <td class="text-center col-md-2 cr_name">' . $cat->CM_NAME . '</td>
                        <td class="text-center">' . $cat->SS_ACADEMIC_DESC . '</td>
                        <td class="text-center col-md-1">' . $cat->SCM_APPLY_DATE . '</td>
						<td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-primary text-left btn-block btn-xs select_stf_app_ver" value=""><i class="fa fa-chevron-right"></i> Approval</button>
									<button type="button" class="btn btn-success text-left btn-block btn-xs detl_stf_app_ver" value=""><i class="fa fa-info-circle"></i> Detail</button>
                                    <button type="button" class="btn btn-info text-left btn-block btn-xs history_stf_app_ver" value=""><i class="fa fa-history"></i> History</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs print_stf_app_ver" repcode="ATRAPPVER"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
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
<br>
<br>
<div id="detl_history_query">
	<div class="hidden" id="dhq">
		<div class="alert alert-success fade in">
			<b>Details</b>
		</div>

		<ul id="myTabdhq" class="nav nav-tabs bordered">
			<li class="active">
				<a style="color:#000 !important" href="#s1a" data-toggle="tab" aria-expanded="true">Conference Application</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s2a" data-toggle="tab" aria-expanded="false">Conference RMIC Approval</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s3a" data-toggle="tab" aria-expanded="false">Conference Leave</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s4a" data-toggle="tab" aria-expanded="false">Allowances</a>
			</li>
		</ul>
		<!-- myTabContent1 -->
		<div id="myTabContent" class="tab-content padding-10">

			<div class="tab-pane fade active in" id="s1a">
				<div id="conference_application">
				</div>
			</div> 

			<div class="tab-pane fade" id="s2a">
				<div id="conference_rmic_approval">
				</div>
			</div> 

			<div class="tab-pane fade" id="s3a">
				<div id="conference_leave_detl">
				</div>
			</div>

			<div class="tab-pane fade" id="s4a">
				<div id="allowances_detl">
				</div>
			</div>

		</div>
		<!-- end myTabContent1 -->
	</div>

	<div class="hidden" id="dhq2">
		<div class="alert alert-success fade in">
			<b>Conference History</b>
		</div>

		<ul id="myTab2" class="nav nav-tabs bordered">
			<li class="active">
				<a style="color:#000 !important" href="#s1b" data-toggle="tab" aria-expanded="true">Conference</a>
			</li>
		</ul>
		<!-- myTabContent1 -->
		<div id="myTabContent2" class="tab-content padding-10">

			<div class="tab-pane fade active in" id="s1b">
				<div id="conference">
				</div>
			</div> 

		</div>
		<!-- end myTabContent1 -->
	</div>
</div>