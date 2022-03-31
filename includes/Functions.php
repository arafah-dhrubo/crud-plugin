<?php

/**
 *Insert a new address
 *
 *@param array $args
 *
 *@return int|WP_Error
 */
function wd_cp_insert_address($args=[]){
    global $wpdb;

    $defaults = [
        'name' => '',
        'address'=>'',
        'phone'=>'',
        'email'=>'',
        'created_by'=>get_current_user_id(),
        'created_at'=>current_time('mysql')
    ];

    if(empty($args['name'])){
        return new \WP_Error('no-name', __('You must provide a name.', 'crud-plugin'));
    }

    if(empty($args['phone'])){
        return new \WP_Error('no-phone', __('You must provide a phone.', 'crud-plugin'));
    }

    if(empty($args['email'])){
        return new \WP_Error('no-email', __('You must provide a email.', 'crud-plugin'));
    }

    if(empty($args['address'])){
        return new \WP_Error('no-address', __('You must provide an address.', 'crud-plugin'));
    }

    $table_name =  $wpdb->prefix . 'cp_addresses';

    $data = wp_parse_args($args, $defaults);

    $types = ['%s', '%s', '%s', '%s', '%d', '%s'];

    $inserted = $wpdb->insert($table_name, $data, $types);

    if(!$inserted){
        return new \WP_Error('failed-to-insert', __('Failed to insert data', 'crud-plugin'));
    }

    return $wpdb->insert_id;
}