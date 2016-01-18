<?php

namespace NonAppable\Webster\Contracts;

interface HttpConnection
{
	/**
	 * Perform a get request
	 * and return XML
	 *
	 * @param  string $uri
	 * @return \SimpleXMLElement
	 */
	public function get($uri);
}
