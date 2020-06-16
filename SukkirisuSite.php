<?php

require_once('SiteInterface.php');

require_once('SukkirisuCrawler.php');

class SukkirisuSite implements SiteInterface
{
    private $url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';

    private $selector = 'div.ntv-article-contents-main > div > div';

    private $html;

    private $label = [
        1 =>  '超スッキりす',
        2 =>  'スッキりす',
        3 =>  'スッキりす',
        4 =>  'スッキりす',
        5 =>  'スッキりす',
        6 =>  'スッキりす',
        7 =>  'まあまあスッキりす',
        8 =>  'まあまあスッキりす',
        9 =>  'まあまあスッキりす',
        10 => 'まあまあスッキりす',
        11 => 'まあまあスッキりす',
        12 => 'ガッカりす',
    ];

    // ページ内のランキングの表示順
    private $ranking = [2,3,4,5,6,7,8,9,10,11,1,12];

    // ページ内の要素を配列にした際のキー
    private $rowKeys = [
        'month'     => 0,
        'comment'   => 1,
        'color'     => 2,
    ];

    public function url(): string
    {
        return $this->url;
    }

    public function selector(): string
    {
        return $this->selector;
    }

    public function label($rank): string
    {
        return $this->label[$rank];
    }

    public function html(): string
    {
        return $this->html;
    }

    public function ranking(Array $array): array
    {
        $ret = array_combine($this->ranking, $array);
        
        // 1位、12位以外は要素が一つ多いので1位、12位に合わせる
        for ($i = 2; $i < 12; $i++) {
            array_shift($ret[$i]);
        }

        return $ret;
    }

    public function rowKeys(): array
    {
        return $this->rowKeys;
    }

    public function crawling(): void
    {
        $crawler = new SukkirisuCrawler;
        $this->html = $crawler->get($this->url());
    }
}
