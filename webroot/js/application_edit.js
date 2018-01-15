  $(function() {
    $(document).on('click', '.container .delete_file_input', delete_file_input);
    $(document).on('click', '.container .add-fileinput', add_fileinput);
    $(document).on('click', '.container .remove_file_input', function() {$(this).closest('div').remove()});

    var fileOption = '\
        <input type="hidden" id="attachments-{i}-id" class="" name="attachments[{i}][id]" style="display: inline;">\
        <input type="file" id="attachments-{i}-file" name="attachments[{i}][file]" style="display: inline-block;">\
        <span class="help-inline" id="attachments-{i}-help" style="display: inline-block;">   Upload! </span>\
        <button class="btn btn-xs btn-danger remove_file_input" type="button">&nbsp;<i class="fa fa-trash"></i>&nbsp;</button>\
        <input type="hidden" id="attachments-{i}-model" value="Applications" class="" name="attachments[{i}][model]" style="display: inline;">\
        <input type="hidden" id="attachments-{i}-category" value="{n}" name="attachments[{i}][category]" style="display: inline;">\
        ';

    $( "#tabs" ).tabs({
      /*active   : Cookies.get('activetab'),
      activate : function( event, ui ){
          Cookies.set( 'activetab', ui.newTab.index(),{
              expires : 10
          });
      }*/
    });

    $( ".datepickers" ).datepicker({
      minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
      buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
    });


    // CKEDITOR.replace( 'data[Application][study_title]' );
    CKEDITOR.replace( 'drug_details' );
    CKEDITOR.replace( 'ethic_considerations' );
    CKEDITOR.replace( 'safety' );
    CKEDITOR.replace( 'participants_description' );
    CKEDITOR.replace( 'participants_justification' );
    CKEDITOR.replace( 'countries_recruitment' );
    CKEDITOR.replace( 'abstract-of-study');
    CKEDITOR.replace( 'principal-inclusion-criteria');
    CKEDITOR.replace( 'principal-exclusion-criteria');
    CKEDITOR.replace( 'primary-end-points');
    // CKEDITOR.replace( 'data[Application][staff_numbers]');
    CKEDITOR.replace( 'other-details-explanation');
    CKEDITOR.replace( 'notification');
    
    function add_fileinput() {
        if ($(this).closest('div.checkcontrols').find('input:file').length) {
            $(this).closest('div.checkcontrols').find('input:file, .help-inline').each(function() {
                $(this).effect("highlight", { color: '#99C0DD' }, 3000);
            });
        } else {
            intId = $(this).closest('div.checkcontrols').children().length;
            name = $(this).closest('div.checkcontrols').attr('id');
            $(this).closest('div.checkcontrols').append('<div style="margin-top: 5px; margin-bottom: 5px;">' +
                fileOption.replace(/{n}/g, name).replace(/{i}/g, intId) + '</div>');
            setFileUpload();
        }
    }
    setFileUpload();
    function setFileUpload() {
        $('.container :input:file').each(function() {
            $(this).fileupload({
                url:'/applicant/applications/add-attachments.json',
                //sequentialUploads: true,
                dataType: 'json',
                fileInput: $(this),
                add: function(e, data) {
                    data.context = $(this).closest('div');
                    if (!data.context.find('.progress').length) {
                        data.context.prepend('\
                            <div class="progress progress-striped active pull-right" style="width: 45%; margin-right: 45px;"> \
                            <div class="bar" style="width: 0%;"></div> \
                        </div>');
                    }
                    data.context.find('.progress .bar').css('width', '0%');
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
                    data.context.find('.progress').show().find('.bar').css('width', progress + '%');
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
                        &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>');
                    } else {
                        data.context.append('<div class="alert alert-error"> \
                        <a class="close" data-dismiss="alert" href="#">&times;</a> \
                        <p>' + data.result.errors + '</p> </div>');
                        data.context.find('.progress').fadeOut('slow');
                    }
                }
            })

        });
     }

     function delete_file_input() {
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
                if(fileThis.closest('div.checkcontrols').children().length == 1 ) {
                    joeyButton = $(fileThis.closest('.form-group').find('.add-fileinput')[0]);
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

      //Navigate tabs

      //Get the first tab in document and will assume will always use first one
      var selectedTab = $(document).find('div[class^="ui-tabs"]').first();

      //Navigation button, select tab when button click.
      $(".Footer").on('click', ':button', function () {
          var selected = selectedTab.tabs("option", "active");
          if (this.id == "btnMoveLeftTab") {
              if (selected >= 1) {
                  selectedTab.tabs("option", "active", selected - 1);
              }
          } else {
              selectedTab.tabs("option", "active", selected + 1);
          }
      });

      //Tab activated, only display next on first tab, and previous in last tab
      selectedTab.tabs({
          active   : Cookies.get('activetab'),
          activate: function (event, ui) { 
              Cookies.set( 'activetab', ui.newTab.index(),{
                  expires : 10
              });
              var active = selectedTab.tabs("option", "active");
              var selected = selectedTab.tabs("option", "active");

              if (active == 0) {
                  $("#btnMoveLeftTab").hide();
              }else if (selectedTab.find("li:not(li[style='display:none'])").size()-1 == selected){
                  $("#btnMoveRightTab").hide();
              }else{
                  $("#btnMoveLeftTab").show();
                  $("#btnMoveRightTab").show();
              }

          }
      });

      //First time loading hide the previous button
      $("#btnMoveLeftTab").hide();

    });
