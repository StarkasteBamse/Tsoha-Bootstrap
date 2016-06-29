<?php

class Water extends BaseModel {
    
    public $id, $game_id, $area, $soldiers, $artillery, $tanks, 
            $fighters ,$bombers, $antiair, $destroyers, $submarines, 
            $transporters, $carriers, $battleships, $control;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all($game_id){
        $query = DB::connection()->prepare('
            SELECT water.id AS id, water.game_id as game_id, area, soldiers, 
            artillery, tanks, destroyers, submarines, fighters, bombers, antiair,
            country.nation as control, transporters, carriers, battleships
            FROM Water, Country 
            WHERE Country.id = Water.country_id AND
            Water.game_id = :game_id
            ORDER BY area');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }
    
    public static function find($id){
        $query = DB::connection()->prepare('
            SELECT water.id AS id, water.game_id as game_id, area, soldiers, 
            artillery, tanks, destroyers, submarines, fighters, bombers, antiair, 
            country.nation as control, transporters, carriers, battleships
            FROM Water, Country 
            WHERE Country.id = Water.country_id AND Water.game_id = :game_id AND
            Water.id = :id ');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }
    
    public function save($country_id){
        $query = DB::connection()->prepare('
            INSERT INTO Water (game_id, area, soldiers, artillery, tanks, 
            fighters , bombers, antiair, destroyers, submarines, transporters, 
            carriers, battleships, country_id) 
            VALUES (:game_id, :area, :soldiers, :artillery, :tanks, 
            :fighters , :bombers, :antiair, :destroyers, :submarines, 
            :transporters, :carriers, :battleships, :country_id) 
            RETURNING id');
        $query->execute(array('game_id' => $this->game_id, 'area' =>
            $this->area, 'soldiers' => 
            $this->soldiers, 'artillery' => $this->artillery, 'tanks' => 
            $this->tanks, 'fighters' => $this->fighters, 'bombers' => 
            $this->bombers, 'antiair' => $this->antiair, 'destroyers' => 
            $this->destroyers, 'submarines' => $this->submarines, 'transporters'
            => $this->transporters, 'carriers' => $this->carriers, 'battleships'
            => $this->battleships, 'country_id' => $country_id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return false;
    }
    
    public function update($id, $country_id){
        $query = DB::connection()->prepare('
            UPDATE Water 
            SET soldiers = :soldiers, artillery = :artillery, 
            tanks = :tanks, fighters = :fighters, bombers = :bombers, 
            antiair = :antiair, destroyers = :destroyers, 
            submarines = :submarines, transporters = :transporters, 
            carriers = :carriers, battleships = :battleships, 
            country_id = :country_id
            WHERE id = :id 
            RETURNING id');
        $query->execute(array('soldiers' => $this->soldiers, 'artillery' => 
            $this->artillery, 'tanks' => $this->tanks, 'fighters' => 
            $this->fighters, 'bombers' => $this->bombers, 'antiair' => 
            $this->antiair, 'destroyers' =>  $this->destroyers, 'submarines' => 
            $this->submarines, 'transporters' => $this->transporters, 'carriers'=> 
            $this->carriers, 'battleships' => $this->battleships, 'id' => $id,
            'country_id' => $country_id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    
     public function updateControl($country_id) {
        $query = DB::connection()->prepare('
                UPDATE Water 
                SET country_id = :country_id
                WHERE id = :id
                RETURNING id');
        $query->execute(array('country_id' => $country_id, 'id' => $this->id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    
    public static function delete($game_id){
        $query = DB::connection()->prepare('
                DELETE FROM Water
                WHERE game_id = :id
                RETURNING id');
        $query->execute(array('id' => $game_id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    
     private static function arraymaker($rows) {
        if (!$rows) {
            return null;
        }
        $waters = array();
        foreach ($rows as $row) {

            $waters[] = new Water(array(
                'id' => $row['id'],
                'game_id' => $row['game_id'],
                'area' => $row['area'],
                'soldiers' => $row['soldiers'],
                'artillery' => $row['artillery'],
                'tanks' => $row['tanks'],
                'fighters' => $row['fighters'],
                'bombers' => $row['bombers'],
                'antiair' => $row['antiair'],
                'destroyers' => $row['destroyers'],
                'submarines' => $row['submarines'],
                'transporters' => $row['transporters'],
                'carriers' => $row['carriers'],
                'control' => $row['control'],
                'battleships' => $row['battleships']));
        }
      
        return $waters;
    }
}
