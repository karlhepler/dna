<?php

namespace NonAppable\Webster\Contracts;

use NonAppable\Webster\Word;

interface WordSpecification
{
	/**
	 * Determine if the word specification
	 * is satisfied by the given word
	 * 
	 * @param  Word    $word
	 * @return boolean
	 */
	public function isSatisfiedBy(Word $word);

	/**
	 * Determine if the word specification
	 * is NOT satisfied by the given word
	 * 
	 * @param  Word    $word
	 * @return boolean
	 */
	public function isNotSatisfiedBy(Word $word);
}