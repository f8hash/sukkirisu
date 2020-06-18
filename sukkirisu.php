<?php

require_once('FortuneTellerInterface.php');

class Sukkirisu implements FortuneTellerInterface
{
    // 以下の要素を読み取るクラス
    private $rank;
    private $month;
    private $comment;
    private $color;
    private $label;

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

    public function __construct(SiteInterface $site, $birthMonth = '7月')
    {
        foreach ($this->ranking_list($site->scraping()) as $rank => $res) {

            // 誕生月をセットしたいのでそれ以外は無視
            if ($birthMonth !== $res[$this->elements['month']]) {
                continue;
            }

            $this->rank = $rank;
            $this->month = $res[$this->elements['month']];
            $this->comment = $res[$this->elements['comment']];
            $this->color = $res[$this->elements['color']];
            $this->label = $this->label($rank);
        }
    }

    public function tell(): array
    {
        return [
            $this->label.'！',
            $this->month.'生まれは',
            $this->rank.'位。',
            $this->comment.'。ラッキーカラーは',
            $this->color,
        ];
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
