<?php

require_once('FortuneTellerInterface.php');
require_once('SiteInterface.php');

use DOMWrap\Document;

class BirthMonthFortuneTeller implements FortuneTellerInterface
{
    // 以下の要素を読み取るクラス
    private $rank;
    private $month;
    private $comment;
    private $color;
    private $label;

    public function __construct(CrawlerInterface $crawler, SiteInterface $site)
    {
        // TODO サイト上での順位の順番はサイトクラスへ
        $ranking = [2,3,4,5,6,7,8,9,10,11,1,12];

        $rows = [];
        $rows = $crawler->get($site);

        $result = array_combine($ranking, $rows);

        // 1位、12位以外は要素が一つ多いので1位、12位に合わせる
        for ($i = 2; $i < 12; $i++) {
            array_shift($result[$i]);
        }

        // TODO 外に定数で定義
        $birthMonth = '7月';

        // $res[0 => 月, 1 => 占い結果, 2 => 色]
        foreach ($result as $rank => $res) {

            // 誕生月をセットしたいのでそれ以外は無視
            if ($birthMonth !== $res[0]) {
                continue;
            }

            $this->rank = $rank;
            $this->month = $res[0];
            $this->comment = $res[1];
            $this->color = $res[2];

            // TODO 超スッキりす、スッキりす、まあまあスッキりす、ガッカりすを順位から格納
            $this->label = '';
        }
    }

    public function rank(): int
    {
        return $this->rank;
    }

    public function month(): string
    {
        return $this->month;
    }

    public function comment(): string
    {
        return $this->comment;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function label(): string
    {
        return $this->label;
    }
}