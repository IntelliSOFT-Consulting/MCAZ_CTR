$(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    var intId = 0;
    var trWrapper = '\
          <div class="row attacho">\
            <div class="col-xs-10"><input name="attachments[{i}][id]" id="attachments-{i}-id" type="hidden"> \
                <input name="attachments[{i}][file]" id="attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="attachments-{i}-model" value="Comments" name="attachments[{i}][model]" style="display: inline;">\
                <input type="hidden" id="attachments-{i}-category" value="{n}" name="attachments[{i}][category]" style="display: inline;">\
                <textarea name="attachments[{i}][description]" id="attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    // incremental development
    $(".addUpload").click(function() {
      intId = intId + 1;
      //console.log($(this).closest('form').find('input[name="model"]').val());
      //console.log($(this).closest('form').find('#model').val());
      name = $(this).closest('form').find('input[name="model"]').val();

      if ($(this).closest('div.uploadsTable').children('div.attacho').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{n}/g, name));
          $(this).closest("div.uploadsTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Attachments at a time!");
      }
    });

    function remove_attachment() {
      $(this).closest('.attacho').remove();        
    }
    

});
