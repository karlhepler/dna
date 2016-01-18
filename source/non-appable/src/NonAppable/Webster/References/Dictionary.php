<?php

namespace NonAppable\Webster\References;

use NonAppable\Webster\Contracts\Dictionary as DictionaryContract;

abstract class Dictionary implements DictionaryContract
{
	protected $code;
	protected $key;

	public function __construct($code, $key)
	{
		$this->code = $code;
		$this->key = $key;
	}

	/**
	 * Get the dictionary reference code
	 * 
	 * @return string
	 */
	public function code()
	{
		return $this->code;
	}

	/**
	 * Get the dictionary api key
	 * 
	 * @return string
	 */
	public function key()
	{
		return $this->key;
	}
}