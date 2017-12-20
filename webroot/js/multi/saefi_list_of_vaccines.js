$(function() {
    $(document).on('click', '.remove-vaccination', remove_vaccination);

    // incremental development
    $("#addSaefiVaccine").click(function() {
      
      if ($("#saefiListOfVaccinesTable tbody tr").length > 0) {
        var intId = parseInt($("#saefiListOfVaccinesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#saefiListOfVaccinesTable tr").length - 1;
      if ($('#saefiListOfVaccinesTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructSLOVTr(intId));
          $("#saefiListOfVaccinesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Vaccinations at a time!");
      }
    });

    function constructSLOVTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="saefi_list_of_vaccines[{i}][id]" id="aefi-list-of-vaccines-{i}-id" type="hidden"> \
                <input class="form-control" name="saefi_list_of_vaccines[{i}][vaccine_name]" id="aefi-list-of-vaccines-{i}-vaccine-name" type="text">  </td>\
            <td>\
                <input class="form-control" name="saefi_list_of_vaccines[{i}][vaccination_doses]" id="aefi-list-of-vaccines-{i}-vaccination-doses" type="number"> </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-vaccination"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_vaccination() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/saefi-list-of-vaccines/delete.json',
          data:{'id': $(this).val(), 'aefi_id': $('#saefi_pr_id').text()}, //TODO:Use this to ensure the aefi belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLOVTr($(this));         
    }

    function updateLOVTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          $(this).closest('tr').remove();
       });
    };

});
