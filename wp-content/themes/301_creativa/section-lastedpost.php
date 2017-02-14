<!-- News -->
<?php
    global $customize,$is_customize_mode;
    if($customize['lastedpost']['show'] || $is_customize_mode): 
?>
    <section id="section-blog-301" class="section-blog-301">
       <article>
            <div class="container">
                <div class="title wow bounceInDown">
                    <div class="cont-text">
                        <p>Así</p>
                        <span class="text-1">vivimos</span>
                        <span class="text-2">las calles</span>
                    </div>
                </div>
                <div class="text-descript wow bounceInRight"><p>Contando nuestras historias desde lo cotidiano...</p>
                <a href="blog">Ver más...</a>
                </div>
                <div class="silla-301">
                    <img src="wp-content/themes/301_creativa/assets/images/silla-y-periodico-blog.png" alt="" class="wow bounceInLeft">
                </div>
            </div>
            <div class="farol-301"><img src="wp-content/themes/301_creativa/assets/images/lampara-blog.png" alt="" class="wow bounceInRight"></div>
        </article>
    </section>
<?php endif; ?>