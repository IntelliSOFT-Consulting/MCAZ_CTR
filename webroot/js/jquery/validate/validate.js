$(function() {
    var triga = false;
    $('#download_mc10').click(function(e){
        if (triga) {
            triga = false;
            // return;
        } else {
            e.preventDefault();
            // $('#application_form').validate();
            triga = true;
            if($('#scientific-title').val() == ''){ alert('tab 1: scientific title can not be left blank'); triga = false; return; }
            if($('#public-contact-name').val() == ''){ alert('tab 1: public contact name can not be left blank'); triga = false; return; }
            if($('#investigator-contacts-0-given-name').val() == ''){ alert('tab 2: principal investigator name can not be left blank'); triga = false; return; }
            if($('#investigator-contacts-0-qualification').val() == ''){ alert('tab 2: principal investigator qualification can not be left blank'); triga = false; return; }
            if($('#sponsor-name').val() == ''){ alert('tab 3: sponsor name can not be left blank'); triga = false; return; }
            if($('#sponsor-address').val() == ''){ alert('tab 3: sponsor address can not be left blank'); triga = false; return; }
            // if($('#participants-description').val() == ''){ alert('tab 4: participants description can not be left blank'); triga = false; return; }
            if($('#number-participants').val() == ''){ alert('tab 4: Expected number of participants in Zimbabwe can not be left blank'); triga = false; return; }
            if($('#drug-name').val() == ''){ alert('tab 6: Drug name can not be left blank'); triga = false; return; }
            if($('#quantity-excemption').val() == ''){ alert('tab 6: Quantity of medicine can not be left blank'); triga = false; return; }
            if($('#principal-inclusion-criteria').val() == ''){ alert('tab 7: Principal inclusion criteria cannot be empty. Save changes first.'); triga = false; return; }
            if($('#principal-exclusion-criteria').val() == ''){ alert('tab 7: Principal exclusion criteria can not be left blank. Save changes first.'); triga = false; return; }
            if($('#primary-end-points').val() == ''){ alert('tab 7: Primary end points can not be left blank. Save changes first.'); triga = false; return; }
        }

    });
});
