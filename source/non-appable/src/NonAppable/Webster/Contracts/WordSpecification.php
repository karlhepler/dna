<?php

namespace NonAppable\Webster\Contracts;

use NonAppable\Webster\Word;

interface WordSpecification
{
	/**
	 * Determine if the word specification
	 * is satisfied by the given word
	 * 
	 * @param  string  $word
	 * @return boolean
	 */
	public function isSatisfiedBy($word);

	/**
	 * Determine if the word specification
	 * is NOT satisfied by the given word
	 * 
	 * @param  string  $word
	 * @return boolean
	 */
	public function isNotSatisfiedBy($word);
}