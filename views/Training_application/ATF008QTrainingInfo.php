<form class="form-horizontal" method="post">

        <div class="alert alert-success fade in">
            <b>Training Info</b>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Ref ID</label>
            <div class="col-md-2">
		<input name="form[training_refid]" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_REF_ID?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Structured Ref ID</label>
            <div class="col-md-2">
                <input name="form[structured_training]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_CODE?>" readonly>
            </div>
            
             <label class="col-md-1 control-label">Type</label>
            <div class="col-md-1">
                <input name="form[type]" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TYPE?>" readonly>
            </div>
            <div class="col-md-2">
                <input name="form[type_desc]" class="form-control field_inpt" type="text" value="<?php echo $type?>" readonly>
            </div> 
        </div>
   
        <div class="form-group">
            <label class="col-md-2 control-label">Group</label>
            <div class="col-md-1">
                <input name="form[service_group]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_SERVICE_GROUP?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[service_group_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $service_group?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Level</label>
            <div class="col-md-1">
                <input name="form[level]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_LEVEL?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[level_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $level?>" readonly>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-md-2 control-label">Area</label>
            <div class="col-md-1">
                <input name="form[area]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_FIELD?>" readonly>
            </div>
            <div class="col-md-4">
                <input name="form[area_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $area?>" readonly>
            </div>
            
            <label class="col-md-1 control-label">Category</label>
            <div class="col-md-4">
                <input name="form[category]" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_CATEGORY?>" readonly>      
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Title</label>
            <div class="col-md-10">
		<input name="form[training_title]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_TITLE?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Description</label>
            <div class="col-md-10">
		<textarea name="form[training_description]" placeholder="" class="form-control field_inpt" type="text" rows="1" readonly> <?php echo $trInfo->TH_TRAINING_DESC?> </textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Venue</label>
            <div class="col-md-10">
		<input name="form[venue]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_VENUE?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-1">
                <input name="form[country]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_COUNTRY?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[country_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $country?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-1">
                <input name="form[state]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TRAINING_STATE?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[state_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $state?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Date From</label>
            <div class="col-md-4">
                <input name="form[date_from]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_DATEFR?>" readonly>
            </div>

            <label class="col-md-2 control-label">Date To</label>
            <div class="col-md-4">
                <input name="form[date_to]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_DATETO?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Time From</label>
            <div class="col-md-2">
                <input name="form[time_from]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TIME_FR?>" readonly>
            </div>

            <label class="col-md-2 control-label">Time To</label>
            <div class="col-md-2">
                <input name="form[time_to]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TIME_T?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Total Hours</label>
            <div class="col-md-2">
                <input name="form[total_hours]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_TOTAL_HOURS?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Sponsor </label>
            <div class="col-md-4">
                <input name="form[sponsor]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_SPONSOR?>" readonly>
            </div>
             
            <label class="col-md-2 control-label">Internal/External?</label>
            <div class="col-md-2">
                <input name="form[internal_external]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_INTERNAL_EXTERNAL?>" readonly>
            </div>

            <label class="col-md-1 control-label">Participants</label>
            <div class="col-md-1">
                <input name="form[participants]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_MAX_PARTICIPANT?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Open for online application?</label>
            <div class="col-md-1">
                <input name="form[online_application]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $open?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Closing Date</label>
            <div class="col-md-2">
                <input name="form[closing_date]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_APP_CLOSING_DATE?>" readonly>
            </div>
            
            <label class="col-md-1 control-label">Status</label>
            <div class="col-md-2">
                <input name="form[status]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_STATUS?>" readonly>
            </div>
            
            <label class="col-md-1 control-label">Offer?</label>
            <div class="col-md-1">
                <input name="form[offer]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $offer?>" readonly>
            </div>
        </div>
        
        <div class="alert alert-success fade in">
            <b>Coordinator Info</b>
        </div>
    
        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator</label>
            <div class="col-md-2">
                <input name="form[coordinator]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $coordinator?>" readonly>
            </div>
            <div class="col-md-4">
                <input name="form[coordinator_name]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $coor?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Phone Number</label>
            <div class="col-md-2">
                <input name="form[phone_number]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $coor_p_no?>" readonly>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Coordinator Sector</label>
            <div class="col-md-2">
                <input name="form[coordinator_sector]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $coor_sector?>" readonly>
            </div>
            <div class="col-md-4">
                <input name="form[sector_name]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $sector?>" readonly>
            </div>
        </div>
        
        <div class="alert alert-success fade in">
            <b>Evaluation Info</b>
        </div>
    
        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation?</label>
            <div class="col-md-2">
                <input name="form[evaluation]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $evaluation?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">From</label>
            <div class="col-md-2">
                <input name="form[evaluation_period_from]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_EVA_DATE_FROM?>" readonly>
            </div>

            <label class="col-md-2 control-label">To</label>
            <div class="col-md-2">
                <input name="form[evaluation_period_to]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_EVA_DATE_TO?>" readonly>
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Confirmation Due Info</b>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Date From </label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_from]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_CON_DATE_FROM?>" readonly>
            </div>

            <label class="col-md-2 control-label">Date To </label>
            <div class="col-md-4">
                <input name="form[confirmation_due_date_to]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_CON_DATE_TO?>" readonly>
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Organizer Info</b>
        </div>
 
        <div class="form-group">
            <label class="col-md-2 control-label">Organizer Level</label>
            <div class="col-md-1">
                <input name="form[organizer_level]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_ORGANIZER_LEVEL?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[organizer_level_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $organize_level?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Organizer Name</label>
            <div class="col-md-1">
                <input name="form[organizer_name]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_ORGANIZER_NAME?>" readonly>
            </div>
            <div class="col-md-3">
                <input name="form[organizer_name_desc]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $organize_name?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
                <input name="form[organizer_address]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $OrgAdd?>" readonly>           
            </div>   
        </div>

        <div class="form-group">  
            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-2">
                <input name="form[organizer_Postcode]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $OrgPost?>" readonly>
            </div>
            <label class="col-md-1 control-label">City</label>
            <div class="col-md-7">
                <input name="form[organizer_city]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $OrgCity?>" readonly>
            </div>
        </div>

        <div class="form-group">    
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
                <input name="form[organizer_state]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $OrgState?>" readonly>
            </div>

            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <input name="form[organizer_country]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $OrgCountry?>" readonly>
            </div>
        </div>

        <div class="alert alert-success fade in">
            <b>Completion Info</b>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Evaluation Compulsory?</label>
            <div class="col-md-2">
                <input name="form[evaluation_compulsary]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $evaluation_com?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Attendance Type</label>
            <div class="col-md-2">
                <input name="form[attendance_type]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $trInfo->TH_ATTENDANCE_TYPE?>" readonly>
            </div>
            
            <label class="col-md-2 control-label">Print Certificate?</label>
            <div class="col-md-2">
                <input name="form[print_certificate]" placeholder="" class="form-control field_inpt" type="text" value="<?php echo $print_cer?>" readonly>
            </div>
        </div>
</form>