<?php

use HeadlessChromium\BrowserFactory;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    public function __construct()
    {
        $this->browserFactory = new BrowserFactory;
    }

    public function get(Site $site): string
    {
        $browser = $this->browserFactory->createBrowser();
        $page = $browser->createPage();

        $page->navigate($site->url())->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        return $value;
    }
}
