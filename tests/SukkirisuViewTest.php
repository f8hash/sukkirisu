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

    public function testHasRank() :void
    {
        $this->assertArrayHasKey('rank', $result);
    }

    public function testHasText() :void
    {
        $this->assertArrayHasKey('text', $result);
    }

    public function testHasColor() :void
    {
        $this->assertArrayHasKey('color', $result);
    }
}