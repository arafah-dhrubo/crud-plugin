<?php

class Installer
{
    public function run()
    {
        $this->activate();
        $this->create_tables();
    }

    public function activate()
    {
        $installed = get_option('cp_installed');

        if (!$installed) {
            update_option('cp_installed', time());
        }

        update_option('cp_version', CP_VERSION);
    }

    /**
     *Create data tables
     *
     * @return void
     */
    public function create_tables()
    {

        global $wpdb;
        $table_name = $wpdb->prefix . 'cp_addresses';

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `$table_name`(
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL DEFAULT '',
            `email` varchar(255) NOT NULL,
            `address` varchar(255) DEFAULT NULL,
            `phone` varchar(30) DEFAULT NULL,
            `created_by` bigint(20) unsigned NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate";

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($schema);
        }
    }
}