<?php
/**
 * Plugin Name: Database
 * Author: Rupom
 * Description: Plugin description
 * Version: 1.0
 */
function dbdelta_callback(){
    global $wpdb;
    $table_name = $wpdb->prefix.'persons';
    $sql = "CREATE TABLE {$table_name}(
        id INT NOT NULL AUTO_INCREMENT,
        p_name VARCHAR(250),
        email VARCHAR(200),
        PRIMARY KEY (id)
    )" ;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    $wpdb->insert($table_name,[
        'p_name' => 'rupom',
        'email' => 'rupom@gmail.com'
    ]);
    $wpdb->insert($table_name,[
        'p_name' => 'rupom11',
        'email' => 'rupom11@gmail.com'
    ]);
}
 register_activation_hook(__FILE__, 'dbdelta_callback');

//  add menu page
add_action( 'admin_menu',function(){
    add_menu_page("Database_demo", "Database_demo", 'manage_options', 'database_demo', 'menu_details_callback');
});
function menu_details_callback(){
    global $wpdb;
    $table_name = $wpdb->prefix.'persons';
    $id = $_GET['pid'] ?? 0;
    if($id){
        $result = $wpdb->get_row("SELECT * FROM {$table_name} WHERE id='{$id}' ");
        if($result){
            echo "Name: {$result->p_name}";
            echo "Emails: {$result->email}";
        }
    }
}
?>