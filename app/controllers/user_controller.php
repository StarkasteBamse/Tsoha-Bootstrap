<?php

class UserController extends BaseController {

    public static function login() {
        View::make('user/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {
            View::make('user/login.html', array('error' => 'Didn\'t find username or password',
                'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/list', array('message' => 'Welcome back to the fight '
                . $user->name . '!'));
        }
    }

    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/', array('message' => 'You have just logged out. Have a nice day!'));
    }

    public static function create_user() {
        View::make('user/create_user.html');
    }

    public static function new_user() {
        $params = $_POST;
        $user = new User(array(
            'name' => $params['username'],
            'password' => $params['password']));
        $errors = $user->validate_user();

        if ($params['password'] != $params['password2']) {
            $errors[] = 'Passwords didn\'t match';
        }
        if (User::name_used($user->name)) {
            $errors[] = 'Username has been taken already, try something else';
        }
        if (count($errors) > 0) {
            Redirect::to('/new', array('errors' => $errors, 'username' => $params['username']));
        } else {
            $id = $user->save();
            $_SESSION['user'] = $id;
            Redirect::to('/list', array('message' => 'Welcome to the A&A, now you can'
                . ' join the fun ' . $user->name . '!'));
        }
    }

    public static function users_index() {
        self::check_logged_in();
        if (self::check_admin()) {
            View::make('user/users.html', array('users' => User::all()));
        } else {
            Redirect::to('/list', array('errors' => array('Sorry, you ain\'t no admin')));
        }
    }

    public static function delete($id) {
        self::check_logged_in();
        if (!self::check_admin()) {
            Redirect::to('/list', array('errors' => array('Sorry, you ain\'t no admin')));
        } else {
            User::delete($id);
            Redirect::to('/admin', array('message' => 'User has been removed from'
                . ' this plane of existence'));
        }
    }

    public static function update_name($id) {

        self::check_logged_in();
        if (!self::check_admin()) {
            Redirect::to('/list', array('errors' => array('Sorry, you ain\'t no admin')));
        }
        $username = $_POST['username'];
        $user = new User(array('name' => $username));
        $errors = $user->validate_name();
        if (count($errors) > 0) {
            Redirect::to('/admin', array('errors' => $errors));
        } else {
            User::update_name($username, $id);
            Redirect::to('/admin', array('message' => 'Username has been changed'));
        }
    }

    public static function update_password($id) {
        self::check_logged_in();
        if (!self::check_admin()) {
            Redirect::to('/list', array('errors' => array('Sorry, you ain\'t no admin')));
        }
        $password = $_POST['password'];
        $user = new User(array('password' => $password));
        $errors = $user->validate_password();
        if (count($errors) > 0) {
            Redirect::to('/admin', array('errors' => $errors));
        } else {
            User::update_password($password, $id);
            Redirect::to('/admin', array('message' => 'Password has been changed'));
        }
    }

    public static function update_admin($id) {
        self::check_logged_in();
        if (self::check_admin()) {
            if (isset($_POST["admin"])) {
                User::update_admin(1, $id);
            } else {
                User::update_admin(0, $id);
            }
            Redirect::to('/admin', array('message' => 'Admin status has been changed'));
        } else {
            Redirect::to('/list', array('errors' => array('Sorry, you ain\'t no admin')));
        }
    }

}
