////////////////////////////////////////
//        Mean Menu                   //
////////////////////////////////////////


// you can change the settings in \firetoss_seed\js\jquery.meanmenu.js

(function ($) {
    $(document).ready(function () {


////////////////////////////////////////
//        Mean Menu                   //
////////////////////////////////////////
        $('header nav').meanmenu();

        //
        // var icons = {
        //     header: "fa fa-plus",
        //     activeHeader: "fa fa-minus"
        // };
        // $( "#accordion" ).accordion({
        //     icons: icons,
        //     heightStyle: "content",
        //     collapsible: true,
        //     active: false,
        // });

            $('#accordion > h3').click(function() {
                $(this).next().toggle('slow');
                return false;
            }).next().hide();


////////////////////////////////////////
//        Owl Carousel                //
////////////////////////////////////////


        $('.owl-carousel-content').owlCarousel({
            dots: true,
            autoplay: false,
            items: 4
        });

        $('.owl-carousel-hero').owlCarousel({
            dots: true,
            autoplay: false,
            items: 1
        });

});
})(jQuery);


////////////////////////////////////////
//        Scroll Reveal               //
////////////////////////////////////////

// https://github.com/jlmakes/scrollreveal
//
// // Changing the defaults
//     window.sr = ScrollReveal({ reset: true });
//
// // Customizing a reveal set
// sr.reveal('.foo', { duration: 200 });
//
// // Basic usage and variations
// window.sr = ScrollReveal();
// sr.reveal('.foo');
// sr.reveal('.bar');
//
// // Is the same as...
// window.sr = ScrollReveal().reveal('.foo, .bar');



