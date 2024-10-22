<?php
/*
Plugin Name: OHRDP Form Management
Description: Ordering form management for OHRDP
Author: Code Optimizer
Version: 1.7.2
Author URI: https://codeoptimizer.io
*/
define('OHRDP_FM_PLUGIN', 'ohrdp-form');
define('OHRDP_FM_DIR', plugin_dir_path( __FILE__ ));
define('OHRDP_FM_URL', plugin_dir_url( __FILE__ ));
define('OHRDP_FM_SETUP_DIR', OHRDP_FM_DIR . 'setup/');
define('OHRDP_FM_ASSETS', OHRDP_FM_URL . 'assets/');
define('OHRDP_FM_POPUP', OHRDP_FM_DIR . 'popup/');

define('FM_FORM_TABLE', 'fm_forms');
define('FM_FORM_PRODUCT_TABLE', 'fm_form_product');
define('FM_ORDERS_TABLE', 'fm_orders');

// Setup
require_once OHRDP_FM_SETUP_DIR . 'tables.php';
require_once OHRDP_FM_SETUP_DIR . 'assets.php';
require_once OHRDP_FM_SETUP_DIR . 'server/setup.php';
require_once OHRDP_FM_SETUP_DIR . 'forms/setup.php';
require_once OHRDP_FM_SETUP_DIR . 'products/setup.php';
require_once OHRDP_FM_SETUP_DIR . 'reports/setup.php';
require_once OHRDP_FM_SETUP_DIR . 'mail/setup.php';
require_once OHRDP_FM_POPUP . 'popup.php';