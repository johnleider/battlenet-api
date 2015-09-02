<?php
namespace johnleider\BattleNet;

class Warcraft extends BattleNet
{
    /**
     * Get Achievement Data
     *
     * @param $id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getAchievement($id)
    {
        $url = 'wow/achievement/'.$id;

        return $this->get($url);
    }

    /**
     * Get Auction Data
     *
     * @param $realm
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getAuctionData($realm)
    {
        $url = 'wow/auction/data/'.$realm;

        return $this->get($url);
    }

    /**
     * Get Battle Pet Ability Information
     *
     * @param $ability_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetAbility($ability_id)
    {
        $url = 'wow/battlepet/ability/'.$ability_id;

        return $this->get($url);
    }

    /**
     * Get Battle Pet Species Information
     *
     * @param $species_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetSpecies($species_id)
    {
        $url = 'wow/battlepet/species/'.$species_id;

        return $this->get($url);
    }

    /**
     * Get Battle Pet Stats Information
     *
     * @param $species_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetStats($species_id)
    {
        $url = 'wow/battlepet/stats/'.$species_id;

        return $this->get($url);
    }

    /**
     * Get Challenge Leaderboards for a Realm
     *
     * @param $realm
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getChallengeRealm($realm)
    {
        $url = 'wow/challenge/'.$realm;

        return $this->get($url);
    }

    /**
     * Get Challenge Leaderboards for the Region
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getChallengeRegion()
    {
        $url = 'wow/challenge/region';

        return $this->get($url);
    }

    /**
     * Get a Character Profile
     *
     * @param $realm
     * @param $character_name
     * @param array $options
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterProfile($realm, $character_name, $options = [])
    {
        $url = 'wow/character/'.$realm.'/'.$character_name;

        return $this->get($url, $options);
    }

    /**
     * Get Item Information
     *
     * @param $item_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getItem($item_id)
    {
        $url = 'wow/item/'.$item_id;

        return $this->get($url);
    }

    /**
     * Get Set Item Information
     *
     * @param $set_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getSetItem($set_id)
    {
        $url = 'wow/item/set/'.$set_id;
        
        return $this->get($url);
    }

    /**
     * Get Guild Information
     *
     * @param $realm
     * @param $guild_name
     * @param array $options
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildProfile($realm, $guild_name, $options = [])
    {
        $url = 'wow/guild/'.$realm.'/'.$guild_name;

        return $this->get($url, $options);
    }

    /**
     * Get Leaderboard Information
     *
     * @param $bracket
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getLeaderboards($bracket)
    {
        $url = 'wow/leaderboard/'.$bracket;

        return $this->get($url);
    }

    /**
     * Get Quest Information
     *
     * @param $quest_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getQuest($quest_id)
    {
        $url = 'wow/quest/'.$quest_id;

        return $this->get($url);
    }

    /**
     * Get Realm Status Information
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRealmStatus()
    {
        $url = 'wow/realm/status';

        return $this->get($url);
    }

    /**
     * Get Recipe Information
     *
     * @param $recipe_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRecipe($recipe_id)
    {
        $url = 'wow/recipe/'.$recipe_id;

        return $this->get($url);
    }

    /**
     * Get Spell Information
     *
     * @param $spell_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getSpell($spell_id)
    {
        $url = 'wow/spell/'.$spell_id;

        return $this->get($url);
    }

    /**
     * Get Battlegroups List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlegroups()
    {
        $url = 'wow/data/battlegroups/';

        return $this->get($url);
    }

    /**
     * Get Character Races List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterRaces()
    {
        $url = 'wow/data/character/races';

        return $this->get($url);
    }

    /**
     * Get Character Classes List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterClasses()
    {
        $url = 'wow/data/character/classes';

        return $this->get($url);
    }

    /**
     * Get Character Achivements List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterAchievements()
    {
        $url = 'wow/data/character/achievements';

        return $this->get($url);
    }

    /**
     * Get Guild Rewards List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildRewards()
    {
        $url = 'wow/data/guild/rewards';

        return $this->get($url);
    }

    /**
     * Get Guild Perks List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildPerks()
    {
        $url = 'wow/data/guild/perks';

        return $this->get($url);
    }

    /**
     * Get Guild Achievements List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildAchievements()
    {
        $url = 'wow/data/guild/achievements';

        return $this->get($url);
    }

    /**
     * Get Item Classes List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getItemClasses()
    {
        $url = 'wow/data/item/classes';

        return $this->get($url);
    }

    /**
     * Get Talents List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getTalents()
    {
        $url = 'wow/data/talents';

        return $this->get($url);
    }

    /**
     * Get Pet Types List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getPetTypes()
    {
        $url = 'wow/data/pet/types';

        return $this->get($url);
    }
}