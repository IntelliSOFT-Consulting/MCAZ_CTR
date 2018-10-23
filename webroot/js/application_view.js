  $(function() {
    $( "#tabs" ).tabs({
      active   : Cookies.get('activetab'),
      activate : function( event, ui ){
          Cookies.set( 'activetab', ui.newTab.index(),{
              expires : 10
          });
      }
    });

    //https://stackoverflow.com/questions/18999501/bootstrap-3-keep-selected-tab-on-page-refresh
    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
    });

    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
    }

    // $('div:contains(" 2")').addClass("active");
    // console.log($('#amendment_cnt').text());
    $('div:contains(" '+$('#amendment_cnt').text()+'")').each(function() {
      // console.log('#'+$(this).attr('id'));
      $('a[href="'+'#'+$(this).attr('id')+'"]').each(function () {
        $(this).parent().addClass("active");
      });
    });
  });
