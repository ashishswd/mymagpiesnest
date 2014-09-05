<?php /* Wrapper Name: Footer */ ?>

<section class="footer_wrapper">    
    <footer class="content_wrapper">
        <section class="footer_left">
            <div class="footer_links">
				<?php dynamic_sidebar("footer-sidebar-1"); ?>
            </div>
            <div class="footer_products">
				<?php dynamic_sidebar("footer-sidebar-2"); ?>
            </div>
            <div class="footer_social">
				<?php dynamic_sidebar("footer-sidebar-3"); ?>
            </div>
            <div class="footer_opening-hours">
				<?php dynamic_sidebar("footer-sidebar-4"); ?>
            </div>
        </section>
        <section class="footer_right">
            <div class="pay_pal_logo">
                <div class="pay_pal">
                	<img src="<?php echo PARENT_URL; ?>/images/pay-pal.png" alt="pay Pal" alt="Pay Pal" />
                </div>
                <div class="business_award">
                	<img src="<?php echo PARENT_URL; ?>/images/pride-business-awards.png" alt="Pride Business Awards" title="Pride Business Awards" />
                </div>
                <div class="social_icons">
                	<a href=""><i class="fa fa-facebook-square"></i></a>
                    <a href=""><i class="fa fa-pinterest-square"></i></a>
                    <a href=""><i class="fa fa-twitter-square"></i></a>
                </div>
            </div>
        </section>
        <div class="clear"></div>
    </footer>
</section>