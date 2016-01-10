<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;
use Psr\Http\Message\StreamInterface;

class Starcraft extends BattleNet
{
    /**
     * Get Profile Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return StreamInterface
     */
    public function getProfile(string $id, string $region, string $name) : StreamInterface
    {
        $this->uris[] = 'sc2/profile/'.$id.'/'.$region.'/'.$name;

        return $this;
    }

    /**
     * Get a Profile's Ladder Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return StreamInterface
     */
    public function getProfileLadders(string $id, string $region, string $name) : StreamInterface
    {
        $this->uris[] = 'sc2/profile/'.$id.'/'.$region.'/'.$name.'/ladders';

        return $this;
    }

    /**
     * Get a Profile's Match History
     *
     * @param $id
     * @param $region
     * @param $name
     * @return StreamInterface
     */
    public function getProfileMatches(string $id, string $region, string $name) : StreamInterface
    {
        $this->uris[] = 'sc2/profile/'.$id.'/'.$region.'/'.$name.'/matches';

        return $this;
    }

    /**
     * Get a Ladder's Information
     *
     * @param $id
     * @return StreamInterface
     */
    public function getLadder($id) : StreamInterface
    {
        $this->uris[] = 'sc2/ladder/'.$id;

        return $this;
    }

    /**
     * Get Achievements List
     *
     * @return StreamInterface
     */
    public function getAchievements() : StreamInterface
    {
        $this->uris[] = 'sc2/data/achievements';

        return $this;
    }

    /**
     * Get Rewards List
     *
     * @return StreamInterface
     */
    public function getRewards() : StreamInterface
    {
        $this->uris[] = 'sc2/data/rewards';

        return $this;
    }
}