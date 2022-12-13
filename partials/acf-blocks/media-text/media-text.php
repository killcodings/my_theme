

<?php

//$content_width    = get_field( 'content_width' ) ?: 60;
//$media_width      = 100 - $content_width;
$main_class       = "media-text";


/*
$is_gradient = get_field( 'is_gradient' ) ?? false;
if ( $is_gradient ) {
	$main_class      .= ' media-text_gradient';
	$gradient_colors = get_field( 'gradient_colors' );
	$start_color     = $gradient_colors['start_color'] ?: '#000';
	$end_color       = $gradient_colors['end_color'] ?: '#000';
	$style_string    .= "--start-color:$start_color;--end-color:$end_color;";
}
*/

/*
$image_position_mobile = get_field( 'image_position_mobile' ) ?? true;
$block_class           = 'media-text__block';
if ( $image_position_mobile ) {
	$block_class .= ' media-text__block_mobile-image-first';
}
*/

$is_enable_media = get_field( 'is_enable_media' ) ?? true;
if ( ! $is_enable_media ) {
	$main_class .= ' media-text__block_content-only';
}

$reverse = get_field( 'reverse' ) ?? false;
if ( $reverse ) {
	$main_class .= ' media-text__block_reverse';
}

$is_style_media_text = get_field('is_style_media_text') ?? false;

$style = match ($is_style_media_text) {
	'bg' => ' media-text_bg media-text_border-radius',
    'noBg' => '',
    false => '',
	null => ''
};

$background_color = get_field( 'background_color' ) ?: '';
$color_text = get_field( 'color_text' ) ?: '';
$media_text_border_radius = get_field('media_text_border_radius') ?: '';
$style_string     = "--background:$background_color;color:$color_text;--border-radius:{$media_text_border_radius}px;";

$main_class .= $style;

//$is_add_buttons = get_field( 'is_add_buttons' ) ?? false;
//$button_class   = 'media-text__button';
/*

if ( $is_add_buttons ) {
	$buttons = get_field( 'buttons' );
	if ( $buttons ) {
		$buttons_count = count( $buttons );

		if ( $buttons_count === 1 ) {
			$button_class .= ' media-text__button_single';
		}
	}
}
*/

acf_block_before( 'Изображение и текст', $is_preview );
?>
<div class="<?=$main_class?>" style="<?= $style_string ?>">
    <div class="media-text__content">
        <InnerBlocks/>
    </div>
    <div class="media-text__media">
	    <?php
	    if ( $is_enable_media ):
		    $is_add_image_video = get_field( 'is_add_image_video' ) ?: 'image';
		    ?>
            <div class="media-text__media media-text__media_<?= $is_add_image_video ?>">
			    <?php
			    if ( $is_add_image_video === 'image' ):
				    $image = get_field( 'image' );
				    if ( ! isset( $GLOBALS['is_first_text_image'] ) ) {
					    echo app_get_image( [ 'id' => $image ], false );
					    $GLOBALS['is_first_text_image'] = false;
				    } else {
					    echo app_get_image( [ 'id' => $image ] );
				    }
			    else:
				    $video = get_field( 'video' );
				    echo app_get_video( $video );
			    endif;
			    ?>
            </div>
	    <?php endif; ?>
    </div>
</div>
<?php acf_block_after( $is_preview );
