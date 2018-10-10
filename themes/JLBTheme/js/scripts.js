jQuery(document).ready(function( $ ) {
  // on scroll watch header
$(window).on("scroll ready", function() {
  if ( $(window).scrollTop() > 50 ) {
    $("header").addClass("active");
    $('.sub-menu').addClass('scrollMenu');
  } else {
     $("header").removeClass("active");
     $('.sub-menu').removeClass('scrollMenu');
  }
});

// mobile menu toggle
$('.mobile-button').click(function() {
  // change bar for animation
  $('.bar').removeClass('back');
  if ($('.bar').hasClass('change')) {
    $('.bar').addClass('back');
  }
  $('.bar').toggleClass('change');

  // toggle mobile menu
  $('.mobile-menu').toggleClass('active');
  $('.bar').toggleClass('active');
  $('header').find('.logo').toggleClass('active');
  $('.header-top').toggleClass('active');

  // html overflow
  $('html').toggleClass('mobileScroll');

  if ( $(window).scrollTop() > 50 && $('header').hasClass('active') ) {
    $('header').removeClass('active');
  } else if ($(window).scrollTop() > 50 && !$('header').hasClass('active')){
    $('header').addClass('active');
  }
});

// off click closes any sub menu
$('html').click(function(e) {
  if ( !$(e.target).hasClass('menu-item-has-children') && e.target.tagName.toLowerCase() !== 'a' ) {
    $('.sub-menu').removeClass('active');
    $('.menu-item-has-children').removeClass('rotate');
  }
});

// sub menu display
$('.menu-item-has-children > a').click(function(e) {
  e.preventDefault();
  $(this).parent().toggleClass('rotate');
  $(this).parent().siblings().children('.sub-menu').removeClass('active');
  $(this).parent().siblings('.menu-item-has-children').removeClass('rotate');
  $(this).siblings('.sub-menu').toggleClass('active');
});

// detect browsers for easy cross-browser styling
function detectBrowser() {
  var ua = window.navigator.userAgent;

  // detect chrome
  var chrome = ua.indexOf('Chrome/');
  if (chrome > 0) {
    return 'is-chrome';
  }

  // detect firefox
  var mozilla = ua.indexOf('Firefox');
  if (mozilla > 0) {
    return 'is-firefox';
  }

  // detect ie
  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
      return 'is-trident';
  }

  // detect edge
  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
     return 'is-edge';
  }

  // other browser
  return 'not-IE';
}
$('body').addClass(detectBrowser());

// substrings
$('.two-blog-content-inner').text(function(index, currentContent) {
  return currentContent.substr(0,750) + '...';
});

$('.blog-body').text(function(index, currentContent) {
  return currentContent.substr(0,395) + '...';
});

// sliders
$('.hero-slider').slick({
  infinite: true,
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 6000,
  responsive: [
    {
      breakpoint: 1440,
      settings: {
        centerMode: false,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$('.one-content-container').slick({
  // vertical: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  appendArrows: $('.load-more'),
  prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fal fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><i class='fal fa-angle-right' aria-hidden='true'></i></button>",
});

// Event Widget Functions
$('.event-grid').click(function() {
  if ($('.event-grid').hasClass('active')) {
    return;
  } else {
    $('.event-grid').addClass('active');
    $('.event-list').removeClass('active');
    $('.event-widget-cards-container').toggleClass('active');
  }
});

$('.event-list').click(function() {
  if ($('.event-list').hasClass('active')) {
    return;
  } else {
    $('.event-list').addClass('active');
    $('.event-grid').removeClass('active');
    $('.event-widget-cards-container').toggleClass('active');
  }
});

});//close all jquery
