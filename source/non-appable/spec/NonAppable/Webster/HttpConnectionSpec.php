<?php

namespace spec\NonAppable\Webster;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HttpConnectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NonAppable\Webster\HttpConnection');
    }
}
