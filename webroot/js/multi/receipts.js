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
          setReceiptsUpload();
      } else {
          alert("Sorry, can't add more than "+intId+" Receipts at a time!");
      }
    });

    setReceiptsUpload();
    function setReceiptsUpload() {
        $('#tabs-14 :input:file').each(function() {
            $(this).fileupload({
                url:'/applicant/applications/add-attachments.json',
                //sequentialUploads: true,
                dataType: 'json',
                fileInput: $(this),
                add: function(e, data) {
                    data.context = $(this).closest('div');
                    if (!data.context.find('.progress').length) {
                        data.context.prepend('\
                            <div class="progress pull-right" style="width: 45%;margin-right: 45px;">\
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">\
    <span class="sr-only">45% Complete</span>\
  </div>\
</div>');
                    }
                    data.context.find('.progress .progress-bar').css('width', '0%');
                    data.context.find('span.help-inline').text('Uploading!');
                    data.submit();
                },
                submit: function(e, data) {
                    //console.log('additiona field data');
                    var fieldData = new Array();
                    fieldData.push({ name: 'foreign_key', value: $('#applications-id').val() });
                    data.context.closest('div.checkcontrols').find(':input').each(function() {
                        fieldData.push({ name: $(this).attr('name'), value: $(this).val() });
                    });
                    data.formData = fieldData;
                    //Don't allow saving records without application id. will result in rogue applications created
                    if (!$('#applications-id').val()) {
                        $(this).focus();
                        alert('we have an unexpected problem. please logout and login again.');
                        return false;
                    }
                },
                progress: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    data.context.find('.progress').show().find('.progress-bar').css('width', progress + '%');
                },
                done: function(e, data) {
                    if (/msie/.test(navigator.userAgent.toLowerCase())) {
                        location.reload();
                    }
                    console.log(data);
                    if (data.result.message == 'Success') {
                        data.context.empty();
                        // console.log(data.context.closest('div.checkcontrols').attr('id'));
                        name = data.context.closest('div.checkcontrols').attr('id');
                        cound = data.context.closest('div.checkcontrols').children().length;
                        data.context.prepend(' \
                        <a href="/attachments/download/' + data.result.content[0].id + '" class="btn btn-info"> \
                        ' + data.result.content[0].file + '</a> \
                        <button class="btn btn-xs btn-danger delete_file_input" type="button" value="' + data.result.content[0].id + '">\
                        &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>'+
                        '<input name="receipts['+parseInt(data.context.closest('tr').find('td:first').attr('id'))+                          
                          '][id]" id="receipts-'+parseInt(data.context.closest('tr').find('td:first').attr('id'))+'-id" '+
                          ' value="'+data.result.content[0].id+'"'+
                          'type="hidden">');
                    } else {
                        data.context.append('<div class="alert alert-error"> \
                        <a class="close" data-dismiss="alert" href="#">&times;</a> \
                        <p>' + data.result.errors + '</p> </div>');
                        data.context.find('.progress').fadeOut('slow');
                    }
                },
                fail: function(e, data) {
                    data.context.append('<div class="alert alert-danger alert-dismissible" role="alert">\
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
  <strong>The file is not Valid!</strong> If the file is larger that 4.7MB in size, please compress it to below 4.7MB first.\
  The file may also be split into multiple parts and attached.\
</div>');

                    data.context.find('.progress').fadeOut('slow');
                    data.context.find('span.help-inline').text('Upload!');
                }
            })

        });
     }

    function constructATTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td id="{i}">{i2}</td>\
            <td><div id="receipts" class="checkcontrols" title="receipts"><div style="margin-top: 5px; margin-bottom: 5px;">\
                <input name="attachments[{i}][id]" id="attachments-{i}-id" type="hidden"> \
                <input name="attachments[{i}][file]" id="attachments-{i}-file" type="file"> \
                <span class="help-inline" id="attachments-{i}-help" style="display: inline-block;">   Upload! </span>\
                <input type="hidden" id="attachments-{i}-model" value="Applications" name="attachments[{i}][model]" style="display: inline;">\
                <input type="hidden" id="attachments-{i}-category" value="receipts" name="attachments[{i}][category]" style="display: inline;">\
                </div></div></td>\
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
