<?php

namespace Sukkirisu;

require_once './ConsoleViewer.php';
require_once './SukkirisuCrawler.php';

use Goutte\Client;

class Sukkirisu
{
    public function birthMonthFortuneTelling(): void
    {
        $crawler = new SukkirisuCrawler(new Client());
        $viewer = new ConsoleViewer($crawler);
        $viewer->show();
    }
}
