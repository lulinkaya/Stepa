<?php 
// Добавление страницы настроек в тему сайта wordpress с установленным плагином acf pro
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
	'page_title' => 'Шаблонные шорткоды видео',
	'menu_title' => 'Шаблонные шорткоды видео',
	'menu_slug' => 'custom_setting',
	'capability' => 'edit_posts',
	// 'redirect' => false
	));
	acf_add_options_sub_page(array(
	'page_title' => 'Шаблонные шорткоды видео',
	'menu_title' => 'Шаблонные шорткоды видео',
	'menu_slug' => 'shortkod_shablon',
	'parent_slug' => 'custom_setting',
	));

};

?>