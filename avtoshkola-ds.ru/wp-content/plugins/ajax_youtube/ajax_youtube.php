<?php
/**
 * Plugin Name: Ajax подгузка видео роликов
 * Description: Позволяет загружать ролик только после нажатия на на него, изначально грузиться только изображения этого ролика, что существенно снижает нагрузку при загрузке страницы. Вывод по id [theme_video ids="qZnuI1Zrdbs, akweI7-LaWc"]. Вывод из страницы настроек [theme_video_shablon metka="reklama"]. Одно видео определенной пропорции [theme_video_resp id="qZnuI1Zrdbs" size="16by9"]. Возможные варианты пропорций 16by9, 4by3, 2by1, 1by1
 * Plugin URI:  https://vk.com/ivan26ru
 * Author URI:  https://vk.com/ivan26ru
 * Author:      Иван
 * Version:     3.2
 *
 * Text Domain: Идентификатор перевода, указывается в load_plugin_textdomain()
 * Domain Path: Путь до файла перевода. Нужен если файл перевода находится не в той же папке, в которой находится текущий файл.
 *              Например, .mo файл находится в папке myplugin/languages, а файл плагина в myplugin/myplugin.php, тогда тут указываем "/languages"
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Network:     Укажите "true" для возможности активировать плагин по все сети сайтов (для Мультисайтовой сборки).
 */

// код
// добавление видео по клику

// для добавления поместить файл в папку
// добавить строку в файл functions.php require_once 'includes/youtube_click.php';
// добавить подобный шорткод на страницу
// [theme_video ids="qZnuI1Zrdbs, akweI7-LaWc, budU2vvJTYk, GcfKqPMiwwQ, OG9Cs6UFqiY, tiZei_2PUqk"] где ids это код видео с ютуба

// v2.2
// добавление страницы настроек и шаблонное использование на сайте, то есть в одном месте настроил видео и где надо они будут стоять одинаковые
// изменен тайтл страницы опций

// v2.3
// добавил шорткод theme_video_resp позволяющий выводить одиночные видео во всю ширину, пропорционально задавая высоту, по умолчанию это 16:9

// v2.4
// Изменил описания, добавил примеры шорткодов, закомментировал тестовый шорткод

// //Добавляем шорткод
// add_shortcode('test_shortcode','my_shortcode_output');
// //выводим на экран
// function my_shortcode_output($atts, $content = '', $tag){
//     $html = '';
//     $html .= '<p>Hello World</p>';
//     return $html;
// }

// v2.5
// Добавил возможность выбора пропорций для вывода нескольких видео
// так же добавлен адаптив, при размере экрана менее 600px в ряд становится по одному видео

// v2.6
// Исправлена значек плей, сделал ка как на ютубе

// v3.0
// удалил много js кода, сделал вывод изображений через php, добавил вывод в модальных окнах, добавил библиотеку jquery.modal. Исправил баг с дублированием внутреннего элемента. Сделал точный отступ в 10px между видео

// v3.1
// увеличил z-index модального окна

// v3.2
// изменил класс вызова модального окна с .modal на ay_modal. Сделал из за конфликта с бутстрапом

// страница настроек
require_once plugin_dir_path( __FILE__ ) . 'includes/acf_options/acf_page.php';

// Настройки группы полей для данной страницы
require_once plugin_dir_path( __FILE__ ) . 'includes/acf_options/acf_meta_options.php';

// извлечь id видео из url youtube
require_once plugin_dir_path( __FILE__ ) . 'includes/youtube/id_url_youtube.php';

// шорткод вывода видео блоков по переданным id роликов
require_once plugin_dir_path( __FILE__ ) . 'includes/youtube/shortcode_theme_video.php';

// шорткод вывода видео блоков по переданным id роликов
require_once plugin_dir_path( __FILE__ ) . 'includes/youtube/shortcode_video_responsive.php';

// функция подставки id видео в шорткод из страницы опций acf
require_once plugin_dir_path( __FILE__ ) . 'includes/youtube/shortcode_theme_video_shablon.php';

// гугл карта выходит когда скроллим вниз
require_once plugin_dir_path( __FILE__ ) . 'includes/google_maps/google_maps_scroll.php';


// Подключение стилей и скриптов
require_once plugin_dir_path( __FILE__ ) . 'includes/add_style_scripts.php';

// добавление HTML для модального окна
require_once plugin_dir_path( __FILE__ ) . 'includes/modal.php';