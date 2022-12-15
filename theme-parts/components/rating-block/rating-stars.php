<?php

$rating          = isset( $args['value'] ) ? $args['value'] : false;
$rating_percents = $rating * 20;
$count_stars     = $args['count_stars'] === 'one' ? '★' : ( $args['count_stars'] === 'five' ? '★★★★★★' : '★' );
$heading         = isset( $args['heading'] ) ? $args['heading'] : false;
$text            = isset( $args['text'] ) ? $args['text'] : false;
$class           = isset( $args['rating_stars_style'] ) ? $args['rating_stars_style'] : false;


$rating_stars_class = match ( $class ) {
	'stars' => 'stars',
	'text' => 'rating-stars_text',
	'background' => 'rating-stars-background',
	false => '',
	null => ''
};
$stars_colors       = $args['stars_colors'];
$background_stars   = $stars_colors['background_stars'] ?? false;
$color_text         = $stars_colors['color_text'] ?? false;
$color_stars_start  = $args['color_stars']['color_stars_start'] ?? '#fec84b';
$color_stars_end    = $args['color_stars']['color_stars_end'] ?? '#d0d5dd';
$style              = "style='--color-stars-start:$color_stars_start;--color-stars-end:$color_stars_end'";

if ( $background_stars || $color_text ) {
	$style = "style='--rating-stars-color-text:" . "$color_text" . ";--rating-stars-background:$background_stars;--color-stars-start:$color_stars_start;--color-stars-end:$color_stars_end;'";
}


?>
<div class="rating-stars <?= $rating_stars_class; ?>"
	<?= $style ?>>
	<?php if ( $heading ) : ?>
        <span class="rating-stars__heading"><?= $heading ?> </span>
	<?php endif; ?>
	<?php if ( $rating ) : ?>
        <div class="rating-stars__value"><?= $rating ?></div>
	<?php endif; ?>
    <div class="rating-stars__star" style="--rating:<?= $rating_percents ?>%"><?= $count_stars ?></div>
	<?php if ( $text ) : ?>
        <div class="rating-stars__text text-s"><?= $text ?></div>
	<?php endif; ?>
</div>
