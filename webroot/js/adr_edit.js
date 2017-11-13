$(function() {
    $('#aefi-date').datetimepicker({
        format: 'd-m-Y H:i'
      });

    $('#date-of-adverse-event, #date-of-site-awareness').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

     $('#investigation-date').datepicker({
        minDate:"-100Y", maxDate:"+1Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

});
