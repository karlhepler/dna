<?php

namespace NonAppable\Webster;

class Word
{
	protected $word;
	protected $rank;

	/**
	 * Word
	 *
	 * @param mixed $word
	 * @param int $rank
	 */
	public function __construct($word, $rank = 0)
	{
		$this->word = $this->normalize($word);
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
	 * Convert this word to an array
	 *
	 * @return array
	 */
	public function toArray()
	{
		return [
			'word' => $this->word(),
			'rank' => $this->rank()
		];
	}

	/**
	 * Normalize the given string
	 *
	 * @param mixed $string
	 * @return string
	 */
	protected function normalize($string)
	{
		return strtolower(preg_replace('/[^A-Za-z]/s', '', $string));
	}
}
