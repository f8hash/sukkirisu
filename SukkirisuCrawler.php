<?php

use HeadlessChromium\BrowserFactory;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    public function get($url): string
    {
        $browserFactory = new BrowserFactory;
        $browser = $browserFactory->createBrowser();
        $page = $browser->createPage();

        $page->navigate($url)->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        return $value;
    }
}
