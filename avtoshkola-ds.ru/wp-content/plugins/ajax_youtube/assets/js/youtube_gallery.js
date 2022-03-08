jQuery(document).ready(function ($) {
    $(".youtube").on('click', function () {
        // console.log('click of the image video gallery');

        var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
        var iframe = '<iframe frameborder="0" src="' + iframe_url + '" style="width: 100%; height: 100%;"></iframe>'
        // console.log(iframe);

        $('#ajax_youtube_modal').html(iframe).modal(); //заменяем содержимое
    })

    $('#ajax_youtube_modal').on($.modal.BEFORE_CLOSE, function () {
        // console.log('close modal');
        $('#ajax_youtube_modal').html(''); //удаляем содержимое
    });
});