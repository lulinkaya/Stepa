<?php 
// создание произвольной страницы используя плагин acf 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'микроразметка',
		'menu_title'	=> 'микроразметка',
		'menu_slug' 	=> 'schema.org',
		'capability'	=> 'edit_posts',
		// 'redirect'		=> false
	));
	
};

?>