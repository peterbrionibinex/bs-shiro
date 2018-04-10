<?php

// Theme-Setup
add_action( 'after_setup_theme', 'shiro_theme_setup' );

function shiro_theme_setup() {

//Set the content width based on the theme's design and stylesheet.
	if ( !isset( $content_width ) )
		$content_width = 900;

// This theme supports automatic feed links 
	add_theme_support( 'automatic-feed-links' );

// This theme supports post thumbnails
	add_theme_support( 'post-thumbnails' );	

// This theme uses wp_nav_menu() in one location
	register_nav_menus( array(
		'main-menu' => __( 'Primary Navigation', 'shiro' ),
	) );

// Register widgetized area and update sidebar with default widgets
	add_action( 'widgets_init', 'shiro_widgets_init' );

// Load up the theme options page
	require ( get_template_directory() . '/includes/theme-options.php' );
	
// Used to style the TinyMCE editor
	add_editor_style( 'editor-style.css');

// Make theme available for translation, Translations can be filed in the /languages/ directory
	load_theme_textdomain('shiro', get_template_directory() . '/languages');	
	
// This theme supports custom background (with backwards compatibility)
	$args = array(
		'default-color' => 'ffffff',
	);

	$args = apply_filters( 'shiro_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
	add_custom_background();
	}
}

function shiro_head_script(){
 ?>
	 <!--[if lt IE 9]>
		 <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
 <?php
 }
add_action( 'wp_head', 'shiro_head_script' );

function shiro_filter_wp_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend it to the default output
    $filtered_title = $site_name ." &laquo; ". $title;
    // Return the modified title
    return $filtered_title;
}

// Hook into 'wp_title'
add_filter( 'wp_title', 'shiro_filter_wp_title' );


// Register widgetized area and update sidebar with default widgets
function shiro_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Right sidebar', 'shiro' ),
		'id' => 'sidebar',
        'description' => __('The widget area on the right sidebar', 'shiro'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}


// Remove predefined gallery styles
add_filter( 'use_default_gallery_style', '__return_false' );


//Comments
function shiro_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'shiro_enqueue_comment_reply' );


// Template for comments & pingbacks 
if ( ! function_exists( 'shiro_comment' ) ) :

function shiro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php printf( __( '%s <span class="says">says:</span>', 'shiro' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- END .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'shiro' ); ?></em>
			<br />
		<?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( __( '%1$s at %2$s', 'shiro' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'shiro' ), ' ' );
			?>
		</div><!-- END .comment-meta .commentmetadata -->
		<div class="comment-body"><?php comment_text(); ?></div>
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- END .reply -->
	</div><!-- END #comment-body  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'shiro' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(edit)', 'shiro' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

// This theme supports custom header
require( get_template_directory() . '/includes/custom-header.php' );


 // Adds a class of .no-sidebar when there are no widgets in the right sidebar
function shiro_body_classes( $classes ) {
	if ( ! is_active_sidebar( 'sidebar' ) ) {
    	$classes[] = 'no-sidebar';
    }
	return $classes;
 }
 add_filter( 'body_class', 'shiro_body_classes' );
 
