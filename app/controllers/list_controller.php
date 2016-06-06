<?php

class ListController extends BaseController{
    
    public static function index(){
        $pelit = Peli::all();
        View::make('list/index.html', array('pelit' => $pelit));
    }
}

