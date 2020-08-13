$(function() {
	// Multi Medicines Handling
	$("#addMedicineDetail").on("click", addMedicineDetail);
	$(document).on('click', '.removemedicines', removeMedicineDetail);
	// Multi medicines Handling
	function addMedicineDetail() {
		console.log('clicked');
		var se = $("#medicines .medicine-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('medicinesButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#medicines .medicine-group").length < 9) {
			var new_medicinedetail = $('<div class="medicine-group"> \
				<h6>6.1.{i2}</h6>\
        <p  class="topper" id="medicines-{i}-MedicineDetailLabel{i}">{i} additional medicines</p> \
                <input class="form-control" name="medicines[{i}][id]" id="medicines-{i}-medicines-{i}-id" type="hidden"> \
                <div class="input text"> \
                    <div class="form-group"> \
                        <div class="col-sm-4 control-label"> \
                            <label for="medicines-{i}-medicine-name">Name of medicine</label> \
                        </div> \
                        <div class="col-sm-6"> \
                            <input class="form-control" name="medicines[{i}][medicine_name]" maxlength="255" id="medicines-{i}-medicines-{i}-medicine-name" value="" type="text"> \
                        </div> \
                    </div> \
                </div> \
                <div class="input text"> \
                    <div class="form-group"> \
                        <div class="col-sm-4 control-label"> \
                            <label for="medicines-{i}-quantity-required">Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label> \
                        </div> \
                        <div class="col-sm-6"> \
                            <input class="form-control" name="medicines[{i}][quantity_required]" maxlength="255" id="medicines-{i}-medicines-{i}-quantity-required" value="" type="text"> \
                        </div> \
                    </div> \
                </div> \
                <div class="input textarea required">\
   <div class="form-group">\
         <div class="col-sm-12">\
            <label for="medicines-{i}-drug-details">\
               <hr>\
               State the chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans or animals or any other relevant information or supply reports if available <i class="sterix fa fa-asterisk" aria-hidden="true"></i>\
            </label>\
         </div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][drug_details]" required="required" id="medicines-{i}-drug-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-medicine-reaction">Adverse/ possible reactions to the medicine </label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][medicine_reaction]" id="medicines-{i}-medicine-reaction">\
            </textarea>\
         </div>\
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label for="medicines-{i}-medicine-therapeutic-effects">Therapeutic effects of medicine</label></div>\
         <div class="col-sm-8"><textarea class="form-control" rows="3" name="medicines[{i}][medicine_therapeutic_effects]" id="medicines-{i}-medicine-therapeutic-effects"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>a) Has the medicine been registered in the country of origin?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][medicine_registered]" value=""><label class="radio-inline" for="medicines-{i}-medicine-registered-yes"><input type="radio" class="radio-inline" name="medicines[{i}][medicine_registered]" value="Yes" id="medicines-{i}-medicine-registered-yes">Yes</label><label class="radio-inline" for="medicines-{i}-medicine-registered-no"><input type="radio" class="radio-inline" name="medicines[{i}][medicine_registered]" value="No" id="medicines-{i}-medicine-registered-no">No</label> \
      </div>\
   </div>\
   <div id="medicines-{i}-registrations" class="checkcontrols" title="registrations">              \
      <label>If YES attach a valid certificate of registration in respect of such medicine issued by the appropriate authority established for the registration of medicine in the country of origin shall accompany this application <button class="btn btn-warning btn-xs tiptip add-fileinput" data-toggle="tooltip" title="Add a file" style="margin-left:10px;" type="button">&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; </button></label>            \
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-medicine-registered-details">State details/reason</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][medicine_registered_details]" id="medicines-{i}-medicine-registered-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>b) Have clinical trials been conducted in the country of origin?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][trials_origin_country]" value=""><label class="radio-inline" for="medicines-{i}-trials-origin-country-yes"><input type="radio" class="radio-inline" name="medicines[{i}][trials_origin_country]" value="Yes" id="medicines-{i}-trials-origin-country-yes">Yes</label><label class="radio-inline" for="medicines-{i}-trials-origin-country-no"><input type="radio" class="radio-inline" name="medicines[{i}][trials_origin_country]" value="No" id="medicines-{i}-trials-origin-country-no">No</label> \
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-trial-origin-details">State details/reason</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][trial_origin_details]" id="medicines-{i}-trial-origin-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>c) Has application for registration been made in any other country?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][application_other_country]" value=""><label class="radio-inline" for="medicines-{i}-application-other-country-yes"><input type="radio" class="radio-inline" name="medicines[{i}][application_other_country]" value="Yes" id="medicines-{i}-application-other-country-yes">Yes</label><label class="radio-inline" for="medicines-{i}-application-other-country-no"><input type="radio" class="radio-inline" name="medicines[{i}][application_other_country]" value="No" id="medicines-{i}-application-other-country-no">No</label> \
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-application-other-country-details">If Yes,State details/reason including the date on which the application was lodged</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][application_other_country_details]" id="medicines-{i}-application-other-country-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>d) Has the medicine been registered in any other country?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][registered_other_country]" value=""><label class="radio-inline" for="medicines-{i}-registered-other-country-yes"><input type="radio" class="radio-inline" name="medicines[{i}][registered_other_country]" value="Yes" id="medicines-{i}-registered-other-country-yes">Yes</label><label class="radio-inline" for="medicines-{i}-registered-other-country-no"><input type="radio" class="radio-inline" name="medicines[{i}][registered_other_country]" value="No" id="medicines-{i}-registered-other-country-no">No</label> \
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-registered-other-country-details">If Yes, State details/reason</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][registered_other_country_details]" id="medicines-{i}-registered-other-country-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>e) Has the registration of the medicine been rejected/deferred /cancelled in any country?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][rejected_other_country]" value=""><label class="radio-inline" for="medicines-{i}-rejected-other-country-yes"><input type="radio" class="radio-inline" name="medicines[{i}][rejected_other_country]" value="Yes" id="medicines-{i}-rejected-other-country-yes">Yes</label><label class="radio-inline" for="medicines-{i}-rejected-other-country-no"><input type="radio" class="radio-inline" name="medicines[{i}][rejected_other_country]" value="No" id="medicines-{i}-rejected-other-country-no">No</label> \
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-rejected-other-country-details">If Yes,State details/reason</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][rejected_other_country_details]" id="medicines-{i}-rejected-other-country-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input radio">\
      <div class="form-group">\
         <div class="col-sm-4 control-label"><label>f) What is the status of medicine in Zimbabwe?</label></div>\
         <input class="form-control" type="hidden" name="medicines[{i}][status_medicine]" value=""><label class="radio-inline" for="medicines-{i}-status-medicine-registered"><input type="radio" class="radio-inline" name="medicines[{i}][status_medicine]" value="Registered" id="medicines-{i}-status-medicine-registered">Registered</label><label class="radio-inline" for="medicines-{i}-status-medicine-unregistered"><input type="radio" class="radio-inline" name="medicines[{i}][status_medicine]" value="Unregistered " id="medicines-{i}-status-medicine-unregistered">Unregistered</label><label class="radio-inline" for="medicines-{i}-status-medicine-application-for-registration-submitted"><input type="radio" class="radio-inline" name="medicines[{i}][status_medicine]" value="Application for registration submitted" id="medicines-{i}-status-medicine-application-for-registration-submitted">Application for registration submitted</label> \
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-state-antidote">State Antidote</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][state_antidote]" id="medicines-{i}-state-antidote"></textarea></div>\
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-exemption-required">State the quantity of the medicine for which exemption is required if the medicine is not registered</label></div>\
         <div class="col-sm-12"><textarea class="form-control" rows="7" name="medicines[{i}][exemption_required]" id="medicines-{i}-exemption-required"></textarea></div>\
      </div>\
   </div>\
              <div class="controls"><button type="button" id="medicines-{i}-medicinesButton{i}" class="btn btn-xs btn-danger removemedicines"><i class="fa fa-trash-o"></i> Remove Medicine</button></div> \
          <hr id="medicines-{i}-MedicineDetailHr{i}"> </div>'.replace(/{i}/g, intId).replace(/{i2}/g, intId+1));
			$("#medicines").append(new_medicinedetail);
		} else {
			alert("Sorry, cant add more than "+$("#medicines .medicine-group").length+" Medicines!");
		}
	}
	function removeMedicineDetail() {
		intId = parseFloat($(this).attr('id').replace('medicinesButton', ''));
		var inputVal = $('#medicines-'+ intId +'-id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/medicines/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
