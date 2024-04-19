<?php
/**
 * Plugin Name: Database
 * Author: Rupom
 * Description: Plugin description
 * Version: 1.0
 */

 global $wpdb;
 $table_name = $wpdb->prefix.'persons';
 $sql = "CREATE TABLE {$table_name}(
    id INT NOT NULL AUTO_INCREMENT,
    p_name VARCHAR(250),
    email VARCHAR(200),
    PRIMARY KEY(id)
 )" ;
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql );
?>