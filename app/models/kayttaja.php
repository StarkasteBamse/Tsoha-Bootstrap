<?php

class Kayttaja extends BaseModel {

    public $id, $nimi, $salasana, $admini;

    public function __construct($attributes) {
        parent::__construct($attributes);
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

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana'],
                'admini' => $row['admini']
            ));
            return $kayttaja;
        }
        return null;
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
