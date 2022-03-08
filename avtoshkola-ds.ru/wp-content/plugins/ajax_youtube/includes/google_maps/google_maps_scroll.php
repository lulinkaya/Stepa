<?php 
// вывод предварительной верстки, для обработки уже js
// функция выводит блоки по переданным id ютуб роликов
function gm_lazy_func($attrs){
		// $src=$attrs['src'];

// $iframe = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241958.3029244604!2d37.55779549385125!3d55.71009666201981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1552473197575" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';

		$result = '<div class="gm_lazy" id="gm_maps"></div>';
		return $result;
}

add_shortcode( 'gm_lazy', 'gm_lazy_func' );

?>