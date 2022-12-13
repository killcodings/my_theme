<?php
$heading_logo  = get_field( 'heading_logo'); // изображение
$heading       = get_field( 'heading' ); // текст
$heading_tag   = get_field( 'heading_tag' ) ?? 'h2';
$heading_class = 'head';
$heading_logo_bg = get_field('heading_logo_bg');

$logo_url    = wp_get_attachment_image_url( $heading_logo );
$logo_url    = app_get_image_url( $logo_url );


if ( $heading_tag === 'h1' ) {
	$heading_tag = 'h1';
} elseif ( $heading_tag === 'h2' ) {
	$heading_tag = 'h2';
}

acf_block_before( 'Заголовок с логотипом', $is_preview );
?>
    <div class="<?=$heading_class?>">
        <div class="head__logo" style="--background-logo:url(<?= $logo_url ?>);--background-logo-color:<?= $heading_logo_bg ?>" ></div>
	    <?= "<$heading_tag class='{$heading_class}__heading heading'>" . $heading . "</$heading_tag>" ?>
    </div>

<?php acf_block_after( $is_preview );


