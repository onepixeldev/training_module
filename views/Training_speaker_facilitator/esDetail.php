<form class="form-horizontal">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel">Record Details </h4>
    </div>
		<br>
		<div class="form-group">
				<label class="col-md-2 control-label"><b>Status </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_STATUS?>" readonly>
				</div>
			<!--/div>	
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>IC No. </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_IC_NO?>" readonly>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Name </b></label>
				<div class="col-md-9">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_SPEAKER_NAME?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Organization </b></label>
				<div class="col-md-3">
					<textarea class="form-control" type="text" rows="4" readonly><?php echo $es_info->ES_DEPT?></textarea>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>Position </b></label>
				<div class="col-md-4">
					<textarea class="form-control" type="text" rows="4" readonly><?php echo $es_info->ES_POSITION?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Office Tel No. </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_TELNO_WORK?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>HP No. </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_HANDPHONE?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Address </b></label>
				<div class="col-md-9">
					<textarea class="form-control" type="text" rows="5" readonly><?php echo $es_info->ES_ADDRESS?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Postcode </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_PCODE?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>City </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php echo $es_info->ES_CITY?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><b>Country </b></label>
				<div class="col-md-3">
					<input class="form-control" type="text" value="<?php if (!empty($es_country_desc->CM_COUNTRY_DESC)){echo $es_country_desc->CM_COUNTRY_DESC;}?>" readonly>
				</div>
			<!--/div>
			<div class="form-group"-->
				<label class="col-md-2 control-label"><b>State </b></label>
				<div class="col-md-4">
					<input class="form-control" type="text" value="<?php if (!empty($es_state_desc->SM_STATE_DESC)){echo $es_state_desc->SM_STATE_DESC;}?>" readonly>
				</div>
			</div>
		</div>					
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
		</div>
</form>