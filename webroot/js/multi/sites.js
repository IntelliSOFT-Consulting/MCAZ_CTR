$(function() {
	// Multi Sites Handling
	$("#addSiteDetail").on("click", addSiteDetail);
	$(document).on('click', '.removesite_details', removeSiteDetail);
	// Multi sites Handling
	function addSiteDetail() {
		console.log('clicked');
		var se = $("#site_details .site-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('site_detailsButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#site_details .site-group").length < 9) {
			var new_sitedetail = $('<div class="site-group"> \
                <p  class="topper" id="SiteDetailLabel{i}">{i} additional sites</p> \
                        <input class="form-control" name="site_details[{i}][id]" id="site-details-{i}-id" type="hidden"> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="site-details-{i}-site-name">Name of site</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="site_details[{i}][site_name]" maxlength="255" id="site-details-{i}-site-name" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="site-details-{i}-physical-address">Physical address</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="site_details[{i}][physical_address]" maxlength="255" id="site-details-{i}-physical-address" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="site-details-{i}-contact-details">Contact details </label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="site_details[{i}][contact_details]" maxlength="255" id="site-details-{i}-contact-details" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="site-details-{i}-contact-person">Contact person</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <input class="form-control" name="site_details[{i}][contact_person]" maxlength="255" id="site-details-{i}-contact-person" value="" type="text"> \
                                </div> \
                            </div> \
                        </div> \
                        <div class="input select"> \
                            <div class="form-group"> \
                                <div class="col-sm-4 control-label"> \
                                    <label for="site-details-{i}-province-id">Province</label> \
                                </div> \
                                <div class="col-sm-6"> \
                                    <select class="form-control" name="site_details[{i}][province_id]" id="site-details-{i}-province-id"> \
                                    </select> \
                                </div> \
                            </div> \
                        </div> \
                      <div class="controls"><button type="button" id="site_detailsButton{i}" class="btn btn-xs btn-danger removesite_details"><i class="fa fa-trash-o"></i> Remove Site</button></div> \
                  <hr id="SiteDetailHr{i}"> </div>'.replace(/{i}/g, intId));
			$("#site_details").append(new_sitedetail);
			// $("#site-details-"+intId+"-province-id").html($("#single-site-province-id").html());
			$("#site-details-"+intId+"-province-id").append($("#single-site-province-id > option").clone()).val('');
		} else {
			alert("Sorry, cant add more than "+$("#site_details .site-group").length+" Sites!");
		}
	}
	function removeSiteDetail() {
		intId = parseFloat($(this).attr('id').replace('site_detailsButton', ''));
		var inputVal = $('#site-details-'+ intId +'-id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/site-details/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
