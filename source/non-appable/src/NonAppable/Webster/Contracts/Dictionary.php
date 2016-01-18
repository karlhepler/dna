<?php

namespace NonAppable\Webster\Contracts;

interface Dictionary
{
	/**
	 * Get the dictionary reference code
	 * 
	 * @return string
	 */
	public function code();

	/**
	 * Get the dictionary api key
	 * 
	 * @return string
	 */
	public function key();
}