$(function() {
	// Multi Dates Handling
	$("#addPreviousDates").on("click", addPreviousDate);
	$(document).on('click', '.removePreviousDate', removePrevDate);
	// Multi Dates Handling
	function addPreviousDate() {
		var se = $("#previousDates .control-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('removeDate', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#previousDates .control-group").length < 9) {
			// console.log('intId = '+intId);
			var newDate = $('<div class="control-group"> <label class="control-label"></label><div class="controls"> \
							<input type="text" id="PreviousDate'+ intId +'DateOfPreviousProtocol" class="datepickers" \
							name="data[PreviousDate]['+ intId +'][date_of_previous_protocol]"><span class="help-inline"> format (dd-mm-yyyy) \
							<button title="Remove Date" id="removeDate'+ intId +'" class="btn btn-mini btn-danger removePreviousDate" \
							type="button">&nbsp;<i class="icon-trash"></i>&nbsp;</button> Remove Date \
							</span> </div></div>');
			$("#previousDates").append(newDate);
		} else {
			alert("Sorry, cant add more than "+$("#previousDates .control-group").length+" previous protocol dates!");
		}

		$( ".datepickers" ).datepicker({
			minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
			buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
		});
	}
	function removePrevDate() {
		intId = parseFloat($(this).attr('id').replace('removeDate', ''));
		var inputVal = $('#PreviousDate'+ intId +'Id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/previous_dates/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().parent().remove();
	}
});
