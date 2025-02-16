<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon  search-switch">
        <i class="icon_search"></i>
    </div>
    <div class="header-configure-area">
        <a href="#" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu_class'     => '',
                'menu_id'        => '',
                'container'      => ''
            )
        );
        ?>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> <?php echo do_shortcode('[theme_option name="contact_phone"]') ?></li>
        <li><i class="fa fa-envelope"></i> <?php echo do_shortcode('[theme_option name="support_email"]') ?></li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section shadow">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> <?php echo do_shortcode('[theme_option name="contact_phone"]') ?></li>
                        <li><i class="fa fa-envelope"></i> <?php echo do_shortcode('[theme_option name="support_email"]') ?></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="#" class="bk-btn">Booking Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <?php get_template_part('partials/header/site-branding'); ?>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => '',
                                    'menu_id'        => '',
                                    'container'      => ''
                                )
                            );
                            ?>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->