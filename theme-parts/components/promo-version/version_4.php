<?php

$args = $args['group_promocode'];

$style_array = [
	'background'      => $args['background'] ? "background:{$args['background']}" : '',
	'background_icon' => $args['background_icon'] ? "--accent-color:{$args['background_icon']}" : '',
	'bg_input_value'  => $args['bg_input_value'] ? "--bg-input-value:{$args['bg_input_value']}" : '',
	'color'           => $args['color'] ? "color:{$args['color']}" : '',
	'border_radius'   => $args['border_radius_logo'] ? "--border-radius-logo:50%" : ''
];

$style_array = app_array_filter_recursive( $style_array );
$style_str   = implode( ';', $style_array );


?>
<section class="promo-logo-left version_4" style="<?= $style_str ?>">
	<div class="promo-logo-left__header">
		<?php
		if ( $args['is_logo'] ) :
			$icon_url = wp_get_attachment_image_url( $args['is_logo'] );
			$icon_url = app_get_image_url( $icon_url );
			$icon = "<span class = 'icon' style = 'background-image: url($icon_url);'></span>";
			?>
			<div class="promo-logo-left__logo"><?= $icon ?></div>
		<?php endif; ?>
        <div class="promo-logo-left__logo-content">
            <p class="logo-content-description"><?= $args['title_description'] ?></p>
            <p class="logo-content-title"><?= $args['description'] ?></p>
        </div>
	</div>

    <div class="promo-logo-left__main">
        <div class="text-icon">
            <p class="text-icon__description"><?=$args['text_icon_description']?></p>
        </div>
        <p class="promo-logo-left__text-main"><?=$args['text_main']?></p>
    </div>

	<div class="inputs">
		<div class="inputs__value"><?= $args['value'] ?></div>
		<button class="inputs__button button"><?= $args['button'] ?></button>
	</div>

</section>
