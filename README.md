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
$diablo->setAccessToken($accessToken);

$barbarian = $diablo->season($season)->barbarian();
$barbarian_hardcore = $diablo->season($season)->hardcore()->barbarian();

$profile = $diablo->careerProfile('battle_tag');
$hero = $diablo->hero('battle_tag', 'id');
```
