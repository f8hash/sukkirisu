<?php

require_once('Interface/ViewerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show(ScraperInterface $scraper, $birth_month): void
    {
        echo $scraper->result($birth_month);
    }
}
