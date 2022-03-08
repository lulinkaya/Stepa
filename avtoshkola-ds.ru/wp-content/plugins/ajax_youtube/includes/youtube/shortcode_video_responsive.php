<?php
// Вывод пропорционального размера видео роликов ютуба
// возможные размеры: 16by9, 4by3, 2by1, 1by1
// [theme_video_resp id="qZnuI1Zrdbs" size="16by9"]

// выводит одиночное видео

function theme_video_resp_func( $attrs ) {

// Определяем размер
	switch ( $attrs['size'] ) {
		case '16by9':
			$size = "16by9";
			break;
		case '4by3':
			$size = "4by3";
			break;
		case '2by1':
			$size = "2by1";
			break;
		case '1by1':
			$size = "1by1";
			break;

		default:
			$size = "16by9";
			break;
	}

	$result = '<div class="item-responsive item-' . $size . '">';
	$result .= '<div class="youtube content_responsive"  id="' . trim( $attrs["id"] ) . '" style="background-image:url(https://i.ytimg.com/vi/' . trim( $attrs["id"] ) . '/hqdefault.jpg)">'
	           . '<div class="play">'
	           . '<svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%">'
	           . '<path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path>'
	           . '</svg>'
	           . '</div></div>';
	$result .= '</div>';

	return $result;
}

add_shortcode( 'theme_video_resp', 'theme_video_resp_func' );
?>