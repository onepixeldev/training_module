<form class="well form-horizontal" method="post">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel">Record Details</h4>
    </div>
	<h5 class="panel-heading bg-success txt-color-black"><b>Details</b></h5>
		<br>
		<div class="form-group">
				<label class="col-md-3 control-label font-weight-bold"><b>Status </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_STATUS?>" readonly>
				</div>
			<!--/div>	
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>IC No. </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_IC_NO?>" readonly>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Name </b></label>
				<div class="col-md-9">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_FACILITATOR_NAME?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Department </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_DEPARTMENT?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Organization </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_ORGANIZATION?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Position </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_POSITION?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Office Tel No. </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_TELNO_WORK?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>H/P No. </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_HANDPHONE_NO?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Email </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_EMAIL_ADDR?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 1 </b></label>
				<div class="col-md-9">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_AREA_1?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 2 </b></label>
				<div class="col-md-9">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_AREA_2?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Area 3 </b></label>
				<div class="col-md-9">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_AREA_3?>" readonly>
				</div>
			</div>
		</div>
		<h5 class="panel-heading bg-success txt-color-black"><b>Address</b></h5>
		<div class="form-group">
				<label class="col-md-3 control-label"><b>Address </b></label>
				<div class="col-md-9">
					<textarea class="form-control" type="text" rows="5" readonly><?php echo $ef_info->EF_ADDRESS?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Postcode </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_PCODE?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $ef_info->EF_CITY?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><b>Country </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php if (!empty($ef_state_country_desc->CM_COUNTRY_DESC)){echo $ef_state_country_desc->CM_COUNTRY_DESC;}?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php if (!empty($ef_state_country_desc->SM_STATE_DESC)){echo $ef_state_country_desc->SM_STATE_DESC;}?>" readonly>
				</div>
			</div>
		<div id="alertWarning"></div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
		</div>
</form>