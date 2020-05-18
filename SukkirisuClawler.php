<?php

namespace Sukkirisu;

use Goutte\Client;

class SukkirisuClawler
{
    private $url;

    public function __construct()
    {
        $this->url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';
    }

    public function get(Client $client): array
    {
        return [];
    }
}
