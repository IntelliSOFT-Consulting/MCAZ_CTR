  $(function() {
    $.fn.editable.defaults.mode = 'inline';

    $('.evaluation-comments').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });


  });