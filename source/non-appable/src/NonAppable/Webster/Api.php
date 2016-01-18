<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Contracts\Dictionary;
use NonAppable\Webster\Contracts\HttpConnection;
use NonAppable\Webster\Exceptions\DictionaryException;

class Api
{
	protected $http;
	protected $dictionary;

    public function __construct(HttpConnection $http, Dictionary $dictionary = null)
    {
		$this->http = $http;
		$this->setDictionary($dictionary);
    }

    /**
     * Set the dictionary
     * 
     * @param Dictionary|null $dictionary
     */
    public function setDictionary($dictionary)
    {
    	$this->dictionary = $dictionary;
    }

    /**
     * Get the current dictionary
     * 
     * @return Dictionary|null
     */
    public function dictionary()
    {
        return $this->dictionary;
    }

    /**
     * Search the api and return found words
     * 
     * @param  string $query
     * @return Words
     */
    public function search($query)
    {
        $this->enforceDictionary();

        return new Words;
    }

    /**
     * Throw an exception
     * if there is no dictionary
     *
     * @throws DictionaryException
     */
    protected function enforceDictionary()
    {
    	if ( is_null($this->dictionary) )
    		throw new DictionaryException;
    }
}
