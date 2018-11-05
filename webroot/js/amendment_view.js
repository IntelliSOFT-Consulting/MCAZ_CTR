  $(function() {
    // $('div:contains(" 2")').addClass("active");
    // console.log($('#amendment_cnt').text());
    $('div[id^=tabs]:has(tr.amender):contains(" '+$('#amendment_cnt').text()+'")').each(function() {
      // console.log('#'+$(this).attr('id'));
      $('a[href="'+'#'+$(this).attr('id')+'"]').each(function () {
        $(this).parent().addClass("active");
      });
    });
  });
