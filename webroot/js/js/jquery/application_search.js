$(function() {
    
  /*var dateFormat = "mm/dd/yy",
      from = $( "#created-start" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#created-end" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }*/
    var dates = $( "#created-start, #created-end" ).datepicker({
      minDate:"-100Y", 
      maxDate:"-0D", 
      dateFormat:'yy-mm-dd', 
      showButtonPanel:true, 
      changeMonth:true, 
      changeYear:true, 
      showAnim:'show',
      onSelect: function( selectedDate ) {
        var option = this.id == "created-start" ? "minDate" : "maxDate",
          instance = $( this ).data( "datepicker" ),
          date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings );
        dates.not( this ).datepicker( "option", option, date );
      }
    }); 

    $(".collapse :input").each(function()
    {
        if (this.value != "")
        {
            $('#collapseExample').collapse('show');
        }
    });
});
