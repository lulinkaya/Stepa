<?php
// Вывод видео роликов с ютуба по id используя шорткод theme_video_resp

// [theme_video_resp ids="qZnuI1Zrdbs, akweI7-LaWc"]
// функция выводит блоки по переданным id ютуб роликов
function theme_video_func($attrs){

// получаем размер
	$size = $attrs["size"];

// преобразуем строку в массив
	$ids = explode(',', $attrs['ids']);

// вывод контейнера
	$resoult= '<div class="video_resp_shablon">';

// перебор видео роликов
	foreach($ids as $id){

		//открываем контейнер для элемента
		$resoult .= '<div class="vrh_item">';

		// используем ранее написанный шорткод для вывода ютуб ролика
		$resoult .= do_shortcode('[theme_video_resp id="' . trim($id) . '" size="' . $size . '"]');

		//закрываем контейнер для элемента
		$resoult .= '</div>';
	};

// закрываем контейнер
	$resoult .= '</div>';

	$resoult .= '';
	return $resoult;
};

add_shortcode( 'theme_video', 'theme_video_func' );
?>