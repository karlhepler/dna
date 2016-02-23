<?php

namespace spec\NonAppable\Webster;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Word;
use NonAppable\Webster\Words;
use NonAppable\Webster\Contracts\EventDispatcher;
use NonAppable\Webster\Contracts\WordSpecification;

class WordsSpec extends ObjectBehavior
{
	function let(WordSpecification $specification, EventDispatcher $event)
	{
		$this->beConstructedWith([], $specification, $event);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType(Words::class);
    }

	function it_can_return_an_array_of_words()
	{
		$this->words()->shouldBeArray();
	}

	function it_can_add_a_word()
	{
		$this->add('Test');
		$this->words()->shouldHaveCount(1);
		$this->words()[0]->shouldHaveType(Word::class);
		$this->words()[0]->word()->shouldBe('test');
	}

	function it_can_add_an_array_of_words()
	{
		$this->add(['Foo', 'Bar']);
		$this->words()->shouldHaveCount(2);
		$this->words()[0]->shouldHaveType(Word::class);
		$this->words()[0]->word()->shouldBe('foo');
		$this->words()[1]->shouldHaveType(Word::class);
		$this->words()[1]->word()->shouldBe('bar');
	}

	function it_fires_an_event_when_it_adds_a_word(EventDispatcher $event)
	{
		$word = new Word('Test', 0);
		$event->fire('webster.word.added', $word)->shouldBeCalled();

		$this->add('Test');
	}
}
