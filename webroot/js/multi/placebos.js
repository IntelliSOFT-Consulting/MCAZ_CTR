$(function() {
	// Multi Contacts Handling
	$("#addPlacebo").on("click", addPlacebos);
	$(document).on('click', '.removePlacebo', removePlacebo);

	toggle_placebos();
	$('#ApplicationPlaceboPresentYes').on("click", toggle_placebos);
	$('#ApplicationPlaceboPresentNo').on("click", toggle_placebos);

	$('.placebo_f, .placebo_r').change(function() {
		$('#ApplicationPlaceboPresentYes').attr('checked', 'checked');
		toggle_placebos();
	});

	function toggle_placebos() {
		if($("#ApplicationPlaceboPresentYes").is(":checked")) {
			$("#addPlacebo").removeAttr('disabled');
			$('.placebo_f').removeAttr('readonly');
			$('.placebo_r').removeAttr('disabled');
		}
		else if ($("#ApplicationPlaceboPresentNo").is(":checked")) {
			$("#addPlacebo").attr('disabled', 'disabled');
			$('.placebo_f').attr('readonly', 'readonly').val('');
			$('.placebo_r').attr('disabled', 'disabled').prop('checked', false);

			$('.removePlacebo').each(function() {
		       	$(this).click();
		      });
		}
	}

	// Multi Contacts Handling
	function addPlacebos() {
		var se = $("#placebo_infos .placebo-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('PlaceboButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#placebo_infos .placebo-group").length < 9) {
			var new_picontact = $('<div class="placebo-group"> \
			<p  class="topper" id="PlaceboLabel{i}">{i} additional placebo</p> \
			<span class="badge badge-info">{i}</span> \
			<div class="control-group"><label class="control-label required" for="Placebo{i}PharmaceuticalForm">Pharmaceutical form </label> \
			  <div class="controls"><input type="text" id="Placebo{i}PharmaceuticalForm" maxlength="255" placeholder=" " \
			  class="input-xxlarge placebo_f" name="data[Placebo][{i}][pharmaceutical_form]"></div></div> \
			<div class="control-group"><label class="control-label required" for="Placebo{i}RouteOfAdministration">Route of administration</label> \
			  <div class="controls"><input type="text" id="Placebo{i}RouteOfAdministration" maxlength="255" placeholder=" " \
			  class="input-xxlarge placebo_f" name="data[Placebo][{i}][route_of_administration]"></div></div> \
			<div class="control-group"><label class="control-label required" for="Placebo{i}Composition">Composition, apart from active substance(s) \
			  </label><div class="controls"><input type="text" id="Placebo{i}Composition" maxlength="255" placeholder=" " \
			  class="input-xxlarge placebo_f" name="data[Placebo][{i}][composition]"></div></div> \
			<div class="control-group "> <label class="control-label required">Is it otherwise identical to the INDP? </label> \
			  <div class="controls"> <input type="hidden" name="data[Placebo][{i}][identical_indp]" id="Placebo{i}IdenticalIndp_" value=""> \
			  <label class="radio inline"><input type="radio" value="Yes" \
			  class="identical_indp{i} placebo_r" id="Placebo{i}IdenticalIndpYes" name="data[Placebo][{i}][identical_indp]">Yes</label> \
			  <label class="radio inline"><input type="radio" value="No" class="identical_indp{i} placebo_r" \
			  id="Placebo{i}IdenticalIndpNo" name="data[Placebo][{i}][identical_indp]">No</label> <span style="padding-top: 5px;" class="help-inline">\
			    <a onclick="$(\'.identical_indp{i}\').removeAttr(\'checked disabled\')" data-original-title="Clear selection" class="tooltipper"> \
				<em class="accordion-toggle">clear!</em></a> </span>	</div> </div> \
			<div class="control-group"><label class="control-label required" for="Placebo{i}MajorIngredients">If not, specify major ingredients</label> \
			  <div class="controls"><textarea id="Placebo{i}MajorIngredients" rows="6" cols="30" placeholder=" " \
			  class="input-xxlarge placebo_f" name="data[Placebo][{i}][major_ingredients]"></textarea></div></div> \
			<div class="controls"><button type="button" class="btn btn-mini btn-danger removePlacebo" id="PlaceboButton{i}"> \
			  Remove Placebo</button></div><hr id="PlaceboHr{i}">	 </div>'.replace(/{i}/g, intId));
			$("#placebo_infos").append(new_picontact);
		} else {
			alert("Sorry, cant add more than "+$("#placebo_infos .placebo-group").length+" Placebos!");
		}
	}
	function removePlacebo() {
		intId = parseFloat($(this).attr('id').replace('PlaceboButton', ''));
		var inputVal = $('#Placebo'+ intId +'Id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/placebos/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
