<form class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title" id="myModalLabel">Edit Record <b>(<?php
            $rem ="";
            if($hpp_desc->HP_PARM_NO==1){
                $rem = 'First Reminder';
            }
            if($hpp_desc->HP_PARM_NO==2){
                $rem = 'Second Reminder';
            }
            if($hpp_desc->HP_PARM_NO==3){
                $rem = 'Third Reminder';
            }   
            if(($hpp_desc->HP_PARM_NO==1) && ($hpp_desc->HP_PARM_CODE=="TRAINING_EVALUATION_MEMO")){
                $rem = 'Reminder for sending memo';
            }
            if(($hpp_desc->HP_PARM_NO==1) && ($hpp_desc->HP_PARM_CODE=="TRAINING_EVALUATION_PORTAL")){
                $rem = 'Function for portal';
            }     
            echo $rem;
            ?>)</b></h4>
    </div>
    <div class="modal-body">
        <div id="alert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <?php 
            $rem = ""; 
            $formn = "";
            $funcpor = "";
            
            if(($hpp_desc->HP_PARM_NO==1) && ($hpp_desc->HP_PARM_CODE=="TRAINING_EVALUATION_MEMO")){
                $rem = 'Time(s)';
            } else {
                $rem = 'Day(s)';
            }

            if($hpp_desc->HP_PARM_CODE=="TRAINING_EVALUATION_MEMO") {
                $formn = 'time';
            } else {
                $formn = 'day';
            }

            if ($hpp_desc->HP_PARM_DESC == 'Y') {
                $funcpor = 'YES';
            } else {
                $funcpor = 'NO';
            }

            if ($hpp_desc->HP_PARM_CODE=="TRAINING_EVALUATION_PORTAL"){
                echo '
                    <div class="form-group">
                        <label class="col-md-5 control-label"><b>Enable function? </b><b><font color="red">*</font></b></label>
                        <div class="col-md-2">
                            '.form_dropdown('form[function_portal]', array('Y'=>'YES','N'=>'NO'), $hpp_desc->HP_PARM_DESC, 'class="selectpicker form-control width-50"').'
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[hpp_no]" class="form-control" value="'.$hpp_no.'">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[hpp_code]" class="form-control" value="'.$hpp_desc->HP_PARM_CODE.'">
                        </div>
                    </div>
                ';
            }  
            else {
                echo '
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>'.$rem.'</b><b><font color="red">*</font></b></label>
                        <div class="col-md-7">	
                            <input type="text" name="form['.$formn.']" class="form-control" value="'.$hpp_desc->HP_PARM_DESC.'" placeholder="Number">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[hpp_no]" class="form-control" value="'.$hpp_no.'">
                        </div>
                        <div class="col-md-7">	
                            <input type="hidden" name="form[hpp_code]" class="form-control" value="'.$hpp_desc->HP_PARM_CODE.'">
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
				url: '<?php echo $this->lib->class_url('updateHODmem')?>',
				data: data,
				dataType: 'JSON',
				success: function(res) {
					msg.show(res.msg, res.alert, '#alert');
					msg.show(res.msg, res.alert, '#alertWarning');

					if (res.sts == 1) {
						setTimeout(function () {
							location = '<?php echo $this->lib->class_url('viewTabFilter','s1')?>';
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