<?php
$customize = get_options();
if($customize == ''){
    global $options_extra;
    $customize = $options_extra;
}
$is_customize_mode =  (has_action( 'customize_controls_init' )) ? true : false;
?>
<?php get_header();?>
<?php get_template_part('section-introduction');?>
    <!--=============== wrapper ===============-->
<?php 
    $main_class = layout_class('main');
    $left = layout_class('left');
    $right = layout_class('right');
?>
    <div id="main">
        <!-- Blog Singer-->
        <div id="content-blog">
            <div class="container">
                <div class="row">
                    <h3>me perdí</h3>
                    <p class="lead blog-description">Hay direcciónes que no me cuadro en la ubicación, pero me ví un grafiti lo más de bonito</p>
                    <div class="separator"></div>
                </div> 
            </div>    
        </div>
        <!-- End Blog Singer-->
    </div>
    <!-- ENd Main -->
    <!--=============== section blog end ===============-->

<?php get_footer(); ?>