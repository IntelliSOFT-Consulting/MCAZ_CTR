$(function() {
    $(document).on('click', '.remove-vaccine', remove_vaccine);
    $(document).on('click', '.remove-diluent', remove_diluent);
    $(document).on('click', '#addAefiVaccine', reloadVaccines);
    $(document).on('click', '#addAefiDiluent', reloadVaccines);

    //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadVaccines();
    function reloadVaccines(){
      console.log('reload stuff called!!');
      var dates2 = $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
            yearRange: "-100Y:+0",
        showAnim:'show'
      });

      var dates3 = 0;     //TODO:search for date time fields and use
      $('.datetime-field').datetimepicker({
        format: 'd-m-Y H:i'
      });

    }


    // incremental development
    $("#addAefiVaccine").click(function() {
      //console.log($("#listOfVaccinesTable tbody tr").length);

      if ($("#listOfVaccinesTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfVaccinesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfVaccinesTable tr").length - 1;
      if ($('#listOfVaccinesTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructLOVTr(intId));
          $("#listOfVaccinesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Vaccines at a time!");
      }
    });

    function constructLOVTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="aefi_list_of_vaccines[{i}][id]" id="aefi-list-of-vaccines-{i}-id" type="hidden"> \
                <input class="form-control" name="aefi_list_of_vaccines[{i}][vaccine_name]" id="aefi-list-of-vaccines-{i}-vaccine-name" type="text">  </td>\
            <td>\
                <input class="form-control datetime-field" name="aefi_list_of_vaccines[{i}][vaccination_date]" id="aefi-list-of-vaccines-{i}-vaccination-date" type="text"> </td>\
            <td>\
                <input class="form-control" name="aefi_list_of_vaccines[{i}][dosage]" id="aefi-list-of-vaccines-{i}-dosage" type="text">  </td>\
            <td>\
                <input class="form-control" name="aefi_list_of_vaccines[{i}][batch_number]" maxlength="255" id="aefi-list-of-vaccines-{i}-batch-number" type="text"> </td>\
            <td>\
              <input class="form-control date-pick-field" name="aefi_list_of_vaccines[{i}][expiry_date]" id="aefi-list-of-vaccines-{i}-expiry-date" type="text">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-vaccine"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_vaccine() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/aefi-list-of-vaccines/delete.json',
          data:{'id': $(this).val(), 'aefi_id': $('#aefi_pr_id').text()}, //TODO:Use this to ensure the sadr belongs to the user
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
    
    //Diluents 
    $("#addAefiDiluent").click(function() {
      if ($("#listOfDiluentsTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfDiluentsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#listOfDiluentsTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructLDTr(intId));
          $("#listOfDiluentsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Diluents at a time!");
      }
    });

    function constructLDTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="aefi_list_of_diluents[{i}][id]" id="aefi-list-of-diluents-{i}-id" type="hidden"> \
                <input class="form-control" name="aefi_list_of_diluents[{i}][diluent_name]" id="aefi-list-of-diluents--{i}-diluent-name" type="text">  </td>\
            <td>\
                <input class="form-control datetime-field" name="aefi_list_of_diluents[{i}][diluent_date]" id="aefi-list-of-diluents-{i}-diluent-date" type="text"> </td>\
            <td>\
                <input class="form-control" name="aefi_list_of_diluents[{i}][batch_number]" id="aefi-list-of-diluents-{i}-batch-number" type="text">  </td>\
            <td>\
              <input class="form-control date-pick-field" name="aefi_list_of_diluents[{i}][expiry_date]" id="aefi-list-of-diluents-{i}-expiry-date" type="text">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-diluent"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_diluent() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/aefi-list-of-diluents/delete.json',
          data:{'id': $(this).val(), 'aefi_id': $('#aefi_pr_id').text()}, //TODO:Use this to ensure the aefi belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLDTr($(this));         
    }

    function updateLDTr(myobj){
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
