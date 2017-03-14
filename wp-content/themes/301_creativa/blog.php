<?php

/*
Template Name: Blog Homepage - Light
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
<?php 
get_header();

    $page_id = get_the_ID(); 
    
    if ( apply_filters('awe_is_blog_header', $page_id) )
    {
        get_template_part('section','introduction-blog');
    }

    $main_class = layout_class('main');
    $left = layout_class('left'); 
    $right = layout_class('right');
    
    $post_per_page =(get_option('posts_per_page '))?get_option('posts_per_page '):5;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('post_type=post&posts_per_page='.$post_per_page.'&showposts='.$post_per_page.'&paged='.$paged );
?>
<!-- Blog -->
    <div id="main">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
        <div class="title-blog">
            <div class="container">
               <div class="grid-6">
                   <h3>Vivimos<span>las marcas</span></h3>
               </div>
               <div class="grid-6">
                  <aside class="categories-301">
                      <a class="btn-category">Categorias<span><svg height="10" width="15"><polygon points="0,0 7.5,10 15,0" style="fill:#d94e3c"/></svg></span></a>
                    </aside>
               </div>
               <div class="categories-301">
                   <ul class="list-category">
                        <?php
                            $args = array (
                                'hide_empty' => 0,
                                'title_li' => false,
                                'style' => 'list',
                            );
                            wp_list_categories($args);
                        ?>
                    </ul>
                    <
            </div>
        </div>
        <!-- Content Blog -->
            <div id="content-blog">
                <div class="container">
                    <div class="row">
                    <?php if($main_class == 'col-md-12') : ?>
                        <div class="col-md-12">
                        <?php /*dynamic_sidebar('sidebar');*/?>
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
                        <div class="newsletter newsletter-single newsletter-blog wow bounceInTop" data-wow-duration="2s">
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
    <?php get_template_part('section','contact'); ?>
<?php get_footer(); ?>