<?php

require_once('FortuneTellerInterface.php');

// TODO スッキりす用の派生クラスを作成
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

    public function __construct(SiteInterface $site)
    {
        $rows = $site->scraping();

        $ranking = $this->ranking($rows);

        // TODO 外に定数で定義
        $birthMonth = '7月';

        // $res[0 => 月, 1 => 占い結果, 2 => 色]
        $rowKeys = $site->rowKeys();

        foreach ($ranking as $rank => $res) {

            // 誕生月をセットしたいのでそれ以外は無視
            if ($birthMonth !== $res[$rowKeys['month']]) {
                continue;
            }

            $this->rank = $rank;
            $this->month = $res[$rowKeys['month']];
            $this->comment = $res[$rowKeys['comment']];
            $this->color = $res[$rowKeys['color']];
            $this->label = $site->label($rank);
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

    private function ranking(Array $array): array
    {
        $ret = array_combine($this->ranking, $array);
        
        // 1位、12位以外は要素が一つ多いので1位、12位に合わせる
        for ($i = 2; $i < 12; $i++) {
            array_shift($ret[$i]);
        }

        return $ret;
    }
}