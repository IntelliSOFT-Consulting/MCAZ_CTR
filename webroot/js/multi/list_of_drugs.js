$(function() {
    $(document).on('click', '.remove-row', remove_row);
    $(document).on('click', '.remove-cd-row', remove_cd_row);
    $(document).on('click', '#addListOfDrug', reloadStuff);
    $(document).on('click', '#addConcomitantDrug', reloadStuff);

    //console.log("well and truely started");
    //$( "#sadr-list-of-drugs-0-start-date" ).datepicker();
    //Hapa Kazi tu
    var dates = $( "#sadr-list-of-drugs-0-start-date, #sadr-list-of-drugs-0-stop-date" ).datepicker({
      minDate:"-100Y", 
      maxDate:"-0D", 
      dateFormat: "dd-mm-yy", 
      showButtonPanel:true, 
      changeMonth:true, 
      changeYear:true, 
      showAnim:'show',
      onSelect: function( selectedDate ) {
        var option = this.id == "sadr-list-of-drugs-0-start-date" ? "minDate" : "maxDate",
          instance = $( this ).data( "datepicker" ),
          date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings );
        dates.not( this ).datepicker( "option", option, date );
      }
    }); 
    
    reloadStuff();
    function reloadStuff(){
      //console.log('reload stuff called!!');
      var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });
    }

    // incremental development
    $("#addListOfDrug").click(function() {
        var intId = parseInt($("#listofdrugsform tr:last").find('td:first').text())
        //var intId = $("#listofdrugsform tr").length - 1;
        if ($('#listofdrugsform tr').length < 15) {            
            trVar = $.parseHTML(constructLODTr(intId));
            var $options = $("#sadr-list-of-drugs-0-dose-id > option").clone();
            $(trVar).find('[name*="dose_id"]').append($("#sadr-list-of-drugs-0-dose-id > option").clone()).val('');
            $(trVar).find('[name*="route_id"]').append($("#sadr-list-of-drugs-0-route-id > option").clone()).val('');
            $(trVar).find('[name*="frequency_id"]').append($("#sadr-list-of-drugs-0-frequency-id > option").clone()).val('');

            $("#listofdrugsform tbody").append(trVar);
        } else {
            alert("Sorry, can't add more than "+intId+" Drugs at a time!");
        }
    });

    function constructLODTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="sadr_list_of_drugs[{i}][id]" id="sadr-list-of-drugs-{i}-id" type="hidden"> \
                <input class="form-control" name="sadr_list_of_drugs[{i}][drug_name]" id="sadr-list-of-drugs-{i}-drug-name" type="text">  </td>\
            <td>\
                <input class="form-control" name="sadr_list_of_drugs[{i}][brand_name]" id="sadr-list-of-drugs-{i}-brand-name" type="text"> </td>\
            <td>\
                <input class="form-control" name="sadr_list_of_drugs[{i}][batch_number]" maxlength="255" id="sadr-list-of-drugs-{i}-batch-number" type="text"> </td>\
            <td><input class="form-control" name="sadr_list_of_drugs[{i}][dose]" id="sadr-list-of-drugs-{i}-dose" type="text"> </td>\
            <td>\
                 <select class="form-control" name="sadr_list_of_drugs[{i}][dose_id]" id="sadr-list-of-drugs-{i}-dose-id"></select>    </td>\
            <td> <select class="form-control" name="sadr_list_of_drugs[{i}][route_id]" id="sadr-list-of-drugs-{i}-route-id"></select>  </td>\
            <td> <select class="form-control" name="sadr_list_of_drugs[{i}][frequency_id]" id="sadr-list-of-drugs-{i}-frequency-id"></select>     </td>\
            <td> <input class="form-control" name="sadr_list_of_drugs[{i}][indication]" id="sadr-list-of-drugs-{i}-indication" type="text"> </td>\
            <td>\
              <input class="form-control date-pick-from" name="sadr_list_of_drugs[{i}][start_date]" id="sadr-list-of-drugs-{i}-start-date" type="text">   </td>\
            <td>\
              <input class="form-control date-pick-to" name="sadr_list_of_drugs[{i}][stop_date]" id="sadr-list-of-drugs-{i}-stop-date" type="text">  </td>\
            <td>\
              <input class="form-control" name="sadr_list_of_drugs[{i}][suspected_drug]" type="hidden">\
              <input name="sadr_list_of_drugs[{i}][suspected_drug]" type="checkbox">                    </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-row"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_row() {
      //deleteButton = $(this);
      //console.log($(this).val());
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          // beforeSend:function(request) {$('#loading').show();}, 
          // complete:function(request, json) {$('#post7').html(request.responseText); 
          // $('#loading').hide()}, 
          url:'/sadr-list-of-drugs/delete.json',
          data:{'id': $(this).val(), 'sadr_id': $('#sadr_pr_id').text()}, //Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLODTr($(this));        
      
    }

    function updateLODTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          // $(this).closest('tr').siblings(function() {
          //   rowNo = parseInt($(this).find('td:first').text()) - 1;
          //   intId = rowNo - 1;
          //   $(this).find('td:first').text(rowNo);
          //   $(this).find('input').each(function() {
          //       id = $(this).attr('id');
          //       name = $(this).attr('name');
          //       $(this).prop('id', id.replace(/\d+/, intId));
          //       $(this).prop('name', name.replace(/\d+/, intId));
          //   });
          // })

          $(this).closest('tr').remove();
       });
    };
    
    //Concomitant drugs
    $("#addConcomitantDrug").click(function() {
        if($("#tableotherdrugs tr").length > 0) {
          var intId = parseInt($("#tableotherdrugs tr:last").find('td:first').text())
        } else {
          var intId = 0;
        }

        if ($('#tableotherdrugs tr').length < 15) {            
            trVar = $.parseHTML(constructCDTr(intId));
            $("#tableotherdrugs tbody").append(trVar);
        } else {
            alert("Sorry, can't add more than "+intId+" concomittant drugs at a time!");
        }
    });

    function constructCDTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="sadr_other_drugs[{i}][id]" id="sadr-other-drugs-{i}-id" type="hidden">\
                <input class="form-control" name="sadr_other_drugs[{i}][drug_name]" id="sadr-other-drugs-{i}-drug-name" type="text"> </td> \
            <td>\
               <input class="form-control date-pick-to" name="sadr_other_drugs[{i}][start_date]" id="sadr-other-drugs-{i}-start-date" type="text"> </td>\
            <td> \
               <input class="form-control date-pick-to" name="sadr_other_drugs[{i}][stop_date]" id="sadr-other-drugs-{i}-stop-date" type="text"> </td>\
            <td> \
               <input class="form-control" name="sadr_other_drugs[{i}][suspected_drug]" type="hidden">\
               <input name="sadr_other_drugs[0][suspected_drug]" value="1" templates="table_form" type="checkbox">  </td>\
            <td><button type="button" class="btn btn-default remove-cd-row">\
                   <i class="fa fa-minus"></i>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_cd_row() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/sadr-other-drugs/delete.json',
          data:{'id': $(this).val(), 'sadr_id': $('#sadr_pr_id').text()}, //Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateCDTr($(this));        
      
    }

    function updateCDTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          // $(this).closest('tr').siblings(function() {
          //   rowNo = parseInt($(this).find('td:first').text()) - 1;
          //   intId = rowNo - 1;
          //   $(this).find('td:first').text(rowNo);
          //   $(this).find('input').each(function() {
          //       id = $(this).attr('id');
          //       name = $(this).attr('name');
          //       $(this).prop('id', id.replace(/\d+/, intId));
          //       $(this).prop('name', name.replace(/\d+/, intId));
          //   });
          // })

          $(this).closest('tr').remove();
       });
    };

});
