<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;
use johnleider\BattleNet\Responses\Response;

class Diablo extends BattleNet
{
    /**
     * Get Diablo Profile
     *
     * @param $battleTag
     * @return mixed
     */
    public function careerProfile($battleTag)
    {
        $this->url = 'd3/profile/'.urlencode($battleTag).'/';

        return new Response($this->get());
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
        $this->url = 'd3/profile/'.urlencode($battleTag).'/hero/'.$id;

        return new Response($this->get());
    }

    /**
     * Get Item Information
     *
     * @param $data
     * @return mixed
     */
    public function item($data)
    {
        $this->url = 'd3/data/item/'.$data;

        return new Response($this->get());
    }

    /**
     * Get Follower Information
     *
     * @param $follower
     * @return mixed
     */
    public function follower($follower)
    {
        $this->url = 'd3/data/follower/'.$follower;

        return new Response($this->get());
    }

    /**
     * Get Artisan Information
     *
     * @param $artisan
     * @return mixed
     */
    public function artisan($artisan)
    {
        $this->url = 'd3/data/artisan/'.$artisan;

        return new Response($this->get());
    }

    /**
     * Select season to query
     *
     * @param $season
     * @return $this
     */
    public function season($season)
    {
        $this->url = '/data/d3/season/'.$season;

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
        $this->url = '/data/d3/era/'.$era;

        return $this;
    }

    /**
     * Retrieve barbarian rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function barbarian($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}barbarian";

        return new Response($this->get());
    }

    /**
     * Retrieve crusader rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function crusader($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}crusader";

        return new Response($this->get());
    }

    /**
     * Retrieve demonhunter rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function demonhunter($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}dh";

        return new Response($this->get());
    }

    /**
     * Retrieve monk rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function monk($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}monk";

        return new Response($this->get());
    }

    /**
     * Retrieve witchdoctor rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function witchdoctor($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}wd";

        return new Response($this->get());
    }

    /**
     * Retrieve wizard rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function wizard($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}wizard";

        return new Response($this->get());
    }

    /**
     * Retrieve team rankings by size
     *
     * @param $size
     * @param string $hardcore
     * @return $this
     */
    public function team($size, $hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}team-{$size}";

        return new Response($this->get());
    }

    /**
     * Retrieve achievement point rankings
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function achievementPoints()
    {
        $this->url .= '/leaderboard/achievement-points';

        return new Response($this->get());
    }

    /**
     * Retrieve the season index
     * @return \Psr\Http\Message\StreamInterface
     */
    public function seasonIndex()
    {
        $this->url = '/data/d3/season/';

        return new Response($this->get());
    }

    public function eraIndex()
    {
        $this->url = '/data/d3/era/';

        return new Response($this->get());
    }
}