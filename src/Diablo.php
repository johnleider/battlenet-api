<?php

namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;

class Diablo extends BattleNet
{
    /**
     * The query mode {season/era}
     *
     * @var string
     */
    public $mode;

    /**
     * Hardcore boolean
     *
     * @var boolean
     */
    public $hardcore;

    /**
     * Get Diablo Profile
     *
     * @param $battleTag
     * @return Diablo
     */
    public function careerProfile(string $battleTag) : Diablo
    {
        $this->addToRequest('d3/profile/'.urlencode($battleTag).'/');

        return $this;
    }

    /**
     * Get Diablo Hero
     *
     * @param $battleTag
     * @param $id
     * @return Diablo
     */
    public function hero(string $battleTag, int $id) : Diablo
    {
        $this->addToRequest("d3/profile/".urlencode($battleTag)."/hero/{$id}");

        return $this;
    }

    /**
     *  Get Class Skills
     *
     * @param $class
     * @return Diablo
     */
    public function skills(string $class = 'index') : Diablo
    {
        $this->addToRequest("d3/data/hero/{$class}");

        return $this;
    }

    /**
     * Get Item Information
     *
     * @param $data
     * @return Diablo
     */
    public function item(string $data) : Diablo
    {
        $this->addToRequest("d3/data/item/{$data}");

        return $this;
    }

    /**
     * Get Follower Information
     *
     * @param $follower
     * @return Diablo
     */
    public function follower(string $follower = 'index') : Diablo
    {
        $this->addToRequest("d3/data/follower/{$follower}");

        return $this;
    }

    /**
     * Get Artisan Information
     *
     * @param $artisan
     * @return Diablo
     */
    public function artisan(string $artisan = 'index') : Diablo
    {
        $this->addToRequest("d3/data/artisan/{$artisan}");

        return $this;
    }

    /**
     * Get Act Information
     *
     * @param $act
     * @return Diablo
     */
    public function act(int $act) : Diablo
    {
        $this->addToRequest("d3/data/act/act-{$act}");

        return $this;
    }

    /**
     * Select season to query
     *
     * @param $season
     * @return Diablo
     */
    public function season(int $season) : Diablo
    {
        $this->mode = "/data/d3/season/{$season}";

        return $this;
    }

    /**
     * Select era to query
     *
     * @param $era
     * @return Diablo
     */
    public function era(int $era) : Diablo
    {
        $this->mode = "/data/d3/era/{$era}";

        return $this;
    }

    /**
     * Retrieve barbarian rankings
     *
     * @return Diablo
     */
    public function barbarian() : Diablo
    {
        $this->addToRequest($this->mode."/leaderboard/rift-{$this->isHardcore()}barbarian");

        return $this;
    }

    /**
     * Retrieve crusader rankings
     *
     * @return Diablo
     */
    public function crusader() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}crusader");

        return $this;
    }

    /**
     * Retrieve demonhunter rankings
     *
     * @return Diablo
     */
    public function demonhunter() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}dh");

        return $this;
    }

    /**
     * Retrieve monk rankings
     *
     * @return Diablo
     */
    public function monk() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}monk");

        return $this;
    }

    /**
     * Retrieve witchdoctor rankings
     *
     * @return Diablo
     */
    public function witchdoctor() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}wd");

        return $this;
    }

    /**
     * Retrieve wizard rankings
     *
     * @return Diablo
     */
    public function wizard() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}wizard");

        return $this;
    }

    /**
     * Retrieve team rankings by size
     *
     * @param $size
     * @return Diablo
     */
    public function team(int $size) : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/rift-{$this->isHardcore()}team-{$size}");

        return $this;
    }

    /**
     * Retrieve achievement point rankings
     *
     * @return Diablo
     */
    public function achievementPoints() : Diablo
    {
        $this->addToRequest("{$this->mode}/leaderboard/achievement-points");

        return $this;
    }

    /**
     * Retrieve the season index
     *
     * @return Diablo
     */
    public function seasonIndex() : Diablo
    {
        $this->addToRequest('/data/d3/season/');

        return $this;
    }

    /**
     * Retrieve the era index
     *
     * @return Diablo
     */
    public function eraIndex() : Diablo
    {
        $this->addToRequest('/data/d3/era/');

        return $this;
    }

    /**
     * Set the query to softcore
     *
     * @return Diablo
     */
    public function softcore() : Diablo
    {
        $this->hardcore = false;

        return $this;
    }

    /**
     * Set the query to hardcore
     *
     * @return Diablo
     */
    public function hardcore() : Diablo
    {
        $this->hardcore = true;

        return $this;
    }

    /**
     * Return character type string
     */
    public function isHardcore() : string
    {
        return $this->hardcore
            ? 'hardcore-'
            : '';
    }
}