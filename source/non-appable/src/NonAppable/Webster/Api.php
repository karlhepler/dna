<?php

namespace NonAppable\Webster;

use NonAppable\Webster\Contracts\HttpConnection;

class Api
{
	protected $http;

    public function __construct(HttpConnection $http)
    {
		$this->http = $http;
    }

    public function search($query)
    {
        //
    }
}
