<?php

class AaRevised {

    public $game_id;

    public static function make_game($game_id) {
        //ussr ja sen maat
        $USSR = new Country(array(
            'game_id' => $game_id,
            'nation' => 'USSR',
            'income' => '24',
            'ipc' => '24'
        ));
        $id = $USSR->save();
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Russia',
            'nation' => 'USSR',
            'soldiers' => 4,
            'artillery' => 1,
            'tanks' => 2,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 8
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Karelia',
            'nation' => 'USSR',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Archangel',
            'nation' => 'USSR',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Caucasus',
            'nation' => 'USSR',
            'soldiers' => 3,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 4
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Kazakh',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Novosibirsk',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Evenki',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Yakut',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Buryatia',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Soviet Far E',
            'nation' => 'USSR',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 4,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 1,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);


        //germany ja sen alueet
        $GERMANY = new Country(array(
            'game_id' => $game_id,
            'nation' => 'GERMANY',
            'income' => '40',
            'ipc' => '40'
        ));
        $id = $GERMANY->save();
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'West Europe',
            'nation' => 'GERMANY',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 2,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 0,
            'ipc' => 6
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Algeria',
            'nation' => 'GERMANY',
            'soldiers' => 1,
            'artillery' => 1,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Lybia',
            'nation' => 'GERMANY',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Germany',
            'nation' => 'GERMANY',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 2,
            'fighters' => 1,
            'bombers' => 1,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 10
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'South Europe',
            'nation' => 'GERMANY',
            'soldiers' => 2,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 6
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Balkans',
            'nation' => 'GERMANY',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Norway',
            'nation' => 'GERMANY',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'East Europe',
            'nation' => 'GERMANY',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Belorussia',
            'nation' => 'GERMANY',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Ukraine',
            'nation' => 'GERMANY',
            'soldiers' => 3,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'West Russia',
            'nation' => 'GERMANY',
            'soldiers' => 3,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 5,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 2,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 8,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 1,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 14,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 1
        ));
        $water->save($id);

        //uk luominen ja sen alueet
        $UK = new Country(array(
            'game_id' => $game_id,
            'nation' => 'UK',
            'income' => '30',
            'ipc' => '30'
        ));
        $id = $UK->save();
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'UK',
            'nation' => 'UK',
            'soldiers' => 2,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 2,
            'bombers' => 1,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 8
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'East Canada',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'West Canade',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'West Africa',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Equatorial Africa',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Belgian Congo',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Rhodesia',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'South Africa',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Madagascar',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'East Africa',
            'nation' => 'UK',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Anglo-Egypt',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Trans-Jordan',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Persia',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'India',
            'nation' => 'UK',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Australia',
            'nation' => 'UK',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'New Zeland',
            'nation' => 'UK',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);


        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 1,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 2,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 1
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 13,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 1
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 15,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 35,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 1,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 40,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 1,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);


        //japan ja sen laattojen luominen
        $JAPAN = new Country(array(
            'game_id' => $game_id,
            'nation' => 'JAPAN',
            'income' => '30',
            'ipc' => '30'
        ));
        $id = $JAPAN->save();
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Japan',
            'nation' => 'JAPAN',
            'soldiers' => 4,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 1,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 8
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Manchuria',
            'nation' => 'JAPAN',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Kwangtung',
            'nation' => 'JAPAN',
            'soldiers' => 3,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'French Indo-China',
            'nation' => 'JAPAN',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Philippine',
            'nation' => 'JAPAN',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Okinawa',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Wake Island',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Caroline Islands',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Borneo',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 4
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'East Indies',
            'nation' => 'JAPAN',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 4
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'New Guinea',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Solomon Islands',
            'nation' => 'JAPAN',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);


        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 60,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 1
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 59,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 37,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 2,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 1,
            'battleships' => 1
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 50,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 1,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 45,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 1,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);


        //usa ja sen alueiden alustaminen
        $USA = new Country(array(
            'game_id' => $game_id,
            'nation' => 'USA',
            'income' => '42',
            'ipc' => '42'
        ));
        $id = $USA->save();

        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Eastern US',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 1,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 12
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Central US',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 6
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Western US',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 1,
            'factory' => 1,
            'ipc' => 10
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Mexico',
            'nation' => 'USA',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Alaska',
            'nation' => 'USA',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Panama',
            'nation' => 'USA',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'West Indies',
            'nation' => 'USA',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Brazil',
            'nation' => 'USA',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Hawaiian Islands',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Singkiang',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'China',
            'nation' => 'USA',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Midway Island',
            'nation' => 'USA',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Greenland',
            'nation' => 'USA',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);


        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 10,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 0,
            'transporters' => 2,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 20,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 1,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 55,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 1,
            'carriers' => 0,
            'battleships' => 1
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 52,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 1,
            'transporters' => 0,
            'carriers' => 1,
            'battleships' => 0
        ));
        $water->save($id);

        //neutraalit alueet ja vedet
        $NEUTRAL = new Country(array(
            'game_id' => $game_id,
            'nation' => 'NEUTRAL',
            'income' => '-1',
            'ipc' => '-1'
        ));
        $id = $NEUTRAL->save();
        
        
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Eire',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Sweden',
            'nation' => 'NEUTRAL',
            'soldiers' => 3,
            'artillery' => 1,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Switzerland',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Spain',
            'nation' => 'NEUTRAL',
            'soldiers' => 4,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 4
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Turkey',
            'nation' => 'NEUTRAL',
            'soldiers' => 4,
            'artillery' => 1,
            'tanks' => 1,
            'fighters' => 1,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 3
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Venezuela',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Peru',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Argentina',
            'nation' => 'NEUTRAL',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Rio de Oro',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Saudi Arabia',
            'nation' => 'NEUTRAL',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 2
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Afganistan',
            'nation' => 'NEUTRAL',
            'soldiers' => 1,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Mongolia',
            'nation' => 'NEUTRAL',
            'soldiers' => 2,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 1
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Angola',
            'nation' => 'NEUTRAL',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        $land = new Land(array(
            'game_id' => $game_id,
            'area' => 'Mozambique',
            'nation' => 'NEUTRAL',
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'factory' => 0,
            'ipc' => 0
        ));
        $land->save($id);
        
        
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 3,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 6,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 7,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 9,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 11,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 12,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 16,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 17,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 18,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 19,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 21,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 22,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 23,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 24,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 25,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 26,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 27,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 28,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 29,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 30,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 31,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 32,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 33,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 34,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 36,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 38,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 39,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 41,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 42,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 44,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);$water = new Water(array(
            'game_id' => $game_id,
            'area' => 46,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 47,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 48,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 49,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 51,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 53,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 54,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 56,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 57,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 58,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 61,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 62,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 63,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 64,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        $water->save($id);
        $water = new Water(array(
            'game_id' => $game_id,
            'area' => 45,
            'soldiers' => 0,
            'artillery' => 0,
            'tanks' => 0,
            'fighters' => 0,
            'bombers' => 0,
            'antiair' => 0,
            'destroyers' => 0,
            'submarines' => 0,
            'transporters' => 0,
            'carriers' => 0,
            'battleships' => 0
        ));
        
        
        
    }

}
