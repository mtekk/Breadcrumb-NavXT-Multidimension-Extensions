<?php
/*
Plugin Name: Breadcrumb NavXT Multidimension Extensions
Plugin URI: https://mtekk.us/extensions/breadcrumb-navxt-multidimension-extensions/
Description: Adds the bcn_display_list_multidim function for Vista like breadcrumb trails. For details on how to use this plugin visit <a href="https://mtekk.us/extensions/breadcrumb-navxt-multidimension-extensions/">Breadcrumb NavXT Multidimension Extensions</a>. 
Version: 1.9.50
Author: John Havlik
Author URI: http://mtekk.us/
*/
/*  Copyright 2011-2015  John Havlik  (email : john.havlik@mtekk.us)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once(dirname(__FILE__) . '/includes/block_direct_access.php');
//Do a PHP version check, require 5.2 or newer
if(version_compare(phpversion(), '5.2.0', '<'))
{
	//Only purpose of this function is to echo out the PHP version error
	function bcn_multidim_ext_phpold()
	{
		printf('<div class="error"><p>' . __('Your PHP version is too old, please upgrade to a newer version. Your version is %1$s, Breadcrumb NavXT requires %2$s', 'breadcrumb-navxt-multidim-ext') . '</p></div>', phpversion(), '5.2.0');
	}
	//If we are in the admin, let's print a warning then return
	if(is_admin())
	{
		add_action('admin_notices', 'bcn_multidim_ext_phpold');
	}
	return;
}
//Have to bootstrap our init so that we don't rely on the order of activation
add_action('plugins_loaded', 'bcn_multidim_ext_init', 20);
function bcn_multidim_ext_init()
{
	//If Breadcrumb NavXT isn't active yet, warn the user
	if(!class_exists('breadcrumb_navxt'))
	{
		//Only purpose of this function is to echo out the PHP version error
		function bcn_multidim_ext_nobcn()
		{
			printf('<div class="error"><p>' . __('Breadcrumb NavXT is required for Breadcrumb NavXT Multidimension Extensions to work.', 'breadcrumb-navxt-multidim-ext') . '</p></div>');
		}
		//If we are in the admin, let's print a warning then return
		if(is_admin())
		{
			add_action('admin_notices', 'bcn_multidim_ext_nobcn');
		}
		return;
	}
	//If the installed Breadcrumb NavXT is 5.1.1 load current code
	else if(!defined('breadcrumb_navxt::version') || version_compare(breadcrumb_navxt::version, '5.1.0', '<'))
	{
		global $breadcrumb_navxt;
		//If the user's Breadcrumb NavXT version is more than 1 version back alert the user
		if(version_compare($breadcrumb_navxt->get_version(), '5.0.0', '<'))
		{
			//Only purpose of this function is to echo out the Breadcrumb NavXT version error
			function bcn_multidim_ext_old()
			{
				$version = __('unknown', 'breacrumb-navxt');
				//While not usefull today, in the future this will be hit
				if(defined('breadcrumb_navxt::version'))
				{
					$version = breadcrumb_navxt::version;
				}
				//Most will see this one
				else if(class_exists('breadcrumb_navxt'))
				{
					global $breadcrumb_navxt;
					$version = $breadcrumb_navxt->get_version();
				}
				printf('<div class="error"><p>' . __('Your Breadcrumb NavXT version is too old, please upgrade to a newer version. Your version is %1$s, Breadcrumb NavXT Multidimension Extensions requires %2$s', 'breadcrumb-navxt-multidim-ext') . '</p></div>', $version, '5.1.0');
			}
			//If we are in the admin, let's print a warning then return
			if(is_admin())
			{
				add_action('admin_notices', 'bcn_multidim_ext_old');
			}
			return;
		}
		//If they are on 5.1.0, load the leagacy multidim class
		else if(!class_exists('bcn_breadcrumb_trail_multidim'))
		{
			require_once(dirname(__FILE__) . '/class.bcn_breadcrumb_trail_multidim_legacy.php');
		}
	}
	//Otherwise we can now include our extended breadcrumb trail for 5.1.1+
	else if(!class_exists('bcn_breadcrumb_trail_multidim'))
	{
		require_once(dirname(__FILE__) . '/class.bcn_breadcrumb_trail_multidim.php');
		require_once(dirname(__FILE__) . '/class.bcn_breadcrumb_trail_multidim_children.php');
	}
}
add_filter('bcn_settings_init', 'bcn_multidim_ext_settings_setup');
/**
 * Adds in default settings needed for Breadcrumb NavXT Multidimension Extensions
 * 
 * @param array $settings The settings array
 * @return array The filtered/updated settings array
 */
function bcn_multidim_ext_settings_setup($settings)
{
	if(!isset($settings['bhome_display_children']))
	{
		//Add our 'default' use_menu option
		$settings['bhome_display_children'] = false;
	}
	return $settings; 
}
add_action('bcn_widget_display_types', 'bcn_multidim_ext_widget_types', 10);
/**
 * Adds the two multidimension types to the types option in the Breadcrumb NavXT widget
 * 
 * @param array $instance The settings array instance for this Widget
 */
function bcn_multidim_ext_widget_types($instance)
{
	?>
	<option value="multidim" <?php selected('multidim', $instance['type']);?>><?php _e('Multidimensional (siblings in 2nd dimension)', 'breadcrumb-navxt-multidim-ext'); ?></option>
	<option value="multidim_child" <?php selected('multidim_child', $instance['type']);?>><?php _e('Multidimensional (children in 2nd dimension)', 'breadcrumb-navxt-multidim-ext'); ?></option>
	<?php
}
add_action('bcn_widget_display_trail', 'bcn_multidim_ext_widget_display', 10);
/**
 * Checks and displays the proper breadcrumb trail type, if applicable
 * 
 * @param array $instance The settings array instance for this Widget
 */
function bcn_multidim_ext_widget_display($instance)
{
	if($instance['type'] == 'multidim')
	{
		//Display the multidimensional list output breadcrumb
		echo $instance['pretext'] . '<ol class="breadcrumb_trail breadcrumbs">';
		bcn_display_list_multidim(false, $instance['linked'], $instance['reverse']);
		echo '</ol>';
	}
	else if($instance['type'] == 'multidim_child')
	{
		//Display the multidimensional list output breadcrumb
		echo $instance['pretext'] . '<ol class="breadcrumb_trail breadcrumbs">';
		bcn_display_list_multidim_children(false, $instance['linked'], $instance['reverse']);
		echo '</ol>';
	}
}
add_action('plugins_loaded', 'bcn_multidim_ext_admin_init', 16);
function bcn_multidim_ext_admin_init()
{
	//If this is the admin, should load the admin settings update code
	if(is_admin() && class_exists('mtekk_adminKit'))
	{
		//Check to see if someone else has setup the extensions settings tab
		if(has_action('bcn_after_settings_tabs', 'bcn_extensions_tab') === false)
		{
			require_once(dirname(__FILE__) . '/includes/function.bcn_extensions_tab.php');
			add_action('bcn_after_settings_tabs', 'bcn_extensions_tab');
		}
		require_once(dirname(__FILE__) . '/class.bcn_multidim_admin.php');
		$bcn_multidim_admin = new bcn_multidim_admin(plugin_basename(__FILE__));
	}
}
/**
* Outputs the breadcrumb trail in a list with the sibling pages/terms of the breadcrumb in its second dimension
* 
* @param bool $return Whether to return or echo the trail.
* @param bool $linked Whether to allow hyperlinks in the trail or not.
* @param bool $reverse Whether to reverse the output or not.
*/
function bcn_display_list_multidim($return = false, $linked = true, $reverse = false)
{
	//Make new instance of the ext_breadcrumb_trail object
	$breadcrumb_trail = new bcn_breadcrumb_trail_multidim();
	//Initial setup of options
	breadcrumb_navxt::setup_options($breadcrumb_trail->opt);
	//Merge in options from the database
	$breadcrumb_trail->opt = wp_parse_args(get_option('bcn_options'), $breadcrumb_trail->opt);
	//Fill the breadcrumb trail
	$breadcrumb_trail->fill();
	//Display the trail
	return $breadcrumb_trail->display_list($return, $linked, $reverse);
}
/**
* Outputs the breadcrumb trail in a list with the child pages/terms of the breadcrumb in its second dimension
* 
* @param bool $return Whether to return or echo the trail.
* @param bool $linked Whether to allow hyperlinks in the trail or not.
* @param bool $reverse Whether to reverse the output or not.
*/
function bcn_display_list_multidim_children($return = false, $linked = true, $reverse = false)
{
	if(!class_exists('bcn_breadcrumb_trail_multidim_children'))
	{
		_doing_it_wrong(__FUNCTION__, __('Breadcrumb NavXT 5.1.1 or newer is required for the latest features', 'breadcrumb-navxt-multidim-ext'), '1.9.0');
		return;
	}
	//Make new instance of the ext_breadcrumb_trail object
	$breadcrumb_trail = new bcn_breadcrumb_trail_multidim_children();
	//Initial setup of options
	breadcrumb_navxt::setup_options($breadcrumb_trail->opt);
	//Merge in options from the database
	$breadcrumb_trail->opt = wp_parse_args(get_option('bcn_options'), $breadcrumb_trail->opt);
	//Fill the breadcrumb trail
	$breadcrumb_trail->fill();
	//Display the trail
	return $breadcrumb_trail->display_list($return, $linked, $reverse);
}