<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?php wp_title('&laquo;', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_uri() ?>" />
<?php $options = get_option('shiro_theme_options');
	if( $options['custom_favicon'] != '' ) : ?>
<link rel="shortcut icon" type="image/ico" href="<?php echo esc_url( $options['custom_favicon'] ); ?>" />
<?php endif ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="clearfix">
	<div id="main">   
	<div id="primary">
		<header id="branding">
            <hgroup id="blog-title">
         
				<!--shows header-image if there is one -->
				<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
					<?php  // if ( ! empty( $header_image ) ) ?>

					<!--shows site-title and site-description if there is no header-image -->      
					<?php else: ?>
						<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif  ?> 		
			</hgroup>
		</header><!-- END #branding -->
        
  		<nav id="main-menu" class="clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'depth' => 2 ) ); ?>
		</nav><!-- END #main-menu -->				
        
     	<div id="copyright">
			<p><?php printf( __('&copy; by', 'shiro'))?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>, <?php echo date ('Y') ?></p><p><?php printf( __('proudly powered by <a href="http://wordpress.org/">WordPress</a>', 'shiro'))?></p><p><?php printf( __( 'Theme: %1$s by %2$s', 'shiro' ), 'Shiro', '<a href="http://www.pixxels.at/">pixxels.at</a>' ); ?></p>        
        </div><!-- END #copyright-->
    </div> <!-- END #primary -->
				
                 