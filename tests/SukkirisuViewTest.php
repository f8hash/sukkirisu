<?php
use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__).'/../SukkirisuView.php');

class SukkirisuViewTest extends TestCase
{
    private $result;
    
    public function setUp() :void
    {
        $sukkirisuView = new SukkirisuView();
        $this->result = $sukkirisuView->array('7 10位 ちょっとした気のゆるみで大きなミスを犯すことも 緑');
    }

    public function testHasRank() :void
    {
        $this->assertArrayHasKey('rank', $this->result);
    }

    public function testHasText() :void
    {
        $this->assertArrayHasKey('text', $this->result);
    }

    public function testHasColor() :void
    {
        $this->assertArrayHasKey('color', $this->result);
    }
}