<?php

namespace spec\NonAppable\Webster;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use NonAppable\Webster\Contracts\HttpConnection;

class HttpConnectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HttpConnection::class);
    }
}
