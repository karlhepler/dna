<?php

namespace spec\NonAppable;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DNASpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NonAppable\DNA');
    }

	function it_can_define_a_word()
	{
		$this->define('test')
			->shouldReturnArray();
	}

	function it_has_a_list_of_defined_words()
	{

	}
}
