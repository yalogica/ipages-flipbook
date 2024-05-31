<?php
defined('ABSPATH') || exit;

if(!class_exists( 'iPages_Deactivator')) :

class iPages_Deactivator {
	public function deactivate() {
		global $wpdb;
		$table = $wpdb->prefix . IPGS_PLUGIN_NAME;

		$sql = "SELECT COUNT(*) FROM {$table}";
		$count = $wpdb->get_var($sql);
		
		if($count > 0) {
			return;
		}
		
		// delete all if our tables are empty
		$table = $wpdb->prefix . IPGS_PLUGIN_NAME;
		$sql = "DROP TABLE IF EXISTS  {$table}";
		$wpdb->query($sql);
		
		delete_option('ipages_flipbook_db_version');
		delete_option('ipages_flipbook_activated');
		delete_option('ipages_flipbook_settings');
		
		$this->delete_files(IPGS_PLUGIN_UPLOAD_DIR . '/');
	}
	
	private function delete_files($target) {
		if(is_dir($target)) {
			$files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned
			foreach($files as $file) {
				$this->delete_files($file);
			}
			rmdir($target);
		} else if(is_file($target)) {
			unlink($target);
		}
	}
}
endif;