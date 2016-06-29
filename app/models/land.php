<?php

class Land extends BaseModel {

    public $id, $game_id, $area, $nation, $soldiers, $artillery, $tanks,
            $fighters, $bombers, $antiair, $factory, $ipc, $control, $country_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    //hakee kaikki maaruudut liittyen tiettyyn peliin
    public static function all($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id
            ORDER BY land.area');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();
        
        if (!$rows) {
            return null;
        }
        $lands = array('USSR' => array(), 
            'GERMANY' => array(), 
            'UK' => array(),
            'JAPAN' => array(),
            'USA' => array(),
            'NEUTRAL' => array());
        foreach ($rows as $row) {

            array_push($lands[$row['nation']], new Land(array(
                'id' => $row['id'],
                'game_id' => $row['game_id'],
                'area' => $row['area'],
                'nation' => $row['nation'],
                'soldiers' => $row['soldiers'],
                'artillery' => $row['artillery'],
                'tanks' => $row['tanks'],
                'fighters' => $row['fighters'],
                'bombers' => $row['bombers'],
                'antiair' => $row['antiair'],
                'factory' => $row['factory'],
                'control' => $row['control'],
                'ipc' => $row['ipc'])));
        }

        return $lands;        
    }

    //hakee yhden ruudun
    public static function find($id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan ussr:n ruudut
    public static function ussr($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'USSR\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan germany:n ruudut
    public static function germany($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'GERMANY\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan uk:n ruudut
    public static function uk($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'UK\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan japan:in ruudut
    public static function japan($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'JAPAN\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan usa:n ruudut
    Public static function usa($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'USA\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelin kaikki alkujaan neutral:in ruudut
    public static function neutral($game_id) {
        $query = DB::connection()->prepare('
            SELECT land.id AS id, land.game_id as game_id, area, land.nation AS 
            nation, soldiers, artillery, tanks, fighters, bombers, antiair, 
            factory, land.ipc as ipc, country.nation as control 
            FROM Land, Country 
            WHERE Country.id = Land.country_id AND Land.game_id = :game_id 
            AND land.nation = \'NEUTRAL\'');
        $query->execute(array('game_id' => $game_id));
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //tallentaa ruudun tietokantaan
    public function save($country_id) {
        $query = DB::connection()->prepare('
            INSERT INTO Land (game_id, area,  nation, soldiers, artillery, 
            tanks, fighters , bombers, antiair, factory, ipc, country_id) 
            VALUES (:game_id, :area, :nation, :soldiers, :artillery, :tanks, 
            :fighters , :bombers, :antiair, :factory, :ipc, :country_id) 
            RETURNING id');
        $query->execute(array(
            'game_id' => $this->game_id, 
            'area' => $this->area, 
            'nation' => $this->nation, 
            'soldiers' => $this->soldiers, 
            'artillery' => $this->artillery, 
            'tanks' => $this->tanks, 
            'fighters' => $this->fighters, 
            'bombers' => $this->bombers, 
            'antiair' => $this->antiair, 
            'factory' => $this->factory, 
            'ipc' => $this->ipc, 
            'country_id' => $country_id));
        $row = $query->fetch();

        if ($row) {
            return $row['id'];
        }
        return false;
    }

    //päivittää ruudun statukset
    public function update($id, $country_id) {
        $query = DB::connection()->prepare('
            UPDATE Land 
            SET soldiers = :soldiers,  artillery = :artillery, tanks = :tanks, 
            fighters = :fighters, bombers = :bombers, antiair = :antiair, 
            factory = :factory, country_id = :country_id
            WHERE id = :id
            RETURNING id');
        $query->execute(array(
            'soldiers' => $this->soldiers, 
            'artillery' => $this->artillery, 
            'tanks' => $this->tanks, 
            'fighters' => $this->fighters, 
            'bombers' => $this->bombers, 
            'antiair' => $this->antiair, 
            'factory' => $this->factory,             
            'country_id' => $country_id,
            'id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //päivittää ruudun haltijan (vieras avain)
    public function updateControl($country_id) {
        $query = DB::connection()->prepare('
                UPDATE Land 
                SET country_id = :country_id 
                WHERE id = :id 
                RETURNING id');
        $query->execute(array(
            'country_id' => $country_id, 
            'id' => $this->id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //poistaa ruudun
    public static function delete($game_id) {
        $query = DB::connection()->prepare('
                DELETE FROM Land 
                WHERE game_id = :id 
                RETURNING id');
        $query->execute(array('id' => $game_id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //rakentaa hakutuloksista arrayn
    private static function arraymaker($rows) {
        if (!$rows) {
            return null;
        }
        $lands = array();
        foreach ($rows as $row) {

            $lands[] = new Land(array(
                'id' => $row['id'],
                'game_id' => $row['game_id'],
                'area' => $row['area'],
                'nation' => $row['nation'],
                'soldiers' => $row['soldiers'],
                'artillery' => $row['artillery'],
                'tanks' => $row['tanks'],
                'fighters' => $row['fighters'],
                'bombers' => $row['bombers'],
                'antiair' => $row['antiair'],
                'factory' => $row['factory'],
                'control' => $row['control'],
                'ipc' => $row['ipc']));
        }

        return $lands;
    }

}
