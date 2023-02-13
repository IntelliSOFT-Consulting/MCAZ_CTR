$(function () {
    // Multi Contacts Handling
    $("#addCompliance").on("click", addPIContacts);
    $(document).on('click', '.removePIContact', removePIContact);
    $(document).on('click', '.updateCheckboxes', updateCheckboxes);
    $("#compliance_section").find('.rteditor').ckeditor();

    // Multi Contacts Handling
    function addPIContacts() {
        var se = $("#compliance_section .compliance-group").last().find('button').attr('id');
        if (typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('compliance_sectionButton', '')) + 1;
        } else {
            intId = 1;
        }

        //get allcheckboxes under this group

        var checkboxes = $("#compliance_section .compliance-group").find('input[type="checkbox"]');
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


        if ($("#compliance_section .compliance-group").length < 9) {
            var new_picontact = $('<div class="compliance-group"> \
            <div style="margin-right: 20px;" id="compliance_primary_contact"> \
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
                        <div class="controls"><button type="button" id="compliance_sectionButton{i}" class="btn btn-xs btn-danger removePIContact"><i class="icon-trash"></i> Remove PR</button></div> \
                        <hr id="compliance_sectionHr{i}"> \
                </div>'.replace(/{i}/g, intId));
            $("#compliance_section").append(new_picontact).find('.rteditor').ckeditor();
        } else {
            alert("Sorry, cant add more than " + $("#compliance_section .compliance-group").length + " S Drug Substances!");
        }

        $(".datepickers").datepicker({
            minDate: "-100Y", maxDate: "-0D", dateFormat: 'dd-mm-yy', showButtonPanel: true, changeMonth: true, changeYear: true,
            yearRange: "-100Y:+0",
            buttonImageOnly: true, showAnim: 'show', showOn: 'both', buttonImage: '/img/calendar.gif'
        });
    }

    function updateCheckboxes() {
        //get all checkboxes only in this group
        var checkboxes = $("#compliance_section .compliance-group").find('input[type="checkbox"]');
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
        intId = parseFloat($(this).attr('id').replace('compliance_sectionButton', ''));
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
