$(function () {
  $(document).on('click', '.remove-participant', remove_participant);
  $(document).on('click', '#addParticipant', reloadParticipants);
  $(document).on('click', '.updateCheckboxes', updateCheckboxes);
  //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

  //Hapa Kazi tu    
  reloadParticipants();
  function reloadParticipants() {
    var dates2 = $('.date-pick-field').datepicker({
      minDate: "-100Y", maxDate: "-0D",
      dateFormat: 'dd-mm-yy',
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      yearRange: "-100Y:+0",
      showAnim: 'show'
    });

    var dates3 = 0;     //TODO:search for date time fields and use
    $('.datetime-field').datetimepicker({
      minDate: "-100Y", maxDate: "+5Y",
      format: 'd-m-Y H:i'
    });

  }
  function updateCheckboxes() {
    //get all checkboxes only in this group
    var checkboxes = $("#participantsTable").find('input[type="checkbox"]');
    var checked = [];
    checkboxes.each(function () {
      if ($(this).is(":checked")) {
        checked.push($(this).val());
        $(this).val(1);
      } else {
        checked.push($(this).val());
        $(this).val(0);
      }
    });

  }
  // incremental development
  $("#addParticipant").click(function () {
    if ($("#participantsTable tbody tr").length > 0) {
      var intId = parseInt($("#participantsTable tr:last").find('td:first').text())
    } else {
      var intId = 0;
    }


    if ($('#participantsTable tbody tr').length < 10) {
      trVar = $.parseHTML(constructLABTr(intId));
      $("#participantsTable tbody").append(trVar);
      //   call updateCheckboxes() to update checkboxes
      updateCheckboxes();
    } else {
      alert("Sorry, can't add more than " + intId + " Self lives at a time!");
    }
  });

  function constructLABTr(intId) {
    var intId2 = intId + 1;
    var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td>\
            <input class="form-control" name="storage_conditions[{i}][model]" id="storage_conditions-{i}-model" type="hidden" value="sdrug">\
            <input class="form-control" name="storage_conditions[{i}][batch_details]" id="storage_conditions-{i}-batch_details" type="text">  </td>\
            <td>\
                <input class="form-control" name="storage_conditions[{i}][manu_process]" id="storage_conditions-{i}-site_function" type="text"> </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][neg_seventy]" id="storage_conditions-{i}-neg_seventy" type="number">   </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][neg_twenty]" id="storage_conditions-{i}-neg_twenty" type="number">   </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][pos_five]" id="storage_conditions-{i}-pos_five" type="number">   </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][pos_twenty_five]" id="storage_conditions-{i}-pos_twenty_five" type="number">   </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][pos_thirty]" id="storage_conditions-{i}-pos_thirty" type="number">   </td>\
            <td>\
            <input class="form-control " name="storage_conditions[{i}][pos_forty]" id="storage_conditions-{i}-pos_forty" type="number">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-participant"><i class="fa fa-trash-o"></i> </button>\
            </td>\
          </tr>\        ';

    return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
  }

  function remove_participant() {
    if (typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
      $.ajax({
        async: true, type: 'POST',
        url: '/compliance/delete/' + $(this).val() + '.json',
        data: { 'id': $(this).val(), 'adr_id': $('#adr_pr_id').text() }, //TODO:Use this to ensure the adr belongs to the user
        success: function (data) {
          console.log(data);
        }
      });
    }
    updateLABTr($(this));
  }

  function updateLABTr(myobj) {
    myobj
      .closest('td')
      .siblings()
      .wrapInner('<div style="display: block;" />')
      .closest('tr')
      .find('td > div')
      .slideUp(300, function () {
        $(this).closest('tr').remove();
      });
  };


});