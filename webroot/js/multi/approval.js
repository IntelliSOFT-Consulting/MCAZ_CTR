$(function() {
     $(document).ajaxStop($.unblockUI);

     toggleApproval();
     // $('.add-approval').attr('disabled', 'disabled');
     function toggleApproval() {
        $('table .add-approval').each(function() {
            if($(this).closest('tr').find('input:file').length){
              $(this).attr('disabled', 'disabled');
            } else {
              $(this).removeAttr('disabled');
            }
        });
     }
     setUpload();
     function setUpload() {
      $('input:file').fileupload({
          dataType: 'json',
          formData: function(form){
              var fieldData =  new Array();
              fieldData.push({
                name: $('#ApplicationId').attr('name'),
                value: $('#ApplicationId').val()
              });
              $('#'+$(this.fileInput[0]).attr('id')).closest('tr').find(':input').each(function() {
                fieldData.push({name: $(this).attr('name'), value: $(this).val()});
              });
              return fieldData;
          },
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
          send: function (e, data) {
              if($('#ApplicationId').val()) {
                return true;
              }
              return false;
          },
          done: function (e, data) {
            if(data.result.message == 'Success') {
                $(this).closest('td').prepend('<div style="margin-bottom: 5px;"> \
                  <a href="/applicant/attachments/download/'+data.result.content.Attachment.id+'" class="btn btn-info"> \
                  '+data.result.content.Attachment.basename+'</a> \
                  <small class="muted">- '+data.result.content.Attachment.created+'</small> \
                  <button id="AnnualApproval'+data.result.content.Attachment.id+'" type="button" style="margin-left:10px;" \
                            class="btn btn-mini btn-danger delete_file_link">&nbsp;<i class="icon-trash"></i>&nbsp;</button></div>');
                closestTd = $(this).closest('td');
                $(this).remove();
                toggleApproval();
                closestTd.find('.progress').fadeOut('slow');
            } else {
                $(this).closest('td').append('<div class="alert alert-error"> \
                  <a class="close" data-dismiss="alert" href="#">&times;</a> \
                  <p>'+data.result.errors+'</p> </div>');
                $(this).closest('td').find('.progress').fadeOut('slow');
            }

          },
          progress: function (e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
              // console.log();
              $('#'+$(this).attr('id')).closest('td').find('.progress').show().find('.bar').css(
                  'width',
                  progress + '%'
                );
                // $('#'+$(this).attr('id')).closest('td').find('.progress').fadeOut('slow');
          }
      });

    }

      //Set the date
      lastDate = new Date();
       $('.kayear').datepicker({
          format: " yyyy",
          minViewMode: "years",
          startDate: '2000',
          endDate: '-1y',
          autoclose: true
      });
      yearset();
      $('.kayear').change(yearset);

      function yearset() {
          if ($('.approvalyear').val() != $('.kayear').val()) {
            $('.kayear').closest('table').find('input[name*="year"]').each(function() {
                $(this).val($('.kayear').val());
            });
          }
      }

    $('.add-approval').click(function(){
      if($(this).closest('td').prev().find('input:file').length) {
        alert('Please upload the current file before adding another one');
      } else {
          var fileId = parseInt($(this).closest('tr').find('input[name*="model"]').attr('id').match(/\d+/g), 10);
          if(!isNaN(fileId)) {

            var fileInput = '<input type="file" id="AnnualApproval'+fileId+'File" class="span12 input-file" \
            name="data[AnnualApproval]['+fileId+'][file]">';
            $(this).closest('td').prev().append(fileInput);
            setUpload();
          } else {
            alert('We have slight problem. Please refresh this page');
          }
      }
    });

    // $(".delete_file_link").on("click", delete_file);
    $(document).on('click', '.delete_file_link', delete_file);
    function delete_file() {
    if(confirm("are you sure you would like to delete this attachment?")) {
      intId = parseInt($(this).attr('id').replace(/\D/g, ''));
      name = $(this).attr('id').replace(/\d/g, '');
      if (intId) {
        $.ajax({
          type:'POST',
          url:'/attachments/delete/'+intId+'.json',
          data:{'id': intId},
          success : function(data) {
            // console.log(data);
          }
        });
      }
      $(this).parent('div').remove();
    }
  }
});
