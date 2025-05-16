<?php

namespace ImageOptimization\Classes\Async_Operation;

use ImageOptimization\Classes\Basic_Enum;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Async_Operation_Queue extends Basic_Enum {
	public const OPTIMIZE = 'image-optimization/optimize';
	public const BACKUP = 'image-optimization/backup';
	public const RESTORE = 'image-optimization/restore';
	public const STATS = 'image-optimization/stats';
	public const MIGRATION = 'image-optimization/migration';
<<<<<<< HEAD
	public const CLEANUP = 'image-optimization/cleanup';
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
