<?php

require_once('Interface/SiteInterface.php');
require_once('SukkirisuCrawler.php');

class SukkirisuSite implements SiteInterface
{
    private $url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';

    private $html = '';

    public function html(): string
    {
        if (empty($this->html)) {
            $this->crawling();
        }
        return $this->html;
    }

    private function crawling(): void
    {
        $crawler = new SukkirisuCrawler;
        $this->html = $crawler->get($this->url);
    }
}
