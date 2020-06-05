<?php

namespace Sukkirisu;

require_once './ConsoleViewer.php';
require_once './SukkirisuCrawler.php';

use HeadlessChromium\BrowserFactory;
use DOMWrap\Document;

class Sukkirisu
{
    public function birthMonthFortuneTelling(): void
    {
        $crawler = new SukkirisuCrawler(new BrowserFactory, new Document);
        $viewer = new ConsoleViewer($crawler);
        $viewer->show();
    }
}
