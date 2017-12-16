$(function() {
	// Multi Sponsor Handling
	$("#addSponsorDetail").on("click", addSponsorDetail);
	$(document).on('click', '.removeSponsorDetail', removeSponsorDetail);


	// Multi Sponsor Handling
	function addSponsorDetail() {
		var se = $("#sponsor_details .sponsor-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('SponsorDetail', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#sponsor_details .sponsor-group").length < 9) {
			var new_sponsordetail = $('<div class="sponsor-group"> \
				<p  class="topper" id="SponsorDetailLabel{i}">{i} additional sponsors</p> \
				<span class="badge badge-info">{i}</span> \
				<div class="control-group"> <label class="control-label required" for="Sponsor{i}Sponsor"> \
				  Sponsor <span class="sterix">*</span></label><div class="controls"><input type="text" \
				  id="Sponsor{i}Sponsor" maxlength="255" placeholder=" " class="input-xxlarge" \
				  name="data[Sponsor][{i}][sponsor]"></div></div> \
				<div class="control-group"><label class="control-label" for="Sponsor{i}ContactPerson">Contact Person</label>\
				  <div class="controls"><input type="text" id="Sponsor{i}ContactPerson" maxlength="255" placeholder=" " \
				  class="input-xxlarge" name="data[Sponsor][{i}][contact_person]"></div></div> \
				<div class="control-group"><label class="control-label required" for="Sponsor{i}Address">Address <span class="sterix">*</span> \
				  </label><div class="controls"><input type="text" id="Sponsor{i}Address" maxlength="255" placeholder=" " \
				  class="input-xxlarge" name="data[Sponsor][{i}][address]"></div></div> \
				<div class="control-group">  <label class="control-label required" for="Sponsor{i}TelephoneNumber">Telephone Number  \
				  <span class="sterix">*</span></label>  <div class="controls"><input type="text" id="Sponsor{i}TelephoneNumber" \
				  maxlength="255" placeholder=" " class="input-xxlarge" name="data[Sponsor][{i}][telephone_number]"></div></div> \
				<div class="control-group"><label class="control-label" for="Sponsor{i}FaxNumber">Fax Number</label><div class="controls"> \
				  <input type="text" id="Sponsor{i}FaxNumber" maxlength="255" placeholder=" " class="input-xxlarge" \
				  name="data[Sponsor][{i}][fax_number]"></div></div> \
				<div class="control-group"><label class="control-label required" for="Sponsor{i}CellNumber">Mobile phone number \
				  <span class="sterix">*</span></label><div class="controls"><input type="text" id="Sponsor{i}CellNumber" \
				  maxlength="255" placeholder=" " class="input-xxlarge" name="data[Sponsor][{i}][cell_number]"></div></div> \
				<div class="control-group"><label class="control-label required" for="Sponsor{i}EmailAddress">Email Address \
				  <span class="sterix">*</span></label><div class="controls"><input type="email" id="Sponsor{i}EmailAddress" maxlength="255" \
				  placeholder=" " class="input-xxlarge" name="data[Sponsor][{i}][email_address]"></div></div> \
				<div class="controls"><button class="btn btn-mini btn-danger removeSponsorDetail" id="SponsorDetail{i}" \
				  type="button"><i class="icon-trash"></i> Remove Detail </button></div> \
				  <hr id="SponsorHr{i}"> </div>'.replace(/{i}/g, intId));
			$("#sponsor_details").append(new_sponsordetail);
		} else {
			alert("Sorry, cant add more than "+$("#sponsor_details .sponsor-group").length+" Sponsor Details!");
		}
	}
	function removeSponsorDetail() {
		intId = parseFloat($(this).attr('id').replace('SponsorDetail', ''));
		var inputVal = $('#Sponsor'+ intId +'Id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/sponsors/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
