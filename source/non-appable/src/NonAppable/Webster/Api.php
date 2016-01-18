<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Contracts\Dictionary;
use NonAppable\Webster\Contracts\HttpConnection;
use NonAppable\Webster\Exceptions\DictionaryException;

class Api
{
	protected $http;
	protected $dictionary;

    public function __construct(HttpConnection $http, $uri, Dictionary $dictionary = null)
    {
		$this->http = $http;
		$this->uri = $uri;
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
        // Make sure there's a dictionary
        $this->enforceDictionary();

        // Instantiate words
        $words = new Words;

        // Add words from the http response
        $this->eachDefinitionWord($this->http->get($this->uri($query)),
            function($word) use (&$words) {
                $words->add($word);
            }
        );

        // Return words
        return $words;
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
    		throw new DictionaryException('You must specify a dictionary to reference');
    }

    /**
     * Return the full uri
     * 
     * @param  string $query
     * @return string
     */
    protected function uri($query)
    {
        return rtrim($this->uri, '/')
               . '/' . $this->dictionary->code()
               . '/xml/' . $query
               . '?key=' . $this->dictionary->key();
    }

    /**
     * Get the definitions from xml
     * 
     * @param  \SimpleXMLElement $xml
     */
    protected function eachDefinitionWord(\SimpleXMLElement $xml, \Closure $callback)
    {
        foreach ($this->definitions($xml) as $definition) {
            $callback($this->words((string)$definition));
        }
    }

    /**
     * Get the definitions from xml
     * 
     * @param  \SimpleXMLElement $xml
     * @return array
     */
    protected function definitions($xml)
    {
        return $xml->xpath('//entry/def/dt[not(vi)]');
    }

    /**
     * Parse the words from a string
     * 
     * @param  string $string
     * @return array
     */
    protected function words($string)
    {
        return explode(' ', ltrim($string, ':'));
    }
}
