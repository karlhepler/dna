<?php

namespace spec\NonAppable\Webster\Factories;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Words;
use NonAppable\Webster\Contracts\EventDispatcher;
use NonAppable\Webster\Contracts\WordSpecification;

class WordsFactorySpec extends ObjectBehavior
{
	function let(EventDispatcher $event, WordSpecification $specification) {
		$this->beConstructedWith($event, $specification);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('NonAppable\Webster\Factories\WordsFactory');
    }

	function it_can_create_a_new_words_instance()
	{
		$this->create()->shouldHaveType(Words::class);
	}
}
