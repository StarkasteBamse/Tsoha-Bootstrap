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

$routes->get('/login', function(){
  UserController::login();
});
$routes->post('/login', function(){
  UserController::handle_login();
});



$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});



$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/', function() {
    HelloWorldController::etusivu();
});

$routes->get('/listaus', function() {
    HelloWorldController::listaus();
});

$routes->get('/listaus/1', function() {
    HelloWorldController::pelaa();
});
