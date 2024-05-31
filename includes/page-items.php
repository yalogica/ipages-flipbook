<?php
defined('ABSPATH') || exit;

$list_table = new iPages_List_Table_Items();
$list_table->prepare_items();
?>
<!-- /begin ipages app -->
<div class="ipages-root" id="ipages-app-items">
	<?php require 'page-info.php'; ?>
	<?php require 'page-feedback.php'; ?>
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="xfa fa-cubes"></i><?php esc_html_e('iPages Flipbook Items', 'ipages_flipbook'); ?></div>
		<div class="ipages-actions">
			<a class="ipages-blue" href="?page=ipages_flipbook_item"><?php esc_html_e('Add Book', 'ipages_flipbook'); ?></a>
		</div>
	</div>
	<div class="ipages-app">
		<?php $list_table->views(); ?>
		<form method="post">
			<?php $list_table->search_box(esc_html__('Search Items', 'ipages_flipbook'),'item'); ?>
			<input type="hidden" name="page" value="<?php echo sanitize_key(filter_var($_REQUEST['page'], FILTER_DEFAULT)) ?>">
			<?php $list_table->display() ?>
		</form>
	</div>
</div>
<!-- /end ipages app -->