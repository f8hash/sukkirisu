<?php

namespace Sukkirisu;

use HeadlessChromium\BrowserFactory;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    private $url;

    private $month;

    public function __construct(BrowserFactory $client)
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

            if (!count($crawler->filter($divId))) {
                continue;
            }
            
            $data = explode(' ', $crawler->filter($divId)->text());
            $ret['month'] = $data[0];
            $ret['label'] = $type;

            // 超スッキりす、ガッカりすは順位が渡ってこない
            if (in_array($key, ['type1', 'type4'])) {
                $ret['rank'] = ($key == 'type1') ? '1位' : '12位';
                $ret['result'] = $data[1];
                $ret['color'] = $data[2];
            } else {
                $ret['rank'] = $data[1];
                $ret['result'] = $data[2];
                $ret['color'] = $data[3];
            }
        }

        // TODO スクレイピング先に変更があった場合、想定していた位置に要素がなくなる
        // if (empty($ret)) {
        //     throw new Exception('ページの任意の要素に結果が存在しない。');
        // }

        return $ret;
    }
}
