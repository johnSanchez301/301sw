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
       <div class="container">
           <div class="breadcrumbs" typeof="BreadcrumbList">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
       </div>
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
                    <div class="col-md-12 blog-list-right">
                    <?php dynamic_sidebar('sidebar'); ?>
                    </div>
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
                    <div class="categoria-301">
                        <div class="col-md-3 col-md-offset-1 blog-list-right">
                        <?php dynamic_sidebar('sidebar'); ?>
                        </div>
                        <div class="col-md-8">
                        <?php get_template_part('single','content');?>
                        <!-- Blog Right -->
                        </div>
                    </div>
                <?php endif; ?>
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
        <!-- End Blog Singer-->
        <div class="blog-coment-301">
            <!-- Blog Comment -->
            <div class="container">
                <?php display_comment_box();?>
                <?php paginate_comments_links() ?>
            </div>
            <!-- end Blog Comment -->
        </div>
        <!-- related blogs -->
        <div class="related-blog">
            <div class="container">
            <div class="cont-title">
                <h3>Historias<span>relacionadas</span></h3>
            </div>
            <?php zemanta_related_posts()?>
            </div>
        </div>
        <!-- end related blogs -->
    </div>
    <!-- ENd Main -->
    <?php get_template_part('section','contact'); ?>

<?php get_footer(); ?>