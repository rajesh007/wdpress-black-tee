<?php
function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function optionsframework_options() {
	$options = array();

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		 'teeny'  => 'true',
		'tinymce' => array( 'plugins' => 'wordpress')
	);

/* General Settings  */

$options[] = array( "name" => __('Basic','prnews'),
			"type" => "heading");

$options[] = array( "name" => __('Small Logo','prnews'),
             'desc' => __('Logo height should be 40px. Width is flexible. Leave blank to use site title text.', 'prnews'),
			"id" => "prnews_logo",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Large Logo','prnews'),
			"desc" => __('Select a file to appear as the large logo for your site if you chose to have the logo below the navigation. The recommended maximum dimensions (if you plan on using a 728x90 ad) for this logo are 222x90.','prnews'),
			"id" => "prnews_logo_large",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Custom Favicon','prnews'),
			"desc" => __('Upload a 16x16px PNG/GIF image that will represent your website\'s favicon.','prnews'),
			"id" => "prnews_favicon",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Custom CSS','prnews'),
			"desc" =>  __('Enter your custom CSS here. You will not lose any of the CSS you enter here if you update the theme to a new version.','prnews'),
			"id" => "prnews_customcss",
			"std" => "",
			"type" => "textarea");

/* Social Media Settings */
$options[] = array( "name" => __('Social Media Settings','prnews'),
			"type" => "heading");
$options[] = array( "name" => __('Search','prnews'),
			"desc" =>  __('Display search box.','prnews'),
			"id" => "prnews_search",
			 "std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('RSS','prnews'),
			"desc" =>  __('Display RSS.','prnews'),
			"id" => "prnews_rss",
			 "std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('Facebook','prnews'),
			"desc" =>  __('Enter your Facebook Page full URL here.','prnews'),
			"id" => "prnews_facebook",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Twitter','prnews'),
			"desc" =>  __('Enter your Twitter full URL here.','prnews'),
			"id" => "prnews_twitter",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Pinterest','prnews'),
			"desc" =>  __('Enter your Pinterest full URL here.','prnews'),
			"id" => "prnews_pinterest",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Google Plus','prnews'),
			"desc" =>  __('Enter your full Google Plus URL here.','prnews'),
			"id" => "prnews_google",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Linkedin','prnews'),
			"desc" =>  __('Enter your Linkedin full URL here.','prnews'),
			"id" => "prnews_linkedin",
			"std" => "",
			"type" => "text");

/* Ad Management Settings */
$options[] = array( "name" => __('Ad Management','prnews'),
			"type" => "heading");

$options[] = array( "name" => __('Attention','prnews'),
			"desc" =>  __('The 300x250 and 160x600 ad units are controlled via Widgets.','prnews'),
			"type" => "info");
 
$options[] = array( "name" => __('728x90 - 750x100 Ad Code','prnews'),
			"desc" =>  __('Enter your ad code (Eg. Google Adsense).','prnews'),
			"id" => "prnews_leader_ad",
         	"std" => "",
           "type" => "textarea");

$options[] = array( "name" => __('222x90 - 200x100 Ad Code','prnews'),
			"desc" =>  __('Enter your ad code (Eg. Google Adsense).','prnews'),
			"id" => "prnews_small_ad",
        	"std" => "",
		    "type" => "textarea");

/* Fonts */
 $typography_mixed_fonts = array_merge( options_typography_get_os_fonts());

$options[] = array( "name" => __('Fonts','prnews'),
			"type" => "heading");
$options[] = array( "name" => __('Google and System Fonts','prnews'),
			"desc" =>  __('You do not need to select font for each element. For example. Body, paragraph and heading define the general fonts used.','prnews'),
	    	"type" => "info");
$options[] = array( 'name' => __('Body / Paragraph','prnews'),
	'desc' => '',
	'id' => 'google_font_body',
    'std' => array( 'size' => '14px', 'face' => 'Cambria, Georgia, serif', 'color' => '#333333'),
	'type' => 'typography',
	'options' => array(
	'faces' => $typography_mixed_fonts,
		'styles' => false )
	);
$options[] = array( 'name' => __('Site Title','prnews'),
	'desc' => '',
	'id' => 'google_font_brand',
    'std' => array( 'size' => '16px', 'face' => 'Lobster, cursive', 'color' => '#333333'),
	'type' => 'typography',
	'options' => array(
	'faces' => $typography_mixed_fonts,
		'styles' => false )
	);
$options[] = array( 'name' => __('Heading (H1 - H6)','prnews'),
	'desc' => '',
	'id' => 'google_font_h',
    'std' => array('face' => 'Lobster, cursive', 'color' => '#333333'),
	'type' => 'typography',
	'options' => array(
	'faces' => $typography_mixed_fonts,
	'sizes' => false,
	'styles' => false )
	);
$options[] = array( 'name' => __('Post/Page Title','prnews'),
	'desc' => '',
	'id' => 'google_font_ptitle',
    'std' => array( 'size' => '16px', 'face' => 'Lobster, cursive', 'color' => '#333333'),
	'type' => 'typography',
	'options' => array(
	'faces' => $typography_mixed_fonts,
		'styles' => false )
	);
$options[] = array( 'name' => __('Widget Title','prnews'),
	'desc' => '',
	'id' => 'google_font_widget_title',
    'std' => array( 'size' => '16px', 'face' => 'Lobster, cursive', 'color' => '#333333'),
	'type' => 'typography',
	'options' => array(
	'faces' => $typography_mixed_fonts,
	'styles' => false	)
	);
$options[] = array( "name" => __('Additional Google Fonts','prnews'),
			"desc" =>  __('Choose a font from the <a href="http://google.com/webfonts" target="_blank">Google WebFont Directory</a> and type its name in the text field.<br> Supported only for PR News Pro version','prnews'),
	    	"type" => "info");
$options[] = array( "name" => __('Support /  Documentation','prnews'),
			"type" => "heading");
$options[] = array( 'name' => __(' ','prnews'),
	"desc" =>  __('<h3><a id="support"   title="Support" href="http://www.premiumresponsive.com/support/" target="_blank">Support</a>   &nbsp; &nbsp;  <a id="demo" title="Demo / Documentation" href="http://pr.premiumresponsive.com/" target="_blank">Demo / Documentation</a></h3>','prnews'),
	    	"type" => "info");

return $options;
}
?>