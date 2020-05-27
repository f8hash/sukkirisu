<?php

use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__).'/../ConsoleViewer.php');
require_once(dirname(__FILE__).'/../CrawlerInterface.php');

class ConsoleViewerTest extends TestCase
{
    /**
     * @test
     */
    public function まあまあスッキりすの結果表示(): void
    {
        $this->expectOutputString('7月生まれは10位。ちょっとした気のゆるみで大きなミスを犯すことも。ラッキーカラーは緑');

        $crawlerStub = $this->createMock(Sukkirisu\CrawlerInterface::class);
        $crawlerStub->method('get')->willReturn([
            'month' => '7',
            'rank' => '10位',
            'result' => 'ちょっとした気のゆるみで大きなミスを犯すことも',
            'color' => '緑'
        ]);

        $sukkirisuView = new Sukkirisu\ConsoleViewer($crawlerStub);
        $sukkirisuView->show();
    }
}
