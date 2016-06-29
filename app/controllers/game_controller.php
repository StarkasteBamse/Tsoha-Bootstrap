<?php

class GameController extends BaseController {

    public static function new_game() {
        self::check_logged_in();
        $users = User::all();
        View::make('game/new.html', array('users' => $users));
    }

    public static function make_game() {
        self::check_logged_in();
        $players = array();
        foreach ($_POST as $id) {
            $players[] = new User(array('id' => $id));
        }
        $game = new Game(array('players' => $players));
        $id = $game->save();
        AaRevised::make_game($id);
        Redirect::to('/game/' . $id);
    }

    public static function play_game($id) {
        self::check_logged_in();
        $game = Game::find($id);
        if (self::check_admin() ||
                in_array(self::get_user_logged_in()->id, $game->players_ids())) {
            $countries = Country::all($id);
            $lands = Land::all($id);
            $waters = Water::all($id);
            View::make('game/play.html', array(
                'game' => $game,
                'countries' => $countries,
                'lands' => $lands,
                'waters' => $waters));
        } else {
            Redirect::to('/list', array(
                'message' => 'Please don\'t try to play other games that isn\'t 
                yours, thank you.'));
        }
    }

    public static function index() {
        self::check_logged_in();
        if (self::check_admin()) {
            View::make('list/index.html', array('games' => Game::all()));
        } else {
            View::make('list/index.html', array(
                'games' => Game::all_user(self::get_user_logged_in())));
        }
    }

    public static function delete($id) {
        self::check_logged_in();
        $game = Game::find($id);
        if (self::check_admin() ||
                in_array(self::get_user_logged_in()->id, $game->players_ids())) {
            if ($game->delete()) {
                Redirect::to('/list', array(
                    'message' => 'Game has been removed from database'));
            } else {
                Redirect::to('/list', array(
                    'error' => 'Some thing is not right, maybe chtulhu is in the database...'));
            }
        } else {
            Redirect::to('/list', array(
                'message' => 'Please don\'t try to REMOVE other games that isn\'t 
                yours, thank you.'));
        }
    }

    public static function update_status($id) {
        self::check_logged_in();
        $status = $_POST['status'];
        $game = Game::find($id);

        if (self::check_admin() ||
                in_array(self::get_user_logged_in()->id, $game->players_ids())) {
            $game = new Game(Array(
                'id' => $id,
                'status' => $status
            ));
            $errors = $game->validate_status();
            if (count($errors) > 0) {
                Redirect::to('/list', array(
                    'errors' => $errors,
                    'status' => $status,
                    'id' => $id));
            } else {
                $game->update();
                Redirect::to('/list', array(
                    'message' => 'You have just upgraded a game status, well done'));
            }
        } else {
            Redirect::to('/list', array(
                'message' => 'Please don\'t mess with other games that isn\'t 
                yours, thank you.'));
        }
    }

    public static function ipc_update($id) {
        self::check_logged_in();
        $params = $_POST;
        $ipc = $params['ipc'];
        $buys = $params['buys'];
        $game_id = $params['game_id'];
        $country = new Country(array('id' => $id));
        $country->update_income();
        $country->ipc = $ipc - $buys + $country->income;
        $country->update($id);
        Redirect::to('/game/' . $game_id, (array('message' => 'Troops deployed!')));
    }

    public static function land_update($id) {
        self::check_logged_in();
        $params = $_POST;
        $country_id = Country::find_id($params['control'], $params['game_id']);

        $land = new Land(Array(
            'soldiers' => $params['soldiers'],
            'artillery' => $params['artillery'],
            'tanks' => $params['tanks'],
            'fighters' => $params['fighters'],
            'bombers' => $params['bombers'],
            'antiair' => $params['antiair'],
            'factory' => $params['factory'],
            'control' => $params['control'],
        ));
        if ($land->update($id, $country_id)) {
            Redirect::to('/game/' . $params['game_id'], (array('message' => 'Tile Status Changed!')));
        } else {
            Redirect::to('/game/' . $params['game_id'], (array('error' => 'Sum Thing Fucked!')));
        }
    }

    public static function water_update($id) {
        self::check_logged_in();
        $params = $_POST;
        $country_id = Country::find_id($params['control'], $params['game_id']);
        $water = new Water(Array(
            'soldiers' => $params['soldiers'],
            'artillery' => $params['artillery'],
            'tanks' => $params['tanks'],
            'fighters' => $params['fighters'],
            'bombers' => $params['bombers'],
            'antiair' => $params['antiair'],
            'submarines' => $params['submarines'],
            'destroyers' => $params['destroyers'],
            'battleships' => $params['battleships'],
            'carriers' => $params['carriers'],
            'transporters' => $params['transporters']
        ));
        if ($water->update($id, $country_id)) {
            Redirect::to('/game/' . $params['game_id'], (array('message' => 'Tile Status Changed!')));
        } else {
            Redirect::to('/game/' . $params['game_id'], (array('error' => 'Sum Thing Fucked!')));
        }
    }

}
