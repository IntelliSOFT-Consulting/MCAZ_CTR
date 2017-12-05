$(function() {
	$(document).on('click', '#tabs-12 .delete_file_link', delete_file);
	$(document).on('click', '#tabs-12 :input:checkbox', enable_checklist);
	$(document).on('click', '#tabs-12 .add-checklist', add_checklist);
	$(document).on('click', '#tabs-12 .remove_file', function() {$(this).closest('div').remove()});
	var fileOption = '\
		<input type="hidden" id="{n}{i}Id" class="" name="data[{n}][{i}][id]" style="display: inline;">\
		<input type="file" id="{n}{i}File" name="data[{n}][{i}][file]" style="display: inline-block;">\
		<span class="help-inline" id="{n}{i}Help" style="display: inline-block;">   Upload! </span>\
		<button class="btn btn-mini btn-danger remove_file" type="button">&nbsp;<i class="icon-trash"></i>&nbsp;</button>\
		<input type="hidden" id="{n}{i}Model" value="Application" class="" name="data[{n}][{i}][model]" style="display: inline;">\
		<input type="hidden" id="{n}{i}Group" value="{group}" name="data[{n}][{i}][group]" style="display: inline;">\
		<input type="hidden" id="{n}{i}Dirname" name="data[{n}][{i}][dirname]" style="display: inline;">\
		<input type="hidden" id="{n}{i}Basename" name="data[{n}][{i}][basename]" style="display: inline;">\
		<input type="hidden" id="{n}{i}Checksum" name="data[{n}][{i}][checksum]" style="display: inline;">';
	//if an input is checked and no input file in its control group, trigger add checklist file
	$('#tabs-12 :input:checkbox').each(function() {
		if($(this).is(':checked')) {
			if($(this).closest('div.checkcontrols').next().children().length == 0) {
			  $(this).closest('.control-group').find('.add-checklist').click();
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
		  if (!isNaN(intId)) {
		    $.ajax({
			type:'POST',
			url:'/attachments/delete/'+intId+'.json',
			data:{'id': intId},
			success : function(data) {
			    if(fileThis.closest('div.checkcontrols').children().length == 1 &&
			    	     fileThis.closest('.control-group').find('input:checkbox').is(':checked')) {
			    	joeyButton = $(fileThis.closest('.control-group').find('.add-checklist')[0]);
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
          if($(this).closest('.control-group').find('input:checkbox').is(':not(:checked)')) {
          	$(this).closest('.control-group').find('input:checkbox').prop('checked', 'checked') };
          if($(this).closest('div.checkcontrols').next().find('input:file').length) {
          	$(this).closest('div.checkcontrols').next().find('input:file, .help-inline').each(function() {
          		$(this).effect("highlight", {color: '#99C0DD'}, 3000);
          	});
          } else {
          	intId = $(this).closest('div.checkcontrols').next().children().length;
		name = $(this).closest('div.checkcontrols').next().attr('id');
		group = $(this).closest('div.checkcontrols').next().attr('title');
		$(this).closest('div.checkcontrols').next().append('<div style="margin-top: 5px; margin-bottom: 5px;">'+
			fileOption.replace(/{n}/g, name).replace(/{i}/g, intId).replace(/{group}/g, group)+'</div>');
		setChecklistUpload();
	   }
      }

     setChecklistUpload();
     function setChecklistUpload() {
      $('#tabs-12 :input:file').each(function() {
      		$(this).fileupload({
      			dataType: 'json',
      			fileInput: $(this),
	             add: function (e, data) {
	                data.context = $(this).closest('div');
	                if(!data.context.find('.progress').length) {
		              data.context.prepend('\
		                <div class="progress progress-striped active pull-right" style="width: 45%; margin-right: 45px;"> \
				      <div class="bar" style="width: 0%;"></div> \
				    </div>');
		          }
		         data.context.find('.progress .bar').css('width', '0%');
		         data.submit();
	            },
	            submit: function (e, data) {
			  var fieldData =  new Array();
	               fieldData.push({name: $('#ApplicationId').attr('name'), value: $('#ApplicationId').val()});
			  data.context.closest('.control-group').find(':input').each(function() {
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
      	                    if (/msie/.test(navigator.userAgent.toLowerCase())) {
		             	location.reload();
				}
		             if(data.result.message == 'Success') {
		                data.context.empty();
		                // console.log(data.context.closest('div.checkcontrols').attr('id'));
				   name = data.context.closest('div.checkcontrols').attr('id');
				   cound = data.context.closest('div.checkcontrols').children().length;
		                data.context.prepend(' \
		                  <a href="/applicant/attachments/download/'+data.result.content.Attachment.id+'" class="btn btn-info"> \
		                  '+data.result.content.Attachment.basename+'</a> \
		                  <input type="hidden" name="data['+name+']['+cound+'][id]" \
		                  value="'+data.result.content.Attachment.id+'" id="'+name+cound+'Id">\
		                  <input type="hidden" name="data['+name+']['+cound+'][basename]" \
		                  value="'+data.result.content.Attachment.basename+'" id="'+name+cound+'Basename">\
		                  <button class="btn btn-mini btn-danger delete_file_link" type="button" value="'+data.result.content.Attachment.id+'">\
		                    &nbsp;<i class="icon-trash"></i>&nbsp;</button>');
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
});
