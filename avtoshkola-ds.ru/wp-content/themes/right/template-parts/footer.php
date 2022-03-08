<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package right
 */

?>

<!-- Footer -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="down">
				<div class="down__cont">
					<div class="down__item down__item_name">
						<a href="https://avtoshkola-ds.ru/o-nas/">
							Коротко об автошколе
						</a>
					</div>
					<ul class="down__list">
						<?php if( have_rows('short', 'option') ): ?>
	                        <?php while( have_rows('short', 'option') ): the_row();
	                           $text = get_sub_field('short_text', 'option');
	                           $link = get_sub_field('short_link', 'option');
	                            ?>
								<li class="down__item">
									<a href="<?php echo $link; ?>">
										<?php echo $text; ?>
									</a>
								</li>
	                        <?php endwhile; ?>
	                    <?php endif; ?>
					</ul>
				</div>
				<div class="down__cont">
					<div class="down__item down__item_name">
						<a href="https://avtoshkola-ds.ru/kategorii/">
							Услуги
						</a>
					</div>
					<ul class="down__list">
						<?php if( have_rows('serves', 'option') ): ?>
	                        <?php while( have_rows('serves', 'option') ): the_row();
	                           $text = get_sub_field('serves_text', 'option');
	                           $link = get_sub_field('serves_link', 'option');
	                            ?>
								<li class="down__item">
									<a href="<?php echo $link; ?>">
										<?php echo $text; ?>
									</a>
								</li>
	                        <?php endwhile; ?>
	                    <?php endif; ?>
					</ul>
				</div>
				<div class="down__cont">
					<div class="down__item down__item_name">
						<a href="https://avtoshkola-ds.ru/ceny/">
							Спецпредложения
						</a>
					</div>
					<ul class="down__list">
						<?php if( have_rows('take', 'option') ): ?>
	                        <?php while( have_rows('take', 'option') ): the_row();
	                           $text = get_sub_field('take_text', 'option');
	                           $link = get_sub_field('take_link', 'option');
	                            ?>
								<li class="down__item">
									<a href="<?php echo $link; ?>">
										<?php echo $text; ?>
									</a>
								</li>
	                        <?php endwhile; ?>
	                    <?php endif; ?>
					</ul>
				</div>
				<div class="down__info">
					<a href="tel:88007587702" class="down__link">
						<img src="<?php bloginfo('template_directory')?>/img/tel.svg" alt="Телефон в футере"/>
						<p>8 800 758 77 02</p>
					</a>
					<a href="#" class="down__link">
						<img src="<?php bloginfo('template_directory')?>/img/map.svg" alt="Адрес в футере"/>
						<p>109044, г. Москва, ул. Нестерова, 15</p>
					</a>
					<a href="mailto:info@985.su" class="down__link">
						<img src="<?php bloginfo('template_directory')?>/img/mail.svg" alt="почта в футере"/>
						<p>info@985.su</p>
					</a>
				</div>
			</div>
		</div>
		<a href="https://avtoshkola-ds.ru/sitemap_index.xml"></a>
	</footer>
	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnsm0lKdy5xDCUBrxDzkg2GEIf83hXbAg&callback=initMap">
	</script>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/slick.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/main.js"></script>
<?php wp_footer(); ?>

</body>
</html>
