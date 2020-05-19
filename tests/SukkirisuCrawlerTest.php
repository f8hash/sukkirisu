<?php

use PHPUnit\Framework\TestCase;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once(dirname(__FILE__).'/../SukkirisuCrawler.php');

class SukkirisuCrawlerTest extends TestCase
{
    public function testGet() :void
    {
        $sukkirisuPaser = new Sukkirisu\SukkirisuCrawler();

        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 8位 暑くなって体が弱っているので睡眠をしっかり 茶');
        $crawlerStub->method('filter')->willReturn($crawlerStub);

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $this->assertIsArray($sukkirisuPaser->get($clientStub));
    }
}
