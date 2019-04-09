<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>Training Application Reports</h2>				
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
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Reports</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Reports (II)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Reports (III)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Reports (VI)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Reports (V)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Reports (VI)</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="report_i">
                                        <!--START report_i-->
                                            <div role="content">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="col-sm-2">
                                                            <div class="form-group text-right">
                                                                <label><b>Year</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group text-left">
                                                                <?php echo form_dropdown('form[year_i]', $year_list, $curYear, 'class="form-control" id="year_i"') ?>	
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="text-left">   
                                                                &nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="container col-md-10">
                                                        <div class="panel panel-default text-right">
                                                            <div class="panel-body" id="summary">
                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>ATR057</b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-7">
                                                                        <div class="form-group text-left">
                                                                            <label>Senarai Kakitangan Yang Menghadiri Latihan Mengikut PTJ/Fakulti dan Tahun Semasa</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <button type="button" repCode="ATR057" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>Department</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('form[department]', $dept_list, NULL, 'class="form-control" id="department"') ?>	
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="text-left">   
                                                                            &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="container col-md-10">
                                                        <div class="panel panel-default text-right">
                                                            <div class="panel-body" id="summary">
                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>ATR058</b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-7">
                                                                        <div class="form-group text-left">
                                                                            <label>Statistik Kakitangan Yang Menghadiri Latihan ( Keseluruhan )</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <button type="button" repCode="ATR058LIST" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>Choices</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('form[department]', array(''=>'--- Please Select ---', 'A'=>'All', 'Y'=>'CONDUCTED', 'N'=>'NOT CONDUCTED'), NULL, 'class="form-control" id="pilihan"') ?>	
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="text-left">   
                                                                            &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group text-right">
                                                                    <label><b>ATR059</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="form-group text-left">
                                                                    <label>Statistik Kakitangan Yang Menghadiri Latihan ( 2 kali atau lebih setahun )</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group text-left">
                                                                    <button type="button" repCode="ATR059" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group text-right">
                                                                    <label><b>ATR060</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="form-group text-left">
                                                                    <label>Statistik Kakitangan Yang Menghadiri Latihan ( kurang daripada 2 kali setahun )</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group text-left">
                                                                    <button type="button" repCode="ATR060" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group text-right">
                                                                    <label><b>ATR085</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="form-group text-left">
                                                                    <label>Statistik Kakitangan Yang Menghadiri Latihan ( 7 hari atau lebih setahun )</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group text-left">
                                                                    <button type="button" repCode="ATR085" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group text-right">
                                                                    <label><b>ATR086</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="form-group text-left">
                                                                    <label>Statistik Kakitangan Yang Menghadiri Latihan ( kurang daripada 7 hari setahun )</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group text-left">
                                                                    <button type="button" repCode="ATR086" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="container col-md-10">
                                                        <div class="panel panel-default text-right">
                                                            <div class="panel-body" id="summary">
                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>ATR065</b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-7">
                                                                        <div class="form-group text-left">
                                                                            <label>Statistik Kakitangan Yang Menghadiri Latihan</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <button type="button" repCode="ATR065" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>From</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('sMonth', $month_list, NULL, 'class="form-control listFilter" id="monthFrom"'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('form[year_i]', $year_list, $curYear, 'class="form-control" id="yearFrom"') ?>	
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="text-left">   
                                                                            &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-right">
                                                                            <label><b>To</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('sMonth', $month_list, NULL, 'class="form-control listFilter" id="monthTo"'); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group text-left">
                                                                            <?php echo form_dropdown('form[year_i]', $year_list, $curYear, 'class="form-control" id="yearTo"') ?>	
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="text-left">   
                                                                            &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group text-right">
                                                                    <label><b>ATR072</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="form-group text-left">
                                                                    <label>Statistik Bilangan Pegawai Yang Menghadiri Kursus (format KPT)</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group text-left">
                                                                    <button type="button" repCode="ATR072" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="alert alert-info fade in">
                                                    <b>Programme / Speaker Evaluation</b>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="text-left">   
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                    <div class="container col-md-10">
                                                        <div class="panel panel-default text-right">
                                                            <div class="panel-body" id="summary">
                                                                <div class="row">
                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>Year</b></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-left">
                                                                                <?php echo form_dropdown('form[year_i]', $year_list, $curYear, 'class="form-control" id="year_i2"') ?>	
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="text-left">   
                                                                                &nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>Course Title</b></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-left">
                                                                                <input name="form[refid]" class="form-control" value="" type="text" id="courseRefid" readonly>	
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group text-left">
                                                                                <input name="form[course_title]" class="form-control" value="" type="text" id="courseTitle" readonly>	
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group text-left">
                                                                                <button type="button" class="btn btn-primary btn-sm select_course_btn"><i class="fa fa-search"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="text-left">   
                                                                                &nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>ATR061</b></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-7">
                                                                            <div class="form-group text-left">
                                                                                <label>Laporan Penilaian Program (Laporan 1)</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group text-left">
                                                                                <button type="button" repCode="ATR061" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>ATR062</b></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-7">
                                                                            <div class="form-group text-left">
                                                                                <label>Laporan Penilaian Program (Laporan 2)</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group text-left">
                                                                                <button type="button" repCode="ATR062" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>ATR063</b></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-7">
                                                                            <div class="form-group text-left">
                                                                                <label>Laporan Penilaian Penceramah (Laporan 1)</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group text-left">
                                                                                <button type="button" repCode="ATR063" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group text-right">
                                                                                <label><b>ATR064</b></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-7">
                                                                            <div class="form-group text-left">
                                                                                <label>Laporan Penilaian Penceramah (Laporan 2)</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group text-left">
                                                                                <button type="button" repCode="ATR064" class="btn btn-danger btn-sm genReport"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- END -->
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="report_ii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from List of Training Evaluation</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

                                <div class="tab-pane fade" id="s3">
									<div id="report_iii">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from List of Training Evaluation</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="report_iv">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from List of Training Evaluation</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="report_v">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from List of Training Evaluation</th>
												</tr>
												</thead>
											</table>
										</p>	
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="report_vi">
										<p>
											<table class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">Please select training from List of Training Evaluation</th>
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


<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="mContent">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="mContent2">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<script>
	var tr_row = '';
    
	//var intExt = '1';
	var disDept = '1';
	var disYear = '1';
    var evaluation = '1';
	//var dt_row2 = '';
	
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
        if (!empty($currtab)) {
            if ($currtab == 's2'){
                echo "$('.nav-tabs li:eq(1) a').tab('show');";
            } elseif ($currtab == 's3'){
				echo "$('.nav-tabs li:eq(2) a').tab('show');";
			} elseif ($currtab == 's4'){
				echo "$('.nav-tabs li:eq(3) a').tab('show');";
			} elseif ($currtab == 's5'){
				echo "$('.nav-tabs li:eq(4) a').tab('show');";
			} elseif ($currtab == 's6'){
				echo "$('.nav-tabs li:eq(5) a').tab('show');";
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

    // POPULATE TRAINING LIST
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('getTrainingList')?>',
		data: {'disDept' : disDept, 'disYear' : disYear, 'evaluation' : evaluation},
		beforeSend: function() {
			$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#training_list').html(res);
			tr_row = $('#tbl_tr_list').DataTable({
                "ordering":false,
                drawCallback: function(){
                    $(function() {
                        $('#tbl_tr_list').each(function() {
                        var Cell = $(this).find('td:eq(5)');
                        //debugger;
                            if (Cell.text() !== 'error') {
                                //$(this).find('btn').hide();
                                $('#tbl_tr_list tbody .approve_training_btn').hide();
                                $('#tbl_tr_list tbody .postpone_training_btn').hide();
                                $('#tbl_tr_list tbody .reject_training_btn').hide();
                                $('#tbl_tr_list tbody .amend_training_btn').hide();
                            }
                        });
                    });
                }
            });
			$('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-1">Action</th>');
		},
		complete: function(){
			$('#loader').hide();
		},
    });

	// TRAINING LIST FILTER
	$('.listFilter').change(function() {
		var sDept = $('#sDept').val();
		var sMonth = $('#sMonth').val();
		var sYear = $('#sYear').val();
		//alert(''+sDept+',' +sMonth+''+sYear+'');
		
		$('.nav-tabs li:eq(0) a').tab('show');
		$('#training_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getTrainingList')?>',
			data: {'sDept' : sDept, 'sMonth' : sMonth, 'sYear' : sYear, 'evaluation' : evaluation},
			success: function(res) {
				$('#training_list').html(res);
				tr_row = $('#tbl_tr_list').DataTable({
                    "ordering":false,
                    drawCallback: function(){
                        $(function() {
                            $('#tbl_tr_list').each(function() {
                            var Cell = $(this).find('td:eq(5)');
                            //debugger;
                                if (Cell.text() !== 'error') {
                                    //$(this).find('btn').hide();
                                    $('#tbl_tr_list tbody .approve_training_btn').hide();
                                    $('#tbl_tr_list tbody .postpone_training_btn').hide();
                                    $('#tbl_tr_list tbody .reject_training_btn').hide();
                                    $('#tbl_tr_list tbody .amend_training_btn').hide();
                                }
                            });
                        });
                    }
				});
                $('#tbl_tr_list thead #trListAct').replaceWith('<th class="text-center col-md-1">Action</th>');
			}
		});
    });
    
    // SELECT TRAINING BTN
	$('#training_list').on('click','.select_training_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(2).html().trim();
		//var scCode = 'ATF002';
		//alert(refid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getStaffListEvaluation')?>',
			data: {'refid' : trRefID, 'tName' : trainingN},
			beforeSend: function() {
				$('.nav-tabs li:eq(1) a').tab('show');
				$('#staff_training_application').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#staff_training_application').html(res);
				
				tr_row = $('#tbl_list_sta_eva').DataTable({
					"ordering":false,
				});
                
                $('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                $('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
                $('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('editTraining')?>',
					data: {'refID' : trRefID},
					beforeSend: function() {
						$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl').html(res);

						$('.modal-header').hide();
						$('#alert').hide();
						$('.field_inpt').prop("disabled", true);
						$('.save_upd_tr_info').hide();
						$('#search_str_tr_ver').hide();
				
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('speakerInfo')?>',
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
							url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
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
							url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
							data: {'trRefID' : trRefID},
							dataType: 'JSON',
							success: function(res) {
								if(res.sts == 1) {
									$.ajax({
										type: 'POST',
										url: '<?php echo $this->lib->class_url('trainingCost')?>',
										data: {'trRefID' : trRefID, 'tName' : trainingN},
										beforeSend: function() {
											$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
										},
										success: function(res) {
											$('#training_list_detl2').html(res);
										}
									});
								} else {
									$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
								};
							}
						});
					
						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('targetGroup')?>',
							data: {'trRefID' : trRefID, 'tName' : trainingN},
							beforeSend: function() {
								$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list_detl3').html(res);
								$('.add_tg').hide();
								$('.del_tg_btn').hide();

								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('moduleSetup')?>',
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
							url: '<?php echo $this->lib->class_url('cpdSetup')?>',
							data: {'tsRefID' : trRefID, 'tName' : trainingN},
							beforeSend: function() {
								$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#training_list_detl4').html(res);
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
			}
		});
    });	
    
    // LIST OF ELIGIBLE POSITION //
	$('#training_list_detl3').on('click', '.pos_tg_btn', function() {
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
			url: '<?php echo $this->lib->class_url('listEgPosition')?>',
			data: {'gpCode' : gpCode},
			success: function(res) {
				$('#myModalis .modal-content').html(res);	
				$('#postAction').hide();
				$('#tbl_list_eg_pos tbody #postAction').hide();
			}
		});
	});

    // EVALUATION REPORT
	$('#staff_training_application').on('click', '.eva_report_btn', function () { 
		var refid =  $(this).val();
        var formCode =  $(this).data("form-code");

		var formURL = '<?php echo $this->lib->class_url('genEvaReport') ?>' + '/' + formCode + '/' + refid;
        var mywin = window.open( formURL , 'report');
    });

    // STAFF EVALUATION REPORT
	$('#staff_training_application').on('click', '.sta_eva_print_btn', function () { 
		var refid =  $(this).val();
        var staffID =  $(this).data("staff-id");

		var formURL = '<?php echo $this->lib->class_url('genStaffEvaReport') ?>' + '/' + refid + '/' + staffID;
        var mywin = window.open( formURL , 'report');
    });
    
    // STAFF EVALUATION DETAILS
	$('#staff_training_application').on('click', '.sta_eva_detl_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		var refid =  thisBtn.val();
		//alert(stfID+stfName+refid);

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('staffEvaluationDetails')?>',
			data: {'refid' : refid, 'stfID' : stfID, 'stfName' : stfName},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

    // EDIT STAFF EVALUATION DETAILS
	$('#staff_training_application').on('click', '.sta_eva_edit_btn', function() {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var stfID = td.find(".sid").text();
		var stfName =  td.find(".sname").text();
		var refid =  thisBtn.val();
		//alert(stfID+stfName+refid);

		srow = $(this).closest("tr");

		$('#myModalis2 .modal-content').empty();
		$('#myModalis2').modal('show');
		$('#myModalis2').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editStaffEvaluation')?>',
			data: {'refid' : refid, 'stfID' : stfID, 'stfName' : stfName},
			success: function(res) {
				$('#myModalis2 .modal-content').html(res);
			}
		});
	});

    // SAVE UPDATE STAFF EVALUATION DETAILS
	$('#myModalis2').on('click', '.upd_stf_eva_detl', function (e) { 
		e.preventDefault();
        var data = $('#formUpdStaffEvaDetl').serialize();
		msg.wait('#alertUpdStaffEvaDetl');
		// alert(data);
		$('.btn').attr('disabled', 'disabled');

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('saveUpdateStaffEvaDetails')?>',
			data: data,
			dataType: 'JSON',
			success: function(res) {
                msg.show(res.msg, res.alert, '#alertUpdStaffEvaDetl');
				if (res.sts == 1) {
					setTimeout(function () {
						$('#myModalis2').modal('hide');
						$('.btn').removeAttr('disabled');
					}, 1500);
					//$('.btn').removeAttr('disabled');
				} else {
					$('.btn').removeAttr('disabled');
				}
			},
			error: function() {
				$('.btn').removeAttr('disabled');
				msg.danger('Please contact administrator.', '#alertUpdStaffEvaDetl');
			}
		});	
    });

	// PROCESS EVALUATOR ID
	$('#staff_training_application').on('click','.proc_eva_id_btn', function(){
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var refid =  $('.proc_eva_id_btn').val();
		var trainingN =  thisBtn.data("tr-name");
		var staffIDArr = []; 
		var selectedID = 0;

		$.confirm({
		    title: 'Process Evaluator ID',
		    content: 'Press YES to confirm',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						stfID = $(this).closest("tr").find(".sid").text();
						++selectedID;
						
						staffIDArr.push(stfID);
					});
					//alert(staffIDArr);

					if (selectedID == 0) {
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('procEvaluatorId')?>',
							data: {'stfID' : staffIDArr, 'refid' : refid},
							dataType: 'JSON',
							beforeSend: function() {
								//$('.nav-tabs li:eq(1) a').tab('show');
								$('.btn').attr('disabled', 'disabled');
								$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								if (res.sts==1) {
									$.alert({
										title: 'Success!',
										content: res.msg,
										type: res.alert,
									});
								} else {
									$.alert({
										title: 'Alert!',
										content: res.msg,
										type: 'red',
									});
								}
							},
							complete: function(){
								$('.btn').removeAttr('disabled');
								$('#loader').hide();
							},
					});		
		        },
		        cancel: function () {
		            $.alert('Process Evaluator ID has been cancelled!');
		        }
		    }
		});
	});
</script>