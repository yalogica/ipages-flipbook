<?php
defined('ABSPATH') || exit;

$data = '';
$data .= '<div class="ipages-page-feedback">' . PHP_EOL;
$data .= '<p>' . __('Your feedback and rating matters to us. If you are happy with the plugin <strong>"iPages Flipbook"</strong> give us a rating.', 'ipages_flipbook') . '</p>' . PHP_EOL;
$data .= '<a class="ipages-rate-us" href="https://wordpress.org/plugins/ipages-flipbook/#reviews" target="_blank">' . __('Rate Us', 'ipages_flipbook') . '</a>'. PHP_EOL;
$data .= '<div class="ipages-page-feedback-close"><i class="xfa fa-times"></i></div>' . PHP_EOL;
$data .= '</div>' . PHP_EOL;

echo wp_kses_post($data);

?>