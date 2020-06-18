<?php

require_once('Interface/ViewerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show(FortuneTellerInterface $teller, $birth_month): void
    {
        echo $teller->tell($birth_month);
    }
}
