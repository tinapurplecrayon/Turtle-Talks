$(document).ready(function() {
    
    $(".sign_up_box").hide();
    
    $(".login_toggle").click(function(){
        console.log("clicked box");
        
            $(".sign_up_box").slideToggle();
    });
    
});
