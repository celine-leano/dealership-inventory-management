/*
Celine Leano and Adolfo Gonzalez
3/13/2019
328/final-project/javascript/ajax-request.js
Ajax Request
 */

//this function checks to see if we have a valid stock number
$(document).ready(function(){
    $('#stock').blur(function(){

        var stock = $(this).val();

        $.ajax({
            url:'/model/database/db-functions.php',
            method:"POST",
            data:{stock:stock},
            success:function(data)
            {
                if(data == '0')
                {
                    $('#display').html('<span class="text-danger">Invalid Stock Number</span>');
                }
            }
        })

    });
});