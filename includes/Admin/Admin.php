<?php

class Admin
{
    function __construct()
    {
        $this->dispatch_actions();
    }

    public function dispatch_actions()
    {
        include_once CP_PATH . '/includes/Admin/Addressbook.php';
        $addressbook = new Addressbook();
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}