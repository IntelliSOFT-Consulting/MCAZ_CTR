$(document).ready(function () {
    //MUST DO: FIND OUT WAY OF CHECKING IF VARIABLE EXISTS
    //get the checkbox in the table header
    var $checkbox = $('table thead tr th:first-child input[type="checkbox"]');
    //add the click event to the checkbox
    $checkbox.click(function () {
        //get all the checkboxes in the table
        var $checkboxes = $('table tbody tr td:first-child input[type="checkbox"]');
        //check or uncheck all the checkboxes
        $checkboxes.prop('checked', $checkbox.is(':checked'));
    }
    );
});