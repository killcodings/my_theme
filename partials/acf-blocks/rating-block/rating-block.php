<?php
$rating_fields_global  = get_field( 'rating_fields', 'options' );
$rating_fields_page    = get_field( 'rating_fields_page', $post->ID );
$rating_fields_buttons = $rating_fields_page['rating_block_buttons'];


$heading                 = $rating_fields_page['heading'] ?: $rating_fields_page['heading'];
$rating_value            = $rating_fields_page['value'] ?: $rating_fields_page['value'];
$text                    = $rating_fields_page['text'] ?: $rating_fields_page['text'];
$count_stars             = $rating_fields_page['count_stars'] ?: $rating_fields_page['count_stars'];
$rating_stars_style      = $rating_fields_page['rating_stars_style'] ?? false;
$background_rating_block = $rating_fields_page['background_rating_block'] ?? false;
$stars_colors            = $rating_fields_page['stars_colors'];
$inner_padding           = $rating_fields_page['inner_padding'] ?? false;
$color_stars =  $rating_fields_page['color_stars'];

$rating_stars_setting = [
	'heading'            => $heading,
	'value'              => $rating_value,
	'text'               => $text,
	'count_stars'        => $count_stars,
	'rating_stars_style' => $rating_stars_style,
	'stars_colors'       => $stars_colors,
    'color_stars' => $color_stars
];

$is_change_buttons    = $rating_fields_buttons['is_change_buttons'];
$buttons_main_setting = [
	'add_buttons'            => $rating_fields_buttons['add_buttons'],
	'buttons_color'          => $rating_fields_buttons['buttons_color'],
	'columns'                => $rating_fields_buttons['columns'] ?? '1',
	'position_image_buttons' => $rating_fields_buttons['position_image_buttons']
];
$class = '';
if ( $inner_padding ) {
    $class = 'rating-block_padding';
}

acf_block_before( 'Блок рейтинг', $is_preview );
?>
    <div class="rating-block <?=$class?>" style="background:<?= $background_rating_block ?>;--inner-padding:">
        <InnerBlocks/>
		<?php
		echo get_component( 'rating-block/rating-stars', $rating_stars_setting );
		if ( $is_change_buttons ):
			echo get_component( 'buttons/buttons-main', $buttons_main_setting );
		endif;
		?>

    </div>

<?php acf_block_after( $is_preview );
