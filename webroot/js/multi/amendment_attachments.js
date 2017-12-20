$(function() {
        $("#addAttachment").click(function() {
        $("#attachmentsTableHeader").show();
            var intId = $("#buildattachmentsform tr").length - 1;
        if ($('#buildattachmentsform :input[type="file"]').length < 4) {
          $("#buildattachmentsform").append(constructATr(intId));
        } else {
          alert("Sorry, cant save more than Four Attachments at a time!");
        }
        });
      if ($("#buildattachmentsform tr").length == 1 ) { $("#attachmentsTableHeader").hide(); }

      $(".removeATr").tooltip();
      $(".removeATr").click(function() {
        if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
          $.ajax({
            async:true, type:'POST',
            url:'/attachments/delete/'+$(this).attr('id')+'.json',
            data:{'id': $(this).attr('id')},
            success : function(data) {
              // console.log(data);
            }
          });
        }
        updateATr($(this));
        });

      function constructATr(intId, field1) {
        var intId2 = intId + 1;
        var fieldWrapper = $("<tr class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var faName = $('<td>' + intId2 + '</td>');
        var model = $('<input type="hidden" id="Attachment' + intId + 'Model" name="data[Attachment][' + intId + '][model]" value="Amendment">');
        var group = $('<input type="hidden" id="Attachment' + intId + 'Group" name="data[Attachment][' + intId + '][group]" value="attachment">');
        var mimetype = $('<input type="hidden" id="Attachment' + intId + 'Dirname" name="data[Attachment][' + intId + '][dirname]">');
        var filesize = $('<input type="hidden" id="Attachment' + intId + 'Basename" name="data[Attachment][' + intId + '][basename]">');
        var dir = $('<input type="hidden" id="Attachment' + intId + 'Checksum" name="data[Attachment][' + intId + '][checksum]">');
        var filename = $('<td><div class="control-group"><input type="file" id="Attachment' + intId + 'File" class="span12 autosave-ignore input-file" name="data[Attachment][' + intId + '][file]"  data-items="4"  autocomplete="off" ></div></td>');
        var description = $('<td><div class="control-group"><textarea id="Attachment' + intId + 'Description"  rows="1" cols="30" name="data[Attachment][' + intId + '][description]" class="span11 autosave-ignore"></textarea></div></td>');
            var removeButton_ = $('<button  type="button" class="btn-mini">&nbsp;<i class="icon-minus"></i>&nbsp;</button>"');
        removeButton_.tooltip();
            removeButton_.click(function() {
          if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
            $.ajax({
              url:'/attachments/delete/'+$(this).attr('id')+'.json',
              type:'POST',
              async:true,
              data:{'id': $(this).attr('id')},
              success : function(data) {
                // console.log(data);
              }
            });
          }
          updateATr($(this));
            });
        // var removeButton = $('<td/>').append(removeButton_);
        var removeButton = $('<td/>').append(mimetype);
        removeButton.append(filesize);
        removeButton.append(dir);
        removeButton.append(model);
        removeButton.append(group);
        removeButton.append(removeButton_);
            fieldWrapper.append(faName);
            fieldWrapper.append(filename);
            fieldWrapper.append(description);
            fieldWrapper.append(removeButton);

        return fieldWrapper;
      }

      function updateATr(myobj){
        myobj.tooltip('hide');

        myobj
         .parent()
         .parent()
         .find('td')
         .wrapInner('<div style="display: block;" />')
         .parent()
         .find('td > div')
         .slideUp(300, function(){
            $(this).parent().parent().nextAll().each(function() {
              no = parseInt($(this).text())-1;
              intId = parseInt($(this).text())-2;
              $($(this).children().get(0)).text(no);
              $(this).prop('id', 'field' + intId );
              $($(this).children().get(1)).find('input').prop('id', 'Attachment' + intId + 'File');
              $($(this).children().get(1)).find('input').prop('name', 'data[Attachment][' + intId + '][file]');
              $($(this).children().get(2)).find('textarea').prop('id', 'Attachment' + intId + 'Description');
              $($(this).children().get(2)).find('textarea').prop('name', 'data[Attachment][' + intId + '][description]');

              $($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Dirname');
              $($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][dirname]');
              $($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Basename');
              $($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][basename]');
              $($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Checksum');
              $($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][checksum]');
              $($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Model');
              $($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][model]');
              $($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Group');
              $($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][group]');

              var field1 = $($(this).children().get(1)).find('input').val();
            });
            $(this).parent().parent().remove();
         });
      };
});
