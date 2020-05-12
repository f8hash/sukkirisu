<?php
use PHPUnit\Framework\TestCase;

class SukkirisuViewTest extends TestCase
{
    private $result;
    
    public function setUp() :void
    {
        $sukkirisuView = new SukkirisuView();
        $result = $sukkirisuView()->array('7 10位 ちょっとした気のゆるみで大きなミスを犯すことも 緑');
    }

    public function testHasRank()
    {
        $this->assertArrayHasKey('rank', $result);
    }

    public function testHasText()
    {
        $this->assertArrayHasKey('text', $result);
    }

    public function testHasColor()
    {
        $this->assertArrayHasKey('color', $result);
    }
}