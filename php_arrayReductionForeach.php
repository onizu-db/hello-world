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

foreach ($mainArray as $set) {
    foreach ($set as $key => $val) {
        if ($key === 'countryID') {
            $countryID = $val;
            $nestedArray[$countryID] = [];
        }
    }
}

foreach ($nestedArray as $countryID => $countryArray) {
    foreach ($mainArray as $set) {
        foreach ($set as $key => $val) {
            if ($key === 'stateID' && $set['countryID'] === $countryID) {
                $stateID = $val;
                $nestedArray[$countryID][$stateID] = [];
                foreach ($set as $key => $val) {
                    if (substr($key, 0, 3) === 'sta' && !key_exists($key, $nestedArray[$countryID][$stateID])) {
                        $nestedArray[$countryID][$stateID][$key] = $val;
                    }
                }
            }
        }
    }
}

foreach ($nestedArray as $countryID => $countryArray) {
    foreach ($countryArray as $stateID => $stateArray) {
        foreach ($mainArray as $set) {
            foreach ($set as $key => $val) {
                if ($key === 'cityID' && $set['countryID'] === $countryID && $set['stateID'] === $stateID) {
                    $cityID = $val;
                    $nestedArray[$countryID][$stateID][$cityID] = [];
                    foreach ($set as $key => $val) {
                        if (substr($key, 0, 3) === 'cit' && !key_exists($key, $nestedArray[$countryID][$stateID][$cityID])) {
                            $nestedArray[$countryID][$stateID][$cityID][$key] = $val;
                        }
                    }
                }
            }
        }
    }   
}

var_dump($nestedArray);