<!-- Preloader -->
<?php displayPreloadLogo(); ?>
    <!-- End Preloader -->

    <!-- Navigation Left-->
<?php if(has_nav_menu( 'left_menu' )) : ?>    
    <nav id="nav-left">
        <?php awe_menu_left(); ?>
    </nav>
    <!-- End Navigation Left-->
<?php endif; ?>
    <!-- End Navigation -->
<?php if(has_nav_menu( 'main_menu' )) : ?>
    <nav id="nav-menu">
        <span id="close-menu"></span>
        <?php
        awe_main_nav();
        ?>
    </nav>
<?php endif; ?>
    
    <!-- HOME -->
    <div id="home" class="video home video-place livepreview-home" <?php display_background_color('intro_bg_data'); ?>>
        <div class="home-content" id="home-content">
            <!-- Slider content -->
            <?php display_intro_content('intro_data','intro_bg_data'); ?>
        </div>
        <!-- Home media Image, Video, Slide -->
        <?php background_show('intro_bg_data'); ?>    
        <?php display_overlay('intro_bg_data'); ?>
    </div>
    <!-- End Header -->
    <header id="header">
        <div class="container">
            <!-- Logo -->
            <?php displayLogo(); ?>


            <!-- Button Menu -->
            <?php if(has_nav_menu( 'main_menu' )) : ?>
                <div class="dev-menu">
					<p>Menú</p>
					<span id="button-menu">
						<i class="icon"></i>
						<i class="icon"></i>
						<i class="icon"></i>
					</span>
				</div>
                
            <?php endif; ?>
            <?php do_action('awe_lang_bar'); ?>
            <?php awe_top_nav(); ?>
            
        </div>
    </header>