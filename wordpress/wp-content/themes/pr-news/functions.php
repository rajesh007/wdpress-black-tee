<?php
if ( ! defined( 'PRNEWS_VERSION' ) )
	define( 'PRNEWS_VERSION', '2.3' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

/*
 * PR News setup.
 * Sets up theme defaults and registers the various WordPress features 
 */
function prnews_setup() {
load_theme_textdomain( 'prnews', get_template_directory() . '/languages' );
add_editor_style();
if ( ! isset( $content_width ) ) $content_width = 900;
register_nav_menus(array('top_nav' => __('Top Navigation', 'prnews')));
register_nav_menus(array('bott_nav' => __('Bottom Navigation', 'prnews')));
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_theme_support('custom-background', array(
	'default-color' => 'f2f2f2',
));
add_theme_support( 'menus' );
        $defaults = array(
            'height' => 80
        );

add_theme_support('post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );

$args = array(
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 200,
	);
add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'prnews_setup' );

/**
 * Register widget areas.
 */
function prnews_widgets_init() {
register_sidebar(array('name' => 'sidebar-left', 'id' => 'sidebar-left', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => "</div>", 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
register_sidebar(array('name' => 'sidebar-right', 'id' => 'sidebar-right', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => "</div>", 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
register_sidebar(array('name' => 'sidebar-home', 'id' => 'sidebar-home', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => "</div>", 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
}
add_action( 'widgets_init', 'prnews_widgets_init' );

/*
 * Enqueue scripts and styles for the front end.
 */
function prnews_scripts() {
wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', null, '2.3.1');
wp_enqueue_style('fontawesome',  get_template_directory_uri() . '/css/font-awesome.min.css', array( 'bootstrap' ), '3.2.1' ); 
wp_enqueue_style( 'prnews-style', get_stylesheet_uri(), array(), '2.3' ); // Load Theme Stylesheet
wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
 wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/hover-dropdown.min.js', array('jquery'), null, true);
if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
wp_enqueue_script('comment-reply');
}
      if (!is_singular()) {		
       wp_enqueue_script( 'jquery-masonry' );
       wp_enqueue_script('infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'), null, false);
     }
}

add_action('wp_enqueue_scripts', 'prnews_scripts');

function prnews_foot_scripts() {
 	if (!is_singular()) {	?>
 <script type="text/javascript">
	jQuery(document).ready(function($) {
		/* Masonry */
		var $container = $('#mcontainer');
	 // Callback on After new masonry boxes load
		window.onAfterLoaded = function(el) {
			el.find('div.post-meta li').popover({
				trigger: 'hover',
				placement: 'top',
				container: 'body'
			});
		};

		onAfterLoaded($container.find('.boxy'));

		$container.imagesLoaded(function() {
			$container.masonry({
			itemSelector: '.boxy',
			isAnimated: true 
			});
		});
	});
</script>
	 
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var $container = $('#mcontainer');
			var pageNum = 1;
			$container.infinitescroll({
				navSelector : '#navigation',
				nextSelector : '#navigation #navigation-next a',
				itemSelector : '.boxy',
				maxPage       :20,
 loading: {
			msgText: '<?php _e('Loading', 'prpin') ?>',
			finishedMsg: '<?php _e('All items loaded', 'prpin') ?>',
			img: '<?php echo get_template_directory_uri(); ?>/img/loading.gif',	
	}
			},
			// trigger Masonry as a callback
			function(newElements) {
				// hide new items while they are loading
				var $newElems = $(newElements).css({opacity: 0});
					pageNum++;
				// ensure that images load before adding to masonry layout
				$newElems.imagesLoaded(function() {
					// show elems now they're ready
					$newElems.animate({
						opacity: 1});
					$container.masonry('appended', $newElems, true);
				});
				onAfterLoaded($newElems);
				});
		});
	</script>
 	<?php } // end if !is_singular() ?>
	<script>
		jQuery(document).ready(function($) {
			var $scrolltotop = $("#scroll-top");
			$scrolltotop.css('display', 'none');

			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$scrolltotop.slideDown('fast');
					} else {
						$scrolltotop.slideUp('fast');
					}
				});
		
				$scrolltotop.click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 'fast');
					return false;
				});
			});
		});

		jQuery(document).ready(function($) {
			var $footernav = $("#footernav");
			$footernav.css('display', 'none');

			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$footernav.slideDown('fast');
					} else {
						$footernav.slideUp('fast');
					}
				});
			});
		});
	</script>
		<?php
}
add_action('wp_footer', 'prnews_foot_scripts');

/**
 * Bootstrap:  Register Custom Navigation Walker
 */
require_once('inc/wp_bootstrap_navwalker.php');
 
function prnews_thumbnail($pID,$thumb='medium') { 
$imgsrc = FALSE; 
 if (has_post_thumbnail()) {
						$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($pID),$thumb);
						$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$pID&post_type=attachment&post_mime_type=image&numberposts=0")) {
				foreach($postimages as $postimage) {
							$imgsrc = wp_get_attachment_image_src($postimage->ID, $thumb);
							$imgsrc = $imgsrc[0];
						}
					} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
						$imgsrc = $match[1];
					} 
		if($imgsrc) { 
$imgsrc = '<a href="'. get_permalink().'"><img src="'.$imgsrc.'" alt="'.get_the_title().'" /></a>';
     	return $imgsrc;
		}  
	} 

function prnews_sidebar_home($paged) {	  
         	if ($paged == 0 && is_active_sidebar('sidebar-home')) { ?>
	<div id="home-sidebar" class="sidebar boxy">
				<?php get_sidebar(); ?>
				</div>
<?php }
}

 /**
 * Replace rel="category tag" with rel="tag"
 * For W3C validation purposes only.
 */
function prnews_replace_rel_category ($output) {
    $output = str_replace(' rel="category tag"', ' rel="tag"', $output);
    return $output;
}

add_filter('wp_list_categories', 'prnews_replace_rel_category');
add_filter('the_category', 'prnews_replace_rel_category');

 // Comment Layout

function prnews_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

		<?php if ('1' == $show_avatars = get_option('show_avatars')) { ?>
		<div class="comment-avatar"><?php echo get_avatar(get_comment_author_email(), '48'); ?></div>
		<?php } ?>
		<div class="comment-content<?php if ($show_avatars == '1') { echo ' comment-content-with-avatar'; } ?>">
			
			<strong><span <?php comment_class(); ?>><?php comment_author_link() ?></span></strong> / <?php comment_date('j M Y g:ia'); ?> <a href="#comment-<?php comment_ID() ?>" title="<?php esc_attr_e('Comment Permalink', 'prnews'); ?>">#</a> <?php edit_comment_link('<i class="icon-pencil"></i>','','');?>
			<?php if ($comment->comment_approved == '0') : ?>
			<br /><em><?php _e('Your comment is awaiting moderation.', 'prnews'); ?></em>
			<?php endif; ?>
	
			<?php comment_text() ?>
			<?php comment_reply_link(array('reply_text' => __('<i class="icon-reply"></i> Reply', 'prnews'), 'depth' => $depth, 'max_depth'=> $args['max_depth'])) ?>
        </div>
	<?php
}

// Fonts
require_once("inc/prnews-fonts.php");

/**
 * Title tag filter
 */
function prnews_title_filter( $title, $sep, $seplocation ) {
    // get special index page type (if any)
    if( is_category() ) $type = 'Category';
    elseif( is_tag() ) $type = 'Tag';
    elseif( is_author() ) $type . 'Author';
    elseif( is_date() || is_archive() ) $type = 'Archives';
    else $type = false;
 
 if ( is_feed() )	return $title;
    // get the page number
    if( get_query_var( 'paged' ) )
        $page_num = get_query_var( 'paged' ); // on index
    elseif( get_query_var( 'page' ) )
        $page_num = get_query_var( 'page' ); // on single
    else $page_num = false;
 
    // strip title separator
    $title = trim( str_replace( $sep, '', $title ) );
     
    // determine order based on seplocation
    $parts = array( get_bloginfo( 'name' ), $type, $title, $page_num );
    if( $seplocation == 'left' )
        $parts = array_reverse( $parts ); 
     
    // strip blanks, implode, and return title tag
    $parts = array_filter( $parts );
    return implode( ' ' . $sep . ' ', $parts );     
}
// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'prnews_title_filter', 10, 3 );
 ?>