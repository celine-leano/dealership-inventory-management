/*
Celine Leano and Adolfo Gonzalez
3/17/2019
328/final-project/javascript/redirect.js
Redirects user after logging out
 */

var count = 1;
var redirect = "http://cleano.greenriverdev.com/328/final-project";

function countDown(){
    if(count > 0){
        count--;
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}