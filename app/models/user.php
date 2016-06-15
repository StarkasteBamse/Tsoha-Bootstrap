<?php

class User extends BaseModel {

    public $id, $name, $password, $admin;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimi = :name AND salasana = :password LIMIT 1');
        $query->execute(array('name' => $name, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            return new User(array(
                'id' => $row['id'],
                'name' => $row['nimi'],
                'password' => $row['salasana'],
                'admin' => $row['admini']
            ));
        } else {
            return null;
        }
    }
    
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            return new User(array(
                'id' => $row['id'],
                'name' => $row['nimi'],
                'password' => $row['salasana'],
                'admin' => $row['admini']
            ));
        } else {
            return null;
        }
    }
    
    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
        $query->execute();
        $rows = $query->fetchAll();
        $kayttajat = array();

        foreach ($rows as $row) {
            $kayttajat[] = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana'],
                'admini' => $row['admini']
            ));
        }
        return $kayttajat;
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (nimi, '
                . 'salasana, admini) VALUES (:nimi, :salasana, :admini) RETURNING ID');
        $query->execute(array('nimi' => $this->nimi, 'salasana' =>
            $this->salasana, 'admini' => $this->admini));
        $row = $query->fetch();
        $this->id = $row['id'];
    }
}
