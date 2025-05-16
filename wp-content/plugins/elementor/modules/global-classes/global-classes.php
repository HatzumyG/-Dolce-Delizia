<?php

namespace Elementor\Modules\GlobalClasses;

use Elementor\Core\Utils\Collection;

<<<<<<< HEAD
class Global_Classes {
=======
class Global_Classes implements \JsonSerializable {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	private Collection $items;
	private Collection $order;

	public static function make( array $items = [], array $order = [] ) {
		return new static( $items, $order );
	}

	private function __construct( array $data = [], array $order = [] ) {
		$this->items = Collection::make( $data );
		$this->order = Collection::make( $order );
	}

	public function get_items() {
		return $this->items;
	}

	public function get_order() {
		return $this->order;
	}

	public function get() {
		return [
			'items' => $this->get_items()->all(),
			'order' => $this->get_order()->all(),
		];
	}
<<<<<<< HEAD
=======

	public function jsonSerialize() {
		$this->get();
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
