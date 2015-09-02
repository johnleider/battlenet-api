<?php
namespace johnleider\BattleNet;

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

        return $this->get();
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

        return $this->get();
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

        return $this->get();
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

        return $this->get();
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

        return $this->get();
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
     * Retrieve barbarian rankings
     *
     * @param string $hardcore
     * @return $this
     */
    public function barbarian($hardcore = '')
    {
        if ( ! empty($hardcore)) $hardcore .= '-';

        $this->url .= "/leaderboard/rift-{$hardcore}barbarian";

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this;
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

        return $this->get();
    }

    /**
     * Retrieve the season index
     * @return \Psr\Http\Message\StreamInterface
     * @internal param $access_token
     */
    public function seasonIndex()
    {
        $this->url = '/data/d3/season/';

        return $this->get();
    }
}