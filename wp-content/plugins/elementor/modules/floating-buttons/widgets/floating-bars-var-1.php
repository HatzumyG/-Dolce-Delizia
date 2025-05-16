<?php

namespace Elementor\Modules\FloatingButtons\Widgets;

use Elementor\Modules\FloatingButtons\Base\Widget_Floating_Bars_Base;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Elementor Floating Bars Var 1 widget.
 *
 * Elementor widget that displays a banner with icon and link
 *
 * @since 3.23.0
 */
class Floating_Bars_Var_1 extends Widget_Floating_Bars_Base {

	public function get_name(): string {
		return 'floating-bars-var-1';
	}

	public function get_title(): string {
		return esc_html__( 'Floating Bar CTA', 'elementor' );
	}

	public function get_group_name(): string {
		return 'floating-bars';
	}

	public function render(): void {
		$this->add_inline_editing_attributes( 'announcement_text', 'none' );
		$this->add_inline_editing_attributes( 'cta_text', 'none' );

		parent::render();
	}
}
