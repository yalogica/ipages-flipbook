<?php
defined('ABSPATH') || exit;
?>
<div id="ipages-modal-{{modalData.id}}" class="ipages-modal ipages-no-max-width" tabindex="-1">
	<div class="ipages-modal-dialog">
		<div class="ipages-modal-header">
			<div class="ipages-modal-close" al-on.click="modalData.deferred.resolve('close');">&times;</div>
			<div class="ipages-modal-title"><i class="fa fa-info-circle"></i><?php esc_html_e('Select a post', 'ipages_flipbook'); ?></div>
		</div>
		<div class="ipages-modal-data ipages-modal-loading">
			<div class="ipages-modal-group">
				<div class="ipages-modal-posts">
					<div class="ipages-modal-post" al-repeat="post in modalData.posts" al-value="post" al-on.click="modalData.fn.onClickPost(modalData, $event, $element, $value)" al-on.dblclick="modalData.fn.onDblClickPost(modalData)" title="{{modalData.fn.getPostTitle(modalData, post)}}">
						<i class="xfa fa-file"></i><span>{{modalData.fn.getPostTitle(modalData, post)}}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="ipages-modal-footer">
			<div class="ipages-modal-text"><?php esc_html_e('Selected post:', 'ipages_flipbook'); ?> <b>{{modalData.selectedPost}}</b></div>
			<div class="ipages-modal-btn ipages-modal-btn-close" al-on.click="modalData.deferred.resolve('close');"><?php esc_html_e('Close', 'ipages_flipbook'); ?></div>
			<div class="ipages-modal-btn ipages-modal-btn-create" al-on.click="modalData.deferred.resolve(true);"><?php esc_html_e('OK', 'ipages_flipbook'); ?></div>
		</div>
	</div>
</div>