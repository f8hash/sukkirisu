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
    public function スッキりす(): void
    {
        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 3位 暑くなって体が弱っているので睡眠をしっかり 茶');
        
        $crawlerStub->method('filter')->will(
            $this->onConsecutiveCalls(
                [], // #month7.type1の要素は存在しない
                [[]], // #month7.type2の要素が存在する
                $this->returnSelf(), // text()を呼び出すために自身を返す
                [], // #month7.type3の要素は存在しない
                [] // #month7.type4の要素は存在しない
            )
        );

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($clientStub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
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
        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 暑くなって体が弱っているので睡眠をしっかり 茶');
        
        $crawlerStub->method('filter')->will(
            $this->onConsecutiveCalls(
                [[]], // #month7.type1の要素が存在する
                $this->returnSelf(), // text()を呼び出すために自身を返す
                [], // #month7.type2の要素は存在しない
                [], // #month7.type3の要素は存在しない
                [] // #month7.type4の要素は存在しない
            )
        );

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($clientStub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
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
        // メソッドチェーンのモック化
        // filter()->text()
        $crawlerStub = $this->createMock(Crawler::class);
        $crawlerStub->method('text')->willReturn('7 暑くなって体が弱っているので睡眠をしっかり 茶');
        
        $crawlerStub->method('filter')->will(
            $this->onConsecutiveCalls(
                [], // #month7.type1の要素は存在しない
                [], // #month7.type2の要素は存在しない
                [], // #month7.type3の要素は存在しない
                [[]], // #month7.type4の要素が存在する
                $this->returnSelf(), // text()を呼び出すために自身を返す
            )
        );

        $clientStub = $this->createMock(Client::class);
        $clientStub->method('request')->willReturn($crawlerStub);

        $sukkirisuCrawler = new Sukkirisu\SukkirisuCrawler($clientStub);
        $result = $sukkirisuCrawler->get();
        $this->assertIsArray($result);
        $this->assertEquals('7', $result['month']);
        $this->assertEquals('12位', $result['rank']);
        $this->assertEquals('暑くなって体が弱っているので睡眠をしっかり', $result['result']);
        $this->assertEquals('茶', $result['color']);
    }
}
