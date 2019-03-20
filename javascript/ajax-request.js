/*
Celine Leano and Adolfo Gonzalez
3/20/2019
328/final-project/javascript/ajax-request.js
Ajax Request
 */

//this function checks to see if we have a valid stock number
$(document).ready(function(){
    $('#stock').blur(function(){
        var stock = $(this).val();

        $.post(
            '../check-stock',
            {stock: stock},
            function(result)
            {
                //if it is a valid user submit the form
                if(result == "success")
                {
                    $("#invalid-stock").removeClass("text-success");
                    $("#invalid-stock").addClass("text-danger");
                    $("#invalid-stock").html("Stock number already exists");
                } else {
                    $("#invalid-stock").removeClass("text-danger");
                    $("#invalid-stock").addClass("text-success");
                    $("#invalid-stock").html("Stock number is available");
                }
            });

    });
});