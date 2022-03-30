<?php

class Initializer{
    public function __construct(){
        if(is_admin()){
            include_once CP_PATH.'/includes/Admin/Menu.php';
            new Menu();
        }else{
            include_once CP_PATH.'/includes/Frontend/Shortcode.php';
            new Shortcode();
        }
    }
}