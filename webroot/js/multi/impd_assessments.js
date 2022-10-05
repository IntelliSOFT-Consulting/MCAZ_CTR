$(function () {
    // Multi Contacts Handling
    $("#addPIContact").on("click", addPIContacts);
    $(document).on('click', '.removePIContact', removePIContact);
    $(document).on('click', '.updateCheckboxes', updateCheckboxes);

    // Multi Contacts Handling
    function addPIContacts() {
        var se = $("#investigator_contacts .contact-group").last().find('button').attr('id');
        if (typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('investigator_contactsButton', '')) + 1;
        } else {
            intId = 1;
        }

        //get all checkboxes only in this group
        var checkboxes = $("#investigator_contacts .contact-group").last().find('input[type="checkbox"]');
        var checked = [];
        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                checked.push($(this).val());
                //update the value
                $(this).val(1);
            }else{
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
                                <th>The drug substance: </th>\
                                <th width="35%"></th>\
                            </tr>\
                        </thead>\
                    <tbody>\
                    <tr>\
                    <td>{i}.1</td>\
                        <td>\
                            <div class="row">\
                                <div class="col-xs-3">\
                                    Has a monograph in\
                                </div>\
                                <div class="col-xs-9">\
                                    <br>\
                                    <input name="sdrugs[{i}][mono_ph]" id="mono_ph{i}" class="updateCheckboxes"   type="checkbox" "> Ph. Eur.<br>\
                                    <input name="sdrugs[{i}][mono_japan]" id="mono_japan{i}" type="checkbox" class="updateCheckboxes"> USP/JP<br>\
                                    <input name="sdrugs[{i}][mono_other]" id="mono_other{i}" type="checkbox" class="updateCheckboxes"> Other<br>\
                                    </div>\
                            </div>\
                        </td>\
                        <td> \
                        <input name="sdrugs[{i}][mono_no]" id="mono_no{i}" type="checkbox" class="updateCheckboxes" type="checkbox"> No\
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
            // console.log(se.replace(/\d/, '1441441'));
            $("#investigator_contacts").append(new_picontact);
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
        var checkboxes = $("#investigator_contacts .contact-group").last().find('input[type="checkbox"]');
        var checked = [];
        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                checked.push($(this).val());
                //set the value to the respective checkbox
                // prevent this error: 'boolean' => 'The provided value is invalid'
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        });
        //console log name and value of checked checkboxes
        console.log(checked);
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
