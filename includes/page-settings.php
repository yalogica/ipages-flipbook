<?php
defined('ABSPATH') || exit;

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );
?>
<!-- /begin ipages app -->
<div class="ipages-root" id="ipages-app-settings" style="display:none;">
	<?php require 'page-info.php'; ?>
	<?php require 'page-feedback.php'; ?>
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="xfa fa-cubes"></i><?php esc_html_e('iPages Settings', 'ipages_flipbook'); ?></div>
	</div>
	<div class="ipages-messages" id="ipages-messages">
	</div>
	<div class="ipages-app">
		<div class="ipages-loader-wrap">
			<div class="ipages-loader">
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
			</div>
		</div>
		<div class="ipages-wrap">
			<div class="ipages-workplace">
				<div class="ipages-main-menu">
					<div class="ipages-left-panel">
						<div class="ipages-list">
							<a class="ipages-item ipages-small ipages-lite" href="https://1.envato.market/5QrNo" target="_blank" al-if="appData.plan=='lite'"><?php esc_html_e('Buy Pro version', 'ipages_flipbook'); ?></a>
							<a class="ipages-item ipages-small ipages-pro" href="https://1.envato.market/5QrNo" target="_blank" al-if="appData.plan=='pro'"><?php esc_html_e('Pro Version', 'ipages_flipbook'); ?></a>
						</div>
					</div>
					<div class="ipages-right-panel">
						<div class="ipages-list">
							<div class="ipages-item ipages-blue" al-on.click="appData.fn.saveConfig(appData);" title="<?php esc_html_e('Save config to database', 'ipages_flipbook'); ?>"><?php esc_html_e('Save', 'ipages_flipbook'); ?></div>
						</div>
					</div>
				</div>
				<div class="ipages-main-data">
					<div class="ipages-stage">
						<div class="ipages-main-panel ipages-main-panel-general">
							<div class="ipages-data ipages-active">
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('Select the roles which should be able to access the plugin capabilities', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div al-checkboxlist="appData.config.roles" data-src="appData.roles" data-predefined="administrator"></div>
								</div>
								<!--
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('Preview & iframe page settings', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper" title="<?php esc_html_e('Enable/disable the wp_head call inside the preview page', 'ipages_flipbook'); ?>"></div>
									<div class="ipages-label"><?php esc_html_e('Enable wp_head()', 'ipages_flipbook'); ?></div>
									<div al-toggle="appData.config.wpHead"></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper" title="<?php esc_html_e('Enable/disable the wp_footer call inside the preview page', 'ipages_flipbook'); ?>"></div>
									<div class="ipages-label"><?php esc_html_e('Enable wp_footer()', 'ipages_flipbook'); ?></div>
									<div al-toggle="appData.config.wpFooter"></div>
								</div>
								-->
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('Editor settings', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper"><div class="ipages-tooltip"><?php esc_html_e('Choose a default theme for your custom css editor', 'ipages_flipbook'); ?></div></div>
									<div class="ipages-label"><?php esc_html_e('CSS editor theme', 'ipages_flipbook'); ?></div>
									<select class="ipages-select" al-select="appData.config.themeCSS">
										<option al-option="null"><?php esc_html_e('default', 'ipages_flipbook'); ?></option>
										<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
									</select>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper"><div class="ipages-tooltip"><?php esc_html_e('Choose a default theme for your custom javascript editor', 'ipages_flipbook'); ?></div></div>
									<div class="ipages-label"><?php esc_html_e('JavaScript editor theme', 'ipages_flipbook'); ?></div>
									<select class="ipages-select" al-select="appData.config.themeJavaScript">
										<option al-option="null"><?php esc_html_e('default', 'ipages_flipbook'); ?></option>
										<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
									</select>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper" title="<?php esc_html_e('If set true, the progressive loading of a PDF document is enabled', 'ipages_flipbook'); ?>"></div>
									<div class="ipages-label"><?php esc_html_e('PDF progressive loading', 'ipages_flipbook'); ?></div>
									<div al-toggle="appData.config.pdfProgressiveLoading"></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('If you want to fully uninstall the plugin with data, you should delete all items from the database before this action', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-helper" title="<?php esc_html_e('Delete all book items from database', 'ipages_flipbook'); ?>"></div>
									<div class="ipages-button ipages-red" al-on.click="appData.fn.deleteAllData(appData, '<?php esc_html_e('Do you really want to delete all data?', 'ipages_flipbook'); ?>');"><?php esc_html_e('Delete all items', 'ipages_flipbook'); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ipages-modals" id="ipages-modals">
		</div>
	</div>
</div>
<!-- /end ipages app -->