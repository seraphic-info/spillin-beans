$('.mb_slider').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true,
            margin: 0,
            dots: false
        },
        600: {
            items: 2,
            nav: true,
            margin: 0,
            dots: false
        },
        768: {
            items: 2,
            nav: true,
            margin: 0,
            dots:false
        },


        1000: {
            items: 3,
            nav: false,
            dots: true,
            margin: 0,
            loop: true
        }
    }
});