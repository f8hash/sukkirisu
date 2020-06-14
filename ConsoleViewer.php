<?php

require_once('ViewerInterface.php');
require_once('FortuneTellerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show(FortuneTellerInterface $teller): void
    {
        echo $teller->label().'！'
            .$teller->month().'生まれは'
            .$teller->rank().'位。'
            .$teller->comment().'。ラッキーカラーは'
            .$teller->color();
    }
}
