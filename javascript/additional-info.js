/*
Celine Leano and Adolfo Gonzalez
3/13/2019
328/final-project/javascript/additional-info.js
Javascript to toggle div for additional information
 */

// toggles div with 'notes' and 'budget'
$(":checkbox").on("click", function () {
    if ($(this).prop("checked")) {
        $("#additional").show();
    } else {
        $("#additional").hide();
    }
});