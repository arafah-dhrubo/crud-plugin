<?php

class Addressbook
{
    public $errors=[];
    public function plugin_page()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/views/address-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/views/address-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/views/address-view.php';
                break;
            default:
                $template = __DIR__ . '/views/address-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

    public function form_handler()
    {
        if (!isset($_POST['submit_address'])) {
            return;
        }
        if (!wp_verify_nonce($_POST['_wpnonce'], 'new-address')) {
            wp_die('Are you cheating?');
        }
        if(!current_user_can('manage_options')){
            wp_die('Are you cheating?');
        }

        $name = isset($_POST['name'])?sanitize_text_field($_POST['name']):'';
        $email = isset($_POST['email'])?sanitize_text_field($_POST['email']):'';
        $phone = isset($_POST['phone'])?sanitize_text_field($_POST['phone']):'';
        $address = isset($_POST['address'])?sanitize_textarea_field($_POST['address']):'';

        if(empty($name)) $this->errors['name']=__('Please provide a name', 'crud-plugin');
        if(empty($email)) $this->errors['email']=__('Please provide an email', 'crud-plugin');
        if(empty($phone)) $this->errors['phone']=__('Please provide a phone number', 'crud-plugin');
        if(empty($address)) $this->errors['address']=__('Please provide an address', 'crud-plugin');
        if(empty($this->errors))return;

        $insert_id = wd_cp_insert_address([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address
        ]);

        if(!is_wp_error($insert_id)){
            wp_die($insert_id->get_error_message());
        }

        $redirected_to = admin_url('admin.php?page=crud-plugin&inserted=true');
        wp_redirect($redirected_to);
        exit;
    }
}