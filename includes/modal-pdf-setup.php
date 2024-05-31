<?php
defined('ABSPATH') || exit;
?>
<div id="ipages-modal-{{modalData.id}}" class="ipages-modal" tabindex="-1">
	<div class="ipages-modal-dialog">
		<div class="ipages-modal-header">
			<div class="ipages-modal-close" al-on.click="modalData.deferred.resolve('close');">&times;</div>
			<div class="ipages-modal-title"><i class="xfa fa-info-circle"></i><?php esc_html_e('Confirm Dialog', 'ipages_flipbook'); ?></div>
		</div>
		<div class="ipages-modal-data">
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-label">1) <?php esc_html_e('Remove all existing pages from the "pages" section', 'ipages_flipbook'); ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-checkbox="modalData.removeExistingPages.action"></div>
					</div>
				</div>
			</div>
			
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-label">2) <?php esc_html_e('Set page width & height from the selected PDF document', 'ipages_flipbook'); ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-checkbox="modalData.pageSize.action"></div>
					</div>
				</div>
			</div>
			
			<div class="ipages-control">
				<div class="ipages-input-group ipages-long">
					<div class="ipages-input-group-cell">
						<div class="ipages-label">3) <?php esc_html_e('Create pages from the selected PDF document', 'ipages_flipbook'); ?></div>
					</div>
					<div class="ipages-input-group-cell ipages-pinch">
						<div al-checkbox="modalData.createPages.action"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="ipages-modal-footer">
			<div class="ipages-modal-btn ipages-modal-btn-close" al-on.click="modalData.deferred.resolve('close');"><?php esc_html_e('Close', 'ipages_flipbook'); ?></div>
			<div class="ipages-modal-btn ipages-modal-btn-create" al-on.click="modalData.deferred.resolve(true);"><?php esc_html_e('OK', 'ipages_flipbook'); ?></div>
		</div>
	</div>
</div>