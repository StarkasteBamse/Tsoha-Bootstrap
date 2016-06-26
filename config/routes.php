<?php

$routes->post('/game/new', function() {
    GameController::uusipeli();
});

$routes->get('/list', function() {
    GameController::index();
});

$routes->get('/game/new', function() {
    GameController::uusi();
});

$routes->get('/game/:id', function($id) {
    GameController::peli($id);
});

$routes->post('/game/:id/delete', function($id) {
    GameController::delete($id);
});

$routes->post('/game/:id/update', function($id) {
    GameController::update_status($id);
});

$routes->get('/login', function() {
    UserController::login();
});
$routes->post('/login', function() {
    UserController::handle_login();
});
$routes->post('/logout', function() {
    UserController::logout();
});
$routes->get('/admin', function() {
    UserController::users_index();
});
$routes->post('/admin/:id/update_name', function($id) {
    UserController::update_name($id);
});
$routes->post('/admin/:id/update_password', function($id) {
    UserController::update_password($id);
});
$routes->post('/admin/:id/update_admin', function($id) {
    UserController::update_admin($id);
});
$routes->post('/admin/:id/delete', function($id) {
    UserController::delete($id);
});



$routes->get('/new', function() {
    UserController::create_user();
});
$routes->post('/new', function() {
    UserController::new_user();
});



$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/', function() {
    HelloWorldController::homepage();
});

