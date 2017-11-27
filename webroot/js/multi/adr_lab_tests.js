$(function() {
    $(document).on('click', '.remove-lab-test', remove_lab_test);
    $(document).on('click', '#addLabTest', reloadLabTests);

    //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadLabTests();
    function reloadLabTests(){
      var dates2 = $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      var dates3 = 0;     //TODO:search for date time fields and use
      $('.datetime-field').datetimepicker({
        format: 'd-m-Y H:i'
      });

    }

    // incremental development
    $("#addLabTest").click(function() {
      if ($("#adrLabTestsTable tbody tr").length > 0) {
        var intId = parseInt($("#adrLabTestsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#adrLabTestsTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructLABTr(intId));
          $("#adrLabTestsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Lab Tests at a time!");
      }
    });

    function constructLABTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="adr_lab_tests[{i}][id]" id="adr-lab-tests-{i}-id" type="hidden"> \
                <input class="form-control" name="adr_lab_tests[{i}][lab_test]" id="adr-lab-tests-{i}-lab-test" type="text">  </td>\
            <td>\
                <input class="form-control" name="adr_lab_tests[{i}][abnormal_result]" id="adr-lab-tests-{i}-abnormal-result" type="text"> </td>\
            <td>\
                <input class="form-control" name="adr_lab_tests[{i}][site_normal_range]" id="adr-lab-tests-{i}-site-normal-range" type="text"> </td>\
            <td>\
              <input class="form-control date-pick-field" name="adr_lab_tests[{i}][collection_date]" id="adr-lab-tests-{i}-collection-date" type="text">   </td>\
            <td>\
                <input class="form-control" name="adr_lab_tests[{i}][lab_value]" id="adr-lab-tests-{i}-lab-value" type="text"> </td>\
            <td>\
              <input class="form-control date-pick-field" name="adr_lab_tests[{i}][lab_value_date]" id="adr-lab-tests-{i}-lab-value-date" type="text">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-lab-test"><i class="fa fa-minus"></i></button>\
            </td>\
          </tr>\        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_lab_test() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/adr-lab-tests/delete.json',
          data:{'id': $(this).val(), 'adr_id': $('#adr_pr_id').text()}, //TODO:Use this to ensure the adr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLABTr($(this));         
    }

    function updateLABTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          $(this).closest('tr').remove();
       });
    };
    

});
