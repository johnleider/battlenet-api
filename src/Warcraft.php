<?php
namespace johnleider\BattleNet;

use johnleider\BattleNet\Requests\BattleNet;
use johnleider\BattleNet\Responses\Response;

class Warcraft extends BattleNet
{
    /**
     * Get Achievement Data
     *
     * @param $id
     * @return StreamInterface
     */
    public function getAchievement(string $id) : StreamInterface
    {
        $this->uris[] = 'wow/achievement/'.$id;

        return $this;
    }

    /**
     * Get Auction Data
     *
     * @param $realm
     * @return StreamInterface
     */
    public function getAuctionData(string $realm) : StreamInterface
    {
        $this->uris[] = 'wow/auction/data/'.$realm;

        return $this;
    }

    /**
     * Get Battle Pet Ability Information
     *
     * @param $ability_id
     * @return StreamInterface
     */
    public function getBattlePetAbility(string $ability_id) : StreamInterface
    {
        $this->uris[] = 'wow/battlepet/ability/'.$ability_id;

        return $this;
    }

    /**
     * Get Battle Pet Species Information
     *
     * @param $species_id
     * @return StreamInterface
     */
    public function getBattlePetSpecies(string $species_id) : StreamInterface
    {
        $this->uris[] = 'wow/battlepet/species/'.$species_id;

        return $this;
    }

    /**
     * Get Battle Pet Stats Information
     *
     * @param $species_id
     * @return StreamInterface
     */
    public function getBattlePetStats(string $species_id) : StreamInterface
    {
        $this->uris[] = 'wow/battlepet/stats/'.$species_id;

        return $this;
    }

    /**
     * Get Challenge Leaderboards for a Realm
     *
     * @param $realm
     * @return StreamInterface
     */
    public function getChallengeRealm(string $realm) : StreamInterface
    {
        $this->uris[] = 'wow/challenge/'.$realm;

        return $this;
    }

    /**
     * Get Challenge Leaderboards for the Region
     * 
     * @return StreamInterface
     */
    public function getChallengeRegion() : StreamInterface
    {
        $this->uris[] = 'wow/challenge/region';

        return $this;
    }

    /**
     * Get a Character Profile
     *
     * @param $realm
     * @param $character_name
     * @param array $fields
     * @return StreamInterface
     */
    public function getCharacterProfile(string $realm, string $character_name, array $fields = []) : StreamInterface
    {
        $this->uris[] = 'wow/character/'.$realm.'/'.$character_name.'?'.http_build_query($fields);

        return $this;
    }

    /**
     * Get Item Information
     *
     * @param $item_id
     * @return StreamInterface
     */
    public function getItem(string $item_id) : StreamInterface
    {
        $this->uris[] = 'wow/item/'.$item_id;

        return $this;
    }

    /**
     * Get Set Item Information
     *
     * @param $set_id
     * @return StreamInterface
     */
    public function getSetItem(string $set_id) : StreamInterface
    {
        $this->uris[] = 'wow/item/set/'.$set_id;

        return $this;
    }

    /**
     * Get Guild Information
     *
     * @param $realm
     * @param $guild_name
     * @param array $fields
     * @return StreamInterface
     */
    public function getGuildProfile(string $realm, string $guild_name, array $fields = []) : StreamInterface
    {
        $this->uris[] = 'wow/guild/'.$realm.'/'.$guild_name.'?'.http_build_query($fields);

        return $this;
    }

    /**
     * Get Leaderboard Information
     *
     * @param $bracket
     * @return StreamInterface
     */
    public function getLeaderboards(string $bracket) : StreamInterface
    {
        $this->uris[] = 'wow/leaderboard/'.$bracket;

        return $this;
    }

    /**
     * Get Quest Information
     *
     * @param $quest_id
     * @return StreamInterface
     */
    public function getQuest(string $quest_id) : StreamInterface
    {
        $this->uris[] = 'wow/quest/'.$quest_id;

        return $this;
    }

    /**
     * Get Realm Status Information
     *
     * @return StreamInterface
     */
    public function getRealmStatus() : StreamInterface
    {
        $this->uris[] = 'wow/realm/status';

        return $this;
    }

    /**
     * Get Recipe Information
     *
     * @param $recipe_id
     * @return StreamInterface
     */
    public function getRecipe(string $recipe_id) : StreamInterface
    {
        $this->uris[] = 'wow/recipe/'.$recipe_id;

        return $this;
    }

    /**
     * Get Spell Information
     *
     * @param $spell_id
     * @return StreamInterface
     */
    public function getSpell(string $spell_id) : StreamInterface
    {
        $this->uris[] = 'wow/spell/'.$spell_id;

        return $this;
    }

    /**
     * Get Battlegroups List
     * 
     * @return StreamInterface
     */
    public function getBattlegroups() : StreamInterface
    {
        $this->uris[] = 'wow/data/battlegroups/';

        return $this;
    }

    /**
     * Get Character Races List
     * 
     * @return StreamInterface
     */
    public function getCharacterRaces() : StreamInterface
    {
        $this->uris[] = 'wow/data/character/races';

        return $this;
    }

    /**
     * Get Character Classes List
     * 
     * @return StreamInterface
     */
    public function getCharacterClasses() : StreamInterface
    {
        $this->uris[] = 'wow/data/character/classes';

        return $this;
    }

    /**
     * Get Character Achivements List
     *
     * @return StreamInterface
     */
    public function getCharacterAchievements() : StreamInterface
    {
        $this->uris[] = 'wow/data/character/achievements';

        return $this;
    }

    /**
     * Get Guild Rewards List
     * 
     * @return StreamInterface
     */
    public function getGuildRewards() : StreamInterface
    {
        $this->uris[] = 'wow/data/guild/rewards';

        return $this;
    }

    /**
     * Get Guild Perks List
     * 
     * @return StreamInterface
     */
    public function getGuildPerks() : StreamInterface
    {
        $this->uris[] = 'wow/data/guild/perks';

        return $this;
    }

    /**
     * Get Guild Achievements List
     * 
     * @return StreamInterface
     */
    public function getGuildAchievements() : StreamInterface
    {
        $this->uris[] = 'wow/data/guild/achievements';

        return $this;
    }

    /**
     * Get Item Classes List
     * 
     * @return StreamInterface
     */
    public function getItemClasses() : StreamInterface
    {
        $this->uris[] = 'wow/data/item/classes';

        return $this;
    }

    /**
     * Get Talents List
     * 
     * @return StreamInterface
     */
    public function getTalents() : StreamInterface
    {
        $this->uris[] = 'wow/data/talents';

        return $this;
    }

    /**
     * Get Pet Types List
     *
     * @return StreamInterface
     */
    public function getPetTypes() : StreamInterface
    {
        $this->uris[] = 'wow/data/pet/types';

        return $this;
    }
}