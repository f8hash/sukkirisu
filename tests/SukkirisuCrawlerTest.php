<?php

use PHPUnit\Framework\TestCase;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once(dirname(__FILE__).'/../SukkirisuCrawler.php');

class SukkirisuCrawlerTest extends TestCase
{
    private $sukkirisuPaser;
    private $stub;

    public function setUp(): void
    {
        $this->sukkirisuPaser = new Sukkirisu\SukkirisuCrawler();

        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 8位 暑くなって体が弱っているので睡眠をしっかり 茶');
        $crawlerStub->method('filter')->willReturn($crawlerStub);

        $this->stub = $this->createMock(Client::class);
        $this->stub->method('request')->willReturn($crawlerStub);
    }

    public function testArrayByGetMethod(): void
    {
        $this->assertIsArray($this->sukkirisuPaser->get($this->stub));
    }

    public function testArrayHasCorrectValueByGetMethod(): void
    {
        $this->assertContains('7', $this->sukkirisuPaser->get($this->stub));
        $this->assertContains('8位', $this->sukkirisuPaser->get($this->stub));
        $this->assertContains('暑くなって体が弱っているので睡眠をしっかり', $this->sukkirisuPaser->get($this->stub));
        $this->assertContains('茶', $this->sukkirisuPaser->get($this->stub));
    }
}
