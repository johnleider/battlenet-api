<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;

class Diablo extends BattleNet
{
    /**
     * The query mode {hardcore/softcore}
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
    public function careerProfile($battleTag) : Diablo
    {
        $this->uris[] = 'd3/profile/'.urlencode($battleTag).'/';

        return $this;
    }

    /**
     * Get Diablo Hero
     *
     * @param $battleTag
     * @param $id
     * @return Diablo
     */
    public function hero($battleTag, $id) : Diablo
    {
        $this->uris[] = 'd3/profile/'.urlencode($battleTag).'/hero/'.$id;

        return $this;
    }

    /**
     * Get Item Information
     *
     * @param $data
     * @return Diablo
     */
    public function item($data) : Diablo
    {
        $this->uris[] = 'd3/data/item/'.$data;

        return $this;
    }

    /**
     * Get Follower Information
     *
     * @param $follower
     * @return Diablo
     */
    public function follower($follower) : Diablo
    {
        $this->uris[] = 'd3/data/follower/'.$follower;

        return $this;
    }

    /**
     * Get Artisan Information
     *
     * @param $artisan
     * @return Diablo
     */
    public function artisan($artisan) : Diablo
    {
        $this->uris[] = 'd3/data/artisan/'.$artisan;

        return $this;
    }

    /**
     * Select season to query
     *
     * @param $season
     * @return Diablo
     */
    public function season($season) : Diablo
    {
        $this->mode = '/data/d3/season/'.$season;

        return $this;
    }

    /**
     * Select era to query
     *
     * @param $era
     * @return Diablo
     */
    public function era($era) : Diablo
    {
        $this->mode = '/data/d3/era/'.$era;

        return $this;
    }

    /**
     * Retrieve barbarian rankings
     *
     * @return Diablo
     */
    public function barbarian() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}barbarian";

        return $this;
    }

    /**
     * Retrieve crusader rankings
     *
     * @return Diablo
     */
    public function crusader() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}crusader";

        return $this;
    }

    /**
     * Retrieve demonhunter rankings
     *
     * @return Diablo
     */
    public function demonhunter() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}dh";

        return $this;
    }

    /**
     * Retrieve monk rankings
     *
     * @return Diablo
     */
    public function monk() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}monk";

        return $this;
    }

    /**
     * Retrieve witchdoctor rankings
     *
     * @return Diablo
     */
    public function witchdoctor() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}wd";

        return $this;
    }

    /**
     * Retrieve wizard rankings
     *
     * @return Diablo
     */
    public function wizard() : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}wizard";

        return $this;
    }

    /**
     * Retrieve team rankings by size
     *
     * @param $size
     * @return Diablo
     */
    public function team($size) : Diablo
    {
        $this->uris[] = $this->mode."/leaderboard/rift-{$this->isHardcore()}team-{$size}";

        return $this;
    }

    /**
     * Retrieve achievement point rankings
     *
     * @return Diablo
     */
    public function achievementPoints() : Diablo
    {
        $this->uris[] = $this->mode.'/leaderboard/achievement-points';

        return $this;
    }

    /**
     * Retrieve the season index
     *
     * @return Diablo
     */
    public function seasonIndex() : Diablo
    {
        $this->uris[] = '/data/d3/season/';

        return $this;
    }

    /**
     * Retrieve the era index
     *
     * @return Diablo
     */
    public function eraIndex() : Diablo
    {
        $this->uris[] = '/data/d3/era/';

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