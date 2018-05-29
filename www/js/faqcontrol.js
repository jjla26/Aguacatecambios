function faqcontrol(){
    
    $(".a").hide();
    $(".q").on("click", function(){
        $(this).next().slideToggle();
    });
    
    
}

$(document).ready(function(){
    
    faqcontrol();
});