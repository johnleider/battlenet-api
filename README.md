# battlenet-api

A package for Battle.net's API (http://dev.battle.net/)

### Usage

Instantiate the game API you wish to use with your API Key, API Secret and Region

```php
$diablo = new Diablo(
  $key,
  $secret,
  'us'
);
```

Example API calls:

```php
// Retrieve Season Leaderboard data
$diablo = new Diablo($key, $secret, 'us');

// Retrieve realm list
$realms = $warcraft->getRealms();

// Retrieve achievement details
$achievement = $warcraft->getAchievement(2144);
```
