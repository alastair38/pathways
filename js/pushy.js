
jQuery('#menuOpen').on('click', function(e) {
      jQuery('.mobileMenu').toggleClass("open"); //you can list several class names 
      jQuery('#content').toggleClass("moved"); //you can list several class names 
      jQuery('i').toggleClass("rotate"); //you can list several class names 
      e.preventDefault();
    });