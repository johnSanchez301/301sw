<?php

/*
Template Name: Clientes
*/
?>
<?php
$customize = get_options();
if($customize == ''){
    global $options_extra;
    $customize = $options_extra;
}
$is_customize_mode =  (has_action( 'customize_controls_init' )) ? true : false;
?>
<?php get_header();?>
<?php get_template_part('section','introduction-blog');?>
<?php 
    $main_class = layout_class('main');
    $left = layout_class('left');
    $right = layout_class('right');
?>
    <!--=============== wrapper ===============-->
    <div id="main">
        <!-- Blog Singer-->
        <div id="content-blog">
            <div class="container">
                <div class="row">
                    <!-- Blog Left -->
                    
                <?php if($main_class == 'col-md-12') : ?>
                    <div class="col-md-12">
                    <?php get_template_part('single','content');?>
                    <!-- Blog Right -->
                    </div>
<!--                    <div class="col-md-12 blog-list-right">-->
                    <?php //dynamic_sidebar('sidebar'); ?>
<!--                    </div>-->
                <?php endif; ?>
                <?php if($left != '') : ?>
                    <div class="col-md-3 blog-list-right">
                    <?php dynamic_sidebar('sidebar'); ?>
                    </div>
                    <div class="col-md-8 col-md-offset-1">
                    <?php get_template_part('single','content');?>
                    <!-- Blog Right -->
                    </div>
                <?php endif; ?>
                <?php if($right != '') : ?>
                    <div class="col-md-8">
                    <?php get_template_part('single','content');?>
                    <!-- Blog Right -->
                    </div>
                    <div class="col-md-3 col-md-offset-1 blog-list-right">
                    <?php dynamic_sidebar('sidebar'); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            
            <?php
                global $customize,$is_customize_mode;
                if($customize['client']['show'] || $is_customize_mode): 
            ?>
                <section id="client" class="awe-section client" <?php display_background_css('client'); ?>>
                    <div class="container">
                        <div class="row">
                            <?php displayHeader('client'); ?>
                            <div class="clear"></div>

                            <!-- AweTheme Clients -->
                            <div class="awe-content " >
                                <div class="awe-clients js-awe-get-items js-content-slider <?php contentSlider('client') ?>" <?php sliderCols('client'); ?>>

                                    <!-- Client 1 -->
                                    <?php 
                                    $query3 = new WP_Query('post_type=awe_client&posts_per_page=-1');
                                    $no_client = true;
                                    $count =0;
                                    while ( $query3->have_posts() ) : $query3->the_post();?>
                                    <?php
                                        $no_client = false;
                                        $count += 0.4;
                                        $info=get_post_meta(get_the_ID(),'client',true);
                                        //var_dump($info);
                                    ?>
                                    <div class="js-content-item <?php hasSlider('client') ?> <?php clientItem(); ?> <?php animationContent('client'); ?> wow" data-wow-duration="0.8s" data-animate="<?php animationContent('client'); ?>">
                                        <a target="_blank" href="<?php echo $info['url']; ?>">
                                            <img src="<?php echo $info['logo']; ?>" alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                        <?php sectionFooter('client'); ?>
                    </div>
                    <?php sectionOverLay('client'); ?>
                </section>
            <?php endif; ?>
           
           <?php
                global $customize,$is_customize_mode;
                if($customize['address']['show'] || $is_customize_mode): 
            ?>
                <section id="contact" class="awe-section contact" <?php display_background_css('address') ?>>
                    <div class="container">
                        <div class="row">
                            <?php displayHeader('address'); ?>


                            <div class="awe-content js-awe-get-items">
                                <div class="awe-contact clearfix">
                                    <div class="col-sm-4 wow <?php animationContent('address') ?>" data-wow-delay="0.3s" data-animate="<?php animationContent('address'); ?>">
                                        <div class="contact-info">
                                            <h2 class="js-studio"><?php echo $customize['address']['content']['studio']; ?></h2>
                                            <div class="hidden">
                                                <i class="awe-icon fa fa-map-marker"></i>
                                                <p class="js-address">
                                                    <?php echo $customize['address']['content']['address']; ?>
                                                </p>
                                            </div>
                                            <div>
                                                <div class="icon-contact contac-mail">
                                                    <img src="/wp-content/themes/301_creativa/assets/images/mensaje.svg" alt="">
                                                </div>
                                                <p>
                                                    <b class="js-email"><a href="mailto:<?php echo $customize['address']['content']['email'] ?>"> <?php echo $customize['address']['content']['email'] ?></a></b>
                                                </p>
                                            </div>
                                            <div>
                                                <div class="icon-contact contac-phone">
                                                    <img src="/wp-content/themes/301_creativa/assets/images/telefono.svg" alt="">
                                                </div>
                                                <p>
                                                    <b class="js-phone"><?php echo $customize['address']['content']['phone'] ?></b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 contact-item">
                                        <div class="row">
                                            <div class="contact-form wow fadeInUp" data-wow-delay="0.5s">
                                                <!-- <form id="contact-form" action="processForm.php" method="post"> -->
                                                <?php
                                                if(function_exists('wpcf7')){ 
                                                    if(!empty($customize['contact']['form'])){
                                                        $contact_form = get_post($customize['contact']['form']);
                                                    echo do_shortcode('[contact-form-7 id="'.$contact_form->ID.'" title="'.$contact_form->post_title.'"]');
                                                    }else{ ?>
                                                        <div class="no-item">
                                                            <h3>[<?php _e("Please choose contact form",LANGUAGE);?>]</h3>
                                                        </div>
                                                <?php    }
                                                ?>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="no-item">
                                            <h3>[<?php _e("Please Active Contact Form 7",LANGUAGE);?>]</h3>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            
            
        </div>
        <!-- End Blog Singer-->
    </div>
    <!-- ENd Main -->

<?php get_footer(); ?>