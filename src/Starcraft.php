<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;

class Starcraft extends BattleNet
{
    /**
     * Get Profile Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return Starcraft
     */
    public function getProfile(int $id, string $region, string $name) : Starcraft
    {
        $this->uris[] = "sc2/profile/{$id}/{$region}/{$name}";

        return $this;
    }

    /**
     * Get a Profile's Ladder Information
     *
     * @param $id
     * @param $region
     * @param $name
     * @return Starcraft
     */
    public function getProfileLadders(int $id, string $region, string $name) : Starcraft
    {
        $this->uris[] = "sc2/profile/{$id}/{$region}/{$name}/ladders";

        return $this;
    }

    /**
     * Get a Profile's Match History
     *
     * @param $id
     * @param $region
     * @param $name
     * @return Starcraft
     */
    public function getProfileMatches(int $id, string $region, string $name) : Starcraft
    {
        $this->uris[] = "sc2/profile/{$id}/{$region}/{$name}/matches";

        return $this;
    }

    /**
     * Get a Ladder's Information
     *
     * @param $id
     * @return Starcraft
     */
    public function getLadder(int $id) : Starcraft
    {
        $this->uris[] = "sc2/ladder/{$id}";

        return $this;
    }

    /**
     * Get Achievements List
     *
     * @return Starcraft
     */
    public function getAchievements() : Starcraft
    {
        $this->uris[] = 'sc2/data/achievements';

        return $this;
    }

    /**
     * Get Rewards List
     *
     * @return Starcraft
     */
    public function getRewards() : Starcraft
    {
        $this->uris[] = 'sc2/data/rewards';

        return $this;
    }
}