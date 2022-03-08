
<!-- Template Name: Главная
Template Post Type: post, page, product
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
<!-- Face -->
	<section class="faces faces-one" id="faces-one">
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
<!-- Ranges -->
	<section class="ranges" id="ranges">
		<div class="container">
			<div class="range">
				<img src="<?php bloginfo('template_directory')?>/img/range-photo.png" alt="" class="range__picturs"/>
				<h1 class="range__title title">
					Автошколы Москвы
				</h1>
				<div class="range__container responsive">
					<?php $the_query = new WP_Query( array(
						'orderby' => 'rand',
					    'post_type' => 'avtoshkola',
					        ) );?>
				    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					    <div class="range__cont">
		                    <p class="range__place">
		                       <?php the_field('auto_name'); ?>
		                    </p>
		                    <div class="range__item">
								<img src="<?php the_field('auto_img'); ?>"/>
								<div class="range__contant">
									<p class="range__addres"><?php the_field('auto_place'); ?></p>
									<p class="range__metro"><?php the_field('auto_metro'); ?></p>
									<p class="range__time">
										<span><img src="<?php bloginfo('template_directory') ?>/img/clock.png" alt=""/></span>
										<span><?php the_field('auto_time'); ?></span>
									</p>
									<div class="range__info">
										<?php if( have_rows('auto_item') ): ?>
					                        <?php while( have_rows('auto_item') ): the_row();
					                           $text = get_sub_field('auto_text', 'option');
					                            ?>
					                            <p class="range__text">
					                                <?php echo $text; ?>
					                            </p>
					                        <?php endwhile; ?>
					                    <?php endif; ?>
									</div>
				                    <div class="range__down">
				                    	<a href="<?php the_permalink() ?>" class="range__link">
											Посмотреть
										</a>
										<span class="range__link form-up">
											Запись
										</span>
				                    </div>
								</div>
							</div>
		            	</div>
					    <?php endwhile; ?>
				    <?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>
<!-- Prasents -->
	<section class="prasents" id="prasents">
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
<!-- Information -->
	<section class="information" id="informa tion">
		<div class="container">
			<div class="info">
				<p class="info__title title">
					Обучение на права в автошколе
				</p>
				<div class="info__cont">
					<div class="info__part">
                        <p><?php the_field('info', 'option'); ?></div></p>
	                </div>
				</div>
			</div>
		</div>
	</section>
<!-- Services -->
	<section class="services" id="services">
		<div class="container">
			<div class="serv">
				<p class="serv__title title">
					Наши услуги
				</p>
				<div class="serv__cont">
					<?php if( have_rows('serv', 'option') ): ?>
                        <?php while( have_rows('serv', 'option') ): the_row();
                           $text = get_sub_field('serv_text', 'option');
                           $link = get_sub_field('serv_link', 'option');
                            ?>
                            <a href="<?php echo $link; ?>" class="serv__item">
								<p>
									<?php echo $text; ?>
								</p>
							</a>
                        <?php endwhile; ?>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<!-- Prices -->
	<section class="pices" id="prices">
		<div class="container">
			<div class="pice">
				<p class="pice__title title">
					Цены
				</p>
				<?php the_field('price', 'option'); ?>
			</div>
		</div>
	</section>
<!-- Offers -->
	<section class="offers" id="offers">
		<div class="container">
			<div class="offer">
				<p class="offer__title title">
					Спецпредложение
				</p>
				<div class="offer__cont">
					<?php if( have_rows('offer', 'option') ): ?>
                            <?php while( have_rows('offer', 'option') ): the_row();
                               $name = get_sub_field('offer_title', 'option');
                               $text = get_sub_field('offer_text', 'option');
                                ?>
                                <div class="offer__item">
                                    <p class="offer__name">
                                        <?php echo $name; ?>
                                    </p>
                                    <p class="offer__text">
                                        <?php echo $text; ?>
                                    </p>
                                </div>
                            <?php endwhile; ?>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<!-- Advantages -->
	<section class="advantages" id="advantages">
		<div class="container">
			<div class="advantage">
				<img src="<?php bloginfo('template_directory') ?>/img/advantage.png" alt="" class="advantage__picturs"/>
				<p class="advantag__title title">
					Преимущества автошколы
				</p>
				<div class="advantage__cont">
					<?php if( have_rows('advan', 'option') ): ?>
		                <?php while( have_rows('advan', 'option') ): the_row();
		                   $text = get_sub_field('advan_text', 'option');
		                   $icon = get_sub_field('advan_icon', 'option');
		                    ?>
		                    <div class="advantage__item">
								<img src="<?php echo $icon; ?>" alt="" class="advantage__icon"/>
								<p><?php echo $text; ?></p>
							</div>
		                <?php endwhile; ?>
		            <?php endif; ?>
				</div>
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
					<?php echo do_shortcode('[contact-form-7 id="95" title="Вторая форма"]')?>
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
<!-- Text -->
	<section class="texts" id="texts">
		<div class="container">
			<div class="text">
				<p>
					<?php the_field('text'); ?>
				</p>
			</div>
		</div>
	</section>
<?php get_template_part('template-parts/footer')?>