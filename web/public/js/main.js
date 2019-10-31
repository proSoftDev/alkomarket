(function($) {

    new WOW().init();

    $('.bar-btn').click(function () {
        $('.bar-list').show();
    });

    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.index').mask('000000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('+7(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });



    $(document).ready(function() {
        $('#carouselOne').owlCarousel({
            loop:true, //Зацикливаем слайдер
            margin:50, //Отступ от элемента справа в 50px
            nav:true, //Отключение навигации
            autoplay:false, //Автозапуск слайдера
            smartSpeed:1000, //Время движения слайда
            autoplayTimeout:2000, //Время смены слайда
            responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });
        $('#carouselTwo').owlCarousel({
            loop:true, //Зацикливаем слайдер
            margin:50, //Отступ от элемента справа в 50px
            nav:true, //Отключение навигации
            autoplay:false, //Автозапуск слайдера
            smartSpeed:1000, //Время движения слайда
            autoplayTimeout:2000, //Время смены слайда
            responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });

        $('#carouselFour').owlCarousel({
            loop:true, //Зацикливаем слайдер
            margin:50, //Отступ от элемента справа в 50px
            nav:false, //Отключение навигации
            autoplay:false, //Автозапуск слайдера
            smartSpeed:1000, //Время движения слайда
            autoplayTimeout:2000, //Время смены слайда
            responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    });

    /* OffCanvas Menu
    * ------------------------------------------------------ */
    var clOffCanvas = function() {

        var menuTrigger     = $('.header-menu-toggle'),
            nav             = $('.header-nav'),
            closeButton     = nav.find('.header-nav__close'),
            siteBody        = $('body'),
            mainContents    = $('section, footer');

        // open-close menu by clicking on the menu icon
        menuTrigger.on('click', function(e){
            e.preventDefault();
            // menuTrigger.toggleClass('is-clicked');
            siteBody.toggleClass('menu-is-open');
        });

        // close menu by clicking the close button
        closeButton.on('click', function(e){
            e.preventDefault();
            menuTrigger.trigger('click');
        });

        // close menu clicking outside the menu itself
       // siteBody.on('click', function(e){
         //   if( !$(e.target).is('.header-nav, .header-nav__content, .header-menu-toggle, .header-menu-toggle span') ) {
                // menuTrigger.removeClass('is-clicked');
           //     siteBody.removeClass('menu-is-open');
            //}
        //});

    };

    /* Initialize
    * ------------------------------------------------------ */
    (function ssInit() {
        clOffCanvas();
    })();


})(jQuery);
function add() {
    let x;
    x = document.getElementById("width").value;
    x++;
    document.getElementById("width").innerHTML = x;
// END

}

// TABS
$(document).ready(function(){

    $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    })

})

$(document).ready(function(){

    $('ul.story-tabs li').click(function(){
        var tab_id = $(this).attr('datas-tab');

        $('ul.story-tabs li').removeClass('active');
        $('.tab-contents').removeClass('active');

        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
    })

})
// END TABS

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});

$(document).ready(function(){
    $('#zoom-img').zoom({ on: 'click'});
});


$(function() {

    // login popup
    $('.cabinet__btn').on('click', function(e) {

        e.preventDefault();

        new WOW().init();

        var linkAttr = $(this).attr('href');
        $(linkAttr).closest('.popup-bg').show();
        $(linkAttr).show();
        $(linkAttr).addClass('slideInUp');

    });
    // login popup end

    // popup close
    $('.popup__close').on('click', function(e) {

        e.preventDefault();

        $(this).closest('.popup-bg').hide();

    });
    // popup close end

    $('.def-btns a').on('click', function(e) {

        e.preventDefault();

        new WOW().init();

        $('.popup-bg').hide();
        var linkAttr = $(this).attr('href');
        $(linkAttr).closest('.popup-bg').show();
        $(linkAttr).show();
        $(linkAttr).addClass('slideInUp');

    });

});