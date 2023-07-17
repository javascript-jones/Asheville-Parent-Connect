export default {
  init() {
    // JavaScript to be fired on all pages
    jQuery('#to-the-top').click(function() {
      jQuery('html, body').animate({scrollTop: 0}, 420);
    });
    
    jQuery(window).scroll(function() {
      const f = jQuery(document).height();
      const d = jQuery(window).scrollTop();
      const g = jQuery(window).height();
      if(d > 350) {
        jQuery('#to-the-top').addClass('arrived');
      } else {
        jQuery('#to-the-top').removeClass('arrived');
      }

      if ( d + g == f ) {
        jQuery('#to-the-top').addClass('ease');
      } else {
        jQuery('#to-the-top').removeClass('ease');
      }

    });

    let n = 2;

    function burgerToggleHelper() {
      $('.hamburger').toggleClass('is-active');
      $('.nav-primary').toggleClass('is-mobile');
      $('.header-inner').toggleClass('is-mobile');
      
      function disableScroll() {
        document.body.style.overflow = 'hidden';
      }

      function enableScroll() {
        document.body.style.overflow = 'visible';
      }

      if ( n % 2 == 0 ) {
        disableScroll();
      } else {
        enableScroll();
      }

      n++
    }

    // Toggles active state for hamburger menu
    $('.hamburger').on('click', function(){
      burgerToggleHelper();
    });


    var viewWidth = $( document ).width();
    
    if (viewWidth < 975) {
      $('.menu-item-has-children').children('a').on('click', function(e){
        e.preventDefault();
        $(this).parent().children('a').toggleClass('rotate')
        $(this).parent().children('.sub-menu').toggleClass('mobile-open')
      });

      $('.sub-menu .menu-item-type-custom').on('click', function() {
        burgerToggleHelper();
      })
    }


    $('.fit-this').fitVids();

    jQuery('.full-wide').on('click', function() {
      jQuery(this).toggleClass('wide-open');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
