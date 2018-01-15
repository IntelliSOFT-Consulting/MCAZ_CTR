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
                <p  class="topper" id="MedicineDetailLabel{i}">{i} additional medicines</p> \
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
                      <div class="controls"><button type="button" id="medicinesButton{i}" class="btn btn-xs btn-danger removemedicines"><i class="fa fa-trash-o"></i> Remove Medicine</button></div> \
                  <hr id="MedicineDetailHr{i}"> </div>'.replace(/{i}/g, intId));
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
