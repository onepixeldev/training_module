<div class="">
	<div class="modal-header btn-info">
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $toh_desc->TOH_ORG_DESC?></b></h4>
    </div>
    <div class="form-group">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td class="text-left col-md-4"><b>Code</b></td>
                    <td class="text-left"><?php echo $toh_code?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4 row h-50"><b>Address</b></td>
                    <td class="text-left row h-50"><?php echo $toh_desc->TOH_ADDRESS?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Postcode</b></td>
                    <td class="text-left"><?php echo $toh_desc->TOH_POSTCODE?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>City</b></td>
                    <td class="text-left"><?php echo $toh_desc->TOH_CITY?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>State</b></td>
                    <td class="text-left"><?php 
                     if(!empty($toh_s->SM_STATE_DESC)){
                        $st = $toh_s->SM_STATE_DESC;
                    }else {
                        $st = "";
                    }
                    echo $st?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>Country</b></td>
                    <td class="text-left"><?php 
                    if(!empty($toh_c->CM_COUNTRY_DESC)){
                        $cm = $toh_c->CM_COUNTRY_DESC;
                    }else {
                        $cm = "";
                    }
                    echo $cm?></td>
                </tr>
                <tr>
                    <td class="text-left col-md-4"><b>External Agency?</b></td>
                    <td class="text-left"><?php 
                    if($toh_desc->TOH_EXTERNAL_AGENCY == 'Y'){
                        $ea = 'YES';
                    }/*elseif($toh_desc->TOH_EXTERNAL_AGENCY == 'N'){
                        $ea = 'NO';
                    }*/
                    else{
                        $ea = 'NO';
                    }
                    echo $ea;
                    ?></td>
                </tr>
            </tbody>
            </table>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
            </div>
    </div>
</div>