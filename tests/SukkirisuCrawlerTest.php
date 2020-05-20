<?php

use PHPUnit\Framework\TestCase;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once(dirname(__FILE__).'/../SukkirisuCrawler.php');

class SukkirisuCrawlerTest extends TestCase
{
    private $sukkirisuPaser;

    public function setUp(): void
    {
        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 8位 暑くなって体が弱っているので睡眠をしっかり 茶');
        $crawlerStub->method('filter')->willReturn($crawlerStub);

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $this->sukkirisuPaser = new Sukkirisu\SukkirisuCrawler($clientStub);
    }

    public function testArrayByGetMethod(): void
    {
        $this->assertIsArray($this->sukkirisuPaser->get());
    }

    public function testArrayHasCorrectValueByGetMethod(): void
    {
        $this->assertContains('7', $this->sukkirisuPaser->get());
        $this->assertContains('8位', $this->sukkirisuPaser->get());
        $this->assertContains('暑くなって体が弱っているので睡眠をしっかり', $this->sukkirisuPaser->get());
        $this->assertContains('茶', $this->sukkirisuPaser->get());
    }
}
