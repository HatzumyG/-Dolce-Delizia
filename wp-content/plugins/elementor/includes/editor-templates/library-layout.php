<?php
if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
?>
<script type="text/template" id="tmpl-elementor-templates-modal__header">
	<div class="elementor-templates-modal__header__logo-area"></div>
	<div class="elementor-templates-modal__header__menu-area"></div>
	<div class="elementor-templates-modal__header__items-area">
		<# if ( closeType ) { #>
			<div class="elementor-templates-modal__header__close elementor-templates-modal__header__close--{{{ closeType }}} elementor-templates-modal__header__item">
				<# if ( 'skip' === closeType ) { #>
				<span><?php echo esc_html__( 'Skip', 'elementor' ); ?></span>
				<# } #>
				<i class="eicon-close"
<<<<<<< HEAD
					aria-hidden="true"
					title="{{{ $e.components?.get( 'document/elements' )?.utils?.getTitleForLibraryClose() }}}"></i>
=======
				   aria-hidden="true"
				   title="{{{ $e.components?.get( 'document/elements' )?.utils?.getTitleForLibraryClose() }}}"></i>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
				<span class="elementor-screen-only">{{{ $e.components?.get( 'document/elements' )?.utils?.getTitleForLibraryClose() }}}</span>
			</div>
		<# } #>
		<div id="elementor-template-library-header-tools"></div>
	</div>
</script>

<script type="text/template" id="tmpl-elementor-templates-modal__header__logo">
	<span class="elementor-templates-modal__header__logo__icon-wrapper e-logo-wrapper">
		<i class="eicon-elementor"></i>
	</span>
	<span class="elementor-templates-modal__header__logo__title">{{{ title }}}</span>
</script>
