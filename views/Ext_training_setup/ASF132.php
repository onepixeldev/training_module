<?php echo $this->lib->title('Training / Organizer Info for External Agency Setup', $screen_id) ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ASF132 - Organizer Info for External Agency Setup</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body">
                <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
					</header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <div class="widget-body">

                            <ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Organizer Info</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Add / Edit Record</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

								<div class="tab-pane fade active in" id="s1">
									<br>
                                    <div class="row">
										<div class="col-sm-2">
											<div class="form-group text-right">
												<label><b>State</b></label>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group text-left">
												<?php echo form_dropdown('fState', $state_dd, '', 'class="form-control listFilter" id="fState"'); ?>
											</div>
										</div>
									</div>

									<div id="organizer_info">
									</div>
                                </div>

								<div class="tab-pane fade" id="s2">
									<div id="add_edit_org">
										<p>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Please click Add New Organizer or Edit button from Organizer Info tab</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </p>
									</div>
                                </div>

                            </div>
                            <!-- end myTabContent1 -->
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
	var cf_row = '';
	
	$(document).ready(function(){
		<?php
			$currtab = $this->session->tabID;
		
			if (!empty($currtab)) {
				if ($currtab == 's2'){
					echo "$('.nav-tabs li:eq(1) a').tab('show');";
				}  
				else {
					echo "$('.nav-tabs li:eq(0) a').tab('show');";
				}
			}
		?>
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

	/*-----------------------------
	TAB 1 - ORGANIZER INFO
	-----------------------------*/

	// POPULATE ORGANIZER INFO
	$('#organizer_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('organizerInfoList')?>',
		data: '',
		success: function(res) {
			$('#organizer_info').html(res);

			cf_row = $('#tbl_ol_list').DataTable({
				"ordering":false,
			});
		}
	});	

	// FILTER ORGANIZER INFO
	$('.listFilter').change(function () {
		var state = $('#fState').val();

		$('#organizer_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#add_edit_org').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Add New Organizer or Edit button from Organizer Info tab</th></tr></thead></table></p>').show();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('organizerInfoList')?>',
			data: {'state':state},
			success: function(res) {
				$('#organizer_info').html(res);

				cf_row = $('#tbl_ol_list').DataTable({
					"ordering":false,
				});
			}
		});
	});

	// ADD ORGANIZER INFO
	$('#organizer_info').on('click','.add_org_btn', function(){

		$('#add_edit_org').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('addOrganizerInfo')?>',
			beforeSend: function() {
				$('#add_edit_org').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
				$('.nav-tabs li:eq(1) a').tab('show');
			},
			success: function(res) {
				$('#add_edit_org').html(res);
			}
		});
	});	

	// SAVE ADD ORGANIZER INFO
	$('#add_edit_org').on('click', '.ins_org', function (e) {
		e.preventDefault();
		var data = $('#addOrganizer').serialize();
		msg.wait('#addOrganizerAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveOrgInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#addOrganizerAlert');

				if (res.sts == 1) {

					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF132')?>';
						$('#add_edit_org').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Add New Organizer or Edit button from Organizer Info tab</th></tr></thead></table></p>').show();
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#addOrganizerAlert');
			}
		});	
	});

	// UPDATE ORGANIZER INFO
	$('#organizer_info').on('click','.upd_org', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var code = td.find(".code").text();

		$('#add_edit_org').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editOrganizerInfo')?>',
			data: {'code':code},
			beforeSend: function() {
				$('#add_edit_org').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
				$('.nav-tabs li:eq(1) a').tab('show');
			},
			success: function(res) {
				$('#add_edit_org').html(res);
			}
		});
	});	

	// SAVE UPDATE ORGANIZER INFO
	$('#add_edit_org').on('click', '.upd_org', function (e) {
		e.preventDefault();
		var data = $('#editOrganizer').serialize();
		msg.wait('#editOrganizerAlert');
		// alert(data);
		
		$('.btn').attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdOrgInfo')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
				msg.show(res.msg, res.alert, '#editOrganizerAlert');

				if (res.sts == 1) {
					setTimeout(function () {
						$('.btn').removeAttr('disabled');
						location = '<?php echo $this->lib->class_url('viewTabFilter','s1','ASF132')?>';
						$('#add_edit_org').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Please click Add New Organizer or Edit button from Organizer Info tab</th></tr></thead></table></p>').show();
					}, 1500);
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#editOrganizerAlert');
			}
		});	
	});

	// DELETE ORGANIZER INFO
	$('#organizer_info').on('click','.del_org', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var code = td.find(".code").text();
		var desc = td.find(".desc").text();
		
		$.confirm({
		    title: 'Delete Organizer',
		    content: 'Are you sure to delete this record? <br> <b>'+code+' - '+desc+'</b>',
			type: 'red',
		    buttons: {
		        yes: function () {
					show_loading();
					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('delOrgInfo')?>',
						data: {'code' : code},
						dataType: 'JSON',
						success: function(res) {
							if (res.sts==1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: 'green',
								});
								hide_loading();
								thisBtn.parents('tr').fadeOut().delay(1000).remove();
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: 'red',
								});
								hide_loading();
							}
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Canceled Delete Record!');
		        }
		    }
		});
	});
	
</script>