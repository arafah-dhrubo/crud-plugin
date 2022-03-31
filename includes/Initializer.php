<?php

class Initializer{

    public function __construct(){
        if(is_admin()){
            include_once CP_PATH.'/includes/Admin/Admin.php';
            new Admin();
        }else{
            include_once CP_PATH.'/includes/Frontend/Shortcode.php';
            new Shortcode();
        }
    }
}