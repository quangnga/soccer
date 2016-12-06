(function($) {
    'use strict';

    var $flashContainer = $('#turbo-tribble');
    var namespace;

    $flashContainer.on('ddi.flash', function() {
        scrollToTop();
        hideAfterTimeout();
    });

    namespace = {
        setFlash : function (message, type) {
            var flashClass;

            $flashContainer
                .empty()
                .show();

            switch(type) {
                case 'success':
                    flashClass = 'success';
                    break;
                case 'error':
                    flashClass = 'error';
                    break;
                default:
                    flashClass = 'notice';
            }

            $flashContainer.append('<div class="tribble tt-'+ flashClass +'">'+ message +'</div>');
            $flashContainer.trigger('ddi.flash');
        }
    };

    function isFlashMessage(element) {
        return $.trim(element.html())
    }

    function hideAfterTimeout(timeInMs) {
        var timeout = timeInMs || 4000;

        setTimeout(function() {
            $flashContainer.animate({
                height: "toggle"
            }, 500, function() {
                $flashContainer.empty();
            });
        }, timeout);
    }

    function scrollToTop(timeInMs) {
        var delay = timeInMs || 700;

        $('body, html').animate({
            scrollTop: 0
        }, delay);
    }

    if (isFlashMessage($flashContainer)) {
        $flashContainer.trigger('ddi.flash');
    }

    window.$tt = namespace;
})(jQuery);