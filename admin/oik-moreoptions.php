<?php // (C) Copyright Bobbing Wide 2013-2019

/**
 * Implements "oik_admin_menu" action for oik-moreoptions
 */
function oikmo_lazy_admin_menu() {
  register_setting( 'oik_options_options2', 'bw_options2', 'oik_options_validate' );
  add_submenu_page( 'oik_menu', 'oik options-2', 'More Options 2', 'manage_options', 'oik_options-2', 'oik_options_do_page_2');
}

/** 
 * Draw the oik options-2 page
 *
 * This page is for additional fields to enable a third set of bw_options, with $alt = 2;
*/
function oik_options_do_page_2() {
  oik_menu_header( "extra shortcode options 2", "w60pc" );
  oik_box( null, null, "Alternative values using alt=2", "oik_extra_shortcode_options_2" );
  ecolumn();
  scolumn( "w40pc" );
  oik_box( null, null, "usage notes", "oik_extra_usage_notes_2" );
  oik_menu_footer();
  bw_flush();
}

function oik_extra_shortcode_options_2() {    
  $alt = "2";
  $option = "bw_options$alt";
  $options = bw_form_start( $option, "oik_options_options$alt" );
  
  /* We can't use the function blocks until they support the shortcode parameter suffix " alt=2" */ 

  bw_textfield_arr( $option, "Contact [bw_contact alt=2]", $options, 'contact', 50 );
  bw_textfield_arr( $option, "Email [bw_email alt=2]", $options, 'email', 50 );
  bw_textfield_arr( $option, "Telephone [bw_telephone alt=2]", $options, 'telephone', 50 );
  bw_textfield_arr( $option, "Mobile [bw_mobile alt=2]", $options, 'mobile', 50 );
  
  bw_textfield_arr( $option, "Extended-address [bw_address alt=2]", $options, 'extended-address', 50 );
  bw_textfield_arr( $option, "Street-address", $options, 'street-address', 50 );
  bw_textfield_arr( $option, "Locality", $options, 'locality', 50 );
  bw_textfield_arr( $option, "Region", $options, 'region', 50 );
  bw_textfield_arr( $option, "Post Code", $options, 'postal-code', 50 );
  bw_textfield_arr( $option, "Country name", $options, 'country-name', 50 );
  
  bw_textarea_arr( $option, "Google Maps introductory text for [bw_show_googlemap alt=2]", $options, 'gmap_intro', 50 );
  bw_textfield_arr( $option, "Latitude [bw_geo alt=2] [bw_directions alt=2]", $options, 'lat', 50 );
  bw_textfield_arr( $option, "Longitude [bw_show_googlemap alt=2]", $options, 'long', 50 );
 
  bw_tablerow( array( "", "<input type=\"submit\" name=\"ok\" value=\"Save changes\" class=\"button-primary\"/>") ); 
  etag( "table" ); 			
  etag( "form" );
  bw_flush();
}  
  
function oik_extra_usage_notes_2() {
  oik_require( "includes/oik-sc-help.php" );
  p( "Use the shortcodes in your pages, widgets and titles. e.g." );
  bw_invoke_shortcode( "bw_contact", "alt=2", "Display your alternative contact name." );
  bw_invoke_shortcode( "bw_email", "alt=2 prefix=e-mail", "Display your alternative email address, with a prefix of 'e-mail'." );
  bw_invoke_shortcode( "bw_telephone", "alt=2", "Display your alternative telephone number." );
  bw_invoke_shortcode( "bw_address", "alt=2", "Display your alternative address." );
  bw_invoke_shortcode( "bw_show_googlemap", "alt=2", "Display a Googlemap for your alternative address." );
  bw_invoke_shortcode( "bw_directions", "alt=2", "Display directions to the alternative address." );
  bw_flush();
}







  
