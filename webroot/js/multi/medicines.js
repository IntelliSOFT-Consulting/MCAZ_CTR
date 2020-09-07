$(function() {
	// Multi Medicines Handling
	$("#addMedicineDetail").on("click", addMedicineDetail);
    $(document).on('click', '.medicinecontrols .add-medicine-fileinput', add_medicine_fileinput);
	$(document).on('click', '.removemedicines', removeMedicineDetail);
	// Multi medicines Handling
	$("#medicines").find('.rteditor').ckeditor();
	function addMedicineDetail() {
		// console.log('clicked');
		var se = $("#medicines .medicine-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('medicinesButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#medicines .medicine-group").length < 9) {
			var new_medicinedetail = $('<div class="medicine-group"> \
        <p  class="topper" id="medicines-{i}-MedicineDetailLabel{i}">{i} additional medicines</p> \
				<h6>6.1.{i2}</h6>\
                <input class="form-control" name="medicines[{i}][id]" id="medicines-{i}-id" type="hidden"> \
                <div class="input text"> \
                    <div class="form-group"> \
                        <div class="col-sm-4 control-label"> \
                            <label for="medicines-{i}-medicine-name">Name of medicine</label> \
                        </div> \
                        <div class="col-sm-6"> \
                            <input class="form-control" name="medicines[{i}][medicine_name]" maxlength="255" id="medicines-{i}-medicine-name" value="" type="text"> \
                        </div> \
                    </div> \
                </div> \
                <div class="input text"> \
                    <div class="form-group"> \
                        <div class="col-sm-4 control-label"> \
                            <label for="medicines-{i}-quantity-required">Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label> \
                        </div> \
                        <div class="col-sm-6"> \
                            <input class="form-control" name="medicines[{i}][quantity_required]" maxlength="255" id="medicines-{i}-quantity-required" value="" type="text"> \
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
         <div class="col-sm-12"><textarea class="form-control rteditor" name="medicines[{i}][drug_details]" required="required" id="medicines-{i}-drug-details"></textarea></div>\
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-medicine-reaction">Adverse/ possible reactions to the medicine </label></div>\
         <div class="col-sm-12"><textarea class="form-control rteditor" name="medicines[{i}][medicine_reaction]" id="medicines-{i}-medicine-reaction">\
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
   <div id="medicines-{i}-registrations" class="medicinecontrols" title="registrations">              \
      <label>If YES attach a valid certificate of registration in respect of such medicine issued by the appropriate authority established for the registration of medicine in the country of origin shall accompany this application <button class="btn btn-warning btn-xs tiptip add-medicinea-fileinput" data-toggle="tooltip" title="Add a file" style="margin-left:10px;" type="button">&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; </button></label>            \
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-medicine-registered-details">State details/reason</label></div>\
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][medicine_registered_details]" id="medicines-{i}-medicine-registered-details"></textarea></div>\
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
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][trial_origin_details]" id="medicines-{i}-trial-origin-details"></textarea></div>\
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
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][application_other_country_details]" id="medicines-{i}-application-other-country-details"></textarea></div>\
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
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][registered_other_country_details]" id="medicines-{i}-registered-other-country-details"></textarea></div>\
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
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][rejected_other_country_details]" id="medicines-{i}-rejected-other-country-details"></textarea></div>\
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
         <div class="col-sm-12"><textarea class="form-control" name="medicines[{i}][state_antidote]" id="medicines-{i}-state-antidote"></textarea></div>\
      </div>\
   </div>\
   <div class="input textarea">\
      <div class="form-group">\
         <div class="col-sm-12"><label for="medicines-{i}-exemption-required">State the quantity of the medicine for which exemption is required if the medicine is not registered</label></div>\
         <div class="col-sm-12"><textarea class="form-control rteditor" name="medicines[{i}][exemption_required]" id="medicines-{i}-exemption-required"></textarea></div>\
      </div>\
   </div>\
              <div class="controls"><button type="button" id="medicines-{i}-medicinesButton{i}" class="btn btn-xs btn-danger removemedicines"><i class="fa fa-trash-o"></i> Remove Medicine</button></div> \
          <hr id="medicines-{i}-MedicineDetailHr{i}"> </div>'.replace(/{i}/g, intId).replace(/{i2}/g, intId+2));
			$("#medicines").append(new_medicinedetail).find('.rteditor').ckeditor();
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

	var medicineOption = '\
        <input type="hidden" id="attachments-{i}-id" class="" name="attachments[{i}][id]" style="display: inline;">\
        <input type="file" id="attachments-{i}-file" name="attachments[{i}][file]" style="display: inline-block;">\
        <span class="help-inline" id="attachments-{i}-help" style="display: inline-block;">   Upload! </span>\
        <button class="btn btn-xs btn-danger remove_file_input" type="button">&nbsp;<i class="fa fa-trash"></i>&nbsp;</button>\
        <input type="hidden" id="attachments-{i}-model" value="Medicines" class="" name="attachments[{i}][model]" style="display: inline;">\
        <input type="hidden" id="attachments-{i}-category" value="{n}" name="attachments[{i}][category]" style="display: inline;">\
        ';
	function add_medicine_fileinput() {
        if ($(this).closest('div.medicinecontrols').find('input:file').length) {
            $(this).closest('div.medicinecontrols').find('input:file, .help-inline').each(function() {
                $(this).effect("highlight", { color: '#99C0DD' }, 3000);
            });
        } else {
            intId = $(this).closest('div.medicinecontrols').children().length;
            name = $(this).closest('div.medicinecontrols').attr('id');
            $(this).closest('div.medicinecontrols').append('<div style="margin-top: 5px; margin-bottom: 5px;">' +
                medicineOption.replace(/{n}/g, name).replace(/{i}/g, intId) + '</div>');
            setMedicineFileUpload();
        }
    }
    setMedicineFileUpload();
    function setMedicineFileUpload() {
        $('.medicinecontrols :input:file').each(function() {
            $(this).fileupload({
                url:'/attachments/add.json',
                //sequentialUploads: true,
                dataType: 'json',
                fileInput: $(this),
                add: function(e, data) {
                    data.context = $(this).closest('div');
                    if (!data.context.find('.progress').length) {
                        data.context.prepend('\
                            <div class="progress pull-right" style="width: 45%;margin-right: 45px;">\
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">\
    <span class="sr-only">45% Complete</span>\
  </div>\
</div>');
                    }
                    data.context.find('.progress .progress-bar').css('width', '0%');
                    data.context.find('span.help-inline').text('Uploading!');
                    data.submit();
                },
                submit: function(e, data) {
                    //console.log('additiona field data');
                    var fieldData = new Array();
                    fieldData.push({ name: 'foreign_key', value: $('#applications-id').val() });
                    data.context.closest('div.medicinecontrols').find(':input').each(function() {
                        fieldData.push({ name: $(this).attr('name'), value: $(this).val() });
                    });
                    data.formData = fieldData;
                    //Don't allow saving records without application id. will result in rogue applications created
                    if (!$('#applications-id').val()) {
                        $(this).focus();
                        alert('we have an unexpected problem. please logout and login again.');
                        return false;
                    }
                },
                progress: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    data.context.find('.progress').show().find('.progress-bar').css('width', progress + '%');
                },
                done: function(e, data) {
                    if (/msie/.test(navigator.userAgent.toLowerCase())) {
                        location.reload();
                    }
                    console.log(data);
                    if (data.result.message == 'Success') {
                        data.context.empty();
                        // console.log(data.context.closest('div.medicinecontrols').attr('id'));
                        name = data.context.closest('div.medicinecontrols').attr('id');
                        cound = data.context.closest('div.medicinecontrols').children().length;
                        data.context.prepend(' \
                        <a href="/attachments/download/' + data.result.content[0].id + '" class="btn btn-info"> \
                        ' + data.result.content[0].file + '</a> \
                        <button class="btn btn-xs btn-danger delete_file_input" type="button" value="' + data.result.content[0].id + '">\
                        &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>');
                    } else {
                        data.context.append('<div class="alert alert-error"> \
                        <a class="close" data-dismiss="alert" href="#">&times;</a> \
                        <p>' + data.result.errors + '</p> </div>');
                        data.context.find('.progress').fadeOut('slow');
                    }
                },
                fail: function(e, data) {
                    data.context.append('<div class="alert alert-danger alert-dismissible" role="alert">\
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
  <strong>The file is not Valid!</strong> If the file is larger that 20 MB in size, please compress it to below 20 MB first.\
  The file may also be split into multiple parts and attached.\
</div>');

                    data.context.find('.progress').fadeOut('slow');
                    data.context.find('span.help-inline').text('Upload!');
                }
            })

        });
     }

     function delete_file_input() {
        if(confirm("are you sure you would like to delete this attachment?")) {
          fileThis = $(this);
          intId = parseInt(fileThis.val());
          console.log(intId);
          if (!isNaN(intId)) {
            $.ajax({
            type:'POST',
            url:'/attachments/delete/'+intId+'.json',
            data:{'id': intId},
            success : function(data) {
                if(fileThis.closest('div.medicinecontrols').children().length == 1 ) {
                    joeyButton = $(fileThis.closest('.form-group').find('.add-fileinput')[0]);
                    fileThis.closest('div').remove();
                    joeyButton.click();
                } else {
                    fileThis.closest('div').remove();
                }
            },
            error: function(data) {
                fileThis.closest('div').append('<div class="alert alert-error"> \
                          <a class="close" data-dismiss="alert" href="#">&times;</a> \
                          <p>Sorry! we could not complete this action. Please logout and login again to proceed..</p> </div>');
            }
            });
          } else {
            fileThis.closest('div').append('<div class="alert alert-error"> \
                          <a class="close" data-dismiss="alert" href="#">&times;</a> \
                          <p>Sorry! we could not complete this action. Please logout and login again to proceed</p> </div>');
          }
        }
    }
});
