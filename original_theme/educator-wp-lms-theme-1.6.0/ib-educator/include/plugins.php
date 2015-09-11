<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Get plugins required by this theme.
 */
function educator_get_plugins() {
	$plugins = array(
		array(
			'name'        => 'Educator Theme Features',
			'slug'        => 'ib-educator-theme',
			'source'      => get_template_directory() . '/include/plugins/ib-educator-theme.zip',
			'required'    => true,
			'version'     => '1.3.0',
			'plugin_type' => 'bundled',
		),

		array(
			'name'        => 'IB Slideshow',
			'slug'        => 'ib-slideshow',
			'source'      => get_template_directory() . '/include/plugins/ib-slideshow.zip',
			'required'    => false,
			'version'     => '1.0.0',
			'plugin_type' => 'bundled',
		),

		array(
			'name'        => 'IB Retina',
			'slug'        => 'ib-retina',
			'source'      => get_template_directory() . '/include/plugins/ib-retina.zip',
			'required'    => false,
			'version'     => '1.0.0',
			'plugin_type' => 'bundled',
		),

		array(
			'name'        => 'Dm3Shortcodes',
			'slug'        => 'dm3-shortcodes',
			'source'      => get_template_directory() . '/include/plugins/dm3-shortcodes.zip',
			'required'    => true,
			'version'     => '2.1.2',
			'plugin_type' => 'bundled',
		),

		array(
			'name'        => 'Envato WordPress Toolkit',
			'slug'        => 'envato-wordpress-toolkit',
			'source'      => get_template_directory() . '/include/plugins/envato-wordpress-toolkit.zip',
			'required'    => false,
			'version'     => '1.7.3',
			'plugin_type' => 'bundled',
		),

		array(
			'name'     => 'Educator WP',
			'slug'     => 'ibeducator',
			'required' => false,
		),

		array(
			'name'     => 'WooSidebars',
			'slug'     => 'woosidebars',
			'required' => false,
		),

		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),

		array(
			'name'     => 'Educator WooCommerce Integration',
			'slug'     => 'educator-woocommerce-integration',
			'required' => false,
		),
	);

	return apply_filters( 'educator_theme_get_plugins', $plugins );
}

/**
 * TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/include/class-tgm-plugin-activation.php';

/**
 * Register plugins with TGM Plugin Activation.
 */
function educator_register_required_plugins() {
	$config = array(
		'default_path' => '', // Default absolute path to pre-packaged plugins
		'menu'         => 'tgmpa-install-plugins', // Menu slug
		'has_notices'  => true, // Show admin notices or not
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false, // Automatically activate plugins after installation or not
		'message'      => '', // Message to output right before the plugins table
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'ib-educator' ),
			'menu_title'                      => __( 'Install Plugins', 'ib-educator' ),
			'installing'                      => __( 'Installing Plugin: %s', 'ib-educator' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'ib-educator' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'ib-educator' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'ib-educator' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'ib-educator' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'ib-educator' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'ib-educator' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'ib-educator' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'ib-educator' ), // %s = dashboard link.
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( educator_get_plugins(), $config );
}
add_action( 'tgmpa_register', 'educator_register_required_plugins' );

/**
 * Update notifications for bundled plugins.
 */
require_once get_template_directory() . '/include/ib-bundled-plugins.php';
IB_Bundled_Plugins::init( educator_get_plugins(), IB_THEME_VERSION, 'ib_educator_theme_version' );