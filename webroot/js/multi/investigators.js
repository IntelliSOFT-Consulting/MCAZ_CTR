$(function() {
	// Multi Contacts Handling
	$("#addPIContact").on("click", addPIContacts);
	$(document).on('click', '.removePIContact', removePIContact);

	// Multi Contacts Handling
	function addPIContacts() {
		var se = $("#investigator_contacts .contact-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('InvestigatorContactButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#investigator_contacts .contact-group").length < 9) {
			var new_picontact = $('<div class="contact-group"> \
					   <p  class="topper" id="InvestigatorContactLabel{i}">{i} additional contacts</p> \
					   <span class="badge badge-info">{i}</span> \
					   <div class="control-group"> <label class="control-label required" for="InvestigatorContact{i}GivenName"> Given name <span class="sterix">*</span></label> \
					    <div class="controls"> <input type="text" id="InvestigatorContact{i}GivenName" maxlength="100" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][given_name]"></div></div> \
					   <div class="control-group"><label class="control-label" for="InvestigatorContact{i}MiddleName">Middle name, if applicable</label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}MiddleName" maxlength="100" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][middle_name]"></div></div> \
					   <div class="control-group"><label class="control-label required" for="InvestigatorContact{i}FamilyName">Family name <span class="sterix">*</span></label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}FamilyName" maxlength="100" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][family_name]"></div></div> \
					   <div class="control-group"><label class="control-label required" for="InvestigatorContact{i}Qualification">Qualification <span class="sterix">*</span></label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}Qualification" maxlength="255" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][qualification]"></div></div> \
					   <div class="control-group"><label class="control-label required" for="InvestigatorContact{i}ProfessionalAddress">Professional address <span class="sterix">*</span></label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}ProfessionalAddress" maxlength="255" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][professional_address]"></div></div> \
					   <div class="control-group"><label class="control-label required" for="InvestigatorContact{i}Telephone">Telephone number <span class="sterix">*</span></label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}Telephone" maxlength="255" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][telephone]"></div></div> \
					   <div class="control-group"><label class="control-label required" for="InvestigatorContact{i}Email">Email address <span class="sterix">*</span></label> \
					    <div class="controls"><input type="text" id="InvestigatorContact{i}Email" maxlength="255" placeholder=" " class="input-xxlarge" \
						name="data[InvestigatorContact][{i}][email]"></div></div> \
						<div class="controls"><button type="button" id="InvestigatorContactButton{i}" class="btn btn-mini btn-danger removePIContact"><i class="icon-trash"></i> Remove Contact</button></div> \
						<hr id="InvestigatorContactHr{i}"> </div>'.replace(/{i}/g, intId));
			// console.log(se.replace(/\d/, '1441441'));
			$("#investigator_contacts").append(new_picontact);
		} else {
			alert("Sorry, cant add more than "+$("#investigator_contacts .contact-group").length+" Contacts!");
		}
	}
	function removePIContact() {
		intId = parseFloat($(this).attr('id').replace('InvestigatorContactButton', ''));
		var inputVal = $('#InvestigatorContact'+ intId +'Id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/investigator_contacts/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
