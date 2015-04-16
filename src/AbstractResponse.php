<?php

namespace Bleicker\Response;

/**
 * Class AbstractResponse
 *
 * @package Bleicker\Response
 */
abstract class AbstractResponse implements ResponseInterface {

	/**
	 * @var ResponseInterface
	 */
	protected $parentResponse;

	/**
	 * @param ResponseInterface $parentResponse
	 */
	public function __construct(ResponseInterface $parentResponse = NULL) {
		$this->parentResponse = $parentResponse;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getParentResponse() {
		return $this->parentResponse;
	}

	/**
	 * @param ResponseInterface $parentResponse
	 * @return $this
	 */
	public function setParentResponse(ResponseInterface $parentResponse) {
		$this->parentResponse = $parentResponse;
		return $this;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getMainResponse() {
		$parentResponse = $this->getParentResponse();
		if ($parentResponse === NULL) {
			return $this;
		}
		if ($parentResponse->getParentResponse() instanceof ResponseInterface) {
			return $parentResponse->getParentResponse();
		}
		return $parentResponse;
	}

	/**
	 * @return boolean
	 */
	public function isMainResponse() {
		return $this->getMainResponse() === $this;
	}
}
