<?php
namespace Elementor\TemplateLibrary\Forms;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class New_Template_Form extends Controls_Stack {

	public function get_name() {
		return 'add-template-form';
	}

	/**
<<<<<<< HEAD
	 * @throws \Exception Exception Throws an exception if the control type is not supported.
=======
	 * @throws \Exception
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	public function render() {
		foreach ( $this->get_controls() as $control ) {
			switch ( $control['type'] ) {
				case Controls_Manager::SELECT:
					$this->render_select( $control );
					break;
				default:
<<<<<<< HEAD
					throw new \Exception( sprintf( "'%s' control type is not supported.", esc_html( $control['type'] ) ) );
=======
					throw new \Exception( "'{$control['type']}' control type is not supported." );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			}
		}
	}

	private function render_select( $control_settings ) {
		$control_id = "elementor-new-template__form__{$control_settings['name']}";
		$wrapper_class = isset( $control_settings['wrapper_class'] ) ? $control_settings['wrapper_class'] : '';
		?>
		<div id="<?php echo esc_attr( $control_id ); ?>__wrapper" class="elementor-form-field <?php echo esc_attr( $wrapper_class ); ?>">
			<label for="<?php echo esc_attr( $control_id ); ?>" class="elementor-form-field__label">
				<?php echo esc_html( $control_settings['label'] ); ?>
			</label>
			<div class="elementor-form-field__select__wrapper">
				<select id="<?php echo esc_attr( $control_id ); ?>" class="elementor-form-field__select" name="meta[<?php echo esc_html( $control_settings['name'] ); ?>]">
					<?php
					foreach ( $control_settings['options'] as $key => $value ) {
<<<<<<< HEAD
						printf( '<option value="%1$s">%2$s</option>', esc_html( $key ), esc_html( $value ) );
=======
						echo sprintf( '<option value="%1$s">%2$s</option>', esc_html( $key ), esc_html( $value ) );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
					}
					?>
				</select>
			</div>
		</div>
		<?php
	}
}
