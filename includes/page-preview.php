<?php
defined('ABSPATH') || exit;

$plugin_url = plugin_dir_url(dirname(__FILE__));
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    wp_enqueue_style('ipages_flipbook-preview-css', $plugin_url . 'assets/css/preview.min.css', [], IPGS_PLUGIN_VERSION);
    wp_enqueue_script('ipages_flipbook-loader-js', $plugin_url . 'assets/js/loader.min.js', ['jquery'], IPGS_PLUGIN_VERSION, false);
    wp_localize_script('ipages_flipbook-loader-js', 'ipages_flipbook_globals', $this->getLoaderGlobals($this->flipbook_version));
    wp_head();
    ?>
</head>
<body>
<?php
    $atts = array('id'=>$this->flipbook_id);
    echo $this->shortcode($atts);
?>
</body>
</html>