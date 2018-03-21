  $(function() {
    $.fn.editable.defaults.mode = 'inline';

    $('#public-title').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });
    
    $('#scientific-title').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });
    
    $('#public-contact-name').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#public-contact-designation').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#public-contact-email').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#public-contact-phone').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#public-contact-postal').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#public-contact-affiliation').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-name').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-designation').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-email').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-phone').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-postal').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#scientific-contact-affiliation').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#disease-condition').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#drug-name').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#quantity-excemption').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#principal-inclusion-criteria').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#principal-exclusion-criteria').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#primary-end-points').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#countries-recruitment').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });

    $('#money_source').editable({
      params: function(params) {  //params already contain `name`, `value` and `pk`
        var data = {};
        data['id'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
    });
  });