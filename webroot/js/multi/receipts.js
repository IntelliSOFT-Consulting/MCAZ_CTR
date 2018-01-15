$(function() {
    $(document).on('click', '.remove-receipt', remove_receipt);
    // $(document).on('click', '#addReceipt', reloadLabTests);


    // incremental development
    $("#addReceipt").click(function() {
      if ($("#receiptsTable tbody tr").length > 0) {
        var intId = parseInt($("#receiptsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#receiptsTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructATTr(intId));
          $("#receiptsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Receipts at a time!");
      }
    });

    function constructATTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input name="receipts[{i}][id]" id="receipts-{i}-id" type="hidden"> \
                <input name="receipts[{i}][file]" id="receipts-{i}-file" type="file"> </td>\
                <input type="hidden" id="receipts-{i}-model" value="Applications" name="receipts[{i}][model]" style="display: inline;">\
                <input type="hidden" id="receipts-{i}-category" value="receipts" name="receipts[{i}][category]" style="display: inline;">\
            <td>\
                <textarea name="receipts[{i}][description]" id="receipts-{i}-description" rows="1" cols="30"></textarea> </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-receipt"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_receipt() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/attachments/delete.json',
          data:{'id': $(this).val(), 'attachment_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
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
