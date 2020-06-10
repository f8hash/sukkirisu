<?php

require_once('ConsoleViewer.php');
require_once('SukkirisuCrawler.php');
require_once('SukkirisuSite.php');
require_once('BirthMonthFortuneTeller.php');

class Sukkirisu
{
    public function birthMonthFortuneTelling(): void
    {
        $crawler = new SukkirisuCrawler(new BrowserFactory, new Document, new SukkirisuSite);
        $viewer = new ConsoleViewer($crawler);
        $viewer->show();
    }
}
