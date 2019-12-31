<h4 class="panel-heading bg-color-blueDark txt-color-white">Report Manual Entry Form (<?php echo $tName.' - '.$refid?>)</h4>
<form id="secretReportForm" class="form-horizontal" method="post">
    <div id="alertSecretRptForm">
        <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
    </div>
    <div class="alert alert-info fade in">
        <b>Report : Participants & Foods / Drinks </b>
    </div>
    <br>
    <input name="form[refid]" class="form-control" value="<?php echo $refid?>" type="hidden" id="refidTr" readonly>
    <div class="form-group">
        <label class="col-md-2 control-label text-right"><b>Participant</b></label>
    </div>
    <div class="form-group">    
        <label class="col-md-2 control-label">Attendance </label>
        <div class="col-md-2">
            <input name="form[attendance]" placeholder="Attendance" class="form-control" value="<?php echo $attended.' / '.$total_attend?>" type="text" id="attendance" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Discipline</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[discipline]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $discipline, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Time</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[participant_time]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $participant_time, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[participant_remark]" placeholder="Participant remark" class="form-control" type="text" rows="5"><?php echo $participant_remark?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label text-right"><b>Food / Drink</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Cafe name</label>
        <div class="col-md-8">
            <input name="form[cafe_name]" placeholder="Cafe name" value="<?php echo $cafe_name?>" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Time</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[food_drink_time]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $food_drink_time, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Quality</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[food_drink_quality]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $food_drink_quality, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[cafe_remark]" placeholder="Cafe remark" class="form-control" type="text" rows="5"><?php echo $cafe_remark?></textarea>
        </div>
    </div>
    <!-- REPORT : PARTICIPANTS & FOODS / DRINKS -->
    <div class="alert alert-info fade in">
        <b>Report : Training Room & Equipment</b>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label text-right"><b>Training Room</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Chair</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[chair]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $chair, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Aircond</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[aircond]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $aircond, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Table</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[table]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $table, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">Lamps</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[lamps]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $lamps, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[training_room_remark]" placeholder="Training room remark" class="form-control" type="text" rows="5"><?php echo $training_room_remark?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label text-right"><b>Electronic Equipment</b></label>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Laptop / Desktop</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[laptop_desktop]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $laptop_desktop, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">LCD Pointer</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[lcd_pointer]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $lcd_pointer, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Laser Pointer</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[laser_pointer]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $laser_pointer, 'class="selectpicker form-control width-50"')
            ?>
        </div>
        
        <label class="col-md-2 control-label">PA System</label>
        <div class="col-md-2">
            <?php
                echo form_dropdown('form[pa_system]', array(''=>'--- Please select ---', 'Y'=>'Good', 'N'=>'Not Good'), $pa_system, 'class="selectpicker form-control width-50"')
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[equipment_remark]" placeholder="Equipment remark" class="form-control" type="text" rows="5"><?php echo $equipment_remark?></textarea>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Overall report / Improvements Suggestion</b>
    </div>
    <br>
    
    <div class="form-group">
        <label class="col-md-2 control-label">Remark</label>
        <div class="col-md-8">
            <textarea name="form[overall_remark]" placeholder="Overall remark" class="form-control" type="text" rows="5"><?php echo $overall_remark?></textarea>
        </div>
    </div>
    <br>
    <div id="alertFooterSecretRptForm"></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary save_scre_report_form" data-tr-name="<?php echo $tName?>"><i class="fa fa-save"></i> Save</button>
    </div>

    <div class="alert alert-info fade in">
        <b>Secretariat on duty</b>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 text-right">
            <button type="button" class="btn btn-primary btn-sm add_scr_btn" value="<?php echo $refid?>"><i class="fa fa-plus"></i> Add Secretariat</button>
        </div>
    </div>
    <br>
    <div class="well">
        <div class="row table-condensed table-responsive">
            <table class="table table-bordered table-hover" id="scr_duty_list">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID</th>
                <th class="text-left">Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (!empty($screDuty)) {
                    foreach ($screDuty as $sd) {
                        echo '
                            <tr>
                                <td class="text-center col-xs-1">' . $sd->TSI_SEQ . '</td>
                                <td class="text-center col-md-1">' . $sd->TSI_INCHARGE . '</td>
                                <td class="text-left col-md-4">' . $sd->SM_STAFF_NAME . '</td>
                                <td class="text-center col-md-1">' . $sd->INCHARGE_DATE . '</td>
                                <td class="text-center col-md-1">
                                    <button type="button" class="btn btn-xs btn-danger del_scr_btn" value='.$refid.'><i class="fa fa-trash-o"></i> delete</button>
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
</form>