<?php

class User extends BaseModel {

    public $id, $name, $password, $admin;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    //tarkastaa että onko käyttäjää tietokannassa
    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('
            SELECT * FROM Player 
            WHERE username = :name 
            AND password = :password 
            LIMIT 1');
        $query->execute(array(
            'name' => $name, 
            'password' => $password));
        $row = $query->fetch();
        if ($row) {
            return new User(array(
                'id' => $row['id'],
                'name' => $row['username'],
                'password' => $row['password'],
                'admin' => $row['adminstrator']
            ));
        } else {
            return null;
        }
    }
    //hakee yhden käyttäjän tietokannasta
    public static function find($id) {
        $query = DB::connection()->prepare('
            SELECT * 
            FROM Player 
            WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            return new User(array(
                'id' => $row['id'],
                'name' => $row['username'],
                'password' => $row['password'],
                'admin' => $row['adminstrator']
            ));
        } else {
            return null;
        }
    }
    //tarkastaa onko tietokannassa tiettyä nimeä
    public static function name_used($username) {
        $query = DB::connection()->prepare('
            SELECT * 
            FROM Player 
            WHERE username = :username');
        $query->execute(array('username' => $username));
        $row = $query->fetch();
        if ($row) {
            return true;
        }
        return false;
    }
    //hakee kaikki käyttäjät
    public static function all() {
        $query = DB::connection()->prepare('
            SELECT * 
            FROM Player 
            ORDER BY id ASC');
        $query->execute();
        $rows = $query->fetchAll();
        $users = array();

        foreach ($rows as $row) {
            $users[] = new User(array(
                'id' => $row['id'],
                'name' => $row['username'],
                'password' => $row['password'],
                'admin' => $row['adminstrator']
            ));
        }
        return $users;
    }
    //tallentaa käyttäjän tietokantaan
    public function save() {
        $query = DB::connection()->prepare('
            INSERT INTO Player (username, 
            password) VALUES (:username, :password) 
            RETURNING ID');
        $query->execute(array(
            'username' => $this->name, 
            'password' => $this->password));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    //päivittää käyttäjän nimen
    public static function update_name($username, $id) {
        $query = DB::connection()->prepare('
            UPDATE Player 
            SET username=:username 
            WHERE id = :id 
            RETURNING ID');
        $query->execute(array(
            'id' => $id, 
            'username' => $username));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    //päivittää käyttäjän salasanan
    public static function update_password($password, $id) {
        $query = DB::connection()->prepare('
            UPDATE Player 
            SET password=:password 
            WHERE id = :id 
            RETURNING ID');
        $query->execute(array(
            'id' => $id, 
            'password' => $password));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    //päivittää käyttäjän admin statuksen
    public static function update_admin($boolean, $id) {
        $query = DB::connection()->prepare('
            UPDATE Player
            SET adminstrator=:boolean
            WHERE id = :id 
            RETURNING ID');
        $query->execute(array(
            'boolean' => $boolean, 
            'id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }
    //poistaa käyttäjän tietokannasta
    public static function delete($id) {
        $query = DB::connection()->prepare('
            DELETE FROM PlaGa 
            WHERE PlaGa.Player_id = :id');
        $query->execute(array('id' => $id));
        $query = DB::connection()->prepare('
            DELETE FROM Player 
            WHERE id = :id 
            RETURNING id');
        $query->execute(array('id' => $id));
        $rows = $query->fetch();
        if ($rows) {
            return $rows['id'];
        }
        return null;
    }
    //validoi nimen
    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Name can\'t be empty';
        } elseif (strlen($this->name) < 5) {
            $errors[] = 'Name minimum lenght is 5 letters';
        }
        if (strlen($this->name) > 20) {
            $errors[] = 'Name maximum lenght is 20 letters';
        }
        return $errors;
    }
    //validoi salasanan
    public function validate_password() {
        $errors = array();
        if ($this->password == '' || $this->password == null) {
            $errors[] = 'Password can\'t be empty';
        } elseif (strlen($this->password) < 5) {
            $errors[] = 'Password minimum lenght is 5 letters';
        }
        if (strlen($this->password) > 20) {
            $errors[] = 'Password maximum lenght is 20 letters';
        }

        return $errors;
    }
    //validoi käyttäjän (nimi & salasana)
    public function validate_user() {
        $errors = array();
        $errors = array_merge($this->validate_name(), $this->validate_password());
        return $errors;
    }

}
