<?php

require_once('SiteInterface.php');

class SukkirisuSite implements SiteInterface
{
    private $url;

    private $selector;

    public function __construct()
    {
        $this->url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';
        $this->selector = 'div.ntv-article-contents-main > div > div';
    }

    public function url(): string
    {
        return $this->url;
    }

    public function selector(): string
    {
        return $this->selector;
    }
}
