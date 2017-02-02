<?php
/*
Plugin Name: Third contact pluign
Plugin URI: http://www.oik-plugins.com/oik-plugins/third-contact-plugin/
Description: More options for more "contacts"
Version: 1.0.0
Author: bobbingwide
Author URI: http://www.oik-plugins.com/author/bobbingwide
License: GPL2

    Copyright 2013-2017 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

add_action( "oik_admin_menu", "oikmo_admin_menu" );

function oikmo_admin_menu() {
  oik_register_plugin_server( __FILE__ );
  oik_require( "admin/oik-moreoptions.php", "oik-moreoptions" );
  oikmo_lazy_admin_menu();
}

add_action( "admin_notices", "oikmo_activation", 11 );
/**
*/ 
function oikmo_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_" . $plugin_basename, __FUNCTION__ );   
    require_once( "admin/oik-activation.php" );
  }  
  $depends = "oik:3.1";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}






