<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;



class Diablo extends Blizzard
{
    protected $game = 'd3';

    public function __construct($region)
    {
        parent::__construct($region);
    }

    public function profile(array $options)
    {
        return $this->fetch($options);
    }
}

$profile = 'zeroskillz#1838';

$diablo = new Diablo('us');
echo $diablo->profile(compact('profile'));