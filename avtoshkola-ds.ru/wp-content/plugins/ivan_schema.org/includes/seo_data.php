<?php
// Данные из плагина yeoast
// v 1.1 07.02.2018
// require_once 'includes/seo_data.php';
// подключение в тему
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/wpfooter.php';
// подключениев functions.php
// require_once 'includes/seo_data.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/wpheader.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/organization.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/website.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/localbusiness.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/wpsidebar.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/wpfooter.php';
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/
/**
 * Возвращает seo данные, сохранённые для таксономий плагином Yoast SEO
 *
 * @param string $seo_item метаполе, которое требуется получить (title, desc, linkdex, content_score, focuskw)
 * @param integer $id_tax ID таксономии
 * @param string $tax_type тип таксономии (category, post_tag и другие)
 *
 * @return   string|boolean      данные из указанного метаполя или false, если с такими данными записи нет
 */

// подготовка контента к передаче, очистка отлишних символов, оставляем только текст
function clean_content( $content, $substr = false ) {
// $content - передаваемый контент
// $substr - количество символов для обрезки строки

	$content = strip_shortcodes( $content ); //чистим от шорткодов
	$content = strip_tags( $content ); //чистим от тегов
	$content = addslashes( $content ); //чистим от спец символов

// Если указана переменнная
	if ( $substr ) {
		$content = iconv_substr( $content, 0, $substr, "UTF-8" );//Обрезаем строку
	}

	return $content;
}

function get_wpseo_meta_tax( $seo_item, $id_tax, $tax_type ) {
	if ( ! $seo_item || ! $id_tax || ! $tax_type ) {
		return false;
	}
	$seo_seo_items = get_option( 'wpseo_taxonomy_meta' );
	if ( empty( $seo_seo_items[ $tax_type ][ $id_tax ][ 'wpseo_' . $seo_item ] ) ) {
		return false;
	}

	return $seo_seo_items[ $tax_type ][ $id_tax ][ 'wpseo_' . $seo_item ];
}

// выбор протокола http или https
function protocol() {
	return get_field( 'shema_protocol', 'options' );
}

function seo_info( $type = '', $postID_func = '' ) {
// зависимости от сео плагина, пока что выбирается вручную
// yeast || all_seo
	$seo_plagin = get_field( 'shema_seo_plugin', 'options' );

// добавляемые данные
	// к названии страницы
	$add_title_page = '';
	// к названии записи
	$add_title_post = '';
	// к описании страницы
	$add_desc_page = '';
	// к описании записи
	$add_desc_post = '';
	// описание по умолчанию, если выбранное пусто
	$desc_default = get_field( 'shema_description', 'options' );
	// добавляем к текущиму кейвордсу
	$key_default = '';
	if ( $seo_plagin === 'yeast' ) {

		// получение сео данных
		if ( is_category() ) {
			// категория
			$queried_object = get_queried_object();
			$taxonomy       = $queried_object->taxonomy;
			$term_id        = $queried_object->term_id; //26

			$term = get_term( $term_id, $taxonomy );
			$name = $term->name;

			// $my_title = $term_id;
			$my_title = $name;//+

			// $my_title = get_wpseo_meta_tax('title',$term_id,'category');// - выводит тайтл записи
			// $my_title = str_replace('%%term_title%%', $name, $my_title);

			$my_description = get_wpseo_meta_tax( 'desc', $term_id, 'category' );
			$my_description = str_replace( '%%term_title%%', $name, $my_description );

			$my_key = get_wpseo_meta_tax( 'focuskw', $term_id, 'category' );
			$my_key = str_replace( '%%term_title%%', $name, $my_key );
		} else {
			// запись
			$my_title       = get_post_meta( $postID_func, "_yoast_wpseo_title", true );
			$my_description = get_post_meta( $postID_func, "_yoast_wpseo_metadesc", true );
			$my_key         = get_post_meta( $postID_func, "_yoast_wpseo_focuskw", true );

			if ( ! $my_title ) {
				$my_title = get_the_title( $postID_func ) . $add_title_page;
			}

			// описание по умолчанию
			if ( ! $my_description ) {
				$my_description = $add_desc_post;
			}
		}
		// данные от yeast
	} elseif ( $seo_plagin === 'all_seo' ) {
		// запись
		$my_title       = get_post_meta( $postID_func, "_aioseop_title", true );
		$my_description = get_post_meta( $postID_func, "_aioseop_description", true );
		$my_key         = get_post_meta( $postID_func, "_aioseop_keywords", true );

		// описание по умолчанию
		if ( ! $my_description ) {
			$my_description = $add_desc_post;
		}

	}//выбор seo плагина
	if ( ! $my_title ) {
		$my_title = get_field( 'shema_title', 'options' );
	}
	// если косячное название типа %%title%% вставляем тайтл страницы
	if ( $my_title == '%%title%%' ) {
		$my_title = wp_get_document_title();
	}
	// описание по умолчанию
	if ( ! $my_description ) {
		$my_description = $desc_default;
	}
	// ключ по умолчанию
	// if (!$my_key) {
	// 	$my_key = $my_title;
	// };
	$my_key  .= $key_default;
	$resoult = '';
	if ( $type === 'title' ) {
		$resoult = $my_title;

	} elseif ( $type === 'desc' ) {
		$resoult = $my_description;

	} elseif ( $type === 'key' ) {
		$resoult = $my_key;

	} elseif ( $type === 'year' ) {
		$resoult = date( 'Y' );

	} elseif ( $type === 'logo' ) {
		$resoult = image_downsize( get_field( 'shema_logo', 'options' )['ID'], 'full' )['0'];

	} elseif ( $type === 'logo_w' ) {
		$resoult = image_downsize( get_field( 'shema_logo', 'options' )['ID'], 'full' )['1'];

	} elseif ( $type === 'logo_h' ) {
		$resoult = image_downsize( get_field( 'shema_logo', 'options' )['ID'], 'full' )['2'];

	} elseif ( $type === 'tel' ) {
		$resoult = get_field( 'shema_tel', 'options' );

	} elseif ( $type === 'email' ) {
		$resoult = get_field( 'shema_email', 'options' );

	} elseif ( $type === 'adress' ) {
		$resoult = get_field( 'shema_adress', 'options' );

	} elseif ( $type === 'country' ) {
		$resoult = get_field( 'shema_country', 'options' );

	} elseif ( $type === 'adress_sity' ) {
		$resoult = get_field( 'shema_adress_sity', 'options' );

	} elseif ( $type === 'adress_region' ) {
		$resoult = get_field( 'shema_adress_region', 'options' );

	} elseif ( $type === 'index' ) {
		$resoult = get_field( 'index', 'options' );

	} elseif ( $type === 'company' ) {
		$resoult = get_field( 'shema_company', 'options' );

	} elseif ( $type === 'price_min' ) {
		$resoult = get_field( 'shema_price_min', 'options' ) . ' ' . get_field( 'shema_value', 'options' );

	} elseif ( $type === 'price_max' ) {
		$resoult = get_field( 'shema_price_max', 'options' ) . ' ' . get_field( 'shema_value', 'options' );

	} elseif ( $type === 'desc_default' ) {
		$resoult = $desc_default;

	}

	return $resoult;
}

//seo_info

// add_action( 'wp_footer', 'my_popup', 30 );
// function my_popup(){
// include plugin_dir_path( __FILE__ ) . '/microrazmetka/wpfooter.php';
// };

//todo function get_image_id
function get_image_id( $image_url ) {

	global $wpdb;
	// Если нет url - вернем false

	if ( '' == $image_url ) {
		return false;
	}
	// получим директорию загрузки
	$upload_dir_paths = wp_upload_dir();

	// удаляем лишнее из адреса картинки(например размеры миниатюры)
	$image_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', trim( $image_url ) );

	// удаляем путь загрузки
	$image_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $image_url );

	// поиск картинки в базе
	$attachment = $wpdb->get_results( "SELECT $wpdb->posts.ID FROM $wpdb->posts WHERE $wpdb->posts.guid LIKE '%{$image_url}';", ARRAY_N );

	return ( ! empty( $attachment[0][0] ) ) ? $attachment[0][0] : false;

}

//todo function first_post_image() ВЫВОД ПЕРВОЙ КАРТИНКИ С ПОСТА
function first_post_image() {
	global $post, $posts;
	$first_img = [];
	ob_start();
	ob_end_clean();
	$output           = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post( $post->ID )->post_content, $matches );
	$first_img['src'] = $matches[1][0];

	return $first_img;
}


//todo function footer_schema() вставляем все шаблоны микроразметки в одну функцию
function footer_schema() {
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/webpage.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/organization.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/localbusiness.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/wpsidebar.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/website.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/wpheader.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/wpfooter.php';

	// if (is_single() || is_page()) {
	$post_id           = get_queried_object()->ID;
	$this_post         = get_post( $post_id );
	$this_post_content = get_post( $post_id )->post_content;

	// Если есть миниатюра
	if ( has_post_thumbnail( $post_id ) ) {
		$thumbnail_id     = get_post_thumbnail_id( $post_id );
		$image_attributes = wp_get_attachment_image_src( $thumbnail_id );
		$arr_thumbnail    = array(
			'src'    => $image_attributes[0],
			'width'  => $image_attributes[1],
			'height' => $image_attributes[2],
		);
		// если миниатюры нет - выводим лого
	} elseif ( ! empty( first_post_image() ) ) {
		$arr_img_content = image_downsize(get_image_id( first_post_image()['src'] ), 'full');
		$arr_thumbnail = array(
			'src'    => $arr_img_content[0],
			'width'  => $arr_img_content[1],
			'height' => $arr_img_content[2],
		);
	} else {
		$arr_thumbnail = array(
			'src'    => seo_info( 'logo' ),
			'width'  => seo_info( 'logo_w' ),
			'height' => seo_info( 'logo_h' ),
		);
	};


	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/article.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/creativework.php';
	include plugin_dir_path( __FILE__ ) . '/microrazmetka/jsonld/ImageObject.php';
	// };
	// echo "---";
	// echo strip_shortcodes($this_post_content);
	// echo "---";
}


// выполняем функцию перед wp_footer
add_action( 'wp_footer', 'footer_schema' );
?>