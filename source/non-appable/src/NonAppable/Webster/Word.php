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
	 * Convert the Word to a string
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return $this->word;
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
}