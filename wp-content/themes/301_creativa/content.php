<div class="blog-item row articulo">
   <div class="blog-type-cont">
        <p class="blog-fecha"><?php echo get_the_date(); ?></p>
    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'awe-post-thumb',false );?>
    <?php if(isset($thumb[0]) && !empty($thumb[0])):?>
    <div class="blog-image">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb[0] ?>" alt="<?php the_title(); ?>"></a>
    </div>
    <?php endif;?>
    </div>
    <div class="cont-info">
    <div class="blog-title blog-text-post">
        <span class="fa fa-link"></span>
        <?php if(display_meta_box()) : ?>
        <ul>
            <li>
                
            </li>
            <li>
            <?php $author = get_the_author();
            __('by',LANGUAGE); echo ' '.$author;
            ?>
            </li>
            <li>
                <?php comments_number( _e('No comment',LANGUAGE), __('1 comment',LANGUAGE), __('% comments',LANGUAGE) ); ?>
            </li>
        </ul>
        <?php endif; ?>
        <h2 title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <div class="blog-descript">
        <?php do_action('awe_post_content'); ?>
    </div>
    </div>
</div>
<!-- End Blog ONLY TEXT poSt -->