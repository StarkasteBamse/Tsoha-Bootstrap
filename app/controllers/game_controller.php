<?php

class GameController extends BaseController {

    public static function uusi() {
        self::check_logged_in();
        $users = User::all();
        View::make('game/new.html', array('users' => $users));
    }

    public static function uusipeli() {
        self::check_logged_in();
        $pelaajat = $_POST;
        $peli = new Game(array());
        $id = $peli->save($pelaajat);
        Redirect::to('/game/' . $id);
    }

    public static function peli($id) {
        self::check_logged_in();
        $game = Game::find($id);
        if (self::check_admin() || in_array(self::get_user_logged_in()->name, $game->players)) {
            View::make('game/play.html', array('game' => $game));
        } else {
            Redirect::to('/list', array('message' => 'Please don\'t try to '
                . 'play other games that isn\'t yours, thank you.'));
        }
    }

    public static function index() {
        self::check_logged_in();
        if (self::check_admin()) {
            View::make('list/index.html', array('games' => Game::all()));
        } else {
            View::make('list/index.html', array('games' => Game::all_user(
                        self::get_user_logged_in())));
        }
    }

    public static function delete($id) {
        self::check_logged_in();
        $return_id = Game::delete($id);
        Redirect::to('/list', array('message' => 'Game has been removed from database'));
    }

    public static function update_status($id) {
        $status = $_POST['status'];

        $errors = Game::validate_status($status);

        if (count($errors) > 0) {
            Redirect::to('/list', array('errors' => $errors, 'status' => $status
                , 'id' => $id));
        } else {
            Game::update($status, $id);
            Redirect::to('/list', array('message' => 'You have just upgraded a '
                . 'game status, well done'));
        }
    }

}
