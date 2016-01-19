<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Contracts\WordSpecification;

class Words
{
	protected $specification;
	protected $words = [];

	public function __construct(array $words = [], WordSpecification $specification = null)
	{
		$this->specification = $specification;
		$this->add($words);
	}

	/**
	 * Add a word
	 * 
	 * @param array|string $word
	 * @param integer $rank
	 */
	public function add($word, $rank = 1)
	{
		// Return if word is empty
		if ( empty($word) ) return;

		// Add the word if it's not an array
		if ( !is_array($word) ) {
			return $this->addWord($word, $rank);
		}

		// The word is an array, so recurse
		foreach ($word as $w) {
			$this->add($w, $rank);
		}
	}

	/**
	 * Get all of the words
	 * 
	 * @return array
	 */
	public function words()
	{
		return $this->words;
	}

	/**
	 * Determine if this word exists
	 * in this group of words
	 *
	 * @param  string $word
	 * @return boolean
	 */
	protected function exists($word)
	{
		return in_array($word, $this->words);
	}

	/**
	 * Determine if the word does NOT satisfiy the spec
	 * 
	 * @param  string $word
	 * @return boolean
	 */
	protected function doesNotSatisfySpec($word)
	{
		return $this->specification
			&& $this->specification->isNotSatisfiedBy($word);
	}

	/**
	 * Add the word to the words array
	 * 
	 * @param string $word
	 * @param integer $rank
	 */
	protected function addWord($word, $rank)
	{
		// Return if it already exists
		if ( $this->exists($word) ) return;

		// Return early if word is not satisfied by the spec
		if ( $this->doesNotSatisfySpec($word) ) return;

		// Add it!
		$this->words[] = new Word($word, $rank);
	}
}