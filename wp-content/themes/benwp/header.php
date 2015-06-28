<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Ben's Theme
 * @since 1.0
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico" type="image/x-icon">

    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="site-wrapper container">

    <header>

        <div class="logo">
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>

            <h2 class="site-description">
                <?php bloginfo('description'); ?>
            </h2>
        </div>

        <nav>
            <?php if (($locations = get_nav_menu_locations()) && isset($locations['principal'])) {
                wp_nav_menu(array(
                    'theme_location' => 'principal',
                    'menu_class' => 'nav-menu',
                    'container' => false
                ));
            } ?>
        </nav>

    </header>