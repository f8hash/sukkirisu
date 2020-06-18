<?php

require_once('Interface/ParserInterface.php');

use DOMWrap\Document;

class SukkirisuParser implements ParserInterface
{
    private $document;

    public function __construct()
    {
        $this->document = new Document;
    }

    public function find($html, $selector): array
    {
        $rows = [];
        $elements = $this->document->html($html);
        $elements->find($selector)->each(function ($node) use (&$rows) {
            $rows[] = explode(' ', $node->text());
        });
        return $rows;
    }
}