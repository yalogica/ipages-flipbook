<?php
/**
 * Plugin Name: iPages Flipbook
 * Plugin URI: https://avirtum.com/ipages-wordpress-plugin/
 * Description: iPages Flipbook PDF Viewer is a lightweight and rich-feature plugin helps you create great interactive digital HTML5 flipbooks. It provides an easy way for you to convert static PDF documents or image sets into the online magazine, interactive catalogs, media brochures or booklets in seconds.
 * Version: 1.5.4
 * Requires at least: 4.6
 * Requires PHP: 7.0
 * Author: Avirtum
 * Author URI: https://1.envato.market/QJXRz
 * License: GPLv3
 * Text Domain: ipages_flipbook
 * Domain Path: /languages
 */
defined('ABSPATH') || exit;

define('IPGS_PLUGIN_NAME', 'ipages_flipbook');
define('IPGS_PLUGIN_VERSION', '1.5.4');
define('IPGS_DB_VERSION', '1.1.0');
define('IPGS_SHORTCODE_NAME', 'ipages');
define('IPGS_PLUGIN_REST_URL', 'ipages/v1' );
define('IPGS_PLUGIN_PUBLIC_REST_URL', 'ipages/public/v1' );

/**
 * The code that runs during plugin activation
 */
function ipages_activate() {
	require_once(plugin_dir_path(__FILE__) . 'includes/activator.php');
	$activator = new iPages_Activator();
	$activator->activate();
}
register_activation_hook(__FILE__, 'ipages_activate');

/**
 * The code that runs during plugin deactivation
 */
function ipages_deactivate() {
	require_once(plugin_dir_path(__FILE__) . 'includes/deactivator.php');
	$deactivator = new iPages_Deactivator();
	$deactivator->deactivate();
}
register_deactivation_hook(__FILE__, 'ipages_deactivate');

/**
 * The code that runs after plugins loaded
 */
function ipages_check_db() {
	require_once(plugin_dir_path(__FILE__) . 'includes/activator.php');
	
	$activator = new iPages_Activator();
	$activator->check_db();
}
add_action('plugins_loaded', 'ipages_check_db');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
require_once(plugin_dir_path(__FILE__) . 'includes/plugin.php');
$pluginBasename = plugin_basename(__FILE__);
new iPages_App($pluginBasename);


