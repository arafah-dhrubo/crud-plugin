<?php

class Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    function admin_menu(){
        $parent_slug = 'crud-plugin';
        $capability = 'manage_options';
        add_menu_page(__('Crud Plugin', 'crud-plugin'), __('Crud Plugin', 'crud-plugin'), $capability, $parent_slug, [$this, 'address_book_page'], 'dashicons-image-filter');
        add_submenu_page($parent_slug, __('Address Book', 'crud-plugin'), __('Address Book', 'crud-plugin'), $capability, $parent_slug,[$this, 'address_book_page']);
        add_submenu_page($parent_slug, __('Settings', 'crud-plugin'), __('Settings', 'crud-plugin'), $capability, 'cp-settings',[$this, 'settings_page']);
    }

    public function address_book_page(){
        include_once CP_PATH."/includes/Admin/Addressbook.php";
        $address_book = new Addressbook();
        $address_book->plugin_page();
    }

    public function settings_page(){
        echo "Hello from settings page";
    }
}