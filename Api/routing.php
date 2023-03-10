<?php

require('services/DB.php');
use services\DB;
use Api\Api;
require('controllers/MenuController.php');
require('controllers/ReservationController.php');
require('Api.php');

header('Access-Control-Allow-Origin: *');

$current_link = $_SERVER['REQUEST_URI'];


//url for menu item via id
$urls = [
    '/CougarCafe/Api/MenuFavs' => ['MenuController@getFavorites'],
    '/CougarCafe/Api/Menu/Appetizers' => ['MenuController@getAppetizers'],
    '/CougarCafe/Api/Menu/Salads' => ['MenuController@getSalads'],
    '/CougarCafe/Api/Menu/Entrees' => ['MenuController@getEntrees'],
    '/CougarCafe/Api/Menu/Desserts' => ['MenuController@getDesserts'],
    '/CougarCafe/Api/Menu/Drinks' => ['MenuController@getDrinks'],
    '/CougarCafe/Api/Reservation/get' => ['ReservationController@getReservations'],
    '/CougarCafe/Api/Reservation/add' => ['ReservationController@addReservation'],
];

//check if routes are available

$availableRoute = array_keys($urls);

if(!in_array($current_link, $availableRoute)){
    header('HTTP/1.0 404 Not Found');
    exit;
}

Api::routing($current_link, $urls);

exit;