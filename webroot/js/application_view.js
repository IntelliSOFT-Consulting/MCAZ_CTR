  $(function() {
    $( "#tabs" ).tabs({
      active   : Cookies.get('activetab'),
      activate : function( event, ui ){
          Cookies.set( 'activetab', ui.newTab.index(),{
              expires : 10
          });
      }
    });


  });
