$(function() {
    $(document).on('click', '.remove-info-file', remove_info_file);
    var intId = 0;
    var trWrapper = '\
          <div class="row ariba">\
            <div class="col-xs-10"><input name="{p}[attachments][{i}][id]" id="{p}-attachments-{i}-id" type="hidden"> \
                <input name="{p}[attachments][{i}][file]" id="{p}-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="{p}-attachments-{i}-model" value="{n}" name="{p}[attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="{p}-attachments-{i}-category" value="{n}" name="{p}[attachments][{i}][category]" style="display: inline;">\
                <textarea name="{p}[attachments][{i}][description]" id="{p}-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\  ';
    // incremental development
    $(".addInfoFile").click(function() {
      intId = intId + 1;
      //console.log($(this).closest('form').find('input[name="model"]').val());
      //console.log($(this).closest('form').find('#model').val());
      // name = $(this).closest('form').find('input[name="model"]').val();
      name = 'RequestInfos';
      pre = 'request_infos[100]'

      if ($(this).closest('div.infoFilesTable').children('div.ariba').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{n}/g, name).replace(/{p}/g, pre));
          $(this).closest("div.infoFilesTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Attachments at a time!");
      }
    });

    function remove_info_file() {
      $(this).closest('.ariba').remove();        
    }
    

});
