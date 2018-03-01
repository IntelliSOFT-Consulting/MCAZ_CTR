$(function() {
    $(document).on('click', '#tabs-16 .remove-row', remove_D_row);
    $(document).on('click', '#tabs-16 .add-D-desc', add_D_desc);

    if ($("#buildDocumentsForm tr").length == 1 ) { $("#documentsTableHeader").hide(); }
    setDocumentUpload();
    function setDocumentUpload() {
      $('#tabs-16 :input:file').each(function() {
          $(this).fileupload({
            dataType: 'json',
            fileInput: $(this),
            add: function (e, data) {
                  data.context = $(this).closest('.control-group');
                  if(!data.context.find('.progress').length) {
                    data.context.append('\
                      <div class="progress progress-striped active" style="width: 85%; margin-top: 5px;"> \
                        <div class="bar" style="width: 0%;"></div> \
                      </div>');
                   }
                  data.context.find('.progress .bar').css('width', '0%');
                  data.submit();
            },
            submit: function (e, data) {
                var fieldData =  new Array();
                fieldData.push({name: $('#ApplicationId').attr('name'), value: $('#ApplicationId').val()});
                data.context.closest('tr').find(':input').each(function() {
                   fieldData.push({name: $(this).attr('name'), value: $(this).val()});
                 });
                data.formData  = fieldData;
                //Don't allow saving records without application id. will result in rogue applications created
                 if(!$('#ApplicationId').val()) {
                    $(this).focus();
                    alert('we have an unexpected problem. please logout and login again.');
                    return false;
                 }
            },
            progress: function (e, data) {
                 var progress = parseInt(data.loaded / data.total * 100, 10);
                 data.context.find('.progress').show().find('.bar').css('width',  progress + '%');
            },
            done: function (e, data) {
                //bad experience of reloading on msie.
                if (/msie/.test(navigator.userAgent.toLowerCase())) {
                          location.reload();
                }
                 if(data.result.message == 'Success') {
                    // data.context.empty();
                    data.context.prepend(' \
                      <a href="/applicant/attachments/download/'+data.result.content.Attachment.id+'" class="btn btn-info"> \
                      '+data.result.content.Attachment.basename+'</a>');
                    // find a way of updating the delete link right hooore.!!!
                    // data.context.find('input[name*="id"]').val(data.result.content.Attachment.id);
                    data.context.find('[name*="id"]').val(data.result.content.Attachment.id);
                    data.context.find('[name*="basename"]').val(data.result.content.Attachment.basename);
                    data.context.find('[name*="dirname"]').val(data.result.content.Attachment.dirname);
                    data.context.find('[name*="checksum"]').val(data.result.content.Attachment.checksum);
                    data.context.closest('tr').find('.remove-row').val(data.result.content.Attachment.id);
                    data.context.closest('tr').find('.add-D-desc').val(data.result.content.Attachment.id);
                    data.context.find('input:file').remove();
                    data.context.find('.progress').fadeOut('slow');
                } else {
                    data.context.append('<div class="alert alert-error"> \
                      <a class="close" data-dismiss="alert" href="#">&times;</a> \
                      <p>'+data.result.errors+'</p> </div>');
                    data.context.find('.progress').fadeOut('slow');
                }
            }
          })
      });
    }
    // incremental development
    $("#addDocument").click(function() {
        $("#documentsTableHeader").show();
        var intId = $("#buildDocumentsForm tr").length - 1;
        if ($('#buildDocumentsForm :input[type="file"]').length < 4) {
            $("#buildDocumentsForm").append(constructDTr(intId));
            setDocumentUpload();
        } else {
            alert("Sorry, cant save more than Four Documents at a time!");
        }
    });
    function constructDTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
        <tr class="fieldwrapper" id="field{i}">\
        <td>{i2}</td>\
        <td><div class="control-group">\
            <input type="hidden" id="Document{i}Model" name="data[Document][{i}][model]" value="Application">\
            <input type="hidden" id="Document{i}Group" name="data[Document][{i}][group]" value="document">\
            <input type="hidden" id="Document{i}Dirname" name="data[Document][{i}][dirname]">\
            <input type="hidden" id="Document{i}Basename" name="data[Document][{i}][basename]">\
            <input type="hidden" id="Document{i}Checksum" name="data[Document][{i}][checksum]">\
            <input type="hidden" id="Document{i}Id" class="" \
                name="data[Document][{i}][id]"><input type="file" id="Document{i}File" class="span12 input-file" \
                name="data[Document][{i}][file]"  data-items="4"  autocomplete="off" >\
        </div></td>\
        <td><div class="control-group"><textarea id="Document{i}Description"  rows="1" \
               name="data[Document][{i}][description]" class="span11"></textarea></div> \
             <button  type="button" class="btn btn-mini add-D-desc tiptip" data-original-title="Save Description">\
                    &nbsp;<i class="icon-plus"></i> Save &nbsp;</button></td>\
        <td><button  type="button" class="btn-mini remove-row tiptip" data-original-title="Remove file">\
                      &nbsp;<i class="icon-minus"></i>&nbsp;</button>\
            </td>';

       $('.tiptip').tooltip();
        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_D_row() {
      deleteButton = $(this);
      if($(this).closest('tr').find('input:file').length == 1) {
          // $(this).closest('tr').remove();
          updateDTr(deleteButton);
      } else {
          if(confirm("are you sure you would like to delete this document?")) {
             fileThis = $(this);
             intId = parseInt(fileThis.val());
             if (!isNaN(intId)) {
                 $.ajax({
                     type:'POST',
                     url:'/attachments/delete/'+intId+'.json',
                     data:{'id': intId},
                     success : function(data) {
                          // fileThis.closest('div').remove();
                          //nimiweka but will definitely update
                          updateDTr(deleteButton);
                     },
                     error: function(data) {
                      fileThis.closest('td').append('<div class="alert alert-error"> \
                                    <a class="close" data-dismiss="alert" href="#">&times;</a> \
                                    <p>Sorry! we could not complete this action. Please logout and login again to proceed..</p> </div>');
                     }
                  });
             } else {
                fileThis.closest('td').append('<div class="alert alert-error"> \
                                <a class="close" data-dismiss="alert" href="#">&times;</a> \
                                <p>Sorry! we could not complete this action. Please logout and login again to proceed</p> </div>');
             }
          }
      }
    }

    function updateDTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          $(this).closest('tr').siblings(function() {
            rowNo = parseInt($(this).find('td:first').text()) - 1;
            intId = rowNo - 1;
            $(this).find('td:first').text(rowNo);
            $(this).find('input').each(function() {
                id = $(this).attr('id');
                name = $(this).attr('name');
                $(this).prop('id', id.replace(/\d+/, intId));
                $(this).prop('name', name.replace(/\d+/, intId));
            });
          })

          $(this).closest('tr').remove();
       });
    };

    function add_D_desc(){
      addDesc = $(this);
      addDescTr = addDesc.closest('tr').children('td:first').next().find('.control-group:first');
      // console.log(addDesc.closest('tr').children('td:first').next());
      intId = parseInt(addDesc.val());
      if (!isNaN(intId)) {
         var data_save = $('#ApplicationId').serializeArray();
         //var value = $('#ApplicationFinalReport').val();
         var textarea = addDesc.closest('td').find('.control-group:first').find('[name*="description"]');
         data_save.push({ name: textarea.attr('name'), value: textarea.val() });
         data_save.push({ name: addDescTr.find('[name*="id"]').attr('name'), value: addDescTr.find('[name*="id"]').val()});
         // data_save.push({name: $('#ApplicationId').attr('name'), value: $('#ApplicationId').val()});

         // console.log(data_save);
        $.ajax({
              url     : $('form').attr('action'),
              type    : $('form').attr('method'),
              dataType: 'json',
              data    : data_save,
              beforeSend: function () {
                $.blockUI({
                  css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                      },
                  message: '<p class="lead"><span><i class="icon-spinner icon-spin"></i> Please wait... </span></p>'
                 });
              },
              success : function( data ) {
                if(data.message == 'Success') {                    
                    // addDescTr.find('[name*="id"]').val(data.content.Attachment.id);
                    addDescTr.closest('tr').find('.add-D-desc').val(data.content.Attachment.id);
                    alert('File description saved!');
                } else {
                    alert('File description NOT saved!!!');
                }
                    
                    // addDesc.remove();
              },
              error   : function( xhr, err ) {
                    alert('Error: Could not save executive summary of the study. Kindly refresh the page.');
              }
          });
     } else {
        addDesc.closest('td').append('<div class="alert alert-error"> \
                        <a class="close" data-dismiss="alert" href="#">&times;</a> \
                        <p>Kindly upload the file before adding a description</p> </div>');
     }

      
    }
});
