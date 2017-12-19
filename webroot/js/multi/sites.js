$(function() {
	// Multi Sites Handling
	$("#addSiteDetail").on("click", addSiteDetail);
	$(document).on('click', '.removeSiteDetail', removeSiteDetail);
	// Multi sites Handling
	function addSiteDetail() {
		var se = $("#site_details .site-group").last().find('button').attr('id');
		if ( typeof se !== 'undefined' && se !== false && se !== "") {
			intId = parseFloat(se.replace('SiteDetailButton', '')) + 1;
		} else {
			intId = 1;
		}
		if ($("#site_details .site-group").length < 9) {
			var new_sitedetail = $('<div class="site-group"> \
				<p  class="topper" id="SiteDetailLabel{i}">{i} additional sites</p> \
				<span class="badge badge-info">{i}</span> \
				<div class="control-group"><label class="control-label required" for="SiteDetail{i}SiteName">Name of site \
				  </label><div class="controls"><input type="text" id="SiteDetail{i}SiteName" \
				  maxlength="255" placeholder=" " class="input-xxlarge multiple_sites_member_state_f" \
				  name="data[SiteDetail][{i}][site_name]"></div></div> \
				<div class="control-group"><label class="control-label required" for="SiteDetail{i}PhysicalAddress">Physical address</label> \
				  <div class="controls"><input type="text" id="SiteDetail{i}PhysicalAddress" maxlength="255" placeholder=" " \
				  class="input-xxlarge multiple_sites_member_state_f" name="data[SiteDetail][{i}][physical_address]"></div></div> \
				<div class="control-group"> <label class="control-label required" for="SiteDetail{i}ContactDetails">Contact details \
				   </label><div class="controls"><input type="text" id="SiteDetail{i}ContactDetails" \
				  maxlength="255" placeholder=" " class="input-xxlarge multiple_sites_member_state_f" name="data[SiteDetail][{i}][contact_details]"></div></div> \
				<div class="control-group"><label class="control-label required" for="SiteDetail{i}ContactPerson">Contact person \
				  </label><div class="controls"><input type="text" id="SiteDetail{i}ContactPerson" \
				  maxlength="255" placeholder=" " class="input-xxlarge multiple_sites_member_state_f" name="data[SiteDetail][{i}][contact_person]"></div></div> \
				<div class="control-group"><label class="control-label required" for="SiteDetail{i}CountyId">County \
				  </label><div class="controls"><select id="SiteDetail{i}CountyId" class="multiple_sites_member_state_s" \
				  name="data[SiteDetail][{i}][county_id]"> </select></div></div>\
				<div class="controls"><button class="btn btn-mini btn-danger removeSiteDetail" id="SiteDetailButton{i}" \
				  type="button"><i class="icon-trash"></i> Remove Site </button></div> \
				  <hr id="SiteDetailHr{i}">	</div>'.replace(/{i}/g, intId));
			$("#site_details").append(new_sitedetail);
			$("#SiteDetail"+intId+"CountyId").html($("#SiteDetail0CountyId").html());
		} else {
			alert("Sorry, cant add more than "+$("#site_details .site-group").length+" Sites!");
		}
	}
	function removeSiteDetail() {
		intId = parseFloat($(this).attr('id').replace('SiteDetailButton', ''));
		var inputVal = $('#SiteDetail'+ intId +'Id').val();
		if (inputVal) {
			$.ajax({
				type:'POST',
				url:'/site_details/delete/'+inputVal+'.json',
				data:{'id': inputVal},
				success : function(data) {
					// console.log(data);
				}
			});
		}
		$(this).parent().parent().remove();
	}
});
