<?php
$version      = get_field( 'version_promo_block' ) ?? '';
$args_version = [
	'version' => $version,
	'group_promocode' => get_field( 'group_promocode' )
];

acf_block_before( 'Блок промокод с вариациями', $is_preview );
echo get_component( "promo-version/$version", $args_version );
acf_block_after( $is_preview );