<?php

require_once('ConsoleViewer.php');
require_once('SukkirisuCrawler.php');
require_once('SukkirisuSite.php');
require_once('BirthMonthFortuneTeller.php');

class Sukkirisu
{
    public function birthMonthFortuneTelling(): void
    {
        // webサイトからhtmlを取得
        $teller = new BirthMonthFortuneTeller(new SukkirisuCrawler, new SukkirisuSite);

        // 表示
        $viewer = new ConsoleViewer;
        $viewer->show($teller->tell());
    }
}
