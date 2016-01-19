<?php

use NonAppable\Webster\Api;
use Laravel\Lumen\Testing\DatabaseTransactions;
use NonAppable\Webster\References\ElementaryDictionary;
use NonAppable\Webster\References\IntermediateDictionary;

class WebsterTest extends TestCase
{
    protected $webster;
    protected $elementary;
    protected $intermediate;

    public function setUp()
    {
        parent::setUp();

        $this->webster = app(Api::class);
        $this->elementary = app(ElementaryDictionary::class);
        $this->intermediate = app(IntermediateDictionary::class);
    }

    public function testWebsterWorking()
    {
        $this->webster->setDictionary($this->elementary);

        dd( $this->webster->search('apple')->words() );
    }
}
