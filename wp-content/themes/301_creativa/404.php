<?php
$customize = get_options();
if($customize == ''){
    global $options_extra;
    $customize = $options_extra;
}
$is_customize_mode =  (has_action( 'customize_controls_init' )) ? true : false;
?>
<?php get_header();?>
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
                   <div class="text-error">
                        <h2>¡Ohh, ohhh me perdí!</h2>
                        <p class="lead blog-description">Existen direcciones como esta, fuera de mi GPS.<span>Te recomendamos continuar buscando allá afuera.</span></p>
                        <div class="separator"></div>
                        <a href="<?php echo home_url() ?>" class="btn">Volver al inicio</a>
                    </div>
                </div> 
            </div>    
        </div>
        <!-- End Blog Singer-->
    </div>
    <!-- ENd Main -->
    <!--=============== section blog end ===============-->