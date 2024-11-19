<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <nav>
            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>
            <div class="logo">
                School of <br> <span> Excellence</span>
            </div>

            <div class="nav-items <?php echo is_user_logged_in() ? ' logged-in' : ''?>">
                <li <?php if (is_front_page()) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url(); ?>">Home</a></li>
                <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 12) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                <li <?php if (get_post_type() == 'course') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('course') ?>">Courses</a></li>
                <li <?php if ((get_post_type() == 'event') or is_page('past-events-archive')) echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
                <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
                <?php if (is_user_logged_in()) { 
                    if(check_user_role('teacher')){?>
                    <li><a class="sm-btn" href="<?php echo site_url('/lecture-notes') ?>">Lecture Notes</a></li>
                    <?php } ?>
                    <li><a class="sm-btn position" href="<?php echo wp_logout_url() ?>">Log Out</a></li>
                <?php } else { ?>
                    <li><a class="sm-btn" href="<?php echo wp_login_url() ?>">Login</a></li>
                    <li><a class="sm-btn position" href="<?php echo wp_registration_url() ?>">Sign Up</a></li>
                <?php } ?>
            </div>
            <div class="cancel-icon">
                <span class="fas fa-times"></span>
            </div>
            <div class="search-icon">
                <span class="fas fa-search"><a href="<?php echo site_url('/search') ?>"></a></span>
            </div>
        </nav>
    </header>