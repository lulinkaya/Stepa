<?php

function add_jquery_and_my_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'css_youtube', plugins_url('ajax_youtube') . '/assets/css/gallery.css?2' );
	wp_enqueue_script( 'youtube_gallery', plugins_url('ajax_youtube') . '/assets/js/youtube_gallery.js?2', array(), '1.0.0', true );
	wp_enqueue_script( 'gm_lazy', plugins_url('ajax_youtube') . '/assets/js/gm_lazy.js', array(), '1.0.0', true );

	//	modal
	wp_enqueue_style( 'jquery.modal.css', plugins_url('ajax_youtube') . '/assets/lib/modal/jquery.modal.css' );
	wp_enqueue_style( 'custom_modal.css', plugins_url('ajax_youtube') . '/assets/lib/modal/custom_modal.css' );
	wp_enqueue_script( 'jquery.modal.min.js', plugins_url('ajax_youtube') . '/assets/lib/modal/jquery.modal.min.js', array(), '1.0.0', true );

}
add_action( 'wp_footer', 'add_jquery_and_my_scripts' );

 ?>