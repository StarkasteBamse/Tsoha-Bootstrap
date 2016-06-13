<?php
class HelloWorldController extends BaseController {
     

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $pelit = Peli::validate_status('');
        
        
       
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
