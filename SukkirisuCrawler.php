<?php

namespace Sukkirisu;

use Goutte\Client;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    private $url;

    private $month;

    public function __construct(Client $client)
    {
        $this->url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';
        $this->month = 7;
        $this->client = $client;
    }

    public function get(): array
    {
        $crawler = $this->client->request('GET', $this->url);

        // 超スッキりすからガッカりすまでで4段階ある
        $types = [
            'type1' => '超スッキりす',
            'type2' => 'スッキりす',
            'type3' => 'まあまあスッキりす',
            'type4' => 'ガッカりす',
        ];

        $ret = [];
        foreach ($types as $key => $type) {
            $divId = "#main #month{$this->month}.{$key}";

            // TODO テスト実行時にここを通過せずにUndefined index: textになる
            if (count($crawler->filter($divId))) {
                $ret['type'] = $type;
                $ret['text'] = explode(' ', $crawler->filter($divId)->text());
            }
        }

        // TODO スクレイピング先に変更があった場合、想定していた位置に要素がなくなる
        // if (empty($ret)) {
        //     throw new Exception('ページの任意の要素に結果が存在しない。');
        // }

        return $ret['text'];
    }
}
