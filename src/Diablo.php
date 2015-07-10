<?php

namespace johnleider\BattleNet;

class Diablo extends BattleNet
{
    private $game = 'd3';

    public function getCareerProfile($profile)
    {
        $url = $this->game.'/profile/'.$profile.'/';
        return $this->get($url);
    }
}