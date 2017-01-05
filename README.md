People's Travel Sorter
======================
## Stability

[![Build Status](https://travis-ci.org/maxmode/travel_sorter.png)](https://travis-ci.org/maxmode/travel_sorter)

## About
This is a demo project of People's Travel Sorter.


## Requirements

1. PHP 5.6+
2. composer

## Installation

```
composer install
```

## Run tests

```
bin/phpunit
```

## Example of usage

```php

$service = new Maxmode\TravelSorter\Service\Journey();
$serializer = new Maxmode\TravelSorter\Service\Journey\Serializer();

// assuming that input data is in $inputList
$journey = $serializer->fromArrayToJourney($inputList);
$service->sortJourney($journey);
$actualList = $serializer->fromJourneyToArray($journey);

print_r($actualList);

```