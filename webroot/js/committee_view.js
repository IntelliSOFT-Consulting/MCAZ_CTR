  $(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    var intId = 0;
    var trWrapper = '\
          <div class="row attacho">\
            <div class="col-xs-10"><input name="committee_reviews[{p}][attachments][{i}][id]" id="committee-reviews-attachments-{i}-id" type="hidden"> \
                <input name="committee_reviews[{p}][attachments][{i}][file]" id="committee-reviews-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="committee-reviews-{i}-attachments-{i}-model" value="CommitteeReviews" name="committee_reviews[{p}][attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="committee-reviews-{i}-attachments-{i}-category" value="committees" name="committee_reviews[{p}][attachments][{i}][category]" style="display: inline;">\
                <textarea name="committee_reviews[{p}][attachments][{i}][description]" id="committee-reviews-{i}-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    $(".addCLetter").click(function() {
      intId = intId + 1;
      pKey = $(this).val();

      if ($(this).closest('div.commsTable').children('div.attacho').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{p}/g, pKey));
          $(this).closest("div.commsTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Attachments at a time!");
      }
    });

    function remove_attachment() {
      $(this).closest('.attacho').remove();        
    }
    $( "#tabs" ).tabs({
      active   : Cookies.get('activetab'),
      activate : function( event, ui ){
          Cookies.set( 'activetab', ui.newTab.index(),{
              expires : 10
          });
      }
    });

    $("input[name=committee_reviews\\[100\\]\\[decision\\]]").on( "change", function() {
         var test = $(this).val();
         $(".desc").hide();
         $("#"+test).show();
    } );

  })(jQuery);
