<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo("charset"); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="<?php bloginfo("description"); ?>">
		<title><?php
  wp_title("");
  if (wp_title("", false)) {
      echo " : ";
  }
  bloginfo("name");
  ?></title>

		<link
            rel="icon"
            type="image/png"
            href="<?php echo esc_url(
                get_template_directory_uri(),
            ); ?>/favicon-96x96.png"
            sizes="96x96"
        />
        <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(
            get_template_directory_uri(),
        ); ?>/favicon.svg" />
        <link rel="shortcut icon" href="<?php echo esc_url(
            get_template_directory_uri(),
        ); ?>/favicon.ico" />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="<?php echo esc_url(
                get_template_directory_uri(),
            ); ?>/apple-touch-icon.png"
        />
        <meta name="apple-mobile-web-app-title" content="Thermopac" />
        <link rel="manifest" href="<?php echo esc_url(
            get_template_directory_uri(),
        ); ?>/site.webmanifest" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo(
      "name",
  ); ?>" href="<?php bloginfo("rss2_url"); ?>" />

		<?php wp_head(); ?>

		<link rel="stylesheet" href="<?php echo esc_url(
      get_template_directory_uri(),
  ); ?>/assets/css/styles.css" />
	</head>
	<body <?php body_class(); ?>>
        <div id="backdrop"></div>
        <div class="menu">
            <a id="cerrar-menu" href="javascript:void(0)">
                <i class="fas fa-times"></i>
            </a>
            <div class="menu-contenido">
                <a class="anchor" id="btn-logo" href="<?php echo esc_url(
                    home_url(),
                ); ?>">
                    <img
                        class="logo img-fluid"
                        alt="Thermopac"
                        src="<?php echo esc_url(
                            get_template_directory_uri(),
                        ); ?>/assets/images/logo-light@2x.png"
                        data-theme-light="<?php echo esc_url(
                            get_template_directory_uri(),
                        ); ?>/assets/images/logo-light@2x.png"
                        data-theme-dark="<?php echo esc_url(
                            get_template_directory_uri(),
                        ); ?>/assets/images/logo-dark@2x.png"
                    />
                </a>
                <nav>
                    <ul id="navmenu" class="list-unstyled mb-0">
                        <li>
                            <a href="<?php echo esc_url(
                                home_url(),
                            ); ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(
                                get_permalink(33),
                            ); ?>">About Us</a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(
                                get_permalink(35),
                            ); ?>">Services</a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(
                                get_permalink(39),
                            ); ?>">Markets</a>
                        </li>
                        <li>
                            <a href="<?php if (!is_home()):
                                echo esc_url(home_url());
                            endif; ?>#news-and-events">News and Events</a>
                        </li>
                    </ul>
                </nav>
                <a
                    href="#contact"
                    class="anchor btn btn-primary rounded-pill"
                    id="btn-contact"
                    >Contact Us</a
                >
            </div>
        </div>

        <header id="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-2 my-auto">
                        <a href="<?php echo esc_url(home_url()); ?>">
                            <img
                                id="logo-navbar"
                                class="logo img-fluid"
                                alt="Thermopac"
                                src="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-light@2x.png"
                                data-theme-light="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-light@2x.png"
                                data-theme-dark="<?php echo esc_url(
                                    get_template_directory_uri(),
                                ); ?>/assets/images/logo-dark@2x.png"
                            />
                        </a>
                    </div>
                    <div class="col-lg-9 my-auto text-center d-none d-lg-block">
                        <nav>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        home_url(),
                                    ); ?>" <?php if (
    is_front_page()
): ?>class="active"<?php endif; ?>>Home</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(33),
                                    ); ?>" <?php if (
    is_page(33)
): ?>class="active"<?php endif; ?>>About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(35),
                                    ); ?>" <?php if (
    is_page(35)
): ?>class="active"<?php endif; ?>>Services</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(
                                        get_permalink(39),
                                    ); ?>" <?php if (
    is_page(39)
): ?>class="active"<?php endif; ?>>Markets</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php if (!is_home()):
                                        echo esc_url(home_url());
                                    endif; ?>#news-and-events">News and Events</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#contact">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 col-lg-1 my-auto text-end">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="#" id="search-btn">
                                    <i
                                        class="fa-solid fa-magnifying-glass"
                                        alt="Search"
                                    ></i>
                                </a>
                            </li>
                            <li class="list-inline-item d-lg-none">
                                <a id="mburger" href="javascript:void(0)">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
