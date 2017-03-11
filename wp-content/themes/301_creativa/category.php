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
<!-- Blog -->
    <div id="main">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" >
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
        <div class="title-blog title-category">
            <div class="container">
               <h3>Vivimos<span>las marcas</span></h3>
               <h4><?php echo single_cat_title("", false); ?></h4>
            </div>
        </div>
        <!-- Content Blog -->
            <div id="content-blog">
                <div class="container">
                    <div class="row">
                    <?php if($main_class == 'col-md-12') : ?>
                        <div class="col-md-12">
                        <?php dynamic_sidebar('sidebar'); ?>
                        </div>
                        <div class="col-md-12">
                        <?php get_template_part('content','loop'); ?>
                        <?php get_template_part('pages_nav');?>
                            <!-- End Page Navigation --> 
                        </div>
                    <?php endif; ?>
                    <?php // end full with layer // ?>
                    <?php  
                        if($left != '') { ?>
                            <div class="col-md-3 blog-list-right">
                                <?php dynamic_sidebar('sidebar'); ?>
                            </div>
                           <div class="col-md-8 col-md-offset-1">
                            <?php get_template_part('content','loop'); ?>
                            <?php get_template_part('pages_nav');?>
                            </div>
                            
                    <?php  }
                        if($right != '') { ?>
                            <div class="col-md-8 ">
                            <?php get_template_part('content','loop'); ?>
                            <?php get_template_part('pages_nav');?>
                            </div>
                            <div class="col-md-3 col-md-offset-1 blog-list-right">
                                <?php dynamic_sidebar('sidebar'); ?>
                            </div>
                        <?php
                        }
                    ?>
                        
                    </div>
                </div>
                <div class="blog-newsletter-301">
                    <!-- Blog newsletter -->
                    <div class="container">
                        <div class="newsletter newsletter-single wow bounceInTop" data-wow-duration="2s">
                            <h2>Boletín</h2>
                            <p>¿Te gustaría estar informado de lo que pasa?</p>
                            <div class="301News tnp-subscription-minimal"> 
                                 <?php dynamic_sidebar("Newsletter"); ?>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Content Blog -->
    </div>
    <!-- ENd Main -->
    <!-- End Blog -->
<?php get_footer(); ?>