$(function() {
    // Multi Sponsor Handling
    $("#addSponsorDetail").on("click", addSponsorDetail);
    $(document).on('click', '.removeSponsorDetail', removeSponsorDetail);


    // Multi Sponsor Handling
    function addSponsorDetail() {
        console.log("clicked...");
        var se = $("#sponsor_details .sponsor-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('SponsorDetail', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#sponsor_details .sponsor-group").length < 9) {
            var new_sponsordetail = $('\
                <div class="sponsor-group"> \
                    <p  class="topper" id="SponsorDetailLabel{i}">{i} additional sponsors</p> \
                    <div id="sponsor_primary_contact"> \
                        <input class="form-control" name="sponsors[{i}][id]" id="sponsors-{i}-id" type="hidden"> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-sponsor">Organization </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][sponsor]" maxlength="255" id="sponsors-{i}-sponsor" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-contact-person">Contact Person</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][contact_person]" maxlength="255" id="sponsors-{i}-contact-person" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-address">Address </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][address]" maxlength="255" id="sponsors-{i}-address" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-telephone-number">Telephone Number </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][telephone_number]" maxlength="255" id="sponsors-{i}-telephone-number" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-fax-number">Fax Number</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][fax_number]" maxlength="255" id="sponsors-{i}-fax-number" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-cell-number">Mobile Phone Number </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][cell_number]" maxlength="255" id="sponsors-{i}-cell-number" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input email"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="sponsors-{i}-email-address">Email Address </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="sponsors[{i}][email_address]" maxlength="255" id="sponsors-{i}-email-address" value="" type="email"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="controls"><button type="button" id="SponsorDetail{i}" class="btn btn-xs btn-danger removeSponsorDetail"><i class="fa fa-trash-o"></i> Remove Contact</button></div> \
                        <hr id="sponsorsHr{i}"> \
                </div>'.replace(/{i}/g, intId));
            $("#sponsor_details").append(new_sponsordetail);
        } else {
            alert("Sorry, cant add more than "+$("#sponsor_details .sponsor-group").length+" Sponsor Details!");
        }
    }
    function removeSponsorDetail() {
        // console.log('clicked');
        intId = parseFloat($(this).attr('id').replace('SponsorDetail', ''));
        // console.log($(this).attr('id').replace('SponsorDetail', ''));
        var inputVal = $('#sponsors-'+ intId +'-id').val();
        if (inputVal) {
            $.ajax({
                type:'POST',
                url:'/sponsors/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    console.log(data);
                }
            });
        }
        $(this).parent().parent().remove();
    }
});
