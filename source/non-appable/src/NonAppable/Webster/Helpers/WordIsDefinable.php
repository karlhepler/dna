<?php

namespace NonAppable\Webster\Helpers;

use NonAppable\Webster\Word;
use NonAppable\Webster\Contracts\WordSpecification;

class WordIsDefinable implements WordSpecification
{
	protected $word;

	/**
	 * Determine if the word specification
	 * is satisfied by the given word
	 *
	 * Sources:
	 * http://www.edufind.com/english-grammar/english-grammar-guide/
	 * https://www.englishclub.com/grammar/prepositions-list.htm
	 * http://grammar.yourdictionary.com/parts-of-speech/conjunctions/conjunctions.html
	 * 
	 * @param  string  $word
	 * @return boolean
	 */
	public function isSatisfiedBy($word)
	{
		$this->word = $word;

		return $this->isNotAnArticle()
			&& $this->isNotADemonstrative()
			&& $this->isNotAPronounOrPossessiveDeterminer()
			&& $this->isNotAQuantifier()
			&& $this->isNotANumber()
			&& $this->isNotADistributive()
			&& $this->isNotADifference()
			&& $this->isNotAPreDeterminer()
			&& $this->isNotAPreposition()
			&& $this->isNotAConjunction();
	}

	/**
	 * Determine if the word specification
	 * is NOT satisfied by the given word
	 * 
	 * @param  string  $word
	 * @return boolean
	 */
	public function isNotSatisfiedBy($word)
	{
		return !$this->isSatisfiedBy($word);
	}

	/**
	 * Determine if the word is NOT an article
	 * 
	 * @return boolean
	 */
	protected function isNotAnArticle()
	{
		return $this->doesNotMatch('a|an|the');
	}

	/**
	 * Determines if the word is NOT a demonstrative
	 * 
	 * @return boolean
	 */
	protected function isNotADemonstrative()
	{
		return $this->doesNotMatch('this|that|these|those|here|there');
	}

	/**
	 * Determines if the word is NOT a possessive determiner
	 * 
	 * @return boolean
	 */
	protected function isNotAPronounOrPossessiveDeterminer()
	{
		return $this->doesNotMatch('i|me|my|mine|myself|you|your|yours|yourself|he|him|his|himself|she|her|hers|herself|it|its|itself|we|us|our|ours|ourselves|yourselves|they|them|their|theirs|themselves');
	}

	/**
	 * Determines if the word is NOT a quantifier
	 * 
	 * @return boolean
	 */
	protected function isNotAQuantifier()
	{
		return $this->doesNotMatch('much|many|most|some|any|enough|more|few|fewer|fewest|little|less|least');
	}

	/**
	 * Determine if this is NOT a number
	 * 
	 * @return boolean
	 */
	protected function isNotANumber()
	{
		return $this->doesNotMatch('one|first|two|second|three|third|four|fourth|five|fifth|six|sixth|seven|seventh|eight|eighth|nine|ninth|ten|tenth|eleven|eleventh|twelve|twelfth|thirteen|thirteenth|fourteen|fourteenth|fifteen|fifteenth|sixteen|sixteenth|seventeen|seventeenth|eighteen|eighteenth|nineteen|nineteenth|twenty|twentieth|thirty|thirtieth|forty|fortieth|fifty|fiftieth|sixty|sixtieth|seventy|seventieth|eighty|eightieth|ninety|ninetieth|hundred|hundredth|thousand|thousandth|million|millionth|billion|billionth|trillion|trillionth');
	}

	/**
	 * Determines if the word is NOT a distributive
	 * 
	 * @return boolean
	 */
	protected function isNotADistributive()
	{
		return $this->doesNotMatch('each|every|all|half|both|either|neither');
	}

	/**
	 * Determines if the word is NOT a difference
	 * 
	 * @return boolean
	 */
	protected function isNotADifference()
	{
		return $this->doesNotMatch('other|another');
	}

	protected function isNotAPreDeterminer()
	{
		return $this->doesNotMatch('such|what|rather|quite');
	}

	/**
	 * Determine if the word is NOT a preposition
	 * 
	 * @return boolean
	 */
	protected function isNotAPreposition()
	{
		return $this->doesNotMatch('aboard|about|above|across|after|against|along|amid|among|anti|around|as|at|before|behind|below|beneath|beside|besides|between|beyond|but|by|concerning|considering|despite|down|during|except|excepting|excluding|following|for|from|in|inside|into|like|minus|near|of|off|on|onto|opposite|outside|over|past|per|plus|regarding|round|save|since|than|through|to|toward|towards|under|underneath|unlike|until|up|upon|versus|via|with|within|without');
	}

	/**
	 * Determine if the word is NOT a conjunction
	 * 
	 * @return boolean
	 */
	protected function isNotAConjunction()
	{
		return $this->doesNotMatch('for|and|nor|but|or|yet|so|after|although|as|because|before|once|since|though|unless|until|when|where|while');
	}

	/**
	 * Determines if the word does NOT match
	 * the given matches
	 * 
	 * @param  string $matches
	 * @return boolean
	 */
	protected function doesNotMatch($matches)
	{
		return preg_match("/\b($matches)\b/", $this->word) !== 1;
	}
}