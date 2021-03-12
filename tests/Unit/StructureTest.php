<?php

namespace Tests\Unit;

use App\Logic\McNumberFace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StructureTest extends TestCase
{
    public $mcNumberFace;

    /**
     * StructureTest constructor. Initialises the McNumberFace class so it can be used later
     *
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->mcNumberFace = new McNumberFace();
    }

    public function testArabic1GivesRomanI() {
        $this->assertEquals('I', $this->mcNumberFace->convert(1));
    }

    public function testArabic154GivesRomanCLIV() {
        $this->assertEquals('CLIV', $this->mcNumberFace->convert(154));
    }

    public function testStringGivesFalse() {
        $this->assertEquals(false, $this->mcNumberFace->convert('test'));
    }
}
