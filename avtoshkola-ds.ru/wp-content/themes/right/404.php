<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package right
 */
get_template_part('template-parts/header')?>

<!-- About -->
	<section class="about" id="about">
		<div class="container">
			<div class="take-info take-info-error">
				<div class="take-info__mistake">
					<span>Данная страница отсутствует</span>
					<p>
                        Возможно, при вводе адреса была пропущена какая-то буква. Можете перейдите на <a href="https://avtoshkola-ds.ru/">главную</a> страницу
					</p>
				</div>
			</div>
		</div>
	</section>

<?php get_template_part('template-parts/footer')?>
