<?php

namespace Bleicker\Response;

/**
 * Class MainResponseInterface
 *
 * @package Bleicker\Response
 */
interface MainResponseInterface extends ResponseInterface {

	/**
	 * @return $this
	 */
	public function send();
}
