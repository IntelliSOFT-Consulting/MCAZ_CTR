$(function() {
    $(document).on('click', '.remove-participant', remove_participant);
    $(document).on('click', '#addParticipant', reloadParticipants);
    $(document).on('click', '.updateCheckboxes', updateCheckboxes);
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
            yearRange: "-100Y:+0",
        showAnim:'show'
      });

      var dates3 = 0;     //TODO:search for date time fields and use
      $('.datetime-field').datetimepicker({
        minDate:"-100Y", maxDate:"+5Y", 
        format: 'd-m-Y H:i'
      });

    }
    function updateCheckboxes() {
        //get all checkboxes only in this group
        var checkboxes = $("#participantsTable").find('input[type="checkbox"]');
        var checked = [];
        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                checked.push($(this).val()); 
                $(this).val(1);
            } else {
                checked.push($(this).val());
                $(this).val(0);
            }
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
        //   call updateCheckboxes() to update checkboxes
        updateCheckboxes();
      } else {
          alert("Sorry, can't add more than "+intId+" GMP Compliances at a time!");
      }
    });

    function constructLABTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td>\
                <input class="form-control" name="compliance[{i}][site_name]" id="compliance-{i}-site_name" type="text">  </td>\
            <td>\
                <input class="form-control" name="compliance[{i}][site_function]" id="compliance-{i}-site_function" type="text"> </td>\
            <td>\
                <input class="updateCheckboxes" name="compliance[{i}][valid_license]" id="compliance-{i}-valid_license" type="checkbox"> Yes</td>\
            <td>\
              <input class="form-control " name="compliance[{i}][comment]" id="compliance-{i}-comment" type="text">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-participant"><i class="fa fa-trash-o"></i> </button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_participant() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/compliance/delete/'+$(this).val()+'.json',
          data:{'id': $(this).val(), 'adr_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
          success : function(data) {
             console.log('Success' +data);
          },
          error: function(xhr, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' ' + errorThrown);
          }
        }); 
      } else{
        console.log('Error: ' );
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