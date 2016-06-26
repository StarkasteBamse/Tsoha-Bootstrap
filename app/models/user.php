<?php

class User extends BaseModel {

    public $id, $name, $password, $admin;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE '
                . 'nimi = :name AND salasana = :password LIMIT 1');
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

    public static function name_used($username) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimi = :name');
        $query->execute(array('name' => $username));
        $row = $query->fetch();
        if ($row) {
            return true;
        }
        return false;
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja ORDER BY id ASC');
        $query->execute();
        $rows = $query->fetchAll();
        $users = array();

        foreach ($rows as $row) {
            $users[] = new User(array(
                'id' => $row['id'],
                'name' => $row['nimi'],
                'password' => $row['salasana'],
                'admin' => $row['admini']
            ));
        }
        return $users;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (nimi, '
                . 'salasana) VALUES (:nimi, :salasana) RETURNING ID');
        $query->execute(array('nimi' => $this->name, 'salasana' =>
            $this->password));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    public static function update_name($name, $id) {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET nimi=:nimi '
                . 'WHERE Kayttaja.id = :id RETURNING ID');
        $query->execute(array('id' => $id, 'nimi' => $name));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    public static function update_password($password, $id) {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET '
                . 'salasana=:salasana WHERE Kayttaja.id = :id RETURNING ID');
        $query->execute(array('id' => $id, 'salasana' => $password));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    public static function update_admin($boolean, $id) {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET admini=:boolean'
                . ' WHERE Kayttaja.id = :id RETURNING ID');
        $query->execute(array('boolean' => $boolean, 'id' => $id));
        $row = $query->fetch();
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    public static function delete($id) {
        $query = DB::connection()->prepare('DELETE FROM KaPe WHERE KaPe.Kayttaja_id = :id');
        $query->execute(array('id' => $id));
        $query = DB::connection()->prepare('DELETE FROM Kayttaja WHERE id = :id RETURNING id');
        $query->execute(array('id' => $id));
        $rows = $query->fetch();
        if ($rows) {
            return $rows['id'];
        }
        return null;
    }
    
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
    
    public function validate_user() {
        $errors = array();
        $errors = array_merge($this->validate_name(), $this->validate_password());
        return $errors;
    }

}
