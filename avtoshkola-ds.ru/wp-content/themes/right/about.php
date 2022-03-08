
<!-- Template Name: О нас 
Template Post Type: page, product
 -->

<?php function fill_alt($buffer) {

    preg_match_all("/<img (.*?)\/>/", $buffer, $images);

    if(!is_null($images)) {

        foreach($images[1] as $index => $value) {

            if(!preg_match("/alt=/", $value)) { // Если у изображения нет alt

                preg_match("/src=\"(.*?)\"/", $images[0][$index], $matches);

                $image_name = basename($matches[1]);
                $image_name = preg_replace("/\.[^.]+$/", "", $image_name); // Имя изображения без расширения
                $buffer = str_replace($images[0][$index], str_replace("<img", '<img alt="'.$image_name.'"', $images[0][$index]), $buffer);

            } elseif(preg_match("/alt=\"\"/", $value)) { // Если у изображения есть alt, но он пустой

                preg_match("/src=\"(.*?)\"/", $images[0][$index], $matches);

                $image_name = basename($matches[1]);
                $image_name = preg_replace("/\.[^.]+$/", "", $image_name); // Имя изображения без расширения
                $buffer = str_replace($images[0][$index], str_replace(array("<img", "alt=\"\""), array('<img alt="'.$image_name.'"', ""), $images[0][$index]), $buffer);

            }

        }

    }

    return $buffer;

}

ob_start("fill_alt");
?>

<?php get_template_part('template-parts/header')?>
<!-- Up -->
	<section class="up" id="up">
		<div class="container">
			<h1 class="title">
				<?php
				if (is_category()) {
				    echo get_queried_object()->name;
				}  else {
				    the_title();
				}
				?>
			</h1>
		</div>
	</section>
<!-- Face -->
	<section class="faces" id="faces-one">
		<div class="container">
			<div class="face">
				<div class="face__item">
					<p class="face__title">
						Автошкола для обучения
					</p>
					<p class="face__text">
						Автошкола (Северо-восточный округ) ул. Нестерова, 15
					</p>
					<div class="face__cont">
						<?php echo do_shortcode('[contact-form-7 id="32" title="Главная форма"]')?>
					</div>
				</div>
			</div>
		</div>
		<div id="map">
			<div class="acf-map">
				<?php $the_query = new WP_Query( array(
				    'post_type' => 'avtoshkola',
				        ) );?>
			    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<div class="marker" data-lat="<?php the_field('map_lat'); ?>" data-lng="<?php the_field('map_lng'); ?>">
						<h4><?php the_title(); ?></h4>
						<a href="<?php the_permalink(); ?>">Ссылка на страницу</a>
						</div>
				    <?php endwhile; ?>
			    <?php wp_reset_query(); ?>
		    </div>
		</div>
	</section>
<!-- About -->
	<section class="about" id="about">
		<div class="container">
			<div class="take-info">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				<div class="take-info__cont">
					<div class="sidebar">
						<ul class="sidebar__list">
                            <?php if( have_rows('menu', 'option') ): ?>
                                <?php while( have_rows('menu', 'option') ): the_row();
                                    $text = get_sub_field('menu_text', 'option');
                                    $link = get_sub_field('menu_link', 'option');
                                    $icon = get_sub_field('menu_icon', 'option');
                                    ?>
                                    <li>
                                        <a href="<?php echo $link; ?>">
                                            <img src="<?php echo $icon;?>" alt=""/>
                                            <p><?php echo $text; ?></p>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
						</ul>
						<div class="sidebar__contact">
							<a href="tel:88007587702">
								<img src="<?php bloginfo('template_directory')?>/img/tel.png" alt=""/>
								<p>8 800 758 77 02</p>
							</a>
							<a href="">
								<img src="<?php bloginfo('template_directory')?>/img/clock.png" alt=""/>
								<p>c 8:00 до 20:00</p>
							</a>
							<a href="mailto:info@985.su">
								<img src="<?php bloginfo('template_directory')?>/img/mail.png" alt=""/>
								<p>info@985.su</p>
							</a>
						</div>
						<div class="sidebar__form">
							<?php echo do_shortcode('[contact-form-7 id="96" title="Получить права"]')?>
						</div>
					</div>
					<div class="contant">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Prasents -->
	<section class="prasents">
		<div class="container">
			<div class="prasent">
				<p class="prasent__title title">
					<?php the_field('theory_title', 'option'); ?>
				</p>
				<p class="prasent__text">
					<?php the_field('theory_text', 'option'); ?>
				</p>
				<button class="prasent__btn btn form-up">
					Начать обучение
				</button>
			</div>
		</div>
	</section>
<!-- Licenses -->
	<section class="licenses" id="licenses">
		<div class="container">
			<div class="license">
				<p class="license__title title">
					Лицензии
				</p>
				<div class="license__cont">
					<?php if( have_rows('license', 'option') ): ?>
		                <?php while( have_rows('license', 'option') ): the_row();
		                   $icon = get_sub_field('license_photo', 'option');
		                    ?>
		                    <div class="license__item">
		                    	<img src="<?php echo $icon; ?>" alt=""/>
		                    </div>
		                <?php endwhile; ?>
		            <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<!-- Forms -->
	<section class="forms" id="forms">
		<div class="container">
			<div class="form">
				<p class="form__title title">
					Записаться на обучение
				</p>
				<p class="form__text">
					Заполните форму и наш оператор свяжется с вами
				</p>
				<div class="form__cont">
					<input type="text" class="form__inp" placeholder="Ваше имя">
					<input type="text" class="form__inp" placeholder="Ваш телефон">
					<input type="text" class="form__inp" placeholder="Ваш E-mail">
					<button class="form__bnt btn">
						Отправить
					</button>
				</div>
			</div>
		</div>
	</section>
<!-- Instructors -->
	<section class="instructors" id="instructors">
		<div class="container">
			<div class="instru">
				<p class="instru__title title">
					Инструкторы
				</p>
				<div class="instru__cont">
					<?php if( have_rows('instruc', 'option') ): ?>
		                <?php while( have_rows('instruc', 'option') ): the_row();
		                   $icon = get_sub_field('instruc_photo', 'option');
		                   $name = get_sub_field('instruc_name', 'option');
		                   $text = get_sub_field('instruc_text', 'option');
		                    ?>
		                    <div class="instru__item">
								<img src="<?php echo $icon; ?>" alt="" class="instru__img"/>
								<p class="instru__name">
									<?php echo $name; ?>
								</p>
								<p class="instru__text">
									<?php echo $text; ?>
								</p>
							</div>
		                <?php endwhile; ?>
		            <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<!-- Face -->
	<section class="faces faces-two" id="faces-two">
		<div class="container">
			<div class="face">
				<div class="face__item">
					<p class="face__title">
						Автошкола для обучения
					</p>
					<p class="face__text">
						Автошкола (Северо-восточный округ) ул. Нестерова, 15
					</p>
					<div class="face__cont">
						<?php echo do_shortcode('[contact-form-7 id="32" title="Главная форма"]')?>
					</div>
				</div>
			</div>
		</div>
		<div id="map-down">
			<div class="acf-map">
				<?php $the_query = new WP_Query( array(
				    'post_type' => 'avtoshkola',
				        ) );?>
			    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<div class="marker" data-lat="<?php the_field('map_lat'); ?>" data-lng="<?php the_field('map_lng'); ?>">
						<h4><?php the_title(); ?></h4>
						<a href="<?php the_permalink(); ?>">Ссылка на страницу</a>
						</div>
				    <?php endwhile; ?>
			    <?php wp_reset_query(); ?>
			</div>
		</div>
	</section>
<?php get_template_part('template-parts/footer')?>