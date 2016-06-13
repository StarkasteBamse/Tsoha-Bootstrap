<?php

class Peli extends BaseModel {

    public $id, $aloitettu, $pelaajat, $status;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    //hakee kaikki pelit
    public static function all() {
        $query = DB::connection()->prepare('SELECT nimi as pelaaja, peli.id as id,'
                . ' aloitettu, status FROM Peli LEFT JOIN KaPe ON Peli.id = KaPe.peli_id'
                . ' LEFT JOIN Kayttaja ON KaPe.kayttaja_id = Kayttaja.id');
        $query->execute();
        $rows = $query->fetchAll();

        return self::arraymaker($rows);
    }

    public static function all_user($user) {
        $query = DB::connection()->prepare('SELECT nimi as pelaaja, peli.id as id,'
                . ' aloitettu, status FROM Peli LEFT JOIN KaPe ON Peli.id = KaPe.peli_id'
                . ' LEFT JOIN Kayttaja ON KaPe.kayttaja_id = Kayttaja.id WHERE Kayttaja.id = :user');
        $query->execute(array('user' => $user->id));
        $rows = $query->fetchAll();
        
        if (!$rows) {
            return null;
        }
        $pelit = array();
        foreach ($rows as $row) {
            $pelit[$row['id']] = new Peli(array(
                'id' => $row['id'],
                'aloitettu' => $row['aloitettu'],
                'pelaajat' => self::players($row['id']),
                'status' => $row['status']
            ));
        }

        return $pelit;
    }

    //hakee yhden pelin
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT nimi as pelaaja, peli.id as id,'
                . ' aloitettu, status FROM Peli LEFT JOIN KaPe ON Peli.id = KaPe.peli_id'
                . ' LEFT JOIN Kayttaja ON KaPe.kayttaja_id = Kayttaja.id'
                . ' WHERE peli.id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();


        return self::arraymaker($row);
    }

    public static function arraymaker($rows) {
        if (!$rows) {
            return null;
        }
        $pelit = array();
        foreach ($rows as $row) {
            if (!array_key_exists($row['id'], $pelit)) {
                $pelit[$row['id']] = new Peli(array(
                    'id' => $row['id'],
                    'aloitettu' => $row['aloitettu'],
                    'pelaajat' => array($row['pelaaja']),
                    'status' => $row['status']
                ));
            } else {
                $pelit[$row['id']]->pelaajat[] = $row['pelaaja'];
            }
        }

        return $pelit;
    }

    //hakee pelin pelaajat
    public static function players($id) {
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
    public function print_players() {
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

    //validoi statuksen
    public function validate_status($status) {
        $errors = array();
        if ($status == '' || $status == null) {
            $errors[] = 'Status can\'t be empty';
        }
        if (strlen($status) < 5) {
            $errors[] = 'Status has to be longer than 5 letters';
        }

        return $errors;
    }

    //poistaa pelin tietokannasta
    public function delete($id) {
        $query = DB::connection()->prepare('DELETE FROM KaPe WHERE KaPe.Peli_id = :id');
        $query->execute(array('id' => $id));
        $query = DB::connection()->prepare('DELETE FROM Peli WHERE Peli.id = :id RETURNING id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    //vaihtaa pelin statuksen
    public function update($text, $id) {
        $query = DB::connection()->prepare('UPDATE Peli SET status=:text WHERE '
                . 'Peli.id = :id RETURNING id');
        $query->execute(array('text' => $text, 'id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

}
