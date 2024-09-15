$(document).ready(function(){
    var currentUrl = window.location.href;

    $('.navbar-nav .nav-link').removeClass('active');

    $('.navbar-nav .nav-link').each(function(){
      if (this.href === currentUrl) {
        $(this).addClass('active');
      }
    });
});