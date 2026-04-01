<?php
/**
 * Header Template
 * Association des Artisans
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" role="banner">
    <div class="header-inner">

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo('name'); ?> – Accueil">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-acaae.png" alt="Logo" class="logo-img">
        </a>

        <!-- Navigation Desktop -->
        <nav role="navigation" aria-label="Menu principal">
            <ul id="main-nav">
                <li <?php if (is_front_page()) echo 'class="current-menu-item"'; ?>>
                    <a href="<?php echo esc_url(home_url('/')); ?>">L'association</a>
                </li>
                <li <?php if (is_page('nos-artisans')) echo 'class="current-menu-item"'; ?>>
                    <a href="<?php echo esc_url(home_url('/artisans')); ?>">Nos artisans</a>
                </li>
                <li <?php if (is_page('les-membres')) echo 'class="current-menu-item"'; ?>>
                    <a href="<?php echo esc_url(home_url('/membres')); ?>">Les membres</a>
                </li>
                <li <?php if (is_page('galerie')) echo 'class="current-menu-item"'; ?>>
                    <a href="<?php echo esc_url(home_url('/galerie')); ?>">Galerie</a>
                </li>
                <li <?php if (is_page('actualites') || is_home()) echo 'class="current-menu-item"'; ?>>
                    <a href="<?php echo esc_url(home_url('/actualites')); ?>">Actualités</a>
                </li>
            </ul>
        </nav>

        <!-- Burger Mobile -->
        <button class="burger" id="burger-btn" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="mobile-nav">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>

    <!-- Menu Mobile -->
    <nav aria-label="Menu mobile" id="mobile-nav">
        <ul class="mobile-menu" id="mobile-menu" role="list">
            <li <?php if (is_front_page()) echo 'class="current-menu-item"'; ?>>
                <a href="<?php echo esc_url(home_url('/')); ?>">L'association</a>
            </li>
            <li <?php if (is_page('artisans')) echo 'class="current-menu-item"'; ?>>
                <a href="<?php echo esc_url(home_url('/artisans')); ?>">Nos artisans</a>
            </li>
            <li <?php if (is_page('membres')) echo 'class="current-menu-item"'; ?>>
                <a href="<?php echo esc_url(home_url('/membres')); ?>">Les membres</a>
            </li>
            <li <?php if (is_page('galerie')) echo 'class="current-menu-item"'; ?>>
                <a href="<?php echo esc_url(home_url('/galerie')); ?>">Galerie</a>
            </li>
            <li <?php if (is_page('actualites') || is_home()) echo 'class="current-menu-item"'; ?>>
                <a href="<?php echo esc_url(home_url('/actualites')); ?>">Actualités</a>
            </li>
        </ul>
    </nav>
</header>

<script src="<?php echo get_template_directory_uri(); ?>/js/header.js"></script>