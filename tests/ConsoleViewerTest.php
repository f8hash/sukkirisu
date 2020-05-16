<?php

use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__).'/../ConsoleViewer.php');

class ConsoleViewerTest extends TestCase
{
    public function testShow() :void
    {
        $this->expectOutputString('7月生まれは10位。ちょっとした気のゆるみで大きなミスを犯すことも。ラッキーカラーは緑');

        $sukkirisuView = new Sukkirisu\ConsoleViewer();
        $sukkirisuView->show('7 10位 ちょっとした気のゆるみで大きなミスを犯すことも 緑');
    }
}