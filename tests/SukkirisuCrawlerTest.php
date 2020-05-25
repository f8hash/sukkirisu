<?php

use PHPUnit\Framework\TestCase;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once(dirname(__FILE__).'/../SukkirisuCrawler.php');

class SukkirisuCrawlerTest extends TestCase
{
    /**
     * @test
     */
    public function まあまあスッキりす(): void
    {
        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 8位 暑くなって体が弱っているので睡眠をしっかり 茶');
        
        $crawlerStub->method('filter')->will(
            $this->onConsecutiveCalls(
                [], // #month7.type1の要素は存在しない
                [], // #month7.type2の要素は存在しない
                [[]], // #month7.type3の要素が存在する
                $this->returnSelf(), // text()を呼び出すために自身を返す
                [] // #month7.type4の要素は存在しない
            )
        );

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($clientStub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertContains('7', $result);
        $this->assertContains('8位', $result);
        $this->assertContains('暑くなって体が弱っているので睡眠をしっかり', $result);
        $this->assertContains('茶', $result);
    }
}
