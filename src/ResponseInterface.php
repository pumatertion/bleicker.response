<?php
namespace Bleicker\Response;

/**
 * Interface ResponseInterface
 *
 * @package Bleicker\Response
 */
interface ResponseInterface {

	/**
	 * @return ResponseInterface
	 */
	public function getParentResponse();

	/**
	 * @param ResponseInterface $parentResponse
	 * @return $this
	 */
	public function setParentResponse(ResponseInterface $parentResponse);

	/**
	 * @return ResponseInterface
	 */
	public function getMainResponse();

	/**
	 * @return boolean
	 */
	public function isMainResponse();
}