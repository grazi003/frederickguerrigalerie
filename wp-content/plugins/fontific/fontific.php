<?php
/*
Plugin Name: Fontific
Plugin URI: http://kringapps.com/fontific
Description: Fontific allows you to use Google Fonts on your WordPress website. You can create as many font rules as you wish and apply them to elements on your website pages via css selector.
Version: 0.1.6
Requires at least: Wordpress 3.1
Tested up to: Wordpress 3.1
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Andrei Ivasiuc
Author URI: http://kringapps.com/fontific
*/

define( 'FONTIFIC_INCLUDES', 'includes/' );

include( FONTIFIC_INCLUDES . '/font_list.php' );

$new_fonts_file = dirname(__FILE__) . '/fonts.txt';

if( file_exists( $new_fonts_file ) ){
	$new_fonts = file( $new_fonts_file );
	$google_fonts = array_merge($google_fonts, $new_fonts);
	asort($google_fonts);
}

add_action('admin_init', 'fontific_init');

function fontific_init(){
	global $google_fonts;

	$fontific_fonts_url = 'http://fonts.googleapis.com/css?family=' . urlencode( join('|', $google_fonts) );
}

function fontific_print_scripts(){
	wp_enqueue_script( 'google.api', 'https://www.google.com/jsapi' );
	wp_enqueue_script( 'fontific', plugins_url('/'.FONTIFIC_INCLUDES.'/fontific.js', __FILE__), array('jquery') );
	wp_enqueue_script( 'jquery.slider', plugins_url('/'.FONTIFIC_INCLUDES.'/slider/js/slider.js', __FILE__), array('jquery') );
	wp_enqueue_script( 'jquery.colorpicker', plugins_url('/'.FONTIFIC_INCLUDES.'/colorpicker/js/colorpicker.js', __FILE__), array('jquery') );
}

function fontific_print_styles(){
	wp_enqueue_style( 'fontific', plugins_url('/'.FONTIFIC_INCLUDES.'/fontific.css', __FILE__) );
	wp_enqueue_style( 'jquery.slider', plugins_url('/'.FONTIFIC_INCLUDES.'/slider/css/slider.css', __FILE__) );
	wp_enqueue_style( 'jquery.colorpicker', plugins_url('/'.FONTIFIC_INCLUDES.'/colorpicker/css/colorpicker.css', __FILE__) );
	
}

add_action('init', 'fontific_frontend');

function fontific_frontend(){
	
	load_plugin_textdomain( 'fontific', false, dirname( plugin_basename( __FILE__ ) ) . '/' . FONTIFIC_INCLUDES . 'languages/' );
	
	wp_enqueue_script( 'google.api', 'https://www.google.com/jsapi' );

	// Getting font family names
	
	$rules = unserialize( get_option('fontific-rules') );
	$families = array();
	
	if( !empty( $rules ) ){
		
		foreach( $rules as $rule ){
			$families[] = $rule['font_family'];
		}	

		$google_fonts_url = 'http://fonts.googleapis.com/css?family=' . join('|', $families) . '&subset=cyrillic,latin';
	
		wp_enqueue_style( 'google.fonts', $google_fonts_url );
	}
}

add_action('wp_head', 'fontific_js_rules');

function fontific_js_rules(){
	
	$rules = unserialize( get_option('fontific-rules') );
	
	$html = '';
	
	if( !empty($rules) ){
	
		$html .= '<style type="text/css" media="screen">';
	
		foreach( $rules as $id => $rule ){

			$html .= "$rule[selector]{\n";
			$html .= "font-family: '$rule[font_family]' !important;\n";
			$html .= "font-weight: $rule[font_weight] !important;\n";
			$html .= "font-style: $rule[font_style] !important;\n";
			$html .= "font-size: $rule[font_size]px !important;\n";
			$html .= "color: #$rule[font_color] !important;\n";
			$html .= "line-height: $rule[font_line_height]em !important;\n";
			$html .= "word-spacing: $rule[font_word_spacing]em !important;\n";
			$html .= "letter-spacing: $rule[font_letter_spacing]em !important;\n";
			$html .= "}\n";
		}
		$html .= "</style>";
	
	}

	echo $html;
}

add_action('admin_menu', 'fontific_menu');

function fontific_menu(){
	$subpage['parent_slug'] = 'themes.php';
	$subpage['page_title'] = __("Fontific", 'fontific');
	$subpage['menu_title'] = __('Fonts', 'fontific');
	$subpage['capability'] = 'manage_options';
	$subpage['menu_slug'] = 'fontific_page';
	$subpage['function'] = 'fontific_page';
	
	$page = add_submenu_page( $subpage['parent_slug'], $subpage['page_title'], $subpage['menu_title'], $subpage['capability'], $subpage['menu_slug'], $subpage['function']);
	
	add_action( "admin_print_scripts-$page", 'fontific_print_scripts' );
	add_action( "admin_print_styles-$page", 'fontific_print_styles' );
	
}

function fontific_page(){
	global $google_fonts, $rules, $rule;
	
	$rules = unserialize( get_option('fontific-rules') );
	
	include( FONTIFIC_INCLUDES . 'fontific_page.php' );
}

/**
 * Fontific AJAX functionality
 *
 * @author Andrei Ivasiuc
 */

add_action('wp_ajax_fontific_add_rule', 'ajax_fontific_add_rule');

function ajax_fontific_add_rule() {
	global $rule, $google_fonts;
	
	$rule = array();
	
	$rule['id'] = 'fc-' . time();
	$rule['selector'] = __('Enter selector here', 'fontific');
	$rule['font_family'] = 'PT Sans';
	$rule['font_variant'] = 'r';
	$rule['font_size'] = '12';
	$rule['font_color'] = '000000';
	$rule['font_line_height'] = '1.4';
	$rule['font_word_spacing'] = '0';
	$rule['font_letter_spacing'] = '0';
	$rule['collapsed'] = false;

	
	include( FONTIFIC_INCLUDES . 'fontific_rule.php' );
	
	die();
}

add_action('wp_ajax_fontific_save_all', 'ajax_fontific_save_all');

function ajax_fontific_save_all() {
	
	$rules = $_POST['rules'];
	
	update_option( 'fontific-rules', serialize( $rules ) );

	die();
}


add_action('wp_ajax_fontific_delete', 'ajax_fontific_delete');

function ajax_fontific_delete() {
	
	$rules = unserialize( get_option('fontific-rules') );
	
	$rule = $_POST['rule'];

	unset($rules[$rule]);
	
	update_option( 'fontific-rules', serialize( $rules ) );

	die();
}


?>