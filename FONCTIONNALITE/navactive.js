$(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
});

   function setActive() {
        aObj = document.getElementById('nav').getElementsByTagName('a');
        for(i=0;i<aObj.length;i++) {
          if(document.location.href.indexOf(aObj[i].href)>=0) {
            aObj[i].className='active';
          }
        }
      }
      window.onload = setActive;
      
      $('.navbar a').each(function(index, element) {
    //console.log(index+'-'+element.href);
    //console.log(location.href);
    /** look at each href in the navbar
      * if it matches the location.href then set active*/
    if (element.href === location.href){
        //console.log("---------MATCH ON "+index+" --------");
        $(element).addClass('active');
    }
});

$(function() {
   $('nav a[href^="' + location.pathname.split("/")[2] + '"]').addClass('active');
});

$(document).on('click', '.nav-link', function () {
    $(".nav-item").find(".active").removeClass("active");
})

$(document).ready(function() {
    $('a[href="' + location.pathname + '"]').closest('.nav-item').addClass('active'); 
});


