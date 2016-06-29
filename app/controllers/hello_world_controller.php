<?php
class HelloWorldController extends BaseController {
     

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        
//        $users = User::all();
//        $games = Game::all();
//        $game = Game::find(1);
//        $c = new Country(array());
//        $c = Country::find(1);
//        $l = new Land(array('soldiers'=> 99, 'artillery' => 99, 'tanks' => 99, 
//            'fighters' => 99, 'bombers' => 99, 'antiair' => 99, 'factory' => 99,
//            'game_id' => 2, 'area' => 'bugalu3', 'ipc' => 999, 'country' => 'turskland'));
//        
//        
//        Kint::dump(Land::all(1));
//        Kint::dump(Land::find(6));
//        Kint::dump(Land::germany(2));
//        Kint::dump(Land::ussr(2));
//        Kint::dump(Land::uk(2));
//        Kint::dump(Land::usa(2));
//        Kint::dump(Land::japan(2));
        
    }
    
    
}
