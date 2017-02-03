<!-- News -->
<?php
    global $customize,$is_customize_mode;
    if($customize['lastedpost']['show'] || $is_customize_mode): 
?>
    <section id="section-blog-301" class="section-blog-301">
       <article>
            <div class="container">
                <div class="title">
                    <div class="cont-text">
                        <p>Así</p>
                        <span class="text-1">vivimos</span>
                        <span class="text-2">las calles</span>
                    </div>
                </div>
                <div class="text-descript"><p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>
                <a href="blog" target="_blank">Ver más...</a>
                </div>
                <div class="silla-301">
                    <img src="wp-content/themes/301_creativa/assets/images/silla-y-periodico-blog.png" alt="">
                </div>
            </div>
            <div class="farol-301"><img src="wp-content/themes/301_creativa/assets/images/lampara-blog.png" alt=""></div>
        </article>
    </section>
<?php endif; ?>