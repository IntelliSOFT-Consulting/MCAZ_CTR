$(function() {
    // Multi Committee Handling
    $("#addCommitteeDetail").on("click", addCommitteeDetail);
    $(document).on('click', '.removeCommitteeDetail', removeCommitteeDetail);


    // Multi Committee Handling
    function addCommitteeDetail() {
        console.log("clicked...");
        var se = $("#committee_details .committee-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('CommitteeDetail', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#committee_details .committee-group").length < 9) {
            var new_committeedetail = $('\
                <div class="committee-group"> \
                    <p  class="topper" id="CommitteeDetailLabel{i}">{i} additional committees</p> \
                    <div> \
                        <input class="form-control" name="committees[{i}][id]" id="committees-{i}-id" type="hidden"> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="committees-{i}-name">committees <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="committees[{i}][name]" maxlength="255" id="committees-{i}-name" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="committees-{i}-address">Postal Address <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="committees[{i}][address]" maxlength="255" id="committees-{i}-address" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="committees-{i}-telephone-number">Telephone Number <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="committees[{i}][telephone_number]" maxlength="255" id="committees-{i}-telephone-number" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input email"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="committees-{i}-email-address">Email Address <span class="sterix">*</span></label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="committees[{i}][email_address]" maxlength="255" id="committees-{i}-email-address" value="" type="email"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="controls"><button type="button" id="CommitteeDetail{i}" class="btn btn-xs btn-danger removeCommitteeDetail"><i class="fa fa-trash-o"></i> Remove </button></div> \
                        <hr id="committeesHr{i}"> \
                </div>'.replace(/{i}/g, intId));
            $("#committee_details").append(new_committeedetail);
        } else {
            alert("Sorry, cant add more than "+$("#committee_details .committee-group").length+" Committee Details!");
        }
    }
    function removeCommitteeDetail() {
        // console.log('clicked');
        intId = parseFloat($(this).attr('id').replace('CommitteeDetail', ''));
        // console.log($(this).attr('id').replace('CommitteeDetail', ''));
        var inputVal = $('#committees-'+ intId +'-id').val();
        if (inputVal) {
            $.ajax({
                type:'POST',
                url:'/committees/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    console.log(data);
                }
            });
        }
        $(this).parent().parent().remove();
    }
});
