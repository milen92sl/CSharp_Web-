<?php
/**
 * Customizer section notice class file.
 *
 * @package Blossom_Fashion_Pro
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
class Blossom_Fashion_Pro_Customizer_Section {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);

		/* ajax callback for dismissable recommended plugins */
		add_action('wp_ajax_dismiss_section_notice', array($this, 'dismiss_section_notice'));
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @modified 1.1.40
	 * @access public
	 * @param  object $manager WordPress customizer object.
	 * @return void
	 */
	public function sections($manager) {

		require_once get_template_directory() . '/inc/customizer-plugin-recommend/section-notice/class-section-notice-section.php';
		$manager->register_section_type('Blossom_Fashion_Pro_Customizer_Section_Notice');

		if (!class_exists('Blossomthemes_Toolkit')) {
			$manager->add_section(
				new Blossom_Fashion_Pro_Customizer_Section_Notice(
					$manager, 'ta_info_blossomthemes_toolkit_companion', array(
						'section_text' => __('To have access to other sections please install and configure BlossomThemes Toolkit plugin.', 'blossom-fashion-pro'),
						'slug' => 'blossomthemes-toolkit',
						'panel' => 'home_page_setting',
						'priority' => 451,
						'capability' => 'install_plugins',
						'hide_notice' => (bool) get_option('blossom_fashion_pro_dismissed_ta_info_blossomthemes_toolkit_companion', false),
						'button_screenreader' => '',
					)
				)
			);
		}
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		Blossom_Fashion_Pro_Plugin_Install_Helper::instance()->enqueue_scripts();
		wp_enqueue_style('blossom-fashion-pro-section-notice', get_template_directory_uri() . '/inc/customizer-plugin-recommend/section-notice/css/section-notice.css', array(), BLOSSOM_FASHION_PRO_THEME_VERSION);
		wp_enqueue_script('blossom-fashion-pro-section-notice', get_template_directory_uri() . '/inc/customizer-plugin-recommend/section-notice/js/section-notice.js', array('customize-controls'), BLOSSOM_FASHION_PRO_THEME_VERSION);
		wp_localize_script(
			'blossom-fashion-pro-agency-section-notice', 'section_notice_data', array(
				'ajaxurl' => admin_url('admin-ajax.php'),
			)
		);
	}

	/**
	 * Dismiss section notice.
	 */
	public function dismiss_section_notice() {
		$control_id = sanitize_text_field(wp_unslash($_POST['control']));
		update_option('blossom_fashion_pro_dismissed_' . $control_id, true);
		echo $control_id;
		die();
	}
}