<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Fired during plugin license activations
 *
 * @link       https://acrosswp.com
 * @since      0.0.1
 *
 * @package    Post_Anonymously
 * @subpackage Post_Anonymously/includes
 */

if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	
    /**
     * The class responsible for loading edd updater class
     * core plugin.
     */
    require_once POST_ANONYMOUSLY_PLUGIN_PATH . 'admin/licenses/EDD_SL_Plugin_Updater.php';
}


/**
 * Fired during plugin licenses.
 *
 * This class defines all code necessary to run during the plugin's licenses and update.
 *
 * @since      0.0.1
 * @package    AcrossWP_Main_Menu_Licenses
 * @subpackage AcrossWP_Main_Menu_Licenses/includes
 * @author     AcrossWP <contact@acrosswp.com>
 */
class AcrossWP_Plugin_Update_Checker_Github {

    /**
	 * The single instance of the class.
	 *
	 * @var Post_Anonymously_Loader
	 * @since 0.0.1
	 */
	protected static $_instance = null;

	/**
	 * Load the licenses for the plugins
	 *
	 * @since 0.0.1
	 */
	protected $packages = array();

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->packages = apply_filters( 'acrosswp_plugins_update_checker_github', $this->packages );

		/**
		 * Action to do update for the plugins
		 */
		add_action( 'init', array( $this, 'plugin_updater' ) );
	}

	/**
	 * Update plugin if the licenses is valid
	 */
	public function plugin_updater() {

		$myUpdateChecker = PucFactory::buildUpdateChecker(
			'https://github.com/user-name/repo-name/',
			__FILE__,
			'unique-plugin-or-theme-slug'
		);
		
		//Set the branch that contains the stable release.
		$myUpdateChecker->setBranch('stable-branch-name');
	}
}