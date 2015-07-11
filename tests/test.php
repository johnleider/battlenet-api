<?php

require_once __DIR__.'/../vendor/autoload.php';

use johnleider\BattleNet\Warcraft;

$warcraft = new Warcraft('zu8dqyc8yqmnrktvr7sa2xb2fbrdegzr');

$profile = $warcraft->getCharacterProfile('sargeras', 'Kaowa', [
    'appearance',
    'achievements',
    'guild'
]);

echo $profile;