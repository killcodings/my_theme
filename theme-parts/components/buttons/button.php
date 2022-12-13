<?php


$button['url'] = $args['button']['url'];
$button['title'] = $args['button']['title'];

$button_icon = '';
$icon_url    = wp_get_attachment_image_url( $args['image'] );
$icon_url    = app_get_image_url( $icon_url );
$button_icon = "<span class = 'button__image' style = 'background-image: url($icon_url);'></span>";



echo app_get_button( $button, '', $button['relations'], $button_colors, $button_icon );




