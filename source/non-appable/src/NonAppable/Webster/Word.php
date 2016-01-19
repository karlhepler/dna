<?php

namespace NonAppable\Webster;

class Word
{
	protected $word;
	protected $rank;

	public function __construct($word, $rank = 0)
	{
		$this->word = strtolower($word);
		$this->rank = $rank;
	}

	/**
	 * Get parent words
	 * 
	 * @return Words
	 */
	public function parents()
	{
		
	}

	/**
	 * Get child words
	 * 
	 * @return Words
	 */
	public function children()
	{
		
	}

	/**
	 * Get the rank
	 * 
	 * @return integer
	 */
	public function rank()
	{
		return $this->rank;
	}

	/**
	 * Get the word
	 * 
	 * @return string
	 */
	public function word()
	{
		return $this->word;
	}

	/**
	 * Convert the Word to a string
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return $this->word();
	}
}