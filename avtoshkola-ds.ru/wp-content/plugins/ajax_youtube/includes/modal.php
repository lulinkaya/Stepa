<?php
// выполняем функцию перед wp_footer
add_action( 'wp_footer', 'footer_modal' );
function footer_modal(){
	echo '<div id="ajax_youtube_modal" class="ajax_youtube_modal ay_modal" >
</div>';
//	<iframe id="ajax_youtube_iframe" src="" style="width: 100%; height: 100%;"></iframe>
}
?>