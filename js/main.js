jQuery(document).ready(function($) {

  function masonry_init() {
    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
      // use element for option
      columnWidth: '.grid-sizer',
      percentPosition: true
    });
    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
    });
  }
  masonry_init();
  function scroll_animations() {
            var parent = $('.anim_parent');
            var children = $(parent).children();
            children.addClass('hider');

            $(parent).viewportChecker({
            classToAdd: 'visible',
            offset: 100,
            callbackFunction: function(elem) {
                var elements = elem.find(children),
                    i = 0;
                interval = setInterval(function(){
                    var time = i/4;
                    elements.eq(i++).addClass('visible animated fadeIn')
                    .css( '-webkit-animation-delay', time+'s' )
                    .css('-moz-animation-delay', time+'s')
                    .css('-ms-animation-delay', time+'s')
                    .css('-o-animation-delay', time+'s')
                    .css('animation-delay', time+'s');

                    if(i==elements.length) {
                        clearInterval(interval);
                    }
                },0);
            }
            });

            $('.anim').viewportChecker({
                classToAdd: 'visible animated fadeIn',
                offset: 100
               });
            $('.anim_left').viewportChecker({
                classToAdd: 'visible animated fadeInLeft',
                offset: 100
               });
            $('.anim_right').viewportChecker({
                classToAdd: 'visible animated fadeInRight',
                offset: 100
               });
            $('.anim_up').viewportChecker({
                classToAdd: 'visible animated fadeInUp',
                offset: 100
               });
    }

    var isMobile = window.matchMedia("only screen and (max-width: 767px)");

    if (isMobile.matches) {
            $('.anim_parent').children().addClass("visible");
            $('.anim,.anim_left,.anim_right,.anim_up').addClass("visible");
    }
    else{
          //  scroll_animations();
        }





});


// BOOTSTRAP WP
jQuery( document ).ready( function( $ ) {

    $( 'input.search-field' ).addClass( 'form-control' );

    // the search widget
    $( 'input.search-field' ).addClass( 'form-control' );
    $( 'input.search-submit' ).addClass( 'btn btn-default' );

    $( '.widget_rss ul' ).addClass( 'media-list' );

    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul' ).addClass( 'nav' );

    $( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');

    $( 'table#wp-calendar' ).addClass( 'table table-striped');
} );



//Smooth Scroll
jQuery( document ).ready( function( $ ) {
  var hash = window.location.hash;

  $(function() {
    //window.scrollTo(0, 0);
    if (hash) {
      setTimeout(function() {
        smooth_scroll_anchor()
      }, 500);
    }

  });

  function smooth_scroll_anchor() {
    var target = $(hash);

    // Does a scroll target exist?
    if (target.length) {
      // Only prevent default if animation is actually gonna happen
      $('html, body').animate({
        scrollTop: target.offset().top - 120
      }, 300, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }
  }
} );
