$(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    // $(document).on('click', '#addAttachment', reloadLabTests);


    // incremental development
    $("#addAttachment").click(function() {
      if ($("#attachmentsTable tbody tr").length > 0) {
        var intId = parseInt($("#attachmentsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#attachmentsTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructATTr(intId));
          $("#attachmentsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Attachments at a time!");
      }
    });

    function constructATTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input name="attachments[{i}][id]" id="attachments-{i}-id" type="hidden"> \
                <input name="attachments[{i}][file]" id="attachments-{i}-file" type="file"> </td>\
                <input type="hidden" id="attachments-{i}-model" value="Applications" name="attachments[{i}][model]" style="display: inline;">\
                <input type="hidden" id="attachments-{i}-category" value="attachments" name="attachments[{i}][category]" style="display: inline;">\
            <td>\
                <textarea name="attachments[{i}][description]" id="attachments-{i}-description" rows="1" cols="30"></textarea> </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-attachment"><i class="fa fa-minus"></i></button> </td>\
            <td>\
                <button type="button" class="btn btn-primary btn-sm send-attachment"><i class="fa fa-save"></i></button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_attachment() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/attachments/delete.json',
          data:{'id': $(this).val(), 'application_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateATTr($(this));         
    }

    function updateATTr(myobj){
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
