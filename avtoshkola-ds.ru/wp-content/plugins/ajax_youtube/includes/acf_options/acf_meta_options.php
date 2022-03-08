<?php 
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b5f2158d580b',
	'title' => 'Шаблонное добавление шорткодов с выводом видео по клику',
	'fields' => array(
		array(
			'key' => 'field_5b5f215a42342',
			'label' => 'Шаблоны шорткодов',
			'name' => 'all_shortkod',
			'type' => 'repeater',
			'instructions' => 'тут нужно составить/изменить содержимое видео для вывода',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5b5f23bc8bc7d',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Добавить шаблон',
			'sub_fields' => array(
				array(
					'key' => 'field_5b5f23bc8bc7d',
					'label' => 'Метка шорткода',
					'name' => 'metka',
					'type' => 'text',
					'instructions' => 'Уникальное имя метки например korporativ1 korporativ2 без пробелов и на английском
использовать с шорткодом пример: [theme_video_shablon metka="name_metka"]',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5b5f21ba42343',
					'label' => 'Включенное видео',
					'name' => 'all_video',
					'type' => 'repeater',
					'instructions' => 'Добавить необходимое количество видео',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Добавить видео',
					'sub_fields' => array(
						array(
							'key' => 'field_5b5f222642344',
							'label' => 'Видео',
							'name' => 'video',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'shortkod_shablon',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
 ?>