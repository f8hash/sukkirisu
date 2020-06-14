<?php

use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__).'/../ConsoleViewer.php');

class ConsoleViewerTest extends TestCase
{
    public function testShowSingle(): void
    {
        $this->expectOutputString('a');

        $consoleViewer = new ConsoleViewer;
        $consoleViewer->show(['a']);
    }

    public function testShowMultiple(): void
    {
        $this->expectOutputString('abcd');

        $consoleViewer = new ConsoleViewer;
        $consoleViewer->show(['a', 'b', 'c', 'd']);
    }
}
