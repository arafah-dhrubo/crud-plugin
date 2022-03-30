<?php

class Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    function admin_menu(){
        add_menu_page(__('Crud Plugin', 'crud-plugin'), __('Crud Plugin', 'crud-plugin'), 'manage_options', 'crud_plugin', [$this, 'plugin_page'], 'dashicons-image-filter');
    }

    public function plugin_page(){
        echo "Hello";
    }
}