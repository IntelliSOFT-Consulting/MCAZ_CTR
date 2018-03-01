$(function() {
  $(document).on('click', '.deactivate', deactivate);
  $(document).on('click', '.activate', activate);
    
    function deactivate(event) {
      event.preventDefault();
      if(confirm("Are you sure you want to deactivate the user?")) {          
          url = $(this).attr("href");
          id  = $(this).attr("id");
          em = $(this);
          $.blockUI({ css: { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
          } }); 

          $.ajax({
              async:true,
              type: 'POST',
              url: url,
              success: function (data) {
                  // $('#registrationModal').modal('hide')
                  console.log(data, $(this).closest("td"));
                  em.closest("td").append('<a id="'+id+'" href="/admin/users/activate/'+id+'.json" class="activate">\
                    <span class="label label-info">Activate</span></a>');
                  em.remove();
                  $.unblockUI();
              },
              error: function (data) {
                  //TODO: Remember to remove console.logs during deploy
                  console.log('An error occurred.');
                  console.log(data);
                  $.unblockUI();
              },
          });
      }
    }

    function activate(event) {
      event.preventDefault();
      if(confirm("Are you sure you want to activate the user?")) {          
          url = $(this).attr("href");
          id  = $(this).attr("id");
          em = $(this);
          $.blockUI({ css: { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
          } }); 

          $.ajax({
              async:true,
              type: 'POST',
              url: url,
              success: function (data) {
                  // $('#registrationModal').modal('hide')
                  console.log(data, $(this).closest("td"));
                  em.closest("td").append('<a id="'+id+'" href="/admin/users/deactivate/'+id+'.json" class="deactivate">\
                    <span class="label label-default">Deactivate</span></a>');
                  em.remove();
                  $.unblockUI();
              },
              error: function (data) {
                  //TODO: Remember to remove console.logs during deploy
                  console.log('An error occurred.');
                  console.log(data);
                  $.unblockUI();
              },
          });
      }
    }
    
});
