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