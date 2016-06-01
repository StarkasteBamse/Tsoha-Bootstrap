<?php

// $routes->get('/etusivu/1', function() {
//     HelloWorldController::listaus();
// });


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
