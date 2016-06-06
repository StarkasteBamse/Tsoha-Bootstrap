<?php
class HelloWorldController extends BaseController {
     

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $pelit = Peli::all();
        $peli = Peli::find(1);
        $k = Peli::kayttajat(1);
        
        Kint::dump($k);
        Kint::dump($peli);
        Kint::dump($pelit);
    }
    
    public static function etusivu() {
        View::make('/suunnitelmat/etusivu.html');
    }
    
    public static function listaus() {
        View::make('/suunnitelmat/listaus.html');
            
    }
    
    public static function pelaa() {
        View::make('/suunnitelmat/pelaa.html');
    }


    public static function login() {
        View::make('/suunnitelmat/login.html');
    }
}
