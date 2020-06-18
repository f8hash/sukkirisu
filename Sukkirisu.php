<?php

require_once('Interface/FortuneTellerInterface.php');

class Sukkirisu implements FortuneTellerInterface
{
    private $result;

    // ページ内のランキングの表示順
    private $ranking = [2,3,4,5,6,7,8,9,10,11,1,12];

    // ページ内の要素を配列にした際のキー
    private $elements = [
        'month'     => 0,
        'comment'   => 1,
        'color'     => 2,
    ];

    private $label_list = [
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

    public function __construct(SiteInterface $site)
    {
        foreach ($this->ranking_list($site->scraping()) as $rank => $res) {
            $this->result[$res[$this->elements['month']]] =
                    "{$this->label($rank)}!"
                    . "{$res[$this->elements['month']]}生まれは"
                    . "{$rank}位。"
                    . "{$res[$this->elements['comment']]}。"
                    . "ラッキーカラーは{$res[$this->elements['color']]}"
                    . PHP_EOL;
        }
    }

    public function tell($birthMonth = '1月'): string
    {
        return $this->result[$birthMonth];
    }

    private function ranking_list(Array $array): array
    {
        $ranking_list = array_combine($this->ranking, $array);
        
        // 1位、12位以外は要素が一つ多いので1位、12位に合わせる
        for ($rank = 2; $rank < 12; $rank++) {
            array_shift($ranking_list[$rank]);
        }

        return $ranking_list;
    }

    private function label($rank): string
    {
        return $this->label_list[$rank];
    }
}
