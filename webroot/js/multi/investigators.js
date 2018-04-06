$(function() {
    // Multi Contacts Handling
    $("#addPIContact").on("click", addPIContacts);
    $(document).on('click', '.removePIContact', removePIContact);

    // Multi Contacts Handling
    function addPIContacts() {
        var se = $("#investigator_contacts .contact-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('investigator_contactsButton', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#investigator_contacts .contact-group").length < 9) {
            var new_picontact = $('<div class="contact-group"> \
                    <div id="investigator_primary_contact"> \
                        <input class="form-control" name="investigator_contacts[{i}][id]" id="investigator-contacts-{i}-id" type="hidden"> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-given-name">Full names <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="investigator_contacts[{i}][given_name]" maxlength="100" id="investigator-contacts-{i}-given-name" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-date-of-birth">Date Of Birth</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input name="investigator_contacts[{i}][date_of_birth]" class="datepickers" id="investigator-contacts-{i}-date-of-birth" type="text"><img class="ui-datepicker-trigger" src="/img/calendar.gif" alt="..." title="..."></div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-qualification">Qualification <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="investigator_contacts[{i}][qualification]" maxlength="255" id="investigator-contacts-{i}-qualification" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-professional-address">Professional address <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="investigator_contacts[{i}][professional_address]" maxlength="255" id="investigator-contacts-{i}-professional-address" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input tel"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-telephone">Telephone number <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="investigator_contacts[{i}][telephone]" maxlength="100" id="investigator-contacts-{i}-telephone" type="tel"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input email"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="investigator-contacts-{i}-email">email address <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="investigator_contacts[{i}][email]" maxlength="255" id="investigator-contacts-{i}-email" type="email"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="controls"><button type="button" id="investigator_contactsButton{i}" class="btn btn-xs btn-danger removePIContact"><i class="icon-trash"></i> Remove Contact</button></div> \
                        <hr id="investigator_contactsHr{i}"> \
                    </div> \
                </div>'.replace(/{i}/g, intId));
            // console.log(se.replace(/\d/, '1441441'));
            $("#investigator_contacts").append(new_picontact);
        } else {
            alert("Sorry, cant add more than "+$("#investigator_contacts .contact-group").length+" Contacts!");
        }

        $( ".datepickers" ).datepicker({
            minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
            yearRange: "-100Y:+0",
            buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
        });
    }

    function removePIContact() {
        intId = parseFloat($(this).attr('id').replace('investigator_contactsButton', ''));
        
        var inputVal = $('#investigator-contacts-'+ intId +'-id').val();
        if (inputVal) {
            $.ajax({
                type:'POST',
                url:'/investigator-contacts/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    // console.log(data);
                }
            });
        }
        $(this).parent().parent().remove();
    }
});
