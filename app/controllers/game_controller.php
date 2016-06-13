<?php

class GameController extends BaseController {

    public static function uusi() {
        $kayttajat = Kayttaja::all();
        View::make('game/new.html', array('kayttajat' => $kayttajat));
    }

    public static function uusipeli() {
        $pelaajat = $_POST;
        $peli = new Peli(array());
        $id = $peli->save($pelaajat);
        Redirect::to('/game/' . $id);
    }

    public static function peli($id) {
        $peli = Peli::find($id);       
        View::make('game/play.html', array('peli' => $peli));
    }

    public static function index() {
        $pelit = Peli::all();
        View::make('list/index.html', array('pelit' => $pelit));
    }
    
    public static function delete($id) {
        $return_id = Peli::delete($id);
        Redirect::to('/list', array('message' => 'Game has been removed from database'));
    }
    
    public static function update_status($id) {
        $status = $_POST['status'];
        
        $errors = Peli::validate_status($status);
        
        if(count($errors) > 0) {        
            Redirect::to('/list', array('errors' => $errors, 'status' => $status
                    , 'id' => $id));
        } else {
            peli::update($status, $id);
            Redirect::to('/list', array('message' => 'You have just upgraded a '
                . 'game status, well done'));
        }
    }

}
