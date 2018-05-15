(function ($) {
    'use strict';

    function checkwpadminBar () {
        if($('#wpadminbar').length > 0) {
            var window_w = $(window).width(); 
            $('.mainmenu-area').css("top", "32px");
            if(window_w < 800) {
                $('.mainmenu-area').css("top", "45px");
            }
        }
    }
    
    function custom_wl(){
        $('.preloader-wrap').fadeOut(1000, function () {
            $('this').remove();
        });
    }    
    function custom(){
        $('.site_preloader').fadeOut(1000, function () {
            $('this').remove();
        });
        $('#primary-menu').slicknav({
            appendTo: '.menu_col',
            allowParentLinks: true
        });
    }
    
    $(document).ready(function () {
        custom();
        checkwpadminBar();
    });
    $(window).load(function () {
        custom_wl();
    });

    
})(jQuery);