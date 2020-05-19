<?php

namespace Sukkirisu;

use Goutte\Client;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    private $url;

    private $month;

    public function __construct()
    {
        $this->url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';
        $this->month = 7;
    }

    public function get(Client $client): array
    {
        $crawler = $client->request('GET', $this->url);
        return explode(' ', $crawler->filter('#month'.$this->month)->text());
    }
}
