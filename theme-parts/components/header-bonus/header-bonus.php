<?php
$button = $args['link'];
$heading = $args['title'];
$with_promocode = $args['with_promocode'];
$style_array = [
	'background' => $args['background'] ? "--background-color:{$args['background']}" : '',
	'color_text' => $args['color-text'] ? "--color-text:{$args['color-heading']}" : '--color-text:#000',
    'border_radius' => $args['border_radius'] ? "--border-radius:{$args['border_radius']}px" : '',
    'border_dashed' => $args['border_dashed'] ? "background-color:transparent;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAd8AAABgCAYAAABc63hMAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQuSURBVHgB7d1LThtJHAfgbvNYgJB8g3FOwHCCwAlmeBlYBZ8g3CDODeAETlYYEDA5Ab4BMyfAuQELYMPDUzWaQQzgjiCmSDvfJ6GyXP5bVEvun8vV6sqzZ9jZ2TnO87wWHlbv99Xr9byodnd3t1fUX1S/vb1dGxkZOSko74b6N2WtD8e0s7y8PNevPxy7t6HplLh+PTStrL9P4fg1ylofxt8M4//Yr39vb+9Dr9drlrU+jD+Ofb1ff6VSWV9aWvpc1vow/rkw/k5B/VFoZktcH889tX794dxUW1xc/FrW+pfMnoL60/CZ6l5cXMw1Go3T7KWFf+LXVqtVzQDgJxVzMHypnc0GKb6pgAWAp/tWflYeezL+PDoxMXE8NTX1WwYAPEnMz7BEe7K/v//LY/0Pwvfg4GA6rJ0chfWDzaL1EwDgcTE/wzr25tXVVafdbk/f7//fAnOc8cbgDQVNwQsA3yfMft+Fpjk6Ojp794Ky25lv/H3ajBcABmdlZeV2Bnx3Hfg2fKvVarzUu1mv17cyAGAgwoR2K+ZrBgAAAAAAAMBwcBcrAEirMjk5eTTwe1MCAA/EvRHC33El7k50dnb2ZwYAvKixsbFuFndn+tY2SwDA4MTcrWQAQFLCFwASE74AkJjwBQAAAAAAAAAAAAAAAAAAAGD42VgBANKxsQIAvALhCwCJCV8ASEz4AkBiwhcAEhO+AJCY8AUAAAAAAAAAAAAAAAAAAABg+NnPFwDSsZ8vALwC4QsAiQlfAEhM+AJAYsIXABITvgCQmPAFAAAAAAAAAAAAAAAAAAAAYPjZzxcA0rGfLwC8AuELAIkJXwBITPgCQGLCFwASE74AkJjwBQAAAAAAAAAAAAAAAAAAAGD42c8XANKxny8AvALhCwCJCV8ASEz4AkBilTzPT1utVjUDAF7U4eFhzNvTSq/X646Pj9cyAOBFXV5eToemmwEA6fi1GQAAAAAAAGBIxAXgnZ2ddxkAMFAxX+9eaHV7k41qtZrled5st9vvMwBgIHZ3d9/HfL373G34zs/Pn15fX89VKpUNM2AA+H7/5unGyMjIbKPROP3v+fz+Cw8ODqavrq7+uLm52VxdXd3KAIAnizPe0GyMjo7+vrCw8Nfdvgf3do4vMAMGgOe7O+O9H7zRoxsrrK2tdcfGxmYuLi6+ZADAk4yPj385Pz+fWVxc/JoNSphKv3V7LAB+ZjEH2+32dPYM+RNf/8+ODGFN+Cg8rPV6vQcBXK/XC98zBHevqL+ofnt7uxam8CcF5d1Q/6as9Xmed5aXl+f69ccvPaHplLh+PTStrL9P4fg1ylofr2YM4//Yr39vb+9D+Mw0y1ofxh/Hvt6vPyxVrS8tLX0ua30Y/1wYf6egPp73ZktcH889tX794dxUK5ql/ej1L5k9/erjroCh6YbjPpM90d/mcgODRFDAqwAAAABJRU5ErkJggg==);background-size:100% 100%" : ''
];
$style_array = app_array_filter_recursive($style_array);
$style_str = implode(';', $style_array);

if ($button) : ?>
<aside class="header-bonus" style="<?=$style_str?>">

        <div class="header-bonus__block">
	        <?php if ($args['image']) : ?>
            <div class="header-bonus__logo">
	            <?php echo app_get_image( [ 'id' => $args['image'] ] ) ?>
            </div>
            <?php endif; ?>
            <div class="header-bonus__content">
                <h2 class="header-bonus__title"><?= $heading ?></h2>
                <p class="header-bonus__description"><?=$with_promocode?></p>
            </div>
	        <?php echo app_get_button($button, 'header-bonus__button', null, null, $button_icon = '<span class="arrow"></span>') ?>
        </div>

</aside>
<?php endif; ?>