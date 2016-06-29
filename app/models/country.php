<?php

class Country extends BaseModel {

    public $id, $game_id, $nation, $income, $ipc;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    //hakee kaikki maat tietyyn peliin
    public static function all($game_id) {
        $query = DB::connection()->prepare('
            SELECT * 
            FROM Country 
            WHERE game_id = :game_id
            ORDER BY Country.id ASC');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee yhden maan
    public static function find($id) {
        $query = DB::connection()->prepare('
            SELECT * 
            FROM Country 
            WHERE id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }
    
    //hakee yhden maan id:n nimellä ja game_id:llä
    public static function find_id($nation, $game_id) {
        $query = DB::connection()->prepare('
            SELECT *
            FROM Country 
            WHERE game_id = :game_id AND nation = :nation');
        $query->execute(array('game_id' => $game_id, 'nation' => $nation));
        $row = $query->fetch();

        if($row) {
            return $row['id'];
        }
        return null;
    }

    //tallentaa maan tietokantaan
    public function save() {
        $query = DB::connection()->prepare('
            INSERT INTO Country (game_id, nation, income, ipc) 
            VALUES (:game_id, :nation, :income, :ipc) 
            RETURNING id');
        $query->execute(array(
            'game_id' => $this->game_id,
            'nation' => $this->nation,
            'income' => $this->income,
            'ipc' => $this->ipc));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return false;
    }

    //muuttaa maan income:n ja ipc:n
    public function update($id) {
        $query = DB::connection()->prepare('
            UPDATE Country 
            SET income = :income, ipc = :ipc
            WHERE id = :id 
            RETURNING id');
        $query->execute(array(
            'income' => $this->income,
            'ipc' => $this->ipc,
            'id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    
    public function update_income() {
        $query = DB::connection()->prepare('
            SELECT SUM(land.ipc) AS ipc_income
            FROM Land, Country
            WHERE Land.country_id = Country.id AND Country.id = :id');
        $query->execute(array('id' => $this->id));
        $row = $query->fetch();
        if ($row) {
            $this->income = $row['ipc_income'];
        }
    }

    //poistaa maan
    public static function delete($game_id) {
        $query = DB::connection()->prepare('
            DELETE FROM Country 
            WHERE game_id = :id 
            RETURNING id');
        $query->execute(array('id' => $game_id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //rakentaa arrayn hakutuloksista
    private static function arraymaker($rows) {
        if (!$rows) {
            return null;
        }
        $countries = array();
        foreach ($rows as $row) {

            $countries[] = new Country(array(
                'id' => $row['id'],
                'game_id' => $row['game_id'],
                'nation' => $row['nation'],
                'income' => $row['income'],
                'ipc' => $row['ipc']));
        }

        return $countries;
    }

}
