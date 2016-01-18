<?php

namespace NonAppable\Webster;

class Words
{
	protected $words = [];

	public function __construct(array $words = [])
	{
		$this->add($words);
	}

	/**
	 * Add a word
	 * 
	 * @param array|string $word
	 */
	public function add($word)
	{
		if ( is_array($word) )
		{
			foreach ($word as $w) {
				$this->add($w);
			}
		}

		// Return early if word is adverb
		if ( $this->isAdverb($word) ) return;

		// Return if it already exists
		if ( $this->exists($word) ) return;

		// Add it!
		$this->words[] = new Word($word);
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
	 * Determine if this word is an adverb
	 * 
	 * @param  string  $word
	 * @return boolean
	 */
	protected function isAdverb($word)
	{
		// @todo
	}

	/**
	 * Determine if this word exists
	 *
	 * @param  string $word
	 * @return boolean
	 */
	protected function exists($word)
	{
		//
	}
}