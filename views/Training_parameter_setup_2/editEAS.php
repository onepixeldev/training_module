<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record <b>(<?php
            $rem ="";  
            if(($eas_desc->HP_PARM_NO==1) && ($eas_desc->HP_PARM_CODE=="EXTERNAL_MAX_DAY_APPL")){
                $rem = 'External max day apply';
            }
            if(($eas_desc->HP_PARM_NO==1) && ($eas_desc->HP_PARM_CODE=="EXTERNAL_URL")){
                $rem = 'Guideline URL';
            }     
            echo $rem;
            ?>)</b></h4>
    </div>
    <div class="modal-body">
        <div id="alert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <?php

            if ($eas_desc->HP_PARM_CODE=="EXTERNAL_MAX_DAY_APPL"){
                echo '
                    <div class="form-group">
                        <label class="col-md-5 control-label"><b>External Max Day Apply</b><b><font color="red">*</font></b></label>
                        <div class="col-md-3">
                            <input type="text" name="form[external_max_day_apply]" class="form-control" value="'.$eas_desc->HP_PARM_DESC.'" placeholder="Number">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[eas_no]" class="form-control" value="'.$eas_no.'">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[eas_code]" class="form-control" value="'.$eas_desc->HP_PARM_CODE.'">
                        </div>
                    </div>
                ';
            } 
            if ($eas_desc->HP_PARM_CODE=="EXTERNAL_URL"){
                echo '
                    <div class="form-group">
                        <label class="col-md-3 control-label text-left"><b>Guideline URL</b><b><font color="red">*</font></b></label>
                        <div class="col-md-12">
                            <input type="text" name="form[guideline_url]" class="form-control" value="'.$eas_desc->HP_PARM_DESC.'" placeholder="Guideline URL">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[eas_no]" class="form-control" value="'.$eas_no.'">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[eas_code]" class="form-control" value="'.$eas_desc->HP_PARM_CODE.'">
                        </div>
                    </div>
                ';
            }
        ?>    


        
    </div>
    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script> 
$(document).ready(function(){	
		$('form').submit(function (e) { 
			e.preventDefault();
			var data = $('form').serialize();	
			msg.wait('#alert');
			
			$('.btn').attr('disabled', 'disabled');
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('updateEAS')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s7')?>';
						}, 1000);
					} else {
						$('.btn').removeAttr('disabled');
					}
				},
				error: function() {
					$('.btn').removeAttr('disabled');
					msg.danger('Please contact administrator.', '#alert');
					msg.danger('Please contact administrator.', '#alertWarning');
				}
			});			
		});  				

	});
</script>