<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Contracts\HttpConnection;

class SimpleXMLHttpConnection implements HttpConnection
{
	/**
	 * Perform a get request
	 * and return XML
	 *
	 * @param  string $uri
	 * @return \SimpleXMLElement
	 */
	public function get($uri)
	{
		return simplexml_load_file($uri);
	}
}
