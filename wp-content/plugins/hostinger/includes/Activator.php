<?php

namespace Hostinger;

use Hostinger\DefaultOptions;

defined( 'ABSPATH' ) || exit;

class Activator {

	public static function activate(): void {
		$options = new DefaultOptions();
		$options->add_options();

		self::update_installation_state_on_activation();
	}

	/**
	 * Saves installation state.
	 */
	public static function update_installation_state_on_activation(): void {
		$installation_state = get_option( 'hts_new_installation', false );

		if ( $installation_state !== 'old' ) {
			add_option( 'hts_new_installation', 'new' );
		}
	}
}
