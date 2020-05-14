<?php

use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__).'/../ConsoleViewer.php');

class ConsoleViewerTest extends TestCase
{
    private $result;
    
    public function setUp() :void
    {
        $sukkirisuView = new Sukkirisu\ConsoleViewer();
        $this->result = $sukkirisuView->array('7 10位 ちょっとした気のゆるみで大きなミスを犯すことも 緑');
    }

    public function testHasRank() :void
    {
        $this->assertArrayHasKey('rank', $this->result);
        $this->assertEquals('10位', $this->result['rank']);
    }

    public function testHasText() :void
    {
        $this->assertArrayHasKey('text', $this->result);
        $this->assertEquals('ちょっとした気のゆるみで大きなミスを犯すことも', $this->result['text']);
    }

    public function testHasColor() :void
    {
        $this->assertArrayHasKey('color', $this->result);
        $this->assertEquals('緑', $this->result['color']);
    }
}