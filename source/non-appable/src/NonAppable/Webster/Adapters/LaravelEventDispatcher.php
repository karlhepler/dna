<?php

namespace NonAppable\Webster\Adapters;

use Illuminate\Contracts\Events\Dispatcher;
use NonAppable\Webster\Contracts\EventDispatcher;

class LaravelEventDispatcher implements EventDispatcher
{
	protected $event;

	/**
	 * Adapt to Laravel's event dispatcher
	 *
	 * @param Dispatcher $event
	 */
	public function __construct(Dispatcher $event)
	{
		$this->event = $event;
	}

	/**
	 * Fire an event and call the listeners.
	 *
	 * @param  string|object  $event
	 * @param  mixed  $payload
	 * @param  bool  $halt
	 * @return array|null
	 */
	public function fire($event, $payload = [], $halt = false)
	{
		return $this->event->fire($event, $payload, $halt);
	}
}
