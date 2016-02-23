<?php

namespace NonAppable;

class DNA
{
	protected $repository;
	protected $webster;

	public function __construct(Repository $repository, Api $webster)
	{
		$this->repository = $repository;
		$this->webster = $webster;
	}

    /**
	 * Define a word,
	 * returning an array of definition words
     *
     * @param string $word
	 * @return array
     */
    public function define($word)
    {
		return $this->getLocalDefinition($word)
			?: $this->getWebsterDefinition($word);
    }

	/**
	 * Get the definition from the local repo
	 *
	 * @param string $word
	 * @return array
	 */
	protected function getLocalDefinition($word)
	{
		return $this->repository->where('defines', $word)->get();
	}

	/**
	 * Get the definition from webster
	 * and queue the definition words
	 * that aren't already defined
	 *
	 * @param string $word
	 * @return array
	 */
	protected function getWebsterDefinition($word)
	{
		return $this->webster->search($word)->words();
	}
}
