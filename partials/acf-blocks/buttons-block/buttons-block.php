<?php
$buttons_group = get_field('buttons_group', $post->ID);

//$add_buttons            = get_field( 'add_buttons', $post->ID );
//$buttons_color          = get_field( 'buttons_color', $post->ID );
//$columns                = get_field( 'columns', $post->ID );
//$position_image_buttons = get_field( 'position_image_buttons', $post->ID );

$args = [
	'buttons_group' => $buttons_group,
//	'buttons_group'          => $add_buttons,
//	'buttons_color'          => $buttons_color,
//	'columns'                => $columns,
//	'position_image_buttons' => $position_image_buttons
];

acf_block_before( 'Кнопки', $is_preview );

	echo get_component( 'buttons/buttons', $args );

acf_block_after( $is_preview );



