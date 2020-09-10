<p>
<form id="trcpd" class="form-horizontal" method="post">

    <div class="form-group">
        <label class="col-md-2 control-label">Refid</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Title</label>
        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->TH_TRAINING_TITLE?>" id="title" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Code</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->TH_TRAINING_CODE?>" id="code" readonly>
        </div>

        <label class="col-md-2 control-label">Evaluation?</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->THD_EVALUATION_DESC?>" id="evaluation" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Date From</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->TH_DATE_FROM?>" id="dtFrom" readonly>
        </div>

        <label class="col-md-2 control-label">Date To</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->TH_DATE_TO?>" id="dtTo" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Competency</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->CH_COMPETENCY?>" id="comp" readonly>
        </div>

        <label class="col-md-2 control-label">Mark</label>
        <div class="col-md-2">
            <input name="" class="form-control" type="text" value="<?php echo $tr_detl->CH_MARK?>" id="mark" readonly>
        </div>
    </div>
</form>

<div class="text-right">
	<button type="button" class="btn btn-info btn-sm tr_details"><i class="fa fa-info-circle"></i> Details</button>

    <button type="button" class="btn btn-primary btn-sm gen_mark"><i class="fa fa-pie-chart"></i> Generate Mark</button>
</div>
<br>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_stf_cpd_list" style="width: 100%">
		<thead>
		<tr>
            <th class="text-center">Staff ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Department</th>
            <th class="text-center">Role</th>
            <th class="text-center">Status</th>
            <th class="text-center">Mark</th>
            <th class="text-center">Competency</th>
            <th class="text-center">Evaluation Status</th>
            <th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($stf_list)) {
				foreach ($stf_list as $sl) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $sl->STH_STAFF_ID . '</td>
                        <td class="text-left col-md-4">' . $sl->SM_STAFF_NAME . '</td>
                        <td class="text-center col-md-1">' . $sl->SM_DEPT_CODE . '</td>
                        <td class="text-center col-md-1">' . $sl->TPR_DESC . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_STATUS . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_CPD_MARK . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_CPD_COMPETENCY . '</td>
                        <td class="text-center col-md-1">' . $sl->STH_HOD_EVALUATION_DESC . '</td>
                        <td class="text-center col-md-1">
                            <button type="button" class="btn btn-success btn-xs edit_cpd_info_btn"><i class="fa fa-edit"></i> Edit</button>
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
<div id="tr_detl">
	<div class="hidden" id="tr_detl_in">
		<div class="alert alert-success fade in">
			<b>Details</b>
		</div>

		<ul id="myTabdhq" class="nav nav-tabs bordered">
			<li class="active">
				<a style="color:#000 !important" href="#s1a" data-toggle="tab" aria-expanded="true">Training Info</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s2a" data-toggle="tab" aria-expanded="false">Training Cost</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s3a" data-toggle="tab" aria-expanded="false">Target Group & Module Detail</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s4a" data-toggle="tab" aria-expanded="false">CPD Detail</a>
			</li>
		</ul>
		<!-- myTabContent1 -->
		<div id="myTabContent" class="tab-content padding-10">

			<div class="tab-pane fade active in" id="s1a">
				<div id="training_list_detl">
				</div>
			</div> 

			<div class="tab-pane fade" id="s2a">
				<div id="training_list_detl2">
				</div>
			</div> 

			<div class="tab-pane fade" id="s3a">
				<div id="training_list_detl3">
				</div>
			</div>

			<div class="tab-pane fade" id="s4a">
				<div id="training_list_detl4">
				</div>
			</div>

		</div>
		<!-- end myTabContent1 -->
	</div>
</div>


<script>

// TRAINING DETAILS
$('.tr_details').click(function(){
    $('#tr_detl_in').removeClass('hidden');
    $('html, body').animate({scrollTop: $('#tr_detl_in').position().top}, 'slow');

    var trRefID = $('#refid').val();
    var trainingN = $('#title').val();

    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('training/training_application/editTraining')?>',
        //data: {'refID' : trRefID, 'scCode' : scCode},
        data: {'refID' : trRefID},
        beforeSend: function() {
            $('#tr_detl #training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
        },
        success: function(res) {
            $('#tr_detl #training_list_detl').html(res);

            $('.modal-header').hide();
            $('#alert').hide();
            $('.field_inpt').prop("disabled", true);
            $('.save_upd_tr_info').hide();
            $('#search_str_tr_ver').hide();
            $('#toggleClear').prop("disabled", true);
            $('#toggleClear2').prop("disabled", true);
    
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('training/training_application/speakerInfo')?>',
                data: {'tsRefID' : trRefID},
                beforeSend: function() {
                    $('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                },
                success: function(res) {
                    $('#speakerInfo').html(res);
                    $('.add_tr_sp').hide();
                    $('#speakerInfo #spAct').hide();
                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('training/training_application/facilitatorInfo')?>',
                data: {'tsRefID' : trRefID},
                beforeSend: function() {
                    $('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                },
                success: function(res) {
                    $('#facilitatorInfo').html(res);
                    $('.add_tr_fi').hide();
                    $('#facilitatorInfo #fiAct').hide();
                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('training/training_application/verExternalAgency')?>',
                data: {'trRefID' : trRefID},
                dataType: 'JSON',
                success: function(res) {
                    if(res.sts == 1) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('training/training_application/trainingCost')?>',
                            data: {'trRefID' : trRefID, 'tName' : trainingN},
                            beforeSend: function() {
                                $('#tr_detl #training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                            },
                            success: function(res) {
                                $('#tr_detl #training_list_detl2').html(res);
                            }
                        });
                    } else {
                        $('#tr_detl #training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
                    };
                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('training/training_application/targetGroup')?>',
                data: {'trRefID' : trRefID, 'tName' : trainingN},
                beforeSend: function() {
                    $('#tr_detl #training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                },
                success: function(res) {
                    $('#tr_detl #training_list_detl3').html(res);
                    $('.add_tg').hide();
                    $('.del_tg_btn').hide();

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('training/training_application/moduleSetup')?>',
                        data: {'tsRefID' : trRefID},
                        beforeSend: function() {
                            $('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                        },
                        success: function(res) {
                            $('#module_setup').html(res);
                            $('#msBTN').hide();
                            $('.edit_ms1_btn').hide();
                            $('.edit_ms2_btn').hide();
                            $('.edit_ms3_btn').hide();
                        }
                    });
                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('training/training_application/cpdSetup')?>',
                data: {'tsRefID' : trRefID, 'tName' : trainingN},
                beforeSend: function() {
                    $('#tr_detl #training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                },
                success: function(res) {
                    $('#tr_detl #training_list_detl4').html(res);
                    $('#cpdBTN').hide();
                    $('.edit_cpd1_btn').hide();
                    $('.edit_cpd2_btn').hide();
                    $('.edit_cpd3_btn').hide();
                    $('.edit_cpd4_btn').hide();
                    $('.edit_cpd5_btn').hide();
                }
            });
        }
    });
});

// LIST OF ELIGIBLE POSITION //
$('#tr_detl').on('click', '.pos_tg_btn', function() {
    var thisBtn = $(this);
    var td = thisBtn.parent().siblings();
    //var refid = thisBtn.val();
    var gpCode = td.eq(0).html().trim();
    //alert(gpCode);

    $('#myModalis .modal-content').empty();
    $('#myModalis').modal('show');
    $('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('training/training_application/listEgPosition')?>',
        data: {'gpCode' : gpCode},
        success: function(res) {
            $('#myModalis .modal-content').html(res);	
            $('#postAction').hide();
            $('#tbl_list_eg_pos tbody #postAction').hide();
            $('.add_eg_position_btn').hide();
        }
    });
});

// EDIT APPLICANT DETAILS 
$('.edit_cpd_info_btn').click(function() {
    var thisBtn = $(this);
    var td = thisBtn.parent().siblings();
    var staff_id = td.eq(0).html().trim();
    var staff_name = td.eq(1).html().trim();
    var refid = $('#refid').val();
    var title = $('#title').val();
    show_loading();

    // VALIDATE UPDATE
    $.ajax({
        type: 'POST',
        url: '<?php echo $this->lib->class_url('validateUpdateTrCpd')?>',
        data: {'refid' : refid, 'staff_id' : staff_id},
        dataType: 'JSON',
        success: function(res) {
            hide_loading();

            if(res.sts == 1) {
                $('#myModalis .modal-content').empty();
                $('#myModalis').modal('show');
                $('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->lib->class_url('updateTrCpd')?>',
                    data: {'staff_id':staff_id, 'staff_name':staff_name,'refid':refid, 'title':title},
                    success: function(res) {
                        $('#myModalis .modal-content').html(res);
                    }
                });
            } else if(res.sts == 2) {
                $.alert({
                    title: 'Alert!',
                    content: res.msg,
                    type: 'red',
                });
            } else {
                $.alert({
                    title: 'Alert!',
                    content: 'Evaluation is not available, cannot update CPD mark.',
                    type: 'red',
                });
            }
        }
    })
});	

// GENERATE CPD MARK
$('.gen_mark').click(function() {
    var refid = $("#refid").val();
    var title = $("#title").val();
    var competency = $("#comp").val();
    var mark = $("#mark").val();
    // alert(refid+title);
    
    $.confirm({
        title: 'Generate CPD',
        content: 'Are you sure you want to process CPD? <br> <b>'+refid+' - '+title+'</b>',
        type: 'blue',
        buttons: {
            yes: function () {
                if(competency == '') {
                    $.alert({
                        title: 'Alert!',
                        content: 'Please Fill In <b>Competency</b>',
                        type: 'red',
                    });
                    return;
                }

                if(mark == '') {
                    $.alert({
                        title: 'Alert!',
                        content: 'Please Fill In <b>Mark/b>',
                        type: 'red',
                    });
                    return;
                }

                show_loading();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->lib->class_url('validateGenerateCpdMark')?>',
                    data: {'refid' : refid},
                    dataType: 'JSON',
                    success: function(res) {
                        if(res.sts == 1) {
                            // GENERATE CPD MARK
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $this->lib->class_url('generateCpdMark')?>',
                                data: {'refid' : refid, 'competency' : competency, 'mark' : mark},
                                dataType: 'JSON',
                                success: function(res) {
                                    if (res.sts==1) {

                                        // REFRESH
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo site_url('training/cpd/ATF123')?>',
                                            data: {'refid' : refid},
                                            beforeSend: function() {
                                                $('#update_cpd_info').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                                            },
                                            success: function(res) {
                                                $('#update_cpd_info').html(res);
                                                tr_row = $('#tbl_stf_cpd_list').DataTable({
                                                    "ordering":false,
                                                });
                                            }
                                        });

                                        $.alert({
                                            title: 'Success!',
                                            content: res.msg,
                                            type: 'green',
                                        });
                                        hide_loading();
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
                        } else {
                            $.alert({
                                title: 'Alert!',
                                content: res.msg,
                                type: 'red',
                            });
                            hide_loading();
                        }
                    }
                })		
            },
            cancel: function () {
                $.alert('Canceled process CPD!');
            }
        }
    });
});
</script>