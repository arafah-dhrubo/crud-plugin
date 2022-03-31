<?php

class Admin
{
    function __construct()
    {
        include_once CP_PATH . '/includes/Admin/Addressbook.php';
        $addressbook = new Addressbook();
        $this->dispatch_actions($addressbook);
        include_once CP_PATH .'/includes/Admin/Menu.php';
            new Menu($addressbook);
    }

    public function dispatch_actions($addressbook)
    {

        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}