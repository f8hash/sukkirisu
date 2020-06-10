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
        $site = new SukkirisuSite;
        $crawler = new SukkirisuCrawler;

        $teller = new BirthMonthFortuneTeller($crawler->get($site), $site);

        // 表示
        $viewer = new ConsoleViewer();
        $viewer->show($teller);
    }
}
