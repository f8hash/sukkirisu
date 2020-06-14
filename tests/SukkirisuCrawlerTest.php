<?php

use PHPUnit\Framework\TestCase;
use HeadlessChromium\BrowserFactory;

require_once(dirname(__FILE__).'/../SukkirisuCrawler.php');

class SukkirisuCrawlerTest extends TestCase
{
    /**
     * @test
     */
    public function スッキりす(): void
    {
        $stub = $this->createMock(BrowserFactory::class);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($stub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertEquals('スッキりす', $result['label']);
        $this->assertEquals('7', $result['month']);
        $this->assertEquals('3位', $result['rank']);
        $this->assertEquals('暑くなって体が弱っているので睡眠をしっかり', $result['result']);
        $this->assertEquals('茶', $result['color']);
    }

    /**
     * @test
     */
    public function まあまあスッキりす(): void
    {
        $stub = $this->createMock(BrowserFactory::class);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($stub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertEquals('まあまあスッキりす', $result['label']);
        $this->assertEquals('7', $result['month']);
        $this->assertEquals('8位', $result['rank']);
        $this->assertEquals('暑くなって体が弱っているので睡眠をしっかり', $result['result']);
        $this->assertEquals('茶', $result['color']);
    }

    /**
     * @test
     */
    public function 超スッキりす(): void
    {
        $stub = $this->createMock(BrowserFactory::class);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($stub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertEquals('超スッキりす', $result['label']);
        $this->assertEquals('7', $result['month']);
        $this->assertEquals('1位', $result['rank']);
        $this->assertEquals('暑くなって体が弱っているので睡眠をしっかり', $result['result']);
        $this->assertEquals('茶', $result['color']);
    }

    /**
     * @test
     */
    public function ガッカりす(): void
    {
        $stub = $this->createMock(BrowserFactory::class);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($stub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertEquals('ガッカりす', $result['label']);
        $this->assertEquals('7', $result['month']);
        $this->assertEquals('12位', $result['rank']);
        $this->assertEquals('暑くなって体が弱っているので睡眠をしっかり', $result['result']);
        $this->assertEquals('茶', $result['color']);
    }
}
