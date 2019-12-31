<form id="updCpdPoint" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Update CPD Point</h4>
    </div>
    <div class="modal-body">
        <div id="updCpdPointAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Scheme <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <?php
                    echo form_dropdown('', $scheme_list, $cpd_p_detl->CP_SCHEME, 'class="form-control" style="width: 100%" disabled')
                ?>
            </div>

            <div class="col-md-3 hidden">
                <input name="form[scheme]" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_SCHEME?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Compulsory CPD</label>
            <div class="col-md-3">
                <input name="form[compulsory_cpd]" placeholder="Compulsory CPD" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_CPD_LAYAK?>">
            </div>

            <label class="col-md-3 control-label">Minimum CPD (Khusus)</label>
            <div class="col-md-3">
                <input name="form[minimum_cpd_khusus]" placeholder="Minimum CPD (Khusus)" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_CPD_KHUSUS_MIN?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Minimum CPD (Umum)</label>
            <div class="col-md-3">
                <input name="form[minimum_cpd_umum]" placeholder="Minimum CPD (Umum)" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_CPD_UMUM_MIN?>">
            </div>

            <label class="col-md-3 control-label">CPD (Umum - Compulsory)</label>
            <div class="col-md-3">
                <input name="form[cpd_umum_compulsory]" placeholder="CPD (Umum - Compulsory)" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_UMUM_MANDATORY?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Minimum CPD (Teras)</label>
            <div class="col-md-3">
                <input name="form[minimum_cpd_teras]" placeholder="Minimum CPD (Teras)" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_CPD_TERAS_MIN?>">
            </div>

            <label class="col-md-3 control-label">LNPT Weightage</label>
            <div class="col-md-3">
                <input name="form[lnpt_weightage]" placeholder="LNPT Weightage" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_LNPT_WEIGHTAGE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Rank</label>
            <div class="col-md-3">
                <input name="form[rank]" placeholder="Rank" class="form-control" type="text" value="<?php echo $cpd_p_detl->CP_RANK?>">
            </div>
        </div>

        <div class="form-group hidden">
            <label class="col-md-3 control-label">CP_YEAR</label>
            <div class="col-md-2">
                <input name="form[cp_year]" class="form-control" type="text" value="<?php echo $cp_year?>" readonly>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_cpdp_btn"><i class="fa fa-save"></i> Save</button>
    </div>
</form>