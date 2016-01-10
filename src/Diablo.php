<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;
use johnleider\BattleNet\Responses\Response;

class Diablo extends BattleNet
{
    /**
     * Hardcore string
     */
    public $hardcore = '';

    /**
     * Get Diablo Profile
     *
     * @param $battleTag
     * @return mixed
     */
    public function careerProfile($battleTag)
    {
        $this->url[] = 'd3/profile/'.urlencode($battleTag).'/';

        return $this;
    }

    /**
     * Get Diablo Hero
     *
     * @param $battleTag
     * @param $id
     * @return mixed
     */
    public function hero($battleTag, $id)
    {
        $this->url[] = 'd3/profile/'.urlencode($battleTag).'/hero/'.$id;

        return $this;
    }

    /**
     * Get Item Information
     *
     * @param $data
     * @return mixed
     */
    public function item($data)
    {
        $this->url[] = 'd3/data/item/'.$data;

        return $this;
    }

    /**
     * Get Follower Information
     *
     * @param $follower
     * @return mixed
     */
    public function follower($follower)
    {
        $this->url[] = 'd3/data/follower/'.$follower;

        return $this;
    }

    /**
     * Get Artisan Information
     *
     * @param $artisan
     * @return mixed
     */
    public function artisan($artisan)
    {
        $this->url[] = 'd3/data/artisan/'.$artisan;

        return $this;
    }

    /**
     * Select season to query
     *
     * @param $season
     * @return $this
     */
    public function season($season)
    {
        $this->url[] = '/data/d3/season/'.$season;

        return $this;
    }

    /**
     * Select era to query
     *
     * @param $era
     * @return $this
     */
    public function era($era)
    {
        $this->url[] = '/data/d3/era/'.$era;

        return $this;
    }

    /**
     * Retrieve barbarian rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function barbarian()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}barbarian";

        return $this;
    }

    /**
     * Retrieve crusader rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function crusader()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}crusader";

        return $this;
    }

    /**
     * Retrieve demonhunter rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function demonhunter()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}dh";

        return $this;
    }

    /**
     * Retrieve monk rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function monk()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}monk";

        return $this;
    }

    /**
     * Retrieve witchdoctor rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function witchdoctor()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}wd";

        return $this;
    }

    /**
     * Retrieve wizard rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function wizard()
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}wizard";

        return $this;
    }

    /**
     * Retrieve team rankings by size
     *
     * @param $size
     * @param string $hardcore
     * @return $this
     */
    public function team($size)
    {
        $this->url .= "/leaderboard/rift-{$this->hardcore}team-{$size}";

        return $this;
    }

    /**
     * Retrieve achievement point rankings
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function achievementPoints()
    {
        $this->url .= '/leaderboard/achievement-points';

        return $this;
    }

    /**
     * Retrieve the season index
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function seasonIndex()
    {
        $this->url[] = '/data/d3/season/';

        return $this;
    }

    /**
     * Retrieve the era index
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function eraIndex()
    {
        $this->url[] = '/data/d3/era/';

        return $this;
    }

    /**
     * Set the query to hardcore
     */
    public function softcore()
    {
        $this->hardcore = '';

        return $this;
    }

    /**
     * Set the query to hardcore
     */
    public function hardcore()
    {
        $this->hardcore = 'hardcore-';

        return $this;
    }
}