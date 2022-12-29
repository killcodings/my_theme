<?php
$version       = $args['version'];
$class_version = '';
if ( $version === 'version_3' ) {
	$class_version = ' promo-logo-center_version-3';
}
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
<section class="promo-logo-center<?= $class_version ?>" style="<?= $style_str ?>">
	<?php
	if ( $args['is_logo'] ) :
		$icon_url = wp_get_attachment_image_url( $args['is_logo'] );
		$icon_url = app_get_image_url( $icon_url );
		$icon = "<span class = 'icon' style = 'background-image: url($icon_url);'></span>";
		?>
        <div class="promo-logo-center__logo"><?= $icon ?></div>
	<?php endif; ?>
    <p class="promo-logo-center__title"><?= $args['title_description'] ?></p>

    <div class="inputs">
        <div class="inputs__value"><?= $args['value'] ?></div>
        <button class="inputs__button button"><?= $args['button'] ?></button>
    </div>

    <p class="promo-logo-center__description"><?= $args['description'] ?></p>
	<?php echo app_get_button( $args['link'] ) ?>
</section>
