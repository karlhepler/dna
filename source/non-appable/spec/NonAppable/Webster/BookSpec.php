<?php

namespace spec\NonAppable\Webster;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Book;

class BookSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Book::class);
    }
}
