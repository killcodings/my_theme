<?php
$add_buttons            = get_field( 'add_buttons', $post->ID );
$buttons_color          = get_field( 'buttons_color', $post->ID );
$columns                = get_field( 'columns', $post->ID );
$position_image_buttons = get_field( 'position_image_buttons', $post->ID );

$buttons_main_setting = [
	'add_buttons'            => $add_buttons,
	'buttons_color'          => $buttons_color,
	'columns'                => $columns,
	'position_image_buttons' => $position_image_buttons
];

acf_block_before( 'Кнопки', $is_preview );

	echo get_component( 'buttons/buttons-main', $buttons_main_setting );

acf_block_after( $is_preview );



