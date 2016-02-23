<?php

namespace NonAppable\Webster\Contracts;

interface EventDispatcher
{
	/**
	 * Fire an event and call the listeners.
	 *
	 * @param  string|object  $event
	 * @param  mixed  $payload
	 * @param  bool  $halt
	 * @return array|null
	 */
	public function fire($event, $payload = [], $halt = false);
}
