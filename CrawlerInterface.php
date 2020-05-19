<?php

namespace Sukkirisu;

use Goutte\Client;

Interface CrawlerInterface
{
    public function get(Client $client);
}
