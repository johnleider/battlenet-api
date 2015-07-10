<?php

require_once __DIR__.'/../vendor/autoload.php';

use johnleider\BattleNet\BattleNet;

(new BattleNet('us'))->fetch();