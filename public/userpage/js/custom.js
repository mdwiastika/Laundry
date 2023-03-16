(function ($) {
    "use strict";

    // COUNTER NUMBERS
    jQuery(".counter-thumb").appear(function () {
        jQuery(".counter-number").countTo();
    });

    // BACKSTRETCH SLIDESHOW
    $(".hero-section").backstretch(
        [
            "/userpage/images/image2.jpg",
            "/userpage/images/img1.jpg",
            "/userpage/images/image3.jpg",
        ],
        { duration: 2000, fade: 750 }
    );

    // CUSTOM LINK
    $(".smoothscroll").click(function () {
        var el = $(this).attr("href");
        var elWrapped = $(el);

        scrollToDiv(elWrapped);
        return false;

        function scrollToDiv(element) {
            var offset = element.offset();
            var offsetTop = offset.top;
            var totalScroll = offsetTop - navheight;

            $("body,html").animate(
                {
                    scrollTop: totalScroll,
                },
                300
            );
        }
    });
})(window.jQuery);
