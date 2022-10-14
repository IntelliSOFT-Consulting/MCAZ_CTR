$(function () {
    // Multi Contacts Handling
    $("#addPIContact").on("click", addPIContacts);
    $(document).on('click', '.removePIContact', removePIContact);
    $(document).on('click', '.updateCheckboxes', updateCheckboxes); 
    $("#pdrugs").find('.rteditor').ckeditor();

 
    // Multi Contacts Handling
    function addPIContacts() {
        var se = $("#pdrugs .contact-group").last().find('button').attr('id');
        if (typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('pdrugsButton', '')) + 1;
        } else {
            intId = 1;
        }

        //get allcheckboxes under this group

        var checkboxes = $("#pdrugs .contact-group").find('input[type="checkbox"]');
        var checked = [];
        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                checked.push($(this).val());
                //update the value
                $(this).val(1);
            } else {
                checked.push($(this).val());
                $(this).val(0);
            }
        });
        //console log name and value of checked checkboxes
        console.log(checked);


        if ($("#pdrugs .contact-group").length < 9) {
            var new_picontact = $('<div class="contact-group" style="margin-right: 30px;"> \
                    <div style="margin-right: 30px;" id="investigator_primary_contact"> \
                        <div class="form-group" style="margin-right: 30px;">\
                        <table class="table table-bordered table-condensed">\
                        <thead>\
                            <tr class="active">\
                                <th></th>\
                                <th>P.1 Description and composition of the investigational medical product: </th>\
                                <th width="35%"></th>\
                            </tr>\
                        </thead>\
                    <tbody>\
                    <tr>\
                    <tr>\
                    <td></td>\
                    <td>The description and composition are adequate:</td>\
                    <td>\
                       <input class="form-control" type="hidden" name="pdrugs[{i}][composition]" value=""><label class="radio-inline" for="pdrugs-{i}-composition-yes">\
                       <input type="radio" class="radio-inline" name="pdrugs[{i}][composition]" value="Yes" id="pdrugs-{i}-composition-yes">Yes</label>\
                       <label class="radio-inline" for="pdrugs-{i}-composition-no">\
                       <input type="radio" class="radio-inline" name="pdrugs[{i}][composition]" value="No" id="pdrugs-{i}-composition-no">No</label> \
                       <label class="radio-inline" for="pdrugs-{i}-composition-na>\
                       <input type="radio" class="radio-inline" name="pdrugs[{i}][composition]" value="N/A" id="pdrugs-{i}-composition-na">NA</label> \
                    </td>\
                </tr>\
        <tr>\
            <td></td>\
            <td colspan="3">\
                <div class="row">\
                    <div class="col-xs-12">\
                        <label>Workspace</label>\
                        <textarea class="form-control rteditor" name="pdrugs[{i}][composition_workspace]" cols="30" rows="3"></textarea>\
                    </div>\
                </div>\
            </td>\
        </tr>\
        <tr>\
        <td></td>\
        <td colspan="3">\
            <div class="row">\
                <div class="col-xs-12">\
                    <label>Officer’s Comments</label>\
                    <textarea class="form-control rteditor" name="pdrugs[{i}][composition_comment]" cols="30" rows="3"></textarea>\
                </div>\
            </div>\
        </td>\
    </tr>\
<tr class="active">\
<th></th>\
<th>P.2 Pharmaceutical development </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The pharmaceutical development is adequately described:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][pharma_adequate]" value="">\
<label class="radio-inline" for="pdrugs-{i}-pharma_adequate-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][pharma_adequate]" value="Yes" id="pdrugs-{i}-pharma_adequate-yes">Yes<label>\
<label class="radio-inline" for="pdrugs-{i}-pharma_adequate-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][pharma_adequate]" value="No" id="pdrugs-{i}-pharma_adequate-no">No</label>\
<label class="radio-inline" for="pdrugs-{i}-pharma_adequate-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][pharma_adequate]" value="NA" id="pdrugs-{i}-pharma_adequate-no">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][pharma_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>P.3 Manufacture </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th>P.3.1 Manufacturer(s) </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The manufacturing sites are clearly identified:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][manu_identified]" value="">\
<label class="radio-inline" for="pdrugs-{i}-manu_identified-yes"><input type="radio" class="radio-inline" name="pdrugs[{i}][manu_identified]" value="Yes" id="pdrugs-{i}-manu_identified-yes">Yes</label><label class="radio-inline" for="pdrugs-{i}-manu_identified-no"><input type="radio" class="radio-inline" name="pdrugs[{i}][manu_identified]" value="No" id="pdrugs-{i}-manu_identified-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-manu_identified-na"><input type="radio" class="radio-inline" name="pdrugs[{i}][manu_identified]" value="NA" id="pdrugs-{i}-manu_identified-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][manu_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][manu_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th> </th>\
<th>P.3.2 Batch formula</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The batch formula is appropriately described:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][batch_described]" value="">\
<label class="radio-inline" for="pdrugs-{i}-batch_described-yes"><input type="radio" class="radio-inline" name="pdrugs[{i}][batch_described]" value="Yes" id="pdrugs-{i}-batch_described-yes">Yes</label><label class="radio-inline" for="pdrugs-{i}-batch_described-no"><input type="radio" class="radio-inline" name="pdrugs[{i}][batch_described]" value="No" id="pdrugs-{i}-batch_described-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-batch_described-na"><input type="radio" class="radio-inline" name="pdrugs[{i}][batch_described]" value="NA" id="pdrugs-{i}-batch_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][batch_described_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td>.</td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][batch_described_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>P.3.3 Description of the manufacturing process and process controls</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The manufacturing process and process control are adequately described:?</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][control_described]" value="">\
<label class="radio-inline" for="pdrugs-{i}-control_described-yes"><input type="radio" class="radio-inline" name="pdrugs[{i}][control_described]" value="Yes" id="pdrugs-{i}-control_described-yes">Yes</label><label class="radio-inline" for="pdrugs-{i}-control_described-no"><input type="radio" class="radio-inline" name="pdrugs[{i}][control_described]" value="No" id="pdrugs-{i}-control_described-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-control_described-na"><input type="radio" class="radio-inline" name="pdrugs[{i}][control_described]" value="NA" id="pdrugs-{i}-control_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][control_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][control_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>P.3.4 Controls of critical steps and intermediates</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The controls of critical steps and intermediates are adequately described:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][control_steps_described]" value="">\
<label class="radio-inline" for="pdrugs-{i}-control_steps_described-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][control_steps_described]" value="Yes" id="pdrugs-{i}-control_steps_described-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-control_steps_described-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][control_steps_described]" value="No" id="pdrugs-{i}-control_steps_described-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-control_steps_described-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][control_steps_described]" value="NA" id="pdrugs-{i}-control_steps_described-na">NA</label> \
    </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][control_steps_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>P.3.5 Process validation and/or evaluation</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>The validation processes are adequately described: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][validation_described]" value="">\
<label class="radio-inline" for="pdrugs-{i}-validation_described-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_described]" value="Yes" id="pdrugs-{i}-validation_described-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-validation_described-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_described]" value="No" id="pdrugs-{i}-validation_described-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-validation_described-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_described]" value="NA" id="pdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace:</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][validation_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][validation_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4 Control of excipients </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.1 Specifications </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> For excipients not described in current pharmacopoeias. The specifications and acceptance criteria provided are appropriate: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][specification_criteria]" value="">\
<label class="radio-inline" for="pdrugs-{i}-specification_criteria-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][specification_criteria]" value="Yes" id="pdrugs-{i}-specification_criteria-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-specification_criteria-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][specification_criteria]" value="No" id="pdrugs-{i}-specification_criteria-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-specification_criteria-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][specification_criteria]" value="NA" id="pdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][specifications_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.2 Analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The analytical procedures are adequately described: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][analytical_described]" value="">\
<label class="radio-inline" for="pdrugs-{i}-analytical_described-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_described]" value="Yes" id="pdrugs-{i}-analytical_described-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-analytical_described-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_described]" value="No" id="pdrugs-{i}-analytical_described-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-analytical_described-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_described]" value="NA" id="pdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][analytical_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.3 Validation of the analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The analytical procedures are adequately validated:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][procedures_validated]" value="">\
<label class="radio-inline" for="pdrugs-{i}-procedures_validated-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][procedures_validated]" value="Yes" id="pdrugs-{i}-procedures_validated-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-procedures_validated-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][procedures_validated]" value="No" id="pdrugs-{i}-procedures_validated-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-procedures_validated-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][procedures_validated]" value="NA" id="pdrugs-{i}-procedures_validated-na">NA</label>  </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][procedures_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.4 Justification of the specifications</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The justification provided for the specifications of excipients and their limits is satisfactory: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][justification_satisfactory]" value="">\
<label class="radio-inline" for="pdrugs-{i}-justification_satisfactory-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][justification_satisfactory]" value="Yes" id="pdrugs-{i}-justification_satisfactory-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-justification_satisfactory-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][justification_satisfactory]" value="No" id="pdrugs-{i}-justification_satisfactory-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-justification_satisfactory-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][justification_satisfactory]" value="NA" id="pdrugs-{i}-justification_satisfactory-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][justification_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][justification_satis_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.5 Excipients of animal or human origin </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The IMP contains excipients of animal origin: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][animal_origin]" value="">\
<label class="radio-inline" for="pdrugs-{i}-animal_origin-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][animal_origin]" value="Yes" id="pdrugs-{i}-animal_origin-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-animal_origin-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][animal_origin]" value="No" id="pdrugs-{i}-animal_origin-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-animal_origin-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][animal_origin]" value="NA" id="pdrugs-{i}-animal_origin-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td> Safety information on transmissible spongiform encephalopathies (TSE) is provided and deemed satisfactory: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][tse_satisfactory]" value="">\
<label class="radio-inline" for="pdrugs-{i}-tse_satisfactory-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][tse_satisfactory]" value="Yes" id="pdrugs-{i}-tse_satisfactory-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-tse_satisfactory-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][tse_satisfactory]" value="No" id="pdrugs-{i}-tse_satisfactory-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-tse_satisfactory-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][tse_satisfactory]" value="NA" id="pdrugs-{i}-tse_satisfactory-na">NA</label> </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][tse_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.4.6 Novel excipients </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Excipients are appropriately controlled: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][excipients_controlled]" value="">\
<label class="radio-inline" for="pdrugs-{i}-excipients_controlled-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][excipients_controlled]" value="Yes" id="pdrugs-{i}-excipients_controlled-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-excipients_controlled-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][excipients_controlled]" value="No" id="pdrugs-{i}-excipients_controlled-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-excipients_controlled-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][excipients_controlled]" value="NA" id="pdrugs-{i}-excipients_controlled-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][excipients_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][excipients_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5 Control of the drug product </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.1 Specifications </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Satisfactory specifications for the drug product, including appropriate limits, are proposed:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][appropriate_limits]" value="">\
<label class="radio-inline" for="pdrugs-{i}-appropriate_limits-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][appropriate_limits]" value="Yes" id="pdrugs-{i}-appropriate_limits-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-appropriate_limits-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][appropriate_limits]" value="No" id="pdrugs-{i}-appropriate_limits-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-appropriate_limits-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][appropriate_limits]" value="NA" id="pdrugs-{i}-appropriate_limits-na">NA</label> </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][appropriate_control_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][appropriate_control_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.2 Analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Are the analytical methods adequately described?: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][analytical_methods]" value="">\
<label class="radio-inline" for="pdrugs-{i}-analytical_methods-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_methods]" value="Yes" id="pdrugs-{i}-analytical_methods-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-analytical_methods-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_methods]" value="No" id="pdrugs-{i}-analytical_methods-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-analytical_methods-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][analytical_methods]" value="NA" id="pdrugs-{i}-analytical_methods-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][analytical_methods_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.3 Validation of analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> <b>Phase I trials</b>. The suitability of the methods is commensurate with the stage of development. The acceptance limits and parameters to validate the analytical methods are presented: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][validation_procedure]" value="">\
<label class="radio-inline" for="pdrugs-{i}-validation_procedure-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_procedure]" value="Yes" id="pdrugs-{i}-validation_procedure-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-validation_procedure-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_procedure]" value="No" id="pdrugs-{i}-validation_procedure-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-validation_procedure-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_procedure]" value="NA" id="pdrugs-{i}-validation_procedure-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td> <b>For phase II/III trials</b>. The suitability of methods is commensurate with the stage of development and clearly explained. A summary of the validation results is provided: </td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][validation_results]" value="">\
<label class="radio-inline" for="pdrugs-{i}-validation_results-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_results]" value="Yes" id="pdrugs-{i}-validation_results-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-validation_results-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_results]" value="No" id="pdrugs-{i}-validation_results-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-validation_results-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][validation_results]" value="NA" id="pdrugs-{i}-validation_results-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][validation_second_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.4 Batch analyses </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Data for representative batch analyses are provided for all the relevant manufacturing process, and for each drug product manufacturer:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][batch_analyses]" value="">\
<label class="radio-inline" for="pdrugs-{i}-batch_analyses-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][batch_analyses]" value="Yes" id="pdrugs-{i}-batch_analyses-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-batch_analyses-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][batch_analyses]" value="No" id="pdrugs-{i}-batch_analyses-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-batch_analyses-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][batch_analyses]" value="NA" id="pdrugs-{i}-batch_analyses-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][batch_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.5 Characterisation of impurities </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The information provided for impurities is acceptable:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][impurities_acceptable]" value="">\
<label class="radio-inline" for="pdrugs-{i}-impurities_acceptable-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][impurities_acceptable]" value="Yes" id="pdrugs-{i}-impurities_acceptable-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-impurities_acceptable-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][impurities_acceptable]" value="No" id="pdrugs-{i}-impurities_acceptable-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-impurities_acceptable-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][impurities_acceptable]" value="NA" id="pdrugs-{i}-impurities_acceptable-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][impurities_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Comments: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][impurities_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.5.6 Justification of specification(s) </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The justification for the drug product specifications and limits is acceptable</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][product_specifications]" value="">\
<label class="radio-inline" for="pdrugs-{i}-product_specifications-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][product_specifications]" value="Yes" id="pdrugs-{i}-product_specifications-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-product_specifications-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][product_specifications]" value="No" id="pdrugs-{i}-product_specifications-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-product_specifications-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][product_specifications]" value="NA" id="pdrugs-{i}-product_specifications-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Comments: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][justification_specs_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Comments: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][justification_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.6 Reference standards or materials </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The justification for the drug product specifications and limits is acceptable</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][reference_standards]" value="">\
<label class="radio-inline" for="pdrugs-{i}-reference_standards-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][reference_standards]" value="Yes" id="pdrugs-{i}-reference_standards-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-reference_standards-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][reference_standards]" value="No" id="pdrugs-{i}-reference_standards-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-reference_standards-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][reference_standards]" value="NA" id="pdrugs-{i}-reference_standards-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Comments: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][reference_standards_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.7 Container closure system </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The container closure system for the drug product is properly characterised and suitable:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][closure_system]" value="">\
<label class="radio-inline" for="pdrugs-{i}-closure_system-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][closure_system]" value="Yes" id="pdrugs-{i}-closure_system-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-closure_system-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][closure_system]" value="No" id="pdrugs-{i}-closure_system-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-closure_system-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][closure_system]" value="NA" id="pdrugs-{i}-closure_system-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Comments: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][closure_system_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.8 Stability </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.8.1 Stability summary and conclusions </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.8.2 Post-approval stability protocol and stability commitment </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> P.8.3 Stability data </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The drug product has undergone appropriate stability tests:</td>\
<td>\
<input class="form-control" type="hidden" name="pdrugs[{i}][stability_tests]" value="">\
<label class="radio-inline" for="pdrugs-{i}-stability_tests-yes">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][stability_tests]" value="Yes" id="pdrugs-{i}-stability_tests-yes">Yes</label>\
<label class="radio-inline" for="pdrugs-{i}-stability_tests-no">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][stability_tests]" value="No" id="pdrugs-{i}-stability_tests-no">No</label> \
<label class="radio-inline" for="pdrugs-{i}-stability_tests-na">\
<input type="radio" class="radio-inline" name="pdrugs[{i}][stability_tests]" value="NA" id="pdrugs-{i}-stability_tests-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace: </label>\
            <textarea class="form-control rteditor" name="pdrugs[{i}][stability_tests_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<td></td>\
<td colspan="3">\List of proposed shelf-life/retest period and storage conditions of the drug substance. </td>\
</tr>\
<tr>\
            <td></td>\
            <td colspan="3">\
                <div class="row">\
                    <div class="col-xs-12">\
                        <h5><small> Summary of stability studies provided in support of the proposed shelf-life. State number of months for which data is available.:</small></h5>\
                    </div>\
                </div>\
            </tr>\
            <tr>\
            <td></td>\
            <td colspan="3">\
                <div class="row">\
                    <div class="col-xs-12">\
                        <div class="border">\
                            <table id="storageTable{i}" class="table table-bordered ">\
                                <thead>\
                                    <tr>\
                                        <th>#</th>\
                                        <th> Batch details<br> (e.g. batch number) </th>\
                                        <th> Manufacturing <br>process </th>\
                                        <th> -70ºC</th>\
                                        <th> -20ºC </th>\
                                        <th> 5ºC </th>\
                                        <th> 25ºC/<br>60% RH</th>\
                                        <th> 30ºC/<br>65% RH</th>\
                                        <th> 40ºC/<br>75% RH </th>\
                                    </tr>\
                                </thead>\
                                <tbody>\
                                    <tr>\
                                    <td>1.</td>\
                                    <td>\
                                    <input class="form-control" name="storage_conditions[{i}][model]" id="storage_conditions-{i}-model" type="hidden" value="pdrug">\
                                    <input class="form-control" name="storage_conditions[{i}][batch_details]" id="storage_conditions-{i}-batch_details" type="text">  </td>\
                                    <td>\
                                        <input class="form-control" name="storage_conditions[{i}][manu_process]" id="storage_conditions-{i}-site_function" type="text"> </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][neg_seventy]" id="storage_conditions-{i}-neg_seventy" type="number">   </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][neg_twenty]" id="storage_conditions-{i}-neg_twenty" type="number">   </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][pos_five]" id="storage_conditions-{i}-pos_five" type="number">   </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][pos_twenty_five]" id="storage_conditions-{i}-pos_twenty_five" type="number">   </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][pos_thirty]" id="storage_conditions-{i}-pos_thirty" type="number">   </td>\
                                    <td>\
                                    <input class="form-control " name="storage_conditions[{i}][pos_forty]" id="storage_conditions-{i}-pos_forty" type="number">   </td>\
                                    </tr>\
                                    </tbody>\
                            </table>\
                        </div>\
                    </div>\
                </div>\
            </td>\
        </tr>\<tr class="active">\
        <th></th>\
        <th> Comment whether trends or out of specifications results were observed. </th>\
        <th width="35%"></th>\
        </tr>\
        <tr>\
        <td></td>\
        <td> The extension of shelf-life will be made without substantial amendment:</td>\
        <td>\
        <input class="form-control" type="hidden" name="pdrugs[{i}][substantial_amendment]" value="">\
        <label class="radio-inline" for="pdrugs-{i}-substantial_amendment-yes">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][substantial_amendment]" value="Yes" id="pdrugs-{i}-substantial_amendment-yes">Yes</label>\
        <label class="radio-inline" for="pdrugs-{i}-substantial_amendment-no">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][substantial_amendment]" value="No" id="pdrugs-{i}-substantial_amendment-no">No</label> \
        <label class="radio-inline" for="pdrugs-{i}-substantial_amendment-na">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][substantial_amendment]" value="NA" id="pdrugs-{i}-substantial_amendment-na">NA</label></td>\
        </tr>\
        <tr>\
        <td></td>\
        <td> If yes, extension to be made in accordance with a registered protocol:</td>\
        <td>\
        <input class="form-control" type="hidden" name="pdrugs[{i}][registered_protocol]" value="">\
        <label class="radio-inline" for="pdrugs-{i}-registered_protocol-yes">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][registered_protocol]" value="Yes" id="pdrugs-{i}-registered_protocol-yes">Yes</label>\
        <label class="radio-inline" for="pdrugs-{i}-registered_protocol-no">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][registered_protocol]" value="No" id="pdrugs-{i}-registered_protocol-no">No</label> \
        <label class="radio-inline" for="pdrugs-{i}-registered_protocol-na">\
        <input type="radio" class="radio-inline" name="pdrugs[{i}][registered_protocol]" value="NA" id="pdrugs-{i}-registered_protocol-na">NA</label></td>\
        </tr>\<tr>\
        <td></td>\
        <td colspan="3">\
            <div class="row">\
                <div class="col-xs-12">\
                    <label> Comments: </label>\
                    <textarea class="form-control rteditor" name="pdrugs[{i}][pdrug_comments]" cols="30" rows="3"></textarea>\
                </div>\
            </div>\
        </td>\
        </tr>\
                </tbody>\
            </table>\
            <div class="controls"><button type="button" id="pdrugsButton{i}" class="btn btn-xs btn-danger removePIContact"><i class="icon-trash"></i> Remove PR</button></div> \
                        <hr id="pdrugsHr{i}"> \
                    </div> \
                    </div> \
                </div>\
                </div>'.replace(/{i}/g, intId));
            $("#pdrugs").append(new_picontact).find('.rteditor').ckeditor();
        } else {
            alert("Sorry, cant add more than " + $("#pdrugs .contact-group").length + " S Drug Substances!");
        }

        $(".datepickers").datepicker({
            minDate: "-100Y", maxDate: "-0D", dateFormat: 'dd-mm-yy', showButtonPanel: true, changeMonth: true, changeYear: true,
            yearRange: "-100Y:+0",
            buttonImageOnly: true, showAnim: 'show', showOn: 'both', buttonImage: '/img/calendar.gif'
        });
    }

    function updateCheckboxes() {
        //get all checkboxes only in this group
        var checkboxes = $("#pdrugs .contact-group").find('input[type="checkbox"]');
        var checked = [];
        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                checked.push($(this).val());
                //set the value to the respective checkbox
                // prevent this error: 'boolean' => 'The provided value is invalid'
                $(this).val(1);
            } else {
                checked.push($(this).val());
                $(this).val(0);
            }
        });

    }



    function removePIContact() {
        intId = parseFloat($(this).attr('id').replace('pdrugsButton', ''));
        console.log('button Id-> ' + intId);
        var inputVal = $('#investigator-contacts-' + intId + '-id').val();
        if (inputVal) {
            $.ajax({
                type: 'POST',
                url: '/pdrugs/delete/' + inputVal + '.json',
                data: { 'id': inputVal },
                success: function (data) {
                    // console.log(data);
                }
            });
        }
        $(this).parent().parent().remove();
    }
});
