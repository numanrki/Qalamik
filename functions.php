<?php
/**
 * Qalamik Theme Functions
 *
 * @package Qalamik
 * @since Qalamik 2.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Setup
 */
if ( ! function_exists( 'qalamik_setup' ) ) :
	function qalamik_setup() {
		
		// Make theme available for translation
		load_theme_textdomain( 'qalamik', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		
		// Add custom image sizes
		add_image_size( 'qalamik-thumbnail', 150, 150, true );
		
		// Register navigation menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'qalamik' ),
			'top'     => esc_html__( 'Top Menu', 'qalamik' ),
		) );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		) );
		
		// Add theme support for selective refresh for widgets
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Add support for custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		
		// Add support for custom header
		add_theme_support( 'custom-header', array(
			'default-image'      => '',
			'width'              => 983,
			'height'             => 160,
			'flex-height'        => true,
			'flex-width'         => true,
		) );
		
		// Add support for custom background
		add_theme_support( 'custom-background', array(
			'default-color' => 'C9CFCE',
		) );
		
		// Add support for Block Styles
		add_theme_support( 'wp-block-styles' );
		
		// Add support for editor styles
		add_theme_support( 'editor-styles' );
		
		// Enqueue editor styles
		add_editor_style( 'style-editor.css' );
		
		// Add support for responsive embedded content
		add_theme_support( 'responsive-embeds' );
		
		// Add support for align wide blocks
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'qalamik_setup' );

/**
 * Set the content width in pixels
 */
if ( ! isset( $content_width ) ) {
	$content_width = 594;
}

/**
 * Enqueue scripts and styles
 */
function qalamik_scripts() {
	// Enqueue theme stylesheet
	wp_enqueue_style( 'qalamik-style', get_stylesheet_uri(), array(), '2.0' );
	
	// Enqueue Urdu OpenPad script
	wp_enqueue_script( 'qalamik-urdu-openpad', get_template_directory_uri() . '/urdu-open-pad.js', array(), '1.0', true );
	
	// Enqueue comment reply script on single posts
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qalamik_scripts' );

/**
 * Register widget areas
 */
function qalamik_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'qalamik' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your right sidebar.', 'qalamik' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li><br>',
		'before_title'  => '<h2 class="sidebartitle">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'qalamik' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your left sidebar.', 'qalamik' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="sidebartitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'qalamik_widgets_init' );

////////////////////////////////////////////////////////////////////////////////
// Recent Comments Function
////////////////////////////////////////////////////////////////////////////////
function mw_recent_comments(
	$no_comments = 8,
	$show_pass_post = false,
	$title_length = 50,
	$author_length = 30,
	$wordwrap_length = 50,
	$type = 'all',
	$format = '<li>%date%: <a href="%permalink%" title="%title%">%title%</a> (von %author_full%)</li>',
	$date_format = 'd.m.y, H:i',
	$none_found = '<li>No Comment</li>',
	$type_text_pingback = 'Pingback von',
	$type_text_trackback = 'Trackback von',
	$type_text_comment = 'von'
) {
	
	// Language
	$mwlang_anonymous = 'Anonym';
	$mwlang_authorurl_title_before = 'Webseite von &lsaquo;';
	$mwlang_authorurl_title_after = '&rsaquo; besuchen';
	
	global $wpdb;
	
	$no_comments = absint( $no_comments );
	
	$request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, comment_date, post_title, comment_type
		FROM $wpdb->comments 
		LEFT JOIN $wpdb->posts ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID
		WHERE post_status IN ('publish','static') ";	
	switch( $type ) {
		case 'all':
			// add nothing
			break;
		case 'comment_only':
			$request .= " AND $wpdb->comments.comment_type='' ";
			break;
		case 'trackback_only':
			$request .= " AND ( $wpdb->comments.comment_type='trackback' OR $wpdb->comments.comment_type='pingback' ) ";
			break;
		default:
			break;
	}
	
	if ( ! $show_pass_post ) {
		$request .= " AND post_password ='' ";
	}
	
	$request .= " AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT %d";
	
	$comments = $wpdb->get_results( $wpdb->prepare( $request, $no_comments ) );
	$output = '';
	
	if ( $comments ) {
		foreach ( $comments as $comment ) {
			
			// Permalink to post/comment
			$loop_res['permalink'] = get_permalink( $comment->ID ) . '#comment-' . $comment->comment_ID;
			
			// Title of the post
			$loop_res['post_title'] = stripslashes( $comment->post_title );
			$loop_res['post_title'] = wordwrap( $loop_res['post_title'], $wordwrap_length, ' ', 1 );
			
			if ( strlen( $loop_res['post_title'] ) >= $title_length ) {
				$loop_res['post_title'] = substr( $loop_res['post_title'], 0, $title_length ) . '&#8230;';
			}
			
			// Author's name only
			$loop_res['author_name'] = stripslashes( $comment->comment_author );
			$loop_res['author_name'] = wordwrap( $loop_res['author_name'], $wordwrap_length, ' ', 1 );
			
			if ( $loop_res['author_name'] == '' ) {
				$loop_res['author_name'] = $mwlang_anonymous;
			}
			if ( strlen( $loop_res['author_name'] ) >= $author_length ) {
				$loop_res['author_name'] = substr( $loop_res['author_name'], 0, $author_length ) . '&#8230;';
			}
			
			// Full author (link, name)
			$author_url = $comment->comment_author_url;
			if ( empty( $author_url ) ) {
				$loop_res['author_full'] = $loop_res['author_name'];
			} else {
				$loop_res['author_full'] = '<a href="' . esc_url( $author_url ) . '" title="' . esc_attr( $mwlang_authorurl_title_before . $loop_res['author_name'] . $mwlang_authorurl_title_after ) . '">' . esc_html( $loop_res['author_name'] ) . '</a>';
			}
			
			// Comment type
			if ( $comment->comment_type == 'pingback' ) {
				$loop_res['comment_type'] = $type_text_pingback;
			} elseif ( $comment->comment_type == 'trackback' ) {
				$loop_res['comment_type'] = $type_text_trackback;
			} else {
				$loop_res['comment_type'] = $type_text_comment;
			}
			
			// Date of comment
			$loop_res['comment_date'] = mysql2date( $date_format, $comment->comment_date );
			
			// Output element
			$element_loop = str_replace( '%permalink%', esc_url( $loop_res['permalink'] ), $format );
			$element_loop = str_replace( '%title%', esc_html( $loop_res['post_title'] ), $element_loop );
			$element_loop = str_replace( '%author_name%', esc_html( $loop_res['author_name'] ), $element_loop );
			$element_loop = str_replace( '%author_full%', $loop_res['author_full'], $element_loop );
			$element_loop = str_replace( '%date%', esc_html( $loop_res['comment_date'] ), $element_loop );
			$element_loop = str_replace( '%type%', esc_html( $loop_res['comment_type'] ), $element_loop );
			
			$output .= $element_loop . "\n";
		}
		
		$output = convert_smilies( $output );
	} else {
		$output .= $none_found;
	}
	
	echo wp_kses_post( $output );
}

// Include typography functions if file exists
if ( file_exists( get_template_directory() . '/inc/typography.php' ) ) {
	require get_template_directory() . '/inc/typography.php';
}

/**
 * Custom comment callback
 */
if ( ! function_exists( 'qalamik_comment' ) ) :
	function qalamik_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comment-main">
				<div class="avatar" title="<?php esc_attr_e( 'Avatar of Comment\'s Author', 'qalamik' ); ?>">
					<?php echo get_avatar( $comment, 45 ); ?>
				</div>
				
				<div class="name-and-date">
					<cite title="<?php esc_attr_e( 'Author of this Comment', 'qalamik' ); ?>">
						<?php comment_author_link(); ?>
					</cite> نے لکھا:
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<em><?php esc_html_e( 'آپکا تبصرہ نظر ثانی کے مراحل میں ہے.', 'qalamik' ); ?></em>
					<?php endif; ?>
					<small class="commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php esc_attr_e( 'Date and Time of Comment, Permanent Link of Comment', 'qalamik' ); ?>">
							<?php printf( '%1$s بوقت %2$s', get_comment_date( 'l، d F Y' ), get_comment_time() ); ?>
						</a>
						<?php edit_comment_link( 'ت', '', '' ); ?>
					</small>
				</div>
			</div>
			<?php comment_text(); ?>
		<?php
	}
endif;
