<?php
$header_panel_colors = get_field( 'header_panel_colors', 'options' );

?>

<header class="header"
        style="--background-color: <?= $header_panel_colors['background'] ?: '#000' ?>">
    <div class="container">
        <div class="header__block">
            <div class="header__logo logo">
				<?php
				$header_logotype = get_field( 'header_logotype', 'options' );
				if ( $header_logotype ) { ?>
                <a class="logo__link" href="<?= home_url() ?>">
					<?= app_get_image( [ 'id' => $header_logotype, 'classes' => 'logo__image' ] ) ?>
                </a>
				<?php } ?>
            </div>

			<?php
			$primary_nav_classes          = '';
			$primary_nav_position_buttons = get_field( 'position_buttons_mobile', 'options' ) ?? false;


			$primary_nav_classes = match ($primary_nav_position_buttons) {
                'top' => 'primary-nav_buttons-top',
                'bottom' => 'primary-nav_buttons-bottom',
                'header' => '',
                false => '',
            };

			$primary_nav_add_widget = get_field( 'is_widget_lanuage', 'options' ) ?? false;

			if ( $primary_nav_add_widget ) {
				$primary_nav_classes .= ' primary-nav_add-widget';
			}

			$border_menu_item = get_field( 'is_border_menu_item', 'options' ) ?? false;
			$icon_menu_item   = get_field( 'is_icon_menu_item', 'options' ) ?? false;

			$nav_menu_item_border = '';
			$is_border_menu_item = $border_menu_item ? $nav_menu_item_border = 'primary-nav_divider-mobile' : false;
			$is_icon_menu_item   = $icon_menu_item ? $nav_menu_item_icon = 'primary-nav_icon' : false;
			?>
            <div class="header__primary-nav primary-nav <?= $primary_nav_classes ?> ">
				<?php
				wp_nav_menu( [
					'theme_location'  => 'primary',
					'fallback_cb'     => false,
					'container'       => 'nav',
					'container_class' => 'nav' . " $nav_menu_item_border",
					'container_id'    => '',
					'menu_class'      => 'primary-nav__list' . " $is_icon_menu_item",
					'menu_id'         => '',
					'walker'          => new My_Walker_Nav_Menu()
				] ); ?>
				<?php
				$is_rating_stars = get_field( 'is_rating_stars', 'options' ) ?? false;
				if ( $is_rating_stars ) :
                    $rating_fields = get_field( 'rating_fields', 'options' );
					?>
                <div class="header__rating-stars">
	                <?php echo get_component( 'rating-block/rating-stars', $rating_fields ) ?>
                </div>
				<?php endif; ?>
            </div>
			<?php
			$primary_nav_buttons           = get_field( 'primary_nav_buttons', 'options' );
			$is_change_primary_nav_buttons = get_field( 'is_change_header_button', $post->ID );
			$is_enabled_mobile_buttons     = $primary_nav_buttons['is_enabled_mobile_buttons'] || $is_change_primary_nav_buttons;

			$class_column = '';
			$button_row_mobile = get_field( 'btn_row', 'options' ) ?? false;
			if ( $button_row_mobile ) {
				$class_column = 'buttons_columns-2-mobile';
			}
			if ( $is_enabled_mobile_buttons ):
				?>
                <div class="buttons buttons_columns-2 <?= $class_column ?>">
					<?php
					$mobile_buttons = $primary_nav_buttons['buttons'];
					if ( $is_change_primary_nav_buttons ) {
						$mobile_buttons = get_field( 'buttons', $post->ID );
					}

					foreach ( $mobile_buttons as $button ) {
						$choose_link = $button['choose'];
						if ( $choose_link === 'input_link' ) {
							$button['url'] = $button['input_link'];
						} else {
							$button['url'] = $button['primary_nav_buttons_choose_link'];
						}
						$button_style = $button['style'] ?: 'outline';
						$button_class = "buttons__item button_custom_color";

						$button_icon = '';
						$icon_url    = wp_get_attachment_image_url( $button['image'] );

                        if($icon_url) {
	                        $icon_url    = app_get_image_url( $icon_url );
	                        $button_icon = "<span class = 'button__image' style = 'background-image: url($icon_url);'></span>";
                        }

						$button_colors = [
							'background'       => $header_panel_colors['buttons_background'],
							'background_hover' => $header_panel_colors['buttons_background_hover'],
							'color'            => $header_panel_colors['buttons_color'],
							'color_hover'      => $header_panel_colors['buttons_color_hover'],
							'border'           => $header_panel_colors['buttons_border_color'],
							'border_hover'     => $header_panel_colors['buttons_border_color_hover'],
							'border_style'     => $header_panel_colors['buttons_border_style'],
							'border_radius'    => $header_panel_colors['buttons_border_radius']
						];
						echo app_get_button( $button, $button_class, $button['relations'], $button_colors, $button_icon );
					}
					?>
                </div>
			<?php endif; ?>

            <div class="header__widget">
				<?php dynamic_sidebar( 'language-flags' ); ?>
            </div>
			<?php
			if ( has_nav_menu( 'primary' ) ): ?> <!--если одно меню, то не проверять-->
                <div class="header__burger burger">
                    <span></span><span></span><span></span>
                </div>
			<?php endif; ?>
        </div>
    </div>
	<?php
	$is_header_bonus      = get_field( 'is_header_bonus', 'options' );
	$is_header_bonus_page = get_field( 'is_header_bonus', $post->ID );
	if ( $is_header_bonus || $is_header_bonus_page ):
		$settings = $is_header_bonus_page ?
			get_field( 'settings', $post->ID ) :
			get_field( 'settings', 'options' );

		if ( $settings['link'] ) {
			get_template_part( "theme-parts/components/header-bonus/header-bonus", null, $settings );
		}
	endif; ?>
</header>
