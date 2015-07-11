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
    public function getCareerProfile($battleTag)
    {
        $url = 'd3/profile/'.urlencode($battleTag).'/';

        return $this->get($url);
    }

    /**
     * Get Diablo Hero
     *
     * @param $battleTag
     * @param $id
     * @return mixed
     */
    public function getHero($battleTag, $id)
    {
        $url = 'd3/profile/'.urlencode($battleTag).'/hero/'.$id;

        return $this->get($url);
    }

    /**
     * Get Item Information
     *
     * @param $data
     * @return mixed
     */
    public function getItem($data)
    {
        $url = 'd3/data/item/'.$data;

        return $this->get($url);
    }

    /**
     * Get Follower Information
     *
     * @param $follower
     * @return mixed
     */
    public function getFollower($follower)
    {
        $url = 'd3/data/follower/'.$follower;

        return $this->get($url);
    }

    /**
     * Get Artisan Information
     *
     * @param $artisan
     * @return mixed
     */
    public function getArtisan($artisan)
    {
        $url = $this->game.'/data/artisan/'.$artisan;

        return $this->get($url);
    }
}