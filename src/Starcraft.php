<?php
namespace johnleider\BattleNet;

class Starcraft extends BattleNet
{
    /**
     * Get Profile Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getProfile($id, $region, $name)
    {
        $this->url = 'sc2/profile/'.$id.'/'.$region.'/'.$name;

        return $this->get();
    }

    /**
     * Get a Profile's Ladder Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getProfileLadders($id, $region, $name)
    {
        $this->url = 'sc2/profile/'.$id.'/'.$region.'/'.$name.'/ladders';
        
        return $this->get();
    }

    /**
     * Get a Profile's Match History
     *
     * @param $id
     * @param $region
     * @param $name
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getProfileMatches($id, $region, $name)
    {
        $this->url = 'sc2/profile/'.$id.'/'.$region.'/'.$name.'/matches';

        return $this->get();
    }

    /**
     * Get a Ladder's Information
     *
     * @param $id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getLadder($id)
    {
        $this->url = 'sc2/ladder/'.$id;
        
        return $this->get();
    }

    /**
     * Get Achievements List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getAchievements()
    {
        $this->url = 'sc2/data/achievements';
        
        return $this->get();
    }

    /**
     * Get Rewards List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRewards()
    {
        $this->url = 'sc2/data/rewards';

        return $this->get();
    }
}