/*
Celine Leano and Adolfo Gonzalez
3/13/2019
328/final-project/javascript/update-status.js
Javascript to toggle div for additional information
 */

// go back a page
function goBack() {
    window.history.back();
}

// toggles div with 'notes' and 'budget'
$(":checkbox").on("click", function () {
    if ($(this).prop("checked")) {
        $("#additional").show();
    } else {
        $("#additional").hide();
    }
});