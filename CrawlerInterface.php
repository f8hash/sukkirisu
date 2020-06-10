<?php

require_once('SiteInterface.php');

Interface CrawlerInterface
{
    public function get(Site $site);
}
