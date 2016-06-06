<?php

class GameController extends BaseController{
    
    public static function uusi(){
        $kayttajat = Kayttaja::all();
        View::make('game/new.html', array('kayttajat' => $kayttajat));
    }
    
    public static function uusipeli(){
        $pelaajat = $_POST;
        $peli = new Peli(array());
        $id = $peli->save($pelaajat);
        Redirect::to('/game/' . $id);
    }
    
    public static function peli($id){
        $peli = Peli::find($id);
        View::make('game/play.html', array('peli' => $peli));
        
    }
}

