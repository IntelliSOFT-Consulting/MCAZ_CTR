$(function() {
    // $(document).on('click', '#registerUser', reloadLabTests);

    //TODO: refresh page on successful cancel modal button.

    $("#registerUser").click(function() {
      var frm = $('#partialRegistration');
      $('.help-block').empty();
      $('[id^=fg-]').removeClass("has-error");
      $('#registrationModalHeader').addClass("has-error");
      $.ajax({
            async:true,
            type: 'POST',
            url: '/users/register.json',
            data: frm.serialize(),
            success: function (data) {
                // $('#registrationModal').modal('hide')
                console.log(data);
                $('#registrationModalHeader').addClass("has-success");
                $('#help-registration-modal').append(data.message);
                $('.modal-body').empty();
                $('.modal-body').append(data.message);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data.responseJSON.errors["email"]);
                $('#registrationModalHeader').addClass("has-error");
                $('#help-registration-modal').append(data.responseJSON.message);
                if (data.responseJSON.errors["email"]) {
                    $('#fg-email').addClass("has-error");
                    $('#help-email').append(JSON.stringify(data.responseJSON.errors["email"]));
                }
                if (data.responseJSON.errors["password"]) {
                    $('#fg-password').addClass("has-error");
                    $('#help-password').append(JSON.stringify(data.responseJSON.errors["password"]));
                }
                if (data.responseJSON.errors["confirm_password"]) {
                    $('#fg-confirm-password').addClass("has-error");
                    $('#help-confirm-password').append(JSON.stringify(data.responseJSON.errors["confirm_password"]));
                }
                
            },
        });
    });
    

});
