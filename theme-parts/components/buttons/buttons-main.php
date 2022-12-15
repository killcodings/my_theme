<?php
$buttons = $args['add_buttons'];
$columns = $args['columns'];
$buttons_color = $args['buttons_color'];

$position_image = match($args['position_image_buttons']) {
    'top' => 'button_column',
    'left' => '',
    false => '',
    null => '',
    '' => '',
};

?>

<div class="buttons buttons_columns-<?=$columns?>">
    <?php foreach ( $buttons as $key => $button ) {

	    $button_icon = '';
	    $icon_url    = wp_get_attachment_image_url( $button['image'] );
        if ($icon_url) {
	        $icon_url    = app_get_image_url( $icon_url );
	        $button_icon = "<span class = 'button__image' style = 'background-image: url($icon_url);'></span>";
        }

	    echo app_get_button( $button['button'], "buttons__item button_custom_color $position_image",null, $buttons_color, $button_icon );
    } ?>
</div>

