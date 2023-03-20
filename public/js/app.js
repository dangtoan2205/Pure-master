$(document).ready(function() {
    $('.slider__img').slick({
        infinite: true,
        slidesToShow: 3,
        // arrows: true,
        // draggable: false, // block di khoe tay
        // slidesToScroll: 3
        // autoplay: true,
        // autoplaySpeed: 2000,
        // speed: 500,
        // fade: true,
        // cssEase: 'linear'
        nextArrow:`<button type='button' class='slick-next slick-arrow'><i class="fa-solid fa-chevron-right"></i></button>`,
        prevArrow:`<button type='button' class='slick-prev slick-arrow'><i class="fa-solid fa-chevron-left"></i></button>`,
      });
});