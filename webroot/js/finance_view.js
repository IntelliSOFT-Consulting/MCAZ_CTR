  $(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    var intId = 0;
    var trWrapper = '\
          <div class="row attacho">\
            <div class="col-xs-10"><input name="finance_approvals[{p}][attachments][{i}][id]" id="finance-approvals-attachments-{i}-id" type="hidden"> \
                <input name="finance_approvals[{p}][attachments][{i}][file]" id="finance-approvals-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="finance-approvals-{i}-attachments-{i}-model" value="FinanceApprovals" name="finance_approvals[{p}][attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="finance-approvals-{i}-attachments-{i}-category" value="finances" name="finance_approvals[{p}][attachments][{i}][category]" style="display: inline;">\
                <textarea name="finance_approvals[{p}][attachments][{i}][description]" id="finance-approvals-{i}-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    $(".addFReceipt").click(function() {
      intId = intId + 1;
      pKey = $(this).val();

      if ($(this).closest('div.uploadsTable').children('div.attacho').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{p}/g, pKey));
          $(this).closest("div.uploadsTable").append(trVar);
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

    $('#finance-approvals-100-outcome-date, #finance-annual-approvals-100-outcome-date').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show',
        buttonImage:'/img/calendar.gif'
      });
  })(jQuery);
