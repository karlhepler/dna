<?php

namespace NonAppable\Webster\Factories;

use NonAppable\Webster\Words;
use NonAppable\Webster\Contracts\EventDispatcher;
use NonAppable\Webster\Contracts\WordSpecification;

class WordsFactory
{
	protected $event;
	protected $specification;

	/**
	 * Words Factory
	 *
	 * @param EventDispatcher $event
	 * @param WordSpecification $specification
	 */
	public function __construct(EventDispatcher $event, WordSpecification $specification)
	{
		$this->event = $event;
		$this->specification = $specification;
	}

    /**
     * Create a new instance of Words
     *
	 * @return Words
     */
    public function create()
    {
		return new Words([], $this->specification, $this->event);
    }
}
