$(function () {
    // Multi Contacts Handling
    $("#addPIContact").on("click", addPIContacts);
    $(document).on('click', '.removePIContact', removePIContact);
    $(document).on('click', '.updateCheckboxes', updateCheckboxes);
    $("#investigator_contacts").find('.rteditor').ckeditor();

    // Multi Contacts Handling
    function addPIContacts() {
        var se = $("#investigator_contacts .contact-group").last().find('button').attr('id');
        if (typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('investigator_contactsButton', '')) + 1;
        } else {
            intId = 1;
        } 

        //get allcheckboxes under this group

        var checkboxes = $("#investigator_contacts .contact-group").find('input[type="checkbox"]');
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


        if ($("#investigator_contacts .contact-group").length < 9) {
            var new_picontact = $('<div class="contact-group"> \
                    <div style="margin-right: 20px;" id="investigator_primary_contact"> \
                        <div class="form-group">\
                        <table class="table table-bordered table-condensed">\
                        <thead>\
                            <tr class="active">\
                                <th></th>\
                                <th>The S drug substance: </th>\
                                <th width="35%"></th>\
                            </tr>\
                        </thead>\
                    <tbody>\
                    <tr>\
                    <td></td>\
                        <td>\
                            <div class="row">\
                                <div class="col-xs-3">\
                                    Has a monograph in\
                                </div>\
                                <div class="col-xs-9">\
                                    <br>\
                                    <input name="sdrugs[{i}][mono_ph]" id="mono_ph{i}" class="updateCheckboxes" type="checkbox"> Ph. Eur.<br>\
                                    <input name="sdrugs[{i}][mono_japan]" id="mono_japan{i}" type="checkbox" class="updateCheckboxes"> USP/JP<br>\
                                    <input name="sdrugs[{i}][mono_other]" id="mono_other{i}" type="checkbox" class="updateCheckboxes"> Other<br>\
                                    </div>\
                            </div>\
                        </td>\
                        <td> \
                        <input name="sdrugs[{i}][mono_no]" id="mono_no{i}" type="checkbox" class="updateCheckboxes"> No\
                        </td>\
                    </tr>\
                    <tr>\
                    <tr>\
                    <td></td>\
                    <td>Does the active substance belong to an authorised drug product in the EU/USA/Japan?</td>\
                    <td>\
                       <input class="form-control" type="hidden" name="sdrugs[{i}][drug_authorised]" value=""><label class="radio-inline" for="sdrugs-{i}-drug_authorised-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][drug_authorised]" value="Yes" id="sdrugs-{i}-drug_authorised-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-drug_authorised-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][drug_authorised]" value="No" id="sdrugs-{i}-drug_authorised-no">No</label> \
                    </td>\
                </tr>\
                <tr>\
                <td></td>\
                <td colspan="3">\
                    <div class="row">\
                        <div class="col-xs-12">\
                            <label>None of the above (full S Section is needed):</label>\
                        </div>\
                    </div>\
                </td>\
            </tr>\
            <tr class="active">\
            <th></th>\
            <th>GMP General information </th>\
            <th width="35%"></th>\
        </tr>\
        <tr class="active">\
            <th></th>\
            <th>Nomenclature</th>\
            <th width="35%"></th>\
        </tr>\
        <tr>\
            <td></td>\
            <td colspan="3">\
                <div class="row">\
                    <div class="col-xs-12">\
                        <label>Workspace</label>\
                        <textarea class="form-control rteditor" name="sdrugs[{i}][nomen_workspace]" cols="30" rows="3"></textarea>\
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
                    <textarea class="form-control rteditor" name="sdrugs[{i}][noment_comment]" cols="30" rows="3"></textarea>\
                </div>\
            </div>\
        </td>\
    </tr>\
    <tr class="active">\
        <th></th>\
        <th>Structure </th>\
        <th width="35%"></th>\
    </tr>\
    <tr>\
    <td></td>\
    <td>Does the submitted documentation cover this subsection adequately?</td>\
    <td>\
    <input class="form-control" type="hidden" name="sdrugs[{i}][str_subsection]" value=""><label class="radio-inline" for="sdrugs-{i}-str_subsection-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][str_subsection]" value="Yes" id="sdrugs-{i}-str_subsection-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-str_subsection-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][str_subsection]" value="No" id="sdrugs-{i}-str_subsection-no">No</label> \
         </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace:</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][str_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][str_comment]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>General properties </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>Does the submitted material cover this subsection adequately?</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][gen_prop_adequately]" value=""><label class="radio-inline" for="sdrugs-{i}-gen_prop_adequately-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][gen_prop_adequately]" value="Yes" id="sdrugs-{i}-gen_prop_adequately-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-gen_prop_adequately-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][gen_prop_adequately]" value="No" id="sdrugs-{i}-gen_prop_adequately-no">No</label> \
    </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace:</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][gen_prop_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][gen_prop_comment]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>Manufacture </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th>Manufacturer(s) </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>Are the production sites clearly identified?</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][manu_identified]" value="">\
<label class="radio-inline" for="sdrugs-{i}-manu_identified-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][manu_identified]" value="Yes" id="sdrugs-{i}-manu_identified-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-manu_identified-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][manu_identified]" value="No" id="sdrugs-{i}-manu_identified-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-manu_identified-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][manu_identified]" value="NA" id="sdrugs-{i}-manu_identified-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][gen_manu_comment]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th> </th>\
<th>Description of the manufacturing process and process controls</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>Substance: Are the manufacturing processes and their controls adequately described?</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][process_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-process_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][process_described]" value="Yes" id="sdrugs-{i}-process_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-process_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][process_described]" value="No" id="sdrugs-{i}-process_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-process_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][process_described]" value="NA" id="sdrugs-{i}-process_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][process_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][workspace_comment]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>Control of materials</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>Is the control of materials adequately described?</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][control_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-control_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_described]" value="Yes" id="sdrugs-{i}-control_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-control_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_described]" value="No" id="sdrugs-{i}-control_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-control_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_described]" value="NA" id="sdrugs-{i}-control_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Workspace</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][control_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][control_comment]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th>Control of critical steps and intermediates</th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td>Is the control of critical steps and intermediates adequately described?</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][control_steps_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-control_steps_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_steps_described]" value="Yes" id="sdrugs-{i}-control_steps_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-control_steps_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_steps_described]" value="No" id="sdrugs-{i}-control_steps_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-control_steps_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][control_steps_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> \
    </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][control_steps_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Process validation and/or evaluation </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Is the process validation adequately described? </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][validation_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-validation_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][validation_described]" value="Yes" id="sdrugs-{i}-validation_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-validation_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][validation_described]" value="No" id="sdrugs-{i}-validation_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-validation_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][validation_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][validation_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Manufacturing process development </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Is the manufacturing process development adequately described? </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][manufacturing_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-manufacturing_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][manufacturing_described]" value="Yes" id="sdrugs-{i}-manufacturing_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-manufacturing_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][manufacturing_described]" value="No" id="sdrugs-{i}-manufacturing_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-manufacturing_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][manufacturing_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][manufacturing_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][manufacturing_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Characterisation </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> Elucidation of the structure and other characteristics </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Is the drug substance sufficiently characterised? </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][substance_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-substance_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][substance_described]" value="Yes" id="sdrugs-{i}-substance_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-substance_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][substance_described]" value="No" id="sdrugs-{i}-substance_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-substance_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][substance_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][substance_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][substance_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Impurities </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Are impurities sufficiently characterised? </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][impurities_characterised]" value="">\
<label class="radio-inline" for="sdrugs-{i}-impurities_characterised-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][impurities_characterised]" value="Yes" id="sdrugs-{i}-impurities_characterised-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-impurities_characterised-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][impurities_characterised]" value="No" id="sdrugs-{i}-impurities_characterised-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-impurities_characterised-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][impurities_characterised]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> \
</td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][impurities_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][impurities_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Control of the drug substance </th>\
<th width="35%"></th>\
</tr>\
<tr class="active">\
<th></th>\
<th> Specification(s) </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Satisfactory specifications for the drug substance, including appropriate limits, are proposed:</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][specifications_appropriate]" value="">\
<label class="radio-inline" for="sdrugs-{i}-specifications_appropriate-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][specifications_appropriate]" value="Yes" id="sdrugs-{i}-specifications_appropriate-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-specifications_appropriate-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][specifications_appropriate]" value="No" id="sdrugs-{i}-specifications_appropriate-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-specifications_appropriate-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][specifications_appropriate]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label>  </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][specifications_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][specifications_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Are the analytical methods adequately described? </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][analytical_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-analytical_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][analytical_described]" value="Yes" id="sdrugs-{i}-analytical_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-analytical_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][analytical_described]" value="No" id="sdrugs-{i}-analytical_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-analytical_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][analytical_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][analytical_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Validation of analytical procedures </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> <b>Phase I trials</b> The suitability of the methods is commensurate with the stage of development. The acceptance limits and parameters to validate the analytical methods are presented: </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][acceptance_presented]" value="">\
<label class="radio-inline" for="sdrugs-{i}-acceptance_presented-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][acceptance_presented]" value="Yes" id="sdrugs-{i}-acceptance_presented-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-acceptance_presented-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][acceptance_presented]" value="No" id="sdrugs-{i}-acceptance_presented-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-acceptance_presented-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][acceptance_presented]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td> <b>For phase II/III trials</b> The suitability of methods is commensurate with the stage of development and clearly explained. A summary of the validation results is provided: </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][suitability_explained]" value="">\
<label class="radio-inline" for="sdrugs-{i}-suitability_explained-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][suitability_explained]" value="Yes" id="sdrugs-{i}-suitability_explained-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-suitability_explained-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][suitability_explained]" value="No" id="sdrugs-{i}-suitability_explained-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-suitability_explained-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][suitability_explained]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][validation_procedures_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Batch analyses </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> Data for representative batch analyses are provided for all the relevant manufacturing process, and for each drug substance manufacturer: </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][batch_provided]" value="">\
<label class="radio-inline" for="sdrugs-{i}-batch_provided-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][batch_provided]" value="Yes" id="sdrugs-{i}-batch_provided-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-batch_provided-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][batch_provided]" value="No" id="sdrugs-{i}-batch_provided-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-batch_provided-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][batch_provided]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][batch_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][batch_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Justification of the specification (s) </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The justification for the specifications is acceptable</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][justification_acceptable]" value="">\
<label class="radio-inline" for="sdrugs-{i}-justification_acceptable-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][justification_acceptable]" value="Yes" id="sdrugs-{i}-justification_acceptable-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-justification_acceptable-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][justification_acceptable]" value="No" id="sdrugs-{i}-justification_acceptable-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-justification_acceptable-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][justification_acceptable]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label> </td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][justification_workspace]" cols="30" rows="3"></textarea>\
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
            <textarea class="form-control rteditor" name="sdrugs[{i}][justification_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Reference standards or materials </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> A suitable reference standard is adequately described: </td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][reference_described]" value="">\
<label class="radio-inline" for="sdrugs-{i}-reference_described-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][reference_described]" value="Yes" id="sdrugs-{i}-reference_described-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-reference_described-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][reference_described]" value="No" id="sdrugs-{i}-reference_described-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-reference_described-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][reference_described]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][reference_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Container closure system </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The container closure system for the drug substance is properly characterised and suitable:\
</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][container_suitable]" value="">\
<label class="radio-inline" for="sdrugs-{i}-container_suitable-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][container_suitable]" value="Yes" id="sdrugs-{i}-container_suitable-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-container_suitable-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][container_suitable]" value="No" id="sdrugs-{i}-container_suitable-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-container_suitable-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][container_suitable]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label>Officer’s Comments</label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][container_comments]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
<tr class="active">\
<th></th>\
<th> Stability </th>\
<th width="35%"></th>\
</tr>\
<tr>\
<td></td>\
<td> The stability for the drug substance is satisfactory and properly described for all the relevant manufacturing processes:</td>\
<td>\
<input class="form-control" type="hidden" name="sdrugs[{i}][stability_satisfactory]" value="">\
<label class="radio-inline" for="sdrugs-{i}-stability_satisfactory-yes"><input type="radio" class="radio-inline" name="sdrugs[{i}][stability_satisfactory]" value="Yes" id="sdrugs-{i}-stability_satisfactory-yes">Yes</label><label class="radio-inline" for="sdrugs-{i}-stability_satisfactory-no"><input type="radio" class="radio-inline" name="sdrugs[{i}][stability_satisfactory]" value="No" id="sdrugs-{i}-stability_satisfactory-no">No</label> \
<label class="radio-inline" for="sdrugs-{i}-stability_satisfactory-na"><input type="radio" class="radio-inline" name="sdrugs[{i}][stability_satisfactory]" value="NA" id="sdrugs-{i}-control_steps_described-na">NA</label></td>\
</tr>\
<tr>\
<td></td>\
<td colspan="3">\
    <div class="row">\
        <div class="col-xs-12">\
            <label> Workspace: </label>\
            <textarea class="form-control rteditor" name="sdrugs[{i}][stability_workspace]" cols="30" rows="3"></textarea>\
        </div>\
    </div>\
</td>\
</tr>\
                </tbody>\
            </table>\
                        <div class="controls"><button type="button" id="investigator_contactsButton{i}" class="btn btn-xs btn-danger removePIContact"><i class="icon-trash"></i> Remove PR</button></div> \
                        <hr id="investigator_contactsHr{i}"> \
                    </div> \
                    </div> \
                </div>\
                </div>'.replace(/{i}/g, intId)); 
            $("#investigator_contacts").append(new_picontact).find('.rteditor').ckeditor();
        } else {
            alert("Sorry, cant add more than " + $("#investigator_contacts .contact-group").length + " S Drug Substances!");
        }

        $(".datepickers").datepicker({
            minDate: "-100Y", maxDate: "-0D", dateFormat: 'dd-mm-yy', showButtonPanel: true, changeMonth: true, changeYear: true,
            yearRange: "-100Y:+0",
            buttonImageOnly: true, showAnim: 'show', showOn: 'both', buttonImage: '/img/calendar.gif'
        });
    }

    function updateCheckboxes() {
        //get all checkboxes only in this group
        var checkboxes = $("#investigator_contacts .contact-group").find('input[type="checkbox"]');
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
        intId = parseFloat($(this).attr('id').replace('investigator_contactsButton', ''));
        console.log('button Id-> ' + intId);
        var inputVal = $('#investigator-contacts-' + intId + '-id').val();
        if (inputVal) {
            $.ajax({
                type: 'POST',
                url: '/sdrugs/delete/' + inputVal + '.json',
                data: { 'id': inputVal },
                success: function (data) {
                    // console.log(data);
                }
            });
        }
        $(this).parent().parent().remove();
    }
});
