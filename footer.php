<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage BS_CheckInn
 * @since BS CheckInn 1.0
 */

$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
?>

</div><!-- #main -->
</div><!-- #page -->
<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_menu',
                            'menu_class'     => '',
                            'menu_id'        => '',
                            'container'      => ''
                        )
                    );
                    ?>
                </div>
                <div class="col-lg-6">
                    <div class="co-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> | 
                            <?php echo do_shortcode('[theme_option name="site_info"]') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->


<?php wp_footer(); ?>
</body>

</html>