(function ($) {

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function ($block) {
        var count = $(".slides .slide").children().length;
        console.log(count);

        $block.find('.slides').slick({
            dots: false,
            arrows: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            initialSlide: 10 - 3,
            // centerMode: true,
            // variableWidth: true,
            // adaptiveHeight: true,
            // focusOnSelect: true,
            //fade: true,
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        arrows: false
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]



        });
    };

    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.block-slider-post').each(function () {
            initializeBlock($(this));
        });
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=slider-post', initializeBlock);
    }

})(jQuery);