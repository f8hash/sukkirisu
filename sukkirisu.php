<?php

require_once('FortuneTellerInterface.php');

use DOMWrap\Document;

// TODO スッキりす用の派生クラスを作成
class Sukkirisu implements FortuneTellerInterface
{
    // 以下の要素を読み取るクラス
    private $rank;
    private $month;
    private $comment;
    private $color;
    private $label;

    public function __construct(SiteInterface $site)
    {
        $site->crawling();

        $document = new Document;
        $html = $document->html($site->html());
        
        $rows = [];
        $html->find($site->selector())->each(function ($node) use (&$rows) {
            $rows[] = explode(' ', $node->text());
        });

        $ranking = $site->ranking($rows);

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
}