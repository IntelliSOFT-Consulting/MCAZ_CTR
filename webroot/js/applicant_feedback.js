  $(function() {
    $( "#tabers" ).tabs({
      active   : Cookies.get('activetaber'),
      activate : function( event, ui ){
          Cookies.set( 'activetaber', ui.newTab.index(),{
              expires : 10
          });
      }
    });

  });
