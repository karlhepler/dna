<?php

namespace spec\NonAppable\Webster;

use Prophecy\Argument;
use NonAppable\Webster\Api;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Book;
use NonAppable\Webster\Contracts\HttpConnection;

class ApiSpec extends ObjectBehavior
{
	function let(HttpConnection $http)
	{
		$this->beConstructedWith($http);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType(Api::class);
    }

    function it_can_search_for_a_word_and_return_a_book_of_words(HttpConnection $http)
    {
    	$http->get('test', [
    		'query' => [
    			'key' => '5f83bec4-c45c-4b25-808e-70c0aaddbe87'
    		]
    	])->shouldBeCalled();

    	$this->search('Test')->shouldHaveType(Book::class);
    }
}
