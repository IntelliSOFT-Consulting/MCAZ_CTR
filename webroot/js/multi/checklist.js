$(function() {
    $(document).on('click', '#tabs-12 .delete_file_link', delete_file);
    $(document).on('click', '#tabs-12 :input:checkbox', enable_checklist);
    $(document).on('click', '#tabs-12 .add-checklist', add_checklist);
    $(document).on('click', '#tabs-12 .remove_file', function() {$(this).closest('div').remove()});
    var fileOption = '\
        <input type="hidden" id="attachments-{i}-id" class="" name="attachments[{i}][id]" style="display: inline;">\
        <input type="file" id="attachments-{i}-file" name="attachments[{i}][file]" style="display: inline-block;">\
        <span class="help-inline" id="attachments-{i}-help" style="display: inline-block;">   Upload! </span>\
        <button class="btn btn-xs btn-danger remove_file" type="button">&nbsp;<i class="fa fa-trash"></i>&nbsp;</button>\
        <input type="hidden" id="attachments-{i}-model" value="Applications" class="" name="attachments[{i}][model]" style="display: inline;">\
        <input type="hidden" id="attachments-{i}-category" value="{n}" name="attachments[{i}][category]" style="display: inline;">\
        ';
    //if an input is checked and no input file in its control group, trigger add checklist file
    $('#tabs-12 :input:checkbox').each(function() {
        if($(this).is(':checked')) {
            if($(this).closest('div.checkcontrols').next().children().length == 0) {
              $(this).closest('.form-group').find('.add-checklist').click();
            }
        }
    });
    function enable_checklist() {
       if($(this).is(':checked')) {
        intId = $(this).closest('div.checkcontrols').next().children().length;
        name = $(this).closest('div.checkcontrols').next().attr('id');
        group = $(this).closest('div.checkcontrols').next().attr('title');
        if($(this).closest('div.checkcontrols').next().children().length == 0) {
          $(this).closest('div.checkcontrols').next().append('<div>'+
            fileOption.replace(/{n}/g, name).replace(/{i}/g, intId).replace(/{group}/g, group)+'</div>');
        }
        setChecklistUpload();
       } else {
        $(this).closest('div.checkcontrols').next().find('input:file').each( function() {
            $(this).closest('div').remove();
        });
       }
    }

    function delete_file() {
        if(confirm("are you sure you would like to delete this attachment?")) {
          fileThis = $(this);
          intId = parseInt(fileThis.val());
          console.log(intId);
          if (!isNaN(intId)) {
            $.ajax({
            type:'POST',
            url:'/attachments/delete/'+intId+'.json',
            data:{'id': intId},
            success : function(data) {
                if(fileThis.closest('div.checkcontrols').children().length == 1 &&
                         fileThis.closest('.form-group').find('input:checkbox').is(':checked')) {
                    joeyButton = $(fileThis.closest('.form-group').find('.add-checklist')[0]);
                    fileThis.closest('div').remove();
                    joeyButton.click();
                } else {
                    fileThis.closest('div').remove();
                }
            },
            error: function(data) {
                fileThis.closest('div').append('<div class="alert alert-error"> \
                          <a class="close" data-dismiss="alert" href="#">&times;</a> \
                          <p>Sorry! we could not complete this action. Please logout and login again to proceed..</p> </div>');
            }
            });
          } else {
            fileThis.closest('div').append('<div class="alert alert-error"> \
                          <a class="close" data-dismiss="alert" href="#">&times;</a> \
                          <p>Sorry! we could not complete this action. Please logout and login again to proceed</p> </div>');
          }
        }
    }

      function add_checklist() {
          if($(this).closest('.checkbox').find('input:checkbox').is(':not(:checked)')) {
            $(this).closest('.checkbox').find('input:checkbox').prop('checked', 'checked') 
          }
          // console.log($(this).closest('div.checkcontrols').next().find('input:file').length);
          if($(this).closest('div.checkcontrols').next().find('input:file').length) {
            $(this).closest('div.checkcontrols').next().find('input:file, .help-inline').each(function() {
                $(this).effect("highlight", {color: '#99C0DD'}, 3000);
            });
          } else {
            intId = $(this).closest('div.checkcontrols').next().children().length;
            name = $(this).closest('div.checkcontrols').next().attr('id');
            $(this).closest('div.checkcontrols').next().append('<div style="margin-top: 5px; margin-bottom: 5px;">'+
                fileOption.replace(/{n}/g, name).replace(/{i}/g, intId)+'</div>');
            setChecklistUpload();
          }
      }

    setChecklistUpload();
    function setChecklistUpload() {
        $('#tabs-12 :input:file').each(function() {
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
                        <button class="btn btn-xs btn-danger delete_file_link" type="button" value="' + data.result.content[0].id + '">\
                        &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>');
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

});
