<?php

namespace WPForms\Admin\Tools\Views;

/**
 * Class ActionScheduler view.
 *
 * @since 1.6.6
 */
class ActionScheduler extends View {

	/**
	 * View slug.
	 *
	 * @since 1.6.6
	 *
	 * @var string
	 */
	protected $slug = 'action-scheduler';

	/**
	 * Init view.
	 *
	 * @since 1.6.6
	 */
	public function init() {

		if ( $this->admin_view_exists() ) {
			\ActionScheduler_AdminView::instance()->process_admin_ui();
		}
	}

	/**
	 * Get view label.
	 *
	 * @since 1.6.6
	 *
	 * @return string
	 */
	public function get_label() {

		return esc_html__( 'Scheduled Actions', 'wpforms-lite' );
	}

	/**
	 * Checking user capability to view.
	 *
	 * @since 1.6.6
	 *
	 * @return bool
	 */
	public function check_capability() {

		return wpforms_current_user_can();
	}

	/**
	 * Display view content.
	 *
	 * @since 1.6.6
	 */
	public function display() {

		if ( $this->admin_view_exists() ) {
			\ActionScheduler_AdminView::instance()->render_admin_ui();
		}
	}

	/**
	 * Check if ActionScheduler_AdminView class exists.
	 *
	 * @since 1.6.6
	 *
	 * @return bool
	 */
	private function admin_view_exists() {

		return class_exists( 'ActionScheduler_AdminView' );
	}

}
