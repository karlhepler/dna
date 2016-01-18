<?php

namespace spec\NonAppable\Webster;

use Prophecy\Argument;
use NonAppable\Webster\Api;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Words;
use NonAppable\Webster\Contracts\Dictionary;
use NonAppable\Webster\Contracts\HttpConnection;
use NonAppable\Webster\Exceptions\DictionaryException;
use NonAppable\Webster\References\ElementaryDictionary;
use NonAppable\Webster\References\IntermediateDictionary;

class ApiSpec extends ObjectBehavior
{
	function let(HttpConnection $http)
	{
		$this->beConstructedWith($http, 'http://www.dictionaryapi.com/api/v1/references/');
	}

    function it_is_initializable()
    {
        $this->shouldHaveType(Api::class);
    }

    function it_can_set_a_dictionary(Dictionary $dictionary)
    {
        $this->setDictionary($dictionary);
        $this->dictionary()->shouldHaveType(Dictionary::class);
    }

    function it_should_throw_an_exception_if_there_is_no_dictionary_set_and_it_tries_to_search()
    {
        $this->shouldThrow(DictionaryException::class)->duringSearch('Test');
    }

    function it_can_search_for_a_word_in_elementary_dictionary_and_return_words(HttpConnection $http, ElementaryDictionary $elementary)
    {
        $elementary->code()->willReturn('sd2');
        $elementary->key()->willReturn('59b08e13-56f1-4554-8278-a1d75ee0ad63');

        $http->get('http://www.dictionaryapi.com/api/v1/references/sd2/xml/Test?key=59b08e13-56f1-4554-8278-a1d75ee0ad63')
             ->shouldBeCalled();

        $this->setDictionary($elementary);

    	$this->search('Test')->shouldHaveType(Words::class);
    }

    function it_can_search_for_a_word_in_intermediate_dictionary_and_return_words(HttpConnection $http, IntermediateDictionary $intermediate)
    {
        $elementary->code()->willReturn('sd3');
        $elementary->key()->willReturn('5f83bec4-c45c-4b25-808e-70c0aaddbe87');

        $http->get('http://www.dictionaryapi.com/api/v1/references/sd3/xml/Test?key=5f83bec4-c45c-4b25-808e-70c0aaddbe87')
             ->shouldBeCalled();

        $this->setDictionary($intermediate);

        $this->search('Test')->shouldHaveType(Words::class);
    }
}
