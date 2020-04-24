<?php

$mainArray = [
        ["countryID" => "US",
        "countryName" => "United States",
        "countryCapital" => "Washington D.C.",
        "stateID" => "CA",
        "stateName" => "California",
        "stateDescription" => "A Western U.S. state..",
        "cityID" => "LA",
        "cityName" => "Los Angeles",
        "cityDescription" => "Los Angeles is a sprawling Southern California city"],
        [        "cityName" => "Sacramento",
            "countryID" => "US",
        "countryName" => "United States",
        "countryCapital" => "Washington D.C.",
        "stateID" => "CA",
        "stateName" => "California",
        "stateDescription" => "A Western U.S. state..",
        "cityID" => "Sac",
        "cityDescription" => "Capital city of the U.S. state of California"],
        [        "stateID" => "AL",
            "countryID" => "US",
        "countryName" => "United States",
        "countryCapital" => "Washington D.C.",
        "stateName" => "Alabama",
        "stateDescription" => "A state in the Southeastern region of the U.S.",
        "cityID" => "Mon",
        "cityName" => "Montgomery",
        "cityDescription" => "Montgomery is the capital city of the U.S. state of Alabama"],
        [        "stateID" => "MH",
            "countryID" => "IN",
        "countryName" => "India",
        "countryCapital" => "New Delhi",
        "stateName" => "Maharashtra",
        "stateDescription" => "A state in Western India",
        "cityID" => "Bom",
        "cityName" => "Bombay",
        "cityDescription" => "Capital city of Maharashtra"]
    ];

$nestedArray = [];

$result = array_reduce(
    $mainArray, 
    function($carry, $item) {
        $carry[$item['countryID']] = $carry[$item['countryID']] ?? [];
        foreach (['countryName', 'countryCapital'] as $meta) {
            $carry[$item['countryID']][$meta] = $item[$meta];
        }
        $carry[$item['countryID']][$item['stateID']] = $carry[$item['countryID']][$item['stateID']] ?? [];
        foreach (['stateName', 'stateDescription'] as $meta) {
            $carry[$item['countryID']][$item['stateID']][$meta] = $item[$meta];
        }
        $carry[$item['countryID']][$item['stateID']][$item['cityID']] = $carry[$item['countryID']][$item['stateID']][$item['cityID']] ?? [];
        foreach (['cityName', 'cityDescription'] as $meta) {
            $carry[$item['countryID']][$item['stateID']][$item['cityID']][$meta] = $item[$meta];
        }
        return $carry;
    },
    []
);
var_dump($result);