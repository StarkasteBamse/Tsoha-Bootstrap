<?php

class Game extends BaseModel {

    public $id, $started, $players, $status;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    //hakee kaikki pelit
    public static function all() {
        $query = DB::connection()->prepare('
            SELECT username, player.id as player_id, game.id as id, 
            started, status 
            FROM Game 
            LEFT JOIN PlaGa 
            ON Game.id = PlaGa.game_id
            LEFT JOIN Player 
            ON PlaGa.player_id = Player.id 
            ORDER BY Game.id ASC');
        $query->execute();
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    //hakee tietyn pelaajan pelit
    public static function all_user($user) {
        //tekee view, jota käytettään itse haussa (ongelmana jos antaa tunnuksen
        // ->execute(array('id' => $id)), niin tulee virhe ilmoitus:
        // SQLSTATE[42P18]: Indeterminate datatype: 7 ERROR: 
        // could not determine data type of parameter $1.
        // Tämän takia id rumasti suoraan osana CREATE käskyä,
        // mutta id:llä ei pitäisi onnistua sql injektiota)
        $query = DB::connection()->prepare('
            CREATE VIEW view 
            AS SELECT DISTINCT game.id 
            FROM Game, Player, PlaGa 
            WHERE game.id = plaga.game_id 
            AND plaga.player_id = player.id 
            AND player.id = '. $user->id);
        $query->execute();
        $query = DB::connection()->prepare('
            SELECT view.id as id, started, username, player.id as player_id, status 
            FROM game 
            LEFT JOIN PlaGa 
            ON game.id = plaga.game_id 
            LEFT JOIN Player 
            ON player.id = plaga.player_id 
            RIGHT JOIN view 
            ON game.id = view.id 
            ORDER BY Game.id ASC');
        $query->execute();
        $rows = $query->fetchAll();
        //poistaa aikaisemmin tehdyn view:n
        $query = DB::connection()->prepare('DROP VIEW view');
        $query->execute();
        
        return self::arraymaker($rows);
    }

    //hakee yhden pelin
    public static function find($id) {
        $query = DB::connection()->prepare('
            SELECT id, started, status 
            FROM Game 
            WHERE Game.id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if (!$row) {
            return null;
        }
        $games = new Game(array(
            'id' => $row['id'],
            'started' => $row['started'],
            'players' => self::players($row['id']),
            'status' => $row['status']
        ));

        return $games;
    }
    //rakentaa hakutuloksista arrayn
    private static function arraymaker($rows) {
        if (!$rows) {
            return null;
        }
        $games = array();
        foreach ($rows as $row) {
            if (!array_key_exists($row['id'], $games)) {
                $games[$row['id']] = new Game(array(
                    'id' => $row['id'],
                    'started' => $row['started'],
                    'players' => array(new User(array(
                        'id' => $row['player_id'],
                        'name' => $row['username']
                    ))),
                    'status' => $row['status']
                ));
            } else {
                $games[$row['id']]->players[] = new User(array(
                        'id' => $row['player_id'],
                        'name' => $row['username']
                    ));
            }
        }

        return $games;
    }

    //hakee pelin pelaajat
    public static function players($id) {
        $query = DB::connection()->prepare('
                SELECT username, player.id as id
                FROM Game, PlaGa, Player 
                WHERE Game.id = :id
                AND Game.id = Plaga.game_id 
                AND PlaGa.player_id = Player.id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $players = array();

        foreach ($rows as $row) {
            $players[] = new User(array(
                'id' => $row['id'],
                'name' => $row['username']));
        }

        return $players;
    }

    //tulostaa pelaajat
    public function print_players() {
        $i = 1;
        $j = count($this->players);
        foreach ($this->players as $player) {
            echo $player->name;
            if ($i < $j) {
                echo ' and ';
            }
            $i++;
        }
    }
    
    //lähettää pelaajien id:t
    public function players_ids() {        
        $ids = array();
        foreach ($this->players as $player) {
            $ids[] = $player->id;
        }
        return $ids;
    }

    //luo uuden pelin tietokantaa ja tarvittavat liitostaulut Peli <-> Kayttaja
    public function save() {
        $query = DB::connection()->prepare('
                INSERT INTO Game (Started) 
                VALUES (NOW()) 
                RETURNING id');
        $query->execute();
        $row = $query->fetch();
        $id = $row['id'];
        foreach ($this->players as $player) {
            $query = DB::connection()->prepare('
                INSERT INTO PlaGa (Game_id, Player_id) 
                VALUES (:id, :player)');
            $query->execute(array(
                'id' => $id, 
                'player' => $player->id));
        }
        return $id;
    }

    //validoi statuksen
    public function validate_status() {
        $errors = array();
        if ($this->status == '' || $this->status == null) {
            $errors[] = 'Status can\'t be empty';
        } elseif (strlen($this->status) < 5) {
            $errors[] = 'Status minimum lenght is 5 letters';
        }
        if (strlen($this->status) > 20) {
            $errors[] = 'Status maximum lenght is 20 letters';
        }
        return $errors;
    }

    //poistaa pelin tietokannasta
    public function delete() {
        Water::delete($this->id);
        Land::delete($this->id);
        Country::delete($this->id);
        $query = DB::connection()->prepare('
                DELETE FROM PlaGa 
                WHERE PlaGa.Game_id = :id');
        $query->execute(array('id' => $this->id));
        $query = DB::connection()->prepare('
                DELETE FROM Game 
                WHERE Game.id = :id 
                RETURNING id');
        $query->execute(array('id' => $this->id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //vaihtaa pelin statuksen
    public function update() {
        $query = DB::connection()->prepare('
                UPDATE Game 
                SET status=:text 
                WHERE Game.id = :id 
                RETURNING id');
        $query->execute(array(
            'text' => $this->status, 
            'id' => $this->id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

}
