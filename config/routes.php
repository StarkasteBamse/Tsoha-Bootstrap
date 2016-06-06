<?php

$routes->post('/game/new', function() {
    GameController::uusipeli();
});

$routes->get('/list', function() {
    ListController::index();
});

$routes->get('/game/new', function() {
    GameController::uusi();
});

$routes->get('/game/:id', function($id) {
    GameController::peli($id);
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
