<?php
defined('ABSPATH') || exit;

if(!class_exists('iPages_Activator')) :

class iPages_Activator {
	public function activate() {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		
		global $wpdb;
		
		$table = $wpdb->prefix . IPGS_PLUGIN_NAME;
		$sql = "CREATE TABLE {$table} (
			id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			title text COLLATE utf8_unicode_ci DEFAULT NULL,
			slug varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
			active tinyint NOT NULL DEFAULT 1,
			data longtext COLLATE utf8_unicode_ci DEFAULT NULL,
			config longtext COLLATE utf8_unicode_ci DEFAULT NULL,
			author bigint(20) UNSIGNED NOT NULL DEFAULT 0,
			editor bigint(20) UNSIGNED NOT NULL DEFAULT 0,
			deleted tinyint NOT NULL DEFAULT 0,
			created datetime NOT NULL,
			modified datetime NOT NULL,
			UNIQUE KEY id (id)
		);";
		dbDelta($sql);
		
		update_option('ipages_flipbook_db_version', IPGS_DB_VERSION, false);
		$this->update_data();
		if(get_option('ipages_flipbook_activated') == false ) {
			$this->install_data();
		}
		update_option('ipages_flipbook_activated', time(), false);
	}
	
	public function update_data() {
		global $wpdb;
		$table = $wpdb->prefix . IPGS_PLUGIN_NAME;
		
		//$sql = "UPDATE {$table} SET created=date  WHERE created=%s";
		//$wpdb->query($wpdb->prepare($sql, '0000-00-00 00:00:00'));
		
		$sql = "UPDATE {$table} SET editor=author WHERE editor=%d";
		$wpdb->query($wpdb->prepare($sql, 0));
		
		// modify field types
		$wpdb->query("ALTER TABLE {$table} MODIFY data LONGTEXT");
		$wpdb->query("ALTER TABLE {$table} MODIFY config LONGTEXT");
		
		// Add support Emoji
		$sql = "ALTER TABLE {$table} DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE {$table} MODIFY title text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE {$table} MODIFY data longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE {$table} MODIFY config longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
		$wpdb->query($sql);
		
		$sql = "ALTER TABLE {$table} MODIFY slug varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
		$wpdb->query($sql);
		
		// Add the new column "deleted"
        $row = $wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '{$table}' AND column_name = 'deleted'");
        if(empty($row)) {
            $sql = "ALTER TABLE {$table} ADD deleted tinyint NOT NULL DEFAULT 0";
            $wpdb->query($sql);
        }
	}
	
	public function install_data() {
	}
	
	public function check_db() {
		if(get_option('ipages_flipbook_db_version') != IPGS_DB_VERSION) {
			$this->activate();
		}
	}
}
endif;