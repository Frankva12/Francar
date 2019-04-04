var instance = M.Carousel.init({
  fullWidth: true,
  indicators: true
});

// Or with jQuery

$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true
});

//permite el play del carousel
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}