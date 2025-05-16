<?php

namespace ImageOptimization\Modules\Optimization\Components;

use ImageOptimization\Classes\Async_Operation\Async_Operation_Hook;
use ImageOptimization\Classes\Image\{
	Image,
	Image_Meta,
	Image_Optimization_Error_Type,
	Image_Restore,
	Image_Status
};
use ImageOptimization\Classes\Logger;
use ImageOptimization\Classes\Exceptions\Quota_Exceeded_Error;
use ImageOptimization\Modules\Optimization\Classes\Exceptions\Image_File_Already_Exists_Error;
use ImageOptimization\Modules\Optimization\Classes\Optimize_Image;
use Throwable;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Single_Optimization {
	/** @async */
	public function optimize_single_image( int $image_id ) {
		try {
			$oi = new Optimize_Image(
				$image_id,
				'manual',
			);

			$oi->optimize();
		} catch ( Quota_Exceeded_Error $qe ) {
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::OPTIMIZATION_FAILED )
				->set_error_type( Image_Optimization_Error_Type::QUOTA_EXCEEDED )
				->save();
		} catch ( Image_File_Already_Exists_Error $fe ) {
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::OPTIMIZATION_FAILED )
				->set_error_type( Image_Optimization_Error_Type::FILE_ALREADY_EXISTS )
				->save();
		} catch ( Throwable $t ) {
			Logger::log( Logger::LEVEL_ERROR, 'Optimization error. Reason: ' . $t->getMessage() );

<<<<<<< HEAD
			Retry::maybe_retry_optimization( $image_id );
=======
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::OPTIMIZATION_FAILED )
				->set_error_type( Image_Optimization_Error_Type::GENERIC )
				->save();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		}
	}

	/** @async */
	public function reoptimize_single_image( int $image_id ) {
		try {
			$image = new Image( $image_id );

			if ( $image->can_be_restored() ) {
				Image_Restore::restore( $image_id, true );
			}

			$oi = new Optimize_Image(
				$image_id,
				'manual',
				null,
				true
			);

			$oi->optimize();
		} catch ( Quota_Exceeded_Error $qe ) {
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::REOPTIMIZING_FAILED )
				->set_error_type( Image_Optimization_Error_Type::QUOTA_EXCEEDED )
				->save();
		} catch ( Image_File_Already_Exists_Error $fe ) {
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::REOPTIMIZING_FAILED )
				->set_error_type( Image_Optimization_Error_Type::FILE_ALREADY_EXISTS )
				->save();
		} catch ( Throwable $t ) {
			Logger::log( Logger::LEVEL_ERROR, 'Reoptimizing error. Reason: ' . $t->getMessage() );

<<<<<<< HEAD
			Retry::maybe_retry_optimization( $image_id );
=======
			( new Image_Meta( $image_id ) )
				->set_status( Image_Status::REOPTIMIZING_FAILED )
				->set_error_type( Image_Optimization_Error_Type::GENERIC )
				->save();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		}
	}

	public function __construct() {
<<<<<<< HEAD
		add_action( Async_Operation_Hook::OPTIMIZE_SINGLE, [ $this, 'optimize_single_image' ], 3 );
=======
		add_action( Async_Operation_Hook::OPTIMIZE_SINGLE, [ $this, 'optimize_single_image' ] );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		add_action( Async_Operation_Hook::REOPTIMIZE_SINGLE, [ $this, 'reoptimize_single_image' ] );
	}
}
