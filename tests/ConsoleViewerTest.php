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

    /**
     * @test
     */
    public function 超スッキりすの結果表示(): void
    {
        $this->expectOutputString('7月生まれは1位。ちょっとした気のゆるみで大きなミスを犯すことも。ラッキーカラーは緑');

        $crawlerStub = $this->createMock(Sukkirisu\CrawlerInterface::class);
        $crawlerStub->method('get')->willReturn([
            'month' => '7',
            'rank' => '1位',
            'result' => 'ちょっとした気のゆるみで大きなミスを犯すことも',
            'color' => '緑'
        ]);

        $sukkirisuView = new Sukkirisu\ConsoleViewer($crawlerStub);
        $sukkirisuView->show();
    }

    /**
     * @test
     */
    public function スッキりすの結果表示(): void
    {
        $this->expectOutputString('7月生まれは5位。ちょっとした気のゆるみで大きなミスを犯すことも。ラッキーカラーは緑');

        $crawlerStub = $this->createMock(Sukkirisu\CrawlerInterface::class);
        $crawlerStub->method('get')->willReturn([
            'month' => '7',
            'rank' => '5位',
            'result' => 'ちょっとした気のゆるみで大きなミスを犯すことも',
            'color' => '緑'
        ]);

        $sukkirisuView = new Sukkirisu\ConsoleViewer($crawlerStub);
        $sukkirisuView->show();
    }

    /**
     * @test
     */
    public function ガッカりすの結果表示(): void
    {
        $this->expectOutputString('7月生まれは12位。ちょっとした気のゆるみで大きなミスを犯すことも。ラッキーカラーは緑');

        $crawlerStub = $this->createMock(Sukkirisu\CrawlerInterface::class);
        $crawlerStub->method('get')->willReturn([
            'month' => '7',
            'rank' => '12位',
            'result' => 'ちょっとした気のゆるみで大きなミスを犯すことも',
            'color' => '緑'
        ]);

        $sukkirisuView = new Sukkirisu\ConsoleViewer($crawlerStub);
        $sukkirisuView->show();
    }
}
