<!-- Contact Us -->
<?php
    global $customize,$is_customize_mode;
    if($customize['twitter']['show'] || $is_customize_mode): 
?>
    <section id="twitter" class="awe-section twitter awe-parallax" <?php display_background_css('twitter'); ?>>
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".5s">
                
                <div class="awe-content">
                    <div class="awe-twitter">
                        <i class="awe-icon fa fa-twitter"></i>
                        <div id="owl-twitter" class="col-xs-12">
                            <div class="items">
                                <?php echo do_shortcode('[rotatingtweets show_meta_timestamp="0" show_meta_screen_name="0" show_meta_via="0" speed="3000" rotation_type="fade" links_in_new_window="1" tweet_count="15" official_format="2" screen_name="301creativa"]' ); ?>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php sectionOverLay('twitter'); ?>
    </section>
<?php endif; ?>