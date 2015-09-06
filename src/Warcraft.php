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
        $this->url = 'wow/achievement/'.$id;

        return $this->get();
    }

    /**
     * Get Auction Data
     *
     * @param $realm
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getAuctionData($realm)
    {
        $this->url = 'wow/auction/data/'.$realm;

        return $this->get();
    }

    /**
     * Get Battle Pet Ability Information
     *
     * @param $ability_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetAbility($ability_id)
    {
        $this->url = 'wow/battlepet/ability/'.$ability_id;

        return $this->get();
    }

    /**
     * Get Battle Pet Species Information
     *
     * @param $species_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetSpecies($species_id)
    {
        $this->url = 'wow/battlepet/species/'.$species_id;

        return $this->get();
    }

    /**
     * Get Battle Pet Stats Information
     *
     * @param $species_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlePetStats($species_id)
    {
        $this->url = 'wow/battlepet/stats/'.$species_id;

        return $this->get();
    }

    /**
     * Get Challenge Leaderboards for a Realm
     *
     * @param $realm
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getChallengeRealm($realm)
    {
        $this->url = 'wow/challenge/'.$realm;

        return $this->get();
    }

    /**
     * Get Challenge Leaderboards for the Region
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getChallengeRegion()
    {
        $this->url = 'wow/challenge/region';

        return $this->get();
    }

    /**
     * Get a Character Profile
     *
     * @param $realm
     * @param $character_name
     * @param array $fields
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterProfile($realm, $character_name, array $fields = [])
    {
        $this->url = 'wow/character/'.$realm.'/'.$character_name;

        return $this->get(compact('fields'));
    }

    /**
     * Get Item Information
     *
     * @param $item_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getItem($item_id)
    {
        $this->url = 'wow/item/'.$item_id;

        return $this->get();
    }

    /**
     * Get Set Item Information
     *
     * @param $set_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getSetItem($set_id)
    {
        $this->url = 'wow/item/set/'.$set_id;
        
        return $this->get();
    }

    /**
     * Get Guild Information
     *
     * @param $realm
     * @param $guild_name
     * @param array $fields
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildProfile($realm, $guild_name, array $fields = [])
    {
        $this->url = 'wow/guild/'.$realm.'/'.$guild_name;

        return $this->get(compact('fields'));
    }

    /**
     * Get Leaderboard Information
     *
     * @param $bracket
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getLeaderboards($bracket)
    {
        $this->url = 'wow/leaderboard/'.$bracket;

        return $this->get();
    }

    /**
     * Get Quest Information
     *
     * @param $quest_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getQuest($quest_id)
    {
        $this->url = 'wow/quest/'.$quest_id;

        return $this->get();
    }

    /**
     * Get Realm Status Information
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRealmStatus()
    {
        $this->url = 'wow/realm/status';

        return $this->get();
    }

    /**
     * Get Recipe Information
     *
     * @param $recipe_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRecipe($recipe_id)
    {
        $this->url = 'wow/recipe/'.$recipe_id;

        return $this->get();
    }

    /**
     * Get Spell Information
     *
     * @param $spell_id
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getSpell($spell_id)
    {
        $this->url = 'wow/spell/'.$spell_id;

        return $this->get();
    }

    /**
     * Get Battlegroups List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getBattlegroups()
    {
        $this->url = 'wow/data/battlegroups/';

        return $this->get();
    }

    /**
     * Get Character Races List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterRaces()
    {
        $this->url = 'wow/data/character/races';

        return $this->get();
    }

    /**
     * Get Character Classes List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterClasses()
    {
        $this->url = 'wow/data/character/classes';

        return $this->get();
    }

    /**
     * Get Character Achivements List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getCharacterAchievements()
    {
        $this->url = 'wow/data/character/achievements';

        return $this->get();
    }

    /**
     * Get Guild Rewards List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildRewards()
    {
        $this->url = 'wow/data/guild/rewards';

        return $this->get();
    }

    /**
     * Get Guild Perks List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildPerks()
    {
        $this->url = 'wow/data/guild/perks';

        return $this->get();
    }

    /**
     * Get Guild Achievements List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getGuildAchievements()
    {
        $this->url = 'wow/data/guild/achievements';

        return $this->get();
    }

    /**
     * Get Item Classes List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getItemClasses()
    {
        $this->url = 'wow/data/item/classes';

        return $this->get();
    }

    /**
     * Get Talents List
     * 
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getTalents()
    {
        $this->url = 'wow/data/talents';

        return $this->get();
    }

    /**
     * Get Pet Types List
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getPetTypes()
    {
        $this->url = 'wow/data/pet/types';

        return $this->get();
    }
}