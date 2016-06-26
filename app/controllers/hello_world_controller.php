<?php
class HelloWorldController extends BaseController {
     

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $pelit = Peli::validate_status('');
        $users = User::all();
        User::update_admin(1, 2);
        
        Kint::dump();
    }
    
    public static function homepage() {
        View::make('/homepage.html');
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
