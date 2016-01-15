# battlenet-api

A package for Battle.net's API (http://dev.battle.net/)

### Usage

Instantiate the game API you wish to use with your API Key, API Secret and Region

```php
$diablo = new Diablo(
  $key,
  $secret,
  'us',
  'en_US'
);
```

Example API calls:

```php
// Retrieve Season Leaderboard data
$diablo = new Diablo($key, $secret, 'us', 'en_US');
$diablo->setAccessToken($accessToken);

$barbarian = $diablo->season($season)
	->barbarian()
	->get();
	
$barbarian_hardcore = $diablo->season($season)
	->hardcore()
	->barbarian()
	->get();

$profile = $diablo->careerProfile('battle_tag');
$hero = $diablo->hero('battle_tag', 'id');
```

### Pooling Requests

You can pool multiple requests by chaining requests before calling get().

```
$diablo = new Diablo($key, $secret, 'us', 'en_US');
$diablo->setAccessToken($accessToken);

$leaderboards = $diablo->season($season)
	->barbarian()
	->crusader()
	->demonhunter()
	->monk()
	->witchdoctor()
	->wizard()
	->team(2)
	->team(3)
	->team(4)
	->get();
	
$profile = $diablo->setRegion('eu')
	->careerProfile($battle_tag)
	->get();
	
foreach ($request->heroes as $hero) {
	$diablo->hero($hero->id);
}

$heroes = $diablo->get();
```

This will asynchronously request 25 concurrent requests at a time.  The response will return as an array of JSON objects.  The call will not be made until the get method is called.