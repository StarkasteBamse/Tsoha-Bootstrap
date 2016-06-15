<?php

class UserController extends BaseController {

    public static function login() {
        View::make('user/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {
            View::make('user/login.html', array('error' => 'Didn\'t find username or password', 'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/list', array('message' => 'Welcome back to the fight ' . $user->name . '!'));
        }
    }

    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'You have just logged out. Have a nice day!'));
    }

}
