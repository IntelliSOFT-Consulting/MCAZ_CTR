$(function() {
	// Multi Organizations Handling
	$("#addOrganization").on("click", addOrganization);
	$(document).on('click', '.removeOrganization', removeOrganization);

	toggle_organizations();
	$('#ApplicationOrganisationsTransferredYes').on("click", toggle_organizations);
	$('#ApplicationOrganisationsTransferredNo').on("click", toggle_organizations);
	$('.organizations_f, .organizations_o').change(function() {
		$('#ApplicationOrganisationsTransferredYes').attr('checked', 'checked');
		toggle_organizations();
	});


	function toggle_organizations() {
		if($("#ApplicationOrganisationsTransferredYes").is(":checked")) {
			$("#addOrganization").removeAttr('disabled');
			$('.organizations_f').removeAttr('readonly');
			$('.organizations_o').removeAttr('disabled');
		}
		else if ($("#ApplicationOrganisationsTransferredNo").is(":checked")) {
			$("#addOrganization").attr('disabled', 'disabled');
			$('.organizations_f').attr('readonly', 'readonly').val('');
			$('.organizations_o').attr('disabled', 'disabled').prop('checked', false);

			$('.removeOrganization').each(function() {
		       	$(this).click();
		      });
		}
	}

	// Multi Organizations Handling
	function addOrganization() {
		var se = $("#organization_multis .organization-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('OrganizationButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#organization_multis .organization-group").length < 9) {
			var new_organization = $('#organization_primary').clone();
			new_organization.find('#organizations-0-id').remove();
			new_organization.prop('id', 'organization_multi'+intId).prop('class', 'organization-group');
			new_organization.prepend($('<p  class="topper" id="OrganizationLabel{i}">{i} additional organizations</p> \
										<span class="badge badge-info">{i}</span> '.replace(/{i}/g, intId)));
			new_organization.find(':text, textarea').each(function() {
				$(this).val('');
				$(this).parent().parent().prop('class', 'form-group required').find('.help-block').remove();
				var fore = $(this).parent().parent().find('label').attr('for');
				$(this).parent().parent().find('label').prop('for', fore.replace(/0/g, intId));
				this.id = this.id.replace(/0/g, intId);
				this.name = this.name.replace(/0/g, intId);
			});
			new_organization.find(':radio').each(function() {
				$(this).prop('checked', false);
				var enc_div = $(this).parent().parent().parent();
				enc_div.prop('class', 'form-group required').next('p.controls').remove();
				enc_div.find(':input[type="hidden"]').each(function() {
					this.id = this.id.replace(/0/g, intId);
					this.name = this.name.replace(/0/g, intId);
				});
				enc_div.find('a').each(function() {
					var onclick = $(this).attr('onclick');
					$(this).attr('onclick', onclick.replace(/0/g, intId));
				});
				this.id = this.id.replace(/0/g, intId);
				this.name = this.name.replace(/0/g, intId);
				var klass = $(this).attr('class');
				$(this).prop('class', klass.replace(/0/g, intId));
			});
			new_organization.append($('<div class="controls"><button type="button" id="OrganizationButton{i}" class="btn btn-mini btn-danger removeOrganization"> \
				   <i class="icon-trash"></i> Remove Organization</button></div> <hr id="OrganizationHr{i}">'.replace(/{i}/g, intId)));
			$("#organization_multis").append(new_organization);
		} else {
			alert("Sorry, cant add more than "+$("#organization_multis .organization-group").length+" Organizations!");
		}
	}
	function removeOrganization() {
		intId = parseFloat($(this).attr('id').replace('OrganizationButton', ''));
		var inputVal = $('#organizations-'+ intId +'-id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/organizations/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
