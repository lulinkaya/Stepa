<?php
// функция подставки id видео в шорткод из страницы опций acf

// [theme_video_shablon metka="reklama"]
function theme_video_shortkod( $atts ) {
// проверяем есть ли в повторителе данные
	if ( have_rows( 'all_shortkod', 'option' ) ):
		// перебираем данные
		while ( have_rows( 'all_shortkod', 'option' ) ) : the_row();

			// отображаем вложенные поля
			$metka_field = get_sub_field( 'metka' );//id шорткода
			$all_video   = get_sub_field( 'all_video' );//повторитель со сборником видео
			$id_video    = [];//массив с id роликов

			$metka_arr[] = $metka_field;
			if ( $atts['metka'] == $metka_field ) { //совпадение с меткой

				// видео внутри
				foreach ( $all_video as $value ) {
					$id_video[] = YoutubeCode( $value['video'] );//id video помещаем в новый массив
				}
				// .видео внутри
				$id_video_str = implode( ",", $id_video );//преобразуем массив в строку и разделяем запятой

			};//.совпадение с меткой

		endwhile;
	endif;

//Вставляем указанную пропорцию видео
	$size = " size=\"" . $atts['size'] . "\"";

	return ( do_shortcode( '[theme_video ids="' . $id_video_str . '" . ' . $size . ']' ) );

}

//theme_video_shortkod

add_shortcode( 'theme_video_shablon', 'theme_video_shortkod' );

?>