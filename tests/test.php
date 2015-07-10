<?php

require_once __DIR__.'/../vendor/autoload.php';

use johnleider\BattleNet\Diablo;

$battle = new Diablo('zu8dqyc8yqmnrktvr7sa2xb2fbrdegzr', 'us', 'en_US');

$battle = $battle->getCareerProfile('zeroskillz-1838');

echo $battle->getBody();