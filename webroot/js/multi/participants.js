$(function() {
    $(document).on('click', '.remove-participant', remove_participant);
    $(document).on('click', '#addParticipant', reloadParticipants);

    //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadParticipants();
    function reloadParticipants(){
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
        minDate:"-100Y", maxDate:"+5Y", 
        format: 'd-m-Y H:i'
      });

    }

    // incremental development
    $("#addParticipant").click(function() {
      if ($("#participantsTable tbody tr").length > 0) {
        var intId = parseInt($("#participantsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#participantsTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructLABTr(intId));
          $("#participantsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Lab Tests at a time!");
      }
    });

    function constructLABTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="participants[{i}][id]" id="participants-{i}-id" type="hidden"> \
                <input class="form-control" name="participants[{i}][name]" id="participants-{i}-name" type="text">  </td>\
            <td>\
                <input class="form-control" name="participants[{i}][occupation]" id="participants-{i}-occupation" type="text"> </td>\
            <td>\
                <input class="form-control" name="participants[{i}][address]" id="participants-{i}-address" type="text"> </td>\
            <td>\
              <input class="form-control date-pick-field" name="participants[{i}][date_of_birth]" id="participants-{i}-date-of-birth" type="text">   </td>\
            <td>\
                <input class="form-control" name="participants[{i}][place_of_birth]" id="participants-{i}-place-of-birth" type="text"> </td>\
            <td>\
              <input name="participants[{i}][file]" id="participants-{i}-file" type="file">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-participant"><i class="fa fa-minus"></i> </button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_participant() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/participants/delete.json',
          data:{'id': $(this).val(), 'adr_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLABTr($(this));         
    }

    function updateLABTr(myobj){
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