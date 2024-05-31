<?php
defined('ABSPATH') || exit;

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );
$author = get_the_author_meta('display_name', $item->author);
$modified = mysql2date(get_option('date_format'), $item->modified) . ' at ' . mysql2date(get_option('time_format'), $item->modified);
?>
<!-- /begin ipages app -->
<div class="ipages ipages-root" id="ipages-app-item" style="display:none;">
	<?php require 'page-info.php'; ?>
	<?php require 'page-feedback.php'; ?>
	<input id="ipages-load-config-from-file" type="file" />
	<div class="ipages-page-header">
		<div class="ipages-title"><i class="xfa fa-cubes"></i><?php esc_html_e('iPages Flipbook Item', 'ipages_flipbook'); ?></div>
		<div class="ipages-actions">
			<a class="ipages-blue" href="?page=ipages_flipbook_item" title="<?php esc_html_e('Create a new item', 'ipages_flipbook'); ?>"><?php esc_html_e('Add Item', 'ipages_flipbook'); ?></a>
			<a class="ipages-indigo" href="#" al-on.click="appData.fn.saveConfigToFile(appData)" title="<?php esc_html_e('Save config to a JSON file', 'ipages_flipbook'); ?>"><?php esc_html_e('Save As...', 'ipages_flipbook'); ?></a>
			<a class="ipages-green" href="#" al-on.click="appData.fn.loadConfigFromFile(appData)" title="<?php esc_html_e('Load config from a JSON file', 'ipages_flipbook'); ?>"><?php esc_html_e('Load As...', 'ipages_flipbook'); ?></a>
		</div>
	</div>
	<div class="ipages-messages" id="ipages-messages">
	</div>
	<div class="ipages-app" id="ipages-app">
		<div class="ipages-loader-wrap">
			<div class="ipages-loader">
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
				<div class="ipages-loader-bar"></div>
			</div>
		</div>
		<div class="ipages-wrap">
			<div class="ipages-main-header">
				<input class="ipages-title" type="text" al-text="appData.config.title" placeholder="<?php esc_html_e('Title', 'ipages_flipbook'); ?>">
			</div>
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
							<div class="ipages-item ipages-green" al-on.click="appData.fn.preview(appData);" title="<?php esc_html_e('The config should be saved before preview', 'ipages_flipbook'); ?>" al-if="appData.wp_item_id != null"><?php esc_html_e('Preview', 'ipages_flipbook'); ?></div>
							<div class="ipages-item ipages-blue" al-on.click="appData.fn.saveConfig(appData);" title="<?php esc_html_e('Save config to database', 'ipages_flipbook'); ?>"><?php esc_html_e('Save', 'ipages_flipbook'); ?></div>
						</div>
					</div>
				</div>
				<div class="ipages-main-tabs ipages-clear-fix">
					<div class="ipages-pdf-loader" id="ipages-pdf-loader" ><?php esc_html_e('loading PDF', 'ipages_flipbook'); ?><span class="ipages-pdf-loader-percent"></span></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.general" al-on.click="appData.fn.onTab(appData, 'general')"><?php esc_html_e('General', 'ipages_flipbook'); ?><div class="ipages-status" al-if="appData.config.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.pages" al-on.click="appData.fn.onTab(appData, 'pages')"><?php esc_html_e('Pages', 'ipages_flipbook'); ?><div class="ipages-counter" al-if="appData.config.pages.length>0">{{appData.config.pages.length}}</div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.customCSS" al-on.click="appData.fn.onTab(appData, 'customCSS')"><?php esc_html_e('Custom CSS', 'ipages_flipbook'); ?><div class="ipages-status" al-if="appData.config.customCSS.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.customJS" al-on.click="appData.fn.onTab(appData, 'customJS')"><?php esc_html_e('Custom JS', 'ipages_flipbook'); ?><div class="ipages-status" al-if="appData.config.customJS.active"></div></div>
					<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.tabs.shortcode" al-on.click="appData.fn.onTab(appData, 'shortcode')" al-if="appData.wp_item_id"><?php esc_html_e('Shortcode', 'ipages_flipbook'); ?></div>
				</div>
				<div class="ipages-main-data">
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.general">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.book">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'book')">
											<div class="ipages-block-title"><?php esc_html_e('Book', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable book', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Enable book', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.active"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book mode', 'ipages_flipbook'); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEngine">
													<option al-option="null"><?php esc_html_e('default', 'ipages_flipbook'); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', 'ipages_flipbook'); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Auto page size (width & height) based on content source', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto page size', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.pageSizeAuto"></div>
											</div>
											
											<div al-if="!appData.config.pageSizeAuto">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page width (if not set then default page width will be used)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page width', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageWidth" placeholder="<?php esc_html_e('Default: 300', 'ipages_flipbook'); ?>">
												<div class="ipages-warn" al-if="appData.pdfPageWidth && appData.pdfPageWidth != appData.config.pageWidth"><?php esc_html_e('width is not equal to the PDF document width ({{appData.pdfPageWidth}})', 'ipages_flipbook'); ?></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page height (if not set then default page height will be used)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page height', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageHeight" placeholder="<?php esc_html_e('Default: 360', 'ipages_flipbook'); ?>">
												<div class="ipages-warn" al-if="appData.pdfPageHeight && appData.pdfPageHeight != appData.config.pageHeight"><?php esc_html_e('height is not equal to the PDF document height ({{appData.pdfPageHeight}})', 'ipages_flipbook'); ?></div>
											</div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Page number to show after the book is ready', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page start', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageStart" placeholder="<?php esc_html_e('Default: 1', 'ipages_flipbook'); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Controls the delay in ms after which the book will open the start page', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page start delay', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageStartDelay" placeholder="<?php esc_html_e('Default: 0', 'ipages_flipbook'); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Preload page neighbours for faster loading', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Preload neighbours', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.preloadNeighbours"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Make the book look good on all devices', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Responsive', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.responsive"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Auto fill all available space inside of the book container', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Autofit', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.autoFit"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable prevention of the default behavior on the mouseWheel event', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel, prevent the default behavior', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.mouseWheelPreventDefault"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set time in milliseconds (1000 = 1sec)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Flip duration (ms)', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.flipDuration" placeholder="<?php esc_html_e('Default: 300', 'ipages_flipbook'); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable page flip sound', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page flip sound', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.flipSound"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set page flip sound url (mp3 or ogg format)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page flip sound url', 'ipages_flipbook'); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.flipSoundUrl" placeholder="<?php esc_html_e('Select a sound file', 'ipages_flipbook'); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl ipages-no-brr" al-on.click="appData.fn.playFlipSound(appData)" title="<?php esc_html_e('Play a flip sound', 'ipages_flipbook'); ?>"><i class="xfa fa-play"></i></div>
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectFlipSound(appData)" title="<?php esc_html_e('Select a flip sound', 'ipages_flipbook'); ?>"><i class="xfa fa-folder"></i></div>
													</div>
												</div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Give a turn-over page some perspective', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Perspective', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.perspective" placeholder="<?php esc_html_e('Default: 1500', 'ipages_flipbook'); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Sets the last part of the book URL', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('URL Slug', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.slug" data-regex="^([a-z0-9_-]+)$">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.pdf">
										<div class="ipages-block-header"  al-attr.class.ipages-warn="(appData.config.pdfUrl && !appData.fn.hasPdfPages(appData))" al-on.click="appData.fn.onGeneralTab(appData,'pdf')">
											<div class="ipages-block-title"><?php esc_html_e('PDF', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set pdf document url', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('PDF url', 'ipages_flipbook'); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.pdfUrl" placeholder="<?php esc_html_e('Select a pdf document', 'ipages_flipbook'); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectPDFDocument(appData)" title="<?php esc_html_e('Select a pdf document', 'ipages_flipbook'); ?>"><i class="xfa fa-folder"></i></div>
													</div>
												</div>
											</div>
											<div class="ipages-control" al-if="(appData.config.pdfUrl && appData.pdf && !appData.fn.hasPdfPages(appData))">
												<div class="ipages-warn ipages-normal"><?php esc_html_e('The book does not contain pages from the PDF document', 'ipages_flipbook'); ?></div>
											</div>
											<div class="ipages-control" al-if="appData.config.pdfUrl && appData.pdf">
												<div class="ipages-btn ipages-normal ipages-blue ipages-normal-text" al-on.click="appData.fn.generatePDFPages(appData)" title="<?php esc_html_e('Create pages from the PDF document', 'ipages_flipbook'); ?>"><?php esc_html_e('Create pages from the PDF document', 'ipages_flipbook'); ?></div>
											</div>
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('If set true, the progressive loading of a PDF document is enabled', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Progressive loading', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.pdfProgressiveLoading"></div>
											</div>
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('If set true, a PDF document will be auto loaded', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto load', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.pdfAutoLoad"></div>
											</div>
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set a cover image, if a pdf document is loaded manually', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Cover image url', 'ipages_flipbook'); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.pdfCoverImage.url" placeholder="<?php esc_html_e('Select an image', 'ipages_flipbook'); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.config.pdfCoverImage)" title="<?php esc_html_e('Select an image', 'ipages_flipbook'); ?>"><i class="xfa fa-folder"></i></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.container">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'container')">
											<div class="ipages-block-title"><?php esc_html_e('Container', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Specifies the theme of the book', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Theme', 'ipages_flipbook'); ?></div>
												<select class="ipages-select ipages-capitalize" al-select="appData.config.bookTheme">
													<option al-option="null"><?php esc_html_e('none', 'ipages_flipbook'); ?></option>
													<option al-repeat="theme in appData.bookThemes" al-option="theme.id">{{theme.title}}</option>
												</select>
											</div>
											
											<!--
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style for the portrait mode', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book portrait mode', 'ipages_flipbook'); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEnginePortrait">
													<option al-option="null"><?php esc_html_e('default', 'ipages_flipbook'); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', 'ipages_flipbook'); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Choose a book style for the landscape mode', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Book landscape mode', 'ipages_flipbook'); ?></div>
												<select class="ipages-select" al-select="appData.config.bookEngineLandscape">
													<option al-option="null"><?php esc_html_e('default', 'ipages_flipbook'); ?></option>
													<option al-option="'TwoPageFlip'"><?php esc_html_e('Two page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageFlip'"><?php esc_html_e('One page flip', 'ipages_flipbook'); ?></option>
													<option al-option="'OnePageSwipe'"><?php esc_html_e('One page swipe', 'ipages_flipbook'); ?></option>
												</select>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The ratio value (w/h), if less than enable portrait type, if more then enable landscape type', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Ratio coefficient (portrait or landscape)', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.ratioPortraitToLandscape" placeholder="<?php esc_html_e('Default: 1.3', 'ipages_flipbook'); ?>">
											</div>
											-->
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable auto container width', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto container width', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.autoWidth"></div>
											</div>
											
											<div class="ipages-control" al-if="!appData.config.autoWidth">
												<div class="ipages-helper" title="<?php esc_html_e('Set the book container width, can be any valid CSS units, not just pixels', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Container Width', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.containerWidth">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable auto container height, if sets true, the height will be depends on the book size', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Auto container height', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.autoHeight"></div>
											</div>
											
											<div class="ipages-control" al-if="!appData.config.autoHeight">
												<div class="ipages-helper" title="<?php esc_html_e('Set the book container height, can be any valid CSS units, not just pixels, if not set, the height will be calculated automatic', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Container Height', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.containerHeight">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Generate space around the book\'s content', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Padding (top, right, bottom, left)', 'ipages_flipbook'); ?></div>
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('top', 'ipages_flipbook'); ?>" al-integer="appData.config.padding.top">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('right', 'ipages_flipbook'); ?>" al-integer="appData.config.padding.right">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('bottom', 'ipages_flipbook'); ?>" al-integer="appData.config.padding.bottom">
												<input class="ipages-number ipages-quarter" placeholder="<?php esc_html_e('left', 'ipages_flipbook'); ?>" al-integer="appData.config.padding.left">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Sets the inline background styles ON or OFF', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Inline background styles', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.background.inline"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Background color in hexadecimal format (#fff or #555555)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background color', 'ipages_flipbook'); ?></div>
												<div class="ipages-color" al-color="appData.config.background.color"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set background image (jpeg or png format)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background image', 'ipages_flipbook'); ?></div>
												<div class="ipages-input-group">
													<div class="ipages-input-group-cell">
														<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.config.background.image.url" placeholder="<?php esc_html_e('Select an image', 'ipages_flipbook'); ?>">
													</div>
													<div class="ipages-input-group-cell ipages-pinch">
														<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.config.background.image)" title="<?php esc_html_e('Select a background image', 'ipages_flipbook'); ?>"><span><i class="xfa fa-folder"></i></span></div>
													</div>
												</div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Specifies the size of the background images', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background size', 'ipages_flipbook'); ?></div>
												<div class="ipages-select" al-backgroundsize="appData.config.background.size"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('How a background image will be repeated', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background repeat', 'ipages_flipbook'); ?></div>
												<div class="ipages-select" al-backgroundrepeat="appData.config.background.repeat"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the starting position of a background image', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Background position', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.background.position" placeholder="<?php esc_html_e('Example: 50% 50%', 'ipages_flipbook'); ?>">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set additional css classes to the book container', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Extra CSS classes', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.bookClass">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.zoom">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'zoom')">
											<div class="ipages-block-title"><?php esc_html_e('Zoom', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The current book zoom level', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom level', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.zoom">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The maximum book zoom level', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Max zoom level', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomMax">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The minimum book zoom level', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Min zoom level', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomMin">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('The number of the zoom step', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom step', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.zoomStep">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable the focal point on the book on which to zoom', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom focal', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.zoomFocal"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book to default after double click or tap event', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Zoom default after double click or tap', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.dblClickZoomDefault"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with the mouse wheel', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel zoom', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.mouseWheelZoom"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with the keyboard (+ and - keys)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Keyboard zoom', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.keyboardZoom"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Set the scaling of the book with multi-touch gestures', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Pinch zoom', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.pinchZoom"></div>
											</div>
											
											<div class="ipages-control" al-if="appData.config.pinchZoom">
												<div class="ipages-helper" title="<?php esc_html_e('The number by which the book is zoomed', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Pinch zoom step', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-float="appData.config.pinchZoomCoef">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.navigation">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'navigation')">
											<div class="ipages-block-title"><?php esc_html_e('Navigation', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide prev & next navigation buttons', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Prev & next buttons', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.prevnextButtons"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse drag', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse drag navigation', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.mouseDragNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse click on a page', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page click navigation', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.mousePageClickNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation with touch events', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Touch navigation', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.touchNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via keyboard', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Keyboard navigation', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.keyboardNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Enable/disable navigation via mouse wheel', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Mouse wheel navigation', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.mouseWheelNavigation"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide page numbers', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page numbers', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.pageNumbers"></div>
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Initial page numbering value', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Page number first', 'ipages_flipbook'); ?></div>
												<input class="ipages-number" al-integer="appData.config.pageNumbersFirst">
											</div>
											
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Numbers of pages to be hidden (-1 is the last page)', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Hide page numbers', 'ipages_flipbook'); ?></div>
												<input class="ipages-text" type="text" al-text="appData.config.pageNumbersHidden" placeholder="<?php esc_html_e('Example: 1;-1', 'ipages_flipbook'); ?>">
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.toolbar">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'toolbar')">
											<div class="ipages-block-title"><?php esc_html_e('Toolbar', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-control">
												<div class="ipages-helper" title="<?php esc_html_e('Show/hide the toolbar control', 'ipages_flipbook'); ?>"></div>
												<div class="ipages-label"><?php esc_html_e('Enable toolbar', 'ipages_flipbook'); ?></div>
												<div al-toggle="appData.config.toolbar"></div>
											</div>
											
											<div al-if="appData.config.toolbar">
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the thumbnails controls after the book init', 'ipages_flipbook'); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show thumbnails', 'ipages_flipbook'); ?></div>
													<div al-toggle="appData.config.autoEnableThumbnails"></div>
												</div>
												
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the outline controls with bookmarks after the book init', 'ipages_flipbook'); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show outline', 'ipages_flipbook'); ?></div>
													<div al-toggle="appData.config.autoEnableOutline"></div>
												</div>
												
												<div class="ipages-control">
													<div class="ipages-helper" title="<?php esc_html_e('Show/hide the share dialog box after the book init', 'ipages_flipbook'); ?>"></div>
													<div class="ipages-label"><?php esc_html_e('Auto-show share', 'ipages_flipbook'); ?></div>
													<div al-toggle="appData.config.autoEnableShare"></div>
												</div>
											
												<div class="ipages-book-controls-wrap">
													<div class="ipages-book-controls-toolbar">
														<div class="ipages-left-panel">
															<span al-if="appData.ui.activeBookControl != null">
															<i class="xfa fa-pencil-square" al-on.click="appData.fn.editBookControlTitle(appData)" title="<?php esc_html_e('Edit book control title', 'ipages_flipbook'); ?>"></i>
															<i class="xfa fa-long-arrow-up fa-split"></i>
															<i class="xfa fa-arrow-up" al-on.click="appData.fn.updownBookControl(appData, 'up')" title="<?php esc_html_e('Move up', 'ipages_flipbook'); ?>"></i>
															<i class="xfa fa-arrow-down" al-on.click="appData.fn.updownBookControl(appData, 'down')" title="<?php esc_html_e('Move down', 'ipages_flipbook'); ?>"></i>
															</span>
														</div>
														<div class="ipages-right-panel">
														</div>
													</div>
													<div class="ipages-book-control"
													 al-attr.class.ipages-active="appData.fn.isBookControlActive(appData, control)"
													 al-attr.class.ipages-edit="appData.fn.isBookControlEdit(appData, control)"
													 al-on.click="appData.fn.selectBookControl(appData, control)"
													 al-on.dblclick="appData.fn.editBookControlTitle(appData, control, $element)"
													 al-repeat="control in appData.config.toolbarControls"
													>
														<i class="ipages-icon" al-init="appData.fn.initBookControlIcon(appData, control, $element)" title="{{control.type}}"></i>
														<div class="ipages-label">{{control.title}}</div>
														<input class="ipages-text" type="text" al-text="control.title" placeholder="<?php esc_html_e('Title', 'ipages_flipbook'); ?>" al-on.keypress="appData.fn.onBookControlEnter(appData, $event)">
														<div class="ipages-actions">
															<i class="xfa" al-attr.class.fa-check-circle-o="control.active" al-attr.class.fa-circle-o="!control.active" al-on.click="appData.fn.toggleBookControlActive(appData, control)" title="<?php esc_html_e('Enable/disable book control', 'ipages_flipbook'); ?>"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="ipages-block" al-attr.class.ipages-block-folded="appData.ui.generalTab.bookmarks">
										<div class="ipages-block-header" al-on.click="appData.fn.onGeneralTab(appData,'bookmarks')">
											<div class="ipages-block-title"><?php esc_html_e('Outline/bookmarks', 'ipages_flipbook'); ?></div>
											<div class="ipages-block-state"></div>
										</div>
										<div class="ipages-block-data">
											<div class="ipages-bookmarks-wrap">
												<div class="ipages-bookmarks-toolbar">
													<div class="ipages-left-panel">
														<i class="xfa fa-plus-circle" al-on.click="appData.fn.addBookmark(appData)" title="<?php esc_html_e('Add new', 'ipages_flipbook'); ?>"></i>
														<span al-if="appData.ui.activeBookmark != null">
														<i class="xfa fa-clone" al-on.click="appData.fn.copyBookmark(appData)" title="<?php esc_html_e('Copy', 'ipages_flipbook'); ?>"></i>
														<i class="xfa fa-pencil-square" al-on.click="appData.fn.editBookmark(appData)" title="<?php esc_html_e('Edit', 'ipages_flipbook'); ?>"></i>
														<i class="xfa fa-long-arrow-up fa-split"></i>
														<i class="xfa fa-arrow-up" al-on.click="appData.fn.updownBookmark(appData, 'up')" title="<?php esc_html_e('Move up', 'ipages_flipbook'); ?>"></i>
														<i class="xfa fa-arrow-down" al-on.click="appData.fn.updownBookmark(appData, 'down')" title="<?php esc_html_e('Move down', 'ipages_flipbook'); ?>"></i>
														<i class="xfa fa-long-arrow-up fa-split"></i>
														<i class="xfa fa-arrow-left" al-on.click="appData.fn.levelBookmark(appData, 'left')" title="<?php esc_html_e('Increase level', 'ipages_flipbook'); ?>"></i>
														<i class="xfa fa-arrow-right" al-on.click="appData.fn.levelBookmark(appData, 'right')" title="<?php esc_html_e('Decrease level', 'ipages_flipbook'); ?>"></i>
														</span>
													</div>
													<div class="ipages-right-panel">
														<i class="xfa fa-trash fa-color-red" al-if="appData.ui.activeBookmark != null" al-on.click="appData.fn.deleteBookmark(appData)" title="<?php esc_html_e('Delete', 'ipages_flipbook'); ?>"></i>
													</div>
												</div>
												<div class="ipages-bookmarks"
													 al-style.margin-left="appData.fn.getBookmarkLevel(appData, bookmark)"
													 al-repeat="bookmark in appData.config.bookmarks">
													<div class="ipages-bookmark"
													 al-attr.class.ipages-active="appData.fn.isBookmarkActive(appData, bookmark)"
													 al-attr.class.ipages-edit="appData.fn.isBookmarkEdit(appData, bookmark)"
													 al-on.click="appData.fn.selectBookmark(appData, bookmark)"
													 al-on.dblclick="appData.fn.editBookmark(appData, bookmark, $element)"
													>
														<i class="xfa" al-attr.class.fa-external-link-square="bookmark.target!='page'" al-attr.class.fa-bookmark="bookmark.target=='page'"></i>
														<div class="ipages-label">{{appData.fn.getBookmarkLabel(appData, bookmark)}}</div>
														<input class="ipages-text" type="text" al-text="bookmark.text" placeholder="<?php esc_html_e('Title', 'ipages_flipbook'); ?>" al-on.keypress="appData.fn.onBookmarkEnter(appData, $event)">
														<input class="ipages-text" type="text" al-text="bookmark.link" placeholder="<?php esc_html_e('Page number or url', 'ipages_flipbook'); ?>" al-on.keypress="appData.fn.onBookmarkEnter(appData, $event)">
														<select class="ipages-select" al-select="bookmark.target">
															<option al-option="'page'"><?php esc_html_e('Go to page', 'ipages_flipbook'); ?></option>
															<option al-option="'self'"><?php esc_html_e('Go to url (self)', 'ipages_flipbook'); ?></option>
															<option al-option="'blank'"><?php esc_html_e('Go to url (blank)', 'ipages_flipbook'); ?></option>
														</select>
														<div class="ipages-actions">
															<i class="xfa" al-attr.class.fa-check-circle-o="bookmark.active" al-attr.class.fa-circle-o="!bookmark.active" al-on.click="appData.fn.toggleBookmarkActive(appData, bookmark)" title="<?php esc_html_e('Enable/disable bookmark', 'ipages_flipbook'); ?>"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.pages">
						<div class="ipages-stage">
							<div class="ipages-main-panel">
								<div class="ipages-pages-wrap">
									<div class="ipages-pages-toolbar">
										<div class="ipages-left-panel">
											<i class="ipages-btn" al-on.click="appData.fn.addPagesFromMedia(appData)" title="<?php esc_html_e('Create pages from the set of selected images', 'ipages_flipbook'); ?>"><?php esc_html_e('add from media', 'ipages_flipbook'); ?></i>
											<i class="xfa fa-long-arrow-up fa-split"></i>
											<i class="xfa fa-plus-circle" al-on.click="appData.fn.addPage(appData)" title="<?php esc_html_e('Add page', 'ipages_flipbook'); ?>"></i>
											<div al-if="appData.ui.activePage != null">
											<i class="xfa fa-clone" al-on.click="appData.fn.copyPage(appData)" title="<?php esc_html_e('Copy page', 'ipages_flipbook'); ?>"></i>
											<i class="xfa fa-pencil-square" al-on.click="appData.fn.editPage(appData, appData.ui.activePage)" title="<?php esc_html_e('Edit page', 'ipages_flipbook'); ?>"></i>
											<i class="xfa fa-long-arrow-up fa-split"></i>
											<i class="xfa fa-arrow-up fa-top" al-on.click="appData.fn.updownPage(appData, 'start')" title="<?php esc_html_e('Move to the start', 'ipages_flipbook'); ?>"></i>
											<i class="xfa fa-arrow-up" al-on.click="appData.fn.updownPage(appData, 'up')" title="<?php esc_html_e('Move up', 'ipages_flipbook'); ?>"></i>
											<i class="xfa fa-arrow-down" al-on.click="appData.fn.updownPage(appData, 'down')" title="<?php esc_html_e('Move down', 'ipages_flipbook'); ?>"></i>
											<i class="xfa fa-arrow-down fa-bottom" al-on.click="appData.fn.updownPage(appData, 'end')" title="<?php esc_html_e('Move to the end', 'ipages_flipbook'); ?>"></i>
											</div>
										</div>
										<div class="ipages-right-panel">
											<i class="xfa fa-trash fa-color-red" al-if="appData.ui.activePage != null" al-on.click="appData.fn.deletePage(appData)" title="<?php esc_html_e('Delete page', 'ipages_flipbook'); ?>"></i>
										</div>
									</div>
									<div class="ipages-pages">
										<div class="ipages-page"
											 al-attr.class.ipages-active="appData.fn.isPageActive(appData, page)"
											 al-repeat="page in appData.config.pages"
											 al-on.click="appData.fn.selectPage(appData, page)"
											 >
											<div class="ipages-back"></div>
											<div class="ipages-front" al-page-image="page" on-page-image-update="appData.fn.onPageImageUpdate(appData, page, $element, 'page')"></div>
											<div class="ipages-overlay" al-attr.class.ipages-active="!page.active"></div>
											<div class="ipages-layers-count" al-if="page.layers.length>0" title="<?php esc_html_e('Layers count', 'ipages_flipbook'); ?>">{{page.layers.length}}</div>
											<div class="ipages-number">{{$index+1}}</div>
										</div>
									</div>
								</div>
								<div class="ipages-page-editor" al-if="appData.ui.editPage != null">
									<div class="ipages-page-editor-toolbar">
										<div class="ipages-left-panel">
											<i class="xfa fa-chevron-left" al-on.click="appData.fn.editPrevNextPage(appData, 'prev')" title="<?php esc_html_e('Prev page', 'ipages_flipbook'); ?>"></i>
											<span>{{appData.fn.getPageNumber(appData, appData.ui.editPage)}}</span>
											<i class="xfa fa-chevron-right" al-on.click="appData.fn.editPrevNextPage(appData, 'next')" title="<?php esc_html_e('Next page', 'ipages_flipbook'); ?>"></i>
										</div>
										<div class="ipages-right-panel">
											<i class="xfa fa-times" al-on.click="appData.fn.editPage(appData, appData.ui.activePage)" title="<?php esc_html_e('Close editor', 'ipages_flipbook'); ?>"></i>
										</div>
									</div>
									<div id="ipages-layer-canvas" class="ipages-layer-canvas">
										<div id="ipages-layer-page" class="ipages-layer-page" al-page-image="appData.ui.editPage" on-page-image-update="appData.fn.onPageImageUpdate(appData, appData.ui.editPage, $element, 'layer')">
											<div class="ipages-layer"
											 tabindex="1"
											 al-on.click="appData.fn.onLayerClick(appData, layer)"
											 al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'drag', $event)"
											 al-on.keydown="appData.fn.onEditLayerKeyDown(appData, layer, $event)"
											 al-attr.class.ipages-active="appData.fn.isLayerActive(appData, layer)"
											 al-attr.class.ipages-hidden="!layer.visible"
											 al-attr.class.ipages-lock="layer.lock"
											 al-attr.class.ipages-layer-image="layer.type == 'image'"
											 al-attr.class.ipages-layer-text="layer.type == 'text'"
											 al-style.top="appData.fn.getLayerStyle(appData, layer, 'y')"
											 al-style.left="appData.fn.getLayerStyle(appData, layer, 'x')"
											 al-style.width="appData.fn.getLayerStyle(appData, layer, 'width')"
											 al-style.height="appData.fn.getLayerStyle(appData, layer, 'height')"
											 al-style.transform="appData.fn.getLayerStyle(appData, layer, 'angle')"
											 al-repeat="layer in appData.ui.editPage.layers"
											 al-init="appData.fn.initLayer(appData, layer, $element)"
											>
												<div class="ipages-layer-inner"
													 al-on.dblclick="appData.fn.onEditLabelText(appData, layer, $element, $event)"
													 spellcheck="false"
													 al-style.background-color="appData.fn.getLayerStyle(appData, layer, 'background-color')"
													 al-style.background-image="appData.fn.getLayerStyle(appData, layer, 'background-image')"
													 al-style.background-size="appData.fn.getLayerStyle(appData, layer, 'background-size')"
													 al-style.background-repeat="appData.fn.getLayerStyle(appData, layer, 'background-repeat')"
													 al-style.background-position="appData.fn.getLayerStyle(appData, layer, 'background-position')"
													 al-style.color="appData.fn.getLayerStyle(appData, layer, 'color')"
													 al-style.font-family="appData.fn.getLayerStyle(appData, layer, 'font-family')"
													 al-style.font-size="appData.fn.getLayerStyle(appData, layer, 'font-size')"
													 al-style.line-height="appData.fn.getLayerStyle(appData, layer, 'line-height')"
													 al-style.text-align="appData.fn.getLayerStyle(appData, layer, 'text-align')"
													 al-style.letter-spacing="appData.fn.getLayerStyle(appData, layer, 'letter-spacing')"
													 al-init="appData.fn.initLayerInner(appData, layer, $element)"
												>
												</div>
												<div class="ipages-layer-resizer">
													<div class="ipages-layer-coord">X: {{layer.x}} <br>Y: {{layer.y}} <br>L: {{appData.fn.floor(appData, layer.angle)}}</div>
													<div class="ipages-layer-rotator" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rotate', $event)">
														<div class="ipages-layer-line"></div>
													</div>
													<div class="ipages-layer-dragger-tl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tl', $event)"></div>
													<div class="ipages-layer-dragger-tm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tm', $event)"></div>
													<div class="ipages-layer-dragger-tr" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tr', $event)"></div>
													<div class="ipages-layer-dragger-rm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rm', $event)"></div>
													<div class="ipages-layer-dragger-br" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'br', $event)"></div>
													<div class="ipages-layer-dragger-bm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bm', $event)"></div>
													<div class="ipages-layer-dragger-bl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bl', $event)"></div>
													<div class="ipages-layer-dragger-lm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'lm', $event)"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="ipages-sidebar-panel" al-if="appData.config.pages.length>0">
								<div al-if="appData.ui.activePage == null">
									<div class="ipages-data">
										<div class="ipages-control">
											<div class="ipages-info"><?php esc_html_e('Please, select a page to view its settings', 'ipages_flipbook'); ?></div>
										</div>
									</div>
								</div>
								<div al-if="appData.ui.activePage != null">
									<div class="ipages-tabs ipages-clear-fix">
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.page" al-on.click="appData.fn.onPageTab(appData, 'page')"><?php esc_html_e('Page', 'ipages_flipbook'); ?></div>
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.layers" al-on.click="appData.fn.onPageTab(appData, 'layers')"><?php esc_html_e('Layers', 'ipages_flipbook'); ?></div>
										<div class="ipages-tab" al-attr.class.ipages-active="appData.ui.pageTabs.layer" al-on.click="appData.fn.onPageTab(appData, 'layer')"><?php esc_html_e('Layer', 'ipages_flipbook'); ?></div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.page">
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Enable/disable page', 'ipages_flipbook'); ?>"></div>
											<div al-toggle="appData.ui.activePage.active"></div>
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page type', 'ipages_flipbook'); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Type', 'ipages_flipbook'); ?></div>
											<div class="ipages-select ipages-long" al-pagetype="appData.ui.activePage.type"></div>
										</div>
										
										<div class="ipages-control" al-if="appData.ui.activePage.type == 'pdf'">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page number from PDF document', 'ipages_flipbook'); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Page number', 'ipages_flipbook'); ?></div>
											<input class="ipages-number ipages-long" al-integer="appData.ui.activePage.page" placeholder="<?php esc_html_e('Write a number', 'ipages_flipbook'); ?>">
										</div>
										
										<div class="ipages-control" al-if="appData.ui.activePage.type == 'image'">
											<div class="ipages-helper" title="<?php esc_html_e('Set a page image (jpeg or png format)', 'ipages_flipbook'); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Page image', 'ipages_flipbook'); ?></div>
											<div class="ipages-input-group ipages-long">
												<div class="ipages-input-group-cell">
													<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.ui.activePage.image.url" placeholder="<?php esc_html_e('Select an image', 'ipages_flipbook'); ?>">
												</div>
												<div class="ipages-input-group-cell ipages-pinch">
													<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activePage.image)" title="<?php esc_html_e('Select a page image', 'ipages_flipbook'); ?>"><span><i class="xfa fa-folder"></i></span></div>
												</div>
											</div>
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Add class when element becomes visible', 'ipages_flipbook'); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Show CSS class', 'ipages_flipbook'); ?></div>
											<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activePage.showCSSClass">
										</div>
										
										<div class="ipages-control">
											<div class="ipages-helper" title="<?php esc_html_e('Add class when element becomes hidden', 'ipages_flipbook'); ?>"></div>
											<div class="ipages-label"><?php esc_html_e('Hide CSS class', 'ipages_flipbook'); ?></div>
											<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activePage.hideCSSClass">
										</div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.layers">
										<div class="ipages-layers-wrap">
											<div class="ipages-layers-toolbar">
												<div class="ipages-left-panel">
													<i class="xfa fa-picture-o" al-on.click="appData.fn.addLayerImage(appData)" title="<?php esc_html_e('Add image', 'ipages_flipbook'); ?>"></i>
													<i class="xfa fa-font" al-on.click="appData.fn.addLayerText(appData)" title="<?php esc_html_e('Add text', 'ipages_flipbook'); ?>"></i>
													<span al-if="appData.ui.activeLayer != null">
													<i class="xfa fa-long-arrow-up fa-split"></i>
													<i class="xfa fa-clone" al-on.click="appData.fn.copyLayer(appData)" title="<?php esc_html_e('Copy', 'ipages_flipbook'); ?>"></i>
													<i class="xfa fa-long-arrow-up fa-split"></i>
													<i class="xfa fa-arrow-up fa-top" al-on.click="appData.fn.updownLayer(appData, 'start')" title="<?php esc_html_e('Move to the start', 'ipages_flipbook'); ?>"></i>
													<i class="xfa fa-arrow-up" al-on.click="appData.fn.updownLayer(appData, 'up')" title="<?php esc_html_e('Move up', 'ipages_flipbook'); ?>"></i>
													<i class="xfa fa-arrow-down" al-on.click="appData.fn.updownLayer(appData, 'down')" title="<?php esc_html_e('Move down', 'ipages_flipbook'); ?>"></i>
													<i class="xfa fa-arrow-down fa-bottom" al-on.click="appData.fn.updownLayer(appData, 'end')" title="<?php esc_html_e('Move to the end', 'ipages_flipbook'); ?>"></i>
													</span>
												</div>
												<div class="ipages-right-panel">
													<i class="xfa fa-trash fa-color-red" al-if="appData.ui.activeLayer != null" al-on.click="appData.fn.deleteLayer(appData)" title="<?php esc_html_e('Delete', 'ipages_flipbook'); ?>"></i>
												</div>
											</div>
											<div class="ipages-layers">
												<div class="ipages-layer"
													 al-attr.class.ipages-active="appData.fn.isLayerActive(appData, layer)"
													 al-on.click="appData.fn.selectLayer(appData, layer)"
													 al-repeat="layer in appData.ui.activePage.layers"
												 >
													<i class="xfa fa-picture-o" al-if="layer.type == 'image'"></i>
													<i class="xfa fa-font" al-if="layer.type == 'text'"></i>
													<div class="ipages-label">{{layer.title ? layer.title : layer.type}}</div>
													<div class="ipages-actions">
														<i class="xfa" al-attr.class.fa-unlock-alt="!layer.lock" al-attr.class.fa-lock="layer.lock" al-on.click="appData.fn.toggleLayerLock(appData, layer)"></i>
														<i class="xfa" al-attr.class.fa-check-circle-o="layer.visible" al-attr.class.fa-circle-o="!layer.visible" al-on.click="appData.fn.toggleLayerVisible(appData, layer)"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ipages-data" al-if="appData.ui.pageTabs.layer">
										<div al-if="appData.ui.activeLayer == null">
											<div class="ipages-control">
												<div class="ipages-info"><?php esc_html_e('Please, select a layer to view its settings', 'ipages_flipbook'); ?></div>
											</div>
										</div>
										<div al-if="appData.ui.activeLayer != null">
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.general">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'general')">
													<div class="ipages-block-title"><?php esc_html_e('General', 'ipages_flipbook'); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer title', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Title', 'ipages_flipbook'); ?></div>
														<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.title">
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer position', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-rgap">
																<div class="ipages-label"><?php esc_html_e('X [px]', 'ipages_flipbook'); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.x">
															</div>
															<div class="ipages-input-group-cell ipages-lgap">
																<div class="ipages-label"><?php esc_html_e('Y [px]', 'ipages_flipbook'); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.y">
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer size', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-rgap">
																<div class="ipages-label"><?php esc_html_e('Width [px]', 'ipages_flipbook'); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.width">
															</div>
															<div class="ipages-input-group-cell ipages-lgap">
																<div class="ipages-label"><?php esc_html_e('Height [px]', 'ipages_flipbook'); ?></div>
																<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.height">
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set layer angle', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Angle [deg]', 'ipages_flipbook'); ?></div>
														<input class="ipages-number ipages-long" al-float="appData.ui.activeLayer.angle">
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Set additional css classes to a layer', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Additional CSS class', 'ipages_flipbook'); ?></div>
														<input class="ipages-number ipages-long" type="text" al-text="appData.ui.activeLayer.class">
													</div>
												</div>
											</div>
											
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.data">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'data')">
													<div class="ipages-block-title"><?php esc_html_e('Data', 'ipages_flipbook'); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Adds a specific url to the layer', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('Go to an URL', 'ipages_flipbook'); ?></div>
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell">
																<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.ui.activeLayer.link" placeholder="<?php esc_html_e('URL', 'ipages_flipbook'); ?>">
															</div>
															<div class="ipages-input-group-cell ipages-pinch">
																<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectPost(appData, appData.rootScope, appData.ui.activeLayer)" title="<?php esc_html_e('Select a post...', 'ipages_flipbook'); ?>"><span><i class="xfa fa-file"></i></span></div>
															</div>
														</div>
														
														<div class="ipages-input-group ipages-long">
															<div class="ipages-input-group-cell ipages-pinch">
																<div al-checkbox="appData.ui.activeLayer.linkNewWindow"></div>
															</div>
															<div class="ipages-input-group-cell">
																<?php esc_html_e('Open url in a new window', 'ipages_flipbook'); ?>
															</div>
														</div>
													</div>
													
													<div class="ipages-control">
														<div class="ipages-helper" title="<?php esc_html_e('Adds a specific string data to the layer, if we want to use it in custom code later', 'ipages_flipbook'); ?>"></div>
														<div class="ipages-label"><?php esc_html_e('User data', 'ipages_flipbook'); ?></div>
														<textarea class="ipages-textarea ipages-long" al-textarea="appData.ui.activeLayer.userData" placeholder="<?php esc_html_e('Type any string data; it can be JSON format as an example. You can use this data inside the custom code later.', 'ipages_flipbook'); ?>"></textarea>
													</div>

                                                    <div class="ipages-control">
                                                        <div class="ipages-helper" title="<?php esc_html_e('Adds a specific HTML data to the layer', 'ipages_flipbook'); ?>"></div>
                                                        <div class="ipages-label"><?php esc_html_e('HTML data', 'ipages_flipbook'); ?></div>
                                                        <textarea class="ipages-textarea ipages-long" al-textarea="appData.ui.activeLayer.htmlData" placeholder="<?php esc_html_e('Type any HTML data', 'ipages_flipbook'); ?>"></textarea>
                                                    </div>
												</div>
											</div>
											
											<div class="ipages-block ipages-block-flat" al-attr.class.ipages-block-folded="appData.ui.layerTab.special">
												<div class="ipages-block-header" al-on.click="appData.fn.onLayerTab(appData,'special')">
													<div class="ipages-block-title" al-if="appData.ui.activeLayer.type == 'image'"><?php esc_html_e('Image', 'ipages_flipbook'); ?></div>
													<div class="ipages-block-title" al-if="appData.ui.activeLayer.type == 'text'"><?php esc_html_e('Text', 'ipages_flipbook'); ?></div>
													<div class="ipages-block-state"></div>
												</div>
												<div class="ipages-block-data">
													<div al-if="appData.ui.activeLayer.type == 'image'">
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Set background image (jpeg or png format)', 'ipages_flipbook'); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Background image', 'ipages_flipbook'); ?></div>
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell">
																	<input class="ipages-text ipages-long ipages-no-brr" type="text" al-text="appData.ui.activeLayer.background.image.url" placeholder="<?php esc_html_e('Select an image', 'ipages_flipbook'); ?>">
																</div>
																<div class="ipages-input-group-cell ipages-pinch">
																	<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activeLayer.background.image)" title="<?php esc_html_e('Select a background image', 'ipages_flipbook'); ?>"><span><i class="xfa fa-folder"></i></span></div>
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Background color in hexadecimal format (#fff or #555555)', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background color', 'ipages_flipbook'); ?></div>
																	<div class="ipages-color ipages-long" al-color="appData.ui.activeLayer.background.color"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the size of the background images', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background size', 'ipages_flipbook'); ?></div>
																	<div class="ipages-select ipages-long" al-backgroundsize="appData.ui.activeLayer.background.size"></div>
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('How a background image will be repeated', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background repeat', 'ipages_flipbook'); ?></div>
																	<div class="ipages-select ipages-long" al-backgroundrepeat="appData.ui.activeLayer.background.repeat"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the starting position of a background image', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Background position', 'ipages_flipbook'); ?></div>
																	<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.background.position" placeholder="<?php esc_html_e('Example: 50% 50%', 'ipages_flipbook'); ?>">
																</div>
															</div>
														</div>
													</div>
													
													<div al-if="appData.ui.activeLayer.type == 'text'">
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Text color in hexadecimal format (#fff or #555555)', 'ipages_flipbook'); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Color', 'ipages_flipbook'); ?></div>
															<div class="ipages-color ipages-long" al-color="appData.ui.activeLayer.text.color"></div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the text size in px', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Size [px]', 'ipages_flipbook'); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.size" placeholder="<?php esc_html_e('Example: 18', 'ipages_flipbook'); ?>">
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Set the text line height in px', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Line height [px]', 'ipages_flipbook'); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.lineHeight" placeholder="<?php esc_html_e('Example: 18', 'ipages_flipbook'); ?>">
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-input-group ipages-long">
																<div class="ipages-input-group-cell ipages-rgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the horizontal alignment of the text', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Align', 'ipages_flipbook'); ?></div>
																	<div class="ipages-select ipages-long" al-textalign="appData.ui.activeLayer.text.align"></div>
																</div>
																<div class="ipages-input-group-cell ipages-lgap">
																	<div class="ipages-helper" title="<?php esc_html_e('Specifies the spacing behavior between text characters', 'ipages_flipbook'); ?>"></div>
																	<div class="ipages-label"><?php esc_html_e('Letter spacing [px]', 'ipages_flipbook'); ?></div>
																	<input class="ipages-number ipages-long" al-integer="appData.ui.activeLayer.text.letterSpacing" placeholder="<?php esc_html_e('Example: 1', 'ipages_flipbook'); ?>">
																</div>
															</div>
														</div>
														
														<div class="ipages-control">
															<div class="ipages-helper" title="<?php esc_html_e('Set a font family for the text', 'ipages_flipbook'); ?>"></div>
															<div class="ipages-label"><?php esc_html_e('Font family', 'ipages_flipbook'); ?></div>
															<input class="ipages-text ipages-long" type="text" al-text="appData.ui.activeLayer.text.fontFamily">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.customCSS" al-if="appData.ui.tabs.customCSS">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('Enable/disable custom styles', 'ipages_flipbook'); ?>"></div>
										<div class="ipages-input-group ipages-long">
											<div class="ipages-input-group-cell ipages-pinch">
												<div al-toggle="appData.config.customCSS.active"></div>
											</div>
											<div class="ipages-input-group-cell">
												<div class="ipages-label ipages-offset-top"><?php esc_html_e('Enable styles', 'ipages_flipbook'); ?></div>
											</div>
										</div>
									</div>
									<div class="ipages-control">
										<pre id="ipages-notepad-css" class="ipages-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.customJS" al-if="appData.ui.tabs.customJS">
						<div class="ipages-stage">
							<div class="ipages-main-panel ipages-main-panel-general">
								<div class="ipages-data ipages-active">
									<div class="ipages-control">
										<div class="ipages-helper" title="<?php esc_html_e('Enable/disable custom javascript code', 'ipages_flipbook'); ?>"></div>
										<div class="ipages-input-group ipages-long">
											<div class="ipages-input-group-cell ipages-pinch">
												<div al-toggle="appData.config.customJS.active"></div>
											</div>
											<div class="ipages-input-group-cell">
												<div class="ipages-label ipages-offset-top"><?php esc_html_e('Enable javascript code', 'ipages_flipbook'); ?></div>
											</div>
										</div>
									</div>
									<div class="ipages-control">
										<pre id="ipages-notepad-js" class="ipages-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ipages-section" al-attr.class.ipages-active="appData.ui.tabs.shortcode" al-if="appData.wp_item_id">
						<div class="ipages-main-panel ipages-main-panel-general">
							<div class="ipages-data ipages-active">
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('Use a shortcode like the one below, copy and paste it into a post or page.', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-label"><?php esc_html_e('Standard shortcode', 'ipages_flipbook'); ?></div>
									<div class="ipages-input-group">
										<div class="ipages-input-group-cell">
											<input id="ipages-shortcode-1" class="ipages-text ipages-long ipages-no-brr" type="text" value='[ipages id="{{appData.wp_item_id}}"]' readonly="readonly">
										</div>
										<div class="ipages-input-group-cell ipages-pinch">
											<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#ipages-shortcode-1')" title="<?php esc_html_e('Copy to clipboard', 'ipages_flipbook'); ?>"><span><i class="xfa fa-clipboard"></i></span></div>
										</div>
									</div>
								</div>
								
								<p><?php esc_html_e('Next to that you can also add a few optional arguments to your shortcode:', 'ipages_flipbook'); ?></p>
								<table class="ipages-table">
									<tbody>
										<tr>
											<th><?php esc_html_e('Variable', 'ipages_flipbook'); ?></th>
											<th><?php esc_html_e('Value', 'ipages_flipbook'); ?></th>
										</tr>
										<tr>
											<td><code>id</code></td>
											<td><?php esc_html_e('flipbook ID', 'ipages_flipbook'); ?></td>
										</tr>
										<tr>
											<td><code>slug</code></td>
											<td><?php esc_html_e('flipbook slug identifier', 'ipages_flipbook'); ?></td>
										</tr>
										<tr>
											<td><code>page</code></td>
											<td><?php esc_html_e('flipbook page number', 'ipages_flipbook'); ?></td>
										</tr>
										<tr>
											<td><code>class</code></td>
											<td><?php esc_html_e('custom CSS class', 'ipages_flipbook'); ?></td>
										</tr>
										<tr>
											<td><code>width</code></td>
											<td><?php esc_html_e('container width, can be specified in length values, like px, cm, etc', 'ipages_flipbook'); ?></td>
										</tr>
										<tr>
											<td><code>height</code></td>
											<td><?php esc_html_e('container height, can be specified in length values, like px, cm, etc', 'ipages_flipbook'); ?></td>
										</tr>
									</tbody>
								</table>
								
								<div class="ipages-control">
									<div class="ipages-info"><?php esc_html_e('You can add the flipbook to a website or blog by embedding it. Copy the code below and paste it into your blog or website.', 'ipages_flipbook'); ?></div>
								</div>
								
								<div class="ipages-control">
									<div class="ipages-label"><?php esc_html_e('Embed code with ID', 'ipages_flipbook'); ?></div>
									<div class="ipages-input-group">
										<div class="ipages-input-group-cell">
											<input id="ipages-embedcode-1" class="ipages-text ipages-long ipages-no-brr" type="text" value='{{appData.embedCodeWithId}}' readonly="readonly">
										</div>
										<div class="ipages-input-group-cell ipages-pinch">
											<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#ipages-embedcode-1')" title="<?php esc_html_e('Copy to clipboard', 'ipages_flipbook'); ?>"><span><i class="xfa fa-clipboard"></i></span></div>
										</div>
									</div>
								</div>
								
								<div class="ipages-control" al-if="appData.config.slug">
									<div class="ipages-label"><?php esc_html_e('Embed code with URL slug', 'ipages_flipbook'); ?></div>
									<div class="ipages-input-group">
										<div class="ipages-input-group-cell">
											<input id="ipages-embedcode-2" class="ipages-text ipages-long ipages-no-brr" type="text" value='{{appData.embedCodeWithSlug}}' readonly="readonly">
										</div>
										<div class="ipages-input-group-cell ipages-pinch">
											<div class="ipages-btn ipages-default ipages-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#ipages-embedcode-2')" title="<?php esc_html_e('Copy to clipboard', 'ipages_flipbook'); ?>"><span><i class="xfa fa-clipboard"></i></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="ipages-modals" class="ipages-modals">
		</div>
	</div>
</div>
<!-- /end ipages app -->