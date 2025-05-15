<?php

function teste(){
    echo 'Josue Araujo';
}

function isLogged(){
    $username = session()->get('user')->nome ?? false;
        if (isset($username) && is_string($username)) {
            return true;
        }
        return false;
};

function printData($data, $die = true){
    echo '<pre>';
    if(is_object($data) || is_array($data)){
        print_r($data);
    }else{
        echo $data;
    }

    if($die){
        die(PHP_EOL.'TERMINADO');
    }

}

