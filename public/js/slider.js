$(document).ready(function() {
    $('.slider-wrap').slick({
        infinite: true,
        slidesToShow: 1,
        // arrows: true,
        // draggable: false, // block di khoe tay
        // slidesToScroll: 3
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow:`<button type='button' class='slick-next slick-arrow'><i class="fa-solid fa-chevron-right"></i></button>`,
        prevArrow:`<button type='button' class='slick-prev slick-arrow'><i class="fa-solid fa-chevron-left"></i></button>`,
      });
});