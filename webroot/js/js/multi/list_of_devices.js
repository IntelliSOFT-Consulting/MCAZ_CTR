$(function() {
    $(document).on('click', '.remove-device', remove_device);
    $(document).on('click', '.remove-concomitant', remove_concomitant);
    $(document).on('click', '#addListOfDevice', reloadDevices);
    $(document).on('click', '#addAdrConcomitant', reloadDevices);

    //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadDevices();
    function reloadDevices(){
      // console.log('reload stuff called!!');
      var dates2 = $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      var dates3 = 0;     //TODO:search for date time fields and use
      $('.datetime-field').datetimepicker({
        format: 'd-m-Y H:i'
      });

    }


    // incremental development
    $("#addListOfDevice").click(function() {
      if ($("#listOfDevicesTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfDevicesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#listOfDevicesTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructALODTr(intId));
          $(trVar).find('[name*="dose_id"]').append($("#adr-list-of-drugs-0-dose-id > option").clone()).val('');
          $(trVar).find('[name*="route_id"]').append($("#adr-list-of-drugs-0-route-id > option").clone()).val('');
          $(trVar).find('[name*="frequency_id"]').append($("#adr-list-of-drugs-0-frequency-id > option").clone()).val('');
          $(trVar).find('[name*="relationship_to_sae"]').append($("#adr-list-of-drugs-0-relationship-to-sae > option").clone()).val('');
          $("#listOfDevicesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Drugs at a time!");
      }
    });

    function constructALODTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="adr_list_of_drugs[{i}][id]" id="adr-list-of-drugs-{i}-id" type="hidden"> \
                <input class="form-control" name="adr_list_of_drugs[{i}][drug_name]" id="adr-list-of-drugs-{i}-drug-name" type="text">  </td>\
            <td>\
                <input class="form-control" name="adr_list_of_drugs[{i}][dosage]" id="adr-list-of-drugs-{i}-dosage" type="text"> </td>\
            <td>\
                 <select class="form-control" name="adr_list_of_drugs[{i}][dose_id]" id="adr-list-of-drugs-{i}-dose-id"></select>    </td>\
            <td> <select class="form-control" name="adr_list_of_drugs[{i}][route_id]" id="adr-list-of-drugs-{i}-route-id"></select>  </td>\
            <td> <select class="form-control" name="adr_list_of_drugs[{i}][frequency_id]" id="adr-list-of-drugs-{i}-frequency-id"></select>     </td>\
            <td>\
              <input class="form-control date-pick-field" name="adr_list_of_drugs[{i}][start_date]" id="adr-list-of-drugs-{i}-start-date" type="text">   </td>\
            <td>\
              <div class="input radio"> <input class="form-control" name="adr_list_of_drugs[{i}][taking_drug]" value="" type="hidden">\
              <label for="adr-list-of-drugs-{i}-taking-drug-yes">\
              <input class="radio-inline" name="adr_list_of_drugs[{i}][taking_drug]" value="Yes" id="adr-list-of-drugs-{i}-taking-drug-yes" type="radio">Yes</label>\
              <label for="adr-list-of-drugs-{i}-taking-drug-no"><input class="radio-inline" name="adr_list_of_drugs[{i}][taking_drug]" value="No" id="adr-list-of-drugs-{i}-taking-drug-no" type="radio">No</label> </div>\
            </td>\
            <td>\
             <select class="form-control" name="adr_list_of_drugs[{i}][relationship_to_sae]" id="adr-list-of-drugs-{i}-relationship-to-sae"></select> \
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-device"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_device() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/adr-list-of-drugs/delete.json',
          data:{'id': $(this).val(), 'adr_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateALODTr($(this));         
    }

    function updateALODTr(myobj){
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
    
    //Concomitant medication 
    $("#addAdrConcomitant").click(function() {
      if ($("#listOfConcomitantTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfConcomitantTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#listOfConcomitantTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructALCTr(intId));
          $(trVar).find('[name*="relationship_to_sae"]').append($("#adr-list-of-drugs-0-relationship-to-sae > option").clone()).val('');
          $("#listOfConcomitantTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" medications at a time!");
      }
    });

    function constructALCTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="adr_other_drugs[{i}][id]" id="adr-other-drugs-{i}-id" type="hidden"> \
                <input class="form-control" name="adr_other_drugs[{i}][drug_name]" id="adr-other-drugs--{i}-drug-name" type="text">  </td>\
            <td>\
                <input class="form-control date-pick-field" name="adr_other_drugs[{i}][start_date]" id="adr-other-drugs-{i}-start-date" type="text"> </td>\
            <td>\
                <input class="form-control date-pick-field" name="adr_other_drugs[{i}][stop_date]" id="adr-other-drugs-{i}-stop-date" type="text"> </td>\
            <td>\
             <select class="form-control" name="adr_other_drugs[{i}][relationship_to_sae]" id="adr-other-drugs-{i}-relationship-to-sae"></select> \
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-concomitant"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_concomitant() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/adr-other-drugs/delete.json',
          data:{'id': $(this).val(), 'adr_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the sadr belongs to the user
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
