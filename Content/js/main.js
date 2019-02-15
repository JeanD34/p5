/*global $, jQuery, alert*/
$(document).ready(function () {

    'use strict';

    // ========================================================================= //
    //  //SMOOTH SCROLL
    // ========================================================================= //


    $(document).on("scroll", onScroll);

    $('a[href*=#]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function () {
            $(this).removeClass('active');
            if ($(window).width() < 768) {
                $('.nav-menu').slideUp();
            }
        });

        $(this).addClass('active');

        var target_url = this.hash;
        var target = this.hash,
            menu = target;

        target = $(target);

        $('html, body').stop().animate({
            'scrollTop': target.offset().top
        }, 500, 'swing', function () {
            window.location = "index.php" + target_url;
            $(document).on("scroll", onScroll);
        });
    });


    function onScroll(event) {
        if ($('.home').length) {
            var scrollPos = $(document).scrollTop();
            $('nav ul li a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr('a[href*=#]'));
            });
        }
    }

    // ========================================================================= //
    //  //NAVBAR SHOW - HIDE
    // ========================================================================= //


    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 50) {
            $("#main-nav").slideDown(300);
        } else {
            $("#main-nav").slideUp(300);
        }
    });

    // ========================================================================= //
    //  // RESPONSIVE MENU
    // ========================================================================= //

    $('.responsive').on('click', function (e) {
        $('.nav-menu').slideToggle();
    });

    // ========================================================================= //
    //  Typed Js
    // ========================================================================= //

    var typed = $(".typed");

    $(function () {
        typed.typed({
            strings: ["Jean Descorps", "Développeur", "Celui qu'il vous faut"],
            typeSpeed: 100,
            loop: true,
        });
    });


    // ========================================================================= //
    //  Owl Carousel Services
    // ========================================================================= //


    $('.services-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        margin: 20,
        dots: true,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            900: {
                items: 4
            }
        }
    });

});
