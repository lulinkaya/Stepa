<?php 
// удаление лишней микроразметки hentry
function hentry_class_remover( $classes ) {
  $classes = array_diff( $classes, array( 'hentry' ) );
  return $classes;
}
add_filter( 'post_class', 'hentry_class_remover' );
 ?>