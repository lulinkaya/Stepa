jQuery(document).ready(function($) { //ожидание полной загрузки дом дерева и возвожность работы со знаком доллара, в движках
    // console.log($); //проверка работоспособности JQuery
    // console.log(jQuery.fn.jquery);//узнать версию JQuery



        //   	top_gm = $('.gm_lazy').offset().top;//получил высоту этого блока
        //   	top_gm = Math.round(top_gm);//убрали знаки после точки
        // wh = $(window).height();//высота окна браузера
        //   	top_gm = top_gm - wh;

        $(window).scroll(function() {

            // console.log('top_gm: ' + top_gm);
            // console.log('window: ' + $(this).scrollTop());

            // if ($(this).scrollTop() > $('.gm_lazy').offset().top) {
            if ($(this).scrollTop() > 400) {
    if ($('.gm_lazy').length > 0) {
                console.log('1 условие выполнено');
                $('#gm_maps').removeClass('gm_lazy');
                $('#gm_maps').append('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241958.3029244604!2d37.55779549385125!3d55.71009666201981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1552473197575" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');
                console.log('2 условие выполнено');
    }; //количество элементов в выборке

            };
        });


}); //конец ready