<?php
use HMinng\AtsHook\Base\AtsHookBase;

final class AtsHook extends AtsHookBase {
	private static $instance = null;
	
	final private function __clone(){}
	
	public static function getInstance() {
		self::$instance || self::$instance = new self();
		return self::$instance;
	}
	
	public function __construct() {
		$cache = __DIR__ . '/../../../cache';

		if ( ! is_dir($cache)) {
			@mkdir($cache, 0777, true);
		}

        if ( ! is_writable($cache)) {
            @chmod($cache, 0777);
        }

		parent::__construct(
            $cache . '/../application/hook',
			$cache,
			true
		);
	}
}