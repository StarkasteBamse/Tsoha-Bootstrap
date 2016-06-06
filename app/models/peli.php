<?php

class Peli extends BaseModel {

    public $id, $aloitettu, $pelaajat;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    //hakee kaikki pelit
    public static function all() {
        $query = DB::connection()->prepare('SELECT nimi as pelaaja, peli.id as id,'
                . ' aloitettu FROM Peli LEFT JOIN KaPe ON Peli.id = KaPe.peli_id'
                . ' LEFT JOIN Kayttaja ON KaPe.kayttaja_id = Kayttaja.id');
        $query->execute();
        $rows = $query->fetchAll();
        $pelit = array();

        foreach ($rows as $row) {
            if (!array_key_exists($row['id'], $pelit)) {
                $pelit[$row['id']] = new Peli(array(
                    'id' => $row['id'],
                    'aloitettu' => $row['aloitettu'],
                    'pelaajat' => array($row['pelaaja'])
                ));
            } else {
                $pelit[$row['id']]->pelaajat[] = $row['pelaaja'];
            }
        }
        return $pelit;
    }

    //hakee yhden pelin
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Peli WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $peli = new Peli(array(
                'id' => $row['id'],
                'aloitettu' => $row['aloitettu'],
                'pelaajat' => self::kayttajat($row['id'])
            ));
            return $peli;
        }
        return null;
    }

    //hakee pelin pelaajat
    public static function kayttajat($id) {
        $query = DB::connection()->prepare('SELECT Nimi FROM Peli,'
                . ' KaPe, Kayttaja WHERE Peli.id = :id AND Peli.id'
                . ' = Kape.peli_id AND Kape.Kayttaja_id = Kayttaja.id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $pelaajat = array();

        foreach ($rows as $row) {
            array_push($pelaajat, $row['nimi']);
        }

        return $pelaajat;
    }

    //tulostaa pelaajat
    public function ketka() {
        $i = 1;
        $j = count($this->pelaajat);
        foreach ($this->pelaajat as $value) {
            echo $value;
            if ($i < $j) {
                echo ' and ';
            }
            $i++;
        }
    }
    //luo uuden pelin tietokantaa ja tarvittavat liitostaulut Peli <-> Kayttaja
    public function save($pelaajat) {
        $query = DB::connection()->prepare('INSERT INTO Peli (aloitettu) VALUES '
                . '(NOW()) RETURNING id');
        $query->execute();
        $row = $query->fetch();
        $id = $row['id'];
        foreach ($pelaajat as $pelaaja) {
            $query = DB::connection()->prepare('INSERT INTO KaPe (Peli_id, '
                    . 'Kayttaja_id) values (:id, :pelaaja)');
            $query->execute(array('id' => $id, 'pelaaja' => $pelaaja));
        }
        return $id;
    }

}
