<?php

use HeadlessChromium\BrowserFactory;

require_once('Interface/CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    private $browserFactory;

    public function __construct()
    {
        $this->browserFactory = new browserFactory;
    }

    public function get($url): string
    {
        $browser = $this->browserFactory->createBrowser();
        $page = $browser->createPage();

        $page->navigate($url)->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        return $value;
    }
}
