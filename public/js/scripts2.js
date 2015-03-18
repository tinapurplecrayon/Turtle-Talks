$(document).ready(function() {
    
    $(".sign_up_box").hide();
    
    $(".login_toggle").click(function(){
        console.log("clicked box");
        
            $(".sign_up_box").slideToggle();
    });
    
});

/*$(document).ready(function() {
    
    $(".comment_post").hide();
    
    $(".comment_bulk").click(function(){
        console.log("clicked box");
        
            $(".comment_post").slideToggle();
    });
    
})*/
 
 /*$(window).load(function() {          

  var i =0;
  var images = ['a1.jpeg','a2.jpeg','a3.jpeg','a4.jpeg','a5.jpeg','a6.jpeg','a7.jpeg'];
  var image = $('#slideit');
                //Initial Background image setup
  image.css('background-image', 'url(images/a1.jpeg)');
                //Change image at regular intervals
  setInterval(function(){  
   image.fadeOut(1000, function () {
   image.css('background-image', 'url(' + images [i++] +')');
   image.fadeIn(1000);
   });
   if(i == images.length)
    i = 0;
  }, 500);           
 });

*/
