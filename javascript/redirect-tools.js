/*
Celine Leano and Adolfo Gonzalez
3/18/2019
328/final-project/javascript/redirect-tools.js
Redirects user after removing a car
 */

var count = 1;
var redirect = "http://cleano.greenriverdev.com/328/final-project/admin/tools";

function countDown(){
    if(count > 0){
        count--;
        setTimeout("countDown()", 3000);
    }else{
        window.location.href = redirect;
    }
}