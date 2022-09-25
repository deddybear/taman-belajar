$(document).ready(function() {
  var width800 = window.matchMedia("(max-width: 800px)");
  var width900 = window.matchMedia("(max-width: 992px)");
  if (width800.matches) {
    $('.desk_navbar').remove();

    $('.dropdown-menu a.dropdown-toggle').on('click', function() {
      if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');
      
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function() {
        $('.dropdown-submenu .show').removeClass('show');
      });
    });
    $('#sidebarCollapse').on('click', function () {
       $('#sidebar').toggleClass('active');
    });
    
    return false;

  } else {

    $('#sidebar').remove();
    $('.dropdown-menu a.dropdown-toggle').on('click', function() {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }

      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');
    
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function() {
        $('.dropdown-submenu .show').removeClass('show');
      });
    
    
      return false;
    });
  }
  
});